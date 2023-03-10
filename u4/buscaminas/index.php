<?php

/**
 * @author María Cer
 */

include('config/config.php');
include('lib/function.php');

session_start();



$_SESSION['casillasTotales'] = N_FILAS*N_COLUMNAS-N_MINAS;
$tableroJuego = array(); 


if (!isset($_SESSION['tableroJuego'])) {
    //Iniciar tableroJuego a 0
    for ($i=0; $i < N_FILAS; $i++) { 
        for ($j=0; $j < N_COLUMNAS; $j++) { 
            $tableroJuego[$i][$j] = 0;
        }
    }
    $_SESSION['tableroJuego']= $tableroJuego;
    
}

if (!isset($_SESSION['tablero'])) {
    $_SESSION['tablero']= crearTablero(N_FILAS,N_COLUMNAS,N_MINAS);
    $_SESSION['contador'] = 0;
}

if (isset($_GET['f'])) {
    $f= $_GET['f'];
    $c = $_GET['c'];
    $_SESSION['contador']++;
    
    clickar($f,$c);
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscaminas</title>
</head>
<body>
    <?php
    mostrarTablero($_SESSION['tablero']);
    echo "<br/>";
    mostrarVisible();

    echo "<a href='cierreSession.php'>Restart</a>"
    ?>
</body>
</html>

