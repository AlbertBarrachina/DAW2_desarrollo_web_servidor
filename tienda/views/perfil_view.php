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
    <div class="formulario">
        <form action="" method="POST">
            <label for="nick">Nick</label>
            <input type="text" name="nick">
            <label for="contrasenya">Contraseña</label>
            <input type="password" name="contrasenya">
            <input type="submit" class="submit" value="Iniciar sesion">
        </form>
        <button class="boton-registro"><a href="views/registro_view.php">REGISTRAR CUENTA NUEVA</a></button>
    </div>

    <div class="boton-volver">
        <button>
            <a href="productos_view.php">
                volver
            </a>
        </button>
    </div>
</body>
</html>