<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EnginesResource extends JsonResource
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
            'name_en'=>$this->getTranslatedAttribute('name','en' ),
            'name_ar'=>$this->getTranslatedAttribute('name','ar' ),
        ];
    }
}
