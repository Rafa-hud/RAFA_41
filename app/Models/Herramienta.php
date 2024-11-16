<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;



class Herramienta extends Model
{

    use HasFactory;
       
    protected $table = 'herramientas';
    protected $fillable = ['nombre', 'descripcion', 'cantidad', 'disponible'];
    public $timestamps = false; 
}
