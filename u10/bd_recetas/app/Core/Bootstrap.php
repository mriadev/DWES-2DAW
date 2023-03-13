<?php

namespace App\Core;

use Dotenv\Dotenv;
use App\Models\Config;

/**
 * Clase encargada de recuperar las variables de entorno y parametrizar el
 * acceso a base de datos. Consulta la documentación para la implementación
 */

class Bootstrap
{

    public static function init()
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../..');
        $dotenv->load();

        define('DB_HOST', $_ENV['DB_HOST']);
        define('DB_USER', $_ENV['DB_USER']);
        define('DB_PASSWD', $_ENV['DB_PASSWD']);
        define('DB_NAME', $_ENV['DB_NAME']);
        define('DB_PORT', $_ENV['DB_PORT']);
    }

    //cargar tiempo de inactividad de la base de datos de la tabla config
    public static function loadConfig()
    {
        $tiempoInactividad = Config::getInstancia();
        $_SESSION['tiempoInactividad'] = $tiempoInactividad->getInactividad()[0];

    }
}
