<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Car;
use Illuminate\Support\Facades\Auth;

class CreateCar extends Component
{
    use WithFileUploads;
    public $mostrar = false;
    public $matricula,$modelo,$marca,$year,$fecha_ultima_revision,$color,$precio,$foto;
    protected $rules=[
'matricula'=>'required|max:7|unique:cars',
'marca'=>'required',
'modelo'=>'required',
'year'=>'required|numeric',
'color'=>'required',
'fecha_ultima_revision'=>'required|date',
'precio'=>'required|numeric',
'foto'=>'required|image'

    ];
    public function render()
    {
        return view('livewire.create-car');
    }
    public function valorForm(){
        if($this->mostrar==true)
            $this->mostrar = false;
        else 
        $this->mostrar = true;
    }
        public function guardar(){
            $this->validate();
            $nombrefoto=time()."-".$this->foto->getClientOriginalName();
            $this->foto->storeAs('public/img_cars',$nombrefoto);
            Car::create([
                'matricula'=>$this->matricula,
                'marca'=>$this->marca,
                'modelo'=>$this->modelo,
                'year'=>$this->year,
                'color'=>$this->color,
                'fecha_ultima_revision'=>$this->fecha_ultima_revision,
                'precio'=>$this->precio,
                'user_id'=>Auth::user()->id,
                'foto'=>$nombrefoto,
            ]);
            $this->mostrar= false;
$this->reset('matricula','marca','modelo','year','color','fecha_ultima_revision','precio');
            $this->emit('createcar');
            

        }

        public function updated($propiedad){
            $this->validateOnly($propiedad);
        }
    
}
