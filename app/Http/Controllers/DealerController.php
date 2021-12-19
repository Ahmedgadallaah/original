<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderItem;
use App\Part;
use App\Product;
use App\DealerRating;
use  App\Http\Resources\OrdersResource;
use  App\Http\Resources\PartsResource;
use  App\Http\Resources\PartPricesResource;
use  App\Http\Resources\OrderItemsResource;
use  App\Http\Resources\OrderUsersResource;

class DealerController extends Controller
{
    public function home()
    {

        $week_before = \Carbon\Carbon::today()->subDays(7);

        $today = today();

        $user_id = auth()->id();

        $sum = 0;
        $qty = 0;
        $week_sum = 0;
        $week_sum1 = 0;

        $day_earn = Order::where('status', 2)
            ->whereDate('updated_at', '=', date('Y-m-d'))->whereHas('order_items', function ($q) use ($user_id) {
                $q->where('product_dealer_id', $user_id);
            })
            ->with(['order_items' => function ($q) use ($user_id) {
                $q->where('product_dealer_id', $user_id);
            }])->get()->pluck('order_items');
        foreach ($day_earn as $day) {
            $sum += $day->sum('product_total');
            $qty += $day->sum('product_qty');
        }


        $week_earn = Order::where('status', 2)
            ->whereDate('updated_at', '>=', $week_before)->whereDate('updated_at', '<=', $today)->whereHas('order_items', function ($q) use ($user_id) {
                $q->where('product_dealer_id', $user_id);
            })
            ->with(['order_items' => function ($q) use ($user_id) {
                $q->where('product_dealer_id', $user_id);
            }])->get()->pluck('order_items');

        foreach ($week_earn as $week) {
            $week_sum += $week->sum('product_total');
        }

        $user = auth()->id();


        $latest_orders = Part::where('status', 1)->take(10)->latest()->get();

        //


        $stock = Product::where('dealer_id', $user_id)->get();
        $total_stock = 0;
        $total_stock_qty = 0;
        foreach ($stock as $item) {
            $total_stock += $item->price * $item->quantity;
            $total_stock_qty += $item->quantity;
        }

        $sold = OrderItem::where('product_dealer_id', $user_id)->whereHas('order', function ($q) {
            $q->where('status', '2');
        })->get();

        $sold_total = 0;
        $sold_total_qty = 0;
        foreach ($sold as $item) {
            $sold_total += $item->product_price * $item->product_qty;
            $sold_total_qty += $item->product_qty;
        }


        $total_amount = $total_stock_qty + $sold_total_qty;

        $approximate_total_percentage = 0;
        if ($sold_total_qty != 0) {
            $total_percentage = ($sold_total_qty / $total_amount) * 100;

            $approximate_total_percentage = number_format((float)$total_percentage, 2, '.', '');
        }
        $dealer_sold_product = OrderItem::where('product_dealer_id', $user_id)->whereHas('order', function ($q) {
            $q->where('status', '2');
        })->sum('product_qty');


        $week_earning1 = Order::where('status', 2)
            ->whereDate('updated_at', '<=', $today)->whereDate('updated_at', '>=', $week_before)->whereHas('order_items', function ($q) use ($user_id) {
                $q->where('product_dealer_id', $user_id);
            })
            ->with(['order_items' => function ($q) use ($user_id) {
                $q->where('product_dealer_id', $user_id);
            }])->get()->pluck('order_items');


        foreach ($week_earning1 as $week) {
            $week_sum1 += $week->sum('product_qty');


        }


        $approximate_weekly_rate = 0;
        if($total_amount){
        $weekly_rate_percentage = ($week_sum1 / $total_amount) * 100;
        $approximate_weekly_rate = number_format((float)$weekly_rate_percentage, 2, '.', '');
        }

        $chart_orders = Order::where('status', 2)->whereDate('updated_at', '<=', $today)->whereDate('updated_at', '>=', $week_before)
            ->whereHas('order_items', function ($q) use ($user_id) {
                $q->where('product_dealer_id', $user_id);
            })
            ->with(['order_items' => function ($q) use ($user_id) {
                $q->where('product_dealer_id', $user_id);
            }])->get()->pluck('order_items');

        $c=OrderItem::where('product_dealer_id', $user_id)->whereHas('order',function($q) {
            $q->where('status', 2);
        })->with('order')->get()->map(function($s){
            return [
                'qty' => $s->product_qty ,
                'date' => $s->order->updated_at
            ];
        });

$t=number_format((float)(DealerRating::where('dealer_id', $user_id)->avg('rate')), 1) ?? 0;

        return [
            "day_earning" => "$sum",
            "day_sold_parts" => "$qty",
            'total_rating' => "$t",
            'last_week_earning' => "$week_sum",
            'weekly_rate' => "$approximate_weekly_rate",
            'total_percentage' => "$approximate_total_percentage",
             'latest_orders' => PartsResource::collection($latest_orders),
            'chart' => $c??[]
        ];
    }


