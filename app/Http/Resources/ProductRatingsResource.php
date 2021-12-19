<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductRatingsResource extends JsonResource
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
            'id'                        =>$this->id,
            'rate'                  =>$this->rate?$this->rate:0, 
            'product_id'            =>$this->product_id,             
            'user'                =>new UsersResource($this->user), 
            'review'                 =>$this->review?$this->review:"",
            'created_at' => $this->created_at,
        ];
    }
}
