<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Importados;
use Illuminate\Http\Request;

class ServiciosImportadosController extends Component
{
    public function render()
    {        
        return view('livewire.create_servicios');
    }



    public function store(Request $request)
    {
        $request->validate([
            'placa' => 'required',
            'serie' => 'required',
            // Agrega aquí las validaciones para los demás campos del formulario
        ]);

        // Crea una nueva instancia del modelo Importados y asigna los datos del formulario
        $servicio = new Importados();
        $servicio->placa = $request->input('placa');
        $servicio->serie = $request->input('serie');

        $servicio->save();
        return redirect()->route('servicios_importados');
    }



}