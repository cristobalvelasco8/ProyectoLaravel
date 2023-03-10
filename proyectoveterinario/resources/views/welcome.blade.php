<x-app-layout>
    <div class="container-fluid mt-3">
        <div class="row d-flex justify-content-around">
            <div class="col-5 zona bg-transparent" ondrop="drop(event)" ondragover="allowDrop(event)">
                <h1 class="text-black text-center">Animales en cola</h1>
                <?php
                $animales = DB::table('animals')->get()->where('estado', 'en cola');
                ?>
                @foreach($animales as $animal)
                    <?php
                    $veterinarios = DB::table('users')->where('id', $animal->user_id)->first();
                    ?>
                    <span class='d-inline-block' tabindex='0' data-bs-toggle='tooltip'
                          data-bs-placement='top'
                          title='-{{$animal->nombre}} {{$animal->raza}}       -Veterinario asignado: {{$veterinarios->nombre}} {{$veterinarios->apellidos}}
                          @if($veterinarios->id != Auth::id() && Auth::user()->rol_id != 1)-No puedes actualizar un animal que no has registrado tú
                                  @else
                                  -Arrastra a la siguiente zona para comenzar con la vacuna
                                  @endif
                                  '>
                    <img class="animal" src="{{asset('storage/img_animals/'.$animal->foto)}}"
                         @if($veterinarios->id == Auth::id() || Auth::user()->rol_id == 1)
                         draggable="true"
                         @else
                         draggable="false"
                         @endif
                         ondragstart="drag(event)" id="{{$animal->id}}"/>
                    </span>
            @endforeach

            </div>

            <div class="col-5 bg-primary zona bg-transparent" ondrop="drop(event)" ondragover="allowDrop(event)">
                <h1 class="text-black text-center">Zona de vacunas</h1>
                <?php
                $animales = DB::table('animals')->get()->where('estado', 'vacunandose');
                ?>
                @foreach($animales as $animal)
                    <?php
                    $veterinarios = DB::table('users')->where('id', $animal->user_id)->first();
                    ?>
                    <span class='d-inline-block' tabindex='0' data-bs-toggle='tooltip'
                          data-bs-placement='top'
                          title='-{{$animal->nombre}} {{$animal->raza}}       -Veterinario asignado: {{$veterinarios->nombre}} {{$veterinarios->apellidos}}
                          @if($veterinarios->id != Auth::id() && Auth::user()->rol_id != 1)-No puedes actualizar un animal que no has registrado tú
                                  @else
                                  -Arrastra a la siguiente zona para terminarla vacuna
                                  @endif
                                  '>
                    <img class="animal" src="{{asset('storage/img_animals/'.$animal->foto)}}"
                         @if($veterinarios->id == Auth::id() || Auth::user()->rol_id == 1)
                         draggable="true"
                         @else
                         draggable="false"
                         @endif
                         ondragstart="drag(event)" id="{{$animal->id}}"/>
                    </span>
                @endforeach
            </div>
        </div>
        <div class="row my-2 d-flex justify-content-around">
            <div class="col-5 zona bg-transparent" ondrop="drop(event)" ondragover="allowDrop(event)">
                <h1 class="text-black text-center">Animales vacunados</h1>
                <?php
                $animales = DB::table('animals')->get()->where('estado', 'vacunado')->where('costeVacunacion', null);
                ?>
                @foreach($animales as $animal)
                    <img class="animal" src="{{asset('storage/img_animals/'.$animal->foto)}}"
                         draggable="false" ondragstart="drag(event)" id="{{$animal->id}}"/>
                    <a href="{{url('factura/'.$animal->id)}}"
                       class="btn btn-warning rounded-pill">Ver
                        factura</a>
                @endforeach
            </div>
        </div>
</x-app-layout>