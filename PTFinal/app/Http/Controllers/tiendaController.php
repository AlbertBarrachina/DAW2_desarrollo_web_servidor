<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class tiendaController extends Controller
{
    //

    public function showLogin() {
        return view('tienda.login');
    }
    
    public function showRegister() {
        return view('tienda.register');
    }
}
