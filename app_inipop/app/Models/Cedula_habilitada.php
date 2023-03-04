<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cedula_habilitada extends Model
{
    use HasFactory;
    protected $table='cedulas_habilitadas';
    protected $primaryKey='cod_ced_habilitada';
    protected $hidden=['created_at','updated_at'];
    public $timestamps = true;
    protected $fillable = [
        'cod_ced_habilitada', 'cedula', 'nombre','apellido', 'fecha_inscripcion', 'sexo', 'fecha_nacimiento', 
    ];

}
