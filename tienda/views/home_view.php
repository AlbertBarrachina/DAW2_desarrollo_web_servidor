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
    <?php
    $Loged = false;
    if (isset($_POST['toggle'])) {
        if ($Loged) {
            $Loged = false;
        } else {
            $Loged = true;
        }
    }
    if ($Loged == false) {
        echo '
        <div class="icono-perfil">
            <a href="../views/perfil_view.php">
                <img src="/img/user.png" alt="">
            </a>
        </div>
        <div class="boton-logout">
        <form method="POST">
            <button type="submit" name="logout">Cerrar sesion</button>
        <form>
        </div>
        ';
    } else {
        echo '
        <div class="boton-login">
        <button><a href="views/login_view.php">Iniciar sesion</a></button>
        </div>
        ';
    }
    ?>

    <div class="productos">

    </div>
</body>

</html>