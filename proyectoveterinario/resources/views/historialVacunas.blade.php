<x-app-layout>
    <div class="container my-4">
            @if(Auth::user()->rol_id == 1)
            <div class="row d-flex justify-content-center">
                <div class="card text-black" style="width:600px;  background-color: rgba(255, 255, 255, 0.692);">
            <h1 class="text-center pb-3">Historial de vacunas</h1>
                </div>
            </div>
                
            
            
            @else
            <div class="row d-flex justify-content-center">
                <div class="card text-black" style="width:600px; background-color: rgba(219, 219, 219, 0.5);">
            <h1 class="text-center pb-3">Mis vacunas</h1>
                </div>
            </div>
            @endif
        </h1>

        @if(Auth::user()->rol_id == 1)
            <?php
            $animales = DB::table('animals')->orderBy("fechaVacuna","desc")->get()->where('estado', 'vacunado')->where('costeVacunacion', !null);
            ?>
        @else
            <?php
            $animales = DB::table('animals')->orderBy("fechaVacuna","desc")->get()->where('estado', 'vacunado')->where('costeVacunacion', !null)->where('user_id', Auth::id());
            ?>
        @endif

        @foreach($animales as $animal)
            <?php
            //$coches = DB::table('cars')->get()->where('user_id',Auth::id());
            $animalesCliente = DB::table('clients')->where('id', $animal->client_id)->first();
            $veterinario = DB::table('users')->where('id', $animal->user_id)->first();
            ?>
            <div class="row d-flex justify-content-center">
                <x-tarjetaVacunas nombre="{{$animal->nombre}}" raza="{{$animal->raza}}"
                                     vacunas="{{$animal->descripcionVacunas}}" coste="{{$animal->costeVacunacion}}"
                                     fechaVacuna="{{$animal->fechaVacuna}}"
                                     nombreCliente="{{$animalesCliente->nombre}}"
                                     apellidosCliente="{{$animalesCliente->apellidos}}" tlf="{{$animalesCliente->tlf}}"
                                     idAnimal="{{$animal->id}}"
                                     nombreVeterinario="{{$veterinario->nombre}}" apellidosVeterinario="{{$veterinario->apellidos}}"
                ></x-tarjetaVacunas>
            </div>
        @endforeach
    </div>
</x-app-layout>