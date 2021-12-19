<?php

namespace App;
use App\Product;
use App\Order;
use TCG\Voyager\Models\User;

use Illuminate\Database\Eloquent\Model;


class OrderItem extends Model
{
    protected $table = 'order_items';

    protected $fillable = ['order_id' , 'product_id','product_name','product_price','product_qty','product_dealer_id','product_total'];




    public function order()
    {
        return $this->belongsTo(Order::class,'order_id');
    }

       public function dealer()
    {
        return $this->belongsTo(User::class,'product_dealer_id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id' );
    }
}
