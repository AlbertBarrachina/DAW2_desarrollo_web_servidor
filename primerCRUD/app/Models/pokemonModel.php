<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pokemonModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'tipo',
        'tamano',
        'peso'
    ];
}
