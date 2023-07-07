<?php
include('config.php');
require_once('repository/InstrumentoRepository.php');
$nome = filter_input(INPUT_GET, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
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

    <title>Catálogo</title>
</head>

<body>
    <?php include('navbar.php') ?>
    <main>
        <section>
            <br>
            <h3 class="catalogo">Nosso Catálogo</h3>
            <div class="row" style="margin: 3% 0;">
                <?php $cont = 0;
                foreach (fnLocalizaInstrumentoPorNome($nome) as $instrumento) : ?>
                    <div class="col-sm-6 col-md-3">
                        <div class="card">
                            <img src="<?= "$instrumento->foto" ?>" class="card-img-top" alt="foto-instrumento">
                            <div class="card-body">
                                <h5 class="card-title"><?= "$instrumento->nome" ?></h5>
                                <p class="card-text">R$ <?= "$instrumento->valor" ?></p>
                                <a href="instrumentoPage.php?id=<?= "$instrumento->idproduto" ?>" class="btn btn-primary">Detalhes</a>
                            </div>
                        </div>
                    </div>
                <?php
                    $cont++;
                    if ($cont % 4 === 0) {
                        echo '</div><div class="row" style="margin: 3% 0;">';
                    }
                endforeach;
                ?>
            </div>
        </section>

    </main>
    <?php include('footer.php') ?>
</body>

</html>