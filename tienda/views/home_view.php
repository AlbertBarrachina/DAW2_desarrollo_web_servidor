<?php

    if (isset($_POST['logout'])) {
        session_destroy();
        header("Location: /tienda/views/login_view.php");
        exit();
    }elseif(isset($_POST['usuario'])){
        header("Location: /tienda/views/perfil_view.php");
        exit();
    }elseif(isset($_POST['productos'])){
        header("Location: /tienda/views/productos_view.php");
        exit();
    }
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
    <link rel="stylesheet" type="text/css" href="/tienda/views/style/productos.css">
</head>

<body>
    <div class="titulo">
        TIENDA ONLINE
    </div>
    
<div class="icono-perfil">
    <form method="POST" class="perfil">
        <button type="submit" name="usuario">
            <img src="/tienda/img/user.png" alt="">
            <?php
            $nombre = session_id();
            if($nombre==null){
                $nombre="Cargando...";
            }
            echo $nombre;
            ?>
        </button>
    </form>
        </div>
        <div class="boton-logout">
        <form method="POST">
            <button type="submit" name="logout">Cerrar sesion</button>
        <form>
        </div>
    <div class="productos">
            <form method="POST">
            <button type="submit" name="productos">Mostrar productos</button>
            </form>
    </div>
</body>

</html>