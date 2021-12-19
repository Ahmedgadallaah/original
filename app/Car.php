<?php

namespace App;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
// use TCG\Voyager\Traits\Translatable;

class Car extends Model
{

    //  use Translatable;
    // protected $translatable = ['name'];

    protected $fillable=['model_id','mark_id','engine_id','year_id','name_en','name_ar','user_id'];
    public function carModel () {
        return $this->belongsTo(CarModel::class ,'model_id');
    }

    public function mark () {
        return $this->belongsTo(Mark::class ,'mark_id');
    }

    public function user () {
        return $this->belongsTo(User::class ,'user_id');
    }

    public function users () {
        return $this->belongsToMany(User::class ,'car_users');
    }

    public function engine () {
        return $this->belongsTo(Engine::class ,'engine_id');
    }

    public function year () {
        return $this->belongsTo(Year::class ,'year_id');
    }

    
     public function shops () {
        return $this->belongsToMany(Shop::class ,'car_shops' ,'car_id' ,'shop_id');
    }
}
