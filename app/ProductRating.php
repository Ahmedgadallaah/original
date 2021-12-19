<?php

namespace App;
use TCG\Voyager\Models\User;
use Illuminate\Database\Eloquent\Model;


class ProductRating extends Model
{
    protected $fillable = ['rate','review','user_id','product_id'];
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
