<?php
require 'pokemon.php';
require 'tipos.php';

abstract class movimento {
    private string $nome;
    private string $tipo;
    private float $dano;

    public function __construct($nome, $tipo, $dano){
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

    public function calcularDano(pokemon $pokemonAtack, pokemon $pokemonDefensor, $isEspecial = false){
    $atk = $isEspecial ? $pokemonAtack->getAtaqueEspecial() : $pokemonAtack->getAtaque();
    $def = $pokemonDefensor->getDefesa();
    }


    public function usarMovimento($pokemonAtack, $pokemonDefensor){
    echo $pokemonAtack->getNome() ."usa" . $this->nome;

    $danoFinal = $this->dano;
  if(in_array($this->tipo, $pokemonDefensor->getFraqueza())){
    $danoFinal *= 2;
    echo "É super Eficaz!!";
  }
  elseif (in_array($this->tipo, $pokemonDefensor->getResistencia())){

    $danoFinal = (50 * 0.4) + (2 * $this->dano * (atk/def));
    $danoFinal *= $multiplicador;
    echo "Não é muito eficaz!!";
  }

  }

 }
