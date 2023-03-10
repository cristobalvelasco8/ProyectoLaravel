<nav class="navbar navbar-expand-sm navbar-light bg-butano">
    <div class="container-fluid row">
        <div class="col-6">
            <ul class="navbar-nav">
                <x-nav-link class="nav-item">
                    <a class="nav-link active" href="{{route('veterinario')}}"
                       :active="request()->routeIs('veterinario')"> <img class="img-responsive" src="{{asset('storage/img_animals/1676642960_foto.jpg') }}" width="80"></a>
                </x-nav-link>
                @auth
                    <x-nav-link class="nav-item">
                        <a class="nav-link my-4" href="{{route('registrarAnimal')}}"
                           :active="request()->routeIs('dashboard')">Nuevo
                            animal</a>
                    </x-nav-link>
                    <x-nav-link class="nav-item">
                        <a class="nav-link my-4" href="{{route('historial')}}" :active="request()->routeIs('dashboard')">Vacunas</a>
                    </x-nav-link>
                    @if(Auth::user()->rol_id == 1)
                        <x-nav-link class="nav-item">
                            <a class="nav-link my-4" href="{{route('veterinarios')}}" :active="request()->routeIs('dashboard')">Veterinarios</a>
                        </x-nav-link>
                        <x-nav-link class="nav-item">
                            <a class="nav-link my-4" href="{{route('registrarVeterinarios')}}"
                               :active="request()->routeIs('dashboard')">Contratar
                                veterinario</a>
                        </x-nav-link>
                    @endif
                @endauth
            </ul>
        </div>

        <div class="col-6">
            @auth
                <form method="POST" action="{{ route('logout') }}" class="d-flex justify-content-end">
                    @csrf
                    <?php
                    if (Auth::user()->rol_id == 1) {
                        echo "Bienvenido administrador";
                    } else {
                        echo "Bienvenido: " . Auth::user()->nombre . " " . Auth::user()->apellidos;
                    } ?>
                    <button href="{{ route('logout') }}" class="btn btn-dark rounded-pill ms-4">Cerrar
                        sesión
                    </button>
                </form>
            @else
                <div class="d-flex justify-content-end">
                    <a href="{{ route('register') }}" class="btn btn-dark rounded-pill">Registrate
                        </a>
                </div>
            @endauth
        </div>
    </div>
</nav>