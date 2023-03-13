<?php
require '../vendor/autoload.php';
//use Dotenv\Dotenv;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'./../../../');
$dotenv->load();


var_dump($_ENV);
?>
