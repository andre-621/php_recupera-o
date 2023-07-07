<?php
require_once('repository/PedidoRepository.php');

$data = date("Y-m-d");
$valortotal = filter_input(INPUT_POST, 'valortotal', FILTER_SANITIZE_NUMBER_INT);
$idproduto = filter_input(INPUT_POST, 'idproduto', FILTER_SANITIZE_NUMBER_INT);
$idcliente = filter_input(INPUT_POST, 'idcliente', FILTER_SANITIZE_NUMBER_INT);

if (empty($valortotal) || empty($idproduto) || empty($idcliente)) {
    $msg = "Preencha todos os campos primeiro.";
} else {
    if (fnAddPedido($data, $valortotal, $idproduto, $idcliente)) {
        $msg = "Sucesso ao gravar pedido.";
    } else {
        $msg = "Falha na gravação do pedido.";
        $page = "errorPage.php";
    }
}

$page = "minhaConta.php";
setcookie('notify', $msg, time() + 10, "instrutech/{$page}", 'localhost');
header("location: {$page}");
exit;
