<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use TCG\Voyager\Traits\Spatial;
// use TCG\Voyager\Traits\Translatable;
use TCG\Voyager\Models\User;
use App\Car;
use App\TradeType;
use App\Address;
use TCG\Voyager\Models\Category;
class Shop extends Model
{
    //use Spatial;
    //protected $spatial = ['address'];
  // use Translatable;

     protected $fillable = ['name','phone','address','dealer_id','address_id'];
      public function dealer () {
        return $this->belongsTo(User::class ,'dealer_id');
    }

    public function area () {
        return $this->belongsTo(Address::class ,'address_id');
    }

     public function cars () {
        return $this->belongsToMany(Car::class ,'car_shops','shop_id','car_id');
    }

     public function trades () {
        return $this->belongsToMany(TradeType::class ,'shop_trade_types','shop_id','trade_type_id');
    }
         public function categories () {
        return $this->belongsToMany(Category::class ,'category_shops' ,'shop_id','category_id' );
    }
}
