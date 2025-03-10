<?php
namespace Movimentos;

use Pokemons\Pokemon;

class AtaqueEspecial extends Movimento
{
    public function calcularDano(Pokemon $atacante, Pokemon $defensor): float
    {
        $atk = $atacante->getAtaqueEspecial();
        $def = $defensor->getDefesa();
        $multiplicador = 1.0;

        if ($this->atributo === $atacante->getTipo()) {
            $multiplicador *= 1.5;
        }

        if (in_array($this->atributo, $defensor->getFraquezas())) {
            $multiplicador *= 2;
        } elseif (in_array($this->atributo, $defensor->getResistencias())) {
            $multiplicador *= 0.5;
        }

        return (50 * 0.4 + 2 * $this->poder * ($atk / $def)) * $multiplicador;
    }
}

