
<div>
    <button wire:click="$set('open',false)" class="bg-indigo-500 text-white py-2 px-4 rounded-md shadow-md">
        Crear Nuevo Servicio
    </button>
    <div class="row justify-content-center" wire:model='open'>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-indigo-500 text-white text-center">
                    <h4 class="mb-0">Crear Nuevo Servicio</h4>
                </div>
                <div class="card-body">
                    <form>
                        
                        <div class="form-group">
                            <label for="placa" class="font-bold">Placa:</label>
                            <input type="text" name="placa" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="serie" class="font-bold">Serie:</label>
                            <input type="text" name="serie" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="certificador" class="font-bold">Certificador:</label>
                            <input type="text" name="certificador" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="taller" class="font-bold">Taller:</label>
                            <input type="text" name="taller" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="precio" class="font-bold">Precio:</label>
                            <input type="text" name="precio" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="fecha" class="font-bold">Fecha:</label>
                            <input type="text" name="fecha" class="form-control" required>
                        </div>
                        <div class="text-center my-4">
                            <button wire:click= 'guardar' class="bg-indigo-500 text-white py-2 px-4 rounded-md shadow-md">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>