<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Part;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use DB;
use App\PartPrice;
use App\Http\Resources\PartsResource;
use App\Http\Resources\PartPricesResource;

class PartsController extends Controller
{
    public function parts(){
        $parts=Part::all();
        return response()->json(
          PartsResource::collection($parts),

        );
    }

    public function single_part($id){
        $part=Part::where('id',$id)->first();
        return response()->json(
            new PartsResource($part),
        );
    }

    public function delete_part($id){
        $part=Part::where('id',$id)->first();
        if($part){
            $part->delete();
             return response()->json(
                 [
                     "message"=>"Part Deleted Successfully",
                 ]
             );
        }else{
             return response()->json(
                 [
                     "message"=>"No Part Founded",
                 ]
             );
        }

    }

     public function available(){
        $user = auth()->id();
         $part=Part::where('status',1)->where('user_id',$user)->orderBy('updated_at' , 'desc')->paginate(30);
         return
             PartsResource::collection($part);
    }

    public function pending(){
        $user = auth()->id();
        $part=Part::where('status',0)->where('user_id',$user)->orderBy('updated_at' , 'desc')->paginate(30);
        return
            PartsResource::collection($part);

    }
    public function inavailable(){
        $user = auth()->id();
        $part=Part::where('status',2)->where('user_id',$user)->orderBy('updated_at' , 'desc')->paginate(30);
        return PartsResource::collection($part);
    }

    public function store_part(Request $request){


        $user = auth()->id();
        $v = Validator::make($request->all(),
            [
                // 'name' => 'required',
                // 'address' => 'required',
                // 'quantity' => 'required',
                // 'comment' => 'required',
                // 'image' => 'required',
                // 'status' => 'required',
                // 'mark_id' => 'required',
                // 'model_id' => 'required',
                // 'engine_id' => 'required',
                // 'year_id' => 'required',

            ]);
        $result=[];
        $img = $request->image;
        if ($request->hasFile('image')) {
                foreach($img as $imgs){
                $fileName = 'parts/apis/' . time() . $imgs->getClientOriginalName();
                $imgs->move(public_path('../storage/app/public/parts/apis/'), $fileName);

                array_push($result,$fileName);
                }
        }
        if ($v->fails()) {
            $errors = $v->errors();
            foreach ($errors->all() as $message) {
                return response(['error' => $message]);
            }
        } else {
            $part=Part::create([
                'id'=>$request->id,
                'address' => $request->address,
                'name'=>$request->name,
                'quantity'=>$request->quantity,
                'comment'=>$request->comment,
                'status'=>$request->status,
                'image'=>$result? json_encode($result):"",
                'user_id'=>$user,
                'mark_id'=>$request->mark_id,
                'car_model_id'=>$request->model_id,
                'engine_id'=>$request->engine_id,
                'year_id'=>$request->year_id,
            ]);
        }
        return response([
            "message" => "your Part data has been successfully stored",
            "status"  => "true",
            'data' => new PartsResource($part)]);


    }

    public function update_part(Request $request , $id){
        $user = auth()->id();
        $part=Part::where('id',$id)->first();

        $v = Validator::make($request->all(),
            [
                // 'name' => 'required',
                // 'address' => 'required',
                // 'quantity' => 'required',
                // 'comment' => 'required',
                // 'image' => 'required',
                // 'status' => 'required',
                // 'mark_id' => 'required',
                // 'model_id' => 'required',
                // 'engine_id' => 'required',
                // 'year_id' => 'required',
            ]);
        $result=[];
        $img = $request->image;
        if ($request->hasFile('image')) {
                foreach($img as $imgs){
                $fileName = 'parts/apis/' . time() . $imgs->getClientOriginalName();
                $imgs->move(public_path('../storage/app/public/parts/apis/'), $fileName);

                array_push($result,$fileName);
                }
        }
            if ($v->fails()) {
            $errors = $v->errors();
            foreach ($errors->all() as $message) {
                return response(['error' => $message]);
            }
        } else {
        $part->update([
                'id'=>$request->id,
                'address' => $request->address?$request->address:$part->address,
                'name'=>$request->name?$request->name:$part->name,
                'quantity'=>$request->quantity?$request->quantity:$part->quantity,
                'comment'=>$request->comment?$request->comment:$part->comment,
                'status'=>$request->status?$request->status:$part->status,
                'image'=>$result? json_encode($result):$part->image,
                'user_id'=>$user,
                'mark_id'=>$request->mark_id?$request->mark_id:$part->mark_id,
                'car_model_id'=>$request->model_id?:$part->car_model_id,
                'engine_id'=>$request->engine_id?$request->engine_id:$part->engine_id,
                'year_id'=>$request->year_id?$request->year_id:$part->year_id,
                ]);

                return response()->json([
                    "message" => "your Part data has been succsessfully updated",
                    "status"  => "true",
                    "data"    => new PartsResource ($part)
                ]);


        }
    }

    public function dealer_pending_parts(){

        $part=Part::where('status',1)->paginate(30);
        return  PartsResource::collection($part)
        ;
    }

     public function store_part_price(Request $request)
    {
        $v = Validator::make($request->all(),
            [
                'price' => 'required|numeric',

            ]);

        if ($v->fails()) {
            $errors = $v->errors();
            foreach ($errors->all() as $message) {
                return response(['error' => $message]);
            }
        }
     //  return auth()->id();

        $price = PartPrice::firstOrCreate([
        'dealer_id' => auth()->id(),
        'part_id' => $request->part_id
         ], [
                'price' => $request->price,
                'dealer_id' => auth()->id(),
                'part_id' => $request->part_id
         ]);

        // $rate = ProductRating::where('user_id', auth()->id())->firstOrNew([
        //         'rate' => $request->rate,
        //         'product_id' => $request->product_id,
        //         'review' => $request->review,
        //         'user_id' => auth()->id(),
        //     ]);
        if ($price->wasRecentlyCreated) {

        return response()->json([

            'message' => 'Part Price Offer Successfully Created' ,
            'status'=>true,
            'new'=>true,
            'data' => new PartPricesResource($price)
        ]);
    }else{

        return response()->json([

            'message' => 'Product Rating Successfully Created' ,
            'status'=>true,
            'new'=>false,
            'data' => new PartPricesResource($price)
        ]);
    }

    }
}
