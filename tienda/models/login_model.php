<?php
require_once "controllers/login_cotntroller.php";
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
        $logeado=true;
        if ($logeado) {
            header("Location: views/home_view.php");
        } else {
            header("Location: views/registro_view.php");
        }
    }
}
