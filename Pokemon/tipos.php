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
        parent::__construct('Fogo', ['Eletrico', 'Terrestre'], ['Gelo', 'Fogo']);

    }
    public function getFraquezas(){
        return $this->fraqueza;
    }
    public function getResistencia(){
    return $this->resistencia;
}
    }
    class TipoAgua extends tipo {
        private function __construct() {
        parent::__construct('Água', ['Eletrico', 'Terrestre'],['Água', 'Fogo']);

        }
        public function getFraqueza(){
            return $this->fraqueza;
        }
        public function getResistencia() {
            return $this->resistencia;
        }
    }
    abstract class tipoEletrico extends tipo {
        private function __construct() {
            parent::__construct('Eletrico',['Terrestre'],['Eletrico']);
        }
    }



