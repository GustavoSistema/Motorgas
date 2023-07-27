<?php

namespace App\Http\Livewire;
use App\Models\Importados;
use Livewire\Component;
use Livewire\WithPagination;

class ServiciosImportados extends Component
{
    public $servicioId;
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
    public $showModal = false;
    public $modalData = [];    
    public $modalTitle = '';
    public $searchTerm;

    protected $primaryKey = 'mi_columna_id';

    public $perPage=10;
    use WithPagination;


    public function render()
{
    $serviciosImportados = Importados::where(function ($query) {
        $query->where('placa', 'like', '%' . $this->searchTerm . '%')
            ->orWhere('certificador', 'like', '%' . $this->searchTerm . '%')
            ->orWhere('taller', 'like', '%' . $this->searchTerm . '%');
    })->paginate($this->perPage);

    return view('livewire.servicios_importados', compact('serviciosImportados'));
}


    public function create()
    {
        return redirect()->route('create_servicios');
    }
    




    public function edit(Importados $servicio)
    {
        if (isset($servicio->id)) {

        
            $this->servicioId = $servicio->id;
            $this->placa = $servicio->placa;
            $this->serie = $servicio->serie;
            $this->certificador = $servicio->certificador;
            $this->taller = $servicio->taller;
            $this->precio = $servicio->precio;
            $this->fecha = $servicio->fecha;
            $this->externo = $servicio->externo;
            $this->tipoServicio = $servicio->tipoServicio;
            $this->estado = $servicio->estado;
            $this->pagado = $servicio->pagado;

            $this->showModal = true;

         }
    }

    





    public function update()
    {
        $this->validate([
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

        $servicio = Importados::find($this->servicioId);
        if ($servicio) {
            $servicio->update([
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
            $this->resetForm();
        }
    }

    public function delete($id)
    {
        Importados::find($id)->delete();
    }

    public function view($id)
    {
        $servicio = Importados::find($id);
    if (isset($servicio->id)) {
            $this->servicioId = $servicio->id;
            $this->placa = $servicio->placa;
            $this->serie = $servicio->serie;
            $this->certificador = $servicio->certificador;
            $this->taller = $servicio->taller;
            $this->precio = $servicio->precio;
            $this->fecha = $servicio->fecha;
            $this->externo = $servicio->externo;
            $this->tipoServicio = $servicio->tipoServicio;
            $this->estado = $servicio->estado;
            $this->pagado = $servicio->pagado;
    
            $this->showModal = true;
        }   
     }

    public function resetForm()
    {
        $this->servicioId = null;
        $this->placa = null;
        $this->serie = null;
        $this->certificador = null;
        $this->taller = null ;
        $this->precio = null ;
        $this->fecha = null ;
        $this->externo = null;
        $this->tipoServicio = null;
        $this->estado =  null;
        $this->pagado = null ;
    }


    public function openModal($id,$title)
    {
        $servicio = Importados::find($id);
        if ($servicio) {
            $this->modalData = [
                'id' => $servicio->id,
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
            ];
            $this->modalTitle = $title;
            $this->showModal = true;
        }
    }


    public function closeModal()
    {
        $this->showModal = false;
    }




}