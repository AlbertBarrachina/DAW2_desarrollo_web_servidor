<?php

namespace App\Http\Controllers;

use App\Models\pokemonModel;
use Illuminate\Http\Request;

class pokemonController extends Controller
{
    public function index()
    {
        // Muestra las difentes operaciones posibles
        return view('pokemon.index');
    }
    
    public function create()
    {
        // Muestra el formulario para crear una nueva tarea
        return view('pokemon.create');
    }
    
    public function store(Request $request)
    {
        // Almacena un nuevo poquemon el la base de datos
          // Validación de datos
          $request->validate([
            'nombre' => 'required|max:255',
            'tipo' => 'requiderd|max255',
            'tamano' => 'required',
        ]);

        // Crear una nueva instancia de Pokemon con los datos del formulario
        $pokemon = new pokemonModel([
            'nombre' => $request->input('nombre'),
            'tipo' => $request->input('tipo'),
            'tamano' => $request->input('tamano'),
            'peso' => $request->input('peso'),
        ]);

        // Guardar el pokemon en la base de datos
        $pokemon->save();

        // Redirigir a la lista de tareas con un mensaje
        //return redirect()->route('tareas.index')->with('success', 'Tarea creada correctamente');
    }

    public function show($id)
    {
        // Muestra los detalles de un pokemon especifico
    }
    
    public function edit($id)
    {
        // Muestra el formulario para editar un pokemon especifico
        return view('pokemons.edit', compact('pokemon'));
    }
    
    public function update(Request $request, $id)
    {
        // Actualiza un pokemon en la base de datos
    }
    
    public function destroy($id)
    {
        // Elimina un pokemon de la base de datos
    }
}