<?php
include('config.php');
require_once('repository/LoginRepository.php');
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
    <title>Página do Instrumento</title>
</head>

<body>
    <?php include('navbar.php') ?>
    <br>
    <main>
        <section>
            <div class="col-6 offset-3">
                <fieldset>
                    <legend>Login</legend>
                    <form action="loginSistema.php" method="post" class="form" enctype="multipart/form-data">
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
                        <div class="d-grid gap-2 d-md-block">
                            <button type="submit" class="btn btn-dark">Login</button>
                            <a href="forgot-password.php">Recuperar a senha</a>
                        </div>
                        <br>
                        <div class="d-grid gap-2 d-md-block">
                            <p>Não possui cadastro?</p>
                            <a href="formulario-cadastro-cliente.php">Cadastrar</a>
                        </div>
                    </form>
                </fieldset>
            </div>
        </section>
    </main>
    <?php include('footer.php') ?>
</body>

</html>