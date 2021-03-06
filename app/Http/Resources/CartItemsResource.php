<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CartItemsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
 return[
                'id' => $this->id,
                'qty' => $this->qty,
                'product' =>  new ProductsResource($this->product),
                'price'=>$this->price,
                'price_after_discount'=>$this->price_after_discount,
        ];
        }
}
