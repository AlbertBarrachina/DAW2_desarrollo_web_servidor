<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario alumno</title>

</head>

<body>
<form action="formulario.php" method="POST">
    <button class="submit" value="volver">volver</button>
</form>
   
</body>

</html>

<?php
require_once("formulario.php");
if (isset($_POST['volver'])) {
    header("Location: /vistacontrolador/views/formulario.php");
}
?>