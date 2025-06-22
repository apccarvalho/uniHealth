<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/uniHealth/visao/cabecalho.php"); ?>

<form action="http://localhost/uniHealth/plano.php?fun=alterarPlano" method="post" class="formulario">


    <input type="hidden" name="id" value="<?= $plano->getId(); ?>">

    <input type="hidden" name="idPaciente" value="<?= $plano->getProntuario()->getPaciente()->getId(); ?>">

    <label for="hipoteses">Hipóteses:</label>
    <textarea name="hipoteses" id="hipoteses" rows="6" required><?= htmlspecialchars($plano->getHipoteses()); ?></textarea>

    <label for="abordagem">Abordagem:</label>
    <textarea name="abordagem" id="abordagem" rows="6" required><?= htmlspecialchars($plano->getAbordagem()); ?></textarea>

    <label for="objetivos">Objetivos:</label>
    <textarea name="objetivos" id="objetivos" rows="6" required><?= htmlspecialchars($plano->getObjetivos()); ?></textarea>

    <label for="dataP">Data do Plano:</label>
    <input name="dataP" value="<?= date("d-m-Y", strtotime(str_replace('/', '-', $plano->getDataP()))) ?>" readonly>

    <div id="divisores">
        <button type="submit" class="btn salvar" value="Enviar" name="enviar">Salvar</button>
        <button type="button" class="btn cancelar" onclick="voltarProntuarioIndividual(<?php echo $plano->getProntuario()->getPaciente()->getId();?>)">Cancelar</button>
    </div>
</form>

<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/uniHealth/visao/rodape.php"); ?>
