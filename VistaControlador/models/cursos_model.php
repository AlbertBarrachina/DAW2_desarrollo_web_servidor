<?php
//Llamada al modelo
require_once("models/personas_model.php");
$per = new personas_model();

//Llamada a la vista
require_once("views/personas_view.phtml");

class cursos_model
{
    public function mostrarcursoGuardado()
    {
        echo '
    <br>
    <form action="index.php">
    <p>Cusro guardado<p>
    <input type="submit" value="Volver"">
    </form>';
    }
    public function BotonVolver()
    {
        echo '
        <br>
        <form action="index.php">
        <input type="submit" value="Volver"">
        </form>';
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
        $this->BotonVolver();
    }
}
?>