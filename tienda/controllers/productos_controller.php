<?php
set_include_path(get_include_path() . PATH_SEPARATOR . 'C:/xampp/htdocs/tienda/');
require_once('db/db.php');
class registro_controller
{
    private $con;

    public function __construct()
    {
        $this->con = new Conectar;
        $this->con = $this->con->conexion();
    }
    
}