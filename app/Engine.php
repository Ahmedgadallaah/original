<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use TCG\Voyager\Traits\Translatable;
    
class Engine extends Model
{
     use Translatable;
    protected $translatable = ['name'];

    public function models () {
        return $this->belongsToMany(CarModel::class ,'car_model_engines');
     }
}
