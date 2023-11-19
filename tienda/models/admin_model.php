<?php
set_include_path(get_include_path() . PATH_SEPARATOR . 'C:/xampp/htdocs/tienda/');
require_once('controllers/admin_controller.php');
class admin_model
{
    private $controller;

    public function __construct()
    {
        $this->controller = new admin_controller;
    }

    //selecciona la operacion correcta segun que boton se ha pulsado
    public function usuario($info)
    {
        if ($info[0] = 1) {
            $this->controller->createUsuario($info);
        } elseif ($info[0] = 2) {
            $this->controller->readUsuario($info);
        } elseif ($info[0] = 3) {
            $this->controller->updateUsuario($info);
        } elseif ($info[0] = 4) {
            $this->controller->deleteUsuario($info);
        }
    }

    //selecciona la operacion correcta segun que boton se ha pulsado
    public function categoria($info)
    {
        if ($info[0] = 1) {
            $this->controller->createCategoria($info);
        } elseif ($info[0] = 2) {
            $this->controller->readCategoria($info);
        } elseif ($info[0] = 3) {
            $this->controller->updateCategoria($info);
        } elseif ($info[0] = 4) {
            $this->controller->deleteCategoria($info);
        }
    }

    //selecciona la operacion correcta segun que boton se ha pulsado
    public function producto($info)
    {
        if ($info[0] = 1) {
            $this->controller->createProducto($info);
        } elseif ($info[0] = 2) {
            $this->controller->readProducto($info);
        } elseif ($info[0] = 3) {
            $this->controller->updateProducto($info);
        } elseif ($info[0] = 4) {
            $this->controller->deleteProducto($info);
        }
    }

}
