<div>
    <h1>Pokemon List</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Tamaño</th>
                <th>Peso</th>
                <th>Acciones</th>
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
                    <td>
                        <a href="{{ route('pokemons.edit', $pokemon->id) }}">Editar</a>
                        <form action="{{ route('pokemons.destroy', $pokemon->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No hay Pokémon registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
