<?php
include('config.php');
require_once('repository/ClienteRepository.php');
require_once('validador.php');

$idcliente = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$idcliente = $_SESSION['login']->idcliente;
$cliente = fnLocalizaClientePorId($idcliente);

?>

<!doctype html>
<html lang="pt_BR">

<head>
    <title>Editar Cliente</title>

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
                    <legend>Edição de Cliente</legend>
                    <form action="editaCliente.php" method="post" class="form" enctype="multipart/form-data">
                        <div>
                            <input type="hidden" name="idCliente" id="clienteId" value="<?= $cliente->idcliente ?>">
                        </div>
                        <div class="mb-3 form-group">
                            <label for="nomeId" class="form-label">Nome</label>
                            <input type="text" name="nome" id="nomeId" class="form-control"
                                placeholder="Informe o nome completo" value="<?= $cliente->nome ?>">
                            <div id="helperNome" class="form-text">Informe o nome completo</div>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="emailId" class="form-label">Email</label>
                            <input type="email" name="email" id="emailId" class="form-control"
                                placeholder="Informe o email" value="<?= $cliente->email ?>">
                            <div id="helperEmail" class="form-text">Informe o email</div>
                        </div>
                        <!-- <div class="mb-3 form-group">
                            <label for="senhaId" class="form-label">Senha</label>
                            <input type="password" name="senha" id="senhaId" class="form-control" placeholder="Informe a senha" value="">
                            <div id="helperSenha" class="form-text">Informe a senha</div>
                        </div> -->
                        <div class="mb-3 form-group">
                            <label for="cepId" class="form-label">CEP</label>
                            <input type="text" name="cep" id="cepId" class="form-control" placeholder="Informe o CEP"
                                value="<?= $cliente->cep ?>">
                            <div id="helperCep" class="form-text">Informe o CEP</div>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="enderecoId" class="form-label">Endereço</label>
                            <input type="text" name="endereco" id="enderecoId" class="form-control"
                                placeholder="Informe o endereço" value="<?= $cliente->endereco ?>">
                            <div id="helperEndereco" class="form-text">Informe o endereço</div>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="numId" class="form-label">Número</label>
                            <input type="text" name="num" id="numId" class="form-control" placeholder="Informe o número"
                                value="<?= $cliente->num ?>">
                            <div id="helperNum" class="form-text">Informe o número</div>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="bairroId" class="form-label">Bairro</label>
                            <input type="text" name="bairro" id="bairroId" class="form-control"
                                placeholder="Informe o bairro" value="<?= $cliente->bairro ?>">
                            <div id="helperBairro" class="form-text">Informe o bairro</div>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="cidadeId" class="form-label">Cidade</label>
                            <input type="text" name="cidade" id="cidadeId" class="form-control"
                                placeholder="Informe a cidade" value="<?= $cliente->cidade ?>">
                            <div id="helperCidade" class="form-text">Informe a cidade</div>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="estadoId" class="form-label">Estado</label>
                            <select name="estado" id="estadoId" class="form-control">
                                <option value="">Selecione</option>
                                <option value="AC" <?= $cliente->estado === 'AC' ? 'selected' : '' ?>>AC</option>
                                <option value="AL" <?= $cliente->estado === 'AL' ? 'selected' : '' ?>>AL</option>
                                <option value="AP" <?= $cliente->estado === 'AP' ? 'selected' : '' ?>>AP</option>
                                <option value="AM" <?= $cliente->estado === 'AM' ? 'selected' : '' ?>>AM</option>
                                <option value="BA" <?= $cliente->estado === 'BA' ? 'selected' : '' ?>>BA</option>
                                <option value="CE" <?= $cliente->estado === 'CE' ? 'selected' : '' ?>>CE</option>
                                <option value="DF" <?= $cliente->estado === 'DF' ? 'selected' : '' ?>>DF
                                </option>
                                <option value="ES" <?= $cliente->estado === 'ES' ? 'selected' : '' ?>>ES
                                </option>
                                <option value="GO" <?= $cliente->estado === 'GO' ? 'selected' : '' ?>>GO</option>
                                <option value="MA" <?= $cliente->estado === 'MA' ? 'selected' : '' ?>>MA</option>
                                <option value="MT" <?= $cliente->estado === 'MT' ? 'selected' : '' ?>>MT
                                </option>
                                <option value="MS" <?= $cliente->estado === 'MS' ? 'selected' : '' ?>>MS
                                </option>
                                <option value="MG" <?= $cliente->estado === 'MG' ? 'selected' : '' ?>>MG
                                </option>
                                <option value="PA" <?= $cliente->estado === 'PA' ? 'selected' : '' ?>>PA/option>
                                <option value="PB" <?= $cliente->estado === 'PB' ? 'selected' : '' ?>>PB</option>
                                <option value="PR" <?= $cliente->estado === 'PR' ? 'selected' : '' ?>>PR</option>
                                <option value="PE" <?= $cliente->estado === 'PE' ? 'selected' : '' ?>>PE
                                </option>
                                <option value="PI" <?= $cliente->estado === 'PI' ? 'selected' : '' ?>>PI</option>
                                <option value="RJ" <?= $cliente->estado === 'RJ' ? 'selected' : '' ?>>RJ
                                </option>
                                <option value="RN" <?= $cliente->estado === 'RN' ? 'selected' : '' ?>>RN</option>
                                <option value="RS" <?= $cliente->estado === 'RS' ? 'selected' : '' ?>>RS
                                </option>
                                <option value="RO" <?= $cliente->estado === 'RO' ? 'selected' : '' ?>>RO</option>
                                <option value="RR" <?= $cliente->estado === 'RR' ? 'selected' : '' ?>>RR</option>
                                <option value="SC" <?= $cliente->estado === 'SC' ? 'selected' : '' ?>>SC
                                </option>
                                <option value="SP" <?= $cliente->estado === 'SP' ? 'selected' : '' ?>>SP</option>
                                <option value="SE" <?= $cliente->estado === 'SE' ? 'selected' : '' ?>>SE</option>
                                <option value="TO" <?= $cliente->estado === 'TO' ? 'selected' : '' ?>>TO</option>
                            </select>
                            <div id="helperEstado" class="form-text">Informe o estado</div>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="privilegioId" class="form-label">Privilegio</label>
                            <select name="privilegio" id="privilegioId" class="form-control">
                                <option value="admin" <?= $cliente->idcliente == 1 ? 'selected' : '' ?>
                                    <?= $cliente->idcliente == 1 ? 'disabled' : 'hidden' ?>>Administrador</option>
                                <?php if ($admin || $cliente->idcliente != 1) : ?>
                                <option value="compra" <?= $cliente->privilegio == 'compra' ? 'selected' : '' ?>>Apenas
                                    Comprador</option>
                                <option value="venda" <?= $cliente->privilegio == 'venda' ? 'selected' : '' ?>>Vendedor
                                    e Comprador</option>
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

</body>

</html>