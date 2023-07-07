<?php

require_once('Connection.php');

function fnAddPedido($data, $valortotal, $idproduto, $idcliente)
{
    $con = getConnection();

    $sql = "INSERT INTO pedido (datapedido, valortotal, idproduto, idcliente)
            VALUES (:datapedido, :valortotal, :idproduto, :idcliente)";

    $stmt = $con->prepare($sql);
    $stmt->bindParam(":datapedido", $data);
    $stmt->bindParam(":valortotal", $valortotal);
    $stmt->bindParam(":idproduto", $idproduto);
    $stmt->bindParam(":idcliente", $idcliente);

    if ($stmt->execute()) {
        return $con->lastInsertId();
    }

    return null;
}

function fnLocalizaPedidoPorId($id)
{
    $con = getConnection();

    $sql = "select * from produto where idproduto = :pID";

    $stmt = $con->prepare($sql);
    $stmt->bindParam(":pID", $id);

    if ($stmt->execute()) {
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    return $stmt->execute();
}

function fnListHistoricoCliente($idcliente)
{
    $con = getConnection();

    $sql = "SELECT * FROM pedido WHERE idcliente = :idcliente";

    $stmt = $con->prepare($sql);
    $stmt->bindParam(":idcliente", $idcliente);

    if ($stmt->execute()) {
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    return null;
}

function fnDeletePedido($id)
{
    $con = getConnection();

    $sql = "delete from pedido where idpedido = :pID";

    $stmt = $con->prepare($sql);
    $stmt->bindParam(":pID", $id);

    return $stmt->execute();
}
