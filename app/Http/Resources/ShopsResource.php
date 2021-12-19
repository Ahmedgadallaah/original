<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ShopsResource extends JsonResource
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
            'name' => $this->name,     
            'phone' => $this->phone,
            'dealer'=>new DealersResource($this->dealer),
            'area' => isset($this->area) ?[
                'id' => $this->area->id,
                'name_en' => $this->area->getTranslatedAttribute('name' ,'en'),
                'name_ar' => $this->area->getTranslatedAttribute('name' ,'ar'),
            ] :"" ,
            'address' => $this->address,
            'trade' =>TradesResource::collection($this->trades),
            'cars' => CarsResource::collection($this->cars),
            'categories' => CategoriesResource::collection($this->categories),

        ];
    }
}
