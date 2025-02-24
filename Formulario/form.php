<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST')
$dados = array (
  'nome' => $nome,
  'email' => $email,
  'idade' => $idade
);

if (file_exists($arquivo_json))
$json_data = file_get_contents ($arquivo_json);
$arquivo_json = 'dados.json';

$nome = $_POST['nome'];
$email = $_POST['email'];   //**Conectar JSON */
$idade = $_POST['idade'];

function ValidarEmail($email) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

if (ValidarEmail($email)) {
    echo "Email validado com sucesso!<br>";
} else {
    echo "Email inválido.<br>";
}

function ValidarCPF($cpf) {
    $cpf = preg_replace('/[^0-9]/', '', $cpf);

    if (strlen($cpf) != 11 || preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
    }

    $D1 = 0;
    for ($i = 0, $x = 10; $i < 9; $i++, $x--) {
        $D1 += $cpf[$i] * $x;
    }
    $D1 = ($D1 % 11) < 2 ? 0 : 11 - ($D1 % 11);

    $D2 = 0;
    for ($i = 0, $x = 11; $i < 10; $i++, $x--) {
        $D2 += $cpf[$i] * $x;
    }
    $D2 = ($D2 % 11) < 2 ? 0 : 11 - ($D2 % 11);

    if ($cpf[9] == $D1 && $cpf[10] == $D2) {
        return true;
    } else {
        return false;
    }
}

$cpf = $_POST['cpf'];
if (ValidarCPF($cpf)) {
  headers_sent(Locale : 'index.html');
    echo "CPF validado com sucesso!<br>";   //HEADER SUCESS.HTML
} else {
    echo "CPF inválido.<br>";
}
?>
