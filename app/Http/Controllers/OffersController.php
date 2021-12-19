<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Offer;
use App\Product;
use TCG\Voyager\Models\Category;
use App\Http\Resources\OffersResource;
use App\Http\Resources\ProductOffersResource;
use App\Http\Resources\ProductsResource;

class OffersController extends Controller
{
    public function offers()
    {

        $offers = Offer::all();
        return OffersResource::collection($offers);
    }

    public function latest_offers(Request $request)
    {
        if($request->category_id){
            
            $products=Product::orderBy('percentage', 'DESC')->whereNotNull('percentage')->where('percentage','!=',0)->where('approve', 1)->where('category_id',$request->category_id)->paginate(30);
            return ProductsResource::collection($products);  
        
        }else{
            $products=Product::orderBy('percentage', 'DESC')->whereNotNull('percentage')->where('percentage','!=',0)->where('approve', 1)->paginate(30);
            return ProductsResource::collection($products) ;
        }

            
    }

    public function best_latest_offers()
    {

        $offers = Product::orderBy('percentage', 'DESC')->whereNotNull('percentage')->where('percentage','!=',0)->where('approve', 1)->take(10)->latest()->get();
        return ProductsResource::collection($offers);
    }


    public function offer($id)
    {

        $offer = Offer::where('id', $id)->first();
        if($offer){
        return new ProductOffersResource($offer);
        }
        return response()->json([
            "message"=>"no item founded"
        ]);
    }
}
