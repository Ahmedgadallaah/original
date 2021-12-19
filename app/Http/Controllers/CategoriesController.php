<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TCG\Voyager\Models\Category;
use App\Http\Resources\CategoriesResource;
class CategoriesController extends Controller
{
       public function home_categories($num)
    {
        $data=Category::take($num)->get();
        return CategoriesResource::collection($data);
    }
}
