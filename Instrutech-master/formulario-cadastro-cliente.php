<?php
include('config.php');
require_once('repository/ClienteRepository.php');

$cliente = fnLocalizaClientePorId(1);
if ($cliente && $cliente->privilegio === 'admin') {
    $admin = true;
} else {
    $admin = false;
}
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
                    <legend>Cadastro de Cliente</legend>
                    <form action="registraCliente.php" method="post" class="form" enctype="multipart/form-data">
                        <div class="mb-3 form-group">
                            <label for="nomeId" class="form-label">Nome</label>
                            <input type="text" name="nome" id="nomeId" class="form-control" placeholder="Informe o nome completo">
                            <div id="helperNome" class="form-text">Informe o nome completo</div>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="emailId" class="form-label">Email</label>
                            <input type="email" name="email" id="emailId" class="form-control" placeholder="Informe o email">
                            <div id="helperEmail" class="form-text">Informe o email</div>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="senhaId" class="form-label">Senha</label>
                            <input type="password" name="senha" id="senhaId" class="form-control" placeholder="Informe a senha">
                            <div id="helperSenha" class="form-text">Informe a senha</div>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="cepId" class="form-label">CEP</label>
                            <input type="text" name="cep" id="cepId" class="form-control" placeholder="Informe o CEP">
                            <div id="helperCep" class="form-text">Informe o CEP</div>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="enderecoId" class="form-label">Endereço</label>
                            <input type="text" name="endereco" id="enderecoId" class="form-control" placeholder="Informe o endereço">
                            <div id="helperEndereco" class="form-text">Informe o endereço</div>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="numId" class="form-label">Número</label>
                            <input type="text" name="num" id="numId" class="form-control" placeholder="Informe o número">
                            <div id="helperNum" class="form-text">Informe o número</div>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="bairroId" class="form-label">Bairro</label>
                            <input type="text" name="bairro" id="bairroId" class="form-control" placeholder="Informe o bairro">
                            <div id="helperBairro" class="form-text">Informe o bairro</div>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="cidadeId" class="form-label">Cidade</label>
                            <input type="text" name="cidade" id="cidadeId" class="form-control" placeholder="Informe a cidade">
                            <div id="helperCidade" class="form-text">Informe a cidade</div>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="estadoId" class="form-label">Estado</label>
                            <select name="estado" id="estadoId" class="form-control" style>
                                <option value="AC">AC</option>
                                <option value="AL">AL</option>
                                <option value="AP">AP</option>
                                <option value="AM">AM</option>
                                <option value="BA">BA</option>
                                <option value="CE">CE</option>
                                <option value="DF">DF</option>
                                <option value="ES">ES</option>
                                <option value="GO">GO</option>
                                <option value="MA">MA</option>
                                <option value="MT">MT</option>
                                <option value="MS">MS</option>
                                <option value="MG">MG</option>
                                <option value="PA">PA</option>
                                <option value="PB">PB</option>
                                <option value="PR">PR</option>
                                <option value="PE">PE</option>
                                <option value="PI">PI</option>
                                <option value="RJ">RJ</option>
                                <option value="RN">RN</option>
                                <option value="RS">RS</option>
                                <option value="RO">RO</option>
                                <option value="RR">RR</option>
                                <option value="SC">SC</option>
                                <option value="SP">SP</option>
                                <option value="SE">SE</option>
                                <option value="TO">TO</option>
                            </select>
                            <div id="helperPrivilegio" class="form-text">Selecione o Privilegio</div>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="privilegioId" class="form-label">Privilegio</label>
                            <select name="privilegio" id="privilegioId" class="form-control">
                                <option value="compra">Apenas Comprador</option>
                                <option value="venda">Vendedor e Comprador</option>
                                <?php if ($admin) : ?>
                                    <option value="admin">Administrador</option>
                                <?php endif; ?>
                            </select>
                            <div id="helperPrivilegio" class="form-text">Selecione o seu privilegio</div>
                        </div>
                        <button type="submit" class="btn btn-dark">Enviar</button>
                        <div id="notify" class="form-text text-capitalize fs-4">
                            <?= isset($_COOKIE['notify']) ? $_COOKIE['notify'] : '' ?></div>
                    </form>
                </fieldset>
            </div>

        </section>
    </main>
    <?php include('footer.php') ?>
    <script src="js/base64.js"></script>
</body>

</html>