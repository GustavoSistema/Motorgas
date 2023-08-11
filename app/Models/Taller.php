<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taller extends Model
{
    use HasFactory;

    protected $table = 'taller';
    protected $fillable=
    [
     'id',   
    'nombre',
    'direccion',
    'ruc',
    'representante',
    'idDistrito',
    'rutaLogo',
    'rutaFirma',
    ];

    public function Distrito(){
        return $this->belongsTo(Distrito::class,'idDistrito');
    }

}
