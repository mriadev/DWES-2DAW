<?php 
/**
 * 7. Escribir un script que declare una variable y muestre la siguiente información en pantalla:
* Valor actual 8.
* Suma 2. Valor ahora 10.
* Resta 4. Valor ahora 6.
* Multipica por 5. Valor ahora 30.
* Divide por 3. Valor ahora 10.
* Incrementa el valor en 1. Valor ahora 11.
* Decrementa el valor en 1. Valor ahora 11.
 * @author María Cervilla Alcalde
 */

    $value = 8;
    echo "Valor actual $value </br>";
    echo "Suma 2. Valor ahora ".$value+=2,"</br>";
    echo "Resta 4. Valor ahora ".$value-=4,"</br>";
    echo "Multipica por 5. Valor ahora ".$value*=5,"</br>";
    echo "Divide por 3. Valor ahora ".$value/=3,"</br>";
    echo "Incrementa el valor en 1. Valor ahora ".++$value,"</br>";
    echo "Decrementa el valor en 1. Valor ahora ".$value--;
?>