<?php
require_once("db/db.php");
require_once('models/cursos_model.php');
class cursos_controller
{
    private $modelo;
    private $con;

    public function __construct()
    {
        $this->modelo = new cursos_model();
        $this->con = Conectar::conexion();
    }

    //guarda el alumno creado si no puede da error
    public function guardarCurso($nombre,$anno)
    {
        try { $sql = 'INSERT INTO cursos VALUES ("'. $nombre .'", "'. $anno .'")';
        $query = mysqli_query($this->con, $sql);

        if ($query) {
            $this->modelo->mostrarCursoGuardado();
        } else {
            echo 'Error';
        }
            
        } catch (Exception $e) {
            
        }
       
    }
    //muestra los cursos existentes
    public function mostrarCursos(){
        $sql = 'SELECT * FROM cursos';
        $query = mysqli_query($this->con, $sql);
        $this->modelo->mostrarcursos($query);
    }

    function cargar(){
        $query = "SELECT nombre FROM cursos";
        $result = $this->con->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $nombre = $row['nombre'];
                echo "<option value=\"$nombre\">$nombre</option>";
            }
        } else {
            echo "<option value=\"\">No cursos found</option>";
        }
    }
}