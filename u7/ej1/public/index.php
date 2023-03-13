<?php
require_once('../app/Config/parametros.php');
require_once('../vendor/autoload.php');

use App\Controllers\IndexController;
use App\Core\Router;

$router = new Router();
//Definición de rutas

$router->add(array(
    'name' => 'home',
    'path' => '/^\/$/',
    'action' => [IndexController::class, 'IndexAction']
));

$router->add(array(
    'name' => 'saludar',
    'path' => '/^\/saludo\/[A-z]+$/',
    'action' => [IndexController::class, 'SaludarAction']
));


$router->add(array(
    'name' => 'diez_pares',
    'path' => '/^\/numeros$/',
    'action' => [IndexController::class, 'DiezNumerosAction']
));

$router->add(array(
    'name' => 'numeros_pares',
    'path' => '/^\/numeros\/[0-9]+$/',
    'action' => [IndexController::class, 'NumerosParesAction']
));

$request = str_replace(DIRBASEURL, '', $_SERVER['REQUEST_URI']);
$route = $router->match($request);

var_dump($request);
var_dump($route);
if ($route) {
    $controllerName = $route['action'][0];
    $actionName = $route['action'][1];
    $controller = new $controllerName;
    $controller->$actionName($request);
} else {
    echo "No route";
}
