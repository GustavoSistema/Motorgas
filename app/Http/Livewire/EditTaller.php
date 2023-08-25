<?php

namespace App\Http\Livewire;

use App\Models\Taller;
use Livewire\Component;

class EditTaller extends Component
{
    public $open = false;
    public $taller2;

    public function mount(Taller $taller2)
    {
        $this->taller2 = $taller2; 
    }


    public function render()
    {
        return view('livewire.edit-taller');
    }

    


}
