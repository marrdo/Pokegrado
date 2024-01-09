<?php

namespace app;

/**
 * @author @marrdo
 * Clase Core
 *
 * Esta clase representa el núcleo de la aplicación y maneja la lógica principal,
 * como la implementación del patrón MVC y la manipulación de solicitudes.
 *
 * @package app
 */
class Core
{
    /** @var string $controller El nombre del controlador. */
    private $controller;

    /** @var string $method El nombre del método del controlador. */
    private $method;

    /** @var array $params Los parámetros de la solicitud. */
    private $params;

    /**
     * Constructor de la clase Core.
     *
     * Inicia el proceso de ejecución de la aplicación.
     */
    public function __construct()
    {
        $this->run();
    }

    /**
     * Ejecuta la lógica principal de la aplicación.
     *
     * Obtiene la URL, determina el controlador y el método, y carga el controlador
     * correspondiente para ejecutar el método con los parámetros proporcionados.
     */
    public function run()
    {
        // Obtener la URL
        $url = isset($_GET['path']) ? $_GET['path'] : 'home/inicio';

        // Dividir la URL en partes
        $urlParts = explode('/', filter_var($url, FILTER_SANITIZE_URL));

        // Determinar el controlador y el método
        $controller = ucfirst($urlParts[0]) ? ucfirst($urlParts[0]) : 'home';
        $method = isset($urlParts[1]) ? $urlParts[1] : 'inicio';
        $params = array_slice($urlParts, 2);

        // Cargar el controlador y ejecutar el método
        $this->loadController($controller, $method, $params);
    }

    /**
     * Carga el controlador y ejecuta el método con los parámetros proporcionados.
     *
     * @param string $controller El nombre del controlador.
     * @param string $method El nombre del método del controlador.
     * @param array $params Los parámetros de la solicitud.
     */
    private function loadController($controller, $method, $params)
    {
        $controllerPath = '../app/Controllers/' . $controller . DIRECTORY_SEPARATOR . $controller . '.php';

        if (file_exists($controllerPath)) {
            include_once($controllerPath);

            $controllerInstance = new $controller($controller);

            if (method_exists($controllerInstance, $method)) {
                $controllerInstance->{$method}($params);
            } else {
                $this->showErrorPage("El método {$method} no existe en el controlador {$controller}");
            }
        } else {
            $this->showErrorPage("El archivo del controlador {$controller} no existe");
        }
    }

    /**
     * Muestra una página de error con el mensaje proporcionado.
     *
     * @param string $message El mensaje de error.
     */
    private function showErrorPage($message)
    {
        header('HTTP/1.0 404 Not Found');
        echo $message;
    }
}
