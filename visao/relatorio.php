<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/uniHealth/visao/cabecalho.php"); ?>
<?php

include_once($_SERVER['DOCUMENT_ROOT'] . "/uniHealth/modelo/PessoaDAO.php");
$pacienteDAO = new PessoaDAO();
$lista = $pacienteDAO->listar();
?>

<head>
    <link rel="stylesheet" href="http://localhost/uniHealth/visao/styles/relatorio.css">
    <title>Relatórios</title>
</head>

<h2>Gerar Relatório do Paciente</h2>

<form method="post" id="formRelatorio">
    <label for="paciente">Paciente:</label>
    <select name="paciente" id="paciente" required>
        <option value="">Selecione</option>
        <?php foreach ($lista as $pac): ?>
            <option value="<?= $pac->getId(); ?>"><?= $pac->getNome(); ?></option>
        <?php endforeach; ?>
    </select><br><br>
    
    
    <label>Tipo de relatório:</label><br>
    <div class="grupo-radio">
        <label class="radio-opcao">
            <input type="radio" name="tipo" value="sintetico" checked>
            Sintético
        </label>
        <label class="radio-opcao">
            <input type="radio" name="tipo" value="analitico">
            Analítico
        </label>
    </div>

    <button type="button" class="btn salvar" id="botaoRelatorio">Gerar Relatório PDF</button>
</form>

<hr>

<div id="area-pdf">
     <!-- Conteúdo será preenchido com JavaScript -->
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/uniHealth/visao/rodape.php"); ?>