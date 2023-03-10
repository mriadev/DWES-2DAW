<?php 
/**
 * Clase contador
 */

class Contador {
    static $contadores = 0;
    private $valor;

    public function __construct() {
        self::$contadores++;
        $this->valor = 0;
    }


    public function incremento(){
        $this->valor++;
    }

    public function mostrar(){
        return $this->valor;
    }

}
