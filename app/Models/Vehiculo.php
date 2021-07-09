<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehiculo extends Model
{
    //Este modelo hace referencia a vehiculos rodabos aunque el nombre del modelo este genrealizado
    use HasFactory;
    use SoftDeletes;
}
