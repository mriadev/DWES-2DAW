<?php

require '../vendor/autoload.php';

use App\Models\Equipo;
use Dotenv\Dotenv;
use App\Models\Usuario;

$dotenv = Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

include('../app/config/config.php');

session_start();
$login = false;
$equipo = Equipo::getInstancia();
$equipos = $equipo->getAll();


if (isset($_POST['login'])) {
    $usuario = Usuario::getInstancia();
    if ($usuario->login($_POST)) {
        $_SESSION['user'] = $usuario->getUsuario();
        $_SESSION['pass'] = $usuario->getPassword();
        $_SESSION['perfil'] = $usuario->getPerfil();
    }
}

if (isset($_SESSION['user'])) {
    $login = true;
}

if (isset($_POST['send'])) {
    $equipos = $equipo->searchEquipos($_POST['search']);
}

if (isset($_GET['id'])) {
    $equipo->delete($_GET['id']);
    header('Location: index.php');
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Club Equipos Pokemon</h1>
    <?php
    if (!$login) {
        include('../app/include/login_form.html');
        echo "<h2>Lista de equipos</h2>";
        echo "<ul>";
        foreach ($equipos as $key => $value) {
            echo "<li>" . $value['equipo'] . "</li>";
        }
        echo "</ul>";
    } else {
        echo '<form action="" method="post">
        <input type="text" name="search">
        <input type="submit" name="send" value="Buscar">
        </form>
        <br />
        <form action="add.php" method="post">
            <input type="submit" name="add" value="Añadir">
        </form>';

        echo "<h2>Lista de equipos</h2>";
        echo "<ul>";
        foreach ($equipos as $key => $value) {
            echo "<li>" . $value['equipo'] . " <a href='edit.php?id=" . $value['id'] . "'>Editar</a>
            <a href='index.php?id=" . $value['id'] . "'>Borrar</a></li>";
        }
        echo "</ul>";
    }
    ?>

</body>

</html>