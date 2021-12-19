<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductOffersResource extends JsonResource
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
            'percentage'=>$this->percentage,
            'product'=>$this->product? ProductsResource::collection($this->product):"", 
            
        ];
    }
}
