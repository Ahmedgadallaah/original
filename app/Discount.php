<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use TCG\Voyager\Models\User;
class Discount extends Model
{
public function users(){
    return $this->belongsToMany(User::class,'discount_users');
}

}
