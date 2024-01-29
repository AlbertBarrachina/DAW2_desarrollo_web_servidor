<div class="volver">
    <form action="{{route('tienda.index')}}" method="GET">
        <input type="submit" value="volver">
    </form>
</div>
<div>
    <form action="{{route('tienda.Login')}}" method="GET">
        <input type="text" placeholder="Nick" name="nick">
        <input type="text" placeholder="Contraseña" name="password">
        <input type="submit" value="Iniciar sesion">
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