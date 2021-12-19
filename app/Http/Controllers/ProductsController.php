<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Product;
use App\Http\Resources\ProductsResource;
use App\Http\Resources\CategoriesResource;
use App\Http\Resources\DealersResource;
use App\Http\Resources\CarsResource;
use App\Http\Resources\OffersResource;
use App\Http\Resources\DiscountsResource;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function products()
    {

        $products = Product::where('approve',1)->get();
        return response()->json(['data' => ProductsResource::collection($products)]);
    }

    public function product($id)
    {
        $product = Product::where('id', $id)->first();
        
        $similar_products=Product::where('similar_id',$product->similar_id)->where('approve',1)->where('id','!=',$id)->take(10)->get();
        if($product){

         return response()->json([
            "message"=>"data returned successfully",
            "status"=>true,
            'product'=> new ProductsResource($product),
         ]);
         }
         else{
             return response()->json([
            "message"=>"data Not Found or Not Approved Yet",
            "status"=>false,
         ]);
         }
    }

  public function similar_products($id)
    {
        $product = Product::where('id', $id)->where('approve',1)->first();
        if($product){
        $similar_products=Product::where('similar_id',$product->similar_id)->where('id','!=',$id)->take(10)->get();
    
         return response()->json([
            'similar_products'=> ProductsResource::collection($similar_products)
         ]);
        }else{
             return response()->json([
            'message'=> "this product not found "
         ]);
        }
    }


    public function products_by_category_dealer(Request $request )
    {
        $data = Product::where('approve',1);
         
        if ($request->category_id) {
            $data->where('category_id', $request->category_id );
        }
          if ($request->dealer_id) {
            $data->where('dealer_id', $request->dealer_id );
        }
        return ProductsResource::collection($data->paginate(30));
           
        
    }

    //Dealer products_by_name_category_dealer
    public function products_by_name_category(Request $request )
    {

        if(auth()->user()){

            $user = auth()->user()->id;    
            
            //return $product=Product::where('dealer_id',$user)->get();
            $data = Product::whereTranslation('name', 'like', '%' . $request->name . '%')->where('dealer_id',$user)->where('approve',1);
            if ($request->category_id) {
                $data->where('category_id', $request->category_id );
            }
            if($data->count() > 0){
                return ProductsResource::collection($data->paginate(30));
            }else{
                return response()->json([
                
                'message' => 'no products Found',
                "status"=>false,
                "data"=>[],
            
            ]);
            }
        }else{
             return response()->json([
                'message' => 'sorry you are Not Auth',
                "status"=>false,
            
            ]);
        }    
        
    }


    public function store_product(Request $request){

         $v = Validator::make($request->all(), [
            'name' => 'required',
            
            'price' => 'required',
            
        ]);

        if ($v->fails()) {
                return response()->json(['validation_error'=>$v->errors()->all()]);
        }

        $img = $request->image;
        if ($request->hasFile('image')) {
            $fileName = '/products/apis/' . time() . $img->getClientOriginalName();
            $img->move(public_path('../storage/app/public/products/apis/'), $fileName);
            // $fileName=url('/public/storage/').$fileName;

        }else{
            $fileName="";
        }

        $imgs = $request->images;
        $result=[];
        if ($request->hasFile('images')) {
            foreach($imgs as $img){
                $fileNames = '/products/apis/' . time() . $img->getClientOriginalName();
                $img->move(public_path('../storage/app/public/products/apis/'), $fileNames);
                array_push($result,$fileNames);
            }         
        }
        

        $product = Product::create([
            'name'=> $request->name,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'dealer_id'=> $request->dealer_id,
            'car_id'=> $request->car_id,
            'quantity'=> $request->quantity,
            'made_in' => $request->made_in,
            'used' =>  $request->used,
            'approve' => 0,
            'delivery_cost'=>$request->delivery_cost,
            'guarante'=>$request->guarante,
            'guarante_period'=>$request->guarante_period,
            'image'=> $fileName,
            'images'=> json_encode($result),
            'shop_id'=> $request->shop_id,
            'similar_id'=> $request->similar_id, 
            'offer_id'=> $request->offer_id, 
            'percentage'=> $request->percentage, 
        ]);

        
        return response()->json([
          "message"=>"Product Created Successfully",
          "status"=>true,
          "data" => new ProductsResource($product),
          ]);
    }


}
