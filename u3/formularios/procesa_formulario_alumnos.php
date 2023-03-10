<?php
/**
 * Procesar formulario alumnos
 * @author María Cervilla Alcalde
 */


 foreach ($_POST as $key => $value) {
    if ($value!="Send") {
        echo $key.": ".$value."<br/>";
    }
   
 }
?>