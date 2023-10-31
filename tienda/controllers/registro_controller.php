<?php
require_once("models/registro_model.php");
$modelo = new registro_model();
class registro_controller
{
    public function __construct()
    {
        $this->modelo = new registro_model();
    }
    public function createUser()
    {
        $result = $this->modelo->createUser();

        if ($result) {
            return 'Usuario creado con éxito.';
        } else {
            return 'Hubo un error al crear el usuario.';
        }
    }
}
