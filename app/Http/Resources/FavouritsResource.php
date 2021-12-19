<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FavouritsResource extends JsonResource
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
            'id'        =>$this->id,
            'product'     =>new ProductsResource($this->product),
            'user'      =>new UsersResource($this->user),
        ];
    }
}
