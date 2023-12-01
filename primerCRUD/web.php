<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pokemonController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('pokemon.index');
});

//damos el acceso al controlador de pokemons
Route::resource('pokemon', pokemonController::class);

// Para mostrarlo
Route::get('/show', [PokemonController::class, 'show'])
    ->name('pokemon.show');


