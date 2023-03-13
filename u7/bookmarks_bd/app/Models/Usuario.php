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
    private $pass;
    private $id;
    private $perfil;
    private $bookmarks;

    public function setUser($user)
    {
        $this->user = $user;
    }
    public function setPass($pass)
    {
        $this->pass = $pass;
    }    
    public function getId(){
        return $this->id;
    }
    public function getUsuario()
    {
        return $this->user;
    }

    public function getPassword()
    {
        return $this->pass;
    }

    public function getMensaje()
    {
        return $this->mensaje;
    }

    public function getPerfil()
    {
        return $this->perfil;
    }
    public function getBookmarks()
    {
        return $this->bookmarks;
    }


    //Añadir el objeto directamente
    public function set_enlace($data = array())
    {
        foreach ($data as $campo => $valor) {
            $$campo = $valor;
        }
        $this->query = "INSERT INTO usuarios(user, pass)
            VALUES(:user, :pass)";
        $this->parametros["user"] = $user;
        $this->parametros["pass"] = $pass;
        $this->get_results_from_query();
        //$this->execute_single_query();
        $this->mensaje = "SH agregado correctamente";
    }
    public function set()
    {
        $this->query = "INSERT INTO usuarios(user, pass)
        VALUES(:user, :pass)";
        //$this->parametros['id']= $id;
        $this->parametros['user'] = $this->user;
        $this->parametros['pass'] = $this->pass;
        $this->get_results_from_query();
        //$this->execute_single_query();
        $this->mensaje = 'SH agregado correctamente';
    }

    public function get()
    {
        if($this->user != '') {
            $this->query = "SELECT * FROM usuarios WHERE user = :user";
            //Cargamos los parámetros.
            $this->parametros['user']= $this->user;
            //Ejecutamos consulta que devuelve registros.
            $this->get_results_from_query();
            }
            if(count($this->rows) == 1) {
            foreach ($this->rows[0] as $propiedad=>$valor) {
            $this->$propiedad = $valor;
            }
            $this->mensaje = 'sh encontrado';
            }
            else {
            $this->mensaje = 'sh no encontrado';
            }
            return $this->rows;
    }


    public function getUser($user = '')
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

    public function edit()
    {
        
    }

    public function delete($id = '')
    {
        
    }

    public function login()
    {
        $this->query = "SELECT * FROM usuarios WHERE user = :user AND psw = :pass";
        $this->parametros['user'] = $this->user;
        $this->parametros['pass'] = $this->pass;
        $this->get_results_from_query();
        if (count($this->rows) == 1) {
            return true;
        }else{
            return false;
        }
    }

    public function bloquearUsuario(){
        $this->query = "UPDATE usuarios SET bloqueado = 1 WHERE user = :user";
        $this->parametros['user'] = $this->user;
        $this->get_results_from_query();
                $this->mensaje = 'Usuario bloqueado';


    }

    public function comprobarBloqueado(){
        $this->query = "SELECT bloqueado FROM usuarios WHERE user = :user";
        $this->parametros['user'] = $this->user;
        $this->get_results_from_query();
        if($this->rows[0]['bloqueado'] == 1){
            return true;
        }else{
            return false;
        }
    }

    public function getAllUsers(){
        $this->query = "SELECT * FROM usuarios";
        $this->get_results_from_query();
        return $this->rows;
    }

    //Todos los bookmars de un usuario 
    public function getBookmarksUser($id = ''){
        $this->query = "SELECT * FROM bookmarks WHERE idUsuario = :id";
        $this->parametros['id'] = $id;
        $this->get_results_from_query();
        return $this->rows;
    }


}
