<?php
require_once("models/registro_model.php");
if (isset($_POST['Registrar'])){
    $this->createUser();
    }
class registro_controller
{
    private $modelo;

    

    public function __construct()
    {
        $modelo = new registro_model();
    }
    public function showRegisterView() {
        include('views/register_view.php');
    }

    public function createUser($nick, $contrasenya, $confirmarContrasenya) {
        if ($contrasenya !== $confirmarContrasenya) {
            echo 'Las contraseñas no coinciden.';
        } else {
            $result = $this->modelo->createUser($nick, $contrasenya);

            if ($result) {
                header("Location: index.php?action=login"); // Redirige a la página de inicio de sesión u otra vista
                exit();
            } else {
                echo 'Hubo un error al crear el usuario.';
            }
        }
    }
}
