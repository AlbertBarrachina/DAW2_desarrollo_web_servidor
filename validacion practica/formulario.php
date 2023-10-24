<?php

require_once('bd.php');

if (isset($_POST['CrearAnimal()'])) {
    $this->CrearAnimal();
}elseif (isset($_POST['ActualizarAnimal()'])) {
    $this->ActualizarAnimal();
}elseif (isset($_POST['MostrarAnimal()'])) {
    $this->MostrarAnimal();
}elseif (isset($_POST['EliminarAnimal()'])) {
    $this->EliminarAnimal();
}

class formulario
{
    private $llamar;
    public function __construct()
    {

        $this->llamar = new bd();
    }

    //crea el animal
    public function CrearAnimal()
    {
        $this->llamar->CrearAnimal();
    }

    //actualiza los datos del animal
    public function ActualizarAnimal()
    {
        $this->llamar->ActualizarAnimal();
    }
    //muestra el animal por pantalla
    public function MostrarAnimal()
    {
        $this->llamar->MostrarAnimal();
    }
    //elimina el animal de la base de datos
    public function EliminarAnimal()
    {
        $this->llamar->EliminarAnimal();
    }


    //muestra en la pagina el animal que se ha recogido en la baase de datos
    public function mostrarAnimales($info)
    {
        if (mysqli_num_rows($info) > 0) {
            echo "<h1>Info del animal</h1>";
            echo "<table>";
            while ($row = mysqli_fetch_array($info)) {
                echo "<tr>";
                echo "<td>" . $row['id_animal'] . "</td>";
                echo "<td>" . $row['especie'] . "</td>";
                echo "<td>" . $row['nombre'] . "</td>";
                echo "<td>" . $row['fecha_nacimiento'] . "</td>";
                echo "<td>" . $row['peso'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo '<h1>error</h1>';
        }
    }
}
