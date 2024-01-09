<?php

use app\Core;
/**
 * Ruta del directorio raíz de la aplicación.
 * @var string ROOT_PATH
 */
define('ROOT_PATH', dirname(__DIR__));
//Rutas a errores
/**
 * Ruta del directorio de errores de la aplicación.
 * @var string ERRORS_PATH
 */
define('ERRORS_PATH', ROOT_PATH . '/app/Views/errors/');

/**
 * Ruta completa al archivo de error 500.
 * @var string ERROR_500
 */
define('ERROR_500', ERRORS_PATH . 'error500.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

spl_autoload_register(function ($clase) {
    $clase = str_replace('\\', DIRECTORY_SEPARATOR, $clase) . '.php';
    $rutaCompleta = dirname(__DIR__) . DIRECTORY_SEPARATOR . $clase;


    if (file_exists($rutaCompleta)) {
        require_once $rutaCompleta;
    } else {
        echo "No se pudo cargar el archivo $rutaCompleta";
    }
});

$core = new Core;
