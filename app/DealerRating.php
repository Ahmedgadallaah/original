<?php

namespace App;
use TCG\Voyager\Models\User;
use Illuminate\Database\Eloquent\Model;


class DealerRating extends Model
{
    protected $fillable = ['id','rate','review','user_id','dealer_id'];
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function dealer(){
        return $this->belongsTo(User::class,'dealer_id');
    }
}
