<?php
require_once('repository/ClienteRepository.php');
// require_once('repository/LoginRepository.php');

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);
$cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_SPECIAL_CHARS);
$endereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_SPECIAL_CHARS);
$num = filter_input(INPUT_POST, 'num', FILTER_SANITIZE_SPECIAL_CHARS);
$bairro = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_SPECIAL_CHARS);
$cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_SPECIAL_CHARS);
$estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_SPECIAL_CHARS);
$privilegio = filter_input(INPUT_POST, 'privilegio', FILTER_SANITIZE_SPECIAL_CHARS);



if (empty($nome) || empty($email) || empty($senha)) {
    $msg = "Preencher todos os campos primeiro.";
} else {
    if (fnAddCliente($nome, $cep, $endereco, $num, $bairro, $cidade, $estado, $email, $senha, $privilegio)) {
        $msg = "Sucesso ao gravar";
        // fnAddLogin($email, $senha);
    } else {
        $msg = "Falha na gravação";
    }
}

$page = "formulario-cadastro-cliente.php";
setcookie('notify', $msg, time() + 10, "instrutech/{$page}", 'localhost');
header("location: {$page}");
exit;