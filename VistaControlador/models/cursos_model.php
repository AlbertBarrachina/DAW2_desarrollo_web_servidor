<?php

//Llamada a la vista
require_once("views/formulario.php");
require_once("db/db.php");

class cursos_model
{
    private $con;
    public function __construct()
    {
        $this->con = Conectar::conexion();
    }
    public function mostrarcursoGuardado()
    {
        echo '
    <br>
    <p>Cusro guardado<p>';
    }

    public function mostrarcursos($info)
    {
        if (mysqli_num_rows($info) > 0) {
            echo "<h1>Lista de cursos</h1>";
            echo "<table>";
            while ($row = mysqli_fetch_array($info)) {
                echo "<tr>";
                echo "<td>" . $row['nombre'] . "</td>";
                echo "<td>" . $row['anno'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }else{
            echo '<h1>Lista de curoso</h1>'; 
            echo "<h2> No hay curoso.</h2>";
        }
    }
}
?>