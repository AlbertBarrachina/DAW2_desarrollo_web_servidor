<?php
set_include_path(get_include_path() . PATH_SEPARATOR . 'C:/xampp/htdocs/tienda/');
require_once('controllers/perfil_controller.php');
class perfil_model
{
    private $controller;

    public function __construct()
    {
        $this->controller = new perfil_controller;
    }
    //cambia el correo del usuario de esta sesion en la base de datos y actualiza el correo de la sesion actual para ver que se ha actualizado
    public function cambiarEmail($email) {
        $this->controller->cambiarEmail($email);
        header("Location: /tienda/views/perfil_view.php");
    exit();
    }

    //cambia la contraseña
    public function cambiarContrasenya($contrasenya,$contrasenya2){
        if($contrasenya == $contrasenya2){
         $this->controller->cambiarContrasenya($contrasenya);
        header("Location: /tienda/views/perfil_view.php");
        exit();   
        }else{
            echo 'Contraseña no coinciden';
        }
    }
}
?>