<?php
set_include_path(get_include_path() . PATH_SEPARATOR . 'C:/xampp/htdocs/tienda/controllers');
require_once('login_controller.php');
class login_model
{
    private $controller;

    public function __construct()
    {
        // Crea una instancia del controlador de usuarios.
        $this->controller = new login_controller;
    }
    public function comprobarLogin($nick, $contrasenya)
    {
        $logeado = $this->controller->isUserValid($nick, $contrasenya);
        if ($logeado==false) {
            session_start();
            $_SESSION['user'] = $nick;
            header("Location: /tienda/views/home_view.php");
        } else {
            header("Location: /tienda/views/registro_view.php");
        }
    }
}
