<?php

namespace App\Controllers;

use App\Models\Usuario;


class  AuthController extends BaseController
{
    public function getRegisterAction($request)
    {
        if (isset($_SESSION['perfil'])) {
            if ($_SESSION['perfil'] == 'admin') {
                return $this->renderHTML('addUser.twig');
                return $request;
            } else {
                header('Location: /');
                return $request;
            }
        }else {
            header('Location: /auth');
            return $request;
        }
       
    }
    public function postRegisterAction($request)
    {
        $responseMessage = null;
        if ($request->getMethod() == 'POST') {
            $postData = $request->getParsedBody();
            $user = new Usuario();
            //coger el nombre del usuario del email antes del @
            $user->user = explode('@',$postData['email'])[0];
            $user->email = $postData['email'];
            //encriptar la contraseña
            $user->password = $postData['password'];
            $user->nombre = explode('@',$postData['email'])[0];
            $user->perfil = 'user';
            $user->save();
            $responseMessage = 'Saved';
        }
        return $this->renderHTML('addUser.twig', [
            'responseMessage' => $responseMessage
        ]);
    }

    public function getLoginAction($request)
    {
        return $this->renderHTML('login.twig');
    }

    public function postLoginAction($request)
    {
        $responseMessage = null;
        if ($request->getMethod() == 'POST') {
            $postData = $request->getParsedBody();
            $user = Usuario::where('email', $postData['email'])->first();
            $password = $postData['password'];
            if ($user) {
                if ($password == $user->password) {
                 
                    $_SESSION['userId'] = $user->id;
                    $_SESSION['usuario'] = $user->user;
                    $_SESSION['perfil'] = $user->perfil;
                    if ($_SESSION['perfil'] == 'admin') {
                        header('Location: /admin');
                    }else{

                        header('Location: /');
                    }
                } else {
                    $responseMessage = 'Bad credentials';
                    
                }
            } else {
                $responseMessage = 'Bad credentials';
                header('Location: /auth');
            }
        }
        return $this->renderHTML('login.twig', [
            'responseMessage' => $responseMessage
        ]);
    }

    public function getAdminAction ($request)
    {
        if (isset($_SESSION['perfil'])) {
            if ($_SESSION['perfil'] == 'admin') {
                echo $this->renderHTML('admin.twig');
                return $request;
            } else {
                header('Location: /');
                return $request;
            }
        }else {
            header('Location: /auth');
            return $request;
        }
    }

    public function getLogoutAction($request)
    {
        unset($_SESSION['userId']);
        unset($_SESSION['usuario']);
        unset($_SESSION['perfil']);
        header('Location: /');
        return $request;
    }
   
}
