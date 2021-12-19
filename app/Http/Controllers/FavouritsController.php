<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Favourite;
use App\Product;
use App\Http\Resources\ProductsResource;
use App\Http\Resources\FavouritsResource;
class FavouritsController extends Controller
{
    public function favoruites(){
        $user_id  = auth()->id();
        
        $favoruites=Favourite::where('user_id',$user_id)->get();
        
            
            return response()->json([
                "message" => "your favourite data has been succsessfully returned",
                "status" => "true",
                'data'=>FavouritsResource::collection($favoruites)
                ]);
            
    }

    public function create_favourite ( Request $request){

        $user_id  = auth('api')->user()->id;
        
        $is_favourite = Favourite::where('product_id' ,$request->product_id)->where('user_id',$user_id)->first();
        $product=Product::where('id',$request->product_id)->first();
        if ($is_favourite){
            return response()->json([
                'favourite'=>'This Product is already exist on your favorite list',
                "status" => "true",
                "data"    =>new FavouritsResource($is_favourite)
            ]);
        }
        else {
            if($product){
            $favorite= Favourite::create([
                'product_id' => $request->product_id,
                'user_id' => $user_id,
            ]);
            
            return response()->json([
                "message" => "your favourite data has been succsessfully Added",
                "status" => "true",
                "data"    =>new FavouritsResource($favorite)
            ]);
            }else{
            return response()->json([
                "message" => "No product found",
            ]);
        }
        }
    }
    public function delete_favourite($id){
        $user_id  = auth('api')->user()->id;
        $favorite = Favourite::where('user_id',$user_id)->find($id) ;
        if($favorite){
            $favorite->delete();
            return response()->json(['message' => 'Data Successfully Deleted']);
        }else{
            return response()->json(['message' => 'Error There Is No Selected Favourite']);
        }
    }
}


