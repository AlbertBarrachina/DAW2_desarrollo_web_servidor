<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca pokedex</title>
</head>

<body>


    <div>
        <h1>Pokemon List</h1>

        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Tamaño</th>
                    <th>Peso</th>
                    <!--th>Acciones</th-->
                </tr>
            </thead>
            <tbody>
                @forelse ($pokemons as $pokemon)
                <tr>
                    <td>{{ $pokemon->id }}</td>
                    <td>{{ $pokemon->nombre }}</td>
                    <td>{{ $pokemon->tipo }}</td>
                    <td>{{ $pokemon->tamano }}</td>
                    <td>{{ $pokemon->peso }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="6">No hay Pokémon registrados.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>

</html>