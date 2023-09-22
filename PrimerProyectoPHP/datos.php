<?php
//variables de los muebles
$Color = $_GET['color'];
$Dimensiones = $_GET['dimensiones'];
$Tipo = $_GET['tipo'];
//variables de los clientes
$Dni = $_GET['color'];
$Nombre_completo = " ";
$Direccion = " ";
$Email = " ";

echo "El mueble es de color " . $Color . ", tiene una dimensiones de " . $Dimensiones . " y es un/a " . $Tipo . ".\n\n";

$servidor = "localhost";
$usuario = "root";
$password = "";
$bd = "daw2";

$con = mysqli_connect($servidor, $usuario, $password, $bd);

function crear($Dni, $Nombre_completo, $Direccion, $Email, $con)
{
    $sql = "INSERT INTO `clientes`(`dni`, `nombre_completo`, `direccion`, `email`) 
VALUES ('$Dni','$Nombre_completo','$Direccion','$Email')";
    $consulta = mysqli_query($con, $sql);

    if (!$consulta) {
        die("No se ha podido crear el cliente.");
    } else {
        echo "Se ha creado el cliente.";
    }
}
function actualizar($Dni, $Nombre_completo, $Direccion, $Email, $con)
{
    $sql = "UPDATE clientes
    SET nombre_completo = '$Nombre_completo', direccion = '$Direccion', email = '$Email'
    WHERE dni = '$Dni';";
    $consulta = mysqli_query($con, $sql);

    if (!$consulta) {
        die("No se ha podido actualizar el cliente.");
    } else {
        echo "Se ha actualizado el cliente.";
    }
}
function mostrar($Dni, $con)
{
    $sql = "SELECT TABLE clientes WHERE dni = '$Dni'";
    $consulta = mysqli_query($con, $sql);

    if (!$consulta) {
        die("No se ha podido realizar el insert");
    } else {
        echo "Mostrando cliente y muebles comprados";
    }
    return $consulta;
}
function eliminar($Dni, $con)
{
    $sql = "DELETE FROM clientes WHERE dni = '$Dni'";
    $consulta = mysqli_query($con, $sql);

    if (!$consulta) {
        die("No se ha podido eliminar el cliente");
    } else {
        echo "Se ha eliminado el cliente.";
    }
}
if (!$con) {
    die("No se ha podido realizar la conexión_" . mysqli_connect_error() . "<br>");
} else {
    mysqli_set_charset($con, "utf8");

    echo "Se ha establecido correctamente la conexión a la base de datos";

    $sql = "INSERT INTO `muebles`(`id`, `color`, `dimensiones`, `tipo`) 
    VALUES (NULL,'$Color','$Dimensiones','$Tipo')";

    $consulta = mysqli_query($con, $sql);

    if (!$consulta) {
        die("No se ha podido realizar el insert");
    } else {
        echo "El insert se ha realizado correctamente";
    }

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>

        <table>
            <br><br><br>
            <?php
            $sql2 = "SELECT * FROM `muebles`";
            $consulta = mysqli_query($con, $sql2);
            while ($fila = $consulta->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $fila["id"] . "</td>";
                echo "<td>" . $fila["color"] . "</td>";
                echo "<td>" . $fila["dimensiones"] . "</td>";
                echo "<td>" . $fila["tipo"] . "</td>";
                echo "</tr>";
            }
            ?>
        </table>

        </form>
    </body>

    </html>

<?php
}
?>