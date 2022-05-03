<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historialclinico extends Model
{
    use HasFactory;
    protected $table = 'historialclinico';
    protected $fillable = ['id_ante_patologicos_,id_antenopatologico,id_antefamiliares,id, descripcion,gruposanguineo,ocupacion,nombredoctor,ultimaconsulta'];
}
