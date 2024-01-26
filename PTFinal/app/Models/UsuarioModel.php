<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioModel extends Model
{
    use HasFactory;

    protected $table ="usuario";

    protected $fillable = [
        'nick',
        'email',
        'nombre',
        'apellidos',
        'dni',
        'fecha_nacimiento',
        'contraseña',
        'rol'
    ];
}
