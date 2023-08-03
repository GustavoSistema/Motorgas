<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Importados;
use Illuminate\Http\Request;

class ServiciosImportadosController extends Component
{
    public $open =false;

    public function render()
    {        
        return view('livewire.create_servicios');
    }



    public function store(Request $request)
    {
        $request->validate([
            'placa' => 'required',
            'serie' => 'required',
        ]);
       
        $servicio = new Importados();
        $servicio->placa = $request->input('placa');
        $servicio->serie = $request->input('serie');

        $servicio->save();
        return redirect()->route('servicios_importados');
    }

    public function edit($servicioId)
    {
        $servicio = Importados::find($servicioId);

        return view('edit_servicios', [
            'servicioId' => $servicio->id,
            'placa' => $servicio->placa,
            'serie' => $servicio->serie,
            'certificador' => $servicio->certificador,
            'taller' => $servicio->taller,
            'precio' => $servicio->precio,
            'fecha' => $servicio->fecha,
            'externo' => $servicio->externo,
            'tipoServicio' => $servicio->tipoServicio,
            'estado' => $servicio->estado,
            'pagado' => $servicio->pagado,
        ]);
    }

    public function update(Request $request, $servicioId)
    {
        $this->validate($request, [
            'placa' => 'required',
            'serie' => 'required',
            'certificador' => 'required',
            'taller' => 'required',
            'precio' => 'required',
            'fecha' => 'required',
            'externo' => 'required',
            'tipoServicio' => 'required',
            'estado' => 'required',
            'pagado' => 'required',
        ]);

        $servicio = Importados::find($servicioId);
        if ($servicio) {
            $servicio->update($request->all());
        }

        return redirect()->route('servicios_importados');
    }




}