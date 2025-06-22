<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/uniHealth/visao/cabecalho.php"); ?>
      
    <HEAD>
        <TITLE><?php echo $evol->getProntuario()->getPaciente()->getNome(); ?> </TITLE>
    </HEAD> 

<H2 class="exibicao-h2"><?php echo $evol->getProntuario()->getPaciente()->getNome(); ?> - Evolução</H2>

<div class="card-exibicao">
    <h3>Data: <?php echo $evol->getDataE(); ?></h3>
    <strong>Resumo:</strong> <?php echo ($evol->getResumo()); ?><br>

</div>

<button type="button" class="btn salvar" onclick="editarEvolucao(<?php echo $evol->getId(); ?>)">Editar</button>
<button type="button" class="btn cancelar" onclick="voltarProntuarioIndividual(<?php echo $evol->getProntuario()->getPaciente()->getId();?>)">Voltar</button>

<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/uniHealth/visao/rodape.php"); ?>