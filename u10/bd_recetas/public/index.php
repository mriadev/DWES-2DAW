<?php

require_once __DIR__ . '/../vendor/autoload.php';

session_start();

use App\Core\Router;
use App\Controllers\IndexController;
use App\Controllers\RecetasController;
use App\Core\Bootstrap;

Bootstrap::init();
Bootstrap::loadConfig();


//si el tiempo de sesión ha expirado, se destruye la sesión
if(isset($_SESSION['tiempo']) ) {
    $inactivo = time() - $_SESSION['tiempo'];
    if($inactivo >= $_SESSION['tiempoInactividad']) {
        session_destroy();
        header("Location: /");
    }
}

if (!isset($_SESSION['perfil'])) {
    $_SESSION['perfil'] = 'invitado';
    $_SESSION['login'] = false;
    $_SESSION['mostrarRecetas'] = true;
}

$router = new Router();
$request = $_SERVER['REQUEST_URI'];

$router->add(array(
    'name' => 'home',
    'path' => '/^\/$/',
    'action' => [IndexController::class, 'indexAction'],
    'perfiles'=> ['invitado','User','Admin','Collaborator']
));
$router->add(array(
    'name' => 'search',
    'path' => '/^\/search\?buscar=[A-z]*$/',
    'action' => [RecetasController::class, 'SearchAction'],
    'perfiles'=> ['invitado','User','Admin','Collaborator']
));

$router->add(array(
    'name' => 'recetas',
    'path' => '/^\/add$/',
    'action' => [RecetasController::class, 'AddRecetaAction'],
    'perfiles'=> ['Collaborator']
));

$router->add(array(
    'name' => 'recetas',
    'path' => '/^\/edit\/\d{1,3}$/',
    'action' => [RecetasController::class, 'editRecetaAction'],
    'perfiles'=> ['Collaborator']
));
$router->add(array(
    'name' => 'recetas',
    'path' => '/^\/delete\/\d{1,3}$/',
    'action' => [RecetasController::class, 'deleteRecetaAction'],
    'perfiles'=> ['Collaborator']
));

$router->add(array(
    'name' => 'recetas',
    'path' => '/^\/addFav\/\d{1,3}$/',
    'action' => [RecetasController::class, 'addFavRecetaAction'],
    'perfiles'=> ['User']
));

$request = $_SERVER['REQUEST_URI'];
$route = $router->match($request);


if ($route) {
    //solo se hace si el perfil de la sesión coincide con el de la ruta
    if (in_array($_SESSION['perfil'], $route['perfiles'])) {
        $controllerName = $route['action'][0];
        $actionName = $route['action'][1];
        $controller = new $controllerName;
        $controller->$actionName($request);
    } else {
        echo "No tienes permisos para acceder a esta ruta";
    }

} else {
    echo "No route";
}

?>