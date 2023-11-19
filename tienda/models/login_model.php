<?php
set_include_path(get_include_path() . PATH_SEPARATOR . 'C:/xampp/htdocs/tienda/');
require_once('controllers/login_controller.php');
class login_model
{
    private $controller;

    public function __construct()
    {
        // Crea una instancia del controlador de usuarios.
        $this->controller = new login_controller;
    }

    //inicia sesion
    public function comprobarLogin($nick, $contrasenya)
    {
        $logeado = $this->controller->isUserValid($nick, $contrasenya);
        if ($logeado == true) {
            session_id('' . $nick . '');
            session_start();
            $_SESSION['nick'.session_id()] = $nick;
            $_SESSION['mail'.session_id()] = $this->controller->getMail($nick);
            $_SESSION['asc'.session_id()] = false;
            $_SESSION['desc'.session_id()] = false;
            session_write_close();
            if ($nick == "admin") {
                header("Location: /tienda/views/admin_view.php");
            } else {
                header("Location: /tienda/views/home_view.php");
            }
        } else {
            header("Location: /tienda/views/registro_view.php");
        }
    }
}
