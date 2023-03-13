<?php

namespace App\Models;

class Config extends DBAbstractModel
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


    /**id
tiempoinactividad
beneficios*/

    private $id;
    private $tiempoinactividad;
    private $beneficios;

    public function setId($id)
    {
        $this->id = $id;
    }
    public function setTiempoinactividad($tiempoinactividad)
    {
        $this->tiempoinactividad = $tiempoinactividad;
    }
    public function setBeneficios($beneficios)
    {
        $this->beneficios = $beneficios;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getTiempoinactividad()
    {
        return $this->tiempoinactividad;
    }

    public function getBeneficios()
    {
        return $this->beneficios;
    }

    public function get($id = '')
    {
    }

    public function set($user_data = array())
    {
    }

    public function edit($user_data = array())
    {
    }

    public function delete($id = '')
    {
    }

    public function getInactividad(){
        $this->query = "SELECT tiempoinactividad FROM config";
        $this->get_results_from_query();
        return $this->rows;
    }
}
