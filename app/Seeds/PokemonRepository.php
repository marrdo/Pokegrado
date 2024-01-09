<?php

namespace app\Seeds;


use PDO;
use Exception;

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
 * @author @marrdo
 * Clase PokemonRepository para gestionar las operaciones de la base de datos para los Pokémon.
 *
 * Esta clase proporciona métodos para insertar Pokémon en la base de datos.
 *
 * @package app\Seeds
 */
class PokemonRepository
{
    /** @var PDO El objeto de conexión a la base de datos. */
    private $dbh;

    /**
     * Constructor de la clase PokemonRepository.
     *
     * @param PDO $dbh El objeto de conexión a la base de datos.
     */
    public function __construct(PDO $dbh)
    {
        $this->dbh = $dbh;
    }


    /**
     * Inserta un Pokémon en la base de datos.
     *
     * @param Pokemon $pokemon El objeto Pokémon a insertar.
     *
     * @throws Exception Si hay un error al ejecutar la consulta de inserción.
     */
    public function insertPokemon(Pokemon $pokemon)
{
    try {
        $stmt = $this->dbh->prepare("
            INSERT INTO Pokemons
            (id, nombre, tipo, vida, ataque, defense, special_attack, special_defense, speed, sprite_url, sprite_shiny_url) 
            VALUES 
            (:id, :name, :type, :hp, :attack, :defense, :special_attack, :special_defense, :speed, :sprite, :sprite_shiny)
        ");

        $id = $pokemon->getId();
        $name = $pokemon->getName();
        $type = $pokemon->getType();
        $hp = $pokemon->getHp();
        $attack = $pokemon->getAttack();
        $defense = $pokemon->getDefense();
        $specialAttack = $pokemon->getSpecialAttack();
        $specialDefense = $pokemon->getSpecialDefense();
        $speed = $pokemon->getSpeed();
        $sprite = $pokemon->getSprite();
        $spriteShiny = $pokemon->getSpriteShiny();

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':hp', $hp);
        $stmt->bindParam(':attack', $attack);
        $stmt->bindParam(':defense', $defense);
        $stmt->bindParam(':special_attack', $specialAttack);
        $stmt->bindParam(':special_defense', $specialDefense);
        $stmt->bindParam(':speed', $speed);
        $stmt->bindParam(':sprite', $sprite);
        $stmt->bindParam(':sprite_shiny', $spriteShiny);

        // Intentamos ejecutar la consulta
        if (!$stmt->execute()) {
            // Si hay un error, lanzamos una excepción con el mensaje de error
            throw new Exception('Error al guardar el Pokémon: ' . implode(" ", $stmt->errorInfo()));
        }
    } catch (Exception $e) {
        
        echo 'Error: ' . $e->getMessage();
        
        error_log('Error al insertar Pokémon: ' . $e->getMessage());
    }
}
}
