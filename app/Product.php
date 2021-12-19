<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use TCG\Voyager\Traits\Spatial;
use TCG\Voyager\Models\Category;
use TCG\Voyager\Models\User;
use TCG\Voyager\Traits\Translatable;

class Product extends Model
{
      use Spatial;

    protected $spatial = ['address'];
    protected $fillable = [
                            'name',
                           'image',
                           'images',
                           'category_id',
                           'price',
                           'dealer_id',
                           'car_id',
                           'quantity',
                           'made_in',
                           'used',
                           'approve',
                           'delivery_cost',
                           'guarante',
                           'guarante_period',
                           'shop_id',
                           'similar_id',
                           'offer_id',
                           'percentage'
                        ];

      use Translatable;

    protected $translatable = ['name','made_in','guarante_period'];

    public function attributes () {
        return $this->belongsToMany(Attribute::class ,'attribute_products');
    }

    public function category () {
        return $this->belongsTo(Category::class ,'category_id');
    }

    public function dealer () {
        return $this->belongsTo(User::class ,'dealer_id');
    }

    public function car () {
        return $this->belongsTo(Car::class ,'car_id');
    }

    public function shop () {
        return $this->belongsTo(Shop::class ,'shop_id');
    }

    public function offer () {
        return $this->belongsTo(Offer::class,'offer_id');
    }

        public function rate () {
        return $this->hasMany(ProductRating::class);
    }

    public function discount () {
        return $this->hasMany(Discount::class);
    }

        public function oitems () {
        return $this->hasMany(OrderItem::class);
    }

    public function scopeProd($query){
        $prodsIds=  DB::table('discounts')->pluck('product_id')->toArray();

        return $query->whereNotIn('id' , $prodsIds);
    }
  }

