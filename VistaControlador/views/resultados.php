<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario alumno</title>

</head>

<body>
<form action="formulario.php">
    <button class="submit">volver</button>
</form>
   
</body>

</html>

<?php
require_once("controllers/cursos_controller.php");
require_once("controllers/personas_controller.php");
$curso = new cursos_controller;
$alumno = new personas_controller;
if (isset($_POST['guardarAlumno'])) {
    $alumno->guardarAlumno();
} else if (isset($_GET['mostrarAlumnos'])) {
    $alumno->mostrarAlumnos();
} else if (isset($_POST['guardarCurso'])) {
    $nombre = $_POST['nombre'];
    $anno = $_POST['anno'];
    $curso->guardarCurso($nombre,$anno);
} else if (isset($_GET['mostrarCursos'])) {
    $curso->mostrarCursos();
    
}
?>