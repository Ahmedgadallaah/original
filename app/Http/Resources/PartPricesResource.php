<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PartPricesResource extends JsonResource
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
            'price'=>$this->price,
            'part_id'=>$this->part_id,
            'dealer'=> new DealersResource($this->dealer),


        ];
    }
}
