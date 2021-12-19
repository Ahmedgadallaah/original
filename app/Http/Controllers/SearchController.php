<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Car;
use App\Tag;
use App\Shop;
use App\Attribute;
use App\DealerRating;
use App\Http\Resources\ShopsResource;
use App\Http\Resources\TagsResource;
use TCG\Voyager\Models\Category;
use App\Http\Resources\ProductsResource;
use App\Http\Resources\AttributesResource;


class SearchController extends Controller
{
    public function home_search(Request $request)
    {


        $query = Product::whereTranslation('name', 'like', '%' . $request->name . '%');

        if ($request->category_id) {
            $query->where('category_id', $request->category_id );
        }
        if ($request->mark_id) {
            $query->with(['car' => function ($q) use ($request) {
                $q->where('mark_id',  $request->mark_id );
            }
            ]);
        }



       if ( !(is_null($request->max_price) && is_null($request->min_price)))
       {
            $query->whereBetween('price', [$request->min_price, $request->max_price]);

        }



        return ProductsResource::collection($query->paginate(30));
    }

     public function store_search(Request $request)
    {

        $query = Shop::where('name', 'like', '%' . $request->name . '%');

        if ($request->address_id) {
            $query->where('address_id',$request->address_id);

        }
        if ($request->trade_type_id) {


            $query->whereHas( 'trades' , function($q) use ($request) {
                $q->whereIn('trade_type_id',[$request->trade_type_id]);
            });

        }
        if ($request->category_id) {


            $query->whereHas( 'categories' , function($q) use ($request) {
                $q->whereIn('category_id',[$request->category_id]);
            });
        }


        //   $query->with(['dealer' => function($s) {

        //       $s->with('dealer_ratings')->orderBy(DealerRating::select('dealer_id')->whereColumn('dealer_ratings.dealer_id' , 'users.id') , 'desc');

        //   }]);




        return ShopsResource::collection($query->paginate(30));
    }


    public function default_filter(Request $request,$category_id){

        $products=Product::where('category_id',$category_id)->paginate(30);
        $tags=Tag::where('category_id',$category_id)->paginate(30);
        return [
            'message' =>'success',
            'status'=>true,
            "tags"=>TagsResource::collection($tags),
            "products"=>ProductsResource::collection($products),
            
        ];
    }


    public function attribuites_search(Request $request,$category_id){

        $query = Product::whereTranslation('name', 'like', '%' . $request->name . '%')->where('category_id',$category_id);
        if ($request->attribute_ids) {
            //$query->where('attribute_id',$request->attribute_id);
             $query->whereHas('attributes' , function ($q) use ($request) {
                $q->whereIn('attribute_id',[$request->attribute_ids]);  
             }
            );
        }
            
            if ( !(is_null($request->max_price) && is_null($request->min_price)))
        {
                $query->whereBetween('price', [$request->min_price, $request->max_price]);

            }
        
        return ProductsResource::collection($query->paginate(30));
    }

    //    public function price_filter(Request $request,$category_id){

    //     $query = Product::whereTranslation('name', 'like', '%' . $request->name . '%')->where('category_id',$category_id);
    //     if ( !(is_null($request->max_price) && is_null($request->min_price)))
    //     {
    //             $query->whereBetween('price', [$request->min_price, $request->max_price]);

    //         }
        
    //     return ProductsResource::collection($query->paginate(30));
    // }

    public function attribute_filter(Request $request,$tag_id){

        $data = Attribute::where('tag_id',$tag_id)->get();
        
        return AttributesResource::collection($data);
    }


}
