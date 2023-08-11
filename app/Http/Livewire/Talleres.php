<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Taller;
use Livewire\WithPagination;

class Talleres extends Component
{
    public $talleres;
    use WithPagination;



    public function render()
    {
        return view('livewire.talleres');
    }  

    public function mount(){
        $this->talleres=Taller::all();
    }

    protected $rules=[        
        'seleccion'=>'required|numeric|min:1',  
    ];

}