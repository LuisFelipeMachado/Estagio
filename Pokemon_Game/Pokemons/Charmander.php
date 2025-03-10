<?php
namespace Pokemons;
class Charmander extends Pokemon {
    public function __construct() {
        parent::__construct("Charmander", "fogo", ["Lança-Chamas", "Chama Final"], ["Agua", "Terrestre"], ["Fogo", "Gelo"], 39, 52, 43, 60);
    }
}

