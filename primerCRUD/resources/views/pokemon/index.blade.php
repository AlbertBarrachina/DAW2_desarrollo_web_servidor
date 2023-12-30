<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    <div class="opciones">
        <div class="div-mostrar">
            <form action="{{route('pokemon.showAdmin')}}" method="GET">
                <input type="submit" value="Mostrar pokemons">
            </form>
        </div>
        <div class="div-crear">
            <form action="{{route('pokemon.create')}}" method="GET">
                <input type="submit" value="Crear pokemons">
            </form>
        </div>
    </div>
</body>

</html>