<?php
set_include_path(get_include_path() . PATH_SEPARATOR . 'C:/xampp/htdocs/tienda/');
require_once('db/db.php');
class login_controller
{
    private $con;

    public function __construct()
    {
        $this->con = new Conectar;
        $this->con = $this->con->conexion();
    }

    //comprueba si los daots de login son correctos, si es asi carga la pagina principal
    public function isUserValid($nick, $contrasenya) {

            $sql = 'SELECT contrasenya FROM usuarios WHERE nick = "' . $nick . '"';

        $query = mysqli_query($this->con, $sql);
        $password = mysqli_fetch_assoc($query)['contrasenya'];
            
            if (password_verify($contrasenya, $password)) {
                return true;
            } else {
               return false;
            }
        }

    //devuelve el correo del usuario
    public function getMail($nick) {
        $mail ="";
        $sql = 'SELECT email FROM usuarios WHERE nick = "' . $nick . '"';

    $query = mysqli_query($this->con, $sql);
    
        if ($mail = mysqli_fetch_assoc($query)['email']){
            return $mail;
        } else {
           return $mail;
        }
    }
    }

