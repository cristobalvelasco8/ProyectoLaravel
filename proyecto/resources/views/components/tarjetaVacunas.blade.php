<div class="card text-black" style="width:600px; background-color: rgba(255, 255, 255, 0.692);">
    <div class="card-body">
        <div class="row">
            <div class="col-6">
                <div class="row">
                    <div class="col">
                        <h4 class="card-title"> Nombre del animal: {{$nombre}} </h4>  
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                    <h4 class="card-title">Raza: {{$raza}}</h4>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end col-6">
                Fecha de vacuna: {{$fechaVacuna}}
            </div>
        </div>

        <div class="row pt-3">
            <div class="col">
                <p class="card-text">Vacunas: {{$vacunas}}</p>
            </div>
            <div class="col">
                <p class="card-text">Coste: {{$coste}}€</p>
            </div>
        </div>
        <div class="row pt-3">
            <div class="d-flex justify-content-center col">
                <p class="card-text">Cliente: {{$nombreCliente}} {{$apellidosCliente}}</p>
            </div>
            <div class="d-flex justify-content-center col">
                <p class="card-text">Teléfono de contacto: {{$tlf}}</p>
            </div>
        </div>
        @if(Auth::user()->rol_id == 1)
            <div class="row pt-3">
                <div class="d-flex justify-content-center col">
                    <p class="card-text">Veterinario encargado: {{$nombreVeterinario}} {{$apellidosVeterinario}}</p>
                </div>
            </div>
        @endif
        <hr>
        <div class="row">
            <div class="d-flex justify-content-center col">
                <a href="{{url('factura/'.$idAnimal)}}"
                   class="btn btn-warning rounded-pill">Ver
                    factura</a>
            </div>
        </div>
    </div>
</div>