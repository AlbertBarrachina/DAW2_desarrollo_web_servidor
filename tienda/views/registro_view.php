<?php
set_include_path(get_include_path() . PATH_SEPARATOR . 'C:/xampp/htdocs/tienda/models');
require_once('registro_model.php');

$modelo = new registro_model;


if (isset($_POST['registrar'])) {
    $nick = $_POST['nick'];
    $email = $_POST['email'];
    $contrasenya = $_POST['contrasenya'];
    $contrasenya2 = $_POST['contrasenya2'];
    if($contrasenya == $contrasenya2){
    $modelo->registrar($nick, $email, $contrasenya, $contrasenya2);
    }else{
        header("Location: /tienda/views/registro_view.php");
    exit();
    }   
}else if(isset($_POST['login'])){
    header("Location: /tienda/views/login_view.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda-Registro</title>
        <link rel="stylesheet" type="text/css" href="/tienda/views/style/registro.css">
</head>

<body>
    <div class="titulo">
        REGISTRO
    </div>
    <div class="formulario">
        <form method="POST">
            <label for="nick">Nick</label>
            <input type="text" name="nick" required>
            <label for="email">Correo electronico</label>
            <input type="text" name="email" reqired>
            <label for="contrasenya">Contraseña</label>
            <input type="password" name="contrasenya" required>
            <label for="contrasenya2">Repita la contraseña</label>
            <input type="password" name="contrasenya2" required>
            <input type="submit" class="submit" value="Registrar" name="registrar">
        </form>
    </div>

        <form method="POST" class="form-login">
            <label for="login">Ya tienes una cuenta?</label><br>
            <input type="submit" name="login" value="Iniciar sesion." class="boton-login">
        </form>
</body>

</html>
