<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/uniHealth/visao/cabecalho.php"); ?>

<form action="http://localhost/uniHealth/plano.php?fun=cadastrarPlano" method="post" class="formulario">
    
    <input type="hidden" name="idPaciente" value="<?= $_GET['id']; ?>">

    <label for="hipoteses">Hipóteses:</label>
    <textarea name="hipoteses" id="hipoteses" rows="6" required></textarea>

    <label for="abordagem">Abordagem:</label>
    <textarea name="abordagem" id="abordagem" rows="6" required></textarea>
    
    <label for="objetivos">Objetivos:</label>
    <textarea name="objetivos" id="objetivos" rows="6" required></textarea>


    <div id="divisores">
        <button type="submit" class="btn salvar" value="Enviar" name="enviar">Salvar</button>
        <button type="button" class="btn cancelar" onclick="voltarListaCadastros()">Cancelar</button>
    </div>
</form>


<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/uniHealth/visao/rodape.php"); ?>