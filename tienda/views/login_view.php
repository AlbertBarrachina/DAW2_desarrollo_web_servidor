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

        .formulario {
            color: white;
            background-color: black;
            opacity: 65%;
            position: absolute;
            width: 500px;
            height: 500px;
            left: 700px;
            top: 150px;
            border-radius: 10%;
        }

        form {
            position: relative;
            left: 50px;
            top: 110px;
            display: flex;
            flex-direction: column;
            width: 400px;
        }

        label {
            margin-top: 20px;
            margin-bottom: 10px;
            text-align: center;
        }

        input {
            border-radius: 5px;
            margin-bottom: 20px;
        }

        a {
            text-decoration: none;
        }

        .submit {
            position: relative;
            top: 50px;
            left: 85px;
            width: 200px;
            height: 75px;
            border-radius: 50px;
            border-color: black;
        }

        .boton-registro {
            position: relative;
            top: 10pc;
            left: 50%;
        }

        .boton-volver {
            position: absolute;
            top: 1pc;
            left: 2pc;
            z-index: 1;
        }
    </style>
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
        <!--
    <div class="boton-volver">
        <button>
            <a href="views/productos_view.php">
                volver
            </a>
        </button>
    </div> 
    -->
</body>

</html>