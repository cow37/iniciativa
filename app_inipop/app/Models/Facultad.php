<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facultad extends Model
{
    use HasFactory;
    protected $table='facultad';
    protected $primaryKey='cod_facultad';
   // protected $hidden=['created_at','updated_at'];
    public $timestamps = false;
    protected $fillable = [
        'cod_facultad', 'cod_universidad', 'nombre_facultad',
    ];
   
}
