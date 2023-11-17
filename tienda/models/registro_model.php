<?php
set_include_path(get_include_path() . PATH_SEPARATOR . 'C:/xampp/htdocs/tienda/');
require_once('controllers/registro_controller.php');
class registro_model{
    private $controller;

    public function __construct()
    {
        // Crea una instancia del controlador de usuarios.
        $this->controller = new registro_controller;
    }
    public function registrar($nick, $email, $contrasenya, $contrasenya2){
       $boleano= $this->controller->registrar($nick, $email, $contrasenya, $contrasenya2);
       if ($boleano == true){
        header("Location: /tienda/views/login_view.php");
       }
    }
}
?>