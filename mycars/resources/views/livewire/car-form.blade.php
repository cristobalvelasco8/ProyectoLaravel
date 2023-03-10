<div>
   <h1> Mis Coches-{{ $nombre }} </h1>
<div>
    Buscar: <x-text-input wire:model='buscador' class="border-4" />
    @livewire('create-car')
</div>
<div class="relative overflow-x-auto">
    @if ($cars->count())
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th wire:click="ordenar('id')" scope="col" class="px-6 py-3 cursor-pointer">
                    Id
                </th>
                <th wire:click="ordenar('matricula')" scope="col" class="px-6 py-3 cursor-pointer">
                    Matricula
                </th>
                <th wire:click="ordenar('marca')" scope="col" class="px-6 py-3 cursor-pointer">
                    Marca
                </th>
                <th wire:click="ordenar('modelo')" scope="col" class="px-6 py-3 cursor-pointer">
                    Modelo
                </th>
                <th wire:click="ordenar('year')" scope="col" class="px-6 py-3 cursor-pointer">
                    Año
                </th>
                <th wire:click="ordenar('color')" scope="col" class="px-6 py-3 cursor-pointer">
                    Color
                </th>
                <th wire:click="ordenar('fecha_ultima_revision')" scope="col" class="px-6 py-3 cursor-pointer">
                    Fecha última revisión
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cars as $car)
                
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $car->id }}
                </th>
                <td class="px-6 py-4">
                    {{ $car->matricula }}
                </td>
                <td class="px-6 py-4">
                    {{ $car->marca}}
                </td>
                <td class="px-6 py-4">
                    {{ $car->modelo}}
                </td>
                <td class="px-6 py-4">
                    {{ $car->year}}
                </td>
                <td class="px-6 py-4">
                    {{ $car->color}}
                </td>
                <td class="px-6 py-4">
                    {{ $car->fecha_ultima_revision}}
                </td>
            </tr>
    @endforeach
</tbody> 
</table>
@else
No se ha encontrado ningún coche
@endif
<div>
</div>
</div>

</div>
