<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use TCG\Voyager\Models\User;
use App\OrderItem;
class OrderUsersResource extends JsonResource
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
            'id'=> $this->id,
            'user' => new  UsersResource($this->user) ,
            'name' =>$this->name,
            'phone' =>$this->phone,
            'address' => $this->address ,
            'order_status' => $this->status,
            // 'total_items_quantity' => OrderItem::where('order_id' , $this->id)->sum('product_qty')? OrderItem::where('order_id' , $this->id)->sum('product_qty'):"0",
            // 'items' => OrderItemsResource::collection($this->order_items) ,
            'discount' =>new  DiscountsResource($this->discount) ,
            'total_price' => $this->total_price,
            'total_price_after_discount' =>$this->discount? $this->total_price -$this->discount->pounds:$this->total_price, 
            'updated_at'=>$this->updated_at,
            'created_at'=>$this->created_at
        ];
    }
}
