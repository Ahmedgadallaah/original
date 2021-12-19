<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\DealerController;
use App\Http\Controllers\PartsController;
use App\Http\Resources\PartsResource;


class ProductsController extends Controller
{
    public function index()
    {
        // dealer info
        $dealer = new DealerController;
        $dealerData = $dealer->home();
        $home = $dealerData->getData();
    
        //  parts
        $partsData = new PartsController();
        $parts = $partsData->dealer_pending_parts();  
        $result =  $parts->toJson();
        
    //    return $result;

        $data = [
            'home' => $home,
            'parts' =>  $result,
        ];
        return view('dashboard.index', $data);
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