<?php
/**
 * Cierrer de sesión siempre que creamos una sesión
 */

 session_start();
 unset($_SESSION);
 session_destroy();
 header('Location:inde.php');

?>