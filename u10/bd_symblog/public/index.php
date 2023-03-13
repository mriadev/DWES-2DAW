<?php 

require_once('../vendor/autoload.php');


use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

session_start();

define('DB_HOST', $_ENV['DB_HOST']);
define('DB_USER', $_ENV['DB_USER']);
define('DB_PASSWD', $_ENV['DB_PASSWD']);
define('DB_NAME', $_ENV['DB_NAME']);
define('DB_PORT', $_ENV['DB_PORT']);

require_once('../data/datosblog.php');
foreach ($blogs as $key => $value) {
    //$value->set();
}


require_once('../data/datoscomment.php');
foreach ($comments as $key => $value) {
    //$value->set();
}

use Illuminate\Database\Capsule\Manager as Capsule;


// Create a new Capsule instance
$capsule = new Capsule;
$capsule->addConnection([
    'driver' => 'mysql',
    'host' => $_ENV['DB_HOST'],
    'database' => $_ENV['DB_NAME'],
    'username' => $_ENV['DB_USER'],
    'password' => $_ENV['DB_PASSWD'],
    'port' => $_ENV['DB_PORT'],
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => '',
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();


$request = Laminas\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER,
    $_GET,
    $_POST,
    $_COOKIE,
    $_FILES
);

use Aura\Router\RouterContainer;

$routerContainer = new RouterContainer();

$map = $routerContainer->getMap();

$map->get('home', '/', [
    'controller' => 'App\Controllers\IndexController',
    'action' => 'indexAction',
]);

$map->get('about', '/about', [
    'controller' => 'App\Controllers\IndexController',
    'action' => 'aboutAction'
]);

$map->get('contact', '/contact', [
    'controller' => 'App\Controllers\IndexController',
    'action' => 'contactAction'
]);

$map->get('getBlog', '/blog\/\d{1,3}', [
    'controller' => 'App\Controllers\BlogController',
    'action' => 'getBlogAction',
]);

$map->get('registerForm', '/users/add', [
    'controller' => 'App\Controllers\AuthController',
    'action' => 'getRegisterAction'
]);
$map->post('register', '/users/save', [
    'controller' => 'App\Controllers\AuthController',
    'action' => 'postRegisterAction'
]);

$map->get('loginForm', '/auth', [
    'controller' => 'App\Controllers\AuthController',
    'action' => 'getLoginAction'
]);

$map->post('login', '/auth', [
    'controller' => 'App\Controllers\AuthController',
    'action' => 'postLoginAction'
]);

$map->get('add', '/blogs/add', [
    'controller' => 'App\Controllers\BlogController',
    'action' => 'getAddBlogAction',
    'auth' => true
]);

$map->post('addBlog', '/blogs/add', [
    'controller' => 'App\Controllers\BlogController',
    'action' => 'postAddBlogAction',
    'auth' => true
]);

$map->post('commentSave', '/comment/save', [
    'controller' => 'App\Controllers\CommentController',
    'action' => 'postCommentSaveAction',
]);

$map->get('admin', '/admin', [
    'controller' => 'App\Controllers\AdminController',
    'action' => 'getAdminAction',
    'auth' => true,
    'profile' => 'admin'
]);

$map->get('logout', '/logout', [
    'controller' => 'App\Controllers\AuthController',
    'action' => 'getLogoutAction',
    'auth' => true
]);

$matcher = $routerContainer->getMatcher();
$route = $matcher->match($request);

if (!$route) {
    echo 'No se encontró la ruta';
    exit;
}else{
    $handlerData = $route->handler;
    $controllerName = $handlerData['controller'];
    $actionName = $handlerData['action'];

    $needsAuth = $handlerData['auth'] ?? false;
    $sessionUserId = $_SESSION['userId'] ?? null;
    if ($needsAuth && !$sessionUserId) {
        header('Location: /auth');

    }
    else {
        $controller = new $controllerName;
        $response = $controller->$actionName($request);
        foreach($response->getHeaders() as $name => $values) {
            foreach($values as $value) {
              header(sprintf('%s: %s', $name, $value), false);
              }
         }

         http_response_code($response->getStatusCode());
         
         echo $response->getBody();
        }

}
