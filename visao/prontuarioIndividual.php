<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/uniHealth/visao/cabecalho.php"); ?>

<div class="tab-container">
   
    <div class="tab-buttons">
        <button class="tab-button active" onclick="openTab(event, 'dadosPessoais')" >Dados Pessoais</button>
        <button class="tab-button" onclick="openTab(event, 'historico')">Histórico</button>
        <button class="tab-button" onclick="openTab(event, 'evolucao')">Evolução</button>
        <button class="tab-button"onclick="openTab(event, 'plano')">Plano</button>

    </div>

        <div class="tab-content active" id="dadosPessoais">
            
            <div class="infos">
                <?php include_once($_SERVER['DOCUMENT_ROOT'] . "/uniHealth/visao/exibePessoa.php"); ?>
            </div>
        </div>

        <div class="tab-content" id="historico">
            
            <div class="infos">
                <?php include_once($_SERVER['DOCUMENT_ROOT'] . "/uniHealth/visao/exibeHistorico.php"); ?>
            </div>
        </div>

        <div class="tab-content" id="evolucao">
            
            <div class="infos">
                <?php include_once($_SERVER['DOCUMENT_ROOT'] . "/uniHealth/visao/listaEvolucoes.php"); ?>
                
            </div>
        </div>

        <div class="tab-content" id="plano">
            <div class="infos">
                <?php include_once($_SERVER['DOCUMENT_ROOT'] . "/uniHealth/visao/listaPlanos.php"); ?>
            </div>
        </div>

</div>



<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/uniHealth/visao/rodape.php"); ?>