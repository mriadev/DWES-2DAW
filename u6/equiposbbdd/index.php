<?php

/**
 * @author María Cervilla Alcalde
 */

include('config/config.php');
include('lib/functions.php');

session_start();

if (!isset($_SESSION['perfil'])) {
    $_SESSION['perfil'] = 'guest';
}



$login = false;
$equipos = getAll(conectarDB());

if (isset($_POST['send'])) {
    $search = $_POST['search'];
    $equipos = getEquipo(conectarDB(), $search);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    deleteEquipo(conectarDB(),$id);
    $equipos = getAll(conectarDB());
}

if (isset($_POST['login'])) {
   
}

?>



<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipos</title>
</head>

<body>
    <h1>Club equipos Pokemon</h1>

    <?php
    if (!$login) {
        include('lib/login_form.php');
        echo "<h2>Lista equipos</h2>";
        foreach ($equipos as $key => $value) {
            echo "<li>" . $value['equipo'] ."</li>";
        }
    }else{
        ?>
        <form action="" method="post">
            <input type="text" name="search">
            <input type="submit" name="send" value="Buscar">
        </form>
        <br />
        <form action="add.php" method="post">
            <input type="submit" name="add" value="Añadir">
        </form>
        <h2>Lista equipos</h2>
    
        
        <ul>
            <?php
    
            foreach ($equipos as $key => $value) {
                echo "<li>" . $value['equipo'] . " <a href='edit.php?id=" . $value['id'] . "'>Editar</a>
                <a href='index.php?id=" . $value['id'] . "'>Borrar</a></li>";
            }
    
            ?>
    
        </ul>
        <?php
    }
    
    ?>


</body>

</html>