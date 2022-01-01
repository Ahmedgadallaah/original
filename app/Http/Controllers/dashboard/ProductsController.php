<?php

namespace App\Http\Controllers\dashboard;

use App\Car;
use App\CategoryShop;
use App\Http\Controllers\Controller;
use App\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\DealerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PartsController;
use App\Http\Resources\PartsResource;
use App\Http\Resources\ProductsResource;
use App\Product;
use App\Contact;
use App\Shop;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use PhpParser\Node\Stmt\Goto_;
use TCG\Voyager\Models\Category;
use Carbon\Carbon;
use DateInterval;
use DatePeriod;
use DateTime;
use DB;

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
        $result = $parts->toJson();

        $orderController = new OrderController;
        $orders = $orderController->dealer_orders();

        $today = Carbon::today();
        $from = $today->parse()->endOfDay()->subDays(7);
        $period = new DatePeriod(new DateTime($from), new DateInterval('P1D'), new DateTime($today));
        $dbData = [];
        foreach ($period as $date) {
            $range[$date->format("Y-m-d")] = "0";
        }
        $items =   OrderItem::where('product_dealer_id', auth()->id())
            ->whereHas('order', function ($q) {
                $q->where('status', 2);
            })->select(DB::raw('DATE(updated_at) as time'), DB::raw('sum(product_qty) as product_qty'))
            ->whereDate('updated_at', '>=', date($from) . ' 00:00:00')
            ->whereDate('updated_at', '<=', date($today) . ' 00:00:00')
            ->groupBy('time')
            ->get();

        foreach ($items as $val) {
            $dbData[$val->time] = $val->product_qty;
        }

        $items = array_replace($range, $dbData);
        $array_keys = array_keys($items);

        $date_array = array();

        foreach($array_keys as $date){
             array_push($date_array, \Carbon\Carbon::parse($date)->format('l'));
        }

        $array_values = array_values($items);

        $data = [
            'home' => $dealerData,
            'parts' => $result,
            'orders' => $orders->getData(),
            'date_array' => $date_array,
            'array_values' => $array_values,
        ];


        return view('dashboard.index', $data);
    }
    public function part_request()
    {
        $partsData = new PartsController();
        $parts = $partsData->dealer_pending_parts();
        $result = $parts->toJson();

        $data = [
            'parts' => $result,
        ];

        return view('dashboard.part-request', $data);
    }


    public function singleItem($id)
    {
        return OrderItem::find($id);
    }

    public function products()
    {
        $categories = Category::with(['products' => function ($query) {
            $query->where('dealer_id', auth()->id())->get();
        }])->get();

        $productsData = Product::where('dealer_id', auth()->id())->get();
        $products = ProductsResource::collection($productsData);

        // return  $products;
        $data = [
            'categories' => $categories,
            'products' => $products
        ];
        return view('dashboard.products.products', $data);
    }

    public function deleteProduct($id)
    {
        Product::where('id', $id)->delete();
        \Session::flash('message', array('type' => 'success', 'text' => __('تم الحذف بنجاح')));
        return redirect()->back();
    }

    public function createProduct()
    {
        $categories = Category::all();
        $data = [
            'categories' => $categories,
        ];
        return view('dashboard.products.create_product', $data);
    }


    public function createProduct2(Product $product)
    {

        $data = [
            'cars' => Car::all(),
            'product' => $product
        ];
        return view('dashboard.products.create_product2', $data);
    }

    public function editProduct(Product $product)
    {

        $categories = Category::all();
        $data = [
            'categories' => $categories,
            'product' => $product
        ];
        return view('dashboard.products.create_product', $data);
    }

    public function editProduct2(Product $product)
    {
        $data = [
            'cars' => Car::all(),
            'product' => $product
        ];
        return view('dashboard.products.edit_product2', $data);
    }


    public function storeProduct(Request $request, Product $product = null)
    {


        $img = $request->image;
        if ($request->hasFile('image')) {
            $fileName = '/products/dashboard/' . time() . $img->getClientOriginalName();
            $img->move(public_path('../storage/app/public/products/dashboard/'), $fileName);
        } else {
            $fileName = "";
        }

        $imgs = $request->images;
        $result = [];
        if ($request->hasFile('images')) {
            foreach ($imgs as $img) {
                $fileNames = '/products/dashboard/' . time() . $img->getClientOriginalName();
                $img->move(public_path('../storage/app/public/products/dashboard/'), $fileNames);
                array_push($result, $fileNames);
            }
        }
        $data = $request->except('image', 'images');

        if ($request->has('submit')) {

            if (!is_null($product)) {
                $product->update($data);
                \Session::flash('message', array('type' => 'success', 'text' => __('تم حفظ البيانات')));
                return redirect()->route('dealerProducts');
            } else {
                $data['image'] = $fileName;
                $data['images'] = json_encode($result);
                $product = Product::create($data);
                return redirect()->route('createDealerProducts2', $product);
            }
        }
    }


    public function updateProduct(Request $request, Product $product)
    {


        $img = $request->image;
        if ($request->hasFile('image')) {
            $fileName = '/products/dashboard/' . time() . $img->getClientOriginalName();
            $img->move(public_path('../storage/app/public/products/dashboard/'), $fileName);
        } else {
            $fileName = $product->image;
        }

        $imgs = $request->images;
        $result = [];
        if ($request->hasFile('images')) {

            foreach ($imgs as $img) {
                $fileNames = '/products/dashboard/' . time() . $img->getClientOriginalName();
                $img->move(public_path('../storage/app/public/products/dashboard/'), $fileNames);
                array_push($result, $fileNames);
            }
        } else {
            $fileNames = $product->images;
        }
        $data = $request->except('image', 'images');


        if ($request->page == "2") {
            $product->update($data);
            \Session::flash('message', array('type' => 'success', 'text' => __('تم حفظ البيانات')));
            return redirect()->route('dealerProducts');
        } else {
            $data['image'] = $fileName;
            $data['images'] = $result ? json_encode($result) : $product->images;
            $product->update($data);
            return redirect()->route('editDealerProducts2', $product);
        }
    }

    public function send_contact()
    {


        Contact::create([
            'name' => 'jsjss',
            'email' => 'admin@gmail',
            'message' => 'mdkslsdcvnksdlvsdkvnskdnsdnvjlsnd',

        ]);

        \Session::flash('message', array('type' => 'success', 'text' => __('تم حفظ البيانات')));
        return redirect()->route('get-contact');
    }
    public function contact_page()
    {
        //  $user=User::where('id',auth()->id())->first();

        return view('dashboard.contact');
        //return view('dashboard.contact');
    }

    public function dealerSales(Request $request)
    {
        $totalInStock = Product::where('dealer_id', auth()->id())->sum('quantity');
        $totalSellQty = OrderItem::where('product_dealer_id', auth()->id())->whereHas('order', function ($query) {
            $query->where('status', 2);
        })->sum('product_qty');
        $totalSales = OrderItem::where('product_dealer_id', auth()->id())->whereHas('order', function ($query) {
            $query->where('status', 2);
        })->sum('product_total');
        $totalItems = OrderItem::where('product_dealer_id', auth()->id())
            ->where('product_name', 'like', '%' . $request->search . '%')
            ->whereHas('order', function ($query) {
                $query->where('status', 2);
            })->orderBy('created_at', 'desc')->get();



        $data = [
            'totalInStock' => $totalInStock,
            'totalSellQty' => $totalSellQty,
            'totalSales' => $totalSales,
            'totalItems' => $totalItems

        ];
        return view('dashboard.sales', $data);
    }
}
