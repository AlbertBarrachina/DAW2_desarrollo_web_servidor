<?php
set_include_path(get_include_path() . PATH_SEPARATOR . 'C:/xampp/htdocs/tienda/controllers');
require_once('perfil_controller.php');
class perfil_model
{
    private $controller;

    public function __construct()
    {
        $this->controller = new perfil_controller;
    }
    public function cambiarEmail($email) {
        $this->controller->cambiarEmail($email);
    }
}
?>