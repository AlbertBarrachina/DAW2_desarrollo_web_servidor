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
            <form action="{{route('pokemon.show')}}" method="GET">
                <input type="submit" value="Mostrar pokemons">
            </form>
        </div>
        <div class="div-crear">
            <a href="{{ url('pokemon/create')}}"><button>Crear pokemon</button></a>

        </div>
        <div class="div-modificar">
            <a href="{{ url('pokemon/update')}}"><button>Modificar pokemon</button></a>
        </div>
        <div class="div-eliminar">

        </div>
    </div>
</body>

</html>