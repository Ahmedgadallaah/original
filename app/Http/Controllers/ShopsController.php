<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop;
use TCG\Voyager\Models\User;
use  App\Http\Resources\ShopsResource;
use Illuminate\Support\Facades\Validator;
class ShopsController extends Controller
{
    public function Shop_By_Dealer(){
        
        //dd($userId);
        if(auth()->user()){
            $userId = auth()->id();
            $data=Shop::where('dealer_id',$userId)->first();
            if($data){
            return response()->json([
                'message' => 'Dealer Shop Successfully Returned',
                "status"=>true,
                "data" => new ShopsResource($data)
            ]);
            }else{
                return response()->json([
                'message' => 'sorry there is no data',
                "status"=>false,
                "data"=>[]
             ]);
           }
        }else{
            return response()->json([
                'message' => 'sorry you are Not Auth',
                "status"=>false,
            
            ]);
        }

    
    }

    public function update_shop(Request $request){
        $userId = auth('api')->user()->id;
        $shop=Shop::where('dealer_id',$userId)->first();


        if($shop){
            $v = Validator::make($request->all(), [
            'name' => 'max:255',            
            ]);
            $errors = $v->errors();
            if ($v->fails()) {
            foreach ($errors->all() as $message) {
                return response()->json($message);
            }
            } 
            $shop->update([
                'name'=> $request->name?$request->name:$shop->name,
                'phone'=> $request->phone?$request->phone:$shop->phone,
                'dealer_id'=>$shop->dealer_id,
                'address_id'=> $request->address_id?$request->address_id:$shop->address_id,
                'address'=> $request->address?$request->address:$shop->address,
            ]);
            
            //return $shop->cars->pluck('id')->toArray()
            $cars=$request->cars;
            $car= array_map('intval', explode(",", $cars));
            
            $trades=$request->trades;
            $trade= array_map('intval', explode(",", $trades));
            
            $categories=$request->categories;
            $category= array_map('intval', explode(",", $categories));
            

            $shop->cars()->sync($car);
            $shop->categories()->sync($category);
            $shop->trades()->sync($trade);

            

            return response()->json([
                "message"=>"data updated Successfully",
                "status"=>true,
                "type"=>'update',
                "data"=> new ShopsResource($shop),
        
            
            ]);
       }else{
         $v = Validator::make($request->all(), [
            'name' => 'max:255',            
            ]);
            $errors = $v->errors();
            if ($v->fails()) {
            foreach ($errors->all() as $message) {
                return response()->json($message);
            }
            } 
            $data=Shop::create([
                'name'=> $request->name?$request->name:$shop->name,
                'phone'=> $request->phone?$request->phone:$shop->phone,
                'dealer_id'=>$userId,
                'address_id'=> $request->address_id,
                'address'=> $request->address,
            ]);
            
            //return $shop->cars->pluck('id')->toArray()
            
            $cars=$request->cars;
            $car= array_map('intval', explode(",", $cars));
            
            $trades=$request->trades;
            $trade= array_map('intval', explode(",", $trades));
            
            $categories=$request->categories;
            $category= array_map('intval', explode(",", $categories));
            

            $data->cars()->sync($car);
            $data->categories()->sync($category);
            $data->trades()->sync($trade);

            

            return response()->json([
                "message"=>"data updated Successfully",
                "status"=>true,
                "type"=>'new',
                "data"=> new ShopsResource($data),
        
            
            ]);
       }


        return $shop;
    }
    


}
