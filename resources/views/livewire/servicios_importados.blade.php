<div class="container">
    <div class="card">
        <div class="card-header bg-indigo-500 text-white text-center">
            <h4 class="mb-0">Registro de servicios Importados</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">                                                                                                  
                    @livewire('crearservicio')
                </div>
                                                        
            </div>
                                 
    
    <table class="mt-4 w-full border-collapse">
        <thead>
            <tr class="bg-indigo-500 text-white py-2 px-4 rounded-md shadow-md">
                <th class="px-4 py-2 text-center" >ID</th>
                <th class="px-4 py-2 text-center" >Placa</th>
                <th class="px-4 py-2 text-center" >Serie</th>
                <th class="px-4 py-2 text-center" >Certificador</th>
                <th class="px-4 py-2 text-center" >Taller</th>                
                <th class="px-4 py-2 text-center" >Precio</th>                
                <th class="px-4 py-2 text-center" >Fecha</th>                                          
                <th class="px-4 py-2 text-center">Acciones</th>
            </tr>
        </thead>

        

        
        <tbody>                   
                @foreach ($serviciosImportados as $servicio)                   
                        <tr>
                            <td class="border px-4 py-2 text-center" >{{ $servicio['id'] }}</td>
                            <td class="border px-4 py-2 text-center" >{{ $servicio['placa'] }}</td>
                            <td class="border px-4 py-2 text-center" >{{ $servicio['serie'] }}</td>
                            <td class="border px-4 py-2 text-center" >{{ $servicio['certificador'] }}</td>
                            <td class="border px-4 py-2 text-center" >{{ $servicio['taller'] }}</td>
                            <td class="border px-4 py-2 text-center" >{{ $servicio['precio'] }}</td>
                            <td class="border px-4 py-2 text-center" >{{ $servicio['fecha'] }}</td>
                            <td class="border px-4 py-2 text-center" >
                              <div class="btn-group">
                                <button wire:click="showEditModal({{ $servicio->id }})" 
                                    class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-md shadow-md mr-2">
                                    Editar
                                </button>
                                <button wire:click="delete({{ $servicio->id }})" 
                                    class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-md shadow-md mr-2">
                                    Eliminar
                                </button>
                                <button wire:click="view({{ $servicio->id }}, 'Detalles del Servicio')" 
                                    class="bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 rounded-md shadow-md mr-2">
                                    Ver
                                </button>
                              </div>
                            </td>
                        </tr>                    
                @endforeach                 
        </tbody>
    </table>
    </div>
  </div>
</div>
            

    
@if ($showModal)
<div class="modal" tabindex="-1" role="dialog" style="display: block;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $modalTitle }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="closeModal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Agregar aquí el contenido del modal -->
                <p>ID: {{ $modalData['id'] }}</p>
                <p>Placa: {{ $modalData['placa'] }}</p>
                <p>Serie: {{ $modalData['serie'] }}</p>
                <!-- Agregar aquí los demás campos del servicio -->
            </div>
        </div>
    </div>
</div>
@endif

@if ($showEditModal)
<div class="modal" tabindex="-1" role="dialog" style="display: block;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Servicio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="closeEditModal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Agregar aquí el formulario de edición del servicio -->
                <form wire:submit.prevent="save">
                    <div class="form-group">
                        <label for="placa">Placa</label>
                        <input type="text" class="form-control" wire:model.defer="placa">
                        @error('placa') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="serie">Serie</label>
                        <input type="text" class="form-control" wire:model.defer="serie">
                        @error('serie') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    <!-- Agregar aquí los demás campos del formulario de edición -->
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endif








