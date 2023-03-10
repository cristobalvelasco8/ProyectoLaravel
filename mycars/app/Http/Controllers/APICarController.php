<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApiCarRequest;
use Illuminate\Http\Request;
use App\Models\Car;

class APICarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $car=Car::all();
        return response()->json([
           'status'=>true,
           'car' => $car
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ApiCarRequest $request)
    {
        $car=Car::create($request->all());
        return response()->json([
            'status'=> true,
             'message'=>'Coche creado correctamente',
             'car' => $car

    ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $car=Car::findOrFail($id);
        return response()->json([
            'status'=>true,
            'car' => $car
         ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ApiCarRequest $request, $id)
    {
        $car= Car::findOrFail($id);
        $car->update($request->all());
        return response()->json([
            'status'=> true,
             'message'=>'Coche actualizado correctamente',
             'car' => $car

    ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car= Car::findOrFail($id);
        $car->delete();
        return response()->json([
            'status'=> true,
             'message'=>'Coche actualizado correctamente',
             'car' => $car

    ]);
    }
}
