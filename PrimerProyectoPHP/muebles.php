<?php
//variables de los muebles
$Color = $_GET['color'];
$Dimensiones = $_GET['dimensiones'];
$Tipo = $_GET['tipo'];
//variables de los clientes
$Dni = $_GET['dni'];

echo "El cliente con DNI: ". $Dni ." ha comprado el mueble es de color " . $Color . ", tiene una dimensiones de " . $Dimensiones . " y es un/a " . $Tipo . ".\n\n";

$servidor = "localhost";
$usuario = "root";
$password = "";
$bd = "daw2";

$con = mysqli_connect($servidor, $usuario, $password, $bd);

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
                echo "<td>DNI: " . $fila["id"] . " .</td>";
                echo "<td>Color: " . $fila["color"] . " .</td>";
                echo "<td>Dimensiones: " . $fila["dimensiones"] . " .</td>";
                echo "<td>Tipo: " . $fila["tipo"] . " .</td>";
                echo "</tr>";
            }
            ?>
        </table>
        <br><br><br><br>
        <a href="formulario1.html">
            <button>Volver</button>
        </a>

        </form>
    </body>

    </html>

<?php
}
?>