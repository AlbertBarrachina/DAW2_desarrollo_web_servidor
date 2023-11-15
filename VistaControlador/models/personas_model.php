<?php

//Llamada a la vista
require_once("views/formulario.php");

class personas_model
{
    public function mostrarAlumnoGuardado()
    {
        echo '
    <br>
    <form action="index.php">
    <p>Alumno guardado<p>
    <input type="submit" value="Volver"">
    </form>';
    }

    public function mostrarAlumnos($info)
    {
        if (mysqli_num_rows($info) > 0) {
            echo "<h1>Lista de alumnos matriculados</h1>";
            echo "<table>";
            while ($row = mysqli_fetch_array($info)) {
                echo "<tr>";
                echo "<td>" . $row['nombre'] . "</td>";
                echo "<td>" . $row['apellidos'] . "</td>";
                echo "<td>" . $row['dni'] . "</td>";
                echo "<td>" . $row['curso'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }else{
            echo '<h1>Lista de alumnos matriculados</h1>'; 
            echo "<h2> No hay alumnos matriculados en ningun curso.</h2>";
        }
    }
}
?>