<?php 
/**
 * Cierre de sesión
 */

session_start();
unset($_SESSION);
session_destroy();
header('Location: index.php');


?>