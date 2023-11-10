<?php
set_include_path(get_include_path() . PATH_SEPARATOR . 'C:/xampp/htdocs/tienda/models');
require_once('perfil_model.php');

$modelo = new perfil_model;

if (isset($_POST['volver'])) {
    header("Location: /tienda/views/home_view.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de usuario</title>
</head>
<body>
<div class="titulo">
        Inicio de sesion
    </div>
    <div >
        <h1>Info del usaurio</h1>
        aqui va la info de tu usuario
    </div>

    <div class="boton-volver">
        <form method="POST">
        <button type="submit" name="volver">
                volver
        </button>
        </form>
    </div>
</body>
</html>