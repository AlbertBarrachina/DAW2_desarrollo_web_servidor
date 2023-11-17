<?php
set_include_path(get_include_path() . PATH_SEPARATOR . 'C:/xampp/htdocs/tienda/');
require_once('models/login_model.php');

$modelo = new login_model;


if (isset($_POST['login'])) {
    $nick = $_POST['nick'];
    $contrasenya = $_POST['contrasenya'];
    $modelo->comprobarLogin($nick, $contrasenya);
    exit();
}else if(isset($_POST['registrar'])){
    header("Location: /tienda/views/registro_view.php");
    exit();
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
        <form method="POST">
            <input type="submit" class="boton-registro" name="registrar" value="REGISTRAR CUENTA NUEVA">
        </form>
    </div>
</body>

</html>