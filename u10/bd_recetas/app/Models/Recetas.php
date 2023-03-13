<?php

namespace App\Models;

use App\Models\DBAbstractModel;

class Recetas extends DBAbstractModel
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
    private $titulo;
    private $ingredientes;
    private $elaboracion;
    private $etiquetas;
    private $publica;
    private $imagen;
    private $idColaborador;

    public function setId($id)
    {
        $this->id = $id;
    }
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }
    public function setIngredientes($ingredientes)
    {
        $this->ingredientes = $ingredientes;
    }
    public function setElaboracion($elaboracion)
    {
        $this->elaboracion = $elaboracion;
    }
    public function setEtiquetas($etiquetas)
    {
        $this->etiquetas = $etiquetas;
    }
    public function setPublica($publica)
    {
        $this->publica = $publica;
    }
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;
    }
    public function setIdColaborador($idColaborador)
    {
        $this->idColaborador = $idColaborador;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getTitulo()
    {
        return $this->titulo;
    }
    public function getIngredientes()
    {
        return $this->ingredientes;
    }
    public function getElaboracion()
    {
        return $this->elaboracion;
    }
    public function getEtiquetas()
    {
        return $this->etiquetas;
    }
    public function getPublica()
    {
        return $this->publica;
    }
    public function getImagen()
    {
        return $this->imagen;
    }
    public function getIdColaborador()
    {
        return $this->idColaborador;
    }


    public function get($id = '')
    {
        if ($id != '') {
            $this->query = "
            SELECT * FROM recetas
            WHERE id = '$id'
            ";
            $this->get_results_from_query();
        }
        if (count($this->rows) == 1) {
            foreach ($this->rows[0] as $propiedad => $valor) {
                $this->$propiedad = $valor;
            }
            $this->mensaje = 'Receta encontrada';
        } else {
            $this->mensaje = 'Receta no encontrada';
        }
        return $this->rows;
    }


    public function set($user_data = array())
    {
        if (array_key_exists('id', $user_data)) {
            $this->get($user_data['id']);
            if ($user_data['id'] != $this->id) {
                foreach ($user_data as $campo => $valor) {
                    $$campo = $valor;
                }
                $this->query = "
                INSERT INTO recetas
                (id, titulo, ingredientes, elaboracion, etiquetas, publica, imagen, idColaborador)
                VALUES
                ('$id', '$titulo', '$ingredientes', '$elaboracion', '$etiquetas', '$publica', '$imagen', '$idColaborador')
                ";
                $this->execute_single_query();
               echo $this->mensaje = 'Receta agregada exitosamente';
                return true;
            } else {
                echo $this->mensaje = 'La receta ya existe';
                return false;
            }
        } else {
            echo $this->mensaje = 'No se ha agregado la receta';
            return false;
        }

    }

    public function setReceta()
    {

        $this->query = "
        INSERT INTO recetas
        (titulo, ingredientes, elaboracion, etiquetas, publica, imagen, idColaborador)
        VALUES
        ('$this->titulo', '$this->ingredientes', '$this->elaboracion', '$this->etiquetas', '$this->publica', '$this->imagen', '$this->idColaborador')
        ";
        $this->execute_single_query();
        $this->mensaje = 'Receta agregada exitosamente';
    }

    public function edit($user_data = array())
    {
        foreach ($user_data as $campo => $valor) {
            $$campo = $valor;
        }
        $this->query = "UPDATE recetas SET titulo = '$titulo',ingredientes = '$ingredientes', elaboracion = '$elaboracion', etiquetas = '$etiquetas', publica = '$publica', imagen = '$imagen', idColaborador = '$idColaborador' WHERE id = '$id'";
        $this->execute_single_query();
        $this->mensaje = 'Receta modificada';
    }


    public function delete($id = '')
    {
        $this->query = "
        DELETE FROM recetas
        WHERE id = '$id'
        ";
        $this->execute_single_query();
        $this->mensaje = 'Receta eliminada';
    }


    public function getAll()
    {
        $this->query = "SELECT * FROM recetas WHERE publica LIKE 1";
        $this->get_results_from_query();
        return $this->rows;
    }


    public function search()
    {
        $this->query = "SELECT * FROM recetas WHERE titulo LIKE :titulo";
        $this->parametros['titulo'] = "%" . $this->titulo . "%";
        $this->get_results_from_query();
        return $this->rows;
    }

    //poner no publicas las reectas de un colaborador
   public function setNoPublicas($idColaborador)
   {
       $this->query = "UPDATE recetas SET publica = 0 WHERE idColaborador = '$idColaborador'";
       $this->execute_single_query();
       $this->mensaje = 'Recetas no publicadas';
   }

    //poner publicas las reectas de un colaborador
    public function setPublicas($idColaborador)
    {
        $this->query = "UPDATE recetas SET publica = 1 WHERE idColaborador = '$idColaborador'";
        $this->execute_single_query();
        $this->mensaje = 'Recetas publicadas';
    }

    //recetas favoritas de un usuario en concreto
    public function getFavoritas($idUsuario)
    {
        $this->query = "SELECT * FROM recetas WHERE id IN (SELECT recetas_id FROM r_usuarios_recetas_favoritas WHERE usuarios_id = '$idUsuario')";
        $this->get_results_from_query();
        return $this->rows;
    }

    //añadir receta a favoritos
    public function addFavorita($idUsuario, $idReceta)
    {
   
        $this->query = "INSERT INTO r_usuarios_recetas_favoritas (usuarios_id, recetas_id) VALUES ('$idUsuario', '$idReceta')";
        $this->execute_single_query();
        $this->mensaje = 'Receta añadida a favoritos';
        //devolver mensaje de error si ya existe



    }
}
