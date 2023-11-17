<?php
set_include_path(get_include_path() . PATH_SEPARATOR . 'C:/xampp/htdocs/tienda/');
require_once('db/db.php');
class perfil_controller
{
    private $con;

    public function __construct()
    {
        $this->con = new Conectar;
        $this->con = $this->con->conexion();
    }


    //cambia el correo de la cuenta
    public function cambiarEmail($email)
    {      
            $sql = 'UPDATE usuarios SET email = "' . $email . '" WHERE nick = "' . $_SESSION['nick']. '"';

            $query = mysqli_query($this->con, $sql);
            $_SESSION['mail'] = $email;
    }
        //cambia el correo de la cuenta
        public function cambiarContrasenya($contrasenya)
        {      
            $password = password_hash($contrasenya, PASSWORD_DEFAULT);
                $sql = 'UPDATE usuarios SET contrasenya = "' . $password . '", confirmacion_contrasenya= "'.$password.'" WHERE nick = "' . $_SESSION['nick']. '"';
    
                $query = mysqli_query($this->con, $sql);
        }
}