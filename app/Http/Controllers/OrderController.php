<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\CartItem;
use App\Order;
use App\OrderItem;
use App\Product;
use App\Discount;
use App\Offer;
use App\DiscountUser;
use TCG\Voyager\Models\User;
use Validator;
use DB;
use  App\Http\Resources\OrdersResource;
use  App\Http\Resources\ProductsResource;
use  App\Http\Resources\OrderItemsResource;
use  App\Http\Resources\OrderUsersResource;


class OrderController extends Controller
{
    public function make_order(Request $request)
    {


        $today = date('y-m-d');

        $userId = auth('api')->user()->id;
        $cart = Cart::where('user_id', $userId)->first();

        $cart_items = CartItem::where('cart_id', $cart->id)->get();
        $productIds = $cart_items->pluck('product_id')->toArray();



        $total = 0;
        $total_after_offer = 0;

        if ($cart_items->count() > 0) {



            $validator = Validator::make($request->all(), [
                'phone' => 'required',
                'name' => 'required',
                'address' => 'required',

            ]);

            if ($validator->fails()) {
                return response()->json([
                    'error' => $validator->errors()
                ]);
            }

            foreach ($cart_items as $items) {
              $price = $items->price_after_discount;
            //   $price_after_offer =  $items->price_after_discount;

            //   $total_after_offer +=  $price_after_offer * $items->qty ;
              $total += $price * $items->qty;
            }


            // if ($request->promocode) {
            //     $promocode = Discount::where('promocode', $request->promocode)->where('start_date', '<=', $today)->where('end_date', '>=', $today)->first();
            //     if ($promocode) {
            //         $checkPromo = Order::where('user_id', auth()->id())->where('discount_id', $promocode->id)->first();
            //         if ($checkPromo) {
            //             return response()->json(['error' => 'You already used this promocode before']);
            //         }
            //         $total = $total - $promocode->pounds;
            //         $total_after_offer = $total_after_offer - $promocode->pounds ;
            //     } else {
            //         return response()->json(['error' => 'Promocode is not valid']);

            //     }

            // }

            $order = Order::create([
                'user_id' => $userId,
                'cart_id' => $cart->id,
                'total_price' =>$total,
                'status' => 0,
                'phone' => $request->phone,
                'name' => $request->name,
                'address' => $request->address,
                'discount_id' =>$cart->discount_id,
                'reason' => "",

            ]);

            $discount_user=DiscountUser::create([
                'user_id' => $userId,
                'discount_id' =>$cart->discount_id,
               ]);
               $cart->update([
                   "promocode"=>""
               ]);
            foreach ($cart_items as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'product_name' => $item->product->name,
                    'product_price' => $item->price_after_discount,
                    'product_qty' => $item->qty,
                    'product_total' => $item->qty * $item->price_after_discount,
                    'product_dealer_id'=>$item->product->dealer_id,
                ]);

                $product = Product::where('id', $item->product_id)->first();
                $product->quantity = $product->quantity - $item->qty;
                $product->save();

            }


