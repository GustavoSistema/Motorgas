<?php

namespace App\Http\Livewire;
use App\Models\Importados;
use Livewire\Component;
use Livewire\WithPagination;
use Carbon\Carbon;

class ServiciosImportados extends Component
{
    use WithPagination;
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
    public $editing = false;
   // public $tipoMaterialList = [];
    public $search = '';    
    public $foundRecords = true;


    //public $viewing = false;
    public $isViewing = false;
    public $modalTitle = '';
    public $modalData = null;
    

    public function render()
    {
        //$tipoMaterialList = Importados::where("id","!=",1)->orderBy('id','desc')->paginate(10);
        //dd($tipoMaterialList);
        $tipoMaterialList = Importados::where(function ($query) {
            $query->where('placa', 'LIKE', '%' . $this->search . '%')
                  ->orWhere('serie', 'LIKE', '%' . $this->search . '%')
                  ->orWhere('certificador', 'LIKE', '%' . $this->search . '%')
                  ->orWhere('taller', 'LIKE', '%' . $this->search . '%');
        })->paginate(10);
       // dd(count($tipoMaterialList));
        return view('livewire.servicios_importados', compact( 'tipoMaterialList' ));

    }
    /*public function render()
    {
        $tipoMaterialList = Importados::where('placa', 'like', '%' . $this->search . '%')
            ->orWhere('serie', 'like', '%' . $this->search . '%')
            ->orWhere('certificador', 'like', '%' . $this->search . '%')
            ->orWhere('taller', 'like', '%' . $this->search . '%')
            ->paginate(10);

        return view('livewire.servicios_importados', compact('tipoMaterialList'));
    }*/
    public function mount()
    {
       // $this->loadData();
    }

    public function loadData()
    {
        // Carga la lista de materiales desde la base de datos
        $tipoMaterialList = Importados::where("id","!=",0)->paginate(10);
    }
    public function create()
    {
        $this->editing = true;
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

        $this->updateOrCreate();         
    }

    public function updateOrCreate()
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


        if ($this->servicioId) {
            // Estamos en modo de edición, actualiza el material existente en la base de datos
            $servicio = Importados::find($this->servicioId);
            if ($servicio) {
                // Actualiza los campos del material
                $servicio->placa = $this->placa;
                $servicio->serie = $this->serie;
                $servicio->certificador = $this->certificador;
                $servicio->taller = $this->taller;
                $servicio->precio = $this->precio;
                $servicio->fecha = $this->fecha;
                $servicio->externo = $this->externo;
                $servicio->tipoServicio = $this->tipoServicio;
                $servicio->estado = $this->estado;
                $servicio->pagado = $this->pagado;
                // Aquí puedes agregar otros campos que necesites actualizar
                $servicio->save();
            }
        } else {
            // Estamos en modo de creación, crea un nuevo material en la base de datos
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
                // Aquí puedes agregar otros campos que necesites guardar
            ]);
        }

        // Después de crear o actualizar, restablece el formulario y recarga la lista de materiales
        $this->resetForm();
        $this->loadData();
    }

    public function closeEditModal()
    {
        $this->editing = false;
        $this->resetForm();
        $this->resetValidation();
    }

    public function edit(Importados $servicio)
{
    //$servicio = Importados::findOrFail($imp->id);
    $this->editing = true;
    $this->servicioId = $servicio->id;
    $this->placa = $servicio->placa;
    $this->serie = $servicio->serie;
    $this->certificador = $servicio->certificador;
    $this->taller = $servicio->taller;
    $this->precio = $servicio->precio;
    $this->fecha = Carbon::parse($servicio->fecha)->format('Y-m-d');
    //$this->fecha = $servicio->fecha;
    $this->externo = $servicio->externo;
    $this->tipoServicio = $servicio->tipoServicio;
    $this->estado = $servicio->estado;
    $this->pagado = $servicio->pagado;
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

        $servicio = Importados::findOrFail($this->servicioId);
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
    public function delete($id)
    {
        Importados::find($id)->delete();
    }

    public function resetForm()
    {
        $this->editing = false;
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
        $this->servicioId = null;
    }

    public function openViewModal($servicioId)
    {
        $this->modalTitle = 'Detalles del Servicio';
        $this->modalData = Importados::find($servicioId);
        // Formatear la fecha antes de pasarla a la vista
        $this->modalData['fecha'] = Carbon::parse($this->modalData['fecha'])->format('Y-m-d');
        $this->isViewing = true;
    }

    public function closeViewModal()
    {
    $this->isViewing = false;
    }

    /*
    public function updatingSearch()
    {
    $this->tipoMaterialList = Importados::where(function ($query) {
        $query->where('placa', 'LIKE', '%' . $this->search . '%')
              ->orWhere('serie', 'LIKE', '%' . $this->search . '%')
              ->orWhere('certificador', 'LIKE', '%' . $this->search . '%')
              ->orWhere('taller', 'LIKE', '%' . $this->search . '%');
    })->get();

    $this->foundRecords = count($this->tipoMaterialList) > 0;
    }
    */

    /*
    public function clearSearch()
    {
        $this->search = '';
        $this->tipoMaterialList = Importados::all();
        $this->foundRecords = true;
    }
    */

}