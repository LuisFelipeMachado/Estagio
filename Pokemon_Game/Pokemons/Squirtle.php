<?php
namespace Pokemons;
class Squirtle extends Pokemon {
    public function __construct() {
        parent::__construct("Squirtle", "Agua", ["Jato d'Água", "Cascata"], ["Elétrico", "Terrestre"], ["Água", "Fogo"], 44, 48, 65, 50);
    }
}

