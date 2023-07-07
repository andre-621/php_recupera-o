<?php
require_once('Connection.php');

function fnAddInstrumento($foto, $nome, $descricao, $marca, $valor, $estado, $tipo, $destaque)
{
    $con = getConnection();

    $sql = "INSERT INTO produto (foto, nome, descricao, marca, valor, estado, tipo, destaque) VALUES (:pFoto, :pNome, :pDescricao, :pMarca, :pValor, :pEstado, :pTipo, :pDestaque)";

    $stmt = $con->prepare($sql);

    $stmt->bindParam(":pFoto", $foto);
    $stmt->bindParam(":pNome", $nome);
    $stmt->bindParam(":pDescricao", $descricao);
    $stmt->bindParam(":pMarca", $marca);
    $stmt->bindParam(":pValor", $valor);
    $stmt->bindParam(":pEstado", $estado);
    $stmt->bindParam(":pTipo", $tipo);
    $stmt->bindParam(":pDestaque", $destaque);

    return $stmt->execute();
}


function fnListInstrumentos()
{
    $con = getConnection();

    $sql = "select * from produto";

    $result = $con->query($sql);

    $lstinstruments = array();
    while ($instrumento = $result->fetch(PDO::FETCH_OBJ)) {
        array_push($lstinstruments, $instrumento);
    }

    return $lstinstruments;
}

function fnLocalizaInstrumentoPorNome($nome)
{
    $con = getConnection();

    $sql = "select * from produto where nome like :pNome limit 20";

    $stmt = $con->prepare($sql);

    $stmt->bindValue(":pNome", "%{$nome}%");

    if ($stmt->execute()) {
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        return $stmt->fetchAll();
    }
}

function fnLocalizaInstrumentoPorId($id)
{
    $con = getConnection();

    $sql = "select * from produto where idproduto = :pID";

    $stmt = $con->prepare($sql);
    $stmt->bindParam(":pID", $id);

    if ($stmt->execute()) {
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    return null;
}

function fnLocalizaInstrumentoPorDestaque($destaque)
{
    $con = getConnection();

    $sql = "SELECT * FROM produto WHERE destaque = :pDestaque";

    $stmt = $con->prepare($sql);
    $stmt->bindParam(":pDestaque", $destaque);

    if ($stmt->execute()) {
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    return null;
}


function fnUpdateInstrumento($id, $foto, $nome, $descricao, $marca, $valor, $estado, $tipo, $destaque)
{
    $con = getConnection();

    $sql = "UPDATE produto SET foto = :pFoto, nome = :pNome, descricao = :pDescricao, marca = :pMarca, valor = :pValor, estado = :pEstado, tipo = :pTipo, destaque = :pDestaque WHERE idproduto = :pID";

    $stmt = $con->prepare($sql);
    $stmt->bindParam(":pID", $id);
    $stmt->bindParam(":pFoto", $foto);
    $stmt->bindParam(":pNome", $nome);
    $stmt->bindParam(":pDescricao", $descricao);
    $stmt->bindParam(":pMarca", $marca);
    $stmt->bindParam(":pValor", $valor);
    $stmt->bindParam(":pEstado", $estado);
    $stmt->bindParam(":pTipo", $tipo);
    $stmt->bindParam(":pDestaque", $destaque);

    return $stmt->execute();
}

function fnDeleteInstrumento($id)
{
    $con = getConnection();

    $sql = "delete from produto where idproduto = :pID";

    $stmt = $con->prepare($sql);
    $stmt->bindParam(":pID", $id);

    return $stmt->execute();
}
