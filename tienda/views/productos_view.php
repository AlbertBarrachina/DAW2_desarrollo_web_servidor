<?php
    set_include_path(get_include_path() . PATH_SEPARATOR . 'C:/xampp/htdocs/tienda');
    require_once('models/productos_model.php');

    $modelo = new productos_model;

    if (isset($_POST['volver'])) {
        header("Location: /tienda/views/home_view.php");
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
</head>
<body>
    

<form method="POST">
    <input type="submit" value="volver" name="volver">
</form>
</body>
</html>