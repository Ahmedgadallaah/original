<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DiscountsResource extends JsonResource
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
            'pounds'=>$this->pounds,
            'promocode'=>$this->promocode,
            'start Date'=>$this->start_date,
            'end Date'=>$this->end_date,
        ];
    }
}
