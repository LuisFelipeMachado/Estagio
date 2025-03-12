<?php
namespace Cache;

abstract class Cache {
    protected int $capacidade;
    protected array $itens = [];
    protected int $misses = 0;

    public function __construct(string $tamanhoStr) {
        $this->capacidade = $this->converterTamanho($tamanhoStr);
    }

    public function set($chave, $valor): void {
        $tamanhoItem = $this->calcularTamanho($valor);
        if (isset($this->itens[$chave])) {
            $this->remover($chave);
        }
        while ($this->tamanhoAtual() + $tamanhoItem > $this->capacidade) {
            $this->evict();
        }
        $this->itens[$chave] = [
            'valor' => $valor,
            'tamanho' => $tamanhoItem,
            'timestamp' => microtime(true)
        ];
    }

    public function get($chave) {
        if (!isset($this->itens[$chave])) {
            $this->misses++;
            return null;
        }
        $this->atualizarAposGet($chave);
        return $this->itens[$chave]['valor'];
    }

    public function mostrarUso(): void {
        echo "Tamanho atual: " . $this->tamanhoAtual() . " bytes de " . $this->capacidade . " bytes\n";
        echo "Itens na cache: " . count($this->itens) . "\n";
        echo "Cache misses: " . $this->misses . "\n";
    }

    abstract protected function evict(): void;
    protected function atualizarAposGet($chave): void { }
    
    protected function remover($chave): void {
        unset($this->itens[$chave]);
    }

    protected function tamanhoAtual(): int {
        $soma = 0;
        foreach ($this->itens as $info) {
            $soma += $info['tamanho'];
        }
        return $soma;
    }

    protected function calcularTamanho($valor): int {
        return strlen(serialize($valor));
    }

    protected function converterTamanho(string $tamanhoStr): int {
        $unidade = strtoupper(substr($tamanhoStr, -2));
        $numero = (int)substr($tamanhoStr, 0, -2);
        switch($unidade) {
            case "MB": return $numero * 1024 * 1024;
            case "KB": return $numero * 1024;
            case "B ": 
            default:   return $numero;
        }
    }
}
