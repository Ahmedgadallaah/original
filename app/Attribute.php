<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use TCG\Voyager\Traits\Translatable;
class Attribute extends Model
{
    use Translatable;

    protected $translatable = ['name'];

    public function products () {
        return $this->belongsToMany(Product::class ,'attribute_products');
    }
    
}
