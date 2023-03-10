<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar un Coche') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action={{ route('car.update',['car'=>$mycar->id]) }} enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-6">
                          <label for="matricula" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Matricula</label>
                          <input type="text" value="{{$mycar->matricula }}" id="matricula" name="matricula" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                        @error('matricula')
                        {{ $errors->first('matricula') }}
                        @enderror
                        </div>
                        <div class="mb-6">
                            <label for="marca" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Marca</label>
                            <input type="text" value="{{ $mycar->marca }}"  id="marca" name="marca" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                          </div>
                          <div class="mb-6">
                            <label for="modelo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Modelo</label>
                            <input type="text" value="{{ $mycar->modelo }}"  id="modelo" name="modelo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                          </div>
                          <div class="mb-6">
                            <label for="year" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Año</label>
                            <input type="year" value="{{ $mycar->year }}"  id="year" name="year" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                          </div>
                          <div class="mb-6">
                            <label for="color" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Color</label>
                            <input type="text" value="{{ $mycar->color }}"  id="color" name="color" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                          </div>
                          <div class="mb-6">
                            <label for="fecha_ultima_revision" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha Ultima revision</label>
                            <input type="date" value="{{ $mycar->fecha_ultima_revision }}"  id="fecha_ultima_revision" name="fecha_ultima_revision"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                          </div>
                          <div class="mb-6">
                            <label for="foto" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Foto</label>
                            <img src="{{asset($url.$mycar->foto)}}" width="30%">
                            <input type="file" value="{{ $mycar->foto }}" id="foto" name="foto" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                          </div>
                          <div class="mb-6">
                            <label for="precio" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Precio</label>
                            <input type="number" value="{{ $mycar->precio }}" id="precio" name="precio" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                          </div>
                        <button type="submit" name="sumbit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Editar Coche</button>
                      </form>
                      
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
