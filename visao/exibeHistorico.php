<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/uniHealth/visao/cabecalho.php"); ?>

<HEAD>
    <TITLE><?php echo $user->getNome(); ?> </TITLE>
</HEAD>  

<H2 class="exibicao-h2"><?php echo $user->getNome(); ?> </H2>

<div class="card-exibicao">
    <?php if (isset($pront) && $pront !== null): ?>
        <p><strong>Estagiário:</strong> <?= htmlspecialchars($pront->getEstagiario()->getNome()) ?></p>
        <p><strong>Supervisor:</strong> <?= htmlspecialchars($pront->getSupervisor()->getNome()) ?></p>
        <p><strong>Queixa inicial:</strong> <?= htmlspecialchars($pront->getQueixaPrincipal()) ?></p>
        <p><strong>Histórico pessoal e familiar:</strong> <?= htmlspecialchars($pront->getHistoricoFamiliar()) ?></p>
    <?php else: ?>
        <p><strong>Prontuário não encontrado.</strong></p>
    <?php endif; ?>
</div>

<?php if ($pront !== null): ?>
    <button type="button" class="btn salvar" onclick="editarHistorico(<?php echo $pront->getId(); ?>)">Editar</button>
<?php else: ?>
    <p><a href="http://localhost/uniHealth/prontuario.php?fun=cadastrarPront">Crie um prontuário para iniciar um histórico.</a></p>
<?php endif; ?>

<button type="button" class="btn cancelar" onclick="voltarListaCadastros()">Voltar</button>

<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/uniHealth/visao/rodape.php"); ?>