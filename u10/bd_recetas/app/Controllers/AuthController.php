<?php

namespace  App\Controllers;

use App\Models\Usuario;



class AuthController extends BaseController
{


    public function getLoginAction()
    {

        return $this->renderHTML('../views/login_view.php');
    }

    public function loginAction($request)
    {
        $user = $_POST['user'];
        $usuario = Usuario::getInstancia();
        if ($usuario->login($_POST)) {
            $_SESSION['login'] = true;
            $_SESSION['usuario'] = $usuario->get($user)[0];
            $_SESSION['perfil'] = $_POST['perfil'];
        }
    }
}
