<?php
require_once __DIR__ . '/vendor/autoload.php';

use Cache\CacheFIFO;
use Cache\CacheLRU;

$resultadoBatalha = [
    'vencedor'    => 'Charmander',
    'turnos'      => 5,
    'hp_restante' => 20
];

$cacheFIFO = new Cache\CacheFIFO("10KB");
$cacheFIFO->set("resultado_batalha_fifo", $resultadoBatalha);
echo "Cache FIFO:\n";
print_r($cacheFIFO->get("resultado_batalha_fifo"));
$cacheFIFO->mostrarUso();

echo "\n-----------------\n";

$cacheLRU = new Cache\CacheLRU("10KB");
$cacheLRU->set("resultado_batalha_lru", $resultadoBatalha);
echo "Cache LRU:\n";
print_r($cacheLRU->get("resultado_batalha_lru"));
$cacheLRU->mostrarUso();
