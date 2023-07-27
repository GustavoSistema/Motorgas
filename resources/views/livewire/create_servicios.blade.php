

    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        Crear Nuevo Servicio aa
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('create_servicios') }}">
                            @csrf 
                            <div class="form-group">
                                <label for="placa">Placa:</label>
                                <input type="text" name="placa" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="serie">Serie:</label>
                                <input type="text" name="serie" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="serie">certificador:</label>
                                <input type="text" name="serie" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="serie">Taller:</label>
                                <input type="text" name="serie" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="serie">Precio:</label>
                                <input type="text" name="serie" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="serie">Fecha:</label>
                                <input type="text" name="serie" class="form-control">
                            </div>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md shadow-md">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
