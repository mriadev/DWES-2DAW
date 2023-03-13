<?php

namespace App\Models;

class Superheroe extends DBAbstractModel
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

    private $id;
    private $nombre;
    private $velocidad;


    public function get_id()
    {
        return $this->id;
    }
    public function set_id($id)
    {
        $this->id = $id;
    }

    public function get_nombre()
    {
        return $this->nombre;
    }

    public function set_nombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function get_velocidad()
    {
        return $this->velocidad;
    }
    public function set_velocidad($velocidad){
        $this->velocidad = $velocidad;
    }

    public function set()
    {

        $this->query = "INSERT INTO superheroes(nombre, velocidad)
        VALUES(:nombre, :velocidad)";
        //$this->parametros['id']= $id;
        $this->parametros['nombre'] = $this->nombre;
        $this->parametros['velocidad'] = $this->velocidad;

        $this->get_results_from_query();
        //$this->execute_single_query();
        $this->mensaje = 'SH agregado correctamente';
    }

    public function getId($id='')
    {
        if($id != '') {
            $this->query = "SELECT * FROM superheroes WHERE id = :id";
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
    public function get()
    {
        if($this->id != '') {
            $this->query = "SELECT * FROM superheroes WHERE id = :id";
            //Cargamos los parámetros.
            $this->parametros['id']= $this->id;
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
    
    public function edit()
    {

            $this->query = "UPDATE superheroes SET nombre=:nombre, velocidad=:velocidad, updated_at=:updated_at WHERE id = :id
            ";
            $this->parametros['id']=$this->id;
            $this->parametros['nombre']=$this->nombre;
            $this->parametros['updated_at']= date("Y-m-d H:i:s");
            $this->parametros['velocidad']= $this->velocidad;
            $this->get_results_from_query();
            $this->mensaje = 'sh modificado';
    }

    public function delete($id = '')
    {
        $this->query = "DELETE FROM superheroes WHERE id = :id";
        $this->parametros['id'] = $id;
        $this->get_results_from_query();
        $this->mensaje = 'SH eliminado correctamente';
    }

    public function getAll()
    {
        $this->query = "SELECT * FROM superheroes";
        $this->get_results_from_query();
        return $this->rows;
    }
    public function getLast(){
        $this->query = "SELECT * FROM superheroes ORDER BY id DESC LIMIT 20";
        $this->get_results_from_query();
        return $this->rows;
    }
}

?>