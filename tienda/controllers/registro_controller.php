<?php
set_include_path(get_include_path() . PATH_SEPARATOR . 'C:/xampp/htdocs/tienda/db');
require_once('db.php');
class registro_controller
{
    private $con;

    public function __construct()
    {
        $this->con = new Conectar;
        $this->con = $this->con->conexion();
    }

    //registra el usuario en la base de datos con la contraseña encriptada
    public function registrar($nick, $email, $contrasenya, $contrasenya2)
    {
        $password = password_hash($contrasenya, PASSWORD_DEFAULT);
        $password2 = password_hash($contrasenya2, PASSWORD_DEFAULT);
        try {

            $sql = 'INSERT INTO usuarios VALUES ("", "'. $nick .'", "'. $email .'", "'. $password .'", "'. $password2 .'")';
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
}
