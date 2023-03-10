<?php 
/**
 * 1. Almacena tres números en variables y escribirlos en pantalla de manera ordenada.
 * @author María Cervilla Alcalde
 */

$num1 = 5;
$num2 = 10;
$num3 = 3;

if($num1 <= $num2 and $num1<=$num3){
    if ($num2 < $num3) {
        echo $num1," ",$num2," ",$num3;
    }else{
        echo $num1," ",$num3," ",$num2;
    }
}

if($num2 <= $num1 and $num2<=$num3){
    if ($num1<$num3) {
        echo $num2," ",$num1," ",$num3;
    }else{
        echo $num2," ",$num3," ",$num1;
    }
}

if($num3 <= $num1 and $num3<=$num2){
    if ($num1<$num3) {
        echo $num3," ",$num1," ",$num2;
    }else{
        echo $num3," ",$num2," ",$num1;
    }
}



?>
<br>
<!-- <a href="https://github.com/mriadev/dwes-ud2/blob/main/ej1.php" target="_blank">GitHub Ejercicio1</a> -->
