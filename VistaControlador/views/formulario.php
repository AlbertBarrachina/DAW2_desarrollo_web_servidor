<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario alumno</title>

</head>

<body>
    <form method="post">
        <h2>CREAR ALUMNO NUEVO</h2>
        <label for="nombre">Nombre:</label><br>
        <input type="text" name="nombre"><br>
        <label for="apellidos">Apellidos:</label><br>
        <input type="text" name="apellidos"><br>
        <label for="dni">DNI:</label><br>
        <input type="text" name="dni"><br>
        <label for="curso">Curso:</label><br>
        <select name="curso" id="curso">
            <?php
            require_once('controllers/cursos_controller.php');
            $controlador = new cursos_controller;
            $controlador->cargar();
            ?>
        </select>
        <br><br>
        <button type="submit" name="guardarAlumno" value="guardarAlumno">Guardar</button>
    </form>

    <h1>formulario de cursos</h1>
    <form method="post">
        <h2>CREAR curso</h2>
        <label for="nombre">Nombre:</label><br>
        <input type="text" name="nombre"><br>
        <label for="anno">Año:</label><br>
        <input type="text" name="anno"><br>
        <br><br>
        <button type="submit" name="guardarCurso" value="guardarCurso">Guardar</button>
        <button type="submit" name="mostrarCursos" value="mostrarCursos">Mostrar Cursos</button>
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