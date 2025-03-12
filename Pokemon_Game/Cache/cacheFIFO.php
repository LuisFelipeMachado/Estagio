<?php
namespace Cache;

class CacheFIFO extends CacheBase {
    protected function evict(): void {
        if (empty($this->itens)) {
            return;
        }
        $maisAntigo = null;
        $tempoMaisAntigo = PHP_INT_MAX;
        foreach ($this->itens as $chave => $info) {
            if ($info['timestamp'] < $tempoMaisAntigo) {
               $tempoMaisAntigo = $info['timestamp'];
               $maisAntigo = $chave;
            }
        }
        if ($maisAntigo !== null) {
           $this->remover($maisAntigo);
        }
    }
}
