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

    <title>Histórico Completo</title>
</head>

<body>
    <?php include('navbar.php') ?>
    <main>
        <section>
            <br>
            <h3>Histórico Completo</h3>
            <div class="card-container">
                <?php $cont = 0;
                foreach (array_reverse($historico) as $pedido) : ?>
                    <?php $idinstrumento = $pedido->idproduto;
                    $instrumento = fnLocalizaInstrumentoPorId($idinstrumento); ?>
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
                <?php
                    $cont++;
                    if ($cont % 4 === 0) {
                        echo '</div><div class="row" style="margin: 3% 0;">';
                    }
                endforeach; ?>
            </div>
        </section>
    </main>
    <?php include('footer.php') ?>
</body>

</html>