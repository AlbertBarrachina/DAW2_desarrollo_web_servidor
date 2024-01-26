<?php

use App\Http\Controllers\tiendaController;
use Illuminate\Support\Facades\Route;

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
    return view('tienda.index');
});

Route::resource('tienda', TiendaController::class);

Route::get('showLogin', [TiendaController::class, 'showLogin'])->name('tienda.showLogin');
Route::get('showRegister', [TiendaController::class, 'showRegister'])->name('tienda.showRegister');
Route::get('storeUsuario', [TiendaController::class, 'storeUsuario'])->name('tienda.storeUsuario');