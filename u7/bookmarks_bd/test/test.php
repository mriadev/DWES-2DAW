<?php 

require_once('../app/Config/parametros.php');
require_once('../vendor/autoload.php');


use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

define('DB_HOST', $_ENV['DB_HOST']);
define('DB_USER', $_ENV['DB_USER']);
define('DB_PASSWD', $_ENV['DB_PASSWD']);
define('DB_NAME', $_ENV['DB_NAME']);
define('DB_PORT', $_ENV['DB_PORT']);



use App\Models\Superheroe;

$superheroes = Superheroe::getInstancia();
?>