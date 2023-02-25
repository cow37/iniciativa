<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
    use HasFactory;
    protected $table='sedes';
    protected $primaryKey='cod_sede';
   // protected $hidden=['created_at','updated_at'];
    public $timestamps = false;
    protected $fillable = [
        'cod_sede', 'cod_facultad', 'nombre_sede',
    ];
}
