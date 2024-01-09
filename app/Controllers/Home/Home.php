<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use app\Models\Home\Home as ModelHome;



class Home
{

    private $modelo;

    public function __construct($controlador)
    {
        $nombre_modelo = '../app/Models/' . $controlador . DIRECTORY_SEPARATOR . $controlador . '.php';
        if (file_exists($nombre_modelo)) {
            require_once $nombre_modelo;
            $this->modelo = new ModelHome();
        }
    }

    public function inicio($params)
    {
        $idAleatoria = rand(1, 1291);
        $imagenAnimacion = $this->modelo->getImage($idAleatoria);
        $nombreimagen = $this->modelo->getNombre($idAleatoria);
        $idAleatoria = rand(1, 1291);
        $imagenAnimacion2 = $this->modelo->getImage($idAleatoria);
        $nombreimagen2 = $this->modelo->getNombre($idAleatoria);

        switch ($params[0]) {
            case '1':
                $vistaInicio = '../app/Views/home/index.php';
                if (file_exists($vistaInicio)) {
                    require_once $vistaInicio;
                }
                break;
            case '2':
                $vistaLogin = '../app/Views/user/login.php';
                if (file_exists($vistaLogin)) {
                    require_once $vistaLogin;
                }
                # Login
                break;
            case '3':
                $vistaRegistro = '../app/Views/user/register.php';
                if (file_exists($vistaRegistro)) {
                    require_once $vistaRegistro;
                }
                break;
            case '4':
                # unlogger...
                break;
            default:
                # code...
                break;
        }
    }

    public function guardarEntrenador()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : '';
                $alias = isset($_POST['alias']) ? trim($_POST['alias']) : '';
    
                if (!empty($nombre) && !empty($alias)) {
                    if ($this->modelo->guardarDatosEntrenador($nombre, $alias)) {
                        
                        header('Location: ./index.php?path=home/inicio/2&success=1');
                        exit();
                    } else {
                        throw new Exception('Error al guardar los datos');
                    }
                } else {
                    header('Location: ./index.php?path=home/inicio/3');
                    /*Mostrar un mensaje de que los datos estaban vacíos*/
                    throw new Exception('Los datos están vacíos.');
                }
            } else {
                throw new Exception('Error al procesar la solicitud');
            }
        } catch (Exception $e) {
            
            error_log( 'Error: ' . $e->getMessage());
        }
    }

    public function comprobarEntrenador(){
        try {
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : '';
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
