<?php
namespace Movimentos;

use Pokemons\Pokemon;

abstract class Movimento {
    protected string $nome;
    protected float $poder;
    protected string $tipoAtaque;
    protected string $atributo;

    public function __construct(string $nome, float $poder, string $tipoAtaque, string $atributo) {
        $this->nome = $nome;
        $this->poder = $poder;
        $this->tipoAtaque = $tipoAtaque;
        $this->atributo = $atributo;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function getPoder(): float {
        return $this->poder;
    }

    public function getTipoAtaque(): string {
        return $this->tipoAtaque;
    }

    public function getAtributo(): string {
        return $this->atributo;
    }

    abstract public function calcularDano(Pokemon $atacante, Pokemon $defensor): float;

    public function usarMovimento(Pokemon $atacante, Pokemon $defensor, bool $isEspecial = false): void {
        echo $atacante->getName() . " usa " . $this->nome . "\n";
        $danoFinal = $this->calcularDano($atacante, $defensor);
        if (in_array($this->tipoAtaque, $defensor->getFraquezas())) {
            $danoFinal *= 2;
            echo "É super eficaz!!\n";
        } elseif (in_array($this->tipoAtaque, $defensor->getResistencias())) {
            $danoFinal *= 0.5;
            echo "Não é muito eficaz!!\n";
        }
        echo "Dano causado: " . $danoFinal . "\n";
        $defensor->reduzirVida($danoFinal);
    }
}
