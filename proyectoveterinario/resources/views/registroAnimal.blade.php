<x-app-layout>
    <div class="container bg-transparent contact-form my-5">
        <div class="cabeceraImg">
            <img src="https://i.pinimg.com/550x/ed/5f/3a/ed5f3a15d92ba3ac6238a98da42bb01e.jpg"/>
        </div>
        @if(isset($nuevoCliente))
            <div class="row d-flex justify-content-center mt-5">
                <div class="col-6 alert alert-warning text-center" role="alert">
                    Se ha registrado el cliente: {{$nuevoCliente}}
                </div>
            </div>
        @endif
        <form enctype="multipart/form-data" method="POST" action="{{route('animal.store')}}" class="bg-transparent">
            @csrf
            <div class="row mb-1">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" name="nombre" class="form-control" placeholder="Nombre *"
                               value="{{old('nombre')}}"/>
                        <p class="text-warning">
                            @error('nombre')
                            {{$message}}
                            @enderror
                        </p>
                    </div>
                    <div class="form-group">
                        <input type="text" name="raza" class="form-control" placeholder="Raza *"
                               value="{{old('raza')}}"/>
                        <p class="text-warning">
                            @error('raza')
                            {{$message}}
                            @enderror
                        </p>
                    </div>
                    <div class="form-group">
                        <input type="text" name="especie" class="form-control" placeholder="Especie *"
                               value="{{old('especie')}}"/>
                        <p class="text-warning">
                            @error('especie')
                            {{$message}}
                            @enderror
                        </p>
                    </div>
                    <div class="form-group">
                        <?php
                        $clientes = DB::table('clients')->get();
                        ?>
                        <select class="form-select form-control border-black" name="client_id">
                            <option class="text-white" value="" disabled selected>Selecciona un cliente</option>
                            @foreach($clientes as $cliente)
                                <option
                                        @if(isset($nuevoCliente))
                                        @if($cliente->id == $cliente->id)
                                        selected
                                        @endif
                                        @endif
                                        value="{{$cliente->id}}">{{$cliente->nombre}} {{$cliente->apellidos}}
                                    -- {{$cliente->dni}}</option>
                            @endforeach
                        </select>
                        <p class="text-warning">
                            @error('client_id')
                            {{$message}}
                            @enderror
                        </p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" name="vacunas" class="form-control" placeholder="Nº vacunas *"
                               value="{{old('vacunas')}}"/>
                        <p class="text-warning">
                            @error('vacunas')
                            {{$message}}
                            @enderror
                        </p>
                    </div>
                    <div class="form-group">
                    <textarea name="descripcionVacunas" class="form-control" placeholder="Descripción de las vacunas *"
                              style="width: 100%; height: 115px;">{{old('descripcionVacunas')}}</textarea>
                        <p class="text-warning">
                            @error('descripcionVacunas')
                            {{$message}}
                            @enderror
                        </p>
                    </div>
                </div>
            </div>

            <div class="row mb-1">
                <div class="col-md-4 d-flex justify-content-center">
                    <img class="imgAnimal" id="imgAnimal">
                </div>
                <div class="form-group col-md-6 d-flex justify-content-center align-self-center">
                    <input type="file" name="fotoAnimal" class="form-control" value="{{old('fotoAnimal')}}"
                           id="fotoAnimalInput"/>
                </div>
                <p class="text-center text-warning">
                    @error('fotoAnimal')
                    {{$message}}
                    @enderror
                </p>
            </div>

            <div class="row mt-4">
                <div class="form-group col-md-6 d-flex justify-content-center">
                    <input type="submit" name="annadirAnimal" class="btn btn-warning rounded-pill" value="Añadir animal"
                           id="btnAnnadirAnimal"/>
                </div>
                <div class="form-group col-md-6 d-flex justify-content-center">
                    <input type="button" name="nuevoCliente" class="btn btn-outline-warning rounded-pill"
                           value="¿Nuevo cliente?" id="btnNuevoCliente"/>
                </div>
            </div>
        </form>

        <form enctype="multipart/form-data" method="POST" action="{{route('client.store')}}" id="formNewClient"
              class="bg-transparent
              <?php if (session('errorCliente') || old('nuevoCliente')) {
                  echo "d-block";
              } else {
                  echo "d-none";
              }?>">
            @csrf
            <div class="row mb-1">
                <div class="form-group col-md-6">
                    <input type="text" name="nombre" class="form-control" placeholder="Nombre *"
                           value="{{old('nombre')}}"/>
                    <p class="text-center text-warning">
                        @error('nombre')
                        {{$message}}
                        @enderror
                    </p>
                </div>
                <div class="form-group col-md-6">
                    <input type="text" name="apellidos" class="form-control" placeholder="Apellidos *"
                           value="{{old('apellidos')}}"/>
                    <p class="text-center text-warning">
                        @error('apellidos')
                        {{$message}}
                        @enderror
                    </p>
                </div>
                <div class="form-group col-md-6">
                    <input type="text" name="dni" class="form-control" placeholder="DNI *" value="{{old('dni')}}"/>
                    <p class="text-center text-warning">
                        @error('dni')
                        {{$message}}
                        @enderror
                    </p>
                </div>
                <div class="form-group col-md-6">
                    <input type="text" name="tlf" class="form-control" placeholder="Teléfono *" value="{{old('tlf')}}"/>
                    <p class="text-center text-warning">
                        @error('tlf')
                        {{$message}}
                        @enderror
                    </p>
                </div>
                <div class="form-group col">
                    <input type="text" name="email" class="form-control" placeholder="Email *" value="{{old('email')}}"/>
                    <p class="text-center text-warning">
                        @error('email')
                        {{$message}}
                        @enderror
                    </p>
                </div>
            </div>

            <div class="row mt-4">
                <div class="form-group col d-flex justify-content-center">
                    <input type="submit" name="nuevoCliente" class="btn btn-warning rounded-pill"
                           value="Completar registro"/>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>