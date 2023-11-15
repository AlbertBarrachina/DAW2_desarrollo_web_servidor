<?php
//Llamada al modelo
require_once("db/db.php");
require_once("models/personas_model.php");
class personas_controller
{
    private $modelo;
    private $con;

    public function __construct()
    {
        $this->modelo = new personas_model();
        $this->con = Conectar::conexion();
    }

    //guarda el alumno creado si no puede da error
    public function guardarAlumno()
    {
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $dni = $_POST['dni'];
        $curso = $_POST['curso'];

        $sql = 'INSERT INTO alumno VALUES ("' . $nombre . '", "' . $apellidos . '", "' . $dni . '","' . $curso . '")';
        $query = mysqli_query($this->con, $sql);

        if ($query) {
            $this->modelo->mostrarAlumnoGuardado();
        } else {
            echo 'Error';
        }
    }
    //muestra todos los alumnos matriculados
    public function mostrarAlumnos() {
        $sql = 'SELECT * FROM alumno';
        $query = mysqli_query($this->con, $sql);
        $this->modelo->mostrarAlumnos($query);
    }
}
