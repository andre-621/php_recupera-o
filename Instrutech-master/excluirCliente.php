<?php

require_once('repository/ClienteRepository.php');
session_start();

$id = $_GET['id'];

if (fnDeleteCliente($id)) {
    $msg = "Sucesso ao apagar";
} else {
    $msg = "Falha ao apagar";
}

unset($_GET['id']);

$page = "listagem-de-clientes.php";
setcookie('notify', $msg, time() + 10, "instrutech/{$page}", 'localhost');
header("location: {$page}");
exit;
