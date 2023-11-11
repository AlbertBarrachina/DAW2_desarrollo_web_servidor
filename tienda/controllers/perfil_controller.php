<?php

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
        $sql = 'SELECT nick FROM usuarios WHERE nick = "' . $email . '"';

        $query = mysqli_query($this->con, $sql);
        $nombre = mysqli_fetch_assoc($query)['nick'];

        if ($nombre != null) {
            $sql = 'UPDATE usuarios SET email = "' . $email . '" WHERE nick = "' . $_SESSION['nick'] . '"';

            $query = mysqli_query($this->con, $sql);

        }
    }
}