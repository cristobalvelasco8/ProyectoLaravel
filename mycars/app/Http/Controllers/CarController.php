<?php

namespace App\Http\Controllers;
use App\Models\Car;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    
        $user=User::find(Auth::id());
        $mycars=$user->cars()->paginate(3);
        return view('car.index')->with('mycars',$mycars);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('car.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
        'matricula' => 'required|unique:cars',
        'marca' => 'required',
        'modelo'=> 'required',
        'foto' => 'required|image'
        ]);
        try {

            $mycar = new Car();
            $mycar->matricula= $request->matricula;
            $mycar->marca= $request->marca;
            $mycar->modelo= $request->modelo;
            $mycar->year= $request->year;
            $mycar->color= $request->color;
            $mycar->fecha_ultima_revision= $request->fecha_ultima_revision;
            $mycar->precio= $request->precio;
            $mycar->user_id = Auth::id();
            $nombrefoto=time()."-".$request->file('foto')->getClientOriginalName();
            $mycar->foto= $nombrefoto;
            $mycar->save();
            $request->file('foto')->storeAs('public/img_cars',$nombrefoto);
            return redirect()->route('car.index')->with('status',"Coche creado correctamente");
        }
        
        catch(QueryException $exception) {
            return redirect()->route('car.index')->with('status',"No se ha podido crear el coche correctamente");
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mycar=Car::findorFail($id);
        $url='storage/img_cars/';
        return view ('car.show')->with('mycar', $mycar)->with('url',$url);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mycar=Car::findorFail($id);
        $url='storage/img_cars/';
        return view ('car.edit')->with('mycar', $mycar)->with('url',$url);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'matricula' => 'required',
            'marca' => 'required',
            'modelo'=> 'required',
            'foto' => 'image'
            ]);
            try {
    
                $mycar = Car::findOrFail($id);
                $mycar->matricula= $request->matricula;
                $mycar->marca= $request->marca;
                $mycar->modelo= $request->modelo;
                $mycar->year= $request->year;
                $mycar->color= $request->color;
                $mycar->fecha_ultima_revision= $request->fecha_ultima_revision;
                $mycar->precio= $request->precio;
                $mycar->user_id = Auth::id();
                if(is_uploaded_file($request->foto)){
                    $nombrefoto=time()."-".$request->file('foto')->getClientOriginalName();
                    $mycar->foto= $nombrefoto;
                    $request->file('foto')->storeAs('public/img_cars',$nombrefoto);
                }
                $mycar->save();
                return redirect()->route('car.index')->with('status',"Coche editado correctamente");
            }
            
            catch(QueryException $exception) {
                return redirect()->route('car.index')->with('status',"No se ha podido crear el coche correctamente");
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mycar = Car::findOrFail($id);
        $mycar->delete();
        return redirect()->route('car.index')->with('status',"Coche borrado correctamente");
    }
}
