<?php
set_include_path(get_include_path() . PATH_SEPARATOR . 'C:/xampp/htdocs/vistacontrolador/');
//Llamada a la vista
require_once("views/formulario.php");

class cursos_model
{

    //indica que se ha guardado el curso
    public function mostrarCursoGuardado()
    {
        echo '
    <br>
    <p>Curso guardado.<p>
    <form action="index.php">
    <input type="submit" value="volver">
    </form>';
        exit();
    }

    //muestra por pantalla todos los cursos que hay en la base de datos
    public function mostrarcursos($info)
    {
        if (mysqli_num_rows($info) > 0) {
            echo "<h1>Lista de cursos</h1>";
            echo "<table>";
            while ($row = mysqli_fetch_array($info)) {
                echo '<tr>
                <td>|<b>Nombre: </b>' . $row['nombre'] . '</td>
                <td>|<b>Año: </b>' . $row['anno'] . '|</td>
                </tr>';
            }
            echo '</table>
            <form action="index.php">
            <br>
            <input type="submit" value="volver">
            </form>';
        } else {
            echo '<h1>Lista de cursos</h1>
            <h2>No hay cursos.</h2>';
        }
        exit();
    }

    //indica que el curso se ha eliminado
    public function eliminarCurso()
    {
        echo 'Curso eliminado correctamente.
        <form action="index.php">
        <br>
        <input type="submit" value="volver">
        </form>';
    }
}
