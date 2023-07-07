<?php
include('config.php');
require_once('repository/InstrumentoRepository.php');
require_once('validador.php');

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

if (!isset($id)) {
    $id = $_SESSION['id'];
}

$instrumento = fnLocalizaInstrumentoPorId($id);
?>

<!doctype html>
<html lang="pt_BR">

<head>
    <title>Editar Instrumento</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans&display=swap" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <?php include('navbar.php'); ?>
    <main>
        <section>
            <div class="col-6 offset-3">
                <fieldset>
                    <legend>Edição de Instrumento</legend>
                    <form action="editaInstrumento.php" method="post" class="form" enctype="multipart/form-data">
                        <div>
                            <input type="hidden" name="idInstrumento" id="instrumentoId" value="<?= $instrumento->idproduto ?>">
                        </div>
                        <div class="mb-3 form-group">
                            <label for="fotoId" class="form-label">Foto</label>
                            <input type="file" name="foto" id="fotoId" class="form-control" accept="image/*">
                            <div id="helperFoto" class="form-text">Selecione uma foto</div>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="nomeId" class="form-label">Nome</label>
                            <input type="text" name="nome" id="nomeId" class="form-control" placeholder="Informe o nome do instrumento" value="<?= $instrumento->nome ?>">
                            <div id="helperNome" class="form-text">Informe o nome do instrumento</div>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="descricaoId" class="form-label">Descrição</label>
                            <input type="text" name="descricao" id="descricaoId" class="form-control" placeholder="Informe a descrição do instrumento" value="<?= $instrumento->descricao ?>">
                            <div id="helperDescricao" class="form-text">Informe a descrição do instrumento</div>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="marcaId" class="form-label">Marca</label>
                            <input type="text" name="marca" id="marcaId" class="form-control" placeholder="Informe a marca do instrumento" value="<?= $instrumento->marca ?>">
                            <div id="helperMarca" class="form-text">Informe a marca do instrumento</div>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="valorId" class="form-label">Valor</label>
                            <input type="number" name="valor" id="valorId" class="form-control" placeholder="Informe o valor do instrumento" value="<?= $instrumento->valor ?>">
                            <div id="helperValor" class="form-text">Informe o valor do instrumento</div>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="estadoId" class="form-label">Estado</label>
                            <select name="estado" id="estadoId" class="form-control">
                                <option value="novo" <?= $instrumento->estado === 'novo' ? 'selected' : '' ?>>Novo
                                </option>
                                <option value="usado" <?= $instrumento->estado === 'usado' ? 'selected' : '' ?>>Usado
                                </option>
                            </select>
                            <div id="helperEstado" class="form-text">Selecione o estado do instrumento</div>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="tipoId" class="form-label">Tipo</label>
                            <select name="tipo" id="tipoId" class="form-control">
                                <option value="venda" <?= $instrumento->tipo === 'venda' ? 'selected' : '' ?>>Venda
                                </option>
                                <option value="aluguel" <?= $instrumento->tipo === 'aluguel' ? 'selected' : '' ?>>
                                    Aluguel</option>
                            </select>
                            <div id="helperTipo" class="form-text">Selecione o tipo de negócio</div>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="destaqueId" class="form-label">Destaque?</label>
                            <select name="destaque" id="destaqueId" class="form-control">
                                <option value="1" <?= $instrumento->destaque === '1' ? 'selected' : '' ?>>Sim</option>
                                <option value="0" <?= $instrumento->destaque === '0' ? 'selected' : '' ?>>Não</option>
                            </select>
                            <div id="helperDestaque" class="form-text">Selecione se é destaque</div>
                        </div>

                        <button type="submit" class="btn btn-dark">Enviar</button>
                        <div id="notify" class="form-text text-capitalize fs-4">
                            <?= isset($_COOKIE['notify']) ? $_COOKIE['notify'] : '' ?></div>
                    </form>
                </fieldset>
            </div>
        </section>
    </main>
</body>

</html>