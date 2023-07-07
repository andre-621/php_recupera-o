<?php include('config.php') ?>
<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans&display=swap" rel="stylesheet">


    <link href="css/style.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>Página
        do Instrumento</title>

</head>

<body>
    <?php include('navbar.php') ?>
    <main>
        <section>
            <div class="col-6 offset-3">
                <fieldset>
                    <legend>Cadastro de Instrumento</legend>
                    <form action="registraInstrumento.php" method="post" class="form" enctype="multipart/form-data">
                        <div class="card" style="height: auto; width: auto;">
                            <svg class=" card-img-top" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Foto do Instrumento" preserveAspectRatio="xMidYMid slice" focusable="false" style="height: auto; width: auto;">
                                <title>Placeholder</title>
                                <rect width="100%" height="100%" fill="#868e96"></rect><text x="40%" y="50%" fill="#dee2e6" dy=".3em">Foto do Instrumento</text>
                            </svg>
                        </div>
                        <br>
                        <div class="mb-3 form-group">
                            <label for="fotoId" class="form-label">Foto</label>
                            <input type="file" name="foto" id="fotoId" class="form-control" required>
                            <div id="helperFoto" class="form-text">Importe a foto</div>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="nomeId" class="form-label">Nome</label>
                            <input type="text" name="nome" id="nomeId" class="form-control" placeholder="Informe o nome completo" required>
                            <div id="helperNome" class="form-text">Informe o nome completo</div>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="descricaoId" class="form-label">Descrição</label>
                            <textarea name="descricao" id="descricaoId" class="form-control" placeholder="Informe a descrição" required></textarea>
                            <div id="helperDescricao" class="form-text">Informe a descrição</div>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="marcaId" class="form-label">Marca</label>
                            <input type="text" name="marca" id="marcaId" class="form-control" placeholder="Informe a marca" required>
                            <div id="helperMarca" class="form-text">Informe a marca</div>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="valorId" class="form-label">Valor</label>
                            <input type="number" name="valor" id="valorId" class="form-control" placeholder="Informe o valor" required>
                            <div id="helperValor" class="form-text">Informe o valor</div>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="estadoId" class="form-label">Estado</label>
                            <select name="estado" id="estadoId" class="form-control" required>
                                <option value="" selected disabled>Selecione o estado</option>
                                <option value="novo">Novo</option>
                                <option value="usado">Usado</option>
                            </select>
                            <div id="helperEstado" class="form-text">Selecione o estado</div>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="tipoId" class="form-label">Tipo</label>
                            <select name="tipo" id="tipoId" class="form-control" required>
                                <option value="" selected disabled>Selecione o tipo</option>
                                <option value="venda">Venda</option>
                                <option value="aluguel">Aluguel</option>
                            </select>
                            <div id="helperTipo" class="form-text">Selecione o tipo</div>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="destaqueId" class="form-label">Destaque?</label>
                            <select name="destaque" id="destaqueId" class="form-control" required>
                                <option value="" selected disabled>Selecione se é destaque</option>
                                <option value="1">Sim</option>
                                <option value="0">Não</option>
                            </select>
                            <div id="helperDestaque" class="form-text">Selecione se é destaque</div>
                        </div>
                        <button type="submit" class="btn btn-dark">Enviar</button>
                        <div id="notify" class="form-text text-capitalize fs-4">
                            <?= isset($_COOKIE['notify']) ? $_COOKIE['notify'] : '' ?>
                        </div>
                    </form>
                </fieldset>

            </div>

        </section>
    </main>
    <?php include('footer.php') ?>
    <script src="js/base64.js"></script>
</body>

</html>