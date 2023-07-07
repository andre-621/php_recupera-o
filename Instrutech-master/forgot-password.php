<?php
require_once('repository/ClienteRepository.php');

// if (isset($_SESSION['login'])) {
//     $condicao = ($_SESSION['login'] == fnLogin('admin@triplo.com', 'admin@123'));
// } else {
//     $condicao = 0;
// }
// 
?>
<!doctype html>
<html lang="pt_BR">

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

    <style>
    /* footer {
            position: fixed;
            bottom: 0;
        } */
    </style>

    <title>Instrutech | Recuperação de Senha</title>

</head>

<body>
    <?php include('navbar.php'); ?>
    <main>
        <section>
            <div class="col-6 offset-3">
                <br>
                <fieldset>
                    <legend>Instrutech | Recuperação de Senha</legend>
                    <form action="recupera-senha.php" method="post" class="form">
                        <div class="mb-3 form-group">
                            <label for="emailId" class="form-label">E-mail</label>
                            <input type="email" name="email" id="emailId" class="form-control"
                                placeholder="Informe o e-mail">
                            <div id="helperEmail" class="form-text">Informe o e-mail</div>
                        </div>
                        <div class="d-grid gap-2 d-md-block">
                            <button type="submit" class="btn btn-dark">Enviar</button>
                            <a href="login.php">Fazer Login</a>
                        </div>

                        <?php if (isset($_COOKIE['notify'])) : ?>
                        <div id="notify" class="form-text text-capitalize text-<?= $_COOKIE['status'] ?> fs-4">
                            <?= $_COOKIE['notify'] ?></div>
                        <?php endif; ?>
                    </form>
                </fieldset>
            </div>

        </section>
    </main>
    <?php include('footer.php'); ?>
</body>

</html>