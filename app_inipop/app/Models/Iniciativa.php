<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Iniciativa extends Model
{
    use HasFactory;
    protected $table='iniciativa';
    protected $primaryKey='cod_iniciativa';
}
