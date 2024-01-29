<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsuarioModel;
use App\Models\CategoriaModel;
use App\Models\ProductoModel;
use App\Models\CarritoModel;

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

    public function showAdmin() {
        return view('tienda.adminIndex');
    }

    public function Login(Request $request) {
        $nick = $request->input('nick');
        $password = $request->input('password');

        $user = UsuarioModel::where('nick', $nick)->where('password', $password)->first();

        if ($user) {
            auth()->login($user);

            return redirect('/');
        } else {
            return redirect('/login')->with('error', 'Invalid credentials');
        }
    }

    

    /* CRUD usuario */

    public function storeUsuario(Request $request){
        $request->merge(['rol' => $request->input('rol', 'Usuario')]);
        $request->validate([
            'nick' => 'required',
            'email' => 'required',
            'nombre' => 'required',
            'apellidos' => 'required',
            'dni' => 'required',
            'fecha_nacimiento' => 'required|date',
            'contraseña' => 'required|same:repetir_contraseña',
            'rol' => 'required|in:Usuario,Admin',
        ]);
        UsuarioModel::create($request->all());

        // Redirigir a la lista de tareas con un mensaje
        return redirect()->route('tienda.index');
    }

    
    /* CRUD categoria */


    /* CRUD productos */


}
