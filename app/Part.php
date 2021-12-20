<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use TCG\Voyager\Traits\Spatial;
use App\Models\User;
class Part extends Model
{
    //use Spatial;

    protected $appneds = ['main_image'];
    protected $fillable = ['name','image','quantity','comment','user_id','address','status','mark_id','car_model_id','engine_id','year_id'];

    public function user(){

        return $this->belongsTo(User::class ,'user_id');
    }

    public function mark(){

        return $this->belongsTo(Mark::class ,'mark_id');
    }
    public function model(){

        return $this->belongsTo(CarModel::class ,'car_model_id');
    }
    public function engine(){

        return $this->belongsTo(Engine::class ,'engine_id');
    }
    public function year(){

        return $this->belongsTo(Year::class ,'year_id');
    }

    public function prices(){
        return $this->hasMany(PartPrice::class,'part_id');
    }

    public function getMainImageAttribute()
    {
        if ($this->image) {
            $images = json_decode($this->image);
            return $images[0] ?? null;
        }
        return [];
    }
}
