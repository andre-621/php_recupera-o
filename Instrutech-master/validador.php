<?php
require_once('repository/LoginRepository.php');
$login = isset($_SESSION['login']);
if (!$login) {
    setcookie('error', 'Somente se estiver logado', $expire, 'instrutech/errorPage.php', 'localhost', isset($_SERVER['HTTPS']), true);
    header("location: errorPage.php");
}