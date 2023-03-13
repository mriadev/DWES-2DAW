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
    private $nombre;
    private $email;
    private $id;




    public function setUser($user)
    {
        $this->user = $user;
    }
    public function setPass($pass)
    {
        $this->pass = $pass;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getUsuario()
    {
        return $this->user;
    }

    public function getpass()
    {
        return $this->pass;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getEmail()
    {
        return $this->email;
    }

    //Añadir el objeto directamente
    public function set_enlace($data = array())
    {
        foreach ($data as $campo => $valor) {
            $$campo = $valor;
        }
        $this->query = "INSERT INTO usuarios(user, pass)
            VALUES(:user, :pass
            )";
        $this->parametros["user"] = $user;
        $this->parametros["pass"] = $pass;
        $this->get_results_from_query();
        //$this->execute_single_query();
        $this->mensaje = "SH agregado correctamente";
    }
    public function set()
    {
        $this->query = "INSERT INTO usuarios(nombre, user, pass, email)
        VALUES(:nombre, :user, :pass, :email)";
        //$this->parametros['id']= $id;
        $this->parametros['nombre'] = $this->nombre;
        $this->parametros['user'] = $this->user;
        $this->parametros['pass'] = $this->pass;
        $this->parametros['email'] = $this->email;
        $this->get_results_from_query();
        //$this->execute_single_query();
        $this->mensaje = 'SH agregado correctamente';
    }

    public function register($user_data = array())
    {
        foreach ($user_data as $campo => $valor) {
            $$campo = $valor;
        }
        $this->query = "INSERT INTO usuarios(user, pass
        , nombre, email)
        VALUES(:user, :pass
        )";
        //$this->parametros['id']= $id;
        $this->parametros['user'] = $user;
        $this->parametros['pass
        '] = $pass;
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
        $this->query = "UPDATE usuario SET pass
        =:pass
         WHERE user = :user
            ";
        // $this->parametros['id']=$id;
        $this->parametros['pass
        word'] = $pass;
        $this->get_results_from_query();
        $this->mensaje = 'sh modificado';
    }

    public function delete($user_data = array())
    {
        foreach ($user_data as $campo => $valor) {
            $$campo = $valor;
        }
        $this->query = "DELETE FROM usuarios WHERE user = :user and pass
         = :pass
        ";
        $this->parametros['user'] = $user;
        $this->parametros['pass
        '] = $pass;
        $this->get_results_from_query();
        $this->mensaje = 'SH eliminado';
    }

    public function login()
    {
        $this->query = "SELECT * FROM usuarios WHERE user = :user and pass = :pass
        ";
        $this->parametros['user'] = $this->user;
        $this->parametros['pass'] = $this->pass;
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

    public function bloquearUsuario($user = '')
    {
        $this->query = "UPDATE usuarios SET bloqueado = 1 WHERE user = :user";
        $this->parametros['user'] = $user;
        $this->get_results_from_query();
        $this->mensaje = 'Usuario bloqueado';
    }

    public function desbloquearUsuario($user = '')
    {
        $this->query = "UPDATE usuarios SET bloqueado = 0 WHERE user = :user";
        $this->parametros['user'] = $user;
        $this->get_results_from_query();
        $this->mensaje = 'Usuario desbloqueado';
    }

    //comprobar si el usuario está bloqueado
    public function comprobarBloqueado($user = '')
    {
        $this->query = "SELECT bloqueado FROM usuarios WHERE user = :user";
        $this->parametros['user'] = $user;
        $this->get_results_from_query();
        if ($this->rows[0]['bloqueado'] == 1) {
            return true;
        } else {
            return false;
        }
    }
    public function getUsuariosBloqueados()
    {
        $this->query = "SELECT * FROM usuarios WHERE bloqueado = 1";
        $this->get_results_from_query();
        return $this->rows;
    }


    public function getBookmarks($id)
    {
        $this->query = "SELECT * FROM bookmarks WHERE idUsuario = :id";
        $this->parametros['id'] = $id;
        $this->get_results_from_query();
        return $this->rows;
    }
}
