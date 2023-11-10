<?php
            set_include_path(get_include_path() . PATH_SEPARATOR . 'C:/xampp/htdocs/tienda/models');
            require_once('productos_model.php');

            $modelo = new productos_model;

            if (isset($_POST['volver'])) {
                header("Location: /tienda/views/home_view.php");
                exit();
            }

//funcion para cargar los productos

            if (mysqli_num_rows($products) > 0) {
                echo "<table>";
                echo "<tr>";
                echo "<th>ID</th>";
                echo "<th>Nombre</th>";
                echo "<th>Stock</th>";
                echo "<th>Precio</th>";
                echo "<th>Categoria</th>";
                echo "</tr>";
    
                // Itera a través de los resultados de los productos.
                while ($row = mysqli_fetch_array($products)) {
                    echo "<tr>";
                    // Muestra los detalles de cada producto.
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['nombre'] . "</td>";
                    echo "<td>" . $row['stock'] . "</td>";
                    echo "<td>" . $row['precio'] . "€</td>";
                    echo "<td>" . $row['categoria'] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }else{
                echo "No hay productos ):";
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
    
</body>
</html>