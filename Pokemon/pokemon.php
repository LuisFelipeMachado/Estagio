<?php 
require 'movimentos.php';
require 'tipos.php';

abstract class pokemon {
    protected string $name;
    protected string $tipo;
    protected string $movimentos;
    protected string $fraquezas;
    protected string $resistencia;
    protected float $hpbase;
    protected string $health;
    protected string $ataque;
    protected string $defesa;
    protected string $ataqueEspecial;

    private function __construct($name, $tipo, $movimento,
    $hpbase, $health, $ataque, $defesa, $ataqueEspecial){
        $this->nome = $nome;
        $this->tipo = $tipo;
        $this->movimentos = $movimento;
        $this->fraquezas = $fraquezas;
        $this->resistencia = $resistencia;
        $this->hpbase = $hpbase;
        $this->health = $this->calcularHealth();
        $this->ataque = $this->calcularEstatistica();
        $this->defesa = $this->calcularEstatistica();
        $this->ataqueEspecial = $this->calcularEstatistica();
    }
    public function getName(){
        return $this->name;
    }
    public function getTipos(){
        return $this->tipos;
    }
    public function getMovimentos(){
        return $this->movimentos;
    }
    public function reduzirVida($dano){
        $this->health -= $dano;
        if($this->health < 0);{
            $this->health = 0;
        }
    }
    private function calcularHealth(){
        return $this->hpbase * 2;
    }
    private function calcularEstatica(){
        return $this->hpbase * 1.5;
    }
    abstract function habilidadePassiva();
}

abstract class Squirtle extends pokemon {
    public function __construct(){
    }

}

abstract class Charmander extends pokemon {

}

abstract class Pikachu extends pokemon{


}