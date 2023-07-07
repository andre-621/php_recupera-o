<?php
include('config.php');
require_once('repository/ClienteRepository.php');
require_once('validador.php');

$clientes = fnListClientes();

?>

<!doctype html>
<html lang="pt_BR">

<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet" type="text/css">

    <title>Lista de Clientes</title>
</head>

<body>
    <?php include('navbar.php'); ?>
    <main>
        <section>
            <div class="container">
                <h1>Lista de Clientes</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($clientes as $cliente) : ?>
                            <tr>
                                <td><?= $cliente->idcliente ?></td>
                                <td><?= $cliente->nome ?></td>
                                <td><?= $cliente->email ?></td>
                                <td>
                                    <a href="formulario-edita-cliente.php?id=<?= $cliente->idcliente ?>" class="btn btn-primary">Editar</a>
                                    <a href="excluirCliente.php?id=<?= $cliente->idcliente ?>" class="btn btn-danger" onclick="return confirmDelete()">Excluir</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <div class="d-flex">
                            <button type="button" class="btn btn-dark">
                                <a href="formulario-cadastro-cliente.php" style="color: white; text-decoration: none;">Cadastrar Novo Cliente</a>
                            </button>
                            <form role="search" method="post" action="localiza-instrumento.php" class="ml-auto">
                                <input type="text" placeholder="Pesquisar" class="search">
                                <button type="submit" class="btn-search">Buscar</button>
                            </form>
                        </div>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
    <script>
        function confirmDelete() {
            return confirm("Tem certeza de que deseja excluir este instrumento? Essa ação não pode ser desfeita.");
        }
    </script>
</body>

</html>