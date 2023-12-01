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
        // Validación de datos
        $request->validate([
            'nombre' => 'required',
            'tipo' => 'required',
            'tamano' => 'required|in:Pequeño,Mediano,Grande',
            'peso' => 'required|numeric',
        ]);

        pokemonModel::create($request->all());

        // Redirigir a la lista de tareas con un mensaje
        return redirect()->route('pokemon.index');
    }

    public function show()
    {
        $pokemons = pokemonModel::all();

        return view('pokemon.show', compact('pokemons'));
    }

    public function edit($id)
    {
        // Muestra el formulario para editar un pokemon especifico
        return view('pokemons.edit', compact('pokemons.id'));
    }

    public function update(Request $request, $id)
    {
        return view('pokemons.index');
        // Actualiza un pokemon en la base de datos
    }

    public function destroy($id)
    {
        // Find and delete the Pokémon
        $pokemon = pokemonModel::findOrFail($id);

        $pokemon->delete();
        return redirect()->route('pokemon.index')->with('success', 'Pokémon eliminado correctamente');
    }
}
