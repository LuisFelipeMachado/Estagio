<?php
namespace Cache;

class CacheLRU extends CacheBase {
    protected function evict(): void {
        if (empty($this->itens)) {
            return;
        }
        $lru = null;
        $tempoMenosRecente = PHP_INT_MAX;
        foreach ($this->itens as $chave => $info) {
            if ($info['timestamp'] < $tempoMenosRecente) {
                $tempoMenosRecente = $info['timestamp'];
                $lru = $chave;
            }
        }
        if ($lru !== null) {
            $this->remover($lru);
        }
    }

    protected function atualizarAposGet($chave): void {
        $this->itens[$chave]['timestamp'] = microtime(true);
    }
}
