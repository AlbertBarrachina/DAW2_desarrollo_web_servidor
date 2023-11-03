<?php
require_once("models/registro_model.php");

class registro_controller
{
    private $modelo;

    public function __construct()
    {
        $modelo = new registro_model();
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
