<?php
require_once('models/cursos_model.php');
require_once('persoanas_controller.php');
class cursos_controller
{
    private $db;
    private $modelo;
    private $con;

    public function __construct()
    {
        $this->modelo = new cursos_model();
        $this->con = Conectar::conexion();
    }

    //guarda el alumno creado si no puede da error
    public function guardarCurso()
    {
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['anno'];

        $sql = "INSERT INTO alumnos VALUES (". $nombre .", ". $apellidos .")";
        $query = mysqli_query($this->con, $sql);

        if ($query) {
            $this->modelo->mostrarCursoGuardado();
        } else {
            echo 'Error';
            $this->BotonVolver();
        }
    }
    //muestra los cursos existentes
    public function mostrarCursos(){
        $sql = 'SELECT * FROM cursos';
        $query = mysqli_query($this->con, $sql);
        $this->modelo->mostrarCursos($query);
    }
    //muestra un boton para volver al formulario
    public function botonVolver()
    {
        $this->modelo->botonVolver();
    }
}