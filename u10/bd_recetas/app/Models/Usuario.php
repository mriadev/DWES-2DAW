<?php

namespace App\Models;

class Usuario extends DBAbstractModel
{

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

    private $user;
    private $password;
    private $nombre;
    private $email;
    private $id;
    private $perfil;




    public function setUser($user)
    {
        $this->user = $user;
    }
    public function setpassword($password)
    {
        $this->password = $password;
    }

    public function getId(){
        return $this->id;
    }
    public function getUsuario()
    {
        return $this->user;
    }

    public function getpasswordword()
    {
        return $this->password;
    }
    public function getNombre()
    {
       return $this->nombre;

    }

    //Añadir el objeto directamente
    public function set_enlace($data = array())
    {
        foreach ($data as $campo => $valor) {
            $$campo = $valor;
        }
        $this->query = "INSERT INTO usuarios(user, password)
            VALUES(:user, :password)";
        $this->parametros["user"] = $user;
        $this->parametros["password"] = $password;
        $this->get_results_from_query();
        //$this->execute_single_query();
        $this->mensaje = "SH agregado correctamente";
    }
    public function set()
    {
        $this->query = "INSERT INTO usuarios(user, password)
        VALUES(:user, :password)";
        //$this->parametros['id']= $id;
        $this->parametros['user'] = $this->user;
        $this->parametros['password'] = $this->password;
        $this->get_results_from_query();
        //$this->execute_single_query();
        $this->mensaje = 'SH agregado correctamente';
    }

    public function register($user_data = array()){
        foreach ($user_data as $campo => $valor) {
            $$campo = $valor;
        }
        $this->query = "INSERT INTO usuarios(user, password, nombre, email)
        VALUES(:user, :password)";
        //$this->parametros['id']= $id;
        $this->parametros['user'] = $user;
        $this->parametros['password'] = $password;
        $this->parametros['nombre'] = $nombre;
        $this->parametros['email'] = $email;
        $this->get_results_from_query();
    }


    public function get($user = '')
    {
        if ($user != '') {
            $this->query = "SELECT * FROM usuarios WHERE user = :user";
            //Cargamos los parámetros.
            $this->parametros['user'] = $user;
            //Ejecutamos consulta que devuelve registros.
            $this->get_results_from_query();
        }
        if (count($this->rows) == 1) {
            foreach ($this->rows[0] as $propiedad => $valor) {
                $this->$propiedad = $valor;
            }
            $this->mensaje = 'sh encontrado';
        } else {
            $this->mensaje = 'sh no encontrado';
        }
        return $this->rows;
    }

    public function edit($user_data = array())
    {
        foreach ($user_data as $campo => $valor) {
            $$campo = $valor;
        }
        $this->query = "UPDATE usuario SET password=:password WHERE user = :user
            ";
        // $this->parametros['id']=$id;
        $this->parametros['passwordword'] = $password;
        $this->get_results_from_query();
        $this->mensaje = 'sh modificado';
    }

    public function delete($user_data = array())
    {
        foreach ($user_data as $campo => $valor) {
            $$campo = $valor;
        }
        $this->query = "DELETE FROM usuarios WHERE user = :user and password = :password";
        $this->parametros['user'] = $user;
        $this->parametros['password'] = $password;
        $this->get_results_from_query();
        $this->mensaje = 'SH eliminado';
    }

    public function login($user_data = array())
    {
        foreach ($user_data as $campo => $valor) {
            $$campo = $valor;
            echo $campo . ' ' . $valor . '<br>';
        }

        $this->query = "SELECT * FROM usuarios
        WHERE usuario = :usuario AND password = :password
        AND id IN (SELECT usuarios_id FROM r_usuarios_perfiles WHERE Perfiles_perfil = :perfil);";
        $this->parametros['usuario'] = $user;
        $this->parametros['password'] = $pass;
        $this->parametros['perfil'] = $perfil;
        
        $this->get_results_from_query();
        if (count($this->rows) == 1) {
            foreach ($this->rows[0] as $propiedad => $valor) {
                $this->$propiedad = $valor;
            }
            echo $this->mensaje = 'sh encontrado';
            return true;
        } else {
            echo $this->mensaje = 'sh no encontrado';
            return false;
        }
        return $this->rows;
    }

    public function bloquearUsuario($user = ''){
        $this->query = "UPDATE usuarios SET bloqueado = 1 WHERE user = :user";
        $this->parametros['user'] = $user;
        $this->get_results_from_query();
                $this->mensaje = 'Usuario bloqueado';


    }

    public function desbloquearUsuario($user = ''){
        $this->query = "UPDATE usuarios SET bloqueado = 0 WHERE user = :user";
        $this->parametros['user'] = $user;
        $this->get_results_from_query();
                $this->mensaje = 'Usuario desbloqueado';

    }

    //comprobar si el usuario está bloqueado
    public function comprobarBloqueado($user = ''){
        $this->query = "SELECT bloqueado FROM usuarios WHERE user = :user";
        $this->parametros['user'] = $user;
        $this->get_results_from_query();
        if($this->rows[0]['bloqueado'] == 1){
            return true;
        }else{
            return false;
        }
    }
    public function getUsuariosBloqueados(){
        $this->query = "SELECT * FROM usuarios WHERE bloqueado = 1";
        $this->get_results_from_query();
        return $this->rows;

    }


    public function getBookmarks($id){
        $this->query = "SELECT * FROM bookmarks WHERE idUsuario = :id";
        $this->parametros['id'] = $id;
        $this->get_results_from_query();
        return $this->rows;
    }
}
