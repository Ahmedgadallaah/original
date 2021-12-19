<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductRating;
use App\DealerRating;
use TCG\Voyager\Models\User;
use App\Http\Resources\ProductRatingsResource;
use App\Http\Resources\DealerRatingsResource;
use Illuminate\Support\Facades\Validator;

class RatingController extends Controller
{
    public function ratings()
    {
        $ratings = ProductRating::all();

        return response()->json([
            'message' => 'success',
            'status' => true,
            'data' => ProductRatingsResource::collection($ratings),
        ]);

    }

    public function ProductReviews($product_id)
    {

        // $data = Product::where('approve',1);


        return ProductRatingsResource::collection(ProductRating::where('product_id', $product_id)->OrderBy('created_at', 'desc')->paginate(30));
    }

    public function DealerReviews($dealer_id)
    {
        return DealerRatingsResource::collection(DealerRating::where('dealer_id', $dealer_id)->OrderBy('created_at', 'desc')->paginate(30));
    }

    //Product
    public function store_product_rate(Request $request)
    {
        $v = Validator::make($request->all(),
            [
                'rate' => 'required|numeric|min:1|max:5',

            ]);

        if ($v->fails()) {
            $errors = $v->errors();
            foreach ($errors->all() as $message) {
                return response(['error' => $message]);
            }
        }
        //  return auth()->id();

        $rate = ProductRating::firstOrCreate([
            'user_id' => auth()->id(),
            'product_id' => $request->product_id
        ], [
            'rate' => $request->rate,
            'product_id' => $request->product_id,
            'review' => $request->review,
            'user_id' => auth()->id(),
        ]);

        // $rate = ProductRating::where('user_id', auth()->id())->firstOrNew([
        //         'rate' => $request->rate,
        //         'product_id' => $request->product_id,
        //         'review' => $request->review,
        //         'user_id' => auth()->id(),
        //     ]);
        if ($rate->wasRecentlyCreated === true ) {

            return response()->json([

                'message' => 'Product Rating Successfully Created',
                'status' => true,
                'new' => true,
                'data' => new ProductRatingsResource($rate)
            ]);
        } else {

            return response()->json([

                'message' => 'Product Rating Successfully Created',
                'status' => true,
                'new' => false,
                'data' => new ProductRatingsResource($rate)
            ]);
        }

    }


    //Dealer
    public function store_dealer_rate(Request $request)
    {
        $v = Validator::make($request->all(),
            [
                'rate' => 'required|numeric|min:1|max:5',
            ]);

        if ($v->fails()) {
            $errors = $v->errors();
            foreach ($errors->all() as $message) {
                return response(['error' => $message]);
            }
        }

        $rate = DealerRating::where('user_id', auth()->id())->firstOrCreate([
            'user_id' => auth()->id(),
            'dealer_id' => $request->dealer_id
        ], [
            'rate' => $request->rate,
            'dealer_id' => $request->dealer_id,
            'review' => $request->review,
            'user_id' => auth()->id(),
        ]);
        if ($rate->wasRecentlyCreated) {
            return response()->json([

                'message' => 'success',
                'status' => true,
                'new' => true,
                'data' => new DealerRatingsResource($rate)
            ]);
        } else {
            return response()->json([

                'message' => 'success',
                'status' => true,
                'new' => false,
                'data' => new DealerRatingsResource($rate)
            ]);
        }


    }


    public function store_dealer_product_rate(Request $request)
    {
        $userId = auth('api')->user()->id;
      
        $dealer_rate = DealerRating::where('user_id', auth()->id())->updateOrCreate([
            'user_id' => auth()->id(),
            'dealer_id' => $request->dealer_id,
        ], [
            'rate' => $request->dealer_rate,
            'dealer_id' => $request->dealer_id,
            'review' => "",
            'user_id' => auth()->id(),
        ]);

        $product_rate = ProductRating::updateOrCreate([
            'user_id' => auth()->id(),
            'product_id' => $request->product_id
        ], [
            'rate' => $request->product_rate,
            'product_id' => $request->product_id,
            'review' => $request->review,
            'user_id' => auth()->id(),
        ]);
        // return $product_rate;


        return response()->json([
            'message' => 'success',
            'new' => $product_rate->wasRecentlyCreated == true && $dealer_rate->wasRecentlyCreated == true ? true : false,
            'dealer_new' =>  $dealer_rate->wasRecentlyCreated == true ? true : false,
            'product_new' =>  $product_rate->wasRecentlyCreated == true ? true : false,    
            'status' => true,
            'dealer_data' => new DealerRatingsResource($dealer_rate),
            'product_data' => new ProductRatingsResource($product_rate)
        ]);

    }

}
