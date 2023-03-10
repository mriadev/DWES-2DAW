<?php 
/**
 * 8. A veces es necesario conocer exactamente el contenido de una variable. Piensa como puedes hacer
*esto y escribe un script con la siguiente salida:
* string(5) “Harry”
* Harry
* int(28)
* NULL
 * @author María Cervilla Alcalde
 */

 $var1 = "Harry";
 $var2 = 28;
 $var3 = null;


 echo var_dump($var1)."</br>";
 echo ($var1)."</br>";
 echo var_dump($var2)."</br>";
 echo var_dump($var3);
    
?>