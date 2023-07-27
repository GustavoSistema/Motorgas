<div>
    <div class="col-md-6 text-center">
        <h3 style="font-size: 2.5rem; font-weight: bold;">Registro de servicios Importados</h3>
    </div>


    <div class="search-container">
        
        <input type="text" wire:model="searchTerm" placeholder="Buscarporloquequieras ♡" class="search-input">       
        <button wire:click="render" class="bg-indigo-500 text-white py-2 px-4 rounded-md shadow-md">Buscar</button>
    </div>
    
    <div>
        <!-- Agrega el botón para crear un nuevo servicio -->
        <button wire:click="create" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md shadow-md">
            Crear Nuevo Servicio
        </button>
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
                                <button wire:click="edit({{ $servicio->id }})" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-md shadow-md mr-2">
                                    Editar
                                </button>
                                <button wire:click="view({{ $servicio->id }}, 'Titulo del Modal')" class="bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 rounded-md shadow-md mr-2">
                                    Ver
                                </button>
                              </div>
                            </td>
                        </tr>                    
                @endforeach                       
        </tbody>
    </table>
    {{ $serviciosImportados->links() }}
     
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
                    <p><strong>ID:</strong> {{ $modalData['id'] }}</p>
                    <p><strong>Placa:</strong> {{ $modalData['placa'] }}</p>
                    <p><strong>Serie:</strong> {{ $modalData['serie'] }}</p>
                    <p><strong>Certificador:</strong> {{ $modalData['certificador'] }}</p>
                    <p><strong>Taller:</strong> {{ $modalData['taller'] }}</p>
                    <p><strong>Precio:</strong> {{ $modalData['precio'] }}</p>
                    <p><strong>Fecha:</strong> {{ $modalData['fecha'] }}</p>
                    <p><strong>Externo:</strong> {{ $modalData['externo'] }}</p>
                    <p><strong>Tipo Servicio:</strong> {{ $modalData['tipoServicio'] }}</p>
                    <p><strong>Estado:</strong> {{ $modalData['estado'] }}</p>
                    <p><strong>Pagado:</strong> {{ $modalData['pagado'] }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click="closeModal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    @endif






</div>











