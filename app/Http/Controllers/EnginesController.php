<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Engine;
use App\Http\Resources\EnginesResource;
class EnginesController extends Controller
{
      public function engines()
    {
        
        $data=Engine::all();
        return EnginesResource::collection($data);
    }

}
