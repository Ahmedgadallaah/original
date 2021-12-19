<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Order;
use App\OrderItem;
use App\Address;
use App\TradeType;
use App\Chat;
use App\Http\Resources\SlidesResource;
use App\Http\Resources\AddressesResource;
use App\Http\Resources\TradesResource;
class SlidesController extends Controller
{
     public function home_sliders($num)
    {
        $data=Slide::take($num)->get();
        return SlidesResource::collection($data);
    }

     public function addresses()
    {
        $data=Address::all();
         return AddressesResource::collection($data);
    }
    public function trade_types()
    {
        $data=TradeType::all();
        return TradesResource::collection($data);
    }
    
    public function file (Request $request){

         $img = $request->file;
        if ($request->hasFile('file')) {
            $fileName = '/chats/apis/' . time() . $img->getClientOriginalName();
            $img->move(public_path('../storage/app/public/chats/apis/'), $fileName);
            $fileName=url('/public/storage/').$fileName;

        }

        $chat = chat::create([
                'file' => $fileName,
                'type' => $request->type
        ]);

         return response()->json([

                'message' => 'You have upload an file(voice or image).',
                "status"=>true,
                'data' => $chat,
                
        ]);
            

    }

    
}
