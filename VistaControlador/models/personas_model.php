<?php
set_include_path(get_include_path() . PATH_SEPARATOR . 'C:/xampp/htdocs/vistacontrolador/');
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
        die();
    }

    public function mostrarAlumnos($info)
    {
        if (mysqli_num_rows($info) > 0) {
            echo "<h1>Lista de alumnos matriculados</h1>";
            echo "<table>";
            while ($row = mysqli_fetch_array($info)) {
                echo '<tr>
                <td>|<b>Nombre: </b> ' . $row['nombre'] . '</td>
                <td>|<b>Apellidos: </b>' . $row['apellidos'] . '</td>
                <td>|<b>DNI: </b>' . $row['dni'] . '</td>
                <td>|<b>Curso: </b>' . $row['curso'] . '|</td>
                </tr>
                ';
            }
            echo '</table>
                <form action="index.php">
                <input type="submit" value="volver">
                </form>';
        } else {
            echo '<h1>Lista de alumnos matriculados</h1>
            <h2> No hay alumnos matriculados en ningun curso.</h2>
            <form action="index.php">
            <input type="submit">
            </form>';
        }
        die();
    }
}
