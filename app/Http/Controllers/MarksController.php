<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mark;
use App\Http\Resources\MarksResource;

class MarksController extends Controller
{
    public function marks()
    {

        $data=Mark::all();
        return MarksResource::collection($data);
    }
}
