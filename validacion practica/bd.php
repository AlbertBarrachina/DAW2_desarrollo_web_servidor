<?php
require_once("formulario.php");
class Conectar
{
    public static function conexion()
    {
        $conexion = new mysqli("localhost", "root", "", "daw2");
        $conexion->query("SET NAMES 'utf8'");
        return $conexion;
    }
}
class bd
{
    private $con;
    private $formulario;
    public function __construct()
    {
        $this->con = Conectar::conexion();
        $this->formulario = new formulario();
    }
    public function CrearAnimal()
    {
        $id = $_POST['id'];
        $especie = $_POST['especie'];
        $nombre = $_POST['nombre'];
        $fecha = $_POST['fecha_nacimiento'];
        $peso = $_POST['peso'];

        $sql = "INSERT INTO animales VALUES (" . $id . ", " . $especie . ", " . $nombre . "," . $fecha . "," . $peso . ")";
        $query = mysqli_query($this->con, $sql);

        if ($query) {
            echo '$query';
        } else {
            echo 'Error';
        }
    }

    public function ActualizarAnimal()
    {
        $id = $_POST['id'];
        $especie = $_POST['especie'];
        $nombre = $_POST['nombre'];
        $fecha = $_POST['fecha_nacimiento'];
        $peso = $_POST['peso'];

        $sql = "UPDATE animales SET (especie =" . $especie . ", nombre = " . $nombre . ", fecha_nacimiento = " . $fecha . ", peso = " . $peso . " WHERE id_animal = ". $id .")";
        $query = mysqli_query($this->con, $sql);

        if ($query) {
            echo '$query';
        } else {
            echo 'Error';
        }
    }

    public function MostrarAnimal()
    {
        $id = $_POST['id'];

        $sql = "SELECT * FROM animales WHERE id_animal = ". $id .")";
        $query = mysqli_query($this->con, $sql);

        if ($query) {
            $this->formulario->mostrarAnimales($query);
        } else {
            echo 'Error';
        }
    }

    public function EliminarAnimal()
    {
        $id = $_POST['id'];

        $sql = "DELETE * FROM animales WHERE id_animal = ". $id .")";
        $query = mysqli_query($this->con, $sql);

        if ($query) {
            echo '$query';
        } else {
            echo 'Error';
        }
    }
}
