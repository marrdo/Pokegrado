<?php

namespace app\Models\Home;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use config\db\dbConnection;
use Exception;
use PDO;


class Home
{

    private $dbh;

    public function __construct()
    {
        $database = new dbConnection;
        $this->dbh = $database->getDbh();
    }

    public function getImage($idAleatoria)
    {
        $query = 'SELECT sprite_url from Pokemons where id = :id';
        $stmt = $this->dbh->prepare($query);
        $stmt->bindValue(':id', $idAleatoria);

        if (!$stmt->execute()) {

            throw new Exception('Error al extraer la imagen: ' . implode(" ", $stmt->errorInfo()));
        }

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return ($result !== false) ? $result['sprite_url'] : 'No hay pokemon';
    }
    public function getNombre($idAleatoria)
    {
        $query = 'SELECT nombre from Pokemons where id = :id';
        $stmt = $this->dbh->prepare($query);
        $stmt->bindValue(':id', $idAleatoria);

        if (!$stmt->execute()) {

            throw new Exception('Error al extraer el nombre: ' . implode(" ", $stmt->errorInfo()));
        }

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return ($result !== false) ? $result['nombre'] : 'No hay pokemon';
    }

    public function guardarDatosEntrenador($nombre, $alias)
    {
        try {
            $aliasHasheado = password_hash(
                base64_encode(
                    hash('sha256', $alias, true)
                ),
                PASSWORD_DEFAULT
            );
            //Para comprobar este hasheo usamos
            //if (password_verify(
            //     base64_encode(
            //      hash('sha256', $login_pass, true)
            //         ),
            //     $row["alias"]
            // )) {

            //   echo 'es igual';
            // }
            // else
            // {
            //   echo 'no es igual';
            // }

            $query = 'INSERT INTO Entrenadores (nombre, alias) VALUES (:nombre, :alias)';
            $stmt = $this->dbh->prepare($query);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':alias', $aliasHasheado);

            if (!$stmt->execute()) {
                error_log('Error al guardar datos del entrenador: ' . implode(" ", $stmt->errorInfo()));
                return false;
            }

            return true;
        } catch (Exception $e) {
            error_log('Error al guardar datos del entrenador: ' . $e->getMessage());
            return false;
        }
    }

    
}
