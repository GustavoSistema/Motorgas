    <div class="container">
        <div class="row justify-content-center mb-4">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-indigo-500 text-white text-center">
                        <h4 class="mb-0">Registro de servicios Importados</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Agrega el botón para crear un nuevo servicio -->
                                @livewire('crearservicio')
                            </div>
                            <div class="col-md-6 text-right">
                                <div class="search-container">
                                    <input type="text" wire:model="searchTerm" placeholder="Buscar por lo que quieras ♡♡♡♡♡♡♡♡♡♡♡" class="search-input w-75">
                                    <button wire:click="render" class="bg-indigo-500 text-white py-2 px-4 rounded-md shadow-md ml-2">
                                        Buscar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
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
                                <button wire:click="edit({{ $servicio->id }})" 
                                    class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-md shadow-md mr-2">
                                    Editar
                                </button>
                                <button wire:click="view({{ $servicio->id }}, 'Titulo del Modal')" 
                                    class="bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 rounded-md shadow-md mr-2">
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

                    <form wire:submit.prevent="save">
                        <div class="form-group">
                            <label for="placa" class="font-bold">Placa:</label>
                            <input type="text" wire:model="placa" class="form-control" required>
                        </div>
    
                        <div class="form-group">
                            <label for="serie" class="font-bold">Serie:</label>
                            <input type="text" wire:model="serie" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="certificador" class="font-bold">Certificador:</label>
                            <input type="text" wire:model="certificador" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="taller" class="font-bold">Taller:</label>
                            <input type="text" wire:model="taller" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="precio" class="font-bold">Precio:</label>
                            <input type="text" wire:model="precio" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="fecha" class="font-bold">Fecha:</label>
                            <input type="text" wire:model="fecha" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="externo" class="font-bold">Externo:</label>
                            <input type="text" wire:model="externo" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="tipoServicio" class="font-bold">TipoServicio:</label>
                            <input type="text" wire:model="tipoServicio" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="estado" class="font-bold">Estado:</label> 
                            <input type="text" wire:model="estado" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="pagado" class="font-bold">Pagado:</label>
                            <input type="text" wire:model="pagado" class="form-control" required>
                        </div>


                        <button type="submit"
                            class="bg-indigo-500 text-white py-2 px-4 rounded-md shadow-md mt-4"> Guardar
                        </button>
                    </form>                    
                </div>
            </div>
        </div>
    </div>    
    @endif











