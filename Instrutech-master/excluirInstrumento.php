<?php

require_once('repository/InstrumentoRepository.php');
session_start();

$idProduto = $_GET['id'];

if (fnDeleteInstrumento($idProduto)) {
    $msg = "Sucesso ao apagar";
} else {
    $msg = "Falha ao apagar";
}

unset($_GET['id']);

$page = "catalogo.php";
setcookie('notify', $msg, time() + 10, "/instrutech/{$page}", 'localhost');
header("location: {$page}");
exit;
