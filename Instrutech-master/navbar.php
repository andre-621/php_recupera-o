<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>

<header>
    <nav class="navbar navbar-expand-lg navbar-light custom-navbar">
        <a class="navbar-brand" href="#">
            <img src="images/logo.png" alt="logo" id="logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li><a href="index.php">Instrutech</a></li>
                <li><a href="index.php">Home</a></li>
                <li><a href="catalogo.php">Catálogo</a></li>
                <li><a href="sobrenos.php">Sobre nós</a></li>
                <li class="search-bar">
                    <form role="search" method="post" action="localiza-instrumento.php">
                        <input type="text" placeholder="  Pesquisar" class="search" name="nome">
                        <button type="submit" class="btn-search">Buscar</button>
                    </form>
                </li>
                <?php if (isset($_SESSION['login']) && $_SESSION['login']->idcliente == 1) : ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Listas
                        </a>
                        <div class="dropdown-menu dropdown-menu-sm" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="listagem-de-clientes.php">Clientes</a>
                            <a class="dropdown-item" href="listagem-de-instrumentos.php">Instrumentos</a>
                        </div>
                    </li>
                <?php endif; ?>
                <?php if (empty(isset($_SESSION['login']))) : ?>
                    <li><a href="login.php" class="login-btn">Login</a></li>
                <?php else : ?>
                    <li><a href="minhaConta.php" class="">Minha Conta</a></li>
                    <li><a href="logout.php" class="login-btn">Logout</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
</header>
<br>