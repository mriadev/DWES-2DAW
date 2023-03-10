<?php
/**
 * @author María Cervilla Alcalde
 */
namespace App\Models;
class Perro
{
    private $_color;
    private $_nombre;
    private $_habilidad;
    private $_sociabilidad;

    public function __construct($nombre, $color) {
        $this->_nombre = $nombre;
        $this->_color = $color;
        $this->_habilidad = 0;
        $this->_sociabilidad = 5;
    }

    public function entrenar()
    {
        echo "<br/>Dar la patada<br/>";
        if ($this->_habilidad <= 100) {
            $this->_habilidad++;   
        }
    }
    public function darPata()
    {
        $retorno = "<br/>¿Como?<br/>";
        if ($this->_habilidad > 5) {
            $retorno = "Levanta la pata";
        }
        return $retorno;
    }

}

?>