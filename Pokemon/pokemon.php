<?php 
require 'movimentos.php';
require 'tipos.php';

abstract class pokemon {
    protected string $name;
    protected string $tipo;
    protected string $movimentos;
    protected string $fraquezas;
    protected string $resistencia;
    protected float $hp;
    protected float $health;
    protected float $ataque;
    protected float $defesa;
    protected float $ataqueEspecial;

    protected function __construct($name, $tipo, $movimento, $fraquezas, $resistencia,
    $hp, $health, $ataque, $defesa, $ataqueEspecial){
        $this->name = $name;
        $this->tipo = $tipo;
        $this->movimentos = $movimento;
        $this->fraquezas = $fraquezas;
        $this->resistencia = $resistencia;
        $this->hp = $hp;
        $this->health = $this->calcularHealth();
        $this->ataque = $this->calcularEstatistica();
        $this->defesa = $this->calcularEstatistica();
        $this->ataqueEspecial = $this->calcularEstatistica();
    }
    public function getName(){
        return $this->name;
    }
    public function getTipos(){
        return $this->tipo;
    }
    public function getMovimentos(){
        return $this->movimentos;
    }
    public function reduzirVida($dano){
        $this->health -= $dano;
        if($this->health < 0){
            $this->health = 0;
        }
    }
    private function calcularHealth(){
        return (((31 * 2 ) /4 + $this->hp + 100) / 100) * 50 + 10 +50;
    }
private function calcularEstatistica($stat){
    return ((2 * $stat + 31) * 50 / 100) + 5;
}

    abstract function habilidadePassiva();
}

abstract class Squirtle extends pokemon {
    public function __construct(){
    parent::__construct('Squirtle', 'Água', 
    ['Jato d\'Água', 'Cascata'], ['Eletrico', 'Terrestre'],
    ['Água', 'Fogo'], 44, 48, 65, 50);

}
}

abstract class Charmander extends pokemon {
    public function __construct() {
    parent::__construct('Charmander', 'Fogo',
    ['Lança-Chamas','Chama Final'],
    ['Água', 'Terrestre'],
    ['Fogo', 'Gelo'], 39, 52, 43, 60);
    }
}


abstract class Pikachu extends pokemon{
    public function __construct() {
    parent::__construct('Pikachu', 'Eletrico',
    ['Raio', 'Choque do Trovão'],
    ['Terrestre'],
    ['Eletrico'], 35, 55, 40, 50);
    }

}