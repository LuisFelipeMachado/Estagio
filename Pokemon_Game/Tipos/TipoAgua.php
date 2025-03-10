<?php
namespace Tipos;
class TipoAgua extends Tipo {
    public function __construct() {
        parent::__construct("Água");
    }

    public function getFraquezas(): array {
        return ["Elétrico", "Terrestre"];
    }

    public function getResistencias(): array {
        return ["Fogo", "Água", "Gelo"];
    }
}