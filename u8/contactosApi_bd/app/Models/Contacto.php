<?php
namespace App\Models;

class Contacto extends DBAbstractModel {

public function get() {
    $this->query = "SELECT * FROM contactos";
    $this->get_results_from_query();
    return $this->rows;

}

public function set($data_contactos= array())
{
    foreach ($data_contactos as $campo=>$valor) {
        $$campo = $valor;
    }
    $this->query = "INSERT INTO contactos (nombre,telefono) VALUES (:nombre,:telefono)";

    $this->parametros['nombre'] = $nombre;
    $this->parametros['telefono'] = $telefono;
    $this->get_results_from_query();
     
}

public function edit($data_contactos= array())
{
    foreach ($data_contactos as $campo=>$valor) {
        $$campo = $valor;
    }
    $this->query = "UPDATE contactos SET nombre=:nombre, telefono=:telefono WHERE id=:id";
    
    $this->parametros['nombre'] = $nombre;
    $this->parametros['telefono'] = $telefono;
    $this->parametros['id'] = $id;
    //fecha actual
    $this->parametros['updated_at'] = date("Y-m-d H:i:s");
    $this->get_results_from_query();
   
}

public function delete($data_contactos= array())
{
    foreach ($data_contactos as $campo=>$valor) {
        $$campo = $valor;
    }
    $this->query = "DELETE FROM contactos WHERE id=:id";
    $this->parametros['id'] = $id;
    $this->get_results_from_query();

}

}

?>