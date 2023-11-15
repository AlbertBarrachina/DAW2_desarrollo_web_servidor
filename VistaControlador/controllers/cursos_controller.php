<?php
set_include_path(get_include_path() . PATH_SEPARATOR . 'C:/xampp/htdocs/vistacontrolador/');
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

    public function eliminarCurso($nombre) {
        $sql = 'DELETE FROM cursos WHERE nombre = ?';
        
        $stmt = $this->con->prepare($sql);
    
        $stmt->bind_param('s', $nombre);
    
        $stmt->execute();
    
        if ($stmt->affected_rows > 0) {
            echo "Curso eliminado correctamente.";
        } else {
            echo "No se encontró ningún curso con ese nombre.";
        }
    
        die();
    }

    public function cargar(){
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