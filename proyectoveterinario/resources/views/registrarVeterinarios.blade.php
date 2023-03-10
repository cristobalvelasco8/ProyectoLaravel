<x-app-layout>
    <x-slot name="header">
        <h2 class="text-white">
            {{ __('Mi animal') }}
            @if(session('error')==1)
                Error de base de datos
            @endif
        </h2>
    </x-slot>
    <div class="container-fluid">
        <div class="row d-flex justify-content-center align-items-center my-5">
            <div class="col-3 d-flex justify-content-end">
                <img src="{{asset('/storage/img_animals/1676644388_97995223-veterinarios-con-jeringa.jpg')}}" class="veterinario">
            </div>
            <div class="col-3">
                <div class="row text-white mb-5">
                    <div class="col-6">
                        
                    </div>
                    <div class="col-6">
                    </div>
                </div>
                <div class="container mb-4">
                <div class="row d-flex justify-content-center">
                <div class="card text-black" style="width:600px; background-color: rgba(255, 255, 255, 0.692);">
                    <h1 class="text-center pb-2">Contratar veterinario</h1>
                </div>
                </div>
                        </div>
                <form enctype="multipart/form-data" method="POST" action="{{route('user.store')}}" class="bg-transparent">
                    @csrf
                    <div class="row mb-1">
                        <div class="col">
                            <div class="form-group">
                                <input type="text" name="nombre"  class="form-control" placeholder="Nombre *" value="{{old('nombre')}}"/>
                                <p class="text-warning">
                                    @error('nombre')
                                    {{$message}}
                                    @enderror
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <div class="form-group">
                                <input type="text" name="apellidos" class="form-control" placeholder="Apellidos *"
                                       value="{{old('apellidos')}}"/>
                                <p class="text-warning">
                                    @error('apellidos')
                                    {{$message}}
                                    @enderror
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <div class="form-group">
                                <input type="text" name="dni" class="form-control" placeholder="DNI *" value="{{old('dni')}}"/>
                                <p class="text-warning">
                                    @error('dni')
                                    {{$message}}
                                    @enderror
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <div class="form-group">
                                <input type="text" name="tlf" class="form-control" placeholder="Teléfono *" value="{{old('tlf')}}"/>
                                <p class="text-warning">
                                    @error('tlf')
                                    {{$message}}
                                    @enderror
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <div class="form-group">
                                <input type="text" name="email" class="form-control" placeholder="Email *" value="{{old('email')}}"/>
                                <p class="text-warning">
                                    @error('email')
                                    {{$message}}
                                    @enderror
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-1">
                        <div class="col">
                            <div class="form-group">
                                <input type="password" name="pass" class="form-control" placeholder="Contraseña *"
                                       value="" />
                                <p class="text-warning">
                                    @error('pass')
                                    {{$message}}
                                    @enderror
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="form-group col d-flex justify-content-center">
                            <input type="submit" name="iniciar" class="btn btn-warning rounded-pill"
                                   value="Registrar veterinario" id="registrar" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>