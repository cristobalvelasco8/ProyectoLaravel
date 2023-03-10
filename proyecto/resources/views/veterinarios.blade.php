<x-app-layout>
    <div class="container my-4">
        @if(isset($veterinarioNombre))
            <div class="row d-flex justify-content-center">
                <div class="col-7 alert alert-warning" role="alert">
                    Se han modificado los datos del veterinario: {{$veterinarioNombre}} {{$veterinarioApellidos}}
                </div>
            </div>
        @endif

        @if(isset($deletedNombre))
            <div class="row d-flex justify-content-center">
                <div class="col-7 alert alert-warning" role="alert">
                    Se ha despedido el veterinario: {{$deletedNombre}} {{$deletedApellidos}}
                </div>
            </div>
        @endif
        <div class="row d-flex justify-content-center">
            <div class="card text-black" style="width:600px; background-color: rgba(255, 255, 255, 0.692);">
        <h1 class="text-center pb-3">Veterinarios contratados</h1>
            </div>
        </div>

        <?php
        $veterinarios = DB::table('users')->where('rol_id', 2)->get();
        ?>
        @foreach($veterinarios as $veterinario)
            <?php
            $animalesVeterinario = DB::table('animals')->where('user_id', $veterinario->id)->where('costeVacunacion', '=', null)->first();
            ?>
        @endforeach
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                    @livewire('animal-form',['nombre'=>Auth::user()->name])
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>