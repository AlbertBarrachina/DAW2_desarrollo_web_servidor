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

    public function showAdmin()
    {
        $pokemons = pokemonModel::all();

        return view('pokemon.showAdmin', compact('pokemons'));
    }

    public function edit($id)
    {
        $pokemon = pokemonModel::findOrFail($id);
        return view('pokemon.edit', compact('pokemon'));
    }

    public function update(Request $request, $id)
{
    // Valida los datos 
    $request->validate([
        'nombre' => 'required',
        'tipo' => 'required',
        'tamano' => 'required|in:Pequeño,Mediano,Grande',
        'peso' => 'required|numeric',
    ]);

    // obtiene el pokemon de la db
    $pokemon = pokemonModel::findOrFail($id);

    // actuliza el pokemon
    $pokemon->update($request->all());

    // vuelve al index
    return redirect()->route('pokemon.index');
}

    public function destroy($id)
    {
        // Find and delete the Pokémon
        $pokemon = pokemonModel::findOrFail($id);

        $pokemon->delete();
        return redirect()->route('pokemon.showAdmin')->with('success', 'Pokémon eliminado correctamente');
    }

}
