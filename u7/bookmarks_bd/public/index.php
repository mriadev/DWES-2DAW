<?php
require_once('../vendor/autoload.php');
include('../app/Config/config.php');

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

define('DB_HOST', $_ENV['DB_HOST']);
define('DB_USER', $_ENV['DB_USER']);
define('DB_PASSWD', $_ENV['DB_PASSWD']);
define('DB_NAME', $_ENV['DB_NAME']);
define('DB_PORT', $_ENV['DB_PORT']);

use App\Controllers\BookmarksController;
use App\Core\Router;

session_start();

if (!isset($_SESSION['perfil'])) {
    $_SESSION['perfil'] = 'invitado';
    $_SESSION['login'] = false;
}

if (isset($_POST['logout'])) {
    include('../app/include/cierreSession.php');
}


$router = new Router();

    $router->add(array(
        'name' => 'home',
        'path' => '/^\/$/',
        'action' => [BookmarksController::class, 'LoginAction'],
        'perfiles'=> ['invitado','user','admin']
    ));

    $router->add(array(
        'name' => 'usuario',
        'path' => '/^\/loged$/',
        'action' => [BookmarksController::class, 'IndexAction'],
        'perfiles'=> ['user','admin']
    ));

    $router->add(array(
        'name' => 'usuario',
        'path' => '/^\/usuario$/',
        'action' => [BookmarksController::class, 'IndexAction'],
        'perfiles'=> ['invitado','user']
    ));
    $router->add(array(
        'name' => 'add',
        'path' => '/^\/usuario\/add$/',
        'action' => [BookmarksController::class, 'AddAction'],
        'perfiles'=> ['user','admin']
    ));
    $router->add(array(
        'name' => 'edit',
        'path' => '/^\/usuario\/edit\/\d{1,3}$/',
        'action' => [BookmarksController::class, 'EditAction'],
        'perfiles'=> ['user','admin']
    ));
    $router->add(array(
        'name' => 'delete',
        'path' => '/^\/usuario\/delete\/\d{1,3}$/',
        'action' => [BookmarksController::class, 'DeleteAction'],
        'perfiles'=> ['user','admin']
    ));
    $router->add(array(
        'name' => 'gestion',
        'path' => '/^\/admin$/',
        'action' => [BookmarksController::class, 'AdminAction'],
        'perfiles'=> ['admin']
    ));

$request = $_SERVER['REQUEST_URI'];
$route = $router->match($request);

if ($route) {
    if (in_array($_SESSION['perfil'], $route['perfiles'],)) {
        $controllerName = $route['action'][0];
        $actionName = $route['action'][1];
        $controller = new $controllerName;
        $controller->$actionName($request);
    }else{
        echo "No tiene permisos para acceder a esta ruta";
    }
} else {
    echo "No route";
} 


?>


