<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chofer extends Model
{
    use HasFactory;
    protected $table = 'chofer';
    protected $fillable = ['nombre, sexo, telefono','ci','fecha_nac',];
}
