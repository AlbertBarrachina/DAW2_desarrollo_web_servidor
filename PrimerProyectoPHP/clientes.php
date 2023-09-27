<?php
//variables de usaurio
if ($_GET['dni'] = NULL) {
    $Dni = "";
} else {
    $Dni = $_GET['dni'];
}
//variables de conexion
$servidor = "localhost";
$usuario = "root";
$password = "";
$bd = "daw2";

$con = mysqli_connect($servidor, $usuario, $password, $bd);
if ($con) {
    if (isset($_GET['crear'])) {
        crear($Dni, $con);
    } else if (isset($_GET['actualizar'])) {
        actualizar($Dni, $con);
    } else if (isset($_GET['mostrar'])) {
        mostrar($Dni, $con);
    } else if (isset($_GET['eliminar'])) {
        eliminar($Dni, $con);
    }
} else {
    // Si no, muestra un mensaje de error
    echo 'No se ha conectado a la base de datos :<';
}

//funcion para crear un cliente se llama desde fuera?
function crear($Dni, $con)
{
    //variables de los clientes
    $Nombre_completo = $_GET['nombre'];
    $Direccion = $_GET['direccion'];
    $Email = $_GET['email'];
    $sql = "INSERT INTO `clientes`(`dni`, `nombre_completo`, `direccion`, `email`) 
VALUES ('$Dni','$Nombre_completo','$Direccion','$Email')";
    $consulta = mysqli_query($con, $sql);

    if (!$consulta) {
        die("No se ha podido crear el cliente.");
    } else {
        echo "El nuevo cliente se llama: " . $Nombre_completo . ". Con el DNI: " . $Dni . " el correo electronico " . $Email . " y reside en " . $Direccion;
    }
}
//funcion para cambiar la info de un cliente
function actualizar($Dni, $con)
{
    $Nombre_completo = $_GET['nombre'];
    $Direccion = $_GET['direccion'];
    $Email = $_GET['email'];
    $sql = "UPDATE clientes
    SET nombre_completo = '$Nombre_completo', direccion = '$Direccion', email = '$Email'
    WHERE dni = '$Dni';";
    $consulta = mysqli_query($con, $sql);

    if (!$consulta) {
        die("No se ha podido actualizar el cliente.");
    } else {
        echo "Cliente con DNI: " . $Dni . " actualizado.";
    }
}
//funcion para mostrar la info de un cliente
function mostrar($Dni, $con)
{
    $sql = "SELECT * FROM `clientes` WHERE `dni` = '$Dni'";
    $consulta = mysqli_query($con, $sql);

    if (!$consulta) {
        die("No se ha podido realizar el insert");
    } else {
        while ($fila = $consulta->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $fila["dni"] . "</td>";
            echo "<td>" . $fila["nombre_completo"] . "</td>";
            echo "<td>" . $fila["direccion"] . "</td>";
            echo "<td>" . $fila["email"] . "</td>";
            echo "</tr>";
        }
    }
}
function eliminar($Dni, $con)
{
    $sql = "DELETE FROM `clientes` WHERE `dni` = '$Dni'";
    $consulta = mysqli_query($con, $sql);

    if (!$consulta) {
        die("No se ha podido eliminar el cliente");
    } else {
        echo "Se ha eliminado el cliente.";
    }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado operacion</title>
</head>

<body>
    <a href="formulario2.html">
        <button>Volver</button>
    </a>

</body>

</html>