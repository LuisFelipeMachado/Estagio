<?php

namespace ApiTerceiros;

class ConsumirApi {
    private string $urlBase;

    public function __construct(string $urlBase) {
        $this->urlBase = rtrim($urlBase, "/");
    }

    public function fazerGet(string $rota, array $cabecalhos = []): string {
        $url = $this->urlBase . "/" . ltrim($rota, "/");
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->formatarCabecalhos($cabecalhos));

        $resposta = curl_exec($ch);
        curl_close($ch);

        return $resposta ?: "Erro ao conectar com a API";
    }

    public function fazerPost(string $rota, array $dados = [], array $cabecalhos = []): string {
        $url = $this->urlBase . "/" . ltrim($rota, "/");
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($dados));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array_merge($this->formatarCabecalhos($cabecalhos), ["Content-Type: application/json"]));

        $resposta = curl_exec($ch);
        curl_close($ch);

        return $resposta ?: "Erro ao conectar com a API";
    }

    private function formatarCabecalhos(array $cabecalhos): array {
        $resultado = [];
        foreach ($cabecalhos as $chave => $valor) {
            $resultado[] = "$chave: $valor";
        }
        return $resultado;
    }
}
