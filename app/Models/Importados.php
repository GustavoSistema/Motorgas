<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Importados extends Model
{
    use HasFactory;

    protected $table = 'servicios_importados';

  public $fillable = [                     
      'placa', "serie", "certificador", "taller", "precio", "fecha", "externo", "tipoServicio", "estado", "pagado" ,
  ];



}
 