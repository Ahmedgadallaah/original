<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CartsResource extends JsonResource
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
            'user'=>new UsersResource($this->user),
            'discount'=>$this->discount?new DiscountsResource($this->discount):"",
            'cartitems'=>  CartItemsResource::collection($this->cartItems),
            


        ];
    }
}
