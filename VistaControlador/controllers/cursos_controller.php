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

    //guarda el curso creado en la base de datos
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
    //genera una matriz con a informacion de todos los cursos creados
    public function mostrarCursos(){
        $sql = 'SELECT * FROM cursos';
        $query = mysqli_query($this->con, $sql);
        $this->modelo->mostrarcursos($query);
    }

    //elimina el curso y ,por eliminacion en cascada, los alumnos matriculados en el curso
    public function eliminarCurso($nombre) {
        $sql = 'DELETE FROM cursos WHERE nombre = ?';
        
        $stmt = $this->con->prepare($sql);
    
        $stmt->bind_param('s', $nombre);
    
        $stmt->execute();
    
        if ($stmt->affected_rows > 0) {
            $this->modelo->eliminarCurso();
        }
        die();
    }

    //carga las opciones de los diferetes cursos que existen
    public function cargar(){
        $query = "SELECT nombre FROM cursos";
        $result = $this->con->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $nombre = $row['nombre'];
                echo "<option value=\"$nombre\">$nombre</option>";
            }
        }
    }
}