<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AntePatologico extends Model
{
    use HasFactory;
    protected $table='ante_patologicos_';
    protected $fillbale=['cardiologicos, pulmunares,digestivos,diabetes,renales,quirurgicos,alergicos,transfuciones,medicamentos'];
}