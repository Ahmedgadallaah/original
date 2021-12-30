<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Http\Facades;
use App\Order;
use App\OrderItem;

class OrderController extends Controller
{
    public function all_orders(Request $request){

        if($request->status){
            $orders=OrderItem::where('product_dealer_id', auth()->id())
            ->where('product_name' , 'like' , '%' .$request->search. '%')
            ->whereHas('order' ,function ($q)  use($request){
                $q->where('status',$request->status);
            })->with('order')->orderBy('created_at','Desc')->get();
        }else{
            $orders=OrderItem::where('product_dealer_id', auth()->id())
             ->where('product_name' , 'like' , '%' .$request->search. '%')
            ->whereHas('order' ,function ($q) {
                $q->where('status',0)->orWhere('status',1);
            })->with('order')->orderBy('created_at','Desc')->get();
        }



                $pendding_orders=OrderItem::whereHas('order' ,function ($q) {$q->where('status',0);})->with('order')->get();
                $shipped_orders=OrderItem::whereHas('order' ,function ($q) {$q->Where('status',1);})->with('order')->get();
                $completed_orders=OrderItem::whereHas('order',function ($q) {$q->Where('status',2);})->with('order')->get();
                $rejected_orders=OrderItem::whereHas('order',function ($q) {$q->Where('status',3);})->with('order')->get();

            return view('dashboard.buy-request')->with([
                'orders'=>$orders,
                'pendding_orders'=>$pendding_orders,
                'shipped_orders'=>$shipped_orders,
                'completed_orders'=>$completed_orders,
                'rejected_orders'=>$rejected_orders,
                'search'=>$rejected_orders,
            ]);;
            //    return view('dashboard.products.edit_product2', $data);
    }

    // public function update_status(Request $request){

    //     $order=OrderItem::where('id',$request->id)>first();
    //         if($order->status == 0){
    //             $order->update(['status',1]);
    //         }else{
    //             $order->update(['status',0]);
    //         }
    // }
}
