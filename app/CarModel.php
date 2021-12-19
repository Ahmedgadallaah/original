<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use TCG\Voyager\Traits\Translatable;
class CarModel extends Model
{

    
     use Translatable;
    protected $translatable = [ 'name'];

    public function mark () {
        return $this->belongsTo(Mark::class ,'mark_id');
     }
    public function engines () {
        return $this->belongsToMany(Engine::class ,'car_model_engines');
     }

     public function years () {
        return $this->belongsToMany(Year::class ,'car_model_years');
     }
}
