<div>
    <div class="flex justify-between items-center mb-5 pl-12">
        <h3 class="font-bold text-2xl ml-12">Talleres</h3>
        <div class="flex items-center space-x-4">
            <div class="mb-1 ml-12 w-96">
                <input type="text" wire:model="search" class="form-control border border-purple-500 focus:border-purple-700 rounded-md shadow-md w-full" placeholder="Buscar...">
            </div>
            <button wire:click="clearSearch" class="btn btn-outline-secondary ml-12" style="margin-right: 3cm;" type="button">Limpiar</button>
        </div>
    </div>
    <hr class="mb-5">
    

    <table class="mt-4 w-full border-collapse">
        <thead>
            <tr class="bg-indigo-500 text-white py-2 px-4 rounded-md shadow-md">
                <th class="px-4 py-2 text-center">ID</th>
                <th class="px-4 py-2 text-center">Nombre</th>
                <th class="px-4 py-2 text-center">Direccion</th>
                <th class="px-4 py-2 text-center">Distrito</th>
                <th class="px-4 py-2 text-center">Ruc</th>
                <th class="px-4 py-2 text-center">Representante</th>
                <th class="px-4 py-2 text-center">Logo</th>
                <th class="px-4 py-2 text-center">Firma</th>  
            </tr>
        </thead>


        <tbody>
            
            @if (!empty($talleres) && count($talleres) > 0)
                @foreach ($talleres as $taller)
                    <tr>
                        <td class="border px-4 py-2 text-center">{{ $taller['id'] }}</td>
                        <td class="border px-4 py-2 text-center">{{ $taller['nombre'] }}</td>
                        <td class="border px-4 py-2 text-center">{{ $taller['direccion'] }}</td>
                        <td class="border px-4 py-2 text-center">{{ $taller['ruc'] }}</td>
                        <td class="border px-4 py-2 text-center">{{ $taller['representante'] }}</td>
                        <td class="border px-4 py-2 text-center">{{ $taller['idDistrito'] }}</td>
                        <td class="border px-4 py-2 text-center">{{ $taller['rutaLogo'] }}</td>
                        <td class="border px-4 py-2 text-center">{{ $taller['rutaFirma'] }}</td>
                        <td class="border px-4 py-2 text-center">
                            <button wire:click="edit({{ $taller['id'] }})" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-md shadow-md mr-2">
                                Editar
                            </button>                            
                            <button wire:click="view({{ $taller['id'] }})" class="bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 rounded-md shadow-md mr-2">
                                Ver
                            </button>
                        </td>
                    </tr>
                @endforeach
            @endif
           
        </tbody>
    </table>
</div>