<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Product;
use App\Cart;
class CartItem extends Model
{
    protected $table = 'cart_items';

    protected $fillable = ['cart_id' , 'product_id','qty','price','price_after_discount'];


    public function cart()
    {
        return $this->belongsTo(Cart::class , 'cart_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class );
    }

}

