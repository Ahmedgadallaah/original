<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class DiscountUser extends Model
{
    protected $fillable=['user_id','discount_id'];
}
