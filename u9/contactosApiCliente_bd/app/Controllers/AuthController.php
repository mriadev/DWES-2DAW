<?php 
namespace  App\Controllers;

use App\Models\Usuario;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;



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


    public function registroUser(){
        $input = json_decode(file_get_contents('php://input'), true);
        $usuario = Usuario::getInstancia();
        $usuario->setUser($input['user']);
        $usuario->setPass($input['pass']);
        $usuario->setNombre($input['nombre']);
        $usuario->setEmail($input['email']);
        $usuario->set();
        return json_encode(array("message" => "User created."));
    }

    //Creación de token
    public function loginToken(){
        $input = json_decode(file_get_contents('php://input'), true);
        $usuario = Usuario::getInstancia();
        $usuario->setUser($input['user']);
        $usuario->setPass($input['pass']);

            if($usuario->login()){
                $key = "example_key";
                $token = array(
                    "user" => $input['user'],
                    "pass" => $input['pass']
                );
                //que el token expire en 1 hora
                $token["exp"] = time() + 3600;
                $jwt = JWT::encode($token, $key,'HS256');

                return json_encode(
                    array(
                        "message" => "Successful login.",
                        "jwt" => $jwt
                    )
                );
            }else{
                return json_encode(array("message" => "Login failed."));
            }
        

    }

    public function get(){}
    public function set(){}
    public function edit(){}
    public function delete(){}
}
