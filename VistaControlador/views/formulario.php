<?php
set_include_path(get_include_path() . PATH_SEPARATOR . 'C:/xampp/htdocs/vistacontrolador/controllers/');
require_once("cursos_controller.php");
require_once("personas_controller.php");
$curso = new cursos_controller;
$alumno = new personas_controller;


if (isset($_POST['guardarAlumno'])) {
    $alumno->guardarAlumno();
} else if (isset($_POST['mostrarAlumnos'])) {
    $alumno->mostrarAlumnos();
} else if (isset($_POST['guardarCurso'])) {
    $nombre = $_POST['nombre'];
    $anno = $_POST['anno'];
    $curso->guardarCurso($nombre, $anno);
} else if (isset($_POST['mostrarCursos'])) {
    $curso->mostrarCursos();
} else if (isset($_POST['eliminarCurso'])) {
    $nombre = $_POST['curso'];
    $curso->eliminarCurso($nombre);
}

?>

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
        <input type="text" name="nombre" required><br>
        <label for="apellidos">Apellidos:</label><br>
        <input type="text" name="apellidos" required><br>
        <label for="dni">DNI:</label><br>
        <input type="text" name="dni" required><br>
        <label for="curso">Curso:</label><br>
        <select name="curso" id="curso" required>
            <?php
            //set_include_path(get_include_path() . PATH_SEPARATOR . 'C:/xampp/htdocs/vistacontrolador/');
            require_once("controllers/cursos_controller.php");
            $controlador = new cursos_controller;
            $controlador->cargar();
            ?>
        </select>
        <br><br>
        <button type="submit" name="guardarAlumno" value="guardarAlumno">Guardar</button>
    </form>
    <form method="POST">
    <button type="submit" name="mostrarAlumnos" value="mostrarAlumnos"> Mostrar alumnos matriculados</button>
    </form>
    <h1>formulario de cursos</h1>
    <form method="post">
        <h2>CREAR curso</h2>
        <label for="nombre">Nombre:</label><br>
        <input type="text" name="nombre" required><br>
        <label for="anno">Año:</label><br>
        <input type="text" name="anno" required><br>
        <br><br>
        <button type="submit" name="guardarCurso" value="guardarCurso">Guardar</button>
    </form>
    <form method="POST">
        <button type="submit" name="mostrarCursos" value="mostrarCursos">Mostrar Cursos</button>
    </form>
    <form method="post">
        <h2>ELIMINAR curso</h2>
        <select name="curso" id="curso" required>
            <?php
            //set_include_path(get_include_path() . PATH_SEPARATOR . 'C:/xampp/htdocs/vistacontrolador/');
            require_once("controllers/cursos_controller.php");
            $controlador = new cursos_controller;
            $controlador->cargar();
            ?>
        </select>
        <br><br>
        <button type="submit" name="eliminarCurso" value="eliminarCurso">eliminar</button>
    </form>

</body>

</html>