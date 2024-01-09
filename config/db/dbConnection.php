<?php

namespace config\db;

use PDO;
use PDOException;

/**
 *@author @marrdo
 * Clase que representa una conexión a la base de datos.
 */
class dbConnection
{
    /** @var string El servidor de la base de datos. */
    private $server = 'localhost';

    /** @var string El nombre de la base de datos. */
    private $bbdd = 'PokeGrado';

    /** @var string El nombre de usuario para la conexión a la base de datos. */
    private $user = 'PokeGrado';

    /** @var string La contraseña del usuario para la conexión a la base de datos. */
    private $userPass = 'PokemonsGrado';

    /**
     * Manejador de la conexión a la base de datos.
     * @var PDO $dbh
     */
    private $dbh;

    /**
     * Constructor de la clase. 
     * Establece la conexión a la base de datos.
     */
    public function __construct()
    {
        try {
            /**Establecer conexion */
            $this->dbh = new PDO(
                "mysql:host=$this->server;dbname=$this->bbdd",
                $this->user,
                $this->userPass
            );
            /* Establecer el modo de manejo de errores a excepciones */
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            /**
             * Manejar el error de conexión a la base de datos.
             * - Registra el mensaje de error.
             * - Establece el código de estado HTTP 500.
             * - Redirige a la página de error 500 personalizada.
             * @var Exception $e
             */
            error_log('Error de conexión a la base de datos: ' . $e->getMessage());

            /**
             * Establece el código de estado HTTP 500.
             * @see http_response_code()
             */
            http_response_code(500);

            /**
             * Redirige a la página de error 500 personalizada.
             * @see header()
             * @var string ERROR_500 Ruta completa al archivo de error 500.
             */
            header("Location: " . ERROR_500);
            exit();
        }
    }

    /**
     * Obtiene el manejador de la conexión a la base de datos.
     *
     * @return PDO|null Retorna el manejador de la conexión a la base de datos o null si no está establecida.
     */
    public function getDbh()
    {
        return $this->dbh;
    }

    /**
     * Cierra el manejador de la conexión a la base de datos.
     */
    public function closeConnectDbh()
    {
        //Cierra la conexion
        $this->dbh = null;
    }
}
