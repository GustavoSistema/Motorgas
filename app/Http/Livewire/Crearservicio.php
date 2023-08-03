<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Importados;

class Crearservicio extends Component
{
    public $open =false;
    public $placa;
    public $serie;
    public $certificador;
    public $taller;
    public $precio;
    public $fecha;
    public $externo;
    public $tipoServicio;
    public $estado;
    public $pagado;

    protected $rules = [
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
    ];


    public function render()
    {
        return view('livewire.crearservicio');
    }

    public function openModal()
    {
        $this->resetForm();
        $this->open = true;
    }

    public function closeModal()
    {
        $this->open = false;
    }

    public function crearRol()
    {
        $this->validate();

        Importados::create([
            'placa' => $this->placa,
            'serie' => $this->serie,
            'certificador' => $this->certificador,
            'taller' => $this->taller,
            'precio' => $this->precio,
            'fecha' => $this->fecha,
            'externo' => $this->externo,
            'tipoServicio' => $this->tipoServicio,
            'estado' => $this->estado,
            'pagado' => $this->pagado,
        ]);

        $this->closeModal();
    }
    private function resetForm()
    {
        $this->placa = null;
        $this->serie = null;
        $this->certificador = null;
        $this->taller = null;
        $this->precio = null;
        $this->fecha = null;
        $this->externo = null;
        $this->tipoServicio = null;
        $this->estado = null;
        $this->pagado = null;
    }
}
