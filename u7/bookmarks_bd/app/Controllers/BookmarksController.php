<?php

namespace  App\Controllers;

use App\Models\Usuario;
use App\Models\Bookmark;
use App\Controllers\AuthController;

class BookmarksController extends BaseController
{

    public function IndexAction($request)
    {
        

        $bookmarks = Bookmark::getInstancia();
        $data = $bookmarks->getAllBookmarks();
        $_SESSION['bookmarksRecomendados'] = $bookmarks->getBookmarksMostSavedByUsers();
        $usuario = Usuario::getInstancia();

        if(isset($_SESSION['bookmarks_user'])){
            $_SESSION['bookmarks_user'] = $usuario->getBookmarksUser($_SESSION['usuario'][0]['id']);
        }

        if (isset($_POST['login'])) {
            $login = AuthController::getInstancia();
            $user = $_POST['user'];
            $pass = $_POST['pass'];

            if (!isset($_SESSION[$_POST['user']])) {
                $_SESSION[$user]['intentos'] = 0;
            }

            $usuario->setUser($user);
            if (!$_SESSION['login']) {
                if ($_SESSION[$user]['intentos'] >= NUM_INTENTOS) {
                    $usuario->bloquearUsuario();
                } else {
                    if ($login->login($user, $pass)) {
                        if ($usuario->comprobarBloqueado()) {
                            //mensaje de usuario bloqueado
                        }else{
                            $_SESSION['usuario'] = $usuario->get();
                            $_SESSION['login'] = true;
                            $_SESSION['bookmarks_user'] = $usuario->getBookmarksUser($_SESSION['usuario'][0]['id']);
                            $_SESSION['perfil'] = $usuario->getPerfil();
                        }
                    }else{
                        $_SESSION[$user]['intentos']++;
                        header('Location: /');
                    }
                }
            }
            unset($_POST['login']);
        }
        if ($_SESSION['perfil'] == 'invitado') {
            header('Location: /');
            return;
        }

        if($_SESSION['perfil'] == 'user'){
            echo "login usuario";
            $this->renderHTML('../views/index_view.php',$data);
        }
        
        if($_SESSION['perfil'] == 'admin'){
            $users = Usuario::getInstancia();
            $data = $users->getAllUsers();
            header('Location: /admin');
            $this->renderHTML('../views/admin_view.php',$data);

        }
        
        
    }
    public function LoginAction($request)
    {

        $bookmark = Bookmark::getInstancia();
        $_SESSION['bookmarksRecomendados'] = $bookmark->getBookmarksMostSavedByUsers();
        if ($_SESSION['perfil'] == 'user') {
            echo "login";
            header('Location: /usuario');
        }
        if ($_SESSION['perfil'] == 'admin') {
            header('Location: /admin');
        }

        $this->renderHTML('../views/index_view.php');
    }
    public function AddAction($request)
    {
        $bookmark = Bookmark::getInstancia();
        if (isset($_POST['add'])) {
            $bookmark->set_bm_url($_POST['url']);
            $bookmark->set_descripcion($_POST['descripcion']);
            $bookmark->set_idUsuario($_SESSION['usuario'][0]['id']);
            $bookmark->set();
            header('Location: /usuario');
        }
        if (isset($_POST['addRecomendado'])) {
            $bookmark->set_bm_url($_POST['bm_url']);
            $bookmark->set_descripcion($_POST['descripcion']);
            $bookmark->set_idUsuario($_SESSION['usuario'][0]['id']);
            $bookmark->set();
            header('Location: /usuario');
        }

        $data = [];
        $this->renderHTML('../views/add_view.php',$data);
    }
    public function EditAction($request)
    {
        $bookmark = Bookmark::getInstancia();
        $bookmark->set_id($_POST['id']);
        $bookmark->get();
        $data = $bookmark->get();
        //comprobar que el usuario es el mismo que el que ha creado el bookmark
        if ($bookmark->get_idUsuario() == $_SESSION['usuario'][0]['id']) {
            if (isset($_POST['edit'])) {
                $_SESSION['bookmark'] = $bookmark->get();
                $bookmark->set_bm_url($_POST['new_bm_url']);
                $bookmark->set_descripcion($_POST['new_descripcion']);
                $bookmark->set_id($_POST['id']);
                $bookmark->edit();
                header('Location: /usuario');
            }
            $this->renderHTML('../views/edit_view.php',$data);

        }else{
            header('Location: /usuario');
        }
       
        
    }
    public function DeleteAction($request)
    {
        $bookmark = Bookmark::getInstancia();
        $bookmark->set_id($_POST['id']);
        $data = $bookmark->get();
        //comprobar que el usuario es el mismo que el que ha creado el bookmark
        if ($bookmark->get_idUsuario() == $_SESSION['usuario'][0]['id']) {

            if (isset($_POST['delete'])) {
                $bookmark->delete($_POST['id']);
                header('Location: /usuario');
            }
            $this->renderHTML('../views/index_view',$data);
        }else{
            header('Location: /usuario');
        }
    }

    public function AdminAction($request)
    {
        $users = Usuario::getInstancia();
        $data = $users->getAllUsers();
        $this->renderHTML('../views/admin_view.php',$data);
    }
}
