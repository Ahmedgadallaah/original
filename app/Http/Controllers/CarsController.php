<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CarModel;
use App\Engine;
use App\Mark;
use App\Car;
use App\Year;
use App\CarUser;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Models\User;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\CarsResource;
use App\Http\Resources\YearsResource;

class CarsController extends Controller
{


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
            $car = Car::where('user_id', $user)->first();
            $model = CarModel::where('id', $request->model_id)->first();
            //dd($model);
            if (!$model) {
                return response()->json([
                    "message" => "this model id not found",
                    "status" => "false",
                ]);

            } else {
                $model_name_en = $model->getTranslatedAttribute('name', 'en');
                $model_name_ar = $model->getTranslatedAttribute('name', 'ar');
            }

            $mark = Mark::where('id', $request->mark_id)->first();
            if ($mark) {
                $mark_name_en = $mark->getTranslatedAttribute('name', 'en');
                $mark_name_ar = $mark->getTranslatedAttribute('name', 'ar');
            } else {
                return response()->json([
                    "message" => "this Mark id not found",
                    "status" => "false",
                ]);
            }

            $engine = Engine::where('id', $request->engine_id)->first();
            //$engine_name=$engine->name;
            if ($engine) {
                $engine_name_en = $engine->getTranslatedAttribute('name', 'en');
                $engine_name_ar = $engine->getTranslatedAttribute('name', 'ar');
            } else {
                return response()->json([
                    "message" => "this engine id not found",
                    "status" => "false",
                ]);
            }

             $year = Year::where('id', $request->year_id)->first();
            //$engine_name=$engine->name;
            if ($year) {
                $year_en = $year->getTranslatedAttribute('year', 'en');
                $year_ar = $year->getTranslatedAttribute('year', 'ar');
            } else {
                return response()->json([
                    "message" => "this year id not found",
                    "status" => "false",
                ]);
            }

            $name_en = $model_name_en . " " . $mark_name_en . " " . $engine_name_en . " " . $year_en;
            $name_ar = $model_name_ar . " " . $mark_name_ar . " " . $engine_name_ar . " " . $year_ar;


