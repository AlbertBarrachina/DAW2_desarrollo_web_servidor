<?php
require_once('models/personas_model.php');
require_once('persoanas_controller.php');
class personas_controller
{
    private $db;
    private $personas;
    private $modelo;
    private $con;

    public function __construct()
    {
        $this->modelo = new personas_model();
        $this->con = Conectar::conexion();
        $this->personas = array();
    }

    //guarda el alumno creado si no puede da error
    public function guardarAlumno()
    {
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $dni = $_POST['dni'];
        $curso = $_POST['curso'];

        $sql = 'INSERT INTO alumnos VALUES ("' . $nombre . '", "' . $apellidos . '", "' . $dni . '","' . $curso . '")';
        $query = mysqli_query($this->con, $sql);

        if ($query) {
            $this->modelo->mostrarAlumnoGuardado();
        } else {
            echo 'Error';
            $this->modelo->BotonVolver();
        }
    }
    //muestra todos los alumnos matriculados
    public function mostrarAlumnos() {
        $sql = 'SELECT * FROM alumnos';
        $query = mysqli_query($this->con, $sql);
        $this->modelo->mostrarAlumnos($query);
    }
    //muestra un boton para volver al formulario
    public function botonVolver()
    {
        $this->modelo->botonVolver();
    }
}
