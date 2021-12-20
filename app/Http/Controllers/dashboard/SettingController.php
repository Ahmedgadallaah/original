<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ShopsController;
use App\Http\Controllers\CarsController;
class SettingController extends Controller
{


        public function settings() {
            $user = new RegisterController();
            $userProfile = $user->profile();

             return view('dashboard.settings')->with(['profile'=>$userProfile]);
        }

         public function store_details() {
            $shop = new ShopsController();
            $store = $shop->Shop_By_Dealer();
            $data= $store->getData()->data;

            if(!empty($data)){
                return view('dashboard.store-details')->with(['store'=>$data]);
            }else{
                return redirect()->back();
             }
        }

        public function dealer_cars(){

            $car = new CarsController();
            $car = $car->dealer_cars();

            $data= $car->getData()->data;
            if(!empty($data)){
             $data= $car->getOriginalContent();

             return view('dashboard.car-details')->with(['data'=>$data]);
              }else{

                 return redirect()->back();
             }

        }

        public function add_car(){
            return view('dashboard.add-car');
        }
        public function edit_profile(){
            return view('dashboard.edit-profile');
        }
        public function add_store(){
            return view('dashboard.add-update-store');
        }

}
