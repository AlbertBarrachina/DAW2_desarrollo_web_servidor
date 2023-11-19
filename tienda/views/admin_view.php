<?php
set_include_path(get_include_path() . PATH_SEPARATOR . 'C:/xampp/htdocs/tienda');
require_once('models/admin_model.php');
$modelo = new admin_model();

if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: /tienda/views/login_view.php");
    exit();
} elseif (isset($_POST['añadir1' || 'mostrar1' || 'modificar1' || 'eliminar1'])) {
    $id = $_POST['id'];
    $nick = $_POST['nick'];
    $email = $_POST['email'];
    $contrasenya = $_POST['contrasenya'];
    $opcion = "";
    if (isset($_POST['añadir1'])) {
        $opcion = 1;
    } elseif (isset($_POST['mostrar1'])) {
        $opcion = 2;
    } elseif (isset($_POST['modificar1'])) {
        $opcion = 3;
    } elseif (isset($_POST['eliminar1'])) {
        $opcion = 4;
    }
    $info = array($opcion, $id, $nick, $emil, $contrasenya);
    $modelo->usuario($info);
    exit();
} elseif (isset($_POST['añadir2' || 'mostrar2' || 'modificar2' || 'eliminar2'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $opcion = "";
    if (isset($_POST['añadir2'])) {
        $opcion = 1;
    } elseif (isset($_POST['mostrar2'])) {
        $opcion = 2;
    } elseif (isset($_POST['modificar2'])) {
        $opcion = 3;
    } elseif (isset($_POST['eliminar2'])) {
        $opcion = 4;
    }

    exit();
} elseif (isset($_POST['añadir3' || 'mostrar3' || 'modificar3' || 'eliminar3'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $stock = $_POST['stock'];
    $precio_unitario = $_POST['precio_unitario'];
    $categoria = $_POST['categoria'];
    $opcion = "";
    if (isset($_POST['añadir3'])) {
        $opcion = 1;
    } elseif (isset($_POST['mostrar3'])) {
        $opcion = 2;
    } elseif (isset($_POST['modificar3'])) {
        $opcion = 3;
    } elseif (isset($_POST['eliminar3'])) {
        $opcion = 4;
    }

    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda-admin</title>
    <script>
        function confirmLogout() {
            return confirm("Are you sure you want to log out?");
        }
    </script>
    <link rel="stylesheet" href="style/admin.css">
</head>

<body>
    <div class="formularios">
        <div>
            <form methos="POST">
                <h1>usuario</h1>
                <input type="text" value="" name="id" placeholder="id del usuario(no editable)" >
                <input type="text" value="" name="nick" placeholder="nombre del usuario">
                <input type="text" value="" name="email" placeholder="correo del usaurio">
                <input type="text" value="" name="contrasenya" placeholder="contraseña">
                <br><br><br>
                <input type="submit" value="añadir" name="añadir1">
                <input type="submit" value="mostrar" name="mostrar1">
                <input type="submit" value="modificar" name="modificar1">
                <input type="submit" value="eliminar" name="eliminar1">
            </form>
        </div>
        <div>
            <form methos="POST">
                <h1>categorias</h1>
                <input type="text" value="" name="id" placeholder="id del producto(no editable)" >
                <input type="text" value="" name="nombre" placeholder="nombre de la categoria">
                <input type="text" value="" name="descripcion" placeholder="descripcion de la categoria">
                <br><br><br>
                <input type="submit" value="añadir" name="añadir2">
                <input type="submit" value="mostrar" name="mostrar2">
                <input type="submit" value="modificar" name="modificar2">
                <input type="submit" value="eliminar" name="eliminar2">
            </form>
        </div>
        <div>
            <form methos="POST">
                <h1>productos</h1>
                <input type="text" value="" name="id" placeholder="id del producto(no editable)" >
                <input type="text" value="" name="nombre" placeholder="nombre del producto">
                <input type="number" value="" name="stock" placeholder="cantidad de producto disponible" min="0">
                <input type="text" value="" name="precio_unitario" placeholder="contraseña" min="0">
                <input type="number" value="" name="categoria" placeholder="identificador de categoria(numero)" required>
                <br><br><br>
                <input type="submit" value="añadir" name="añadir3">
                <input type="submit" value="mostrar" name="mostrar3">
                <input type="submit" value="modificar" name="modificar3">
                <input type="submit" value="eliminar" name="eliminar3">
            </form>
        </div>
    </div>
    <div class="boton-logout">
        <form id="logoutForm" method="POST" onsubmit="return confirmLogout()">
            <button type="submit" name="logout">Cerrar sesion</button>
        </form>
    </div>

</body>

</html>