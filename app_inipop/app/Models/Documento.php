<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    use HasFactory;
    protected $table='documento';
    protected $primaryKey='cod_documento';
   // protected $hidden=['created_at','updated_at'];
    public $timestamps = true;
    protected $fillable = [
        'cod_documento','cod_participante', 'nro_cedula', 'nombre_apellido',
    ];
}
