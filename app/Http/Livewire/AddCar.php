<?php

namespace App\Http\Livewire;

use App\CarModel;
use App\Engine;
use App\Mark;
use App\Year;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AddCar extends Component
{

    public $marks = [];
    public $models = [];
    public $engines = [];
    public $years = [];
    public $mark , $model;

    public function mount()
    {

        $this->marks = Mark::all();
        $this->models = CarModel::all();
        $this->engines = Engine::all();
        $this->years = Year::all();
    }

    public function updated() {

        if(!is_null($this->mark)){
            $this->models = CarModel::where('mark_id', $this->mark)->get();
        }
        if(!is_null($this->model)){
          $engineIds =   DB::table('car_model_engines')->where('car_model_id' , $this->model)->pluck('engine_id')->toArray();
          $this->engines = Engine::whereIn('id' , $engineIds)->get();
          $yearIds =   DB::table('car_model_years')->where('car_model_id', $this->model)->pluck('year_id')->toArray();
          $this->years = year::whereIn('id', $yearIds)->get();
        }

    }

    public function render()
    {


        return view('livewire.add-car' , [
            'marks' => $this->marks,
            'models' =>$this->models ,
            'engines' => $this->engines,
            'years' => $this->marks
        ]);
    }
}
