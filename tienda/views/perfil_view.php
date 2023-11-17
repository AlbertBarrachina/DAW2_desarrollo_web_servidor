<?php
session_start();
set_include_path(get_include_path() . PATH_SEPARATOR . 'C:/xampp/htdocs/tienda/');
require_once('models/perfil_model.php');

$modelo = new perfil_model;

if (isset($_POST['volver'])) {
    header("Location: /tienda/views/home_view.php");
    exit();
}elseif (isset($_POST['guardar'])) {
    $email = $_POST['email'];
    $modelo->cambiarEmail($email);
}elseif (isset($_POST['guardarContrasenya'])) {
    $contrasenya = $_POST['contrasenya'];
    $contrasenya2 = $_POST['contrasenya2'];
    $modelo->cambiarContrasenya($contrasenya,$contrasenya2);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda - Perfil</title>
    <style>
        table {
            width: fit-content;
            margin: 5px;
        }
    </style>
</head>

<body>
    <div>
        <h1>Info del usaurio</h1>
        <form method="POST">
            <table border="1">
                <tr>
                    <td>
                        Nombre
                    </td>
                    <td>
                        <?php
                        echo $_SESSION['nick'];
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        correo
                    </td>
                    <td>
                        <?php
                            echo $_SESSION['mail'];
                        ?>
                    </td>
                </tr>
            </table>
                <?php
                    echo '<input type="email" placeholder="' . $_SESSION['mail'] . '" name="email" required>';
                ?>
                <br>
            <input type="submit" value="Cambiar correo" name="guardar">
        </form>
        <form method="POST">
            <br><br><br>
            <label for="">Cambiar contraseña</label><br><br>
            <input type="password" placeholder="Contraseña" name="contrasenya" required><br>
            <input type="password" placeholder="Repita contraseña" name="contrasenya2" required><br>
            <input type="submit" value="guardar cambios" name="guardarContrasenya">
            <br><br><br>
        </form>

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