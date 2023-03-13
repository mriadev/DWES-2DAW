<?php

/**
 * Modelo de la bookmarks
 * 
 * @author  Maria Cervilla
 */

namespace App\Models;

class Bookmark extends DBAbstractModel
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
    private $bm_url;
    private $descripcion;
    private $idUsuario;

    public function set_id($id)
    {
        $this->id = $id;
    }
    public function set_bm_url($bm_url)
    {
        $this->bm_url = $bm_url;
    }

    public function set_descripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    public function set_idUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }

    public function get_bm_url()
    {
        return $this->bm_url;
    }

    public function get_descripcion()
    {
        return $this->descripcion;
    }

    public function get_idUsuario()
    {
        return $this->idUsuario;
    }


    public function set()
    {
        $this->query = "INSERT INTO bookmarks(bm_url, descripcion, idUsuario)
        VALUES(:bm_url, :descripcion, :idUsuario)";
        //$this->parametros['id']= $id;
        $this->parametros['bm_url'] = $this->bm_url;
        $this->parametros['descripcion'] = $this->descripcion;
        $this->parametros['idUsuario'] = $this->idUsuario;

        $this->get_results_from_query();
        //$this->execute_single_query();
        $this->mensaje = 'SH agregado correctamente';
    }

    public function getBookmarksUsuario($id = '')
    {
        $this->query = "SELECT * FROM bookmarks WHERE idUsuario = :idUsuario";
        $this->parametros['idUsuario'] = $id;
        $this->get_results_from_query();
        return $this->rows;
    }



    function delete($id = '')
    {
        $this->query = "DELETE FROM bookmarks WHERE id = :id";
        $this->parametros['id'] = $id;
        $this->get_results_from_query();
        $this->mensaje = 'SH eliminado correctamente';
    }

    function edit()
    {
        $this->query = "UPDATE bookmarks SET bm_url = :bm_url, descripcion = :descripcion WHERE id = :id";
        $this->parametros['id'] = $this->id;
        $this->parametros['bm_url'] = $this->bm_url;
        $this->parametros['descripcion'] = $this->descripcion;
        $this->get_results_from_query();
        $this->mensaje = 'SH modificado correctamente';
    }

    function getBookmarkUsuario($idUsuario = '')
    {
        $this->query = "SELECT * FROM bookmarks WHERE idUsuario = :idUsuario";
        $this->parametros['idUsuario'] = $idUsuario;
        $this->get_results_from_query();
        return $this->rows;
    }

    function get()
    {
        if ($this->id != '') {
            $this->query = "SELECT * FROM bookmarks WHERE id = :id";
            //Cargamos los parámetros.
            $this->parametros['id'] = $this->id;
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

    function getAllBookmarks()
    {
        $this->query = "SELECT * FROM bookmarks";
        $this->get_results_from_query();
        return $this->rows;
    }

    function getBookmarksMostSavedByUsers()
    {
        $this->query = "SELECT b.bm_url, b.descripcion, COUNT(DISTINCT b.idUsuario)
        FROM bookmarks b
        GROUP BY b.bm_url, b.descripcion
        HAVING COUNT(DISTINCT b.idUsuario) > 1";
        $this->get_results_from_query();
        return $this->rows;
    }
}
