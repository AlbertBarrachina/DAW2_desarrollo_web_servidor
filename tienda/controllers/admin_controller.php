<?php
set_include_path(get_include_path() . PATH_SEPARATOR . 'C:/xampp/htdocs/tienda/');
require_once('db/db.php');
class admin_controller
{
    private $con;

    public function __construct()
    {
        $this->con = new Conectar;
        $this->con = $this->con->conexion();
    }


    //CRUD de usuario
    public function createUsuario($info)
    {
        $info[3] = password_hash($info[3], PASSWORD_DEFAULT);
        try {

            $sql = 'INSERT INTO usuarios VALUES ("", "' . $info[1] . '", "' . $info[2] . '", "' . $info[3] . '", "' . $info[3] . '")';
            $boleano = $this->con->query($sql);
            if ($boleano) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            return false;
        }
    }
    public function readUsuario($info)
    {
        $result = $this->con->query('SELECT * FROM usuarios WHERE id = ' . $info[1] . '');

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo 'ID: ' . $row['id'] . ' - Nick: ' . $row['nick'] . ' - Email: ' . $row['email'] . '<br>';
            }
        } else {
            echo 'Usuario no encontrado';
        }
    }
    public function updateUsuario($info)
    {
        $sql = 'UPDATE usuarios SET nick=' . $info[2] . ', email=' . $info[3] . ', contrasenya=' . $info[4] . ' WHERE id=$info[1]';
        if ($this->con->query($sql) === TRUE) {
            echo 'Actualizado correctamente';
        } else {
            echo 'Error updating record: ' . $this->con->error;
        }
    }
    public function deleteUsuario($info)
    {
        $sql = 'DELETE FROM usuarios WHERE id = ' . $info[1];
        if ($this->con->query($sql) === TRUE) {
            echo 'Usuario eliminado';
        } else {
            echo 'Error deleting record: ' . $this->con->error;
        }
    }

    //CRUD de categoria
    public function createCategoria($info)
    {
        $sql = 'INSERT INTO categorias VALUES (' . $info[2] . ', ' . $info[3] . ')';
        if ($this->con->query($sql) === TRUE) {
            echo "Categoria creada";
        } else {
            echo "Error: " . $sql . "<br>" . $this->con->error;
        }
    }
    public function readCategoria($info)
    {
        $result = $this->con->query('SELECT * FROM categorias WHERE id = ' . $info[1] . '');

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "ID: " . $row['id'] . " - Nombre: " . $row['nombre'] . " - Descripcion: " . $row['descripcion'] . "<br>";
            }
        } else {
            echo "No se han encontrado categorias";
        }
    }
    public function updateCategoria($info)
    {
        $sql = 'UPDATE categorias SET nombre=' . $info[2] . ', descripcion=' . $info[3] . ' WHERE id=' . $info[1];
        if ($this->con->query($sql) === TRUE) {
            echo "Categoria actualizada";
        } else {
            echo "Error updating record: " . $this->con->error;
        }
    }
    public function deleteCategoria($info)
    {
        $sql = 'DELETE FROM categorias WHERE id=' . $info[1];
        if ($this->con->query($sql) === TRUE) {
            echo "Categoria eliminada";
        } else {
            echo "Error deleting record: " . $this->con->error;
        }
    }

    //CRUD de producto
    public function createProducto($info)
    {
        $sql = 'INSERT INTO productos VALUES ('.$info[2].', '.$info[3].', '.$info[4].', '.$info[5].')';
        if ($this->con->query($sql) === TRUE) {
            echo "Producto creado";
        } else {
            echo "Error: " . $sql . "<br>" . $this->con->error;
        }
    }
    public function readProducto($info)
    {
        $result = $this->con->query('SELECT * FROM productos WHERE id = '.$info[1]);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo 'ID: ' . $row['id'] . ' - Nombre: ' . $row['nombre'] . ' - Stock: ' . $row['stock'] . ' - Precio Unitario: ' . $row['precio_unitario'] . ' - Categoria: ' . $row['categoria'] . '<br>';
            }
        } else {
            echo "No records found";
        }
    }
    public function updateProducto($info)
    {
        $sql = 'UPDATE productos SET nombre='.$info[2].', stock='.$info[3].', precio_unitario= '.$info[4].', categoria='.$info[5].' WHERE id='.$info[1];
        if ($this->con->query($sql) === TRUE) {
            echo "Producto actualizado";
        } else {
            echo "Error updating record: " . $this->con->error;
        }
    }
    public function deleteProducto($info)
    {
        $sql = 'DELETE FROM productos WHERE id='.$info[1];
        if ($this->con->query($sql) === TRUE) {
            echo "Producto eliminado";
        } else {
            echo "Error deleting record: " . $this->con->error;
        }
    }
}