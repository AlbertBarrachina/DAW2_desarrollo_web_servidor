<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
    <style>
        body {
            background-color: rgb(158, 226, 238);
        }

        a {
            text-decoration: none;
        }

        .titulo {
            color: white;
            font-family: 'Times New Roman', Times, serif;
            font-size: xx-large;
            text-align: center;
            background-color: black;
            opacity: 90%;
            position: fixed;
            width: 100%;
            height: 50px;
            left: 0px;
            top: 0px;
        }

        .productos {
            background-color: black;
            opacity: 35%;
            position: absolute;
            width: 100%;
            height: 800px;
            left: 0px;
            top: 100px;
        }

        .icono-perfil {
            position: absolute;
            right: 2pc;
            top: 0.5pc;
            background-color: white;
            width: 35px;
            height: 35px;
            box-shadow: 1px 1px 1px 2px white;
            border-radius: 100%;
        }

        .icono-perfil>a>img {
            width: 35px;
            height: 35px;
        }

        .boton-login,
        .boton-logout {
            text-align: center;
            position: absolute;
            right: 2pc;
            top: 1pc;
            width: fit-content;
            height: fit-content;
            border-radius: 3px;
        }

        .boton-logout {
            right: 5pc;
        }

        .boton-logout>button {
            font-size: 10.5px;

        }
    </style>
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
            <a href="perfil_view.php">
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
        <button><a href="login_view.php">Iniciar sesion</a></button>
        </div>
        ';
    }
    ?>

    <div class="productos">

    </div>
</body>

</html>