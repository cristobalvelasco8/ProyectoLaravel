<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Car;

class CarForm extends Component
{
    use WithPagination;
    protected $listeners=['createcar'=>'render'];
    public $nombre;
    public $buscador;
    public $campoorden="id";
    public $orden="desc";
    public function render()
    {
        $cars=Car::where('matricula','like','%'.$this->buscador.'%')
        ->orderBy($this->campoorden,$this->orden)
        ->paginate(3);
        return view('livewire.car-form')->with('cars', $cars);
    }

    public function ordenar($campo){
        if($this->campoorden==$campo){
            if($this->orden=="desc")
            $this->orden = "asc";
            else 
            $this->orden="desc";
        }
        else {
            $this->campoorden=$campo;
            $this->orden="asc";
        }


    }

    public function updatingBuscador(){
        $this->resetPage();
    }
}
