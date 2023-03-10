<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Client;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Guardar los datos del usuario que está logueado
        $user = User::find(Auth::id());
        //Consulta multitabla para sacar los animales del usuario autentificado
        $animales = $user->animals()->get();
        return view('veterinarios')->with('animales', $animales);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('animal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'nombre.required' => 'El campo nombre es obligatorio',
            'especie.required' => 'El campo especie es obligatorio',
            'raza.required' => 'El campo raza es obligatorio',
            'vacunas.required' => 'El campo número de vacunas es obligatorio',
            'vacunas.numeric' => 'Debes de escribir un número',
            'descripcionVacunas.required' => 'El campo descripción de vacunas es obligatorio',
            'fotoAnimal.required' => 'El campo foto del animal es obligatorio',
            'client_id.required' => 'Debes seleccionar un cliente'
        ];

        $validate = $request->validate([
            'nombre' => 'required',
            'especie' => 'required',
            'raza' => 'required|',
            'vacunas' => 'required|numeric',
            'descripcionVacunas' => 'required',
            'fotoAnimal' => 'required|image',
            'client_id' => 'required',
        ],$messages);

        try {
            $newAnimal = new Animal();

            $newAnimal ->nombre = $request->nombre;
            $newAnimal ->raza = $request->raza;
            $newAnimal ->especie = $request->especie;
            $newAnimal ->vacunas = $request->vacunas;
            $newAnimal ->descripcionVacunas = $request->descripcionVacunas;
            $newAnimal ->estado = "en cola";
            $newAnimal ->user_id = Auth::id();
            $newAnimal ->client_id = $request->client_id;
            $nombrefoto = time() . "_" . $request->file('fotoAnimal')->getClientOriginalName();
            $newAnimal ->foto = $nombrefoto;
            $newAnimal ->save();

            $request->file('fotoAnimal')->storeAs('public/img_animals', $nombrefoto);

            return redirect()->route('veterinario');
        } catch (QueryException $exception) {
            return $exception->errorInfo;
    
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $animales = Animal::findOrFail($id);
        $cliente = Client::findOrFail($animales->client_id);
        return view('factura')->with('animales', $animales)->with('cliente', $cliente);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $animales = Animal::findOrFail($id);

        $animales->delete();

        return redirect()->route('animal.index');
    }
}