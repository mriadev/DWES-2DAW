<?php 
/**
 * 
 */

    require_once 'Contador.php';

    echo "Creamos el contador1.<br/>";
    $contador1 = new Contador();
    
    for ($i=0; $i < 10; $i++) { 
        echo "Incremento del contador1.<br/>";
        $contador1 ->incremento();
    }
    echo "Valor contador1: ".$contador1 ->mostrar()."<br/><br/>";

    echo "Creamos el contador2.<br/>";
    $contador2 = new Contador();
    echo "Incremento del contador2.<br/>";
    $contador2 ->incremento();
    echo "Incremento del contador2.<br/>";
    $contador2 ->incremento();
    echo "Valor contador2: ".$contador2 ->mostrar()."<br/><br/>";



   
    echo "Creamos el contador3.<br/>";
    $contador3 = new Contador();
    echo "Valor contador3: ".$contador3 ->mostrar()."<br/><br/>";


    echo "Número total de contadores: ".Contador::$contadores;
?>