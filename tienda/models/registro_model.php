<?php
require_once("views/registro_view.php");
class registro_model{
    private $con;

    public function __construct()
    {
        $this->con = Conectar::conexion();
    }

    public function createUser($nick, $email, $contrasenya, $confirmContrasenya) {

        $hashedPassword = password_hash($contrasenya, PASSWORD_DEFAULT);
        $hashedPassword2 = password_hash($confirmContrasenya, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users VALUES (,?, ?, ?, ?, ?)";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("ssss", $nick, $email, $hashedPassword, $hashedPassword2);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
