<?php
set_include_path(get_include_path() . PATH_SEPARATOR . 'C:/xampp/htdocs/tienda');
require_once('models/productos_model.php');
$modelo = new productos_model;
if (isset($_COOKIE['custom_session_id'])) {
    $sessionId = $_COOKIE['custom_session_id'];
    // Set the session ID
    session_id($sessionId);
}
// Resume the session
session_start();

if (isset($_POST['volver'])) {
    header("Location: /tienda/views/home_view.php");
    exit();
} elseif (isset($_POST['carrito'])) {
    header("Location: /tienda/views/carrito_view.php");
    exit();
} elseif (isset($_POST['addCarrito'])) {
    $usuario = session_id();
    $id = $_POST['id'];
    $cantidad = $_POST['cantidad'];
    $precio = $_POST['cantidad']*$_POST['precio'];
    $modelo->addCarrito($usuario,$id,$cantidad,$precio);
}elseif (isset($_POST['asc'])) {
    $_SESSION['asc'.session_id()] = true;
    $_SESSION['desc'.session_id()] = false;
    header("Location: /tienda/views/productos_view.php");
    exit();
} elseif (isset($_POST['desc'])) {
    $_SESSION['asc'.session_id()] = false;
    $_SESSION['desc'.session_id()] = true;
    header("Location: /tienda/views/productos_view.php");
    exit();
} elseif (isset($_POST['reiniciar'])) {
    $_SESSION['asc'.session_id()] = false;
    $_SESSION['desc'.session_id()] = false;
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
    <title>Tienda-productos</title>
    <link rel="stylesheet" href="style/productos.css">
</head>

<body>
    <div class="pantalla-producto">
        <?php
        //carga los productos de la base de datos
        set_include_path(get_include_path() . PATH_SEPARATOR . 'C:/xampp/htdocs/tienda/');
        require_once('models/productos_model.php');

        $modelo = new productos_model;

        $modelo->cargarProductos();

        ?>
    </div>
    <div class="ordenar">
        <form method="POST">
            <input type="submit" value="Ordenar por precio: ascendiente" name="asc">
        </form>
        <form method="POST">
            <input type="submit" value="Ordenar por precio: descendiente" name="desc">
        </form>
    </div>
    <form method="POST">
        <input type="submit" value="volver" name="volver">
    </form>
    <form method="POST" class="carrito">
        <input type="submit" value="Carrito" name="carrito">
    </form>
    <form method="POST">
        <input type="submit" value="reiniciar busqueda" name="reiniciar">
    </form>
</body>

</html>