<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class AnimalForm extends Component
{
    use WithPagination;
public $nombre;
public $buscador;
public $campoorden="id";
public $orden="asc";
public function render()
{
    $veterinarios=DB::table('users')->where('rol_id', 2)->where('nombre','like','%'.$this->buscador.'%')
    ->orderBy($this->campoorden,$this->orden)
    ->get();
    return view('livewire.animal-form')->with('veterinarios', $veterinarios);
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

}
