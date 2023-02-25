<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
//\Auth\MustVerifyEmail::sendEmailVerificationNotification

class Participante extends Model 
{
    use HasFactory;
    protected $table='participante';
    protected $primaryKey='cod_participante';
    protected $hidden=['created_at','updated_at'];
    public $timestamps = true;
    protected $fillable = [
        'cod_participante', 'cod_iniciativa', 'cod_universidad','cod_facultad', 'carrera', 'nombres', 'apellidos', 'nro_cedula', 'correo_electronico', 'nro_celular', 
    ];
}