    public function dealer_sold_orders()
    {

        $week_before = \Carbon\Carbon::today()->subDays(7);
        $week_before_last_week = \Carbon\Carbon::today()->subDays(14);
        $today = today();
        $week_sum = 0;
        $last_week_sum = 0;

        if (auth('api')->user()) {
            $user_id = auth('api')->user()->id;
            $order = OrderItem::where('product_dealer_id', $user_id)->whereHas('order', function ($q) {
                $q->where('status', '2');
            })->orderBy('updated_at' , 'desc')->paginate(30);
            $dealer_product = Product::where('dealer_id', $user_id)->sum('quantity');


            $stock = Product::where('dealer_id', $user_id)->get();
            $total_stock = 0;
            $total_stock_qty = 0;
            foreach ($stock as $item) {
                $total_stock += $item->price * $item->quantity;
                $total_stock_qty += $item->quantity;
            }

            $sold = OrderItem::where('product_dealer_id', $user_id)->whereHas('order', function ($q) {
                $q->where('status', '2');
            })->get();

            $sold_total = 0;
            $sold_total_qty = 0;
            foreach ($sold as $item) {
                $sold_total += $item->product_price * $item->product_qty;
                $sold_total_qty += $item->product_qty;
            }


            $total_amount = $total_stock_qty + $sold_total_qty;

            $approximate_total_percentage = "0";
            if ($sold_total_qty != 0) {
                $total_percentage = ($sold_total_qty / $total_amount) * 100;

                $approximate_total_percentage = number_format((float)$total_percentage, 2, '.', '');
            }
            $dealer_sold_product = OrderItem::where('product_dealer_id', $user_id)->whereHas('order', function ($q) {
                $q->where('status', '2');
            })->sum('product_qty');


            // $last_week_earning=Order::where('status',2)
            //     ->whereDate('updated_at', '<=', $week_before)->whereDate('updated_at', '>=', $week_before_last_week)->whereHas('order_items', function($q) use ($user_id){
            //         $q->where('product_dealer_id', $user_id);
            //     })
            //     ->with(['order_items'=>function($q)use($user_id){ $q->where('product_dealer_id', $user_id);}])->get()->pluck('order_items');

            $this_week_earning = Order::where('status', 2)
                ->whereDate('updated_at', '<=', $today)->whereDate('updated_at', '>=', $week_before)->whereHas('order_items', function ($q) use ($user_id) {
                    $q->where('product_dealer_id', $user_id);
                })
                ->with(['order_items' => function ($q) use ($user_id) {
                    $q->where('product_dealer_id', $user_id);
                }])->get();

            //  foreach($last_week_earning as $week){
            //     $last_week_sum+= $week->sum('product_total');

            //  }


            foreach ($this_week_earning as $week) {
                $week_sum += $week->order_items->sum('product_qty');

            }


            $approximate_weekly_rate = "0";
            if($total_amount !=0 ){
            $weekly_rate_percentage = ($week_sum / $total_amount) * 100;
            $approximate_weekly_rate = number_format((float)$weekly_rate_percentage, 2, '.', '');
            }



                return response()->json([



                    'product_sales_stock' => "$dealer_product",
                    'total_percentage' => $approximate_total_percentage,
                    'weekly_rate' => $approximate_weekly_rate,

                ]);






        }

    }




    public function dealer_sold_products()
    {

        $week_before = \Carbon\Carbon::today()->subDays(7);
        $week_before_last_week = \Carbon\Carbon::today()->subDays(14);
        $today = today();
        $week_sum = 0;
        $last_week_sum = 0;

        if (auth('api')->user()) {
            $user_id = auth('api')->user()->id;
            $order = OrderItem::where('product_dealer_id', $user_id)->whereHas('order', function ($q) {
                $q->where('status', '2');
            })->orderBy('updated_at' , 'desc')->paginate(30);
            $dealer_product = Product::where('dealer_id', $user_id)->sum('quantity');


            $stock = Product::where('dealer_id', $user_id)->get();
            $total_stock = 0;
            $total_stock_qty = 0;
            foreach ($stock as $item) {
                $total_stock += $item->price * $item->quantity;
                $total_stock_qty += $item->quantity;
            }

            $sold = OrderItem::where('product_dealer_id', $user_id)->whereHas('order', function ($q) {
                $q->where('status', '2');
            })->get();

            $sold_total = 0;
            $sold_total_qty = 0;
            foreach ($sold as $item) {
                $sold_total += $item->product_price * $item->product_qty;
                $sold_total_qty += $item->product_qty;
            }


            $total_amount = $total_stock_qty + $sold_total_qty;

            $approximate_total_percentage = 0;
            if ($sold_total_qty != 0) {
                $total_percentage = ($sold_total_qty / $total_amount) * 100;

                $approximate_total_percentage = number_format((float)$total_percentage, 2, '.', '');
            }
            $dealer_sold_product = OrderItem::where('product_dealer_id', $user_id)->whereHas('order', function ($q) {
                $q->where('status', '2');
            })->sum('product_qty');


            // $last_week_earning=Order::where('status',2)
            //     ->whereDate('updated_at', '<=', $week_before)->whereDate('updated_at', '>=', $week_before_last_week)->whereHas('order_items', function($q) use ($user_id){
            //         $q->where('product_dealer_id', $user_id);
            //     })
            //     ->with(['order_items'=>function($q)use($user_id){ $q->where('product_dealer_id', $user_id);}])->get()->pluck('order_items');

            $this_week_earning = Order::where('status', 2)
                ->whereDate('updated_at', '<=', $today)->whereDate('updated_at', '>=', $week_before)->whereHas('order_items', function ($q) use ($user_id) {
                    $q->where('product_dealer_id', $user_id);
                })
                ->with(['order_items' => function ($q) use ($user_id) {
                    $q->where('product_dealer_id', $user_id);
                }])->get();

            //  foreach($last_week_earning as $week){
            //     $last_week_sum+= $week->sum('product_total');

            //  }


            foreach ($this_week_earning as $week) {
                $week_sum += $week->order_items->sum('product_qty');

            }


            $approximate_weekly_rate = 0;
            if($total_amount !=0 ){
            $weekly_rate_percentage = ($week_sum / $total_amount) * 100;
            $approximate_weekly_rate = number_format((float)$weekly_rate_percentage, 2, '.', '');
            }


            if (count($order) > 0) {
                return  OrderItemsResource::collection($order);


            } else {
                return response()->json([

                    'message' => 'no data returned',
                    "status" => true,
                    "data" => []
                ]);

            }

        }

    }
}
