<?php
require 'pokemon.php';
require 'tipos.php';

abstract class movimento {
    private string $nome;
    private string $tipo;
    private bool $dano;

    public function __construct($name, $tipo, $dano){
        $this->nome = $nome;
        $this->tipo = $tipo;
        $this->dano = $dano;
    }
    public function getNome(){
        return $this->nome;
    }
    public function getTipo(){
        return $this->tipo;
    }
    public function getDano(){
        return $this->dano;
    }
public function usarMovimento($pokemonAtack, $pokemonDefensor){
    echo $pokemonAtack->getnome() ."usa" . $this->nome;

    $danofinal = this->dano;
  if(in_array($this->tipo, $pokemonDefensor->getFraquezas())){
    $danoFinal *= 2;
    echo "É super Eficaz!!";
  }
  elseif (in_array($this->tipo, $pokemonDefensor->getResistencia())){

    $danoFinal /= 2; 
    echo "Não é muito eficaz!!";
  }

  }

 }
