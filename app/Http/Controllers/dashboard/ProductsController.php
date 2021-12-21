<?php

namespace App\Http\Controllers\dashboard;

use App\CategoryShop;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\DealerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PartsController;
use App\Http\Resources\PartsResource;
use App\Http\Resources\ProductsResource;
use App\Product;
use App\Shop;
use TCG\Voyager\Models\Category;

class ProductsController extends Controller
{
    public function index()
    {
        // dealer info
        $dealer = new DealerController;
        $dealerData = $dealer->home();

        //  parts
        $partsData = new PartsController();
        $parts = $partsData->dealer_pending_parts();
        $result =  $parts->toJson();

        $orderController = new OrderController;
        $orders = $orderController->dealer_orders();

        $data = [
            'home' => $dealerData,
            'parts' =>  $result,
            'orders' => $orders->getData(),
        ];
        return view('dashboard.index', $data);
    }


    public function products()
    {
        $categories = Category::with(['products' => function($query){
            $query->where('dealer_id' ,auth()->id())->get();
        }])->get();

        $productsData = Product::where('dealer_id' , auth()->id())->get();
        $products = ProductsResource::collection($productsData);

        // return  $products;
        $data = [
            'categories' => $categories ,
            'products' => $products
        ];
        return view('dashboard.products' , $data);

    }

    public function contact()
    {


        $data = Http::post(route('contact'), [
            'name' => 'jsjss',
            'email' => 'admin@gmail',
            'message' => 'mdkslsdcvnksdlvsdkvnskdnsdnvjlsnd',

        ]);
    }
}
