<?php

/**
 * Fichero de funciones
 * 
 * @author María Cervilla Alcalde
 */


function crearTablero($numFilas, $numColumnas, $numMinas)
{
    $tablero = array();

    //Iniciar tablero a 0
    for ($i = 0; $i < $numFilas; $i++) {
        for ($j = 0; $j < $numColumnas; $j++) {
            $tablero[$i][$j] = 0;
        }
    }

    //Generar minas

    for ($mina = 0; $mina < $numMinas; $mina++) {

        do {
            $f = rand(0, $numFilas - 1);
            $c = rand(0, $numColumnas - 1);
        } while ($tablero[$f][$c] == 9);
        $tablero[$f][$c] = 9;



        for ($i = max(0, $f - 1); $i <= min($f + 1, $numFilas - 1); $i++) {
            for ($j = max(0, $c - 1); $j <= min($c + 1, $numColumnas - 1); $j++) {
                if (($f != $i or $c != $j) and $tablero[$i][$j] != 9) {
                    $tablero[$i][$j]++;
                }
            }
        }
    }

    return $tablero;
};

function mostrarVisible()
{
    foreach ($_SESSION['tableroJuego'] as $key => $value) {
        foreach ($value as $key2 => $value2) {
            if ($_SESSION['tableroJuego'][$key][$key2] == 0) {
                echo "<a href='index.php?f=$key&c=$key2'>$value2</a>";
            } else {
                if ($_SESSION['tablero'][$key][$key2] == 0) {
                    echo '*';
                } else {
                    echo $_SESSION['tablero'][$key][$key2];
                }
            }
        }
        echo "<br/>";
    }
};

function mostrarTablero($tablero)
{

    foreach ($tablero as $key => $value) {
        foreach ($value as $key2 => $value2) {
            echo "$value2";
        }
        echo "<br/>";
    }
};


function clickar($fila, $columna)
{
    $_SESSION['tableroJuego'][$fila][$columna] = 1;
    

    if ($_SESSION['tablero'][$fila][$columna] == 9) {
        return 0;
    }/* elseif ($_SESSION['casillasTotales'] == $_SESSION['contador']) {
      return 1; */

    if ($_SESSION['tablero'][$fila][$columna] == 0) {
        for ($f = max(0, $fila - 1); $f <= min($fila + 1, N_FILAS - 1); $f++) {
            for ($c = max(0, $columna - 1); $c <= min($columna + 1, N_COLUMNAS - 1); $c++) {
                if ($_SESSION['tableroJuego'][$f][$c] == 0) { //Si no está pulsada
                    clickar($f, $c);
                }
            }
        }
    }
}
