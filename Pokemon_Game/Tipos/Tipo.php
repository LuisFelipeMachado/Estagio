<?php
namespace Tipos;

abstract class Tipo {
    protected string $nome;

    public function __construct(string $nome) {
        $this->nome = $nome;
    }

    public function getNome(): string {
        return $this->nome;
    }

    abstract public function getFraquezas(): array;

    abstract public function getResistencias(): array;
}
