<?php
require_once('Connection.php');

# CRUD cliente

function fnAddCliente($nome, $cep, $endereco, $num, $bairro, $cidade, $estado, $email, $senha, $privilegio)
{
    $con = getConnection();

    $sql = "INSERT INTO cliente (nome, cep, endereco, num, bairro, cidade, estado, email, senha, privilegio) 
            VALUES (:pNome, :pCep, :pEndereco, :pNum, :pBairro, :pCidade, :pEstado, :pEmail, :pSenha, :pPrivilegio)";

    $stmt = $con->prepare($sql);
    $stmt->bindParam(":pNome", $nome);
    $stmt->bindParam(":pCep", $cep);
    $stmt->bindParam(":pEndereco", $endereco);
    $stmt->bindParam(":pNum", $num);
    $stmt->bindParam(":pBairro", $bairro);
    $stmt->bindParam(":pCidade", $cidade);
    $stmt->bindParam(":pEstado", $estado);
    $stmt->bindParam(":pEmail", $email);
    $stmt->bindValue(":pSenha", md5($senha));
    $stmt->bindParam(":pPrivilegio", $privilegio);

    return $stmt->execute();
}



function fnListClientes()
{
    $con = getConnection();

    $sql = "select * from cliente";

    $result = $con->query($sql);

    $lstClientes = array();
    while ($cliente = $result->fetch(PDO::FETCH_OBJ)) {
        array_push($lstClientes, $cliente);
    }

    return $lstClientes;
}

function fnLocalizaClientePorNome($nome)
{
    $con = getConnection();

    $sql = "select * from cliente where nome like :pNome limit 20";

    $stmt = $con->prepare($sql);

    $stmt->bindValue(":pNome", "%{$nome}%");

    if ($stmt->execute()) {
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        return $stmt->fetchAll();
    }
}

function fnLocalizaClientePorId($id)
{
    $con = getConnection();

    $sql = "select * from cliente where idcliente = :pID";

    $stmt = $con->prepare($sql);
    $stmt->bindParam(":pID", $id);

    if ($stmt->execute()) {
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    return null;
}

function fnUpdateCliente($id, $nome, $cep, $endereco, $num, $bairro, $cidade, $estado, $email, $privilegio)
{
    $con = getConnection();

    $sql = "UPDATE cliente 
            SET nome = :pNome, cep = :pCep, endereco = :pEndereco, num = :pNum, 
                bairro = :pBairro, cidade = :pCidade, estado = :pEstado, email = :pEmail, privilegio = :pPrivilegio
            WHERE idcliente = :pID";

    $stmt = $con->prepare($sql);
    $stmt->bindParam(":pID", $id);
    $stmt->bindParam(":pNome", $nome);
    $stmt->bindParam(":pCep", $cep);
    $stmt->bindParam(":pEndereco", $endereco);
    $stmt->bindParam(":pNum", $num);
    $stmt->bindParam(":pBairro", $bairro);
    $stmt->bindParam(":pCidade", $cidade);
    $stmt->bindParam(":pEstado", $estado);
    $stmt->bindParam(":pEmail", $email);
    // $stmt->bindValue(":pSenha", md5($senha));
    $stmt->bindParam(":pPrivilegio", $privilegio);

    return $stmt->execute();
}


function fnDeleteCliente($id)
{
    $con = getConnection();

    $sql = "delete from cliente where idcliente = :pID";

    $stmt = $con->prepare($sql);
    $stmt->bindParam(":pID", $id);

    return $stmt->execute();
}