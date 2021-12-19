<?php

namespace App;
use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;


class TradeType extends Model
{
     use Translatable;

    protected $translatable = ['name'];

     public function shops () {
        return $this->belongsToMany(Shop::class ,'shop_trade_types','trade_type_id','shop_id');
    }
}
