<?php
  
  $arquivo_json = 'dados.json';

$arquivo_json = 'dados.json';

$nome = isset($_POST['nome']) ? $_POST['nome'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$sobrenome = isset($_POST['sobrenome']) ? $_POST['sobrenome'] : '';
$idade = isset($_POST['idade']) ? $_POST['idade'] : '';
$senha = $_POST['senha'];
$confirma_Senha = $_POST['senha'];
$cpf = isset($_POST['cpf']) ? $_POST['cpf'] : '';
function ValidarCPF($cpf) {
    $cpf = preg_replace('/\D/', '', $cpf);

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

function validarEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

if (validarEmail($email)) {
    echo "E-mail Válido!<br>";
} else {
    echo "E-mail inválido.<br>";
}

if ($idade < 15 || $idade > 90) {
    echo "A idade deve estar entre 15 e 90 anos.";}

    elseif ($senha !== $confirma_Senha) {
        echo "As senhas não coincidem. Por favor, digite as mesmas senhas.";
    } elseif (strlen($senha) < 6) {
        echo "A senha deve ter pelo menos 6 caracteres.";
    } else {
        // Após validações passadas, redireciona para a página de sucesso
        header("Location: sucess.html");
        exit(); // Garante que o redirecionamento aconteça imediatamente
    }
$dados = array(
    'nome' => $nome,
    'sobrenome' => $sobrenome,
    'email' => $email,
    'idade' => $idade,
    'cpf' => $cpf
);

if (file_exists($arquivo_json)) {
    $json_data = file_get_contents($arquivo_json);
    $json_array = json_decode($json_data, true) ?: [];
} else {
    $json_array = [];
}

$json_array[] = $dados;

file_put_contents($arquivo_json, json_encode($json_array, JSON_PRETTY_PRINT));

?>
