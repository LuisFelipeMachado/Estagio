<?php
namespace Tipos;
class TipoFogo extends Tipo {
    public function __construct() {
        parent::__construct("Fogo");
    }

    public function getFraquezas(): array {
        return ["Água", "Terrestre"];
    }

    public function getResistencias(): array {
        return ["Fogo", "Planta", "Gelo"];
    }
}