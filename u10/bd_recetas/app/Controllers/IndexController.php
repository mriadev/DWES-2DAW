<?php

namespace App\Controllers;

use App\Models\Recetas;
use App\Models\Usuario;

class IndexController extends BaseController
{

    public function indexAction()
    {

        $recetas = Recetas::getInstancia();
        $data = $recetas->getAll();

        if (isset($_POST['logout'])) {
            include('../app/include/cierreSession.php');
        }

        if (isset($_POST['login'])) {
            echo "login";
            $user = $_POST['user'];
            $usuario = Usuario::getInstancia();
            if ($usuario->login($_POST)) {
                $_SESSION['login'] = true;
                $_SESSION['usuario'] = $usuario->get($user)[0];
                $_SESSION['perfil'] = $_POST['perfil'];
                $favs= Recetas::getInstancia();
                $_SESSION['recetasFavoritas'] = $favs->getFavoritas($_SESSION['usuario']['id']);
            }
            header('Location: /');
        }

        if (isset($_POST['mostrar'])) {
            $recetasColaborador = Recetas::getInstancia();
            if ($_SESSION['mostrarRecetas']) {
                $recetasColaborador->setPublicas($_SESSION['usuario']['id']);
                $_SESSION['mostrarRecetas'] = false;
            } else {
                $recetasColaborador->setNoPublicas($_SESSION['usuario']['id']);
                $_SESSION['mostrarRecetas'] = true;
            }
            $data = $recetasColaborador->getAll();
            header('Location: /');
        }

        if (isset($_SESSION['usuario'])) {
            $favs= Recetas::getInstancia();
            $_SESSION['recetasFavoritas'] = $favs->getFavoritas($_SESSION['usuario']['id']);
        }

        return $this->renderHTML('../views/index_view.php', $data);
    }

    public function login()
    {
    }
}
