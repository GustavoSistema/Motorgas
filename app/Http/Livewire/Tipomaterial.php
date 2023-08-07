<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Material;

class TipoMaterial extends Component
{
    public $descripcion;
    public $tipoMaterialId;
    public $editing = false;
    public $tipoMaterialList = [];
    public $search = '';    
    public $foundRecords = true;


    public function render()
    {
        $tipoMaterialList = Material::all();
        return view('livewire.tipomaterial', compact('tipoMaterialList'));
    }


    public function mount()
    {
        $this->loadData();
    }


    public function loadData()
    {
        $this->tipoMaterialList = Material::all();
    }


    public function create()
    {
        $this->editing = true;
        $this->tipoMaterialId = null;
        $this->descripcion = null;

        $this->updateOrCreate();   
    }


    public function updateOrCreate()
    {
        $this->validate([
            'descripcion' => 'required',
        ]);


        if ($this->tipoMaterialId) {
            $tipoMaterial = Material::find($this->tipoMaterialId);
            if ($tipoMaterial) {
                $tipoMaterial->descripcion = $this->descripcion;
                $tipoMaterial->save();
            }
        } else {
            Material::create([
                'descripcion' => $this->descripcion,
            ]);
        }
        $this->resetForm();
        $this->loadData();
    }




    public function closeEditModal()
    {
        $this->editing = false;
        $this->resetForm();
        $this->resetValidation();
    }



    public function edit($id)
    {
        $tipoMaterial = Material::findOrFail($id);
        $this->editing = true;
        $this->tipoMaterialId = $tipoMaterial->id;
        $this->descripcion = $tipoMaterial->descripcion;
    }

    public function update()
    {
        $this->validate([
            'descripcion' => 'required',
        ]);

        $tipoMaterial = Material::findOrFail($this->tipoMaterialId);
        $tipoMaterial->update([
            'descripcion' => $this->descripcion,
        ]);

        $this->resetForm();
    }

    public function delete($id)
    {
        Material::findOrFail($id)->delete();
    }

    public function resetForm()
    {
        $this->editing = false;
        $this->descripcion = null;
        $this->tipoMaterialId = null;
    }


    public function view($id)
{
    $tipoMaterial = Material::findOrFail($id);
    $this->tipoMaterialId = $tipoMaterial->id;
    $this->descripcion = $tipoMaterial->descripcion;
}


public function updatingSearch()
    {
        $this->tipoMaterialList = Material::where('descripcion', 'LIKE', '%' . $this->search . '%')->get();

        // Verificar si se encontraron registros o no
        $this->foundRecords = count($this->tipoMaterialList) > 0;
    }

    public function clearSearch()
    {
        $this->search = '';
        $this->tipoMaterialList = Material::all();
        $this->foundRecords = true;
    }

    

}