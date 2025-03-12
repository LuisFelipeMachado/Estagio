<?php

require_once __DIR__ . '/vendor/autoload.php';

use ApiTerceiros\ConsumirApi;

$clienteApi = new ConsumirApi("https://reqres.in/api");

$respostaGet = $clienteApi->fazerGet("users/2");
echo "Resposta GET:\n";
echo $respostaGet . "\n\n";

$dados = ["name" => "Fernando", "job" => "Desenvolvedor"];
$respostaPost = $clienteApi->fazerPost("users", $dados);
echo "Resposta POST:\n";
echo $respostaPost . "\n";
