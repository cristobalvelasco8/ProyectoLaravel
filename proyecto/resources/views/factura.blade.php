<x-app-layout>

    <div class="container mt-4" id="impresion">
        <div class="row d-flex justify-content-center">
                <div class="card text-black" style="width:600px;  background-color: rgba(255, 255, 255, 0.692);">
            <h1 class="title text-center">Datos del cliente:</h1>
            <div class="col-4 text-black">
                <p>Nombre: {{$cliente->nombre}}</p>
                <p>DNI: {{$cliente->dni}}</p>
                <p>Gmail: {{$cliente->email}}</p>
            </div>
            
            <div class="col-3 text-black">
                <p>Apellidos: {{$cliente->apellidos}}</p>
                <p>Teléfono: {{$cliente->tlf}}</p>
                <?php
                $veterinario = DB::table('users')->where('id', $animales->user_id)->first();
                ?>
                <p>Veterinario: {{$veterinario->nombre}} {{$veterinario->apellidos}}</p>
            </div>
        </div>

        <div class="row d-flex justify-content-center pt-4">
            <div class="card text-black" style="width:600px;  background-color: rgba(255, 255, 255, 0.692);">
            <h1 class="title text-center">Datos del animal</h1>
            <div class="col-4 text-black">
                <p>Nombre: {{$animales->nombre}}</p>
                <p>Especie: {{$animales->especie}}</p>

            </div>
            <div class="col-3 text-black">
                <p>Raza: {{$animales->raza}}</p>
                <p>Vacunas: {{$animales->vacunas}}</p>
            </div>
            <div class="col-7 text-black">Descripción de las vacunas:<br>
                <p>{{$animales->descripcionVacunas}}</p>
                <hr>
            </div>
        </div>
    </div>

    <div class="row d-flex justify-content-center mt-2">
        <div class="col-1">
            <label for="costeVacuna" class="text-black">Coste de la vacuna:</label>
        </div>
        <div class="col-2">
            <input type="number" name="costeVacuna" id="costeVacuna" class="form-control text-center"
                   placeholder="Coste (€)"
                   @if($animales->costeVacunacion != null)
                   value="{{$animales->costeVacunacion}}" disabled="true"
                   style="background: transparent"
                    @endif
            />
        </div>

    </div>

    <div class="container">
        <div class="row my-4 d-flex justify-content-center">
            <div class="col-3 d-flex justify-content-center">
                <a href="{{route('veterinario')}}" name="nuevoCliente" class="btn btn-outline-warning rounded-pill"
                   value="Imprimir factura">Volver
                </a>
            </div>
        </div>
    </div>
    </div>

    <p id="idAnimal" class="d-none">{{$animales->id}}</p>
</x-app-layout>