<?php

namespace App\Http\Controllers\dashboard;

use App\Car;
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
use Illuminate\Contracts\Session\Session;
use PhpParser\Node\Stmt\Goto_;
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
        return view('dashboard.products.products' , $data);

    }

    public function deleteProduct($id)
    {
        Product::where('id',$id)->delete();
        \Session::flash('message', array('type' => 'success', 'text' => __('تم الحذف بنجاح')));
        return redirect()->back();
    }

    public function createProduct()
    {
        $categories = Category::all();
        $data = [
            'categories' => $categories,
        ];
        return view('dashboard.products.create_product' , $data);
    }


    public function createProduct2(Product $product)
    {

        $data = [
            'cars' => Car::all(),
            'product' =>$product
        ];
        return view('dashboard.products.create_product2'  , $data );
    }

    public  function editProduct(Product  $product) {

        $categories = Category::all();
        $data = [
            'categories' => $categories,
            'product' => $product
        ];
        return view('dashboard.products.create_product' , $data);
    }

    public function storeProduct(Request $request , Product $product=null){


        $img = $request->image;
        if ($request->hasFile('image')) {
            $fileName = '/products/dashboard/' . time() . $img->getClientOriginalName();
            $img->move(public_path('../storage/app/public/products/dashboard/'), $fileName);

        }else{
            $fileName="";
        }

        $imgs = $request->images;
        $result=[];
        if ($request->hasFile('images')) {
            foreach($imgs as $img){
                $fileNames = '/products/dashboard/' . time() . $img->getClientOriginalName();
                $img->move(public_path('../storage/app/public/products/dashboard/'), $fileNames);
                array_push($result,$fileNames);
            }
        }
        $data = $request->except('image' , 'images');

        if ($request->has('submit')){

            if (!is_null($product)){
                $product->update($data);
               \Session::flash('message', array('type' => 'success', 'text' => __('تم حفظ البيانات')));
                return redirect()->route('dealerProducts');
            }
            else
            {
                $data['image'] = $fileName ;
                $data['images'] = json_encode($result) ;
                $product =  Product::create($data);
                return redirect()->route('createDealerProducts2', $product);
            }


        }


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
