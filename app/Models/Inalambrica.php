<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inalambrica extends Model
{
    use HasFactory;
    protected $fillable = ['ip', 
                                'router', 
                                'conexion', 
                                'ssid', 
                                'frecuencia', 
                                'ancho_de_canal', 
                                'modelo', 
                                'lugar', 
                                'switch', 
                                'puerto', 
                                'location_id'];
}

