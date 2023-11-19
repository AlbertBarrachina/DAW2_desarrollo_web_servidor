<?php
set_include_path(get_include_path() . PATH_SEPARATOR . 'C:/xampp/htdocs/tienda/');
require_once('db/db.php');
class productos_controller
{
    private $con;

    public function __construct()
    {
        $this->con = new Conectar;
        $this->con = $this->con->conexion();
    }

    //carga los productos segun esten guardados en la base de datos, sin ordenar
    public function cargarProductos()
    {
        $sql = 'SELECT * FROM productos';
        $resultados = array();
        $query = mysqli_query($this->con, $sql);
        if (mysqli_num_rows($query) > 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                $resultados[] = $row;
            }
            mysqli_free_result($query);

        } else {
            return $resultados = array('ERROR');

        }
        return $resultados;
    }

    //carga los productos en orden ascendiente por precio
    public function cargarProductosASC()
    {
        $sql = 'SELECT * FROM productos ORDER BY precio_unitario ASC';
        $resultados = array();
        $query = mysqli_query($this->con, $sql);
        if (mysqli_num_rows($query) > 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                $resultados[] = $row;
            }
            mysqli_free_result($query);

        } else {
            return $resultados = array('ERROR');
        }
        return $resultados;
    }

    //carga los productos en ordfen descendiente por precio
    public function cargarProductosDESC()
    {
        $sql = 'SELECT * FROM productos ORDER BY precio_unitario DESC';
        $resultados = array();
        $query = mysqli_query($this->con, $sql);
        if (mysqli_num_rows($query) > 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                $resultados[] = $row;
            }
            mysqli_free_result($query);

        } else {
            return $resultados = array('ERROR');
        }
        return $resultados;
    }

    //carga los productos en el carrito para el usaurio loegeado
    public function cargarProductosCarrito()
    {
        $id=-1;
        $sql = 'SELECT id FROM usuarios WHERE nick = "' . session_id() . '"';
        $result = $this->con->query($sql);
        $row = $result->fetch_assoc();
        if ($row) {
            $id = $row['id'];
        } else {
            exit();
        }
        $sql = 'SELECT * FROM carrito WHERE usuario="' . $id . '"';
        $resultados = array();
        $query = mysqli_query($this->con, $sql);
        if (mysqli_num_rows($query) > 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                $resultados[] = $row;
            }
            mysqli_free_result($query);

        } else {
            return $resultados = array('ERROR');
        }
        return $resultados;
    }
    //añade un producto al carrito del usaurio actual y le resta la cantidad comprada al stock original
    public function addCarrito($info)
    {
        $sql = 'SELECT id FROM usuarios WHERE nick = "' . $info[0] . '"';
        $result = $this->con->query($sql);
        $row = $result->fetch_assoc();
        if ($row) {
            $id = $row['id'];
            $info[0] = $id;
        } else {
            exit();
        }
        try {
            $sql = 'INSERT INTO carrito VALUES ("",' . $info[0] . ',' . $info[1] . ',' . $info[2] . ',' . $info[3] . ')';
            if ($this->con->query($sql)) {
                $sql = 'UPDATE productos SET stock = (stock - '.$info[2].') WHERE id = '.$info[1];
                $this->con->query($sql);
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            return false;
        }
    }

    //elimina la entrada en el carrito y restaura los productos a su tabla original
    public function remCarrito($info)
    {
        try {
            $sql = 'DELETE FROM carrito WHERE id = '.$info[0].'';
            if ($this->con->query($sql)) {
                $sql = 'UPDATE productos SET stock = (stock + '.$info[1].') WHERE id = '.$info[2];
                $this->con->query($sql);
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            return false;
        }
    }

}