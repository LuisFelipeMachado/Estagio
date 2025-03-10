<?php
namespace Tipos;
class TipoEletrico extends Tipo {
    public function __construct() {
        parent::__construct("Elétrico");
    }

    public function getFraquezas(): array {
        return ["Terrestre"];
    }

    public function getResistencias(): array {
        return ["Elétrico", "Voador"];
    }
}