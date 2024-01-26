<div class="volver">
    <form action="{{route('tienda.index')}}" method="GET">
        <input type="submit" value="volver">
    </form>
</div>
<div>
    <form action="{{route('tienda.storeUsuario')}}" method="get">
        <input type="text" name="nick" placeholder="Nick">
        <input type="text" name="email" placeholder="Email">
        <input type="text" name="nombre" placeholder="Nombre">
        <input type="text" name="apellidos" placeholder="Apellidos">
        <input type="text" name="dni" placeholder="DNI">
        <input type="date" name="fecha_nacimiento" placeholder="fecha de nacimiento">
        <input type="text" name="contraseña" placeholder="Contraseña">
        <input type="text" name="repetir_contraseña" placeholder="Repita la contraseña">
        <input type="submit" value="Registrar">
    </form>
</div>

<style>
    .volver{
        position:absolute;
        top: 1pc;
        left: 3pc;
    }

    .volver>form>input{
        width: fit-content;
    }
    
    form{
        display:flex;
        flex-direction: column;
        row-gap:1em;
        width: 30em;
        position:absolute;
        top:20%;
        left:35%
    }
</style>