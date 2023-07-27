<div>

    <div class="row mb-5">
        <div class="col-md-6 text-center">
            <h3 style="font-size: 2.5rem; font-weight: bold;">Registro de Formatos</h3>
        </div>




        <div class="row mb-5">           
            <!-- Botón para crear un nuevo formato -->
            <div class="col-md-6 d-flex justify-content-between">
            <button wire:click="create" class="bg-indigo-500 text-white py-2 px-4 rounded-md shadow-md">
            Crear Nuevo
            </button>
            <div class="ml-2"></div>
       </div>


       <div class="col-md-6 text-right">
       <div class="row mb-4">
        <div class="col-md-6 offset-md-6">
            <div class="input-group">
                <input type="text" wire:model="search" class="form-control border border-purple-500 focus:border-purple-700 rounded-md shadow-md" placeholder="Buscar...">
                <div class="input-group-append">
                    <button wire:click="clearSearch" class="btn btn-outline-secondary" type="button"></button>
                </div>
            </div>
        </div>
       </div>
      </div>
       
    </div>      
            
    

    @if ($editing)
        <form wire:submit.prevent="{{ $tipoMaterialId ? 'update' : 'create' }}">
            <div class="mb-4">
                <label for="descripcion" class="block">Descripción:</label>
                <input type="text" wire:model="descripcion" id="descripcion" class="form-control border border-purple-500 focus:border-purple-700 rounded-md shadow-md" placeholder="Descripción" required>
                    @error('descripcion')
                   <div class="text-red-600">{{ $message }}</div>
                    @enderror
            </div>

            <div>
                <button type="submit" class="bg-indigo-500 text-white py-2 px-4 rounded-md shadow-md">
                     {{ $tipoMaterialId ? 'Actualizar' : 'Crear' }}
                </button>
                <button wire:click="resetForm" type="button" class="bg-gray-300 text-gray-600 py-2 px-4 rounded-md shadow-md ml-2">
                    Cancelar
                </button>
            </div>
        </form>

    @endif


    <table class="mt-4 w-full border-collapse">
        <thead>
            <tr class="bg-indigo-500 text-white py-2 px-4 rounded-md shadow-md">
                <th class="px-4 py-2 text-center">ID</th>
                <th class="px-4 py-2 text-center">Descripción</th>
                <th class="px-4 py-2 text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @if ($foundRecords)
            @if (!empty($tipoMaterialList) && count($tipoMaterialList) > 0)
                @foreach ($tipoMaterialList as $tipoMaterial)
                    
                        <tr>
                            <td class="border px-4 py-2 text-center">{{ $tipoMaterial['id'] }}</td>
                            <td class="border px-4 py-2 text-center">{{ $tipoMaterial['descripcion'] }}</td>
                            <td class="border px-4 py-2 text-center">
                                <button wire:click="edit({{ $tipoMaterial['id'] }})" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-md shadow-md mr-2">
                                    Editar
                                </button>
                                <button wire:click="delete({{ $tipoMaterial['id'] }})" class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-md shadow-md mr-2">
                                    Eliminar
                                </button>
                                <button wire:click="view({{ $tipoMaterial['id'] }})" class="bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 rounded-md shadow-md mr-2">
                                    Ver
                                </button>
                            </td>
                        </tr>
                    
                @endforeach
            @else
                <tr>
                    <td colspan="3" class="border px-4 py-2 text-center">No hay materiales disponibles</td>
                </tr>
            @endif
            @else
                <tr>
                    
                    <td colspan="3" class="border px-4 py-2 text-center">No se encontraron los registros.</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
