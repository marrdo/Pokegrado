<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../app/init.php';


if (!isset($_GET['path'])) {
    // No hay path en la URL actual, redirigimos a la ruta deseada
    header('Location: index.php?path=home/inicio/1');
    exit();
}
?>