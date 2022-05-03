<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnteNoPatologico extends Model
{
    use HasFactory;
    protected $table='antenopatologico';
    protected $fillbale=['alcohol, tabaquismo,drogas,inmunizaciones,otros'];

}
