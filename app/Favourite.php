<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Models\User;

class Favourite extends Model
{
    protected $fillable=['id','user_id','product_id'];

    public function product () {
        return $this->belongsTo(Product::class ,'product_id');
    }
    public function user () {
        return $this->belongsTo(User::class ,'user_id');
    }
}
