<?php 
/**
 * Cierre de sesión
 */

unset($_SESSION['user']);
unset($_SESSION['pass']);
$_SESSION['perfil']= 'invitado';
$_SESSION['login'] = false;
header('Location: /');
session_destroy();

?>