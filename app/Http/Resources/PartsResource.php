<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


class PartsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)



    {

        $image= json_decode($this->image);
        // dd($image);
        $images = [];
        if($image){
            foreach ($image as $img){
                array_push($images , url('/public/storage/'.$img));
            }
        }

         if(is_null($this->prices)){
            $c='parts_prices'=>PartPricesResource::collection($this->prices);
            }
            else{
                $c=""
            }

            return [
            'id'=>$this->id,
            'name'=>$this->name,
            'image'=> $images?$images:[],
            'quantity'=>$this->quantity,
            'address'=> $this->address,
            'comment'=>$this->comment,
            'status'=>$this->status,

            'user'=>new UsersResource($this->user),
            'mark'=>new MarksResource($this->mark),
            'model'=>new ModelsResource($this->model),
            'engine'=>new EnginesResource($this->engine),
            'year'=>new YearsResource($this->year),
            'created_at'=>$this->created_at,
        ];
    }
}
