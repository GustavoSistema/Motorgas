@extends('dashboard')
@section('content')

<div class="card">
    <div class="card-header bg-indigo-500 text-white text-center">
        <h4 class="mb-0">Registro de servicios Importados</h4>
    </div>

    <div class="card-footer">
        <div class="row justify-content-between">
            <div class="col-md-6">
                @livewire('crearservicio')
            </div>

            <div class="col-md-6">
                <div class="input-group">
                    <input type="text" wire:model="search" class="form-control border border-purple-500 focus:border-purple-700 rounded-md shadow-md" placeholder="Buscar...">
                    <div class="input-group-append">
                        <button wire:click="clearSearch" class="btn btn-outline-secondary" type="button">Limpiar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card-body">
        <!-- Tu contenido actual de la tabla aquí -->
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
            @if ($foundRecords)
            @if (!empty($tipoMaterialList) && count($tipoMaterialList) > 0)              
                @foreach ($tipoMaterialList as $servicio)                   
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
                                <button wire:click="edit({{ $servicio['id'] }})" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-md shadow-md mr-2">
                                    Editar
                                </button>
                                <button wire:click="delete({{ $servicio['id'] }})" class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-md shadow-md mr-2">
                                    Eliminar
                                </button>
                                <button wire:click="openViewModal({{ $servicio['id'] }}, 'Detalles del Servicio')"  class="bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 rounded-md shadow-md mr-2">
                                    Ver
                                </button>                                
                              </div>
                            </td>
                        </tr>                    
                @endforeach   
                               
              @endif
            @else
                    <tr>                                
                        <td colspan="8" class="border px-4 py-2 text-center {{ $foundRecords ? '' : 'align-middle' }}">No se encontraron los registros.</td>
                    </tr>
            @endif            
        </tbody>
    </table>
                            
    </div>
    

    @if ($editing)
            <div class="modal" tabindex="-1" role="dialog" style="display: block;">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="card-header bg-indigo-500 text-white">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="mb-0">Registro de servicios Importados</h4>
                                <button wire:click="closeEditModal" class="btn btn-danger btn-sm">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>

                        <div class="modal-body">
                        <form wire:submit.prevent="{{ $servicioId ? 'update' : 'create' }}">
                            <div class="mb-4">
                                <label for="placa" class="block">Placa:</label>
                                <input type="text" wire:model="placa" id="placa" class="form-control border border-purple-500 focus:border-purple-700 rounded-md shadow-md" placeholder="placa" required>
                                @error('placa')
                                <div class="text-red-600">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="serie" class="block">Serie:</label>
                                <input type="text" wire:model="serie" id="serie" class="form-control border border-purple-500 focus:border-purple-700 rounded-md shadow-md" placeholder="serie" required>
                                @error('serie')
                                <div class="text-red-600">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="certificador" class="block">Certificador:</label>
                                <input type="text" wire:model="certificador" id="certificador" class="form-control border border-purple-500 focus:border-purple-700 rounded-md shadow-md" placeholder="certificador" required>
                                @error('certificador')
                                <div class="text-red-600">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="taller" class="block">Taller:</label>
                                <input type="text" wire:model="taller" id="taller" class="form-control border border-purple-500 focus:border-purple-700 rounded-md shadow-md" placeholder="taller" required>
                                @error('taller')
                                <div class="text-red-600">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="precio" class="block">Precio:</label>
                                <input type="number" wire:model="precio" id="precio" class="form-control border border-purple-500 focus:border-purple-700 rounded-md shadow-md" placeholder="precio" required>
                                @error('precio')
                                <div class="text-red-600">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="fecha" class="block">Fecha:</label>
                                <input type="date" wire:model.defer="fecha" id="fecha" class="form-control border border-purple-500 focus:border-purple-700 rounded-md shadow-md" placeholder="fecha" required>
                                @error('fecha')
                                <div class="text-red-600">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="card-footer text-center">
                                <button type="submit" class="bg-indigo-500 text-white py-2 px-4 rounded-md shadow-md">
                                    {{ $servicioId ? 'Actualizar' : 'Crear' }}
                                </button>
        
                                <button wire:click="resetForm" type="button" class="bg-gray-300 text-gray-600 py-2 px-4 rounded-md shadow-md ml-2">
                                Cancelar
                                </button>
                            </div>
                        </form>
                        </div>
                  </div>
                </div>
            </div>
        @endif

        
        @if ($isViewing)
        <div class="modal" tabindex="-1" role="dialog" style="display: block;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-indigo-500 text-white">
                        <h5 class="modal-title">{{ $modalTitle }}</h5>
                        <button type="button" class="bg-red-500 text-white py-1 px-2 rounded" data-dismiss="modal" aria-label="Close" wire:click="closeViewModal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-4">
                                <label for="placa" class="block">Placa:</label>
                                <input type="text" value="{{ $modalData['placa'] }}" id="placa" class="form-control border border-purple-500 focus:border-purple-700 rounded-md shadow-md" readonly>
                            </div>

                            <div class="mb-4">
                                <label for="serie" class="block">Serie:</label>
                                <input type="text" value="{{ $modalData['serie'] }}" id="serie" class="form-control border border-purple-500 focus:border-purple-700 rounded-md shadow-md" readonly>
                            </div>
                            
                            <div class="mb-4">
                                <label for="certificador" class="block">Certificador:</label>
                                <input type="text" value="{{ $modalData['certificador'] }}" id="certificador" class="form-control border border-purple-500 focus:border-purple-700 rounded-md shadow-md" readonly>
                            </div>

                            <div class="mb-4">
                                <label for="taller" class="block">Taller:</label>
                                <input type="text" value="{{ $modalData['taller'] }}" id="taller" class="form-control border border-purple-500 focus:border-purple-700 rounded-md shadow-md" readonly>
                            </div>

                            <div class="mb-4">
                                <label for="precio" class="block">Precio:</label>
                                <input type="number" value="{{ $modalData['precio'] }}" id="precio" class="form-control border border-purple-500 focus:border-purple-700 rounded-md shadow-md" readonly>
                            </div>

                            <div class="mb-4">
                                <label for="fecha" class="block">Fecha:</label>
                                <input type="date" value="{{ $modalData['fecha'] }}" id="fecha" class="form-control border border-purple-500 focus:border-purple-700 rounded-md shadow-md" readonly>
                            </div>

                            <!--<div class="mb-4">
                                <label for="externo" class="block">Externo:</label>
                                <input type="checkbox" value="{{ $modalData['externo'] }}" id="externo" class="form-control border border-purple-500 focus:border-purple-700 rounded-md shadow-md" readonly>
                            </div>-->

                            <div class="mb-4">
                                <label for="tipoServicio" class="block">Tipo de Servicio:</label>
                                <input type="text" value="{{ $modalData['tipoServicio'] }}" id="tipoServicio" class="form-control border border-purple-500 focus:border-purple-700 rounded-md shadow-md" readonly>
                            </div>

                            <div class="mb-4">
                                <label for="estado" class="block">Estado:</label>
                                <input type="text" value="{{ $modalData['estado'] }}" id="estado" class="form-control border border-purple-500 focus:border-purple-700 rounded-md shadow-md" readonly>
                            </div>

                            <!--<div class="mb-4">
                                <label for="pagado" class="block">Pagado:</label>
                                <input type="checkbox" value="{{ $modalData['pagado'] }}" id="pagado" class="form-control border border-purple-500 focus:border-purple-700 rounded-md shadow-md" readonly>
                            </div>-->
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endif

</div>
@endsection