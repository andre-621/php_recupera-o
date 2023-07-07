<?php
include('config.php');
require_once('repository/ClienteRepository.php');
require_once('repository/InstrumentoRepository.php');
require_once('repository/PedidoRepository.php');
require_once('validador.php');

$idcliente = $_SESSION['login']->idcliente;
$cliente = fnLocalizaClientePorId($idcliente);


$historico = fnListHistoricoCliente($idcliente);
?>
<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link href="css/style.css" rel="stylesheet">
    <link href="css/carousel.css" rel="stylesheet">

    <title>Página do Instrumento</title>
</head>

<body>
    <?php include('navbar.php') ?>
    <main>
        <section>
            <h3>Minha Conta</h3>

            <div class="my-account-container">
                <h4>Meus Dados</h4>
                <p>Nome: <?= "$cliente->nome" ?></p>
                <p>Email: <?= "$cliente->email" ?></p>
                <p>Estado: <?= "$cliente->estado" ?></p>
                <p>Bairro: <?= "$cliente->bairro" ?></p>
                <p>Cidade: <?= "$cliente->cidade" ?></p>
                <p>Endereço: <?= "$cliente->endereco" ?></p>
                <p>Nº: <?= "$cliente->num" ?></p>
                <p>CEP: <?= "$cliente->cep" ?></p>
                <a href="minha-edita-conta.php?id=<?= $cliente->idcliente ?>" class="btn btn-primary">Editar</a>
            </div>

            <div class="my-deals-container">
                <h4>Meu histórico</h4>
                <div class="card-container">
                    <?php $cont = 0;
                    foreach (array_reverse($historico) as $pedido) : ?>
                        <?php $idinstrumento = $pedido->idproduto;
                        $instrumento = fnLocalizaInstrumentoPorId($idinstrumento); ?>
                        <?php if ($cont < 3) : ?>
                            <div class="card">
                                <img src="<?= $instrumento->foto ?>" class="card-img-top" alt="foto-instrumento">
                                <div class="card-body">
                                    <?php if ($instrumento->tipo == 'compra') : ?>
                                        <p>Compra - ID do Pedido: <?= $pedido->idpedido ?></p>
                                    <?php else : ?>
                                        <p>Aluguel - ID do Pedido: <?= $pedido->idpedido ?></p>
                                    <?php endif; ?>
                                    <p>Data do Pedido: <?= $pedido->datapedido ?></p>
                                    <p>Valor Total: R$ <?= $pedido->valortotal ?></p>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php
                        $cont++;
                    endforeach; ?>
                </div>
                <?php if ($cont > 3) : ?>
                    <a href="historicoCompleto.php" class="btn btn-primary">Ver Mais</a>
                <?php endif; ?>
            </div>
        </section>
    </main>
    <?php include('footer.php') ?>
</body>

</html>