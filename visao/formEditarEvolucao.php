<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/uniHealth/visao/cabecalho.php");?>

<form action="http://localhost/uniHealth/evolucao.php?fun=alterarEvol" method="post" class="formulario">

    <input type="hidden" name="id" value="<?= $evol->getId(); ?>">
    <input type="hidden" name="idPaciente" value="<?= $evol->getProntuario()->getPaciente()->getId(); ?>">

    <label for="resumo">Resumo da Sessão:</label>
    <textarea name="resumo" id="resumo" rows="6" required><?= htmlspecialchars($evol->getResumo()) ?></textarea>

    <label for="dataE">Data da Sessão:</label>
    <input name="dataE" value="<?= date("d-m-Y", strtotime(str_replace('/', '-', $evol->getDataE()))) ?>" readonly>

    <div id="divisores">
        <button type="submit" class="btn salvar" value="Salvar" name="enviar">Salvar</button>
        <button type="button" class="btn cancelar" onclick="voltarProntuarioIndividual(<?php echo $evol->getProntuario()->getPaciente()->getId();?>)">Cancelar</button>
    </div>
</form>

<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/uniHealth/visao/rodape.php"); ?>
