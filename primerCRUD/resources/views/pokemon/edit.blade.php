<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editor pokedex</title>
</head>

<body>

    <div>
        <h1>Modificar Pokemon</h1>

        <form action="{{ route('pokemon.update', $pokemon) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" value="{{old('nombre', $pokemon->nombre)}}" required>
            <br>
            <label for="tipo">Tipo:</label>
            <select name="tipo" required>
                <option value="Acero">Acero</option>
                <option value="Agua">Agua</option>
                <option value="Dragón">Dragón</option>
                <option value="Eléctrico">Eléctrico</option>
                <option value="Fantasma">Fantasma</option>
                <option value="Fuego">Fuego</option>
                <option value="Hada">Hada</option>
                <option value="Hielo">Hielo</option>
                <option value="Lucha">Lucha</option>
                <option value="Normal">Normal</option>
                <option value="Planta">Planta</option>
                <option value="Psíquico">Psíquico</option>
                <option value="Roca">Roca</option>
                <option value="Siniestro">Siniestro</option>
                <option value="Tierra">Tierra</option>
                <option value="Veneno">Veneno</option>
                <option value="Volador">Volador</option>
            </select>
            <br>
            <label for="tamano">Tamaño:</label>
            <select name="tamano" value="{{old('tamano', $pokemon->tamano)}}" required>
                <option value="Pequeño">Pequeño</option>
                <option value="Mediano">Mediano</option>
                <option value="Grande">Grande</option>
            </select>
            <br>
            <label for="peso">Peso:</label>
            <input type="number" step="0.1" name="peso" value="{{old('peso', $pokemon->peso)}}" required>
            <br>
            <button type="submit">actualizar Pokemon</button>
        </form>
    </div>
</body>

</html>