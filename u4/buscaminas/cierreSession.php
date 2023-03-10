<?php 
/**
 * Cierre de sesión
 */

session_start();

unset($_SESSION['tablero']);

session_destroy();

header('Location: index.php');


?>