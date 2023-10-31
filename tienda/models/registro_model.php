<?php
require_once("views/registro_view.php");
class registro_model{
    private $modelo;
    private $con;

    public function __construct()
    {
        $this->modelo = new registro_controller();
        $this->con = Conectar::conexion();
    }

    public function createUser()
    {
        $nick = $_POST['nick'];
        $email = $_POST['email'];
        $contrasenya = $_POST['contrasenya'];
        $confirmacion_contrasenya = $_POST['confirmacion_contrasenya'];

        $salt = password_hash(uniqid(), PASSWORD_BCRYPT);
        $hashed_password = password_hash($contrasenya . $salt, PASSWORD_BCRYPT);
        $hashed_password2 = password_hash($confirmacion_contrasenya . $salt, PASSWORD_BCRYPT);

        if ($this->con->connect_error) {
            die("Error de conexión a la base de datos: " . $this->con->connect_error);
        }

        $sql = 'INSERT INTO USUARIOS VALUES (,?, ?, ?, ?)';
        $querry = $this->con->prepare($sql);

        $querry->bind_param("ssss", $nick, $email, $hashed_password, $hashed_password2);
        if (!$querry) {
            die("Error al preparar la consulta: " . $this->con->error);
        }
        if ($querry->execute()) {
            // Usuario creado con éxito
            $querry->close();
            $this->con->close();
            return true;
        } else {
            // Error al crear el usuario
            $querry->close();
            $this->con->close();
            return false;
        }
    }
}
