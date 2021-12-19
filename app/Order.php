<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Models\User;
use TCG\Voyager\Traits\Spatial;

class Order extends Model
{
    use Spatial;

    protected $spatial = ['location'];

    protected $fillable = ['user_id' , 'cart_id','total_price','status','location' , 'phone','name','discount_id','reason','address'];


    public function order_items()
    {
        return $this->hasMany(OrderItem::class,'order_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function offer(){
        return $this->belongsTo(Offer::class);
    }

    public function discount(){
        return $this->belongsTo(Discount::class);
    }
}


