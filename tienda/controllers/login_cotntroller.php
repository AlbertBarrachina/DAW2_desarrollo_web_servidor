<?php
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
    public function isUserValid($nick, $contrasenya)
    {
        $password = password_hash($contrasenya, PASSWORD_DEFAULT);
        try {
            $sql = 'SELECT id FROM usuarios WHERE nick = ? AND password = ?';
            $stmt = mysqli_prepare($this->con, $sql);
        
            mysqli_stmt_bind_param($stmt, 'ss', $nick, $password);
            mysqli_stmt_execute($stmt);
        
            // Get the result
            $querry = mysqli_stmt_get_result($stmt);
        
            if ($linea = mysqli_fetch_assoc($querry)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            return false;
        }
    }
}
