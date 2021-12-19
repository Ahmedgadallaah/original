<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Rating extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function product(){
        return $this->belongsTo(Offer::class,'rateable_id');
    }
}