            foreach ($cart_items as $row) {

                $row->delete();

            }
            $order_user=User::where('id',$userId)->first();
            $order_user->update([
                "point"=>$order_user->point+1
            ]);
            return response()->json([

                'message' => 'You have made an order.',
                "status"=>true,
                'data' => new OrdersResource($order),
                "point"=>$order_user->point
            ]);
        } else {
            return response()->json([

                'message' => 'No Item in your cart.'
            ]);
        }

    }


    public function pending()
    {
        $userId = auth('api')->user()->id;
        $data=Order::where('user_id', $userId)->where('status', 0)->get();
        if($data){
            return OrdersResource::collection($data);
        }
        else{       
            return $data;
        }
    }

    public function completed()
    {
        $userId = auth('api')->user()->id;
        $data=Order::where('user_id', $userId)->where('status', 2)->get();
        if($data){
            return OrdersResource::collection($data);
        }
        else{
            return $data;   
        }
    }

    public function shipped()
    {
        $userId = auth('api')->user()->id;
        $data=Order::where('user_id', $userId)->where('status', 1)->get();

        if($data){
            return OrdersResource::collection($data);
        }
        else{
            return $data;
        }
        
    }

    public function rejected()
    {
        $userId = auth('api')->user()->id;

        $data=Order::where('user_id', $userId)->where('status', 3)->get();
        if($data){
            return OrdersResource::collection($data);
        }
        else{
            return $data;
        }

    }

    public function all_orders()
    {
        $userId = auth('api')->user()->id;
        return OrdersResource::collection(Order::where('user_id', $userId)->where('status','!=', 3)->get());
    }

    public function update_status(Request $request, $id)
    {
        $userId = auth('api')->user()->id;
        $order = Order::select('id', 'user_id', 'cart_id', 'total_price', 'status', 'reason', 'phone', 'name')->where('id', $id)->where('user_id', $userId)->first();

        $order_items = OrderItem::where('order_id', $id)->get();

        $status = $request->status;
        if ($status != 3) {
            $order->update([
                'status' => $request->status,
                'reason' => ''

            ]);
        } else {
            $order->update([
                'status' => 3,
                'reason' => $request->reason
            ]);

            foreach ($order_items as $item) {

                $product = Product::where('id', $item->product_id)->first();

                $product->quantity = $product->quantity + $item->product_qty;
                $product->save();

                $item->update([
                    'product_qty' => 0
                ]);
            }
        }

        return response()->json([
            'message' => 'Order status Updated Successfully',
            'status' => $order->status

        ]);

    }

    public function best_seller(){
        $products = Product::withCount('oitems')->whereHas('oitems')->orderByDesc('oitems_count')->paginate(30);

    return ProductsResource::collection($products);
    }

    public function dealer_orders(){

        if(auth('api')->user()){
            $userId = auth('api')->user()->id;
            $order=OrderItem::where('product_dealer_id',$userId)->whereHas( 'order' , function($q)  {
                $q->where('status', '0');
            })->paginate(30);

            return response()->json([

                'message' => 'success',
                "status"=>true,
                'data' => OrderItemsResource::collection($order),
            ]);

        }
    }

    public function dealer_pending_orders(){

        if(auth('api')->user()){
            $userId = auth('api')->user()->id;
            $order=OrderItem::where('product_dealer_id',$userId)->whereHas( 'order' , function($q)  {
                $q->where('status', '0');
            })->paginate(30);

            if(count($order)>0){
            return response()->json([

                'message' => 'pending orders returned successfully',
                "status"=>true,
                'data' => OrderItemsResource::collection($order),
            ]);

                    }else{
            return response()->json([

                'message' => 'no data returned',
                "status"=>true,
                "data"=>[]
            ]);

        }
        }
    }

    public function dealer_inProgress_orders(){

        if(auth('api')->user()){
            $userId = auth('api')->user()->id;
            $order=OrderItem::where('product_dealer_id',$userId)->whereHas( 'order' , function($q)  {
                $q->where('status', '1');
            })->paginate(30);

            if(count($order)>0){
            return response()->json([

                'message' => 'in progress orders returned successfully',
                "status"=>true,
                'data' => OrderItemsResource::collection($order),
                
            ]);

                    }else{
            return response()->json([

                'message' => 'no data returned',
                "status"=>true,
                "data"=>[]

            ]);

        }

        }
    }


    public function dealer_completed_orders(){

        if(auth('api')->user()){
            $userId = auth('api')->user()->id;
            $order=OrderItem::where('product_dealer_id',$userId)->whereHas( 'order' , function($q)  {
                $q->where('status', '2');
            })->paginate(30);
        if(count($order)>0){
            

              
            return OrderItemsResource::collection($order);
            

            }else{
                return response()->json([

                    'message' => 'no data returned',
                    "status"=>true,
                    "data"=>[]
                ]);

            }

        }

    }

    public function dealer_rejected_orders(){

            if(auth('api')->user()){
                $userId = auth('api')->user()->id;
                $order=OrderItem::where('product_dealer_id',$userId)->whereHas( 'order' , function($q)  {
                    $q->where('status', '3');
                })->paginate(30);
                if(count($order)>0){

                return response()->json([

                    'message' => 'rejected orders returned successfully',
                    "status"=>true,
                    'data' => OrderItemsResource::collection($order),
                ]);

                }else{
                    return response()->json([

                        'message' => 'no data returned',
                        "status"=>true,
                        "data"=>[]
                    ]);

                }
            }
    }


    public function dealer_sold_orders(){

        $week_before=  \Carbon\Carbon::today()->subDays(7);
        $week_before_last_week = \Carbon\Carbon::today()->subDays(14); 
        $today=today();
        $week_sum =0;
        $last_week_sum = 0;

        if(auth('api')->user()){
            $user_id = auth('api')->user()->id;
            $order=OrderItem::where('product_dealer_id',$user_id)->whereHas( 'order' , function($q)  {
                $q->where('status', '2');
            })->paginate(30);
            $dealer_product=Product::where('dealer_id',$user_id)->sum('quantity');


            $stock=Product::where('dealer_id',$user_id)->get();
            $total_stock = 0 ;
            $total_stock_qty = 0 ;
            foreach ($stock as $item){
                $total_stock += $item->price * $item->quantity;
                $total_stock_qty += $item->quantity;
            }

            $sold=OrderItem::where('product_dealer_id',$user_id)->whereHas( 'order' , function($q)  {
                $q->where('status', '2');
            })->get();

            $sold_total = 0;
            $sold_total_qty = 0;
            foreach ($sold as $item){
                $sold_total += $item->product_price * $item->product_qty;
                $sold_total_qty += $item->product_qty;
            }
            

            $total_amount = $total_stock_qty + $sold_total_qty;

            $approximate_total_percentage=0;
            if($sold_total_qty != 0){
            $total_percentage = ($sold_total_qty / $total_amount ) * 100;

            $approximate_total_percentage = number_format((float)$total_percentage, 2, '.', '');
            }
            $dealer_sold_product=OrderItem::where('product_dealer_id',$user_id)->whereHas( 'order' , function($q)  {
                $q->where('status', '2');
            })->sum('product_qty');



            // $last_week_earning=Order::where('status',2)
            //     ->whereDate('updated_at', '<=', $week_before)->whereDate('updated_at', '>=', $week_before_last_week)->whereHas('order_items', function($q) use ($user_id){
            //         $q->where('product_dealer_id', $user_id);
            //     })
            //     ->with(['order_items'=>function($q)use($user_id){ $q->where('product_dealer_id', $user_id);}])->get()->pluck('order_items');

            $this_week_earning=Order::where('status',2)
                ->whereDate('updated_at', '<=', $today)->whereDate('updated_at', '>=', $week_before)->whereHas('order_items', function($q) use ($user_id){
                    $q->where('product_dealer_id', $user_id);
                })
                ->with(['order_items'=>function($q)use($user_id){ $q->where('product_dealer_id', $user_id);}])->get()->pluck('order_items');

            //  foreach($last_week_earning as $week){
            //     $last_week_sum+= $week->sum('product_total');
            //  }

            foreach($this_week_earning as $week){
                $week_sum+= $week->sum('product_qty');
            }
            
            return $week_sum;
            
            $approximate_weekly_rate=0;
            $weekly_rate_percentage  =  ($week_sum /$total_amount)*100;
            $approximate_weekly_rate = number_format((float)$weekly_rate_percentage, 2, '.', '');

        if(count($order)>0){
            return response()->json([

                'message' => 'completed orders returned successfully',
                "status"=>true,
                'data' => OrderItemsResource::collection($order),
                'dealer_product_count'=>$dealer_product,
                'total_percentage'=>$approximate_total_percentage,
                'weekly_rate'=>$approximate_weekly_rate,

            ]);

            }else{
                return response()->json([

                    'message' => 'no data returned',
                    "status"=>true,
                    "data"=>[]
                ]);

            }

        }

    }


}
