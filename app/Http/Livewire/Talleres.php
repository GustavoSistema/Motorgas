<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Taller;
use Livewire\WithPagination;

class Talleres extends Component
{
    
    public $nombre, $direccion, $ruc, $representante, $idDistrito, $rutaLogo, $rutaFirma;
    public $search = "";
    use WithPagination;

    protected $listeners = ['render'];


    public function render()
    {

        $talleres = Taller::where(function ($query) {
            $query->where('nombre', 'LIKE', '%' . $this->search . '%')
                ->orWhere('representante', 'LIKE', '%' . $this->search . '%')
                ->orWhere('direccion', 'LIKE', '%' . $this->search . '%')
                ->orWhere('idDistrito', 'LIKE', '%' . $this->search . '%');
        })->paginate(10);
        
        return view('livewire.talleres', compact('talleres'));
    }

    public function mount()
    {
        //$this->talleres = Taller::all();
    }

    
    protected $rules=[        
        'seleccion'=>'required|numeric|min:1',  
    ];

    public function delete($id)
    {

        Taller::find($id)->delete();
    }

    
}
