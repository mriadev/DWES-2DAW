<?php 
/**
 * Fichero para añadir equipos a la base de datos
 * 
 * @author Maria Cervilla Alcalde
 * 
 */

include('config/config.php');
include('lib/functions.php');

session_start();

if ((!isset($_SESSION['perfil'])) || $_SESSION['perfil']!= 'admin') {
    header('Location: index.php');
 }

if (isset($_POST['addEquipo'])) {
    $newEquipo =($_POST['newEquipo']);
    addEquipo(conectarDB(),$newEquipo);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir equipos</title>
</head>
<body>
    <h1>Club equipos Pokemon</h1>
    <h2>Añadir equipos</h2>
    <form action="" method="post">
        Equipo:<input type="text" name="newEquipo" id="">
        <input type="submit" name="addEquipo" value="Añadir">
        <a href="index.php">Cancelar</a>
    </form>
</body>
</html>