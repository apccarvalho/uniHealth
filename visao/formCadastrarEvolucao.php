<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/uniHealth/visao/cabecalho.php"); ?>

<form action="http://localhost/uniHealth/evolucao.php?fun=cadastrarEvol" method="post" class="formulario">
    
    <input type="hidden" name="idPaciente" value="<?= $_GET['id']; ?>">

    <label for="resumo">Resumo da Sessão:</label>
    <textarea name="resumo" id="resumo" rows="6" required></textarea>

    <div id="divisores">
        <button type="submit" class="btn salvar" value="Enviar" name="enviar">Salvar</button>
        <button type="button" class="btn cancelar" onclick="voltarListaCadastros()">Cancelar</button>
    </div>
</form>


<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/uniHealth/visao/rodape.php"); ?>