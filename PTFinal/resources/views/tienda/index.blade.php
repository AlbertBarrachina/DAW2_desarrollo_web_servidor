<div>
    <form action="{{route('tienda.showLogin')}}" method="GET">
        <input type="submit" value="Iniciar sesion">
    </form>
    <form action="{{route('tienda.showRegister')}}" method="GET">
        <input type="submit" value="Registrate">
    </form>
</div>

@if($userRol == 'Admin')
    <form action="{{route('tienda.showAdmin')}}">
        <button action="submit">Zona admin</button>
    </form>
@elseif($userRol == 'Usuario')
    <p>Howdy Usuario!</p>
@else
    <p>Inicia sesion o registrate!</p>
@endif