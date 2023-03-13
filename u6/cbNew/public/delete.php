<?php

/**
 * Fichero para editar equipos de la base de datos
 * 
 * @author Maria Cervilla Alcalde
 * 
 */
require '../vendor/autoload.php';

use Dotenv\Dotenv;
use App\Models\Equipo;

$dotenv = Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

include('../app/config/config.php');
include('../app/include/functions.php');

if ((!isset($_SESSION['perfil'])) || $_SESSION['perfil'] != 'admin') {
    header('Location: index.php');
}

session_start();

$id = $_GET['id'];
$equipo = Equipo::getInstancia();


if (isset($_GET['id'])) {
    $equipo->delete($_GET['id']);
    header('Location: index.php');
}


?>