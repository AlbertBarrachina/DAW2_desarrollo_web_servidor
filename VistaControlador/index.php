<?php
require_once("controllers/personas_controller.php");
require_once("controllers/cursos_controller.php");

$controlador = new personas_controller();
$controlador2 = new cursos_controller();

if (isset($_POST['guardarAlumno'])) {
    $controlador->guardarAlumno();
}else if(isset($_GET['mostrarAlumnos'])){
    $controlador->mostrarAlumnos();
}else if(isset($_POST['guardarCurso'])){
    $controlador2->guardarCurso();
}else if(isset($_GET['mostrarCursos'])){
    $controlador2->guardarCurso();
}else{
    $controlador->BotonVolver();
}
?>