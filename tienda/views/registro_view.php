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
        <form method="POST" action="/registro_controller.php">
            <label for="nick">Nick</label>
            <input type="text" name="nick">
            <label for="email">Correo electronico</label>
            <input type="text" name="email">
            <label for="contrasenya">Contraseña</label>
            <input type="password" name="contrasenya">
            <label for="contrasenya2">Repita la contraseña</label>
            <input type="password" name="contrasenya2">
            <input type="submit" class="submit" value="Registrar">
        </form>
    </div>

    <div class="boton-volver">
        <button>
            <a href="views/productos_view.php">
            volver                
            </a>
        </button>
    </div>
</body>

</html>
