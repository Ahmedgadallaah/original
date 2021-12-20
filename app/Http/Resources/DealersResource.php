<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\DealerRating;
class DealersResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
      return [
            'id'=>$this->id,
            'name'=>$this->name,
            'avatar'=>$this->avatar?url('/public/storage/'.$this->avatar):"",
            'email'=>$this->email,
            'phone'=>$this->phone,
            'phone_verified'=>$this->phone_verified?$this->phone_verified:0,
            'type'=>$this->type,
            'address' => $this->address,
            'point' =>$this->point,
            'approve'=>$this->approve,
            'trusted'=>$this->trusted,
            'login'=>$this->login,
            'valid_to'=> $this->valid_to,
            'provider'=> $this->provider,
            'provider_id'=> $this->provider_id,
            'shop'=>$this->shop?1:0,
            'ratings'=> DealerRatingsResource::collection($this->whenLoaded('rates')) ,
            'cars'=> CarsResource::collection($this->whenLoaded('cars')),
            'shop'=> ShopsResource::collection($this->whenLoaded('shop')),
            'total_rating'=>number_format((float)( DealerRating::where('dealer_id' , $this->id )->avg('rate')), 1)??0,

        ];
    }
}
