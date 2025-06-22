<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/uniHealth/visao/cabecalho.php"); ?>

    <div class="cards-container">
        <a href="http://localhost/uniHealth/prontuario.php?fun=cadastrarPront">
            <div class="card-horizontal">
                <img src="img/novo.png" alt="Novo">
                <div class="card-text">
                    <h2>Novo</h2>
                    <p>Criar novo prontuário</p>
                </div>
            </div>
        </a>
        
        <a href="http://localhost/uniHealth/pessoa.php?fun=listar">
            <div class="card-horizontal">
                <img src="img/exibir.png" alt="Editar">
                <div class="card-text">
                    <h2>Exibir</h2>
                    <p>Mostrar prontuários</p>
                 </div>
            </div>
        </a>

    </div>

<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/uniHealth/visao/rodape.php"); ?>