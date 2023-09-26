<?php
if (isset($_POST['Guardar'])) {
    echo "Yes, mail is set";    
} else {    
    echo "N0, mail is not set";
}

$servidor = "localhost";
$usuario = "root";
$password = "";
$bd = "daw2";

$con = mysqli_connect($servidor, $usuario, $password, $bd);

//funcion para crear un cliente se llama desde fuera?
function crear($Dni, $Nombre_completo, $Direccion, $Email, $con)
{
    //variables de los clientes
    $Dni = $_GET['dni'];
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
function actualizar($Dni, $Nombre_completo, $Direccion, $Email, $con)
{
    $sql = "UPDATE clientes
    SET nombre_completo = '$Nombre_completo', direccion = '$Direccion', email = '$Email'
    WHERE dni = '$Dni';";
    $consulta = mysqli_query($con, $sql);

    if (!$consulta) {
        die("No se ha podido actualizar el cliente.");
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
    <title>Introducir cliente nuevo</title>
</head>

<body>
    <button onclick="location.href='formulario2.html'">crear</button><br>
    <button onclick="location.href='clientes.php'">actualizar</button><br>
    <button onclick="location.href='clientes.php'">mostrar</button><br>
    <button onclick="location.href='clientes.php'">eliminar</button><br>
    <br><br><br><br>
    <a href="index.html">
        <button>Volver</button>
    </a>

</body>

</html>