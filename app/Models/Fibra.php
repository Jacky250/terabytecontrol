<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fibra extends Model
{
    use HasFactory;
    protected $fillable = ['id','switch', 'router', 'equipo', 'modelo', 'olt', 'location_id'];
}
