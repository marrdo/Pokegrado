<?php 

namespace app\Seeds;

/**
 * @author @marrdo
 * Clase Pokemon para representar datos de un Pokémon.
 *
 * Esta clase proporciona propiedades y métodos para almacenar y acceder a información
 * relacionada con un Pokémon, como su identificación, nombre, tipo, estadísticas, etc.
 *
 * @package app\Seeds
 */
class Pokemon{

    /** @var int La identificación única del Pokémon. */
    private $id;

    /** @var string El nombre del Pokémon. */
    private $name;

    /** @var string El tipo del Pokémon. */
    private $type;

    /** @var int La cantidad de puntos de salud (HP) del Pokémon. */
    private $hp;

    /** @var int El valor de ataque del Pokémon. */
    private $attack;

    /** @var int El valor de defensa del Pokémon. */
    private $defense;

    /** @var int El valor de ataque especial del Pokémon. */
    private $special_attack;

    /** @var int El valor de defensa especial del Pokémon. */
    private $special_defense;

    /** @var int La velocidad del Pokémon. */
    private $speed;

    /** @var string La ruta al sprite normal del Pokémon. */
    private $sprite;

    /** @var string La ruta al sprite shiny del Pokémon. */
    private $sprite_shiny;

    /**
     * Constructor de la clase Pokemon.
     *
     * @param int    $id              La identificación única del Pokémon.
     * @param string $name            El nombre del Pokémon.
     * @param string $type            El tipo del Pokémon.
     * @param int    $hp              La cantidad de puntos de salud (HP) del Pokémon.
     * @param int    $attack          El valor de ataque del Pokémon.
     * @param int    $defense         El valor de defensa del Pokémon.
     * @param int    $special_attack  El valor de ataque especial del Pokémon.
     * @param int    $special_defense El valor de defensa especial del Pokémon.
     * @param int    $speed           La velocidad del Pokémon.
     * @param string $sprite          La ruta al sprite normal del Pokémon.
     * @param string $sprite_shiny    La ruta al sprite shiny del Pokémon.
     */

    public function __construct($id, $name, $type, $hp, $attack, $defense,
    $special_attack, $special_defense, $speed, $sprite, $sprite_shiny){

        $this->id = $id;
        $this->name = $name;
        $this->type = $type;
        $this->hp = $hp;
        $this->attack = $attack;
        $this->defense = $defense;
        $this->special_attack = $special_attack;
        $this->special_defense = $special_defense;
        $this->speed = $speed;
        $this->sprite = $sprite;
        $this->sprite_shiny = $sprite_shiny;

    }

    /**
     * Obtiene la identificación única del Pokémon.
     *
     * @return int La identificación única del Pokémon.
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Obtiene el nombre del Pokémon.
     *
     * @return string El nombre del Pokémon.
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Obtiene el tipo del Pokémon.
     *
     * @return string El tipo del Pokémon.
     */
    public function getType() {
        return $this->type;
    }

    /**
     * Obtiene la cantidad de puntos de salud (HP) del Pokémon.
     *
     * @return int La cantidad de puntos de salud (HP) del Pokémon.
     */
    public function getHp() {
        return $this->hp;
    }

    /**
     * Obtiene el valor de ataque del Pokémon.
     *
     * @return int El valor de ataque del Pokémon.
     */
    public function getAttack() {
        return $this->attack;
    }

    /**
     * Obtiene el valor de defensa del Pokémon.
     *
     * @return int El valor de defensa del Pokémon.
     */
    public function getDefense() {
        return $this->defense;
    }

    /**
     * Obtiene el valor de ataque especial del Pokémon.
     *
     * @return int El valor de ataque especial del Pokémon.
     */
    public function getSpecialAttack() {
        return $this->special_attack;
    }

    /**
     * Obtiene el valor de defensa especial del Pokémon.
     *
     * @return int El valor de defensa especial del Pokémon.
     */
    public function getSpecialDefense() {
        return $this->special_defense;
    }

    /**
     * Obtiene la velocidad del Pokémon.
     *
     * @return int La velocidad del Pokémon.
     */
    public function getSpeed() {
        return $this->speed;
    }

    /**
     * Obtiene la ruta al sprite normal del Pokémon.
     *
     * @return string La ruta al sprite normal del Pokémon.
     */
    public function getSprite() {
        return $this->sprite;
    }

    /**
     * Obtiene la ruta al sprite shiny del Pokémon.
     *
     * @return string La ruta al sprite shiny del Pokémon.
     */
    public function getSpriteShiny() {
        return $this->sprite_shiny;
    }
    
}
?>