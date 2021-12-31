<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CarModel;
use App\Mark;
use App\Year;
use App\Engine;
use App\Shop;
use App\Car;
use TCG\Voyager\Models\User;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ShopsController;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Http\Controllers\CarsController;
use Illuminate\Support\Facades\Session;

use function PHPSTORM_META\type;

class SettingController extends Controller
{


        public function edit_profile(){

            $user=User::where('id',auth()->id())->first();
            return view('dashboard.edit-profile')->with(['user'=>$user]);
        }

        public function settings() {
            $user = new RegisterController();
            $userProfile = $user->profile();

             return view('dashboard.settings')->with(['profile'=>$userProfile]);
        }

         public function update_profile(Request $request)
        {


            $user = User::find(auth()->id());
            $authUser = auth()->user();

            $token = request()->bearerToken();



                $v = Validator::make($request->all(), [
                    'name' => 'max:255',
                    // 'email' => 'unique:users,email,' . $authUser->id,
                    'email' => ['required', Rule::unique('users')->ignore($authUser->id)],
                    'phone' => 'unique:users,phone,' . $authUser->id,
                    // 'password' => ['min:8']
                ]);
                $errors = $v->errors();
                if ($v->fails()) {
                    foreach ($errors->all() as $message) {
                        return response()->json($message);
                    }
                }
                $user = User::find(auth()->id());
                // $imgs = $request->image;
                // if ($request->hasFile('image')) {
                //     $fileName = '/users/apis/' . time() . $imgs->getClientOriginalName();
                //     $imgs->move(public_path('../storage/app/public/users/apis/'), $fileName);
                //     //   $fileName=url('/public/storage/'.$fileName);
                // } else {
                //     $fileName = $user->avatar;
                // }

                $user->update([
                    'name' => $request->name ? $request->name : $user->name,
                    'password' => isset($request->password) ? bcrypt($request->password) : $user->password,
                    'email' => $request->email ? $request->email : $user->email,
                    'phone' => $request->phone ? $request->phone : $user->phone,
                    'address' => $request->address ? $request->address : $user->address,
                    // 'point' => $request->point ? $request->point : $user->point,
                    // 'avatar' => $fileName,

                    // 'email_verified_at' => now(),
                    // "phone_verified" => $request->phone_verified ? $request->phone_verified : 0,
                ]);
                // $result = User::where('id', $user->id)->first();
            return redirect()->route('settings');

        }

         public function store_details() {
            $shop = new ShopsController();
            $store = $shop->Shop_By_Dealer();
            $data= $store->getData()->data;

            if(!empty($data)){
                return view('dashboard.store-details')->with(['store'=>$data]);
            }else{
                return view('dashboard.add-update-store');
             }
        }

        //cars
        public function dealer_cars(){

            $data=Car::where('user_id',auth()->id())->get();

            // $car = new CarsController();

            // $car = $car->dealer_cars();

            // $data= $car->getData()->data;

            if(!empty($data)){

            //  $data= $car->getOriginalContent();

             return view('dashboard.car-details')->with(['data'=>$data]);
              }else{

                 return redirect()->back();
             }

        }


        public function add_car(){

            $models=CarModel::all();
            $marks=Mark::all();
            $engines=Engine::all();
            $years=Year::all();

            return view('dashboard.add-car')->with(['marks'=>$marks,'models'=>$models,'engines'=>$engines,'years'=>$years]);

        }

        public function store_car(Request $request)
        {

            $user = auth()->id();
            $authUser = User::where('id', $user)->first();

            $v = Validator::make($request->all(),
                [
                    'model_id' => 'required',
                    'mark_id' => 'required',
                    'engine_id' => 'required',
                    'year_id' => 'required',
                ]);

            if ($v->fails()) {
                $errors = $v->errors();
                foreach ($errors->all() as $message) {
                    return response(['error' => $message]);
                }
            } else {
                // $car = Car::where('user_id', $user)->first();
                $model = CarModel::where('id', $request->model_id)->first();
                //dd($model);

                    $model_name_en = $model->getTranslatedAttribute('name', 'en');
                    $model_name_ar = $model->getTranslatedAttribute('name', 'ar');

                $mark = Mark::where('id', $request->mark_id)->first();
                    $mark_name_en = $mark->getTranslatedAttribute('name', 'en');
                    $mark_name_ar = $mark->getTranslatedAttribute('name', 'ar');

                $engine = Engine::where('id', $request->engine_id)->first();
                //$engine_name=$engine->name
                    $engine_name_en = $engine->getTranslatedAttribute('name', 'en');
                    $engine_name_ar = $engine->getTranslatedAttribute('name', 'ar');
                $year = Year::where('id', $request->year_id)->first();
                //$engine_name=$engine->name;
                    $year_en = $year->getTranslatedAttribute('year', 'en');
                    $year_ar = $year->getTranslatedAttribute('year', 'ar');


                $name_en = $model_name_en . " " . $mark_name_en . " " . $engine_name_en . " " . $year_en;
                $name_ar = $model_name_ar . " " . $mark_name_ar . " " . $engine_name_ar . " " . $year_ar;

                    $user = auth()->id();

                    $car = Car::create([
                        'model_id' => $request->model_id,
                        'mark_id' => $request->mark_id,
                        'engine_id' => $request->engine_id,
                        'year_id' => $request->year_id,
                        'name_en' => $name_en,
                        'name_ar' => $name_ar,
                        'user_id' => $user,

                    ]);
            Session::flash('message', array('type' => 'success', 'text' => __('تم الاضافة بنجاح')));

            return redirect()->route('dealer-cars');


         }



        }

        public function delete_car(Request $request){
            $user = auth()->id();
            $car = Car::where('id', $request->id)->where('user_id', $user)->first();
            $car->delete();
        Session::flash('message', array('type' => 'success', 'text' => __('تم الحذف بنجاح')));

            return redirect()->route('dealer-cars');
        }


        public function edit_store(){
            $store=Shop::where('dealer_id',auth()->id())->first();

            return view('dashboard.add-update-store')->with(['store'=>$store]);


        }

          public function update_store(Request $request)
        {


            $store=Shop::where('dealer_id',auth()->id())->first();

                $v = Validator::make($request->all(), [
                    'name' => 'min:3,max:255',
                    // 'email' => 'unique:users,email,' . $authUser->id,
                    'address' => 'min:3,max:255',
                    // 'phone' => 'unique:users,phone,' . $authUser->id,
                    // 'password' => ['min:8']
                ]);
                $errors = $v->errors();
                if ($v->fails()) {
                    foreach ($errors->all() as $message) {
                        return response()->json($message);
                    }
                }
                // $user = User::find(auth()->id());

                $store->update([
                    'name' => $request->name ? $request->name : $user->name,
                    'address' => $request->address ? $request->address : $user->address,
                ]);
                // $result = User::where('id', $user->id)->first();
            return redirect()->route('store-details');

        }

}
