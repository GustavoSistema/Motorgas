<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Material;

class Crearformato extends Component
{

    public $open =false;
    public $descripcion;

    protected $rules = [
        'descripcion' => 'required',
    ];

    public function render()
    {
        return view('livewire.crearformato');
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

    public function crearFormato()
    {
        $this->validate();

        Material::create([
            'descripcion' => $this->descripcion,
        ]);

        $this->closeModal();
    }
    private function resetForm()
    {
        $this->descripcion = null;
    }
}
