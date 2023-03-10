<?php 
/**
 * 4. Modifica la página inicial realizada, incluyendo una imagen de cabecera en función de la estación del
 * año en la que nos encontremos y un color de fondo en función de la hora del día.
 * @author María Cervilla Alcalde
 */

$actualDate =  new DateTime();

switch ($actualDate->format("%m")) {
    case '09':
        echo "<header background-img=image/hoja.jpeg></header>";
        break;
    
    default:
        # code...
        break;
}



 ?>
