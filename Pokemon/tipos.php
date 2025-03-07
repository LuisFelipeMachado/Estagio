<?php 
    
   abstract class tipo {
    
    protected $nome;
    protected $fraqueza = [];
    protected $resistencia = [];

    public function __construct ($nome, $fraqueza, $resistencia){
        $this->nome = $nome;

    }
    abstract public function getFraqueza();
    abstract public function getResistencia();
}
    abstract class TipoFogo extends tipo {
    public function __construct() {
        parent::__construct('Fogo');
        $this->fraqueza = ["Água", "Terrestre"];
        $this->resistencia = ["Fogo", "Gama"];
    }
    public function getFraquezas(){
        return $this->fraqueza;
    }
    public function getResistencia(){
    return $this->resistencia;
}
    }
     abstract class TipoAgua extends tipo {
        public function __construct() {
        parent::__construct('Água');
        $this->fraqueza = ["Eletrico", "Gama"];
        }
        public function getFraqueza(){
            return $this->fraqueza;
        }
        public function getResistencia() {
            return $this->resistencia;
        }
    }



