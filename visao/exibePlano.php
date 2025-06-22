<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/uniHealth/visao/cabecalho.php"); ?>
    
<HEAD>
    <TITLE><?php echo $plano->getProntuario()->getPaciente()->getNome(); ?> </TITLE>
</HEAD>

<H2 class="exibicao-h2"><?php echo $plano->getProntuario()->getPaciente()->getNome(); ?> </H2>

<div class="card-exibicao">
    <h3>Data do plano: <?= $plano->getDataP(); ?></h3>
    <strong>Objetivos:</strong> <?php echo ($plano->getObjetivos()); ?><br>
    <strong>Abordagem:</strong> <?php echo ($plano->getAbordagem()); ?><br>
    <strong>Hipoteses:</strong> <?php echo ($plano->getHipoteses()); ?><br>
</div>

<button type="button" class="btn salvar" onclick="editarPlano(<?php echo $plano->getId(); ?>)">Editar</button>
<button type="button" class="btn cancelar" onclick="voltarProntuarioIndividual(<?php echo $plano->getProntuario()->getPaciente()->getId();?>)">Voltar</button>

<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/uniHealth/visao/rodape.php"); ?>