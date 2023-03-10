<?php 
/**
 * Script que, a partir del radio almacenado en una variable y la definición de la constante PI, calcule el
 *   área del círculo y la longitud de la circunferencia. El debe mostrar valor de radio, longitud de la
*  circunferencia, área del círculo y dibujará un círculo utilizando gráficos vectoriales.
 * @author María Cervilla Alcalde
 */
    define("PI", pi());
    $radio = 10;

    echo "Área del círculo: ";
    echo pi()*(pow($radio,2))."<br/>";
    echo "Longitud de la circunferencia: ";
    echo 2*pi()*$radio."<br/>";
    echo "<CIRCLE r=$radio/>";

?>