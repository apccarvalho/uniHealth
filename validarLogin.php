<?php
ob_start();
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include_once("modelo/LoginDAO.php");

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

$loginDAO = new LoginDAO();
$usuarioLogado = $loginDAO->autenticar($usuario, $senha);

if ($usuarioLogado) {
    $_SESSION['id'] = $usuarioLogado->getId();
    $_SESSION['nome'] = $usuarioLogado->getNome();
    $_SESSION['usuario'] = $usuarioLogado->getUsuario();
    header("Location: visao/menuPrincipal.php");
    exit;
} else {
    $_SESSION['erro_login'] = "Usuário ou senha inválidos.";
    header("Location: index.php");
    exit;
}
