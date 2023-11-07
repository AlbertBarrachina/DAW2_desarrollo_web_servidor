<?php
require_once('models/login_model.php');

$modelo = new login_model;


if (isset($_POST['login'])) {
    $nick = $_POST['nick'];
    $contrasenya = $_POST['contrasenya'];
    $modelo->comprobarLogin($nick, $contrasenya);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda-Login</title>
    <link rel="stylesheet" type="text/css" href="/tienda/views/style/login.css">
</head>

<body>
    <div class="titulo">
        Inicio de sesion
    </div>
    <div class="formulario">
        <form method="POST">
            <label for="nick">Nick</label>
            <input type="text" name="nick">
            <label for="contrasenya">Contraseña</label>
            <input type="password" name="contrasenya">
            <input type="submit" class="submit" value="Iniciar sesion" name="login">
        </form>
        <!--areglar el href para que use php en vez de un "a"-->
        <button class="boton-registro"><a href="/tienda/views/registro_view.php">REGISTRAR CUENTA NUEVA</a></button>
    </div>
</body>

</html>