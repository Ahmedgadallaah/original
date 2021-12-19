<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderItemsResource extends JsonResource
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
            'order' =>  new OrderUsersResource($this->order),
            'quantity'=>$this->product_qty,
            'dealer' =>  new DealersResource($this->dealer),
            'product' =>  new ProductsResource($this->product),
            'created_at'=>$this->created_at
        ];
    }
}
