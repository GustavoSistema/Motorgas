<div>
    <div class="row mb-5">
        <div class="col-md-6 text-center">
            <h3 style="font-size: 2.5rem; font-weight: bold;">Registro de Talleres</h3>
        </div>

        <div class="card-footer">
            <div class="row justify-content-between">
                <div class="col-md-6">
                    @livewire('creartaller')
                </div>

                <div class="col-md-6">
                    <div class="input-group">
                        <input type="text" wire:model="search"
                            class="form-control border border-purple-500 focus:border-purple-700 rounded-md shadow-md"
                            placeholder="Buscar...">
                        <div class="input-group-append">
                            <button wire:click="clearSearch" class="btn btn-outline-secondary"
                                type="button">Limpiar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="card-body">
        @if (isset($talleres))
            <table class="mt-4 w-full border-collapse">


                <thead>
                    <tr class="bg-indigo-500 text-white py-2 px-4 rounded-md shadow-md">
                        <th class="px-4 py-2 text-center">ID</th>
                        <th class="px-4 py-2 text-center">Nombre</th>
                        <th class="px-4 py-2 text-center">Direccion</th>
                        <th class="px-4 py-2 text-center">Ruc</th>
                        <th class="px-4 py-2 text-center">Representante</th>
                        <th class="px-4 py-2 text-center">Distrito</th>
                        <th class="px-4 py-2 text-center">Logo</th>
                        <th class="px-4 py-2 text-center">Firma</th>
                        <th class="px-4 py-2 text-center">Acciones</th>
                    </tr>
                </thead>


                <tbody>


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
                                                            
                             @livewire('edit-taller', ['taller' => $taller], key($taller->id))                               
                            
                        </tr>
                    @endforeach


                </tbody>

            </table>
            {{ $talleres->links() }}

        @endif


    </div>
</div>
