<x-app-layout>
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
                <h1 class="text-black">Modificar un veterinario</h1>

                <form enctype="multipart/form-data" method="POST" action="{{route('user.update',$veterinario)}}"
                      class="bg-transparent">
                    @csrf
                    @method('PUT')
                    <div class="row mb-1">
                        <div class="col">
                            <div class="form-group">
                                <input type="text" name="nombre" class="form-control" placeholder="Nombre *"
                                       value="{{$veterinario->nombre}}"/>
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
                                <input type="" name="apellidos" class="form-control" placeholder="Apellidos *"
                                       value="{{$veterinario->apellidos}}"/>
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
                                <input type="text" name="dni" class="form-control" placeholder="DNI *"
                                       value="{{$veterinario->dni}}"/>
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
                                <input type="text" name="tlf" class="form-control" placeholder="Teléfono *"
                                       value="{{$veterinario->tlf}}"/>
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
                                <input type="text" name="email" class="form-control" placeholder="Email *"
                                       value="{{$veterinario->email}}"/>
                                <p class="text-warning">
                                    @error('email')
                                    {{$message}}
                                    @enderror
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="form-group col d-flex justify-content-center">
                            <input type="submit" name="modificar" class="btn btn-warning rounded-pill"
                                   value="Modificar veterinario" id="modificar"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>