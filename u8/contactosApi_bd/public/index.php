<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\AuthController;
use App\Core\Router;
use App\Controllers\ContactosController;
use App\Core\Bootstrap;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

Bootstrap::init();


$router = new Router();
$request = $_SERVER['REQUEST_URI'];

if ($request == "/login") {
    $authController = AuthController::getInstancia()->loginToken();
    echo $authController;
}

$router->add(array(
    'name' => 'home',
    'path' => '/^\/contactos$/',
    'action' => [ContactosController::class, 'apiAction'],
));


$jwt = $_SERVER['HTTP_AUTHORIZATION'];



if ($jwt) {
    try {
        $jwt = explode(" ", $jwt)[1];
        $key = "example_key";
        //comprobamos que el token es correcto
        $decoded = JWT::decode($jwt, new Key($key,'HS256'));
        echo json_encode(array(
            "message" => "Access granted.",
            "data" => $decoded
        ));
    } catch (Exception $e) {
        echo json_encode(array(
            "message" => "Access denied.",
            "error" => $e->getMessage()
        ));
        exit(http_response_code(401));
    }
} else {
    if ($request == "/login") {
        exit();
    }
    echo json_encode(array(
        "message" => "Access denied.",
        "error" => "No token provided"
    ));
    exit(http_response_code(401));
}


$route = $router->match($request);

if ($route) {
    $controllerName = $route['action'][0];
    $actionName = $route['action'][1];
    $controller = new $controllerName;
    $controller->$actionName($request);
} else {
    echo "No route";
}
