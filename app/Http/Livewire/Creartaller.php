<?php

namespace App\Http\Livewire;

use App\Models\Taller;
use Livewire\Component;
use Livewire\WithFileUploads;



class Creartaller extends Component
{
    public $open =false;
    public $nombre;
    public $direccion;
    public $ruc;
    public $representante;
    public $idDistrito;
    public $rutaLogo;
    public $rutaFirma;
    public $borralogo;
    public $borrafirma;
    use WithFileUploads;

    

    protected $rules = [
        'nombre'=> 'required' ,
        'direccion'=> 'required' ,
        'representante'=> 'required' ,
        'idDistrito'=> 'required' ,
        'rutaLogo'=> 'required' ,
        'rutaFirma'=> 'required' ,
        'ruc'=> 'required' ,
        
    ];

    public function mount(){
        $this -> borralogo = rand();
        $this -> borrafirma = rand();
    }

    public function render()
    {
        return view('livewire.creartaller');
    }

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }


    public function crearTaller()
    {
        $this->validate();

        $rutaLogo = $this->rutaLogo->store('taller');
        $rutaFirma = $this->rutaFirma->store('taller');

        Taller::create([
            'nombre' => $this->nombre,
            'direccion' => $this->direccion,
            'representante' => $this->representante,
            'idDistrito' => $this->idDistrito,
            'rutaLogo' => $rutaLogo,
            'rutaFirma' => $rutaFirma,
            'ruc' => $this->ruc,
        ]);

        $this->reset(['open', 'nombre', 'direccion', 'representante', 'idDistrito', 'rutaLogo', 'rutaFirma','ruc']);

        $this->borralogo = rand();
        $this->borrafirma = rand();

        $this->emitTo('talleres','render');

        $this->emit('alert', 'El Taller se creo satisfactoriamente');

        
    }

    

    public function resetForm()
    {
        $this->open = false;
        $this->nombre = null;
        $this->direccion = null;
        $this->representante = null;
        $this->idDistrito = null;
        $this->rutaLogo = null;
        $this->rutaFirma = null;
        $this->ruc = null;

    }

}
