<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CarModel;
use App\Mark;
use App\Year;
use App\Engine;
use App\Http\Resources\ModelsResource;
use App\Http\Resources\ModelEnginesResource;
use App\Http\Resources\ModelYearsResource;

class ModelsController extends Controller
{
    public function models()
    {
        $data=CarModel::all();
        return ModelsResource::collection($data);
    }

    public function modelsByMark($id){
        $data=CarModel::where('mark_id',$id)->get();
        return ModelsResource::collection($data);
    }


    public function singleModel($id){
        $data=CarModel::find($id);
        // return $data;
        return new ModelsResource($data);
    }

    public function singleModelEngines($id){
        $data=CarModel::find($id);
        // return $data;
        return new ModelEnginesResource($data);
    }

    public function singleModelYears($id){
        $data=CarModel::find($id);
        // return $data;
        return new ModelYearsResource($data);
    }
}
