<?php

use config\db\dbConnection;
use app\Seeds\Pokemon;
use app\Seeds\PokemonRepository;

/**
 * Script para recuperar datos de Pokémon desde la API y almacenarlos en la base de datos.
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

spl_autoload_register(function ($clase) {

    $clase = str_replace('\\', DIRECTORY_SEPARATOR, $clase) . '.php';

    $rutaCompleta = dirname(__DIR__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . $clase;

    if (file_exists($rutaCompleta)) {
        require_once $rutaCompleta;
    } else {
        echo "No se pudo cargar el archivo $rutaCompleta";
    }
});

/**
 * Inicializar la conexión a la base de datos.
 */
$db = new dbConnection;
$dbh = $db->getDbh();

/**
 * Inicializar la identificación del Pokémon.
 */
$id = 1138;
$idAPI = 1012;

/**
 * Recuperar datos de Pokémon desde la API y almacenarlos en la base de datos.
 */
do {
    /**
     * Realizar una solicitud a la API de Pokémon.
     */


    /**
     * Iniciar una conexión cURL a la API de Pokémon.
     */
    $api = curl_init("https://pokeapi.co/api/v2/pokemon/" . $idAPI . "/");

    /**
     * Configurar la opción para devolver el resultado de la solicitud en lugar de imprimirlo directamente.
     * Esto permite almacenar la respuesta en la variable $response.
     */
    curl_setopt($api, CURLOPT_RETURNTRANSFER, true);

    /**
     * Ejecutar la solicitud cURL y almacenar la respuesta en la variable $response.
     */
    $response = curl_exec($api);

    /**
     * Cerrar la conexión cURL después de realizar la solicitud.
     */
    curl_close($api);


    /**
     * Decodificar la respuesta JSON.
     */
    $json = json_decode($response);

    /**
     * Crear un objeto Pokémon con los datos obtenidos.
     */
    $pokemonRepository = new PokemonRepository($dbh);
    $pokemon = new Pokemon(
        $id,
        $json->name,
        $json->types[0]->type->name,
        $json->stats[0]->base_stat,
        $json->stats[1]->base_stat,
        $json->stats[2]->base_stat,
        $json->stats[3]->base_stat,
        $json->stats[4]->base_stat,
        $json->stats[5]->base_stat,
        $json->sprites->front_default,
        $json->sprites->front_shiny
    );

    /**
     * Insertar el Pokémon en la base de datos.
     */
    $pokemonRepository->insertPokemon($pokemon);

    /**
     * Imprimir la identificación del Pokémon procesado.
     */
    echo '<br> id: ' . $id . '<br>';
    echo '<br> idAPI: ' . $idAPI . '<br>';

    /**
     * Incrementar la identificación para la siguiente iteración.
     */
    $id++;
    $idAPI++;
} while ($idAPI <= 10121); // Cambiar el límite según sea necesario

/**
 * En este Script encontramos la salvedad de que para almacenar 
 * los pokemons a traves de la id, vamos a modificar a mano la id que entrara
 * en el bucle, y pasados los 1000 y algo la API cuenta los ids
 * de 1000 a 10000 y se hace recuento de ids desde 10000. Por lo tanto 
 * en un punto concreto dejaremos de usar la id de los pokemons de la 
 * API para asignar IDS en nuestras bases de datos. Tampooc puedo 
 * introducir pokemons que no tengan sprite, si no luego no los puedo 
 * mostrar en el tablero, el srpite shyni da igual, pero el normal no.
 */
