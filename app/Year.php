<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Year extends Model
{
     use Translatable;
    protected $translatable = [ 'year'];
    
    public function models () {
        return $this->belongsToMany(Year::class ,'car_model_years');
     }
}
