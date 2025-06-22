<?php
// No TOPO do cabecalho.php
if ($_SERVER['REMOTE_ADDR'] == '127.0.0.1') { // Só executa em localhost
    if (function_exists('opcache_reset')) opcache_reset();
    clearstatcache();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<title>uniHealth | Área Administrativa</title>-->
    <link rel="stylesheet" href="http://localhost/uniHealth/visao/styles/cabecalho.css">
    <link rel="stylesheet" href="http://localhost/uniHealth/visao/styles/formCadastro.css">
     <link rel="stylesheet" href="http://localhost/uniHealth/visao/styles/prontuario.css">
     <link rel="stylesheet" href="http://localhost/uniHealth/visao/styles/cardsMenu.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <script type="text/javascript" src="http://localhost/uniHealth/componentes/javascript.js"></script>
</head>

<body>
    
    <div class="navbar">    
        <div></div> <!--espaço esquerdo-->   
        <div>
            <button class="sair-btn" onclick="sair()">Sair</button>
        </div>
    </div>
    
    <div id="menuLateral" class="sidebar">   
        <div class="logo">
            <a href="http://localhost/uniHealth/visao/menuPrincipal.php"><img src="http://localhost/uniHealth/visao/img/logo.png" alt="logotipo do site"></a>
        </div> 
        <a href="http://localhost/uniHealth/visao/menuPrincipal.php">Início</a>
        <a href="http://localhost/uniHealth/visao/cadastros.php">Cadastros</a>
        <a href="http://localhost/uniHealth/visao/prontuarios.php">Prontuários</a>
    </div>


    <div class="conteudo">
       

        <div id="geral">