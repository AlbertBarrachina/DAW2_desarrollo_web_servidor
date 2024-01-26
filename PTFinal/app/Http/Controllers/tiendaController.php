<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class tiendaController extends Controller
{
    //

    public function index() {
        return view('tienda.index');
    }

    public function showLogin() {
        return view('tienda.login');
    }
    
    public function showRegister() {
        return view('tienda.register');
    }

    public function storeUsuario(Request $request){
        $request->validate([
            'nick' => 'required',
            'email' => 'required',
            'nombre' => 'required',
            'apellidos' => 'required|numeric',
            'dni' => 'required',
            'fecha_nacimiento' => 'required',
            'contraseña' => 'required|same:repetir_contraseña',
            'rol' => 'required|in:Usuario,Admin',
        ]);

        $request->merge(['rol' => $request->input('rol', 'Usuario')]);
        UsuarioModel::create($request->all());

        // Redirigir a la lista de tareas con un mensaje
        return redirect()->route('pokemon.index')->message('Registro exitoso $nick');
    }
}
