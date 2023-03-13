<?php

namespace App\Controllers;

use App\Models\Usuario;

class UsuariosController
{

    public function loginAction()
    {
        echo "login";
        $authController = AuthController::getInstancia()->loginToken();
    }

    public function registroAction()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method == 'POST') {
            $authController = AuthController::getInstancia()->registroUser();
        }
    }
}
