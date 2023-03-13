<?php
require_once('../app/Config/parametros.php');
require_once('../vendor/autoload.php');


use App\Models\Superheroe;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

define('DB_HOST', $_ENV['DB_HOST']);
define('DB_USER', $_ENV['DB_USER']);
define('DB_PASSWD', $_ENV['DB_PASSWD']);
define('DB_NAME', $_ENV['DB_NAME']);
define('DB_PORT', $_ENV['DB_PORT']);



$superheroes = Superheroe::getInstancia();

//listar superheroe


//añadir superheroe
/*  $superheroes->set_nombre('Antman');
$superheroes->set_velocidad(150);
$superheroes->set(); */ 

//modificar superheroe

$superheroes->set_id(3);

var_dump($superheroes->get()); 

$superheroes->set_id(1);

var_dump($superheroes->get());


use App\Controllers\IndexController;
use App\Core\Router;

$router = new Router();

$router->add(array(
    'name' => 'home',
    'path' => '/^\/$/',
    'action' => [IndexController::class, 'IndexAction']
));


//$superheroes->edit($superheroemodificado);

//borrar batman
//$superheroes->delete('2'); 


?>


