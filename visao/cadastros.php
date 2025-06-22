<?php include_once("cabecalho.php"); ?>

<head>
    <title>Cadastros</title>
    <link rel="stylesheet" href="styles/cardsMenu.css">
</head>
<body>
    <div class="cards-container">
        <a href="../pessoa.php?fun=cadastrar">
            <div class="card-horizontal">
                <img src="img/novo.png" alt="Novo">
                <div class="card-text">
                    <h2>Novo</h2>
                    <p>Criar novo cadastro</p>
                </div>
            </div>
        </a>
        
        <a href="../pessoa.php?fun=listar">
            <div class="card-horizontal">
                <img src="img/exibir.png" alt="Editar">
                <div class="card-text">
                    <h2>Exibir</h2>
                    <p>Mostrar cadastros</p>
                 </div>
            </div>
        </a>
        
        <a href="../pessoa.php?fun=listar">
            <div class="card-horizontal">
                <img src="img/editar.png" alt="Editar">
                <div class="card-text">
                    <h2>Editar</h2>
                    <p>Modificar cadastro</p>
                </div>
            </div>
        </a>
    </div>

</body>

<?php include_once("rodape.php"); ?>