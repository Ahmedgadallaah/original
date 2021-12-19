<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Models\User;

class Cart extends Model
{
    protected $table = 'carts';

    protected $fillable = ['user_id','discount_id'];

    public function cartItems()
    {
        return $this->hasMany(CartItem::class , 'cart_id');
    }


    public function user()
    {
        return $this->belongsTo(User::class );
    }

    public function discount()
    {
        return $this->belongsTo(Discount::class );
    }
}
