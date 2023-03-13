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

    //Creación de token
    public function loginToken(){
        $input = json_decode(file_get_contents('php://input'), true);
        if(isset($input['user']) and isset($input['pass'])){
            $user = $input['user'];
            $pass = $input['pass'];
            if($user == "admin" and $pass == "admin"){
                $key = "example_key";
                $token = array(
                    "user" => "user",
                    "pass" => "pass"
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

    }

    public function get(){}
    public function set(){}
    public function edit(){}
    public function delete(){}
}
