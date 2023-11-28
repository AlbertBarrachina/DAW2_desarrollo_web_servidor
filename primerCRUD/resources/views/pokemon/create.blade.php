<?php
    
?>
<div>
<h1>Crea un nuevo Pokemon</h1>

<form method="post">

    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" required>
    <br>
    <label for="tipo">Tipo:</label>
    <input type="text" name="tipo" required>
    <br>
    <label for="tamano">Tamaño:</label>
    <select name="tamano" required>
        <option value="pequeno">Pequeño</option>
        <option value="mediano">Mediano</option>
        <option value="grande">Grande</option>
    </select>
    <br>
    <label for="peso">Peso:</label>
    <input type="text" name="peso" required>
    <br>
    <button type="submit">Crear Pokemon</button>
</form>
</div>
