<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnteFamiliar extends Model
{
    use HasFactory;
    protected $table='antefamiliares';
    protected $fillbale=['padre, madre'];
}