            if (!$car) {


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


                return response()->json([
                    "message" => "your car data has been succsessfully saved",
                    "status" => "true",
                    'data' => new CarsResource ($car)
                ]);
            } else {
                $car->update([
                    'model_id'  => $request->model_id,
                    'mark_id'   => $request->mark_id,
                    'engine_id' => $request->engine_id,
                    'year_id' => $request->year_id,
                    'name_en'   => $name_en,
                    'name_ar'   => $name_ar,
                    'user_id'   => $user,
                ]);

                return response()->json([
                    "message" => "your car data has been succsessfully updated",
                    "status"  => "true",
                    "data"    => new CarsResource ($car)
                ]);
            }
        }


    }


       public function user_car()
    {
        $user = auth()->id();
        // dd($user);
        $car = Car::where('user_id', $user)->first();

        if ($car) {
            return response()->json([
                "message" => "your car data has been succsessfully updated",
                "status" => "true",
                "data" => new CarsResource($car)
            ]);
        } else {

            return response()->json([
                "message" => "you didn't select your car yet",
                "status" => "false",
                // 'data' => $car
            ]);
        }


    }

    public function years(){
        $years=Year::all();
        return response()->json(["data"=>YearsResource::collection($years)]);
    }

    public function dealer_store_car(Request $request)
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
            if (!$model) {
                return response()->json([
                    "message" => "this model id not found",
                    "status" => "false",
                ]);

            } else {
                $model_name_en = $model->getTranslatedAttribute('name', 'en');
                $model_name_ar = $model->getTranslatedAttribute('name', 'ar');
            }

            $mark = Mark::where('id', $request->mark_id)->first();
            if ($mark) {
                $mark_name_en = $mark->getTranslatedAttribute('name', 'en');
                $mark_name_ar = $mark->getTranslatedAttribute('name', 'ar');
            } else {
                return response()->json([
                    "message" => "this Mark id not found",
                    "status" => "false",
                ]);
            }

            $engine = Engine::where('id', $request->engine_id)->first();
            //$engine_name=$engine->name;
            if ($engine) {
                $engine_name_en = $engine->getTranslatedAttribute('name', 'en');
                $engine_name_ar = $engine->getTranslatedAttribute('name', 'ar');
            } else {
                return response()->json([
                    "message" => "this engine id not found",
                    "status" => "false",
                ]);
            }

             $year = Year::where('id', $request->year_id)->first();
            //$engine_name=$engine->name;
            if ($year) {
                $year_en = $year->getTranslatedAttribute('year', 'en');
                $year_ar = $year->getTranslatedAttribute('year', 'ar');
            } else {
                return response()->json([
                    "message" => "this year id not found",
                    "status" => "false",
                ]);
            }

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


                return response()->json([
                    "message" => "your car data has been succsessfully saved",
                    "status" => "true",
                    'data' => new CarsResource ($car)
                ]);

        }


    }

    public function dealer_update_car(Request $request, $car_id)
    {

        $user = auth()->id();

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
            $car = Car::where('id', $car_id)->where('user_id', $user)->first();

            $model = CarModel::where('id', $request->model_id)->first();
            //dd($model);
            if (!$model) {
                return response()->json([
                    "message" => "this model id not found",
                    "status" => "false",
                ]);

            } else {
                $model_name_en = $model->getTranslatedAttribute('name', 'en');
                $model_name_ar = $model->getTranslatedAttribute('name', 'ar');
            }

            $mark = Mark::where('id', $request->mark_id)->first();
            if ($mark) {
                $mark_name_en = $mark->getTranslatedAttribute('name', 'en');
                $mark_name_ar = $mark->getTranslatedAttribute('name', 'ar');
            } else {
                return response()->json([
                    "message" => "this Mark id not found",
                    "status" => "false",
                ]);
            }

            $engine = Engine::where('id', $request->engine_id)->first();
            //$engine_name=$engine->name;
            if ($engine) {
                $engine_name_en = $engine->getTranslatedAttribute('name', 'en');
                $engine_name_ar = $engine->getTranslatedAttribute('name', 'ar');
            } else {
                return response()->json([
                    "message" => "this engine id not found",
                    "status" => "false",
                ]);
            }
              $year = Year::where('id', $request->year_id)->first();
            //$engine_name=$engine->name;
            if ($year) {
                $year_en = $year->getTranslatedAttribute('year', 'en');
                $year_ar = $year->getTranslatedAttribute('year', 'ar');
            } else {
                return response()->json([
                    "message" => "this year id not found",
                    "status" => "false",
                ]);
            }

            $name_en = $model_name_en . " " . $mark_name_en . " " . $engine_name_en . " " . $year_en;
            $name_ar = $model_name_ar . " " . $mark_name_ar . " " . $engine_name_ar . " " . $year_ar;


            if (!$car) {

                return response()->json([
                    "message" => "no car found with this id belongs to this dealer",
                    "status" => "false",
                    // 'data' => $car
                ]);
            } else {
                $car->update([
                    'model_id' => $request->model_id,
                    'mark_id' => $request->mark_id,
                    'engine_id' => $request->engine_id,
                    'year' => $request->year_id,
                    'name_en' => $name_en,
                    'name_ar' => $name_ar,
                    'user_id' => $user,
                ]);

                return response()->json([
                    "message" => "your car data has been succsessfully updated",
                    "status" => "true",
                    'data' => new CarsResource ($car)
                ]);
            }
        }

    }

    public function Dealer_cars()
    {
        if(auth()->user()){
            $user = auth()->id();
            $car = Car::where('user_id', $user)->get();
            if (count($car) > 0) {
                return response()->json([
                    "message" => "your car data has been succsessfully returnd",
                    "status" => "true",
                    "data" =>  CarsResource::collection($car)
                ]);
            } else {

                return response()->json([
                    "message" => "you didn't select your car yet",
                    "status" => "false",
                     'data' => []
                ]);
            }
        }else{
            return response()->json([
                'message' => 'sorry you are Not Auth',
                "status"=>false,

            ]);
        }


    }

    public function delete_car($car_id){
        $user = auth()->id();
         $car = Car::where('id', $car_id)->where('user_id', $user)->first();

         if($car){

            $car->delete();
             return response()->json([
                "message" => "your car data has been succsessfully deleted",
                "status" => "true",
                //"data" =>  CarsResource::collection($car)
            ]);

         }else{
             return response()->json([
                "message" => "This car not found",
                "status" => "false",
                // 'data' => $car
            ]);
         }

    }

}
