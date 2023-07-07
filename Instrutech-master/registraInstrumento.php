<?php

require_once('repository/InstrumentoRepository.php');
require_once('util/base64.php');

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);
$marca = filter_input(INPUT_POST, 'marca', FILTER_SANITIZE_SPECIAL_CHARS);
$valor = filter_input(INPUT_POST, 'valor', FILTER_SANITIZE_NUMBER_INT);
$estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_SPECIAL_CHARS);
$tipo = filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_SPECIAL_CHARS);
$destaque = filter_input(INPUT_POST, 'destaque', FILTER_SANITIZE_SPECIAL_CHARS);

$foto = converterBase64($_FILES['foto']);

if (empty($foto) || empty($nome) || empty($descricao) || empty($marca) || empty($valor) || empty($estado) || empty($tipo)) {
    $msg = "Preencher todos os campos primeiro.";
} else {
    if (fnAddInstrumento(
        $foto,
        $nome,
        $descricao,
        $marca,
        $valor,
        $estado,
        $tipo,
        $destaque
    )) {
        $msg = "Sucesso ao gravar";
    } else {
        $msg = "Falha na gravação";
    }
}

$page = "formulario-cadastro-instrumento.php";
setcookie('notify', $msg, time() + 10, "instrutech/{$page}", 'localhost');
header("location: {$page}");
exit;
