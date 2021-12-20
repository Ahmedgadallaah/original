<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\ProductRating;

class ProductsResource extends JsonResource
{


    public function toArray($request)
    {

        $image = json_decode($this->images);
        $images = [];
        if ($image) {
            foreach ($image as $img) {
                array_push($images, url('storage/'. $img)  );
            }
        }

        return [
            'id' => $this->id,
            'name_en' => $this->getTranslatedAttribute('name', 'en'),
            'name_ar' => $this->getTranslatedAttribute('name', 'ar'),
            'image' => $this->image ? url('storage/'. $this->image): "",
            'images' => $images ? $images : [],
            'price' => $this->price,
            'quantity' => $this->quantity,
            'made_in_en' => $this->getTranslatedAttribute('made_in', 'en'),
            'made_in_ar' => $this->getTranslatedAttribute('made_in', 'ar'),
            'used' => $this->used,
            'created_at' => $this->created_at,
            'approve' => $this->approve,
            'delivery_cost' => $this->delivery_cost,
            'guarante' => $this->guarante,
            'percentage' => $this->percentage,
            'guarante_period_en' => $this->getTranslatedAttribute('guarante_period', 'en'),
            'guarante_period_ar' => $this->getTranslatedAttribute('guarante_period', 'ar'),
            'category' => new CategoriesResource($this->category),
            'dealer' => new DealersResource($this->dealer),
            'car' => new CarsResource($this->car),
//          'shop'                      =>new ShopsResource($this->shop),
            //'offer' => new OffersResource($this->offer),
            'attributes' =>  AttributesResource::collection($this->attributes),
            'ratings' => ProductRatingsResource::collection($this->rate),
            'total_rating' => number_format((float)(ProductRating::where('product_id', $this->id)->avg('rate')), 1),
        ];
    }
}

