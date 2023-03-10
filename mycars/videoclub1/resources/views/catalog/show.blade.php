<div class="grid content-center">
    @foreach($arrayPeliculas as $key => $peli)
    @endforeach
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $peli['title']}}
        </h2>
    </x-slot>
    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 grid grid-cols-2">

                    <div class="flex justify-start align-middle ">
                        <img src="{{$peli['poster']}}" class="mt-2"
                             width="400px">
                    </div>

                    <div class=" justify-center ">
                        <h2 class="text-4xl font-bold">{{$peli['title']}}</h2>
                        <br>
                        <div class="flex justify-between">
                            <h3 class="text-3xl font-bold">Año: {{$peli['year']}}</h3> <br>
                            <h3 class="text-3xl">Director: {{$peli['director']}}</h3>
                        </div>
                        <br>
                        <p class="text-xl">
                        <h3 class="font-bold text-xl">Resumen: </h3> {{$peli['synopsis']}}
                        </p>

                        <br>
                        <div class="my-5 flex justify-between align-bottom">
                            <a href="{{ url('/') }}">
                                <button
                                    class="bg-blue-500 hover:bg-blue-400 text-white font-semibold hover:text-white py-2 px-4  hover:border-transparent rounded-full">
                                    Alquilar Película
                                </button>
                            </a>

                            <a href="{{ route('Edit',$peli) }}">
                                <button
                                    class="bg-yellow-500 hover:bg-yellow-300 text-white font-semibold hover:text-white py-2 px-4  hover:border-transparent rounded-full">
                                    Editar Película
                                </button>
                            </a>

                            <a href="{{ url('/catalog ') }}">
                                <button
                                    class="bg-red-500 hover:bg-red-400 text-white font-semibold hover:text-white py-2 px-4  hover:border-transparent rounded-full">
                                    Volver al catálogo
                                </button>
                            </a>

                        </div>

                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>