<?php

/**
 * Librería de funciones
 */

 function clearData($dato){
    $dato = trim($dato);
    $dato = stripslashes($dato);
    $dato = htmlspecialchars($dato);
    return $dato;
}

?>