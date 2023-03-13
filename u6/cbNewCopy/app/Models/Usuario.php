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


    public function setUser($user)
    {
        $this->user = $user;
    }
    public function setpass($pass)
    {
        $this->pass = $pass;
    }


    public function getUsuario()
    {
        return $this->user;
    }

    public function getPassword()
    {
        return $this->pass;
    }
    public function getPerfil()
    {
       return $this->perfil;

    }
    public function getMensaje()
    {
        return $this->mensaje;
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
        $this->parametros['equipo'] = $this->user;
        $this->parametros['equipo'] = $this->pass;
        $this->get_results_from_query();
        //$this->execute_single_query();
        $this->mensaje = 'SH agregado correctamente';
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
        $this->query = "UPDATE usuario SET pass=:pass WHERE user = :user
            ";
        // $this->parametros['id']=$id;
        $this->parametros['password'] = $pass;
        $this->get_results_from_query();
        $this->mensaje = 'sh modificado';
    }

    public function delete($user_data = array())
    {
        foreach ($user_data as $campo => $valor) {
            $$campo = $valor;
        }
        $this->query = "DELETE FROM usuarios WHERE user = :user and pass = :pass";
        $this->parametros['user'] = $user;
        $this->parametros['pass'] = $pass;
        $this->get_results_from_query();
        $this->mensaje = 'SH eliminado';
    }

    public function login($user_data = array())
    {

        foreach ($user_data as $campo => $valor) {
            $$campo = $valor;
        }
        $this->query = "SELECT * FROM usuarios WHERE user = :user and pass = :pass";
        $this->parametros['user'] = $user;
        $this->parametros['pass'] = $pass;
        $this->get_results_from_query();
        if (count($this->rows) == 1) {
            foreach ($this->rows[0] as $propiedad => $valor) {
                $this->$propiedad = $valor;
            }
            $this->mensaje = 'login correcto';
            return true;
        } else {
            $this->mensaje = 'login incorrecto';
            return false;
        }
    }
}
