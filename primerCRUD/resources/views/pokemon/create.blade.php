<?php
    
?>
<form action="{{route('pokemon.index')}}" method="GET">
    <input type="submit" value="Volver">
</form>
<div>
    <h1>Crea un nuevo Pokemon</h1>

    <form action="{{ route('pokemon.store') }}" method="POST">
        @csrf
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required>
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
        <select name="tamano" required>
            <option value="Pequeño">Pequeño</option>
            <option value="Mediano">Mediano</option>
            <option value="Grande">Grande</option>
        </select>
        <br>
        <label for="peso">Peso:</label>
        <input type="number" step="0.1" name="peso" required>
        <br>
        <button type="submit">Crear Pokemon</button>
    </form>
</div>