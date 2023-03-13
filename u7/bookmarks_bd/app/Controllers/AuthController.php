<?php 
namespace  App\Controllers;

use App\Models\Usuario;

class AuthController{
  
    private static $instancia;
    public static function getInstancia()
    {
        if (!isset(self::$instancia)) {
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
        return self::$instancia;
    }
    public function __clone()
    {
        trigger_error('La clonación no está permitida!.', E_USER_ERROR);
    }

    public function login($user, $pass)
    {
       $usuario = Usuario::getInstancia();
        $usuario->setUser($user);
        $usuario->setPass($pass);
        $data = $usuario->login();
        return $data;
    }

    public function get(){}
    public function set(){}
    public function edit(){}
    public function delete(){}
}


?>