<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Offer;
//use App\Product;
use App\Discount;
use App\CartItem;
use App\Product;
use App\DiscountUser;
use Validator;
use App\Http\Resources\ProductsResource;
use App\Http\Resources\CartsResource;
use Carbon;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{

    public function add_to_cart( Request $request , $id)
    {
        $prod = Product::where('id', $id)->firstOrFail();
        //$offer=Offer::where('product_id',$prod->id)->first();
       // return $offer->percentage;

 
        if($prod->percentage){
            $price_after_discount=(100-$prod->percentage)*$prod->price/100;
            // dd($price_after_discount);
            
        }else{
            $price_after_discount=$prod->price;
        }
        $validator = Validator::make($request->all(), [
            'quantity' => 'required',
        ]);
        if($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()
            ]);
        }

        $userId = auth('api')->user()->id;
        
        $cart = Cart::where('user_id', auth('api')->user()->id)->first();
        
        if(!$cart){
            $cart =  Cart::create([
                'user_id'=> auth('api')->user()->id
            ]);
        }
        
        $cart_items = CartItem::where('product_id',$id)->where('cart_id' , $cart->id)->first();
        
        if($cart_items)
        {
            return response()->json([
                'message' =>'this item is already in your cart list'
            ]);
        }
        else {
            if($request->quantity > $prod->quantity){
                return response()->json(['quantity'=>'Max available quantity is '.$prod->quantity ]);
            }
            $cart_items = CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $id,
                'qty' => $request->quantity,
                'price'=>$prod->price,
                'price_after_discount'=>$price_after_discount,

            ]);

            

            return [
                "message"=>"item saved succsessfully to your cart",
                "status"=>true,
                "data"=>new CartsResource($cart),
                'cart'=>self::show($request)
            
            ];
        }



    }


    public function show(Request $request){
        $userId = auth('api')->user()->id;
        $cart = Cart::where('user_id', $userId)->first();
        
        if($cart){
            $cart_items = CartItem::where('cart_id' , $cart->id)->get();
            $total =0;
            foreach($cart_items as $items ) {
                $total += $items->price_after_discount * $items->qty;
            }
            $default_discount=null;
            $promo_status=false;
            $promo_used="";
            if (isset($request->promocode)) {
                $discount = Discount::where('promocode' , $request->promocode)->where('start_date','<=',date('Y-m-d'))->where('end_date','>=',date('Y-m-d'))->first();
                 
                if(isset($discount) && $discount != Null ){
                $discount_user=DiscountUser::where('discount_id',$discount->id)->where('user_id',$userId)->first();
                    if(!$discount_user){
                        $default_discount=$discount->pounds;
                        $cart->update([
                            'discount_id' => $discount->id,
                            'promocode'=> $request->promocode
                               ]);
                        $promo_status=true;
                    }else{
                        $promo_used="this promocode has been used before";
                        $promo_status=false;
                    }  
                }
            }else{
                $cart->update([
                        'discount_id' => null
                    ]);      
            }
            $result=new CartsResource($cart);

            
            if ($cart && $cart_items->count() > 0  ) {
                //return $total;
                if(isset($discount) && $discount->pounds < $total)
                {
                    $last_result = $total- $discount->pounds ;
                    if($last_result < 0 )
                    {
                        return response()->json(['message'=> 'this promocode can not be applied now']);
                    } 
                }
                 else 
                 {
                    $last_result = $total;
                    $cart->update([
                        'discount_id' => null
                    ]);
                 }
                return response()->json([
                    'cart' => $result,
                    'sub_total_price'=>$total ,
                    'discount_value'=>$default_discount,
                    'total'=> $last_result,
                    'promocode_status'=>$promo_status,
                    'promocode_used'=>$promo_used
                ]);
            }else{
                return response()->json([
                'message' => 'No items in your cart',
            ] );
            }
        }else {

            return response()->json([
                'message' => 'No items in your cart',
            ]);
        }

    }

    public function update_cart(Request $request , $id)
    {
        $userId = auth('api')->user()->id;
        $cart = Cart::where('user_id', $userId)->first();
        $cart_items = CartItem::where('id' , $id)->where('cart_id',$cart->id)->first();
    
        if($cart_items){
         $prod = Product::where('id', $cart_items->product_id)->first();
            // if($request->qty > $prod->qty){
            //     return response()->json(['quantity'=>'Max available quantity is '.$prod->qty ]);
            // }
            $cart_items->update([
                'qty' => $request->qty,
            ]);
            
            
            return response()->json([
                "message"=>"your cart item has been successfully updated",
                "status"=>true,
                'data' => new CartsResource($cart),
                'cart'=>self::show($request)
            ]);

        }else{
            
            return response()->json([
                "status"=> false,
                'message' => "there is no item exist in your cart  ",
                'cart'=>self::show($request)
            ]);
        }

    }
    public function delete(Request $request ,$id)
    {
        $userId = auth('api')->user()->id;
        $cart = Cart::where('user_id', $userId)->first();

        $cart_items = CartItem::where('id' , $id)->where('cart_id',$cart->id)->first();

        if($cart_items){
            $cart_items->delete();

            return response()->json(
                [
                    'message' => 'item has been deleted successfully',
                    'status'=>true,
                    'data' =>  new CartsResource($cart),
                     'cart'=>self::show($request)
                ]
            );
        }
        else {
            return response()->json([
                'message' => 'this item does not exist in your cart',
                'status' =>false
            ]);
        }

    }


    public function empty_cart()
    {
        $userId = auth('api')->user()->id;

        $cart = Cart::where('user_id', $userId)->first();

        $cart_items = CartItem::where('cart_id',$cart->id)->get();

        foreach ($cart_items as $item){
            $item->delete();
        }

        return response()->json([
            'message' => 'Your cart is empty' ,
            'status'=>true,
            // 'data' =>  new CartsResource($cart),
        ]);
    }




}
