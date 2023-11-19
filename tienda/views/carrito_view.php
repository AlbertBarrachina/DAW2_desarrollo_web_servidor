<?php
set_include_path(get_include_path() . PATH_SEPARATOR . 'C:/xampp/htdocs/tienda');
require_once('models/productos_model.php');
session_start();
$modelo = new productos_model;

if (isset($_POST['volver'])) {
    header("Location: /tienda/views/productos_view.php");
    exit();
} elseif (isset($_POST['carrito'])) {
    header("Location: /tienda/views/carrito_view.php");
    exit();
} elseif (isset($_POST['remCarrito'])) {
    $id = $_POST['id'];
    $cantidad = $_POST['cantidad'];
    $producto = $_POST['producto'];
    $modelo->remCarrito($id,$cantidad,$producto);
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
        set_include_path(get_include_path() . PATH_SEPARATOR . 'C:/xampp/htdocs/tienda/');
        require_once('models/productos_model.php');

        $modelo = new productos_model;

        $modelo->cargarProductosCarrito();
        ?>
    </div>
    <form method="POST">
        <input type="submit" value="volver" name="volver">
    </form>
</body>

</html>