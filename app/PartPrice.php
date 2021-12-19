<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Models\User;
class PartPrice extends Model
{
    protected $fillable=['id','dealer_id','part_id','price'];

    public function part(){
        return $this->belongsTo(Part::class);
    }
    
     public function dealer(){

        return $this->belongsTo(User::class );
    }
}
