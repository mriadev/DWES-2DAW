<?php
namespace App\Models;

use App\Models\DBAbstractModel;


class Equipo extends DBAbstractModel
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

    private $equipo ;
    private $created_at;

    private $updated_at;



    public function setEquipo($equipo)
    {
        $this->equipo = $equipo;
    }
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }
    public function setUpdateAt($updated_at)
    {
        $this->updated_at = $updated_at;
    }
    public function getEquipo()
    {
        return $this->equipo;
    }
    public function getMensaje()
    {
        return $this->mensaje;
    }

    public function getAll()
    {
        $this->query = "SELECT * FROM equipos";
        $this->get_results_from_query();
        return $this->rows;
    }


    public function set_enlace($data = array())
    {
        foreach ($data as $campo => $valor) {
            $$campo = $valor;
        }
        $this->query = "INSERT INTO equipos(equipo)
            VALUES(:equipo)";
        $this->parametros["equipo"] = $equipo;
        $this->get_results_from_query();
        //$this->execute_single_query();
        $this->mensaje = "SH agregado correctamente";
    }
    public function set()
    { 
        $this->query = "INSERT INTO equipos(equipo)
            VALUES(:equipo)";
        //$this->parametros['id']= $id;
        $this->parametros['equipo'] = $this->equipo;
        $this->get_results_from_query();
        //$this->execute_single_query();
        $this->mensaje = 'SH agregado correctamente';
    }


    public function get($id='')
    {
        if($id != '') {
            $this->query = "SELECT * FROM equipos WHERE id = :id";
            //Cargamos los parámetros.
            $this->parametros['id']= $id;
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

    public function edit($equipo_data = array())
    {
        foreach ($equipo_data as $campo=>$valor) {
            $$campo = $valor;
            }
            $this->query = "UPDATE equipos SET equipo=:equipo, update_at=:update_at WHERE id = :id
            ";
            // $this->parametros['id']=$id;
            $this->parametros['equipo']=$editNewEquipo;
            $this->parametros['update_at']= date("Y-m-d H:i:s");
            $this->get_results_from_query();
            $this->mensaje = 'sh modificado';
    }

    public function delete($id = "")
    {
        $this->query = "DELETE FROM equipos WHERE id = :id";
        $this->parametros['id']=$id;
        $this->get_results_from_query();
        $this->mensaje = 'SH eliminado';
    }

    public function searchEquipos($search)
    {
        $this->query = "SELECT * FROM equipos WHERE equipo LIKE :search";
        $this->parametros['search'] = "%$search%";
        $this->get_results_from_query();
        if(count($this->rows) == 1) {
            foreach ($this->rows[0] as $propiedad=>$valor) {
            $this->$propiedad = $valor;
            }
            $this->mensaje = 'se han encontrado resultados';
            }
            else {
            $this->mensaje = 'no se han encontrado resultados';
            }
        return $this->rows;
    }
}
