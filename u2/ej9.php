<?php 
/**
 * 9. Escribir un script que utilizando variables permita obtener el siguiente resultado:
    *Valor es string.
    *Valor es double.
    *Valor es boolean.
    *Valor es integer.
    *Valor is NULL.
 * @author María Cervilla Alcalde
 */

    $string = "string";
    $double = 12.54;
    $boolean = true;
    $integer = 5;
    $null = NULL;

    echo "Valor es ".gettype($string),"</br>";
    echo "Valor es ".gettype($double),"</br>";
    echo "Valor es ".gettype($boolean),"</br>";
    echo "Valor es ".gettype($integer),"</br>";
    echo "Valor es ".gettype($null),"</br>";
?>