<div>
    <div>
<div>
    Buscar: <x-text-input wire:model="buscador" class="border-4" />
</div>
<div class="relative overflow-x-auto">
  
    @if ($veterinarios->count())
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th wire:click="ordenar('id')" scope="col" class="px-6 py-3 cursor-pointer">
                    Id
                </th>
                <th wire:click="ordenar('nombre')" scope="col" class="px-6 py-3 cursor-pointer">
                    Nombre
                </th>
                <th wire:click="ordenar('nombre')" scope="col" class="px-6 py-3 cursor-pointer">
                    Apellidos
                </th>
                <th wire:click="ordenar('email')" scope="col" class="px-6 py-3 cursor-pointer">
                    Email
                </th>
                <th wire:click="ordenar('dni')" scope="col" class="px-6 py-3 cursor-pointer">
                    Dni
                </th>
                <th wire:click="ordenar('tlf')" scope="col" class="px-6 py-3 cursor-pointer">
                    Telefono
                </th>
                <th scope="col" class="px-6 py-3 cursor-pointer">
                    Acciones
                </th>
            </tr>
        </thead>
        <tbody>
            
            @foreach ($veterinarios as $veterinario)
            <?php
            $animalesVeterinario = DB::table('animals')->where('user_id', $veterinario->id)->where('costeVacunacion', '=', null)->first();
        ?>
                
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $veterinario->id }}
                </th>
                <td class="px-6 py-4">
                    {{ $veterinario->nombre }}
                </td>
                <td class="px-6 py-4">
                    {{ $veterinario->apellidos}}
                </td>
                <td class="px-6 py-4">
                    {{ $veterinario->email}}
                </td>
                <td class="px-6 py-4">
                    {{ $veterinario->dni}}
                </td>
                <td class="px-6 py-4">
                    {{ $veterinario->tlf}}
                </td>
                <td class="px-6 py-4">
                    <div class="row">
                        <div class="col d-flex justify-content-center">
                            <a href="{{ route('user.edit', $veterinario->id) }}"
                               class="btn btn-warning rounded-pill">Editar
                                datos</a>
                        </div>
                        <div class="col d-flex justify-content-center">
                            @if($animalesVeterinario)
                                <span class='d-inline-block' tabindex='0' data-bs-toggle='tooltip'
                                      data-bs-placement='top'
                                      title='No puedes despedirlo porque está vacunando algún animal'>
                                    <button class='btn btn-outline-danger rounded-pill text-black' type='button'
                                            disabled>Despedir veterinario
                                    </button>
                                </span>
                            @else
                                <form enctype="multipart/form-data" method="POST"
                                      action="{{route('user.destroy',$veterinario->id)}}"
                                      class="bg-transparent">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger rounded-pill text-black">
                                        Despedir veterinario
                                    </button>
                            
                                </form>
                            @endif
                </td>
            </tr>
    @endforeach
</tbody> 
</table>
@else
No se ha encontrado ningún veterinario
@endif
<div>
</div>
</div>

</div>
</div>
</div>