<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/uniHealth/visao/cabecalho.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/uniHealth/modelo/PessoaDAO.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/uniHealth/modelo/ProntuarioDAO.php");
?>

<header>
    <h1>Editar Prontuário</h1>
</header>

<main>
    <form action="http://localhost/uniHealth/prontuario.php?fun=alterarPront" method="POST" 
        enctype="multipart/form-data" class="formulario">

        <input type="hidden" name="id" value="<?= $pront->getId(); ?>">

        <p>Dados de identificação</p>

        <label for="paciente">Paciente:</label>
        <select name="paciente">
            <option value="">Selecione o paciente</option>
            <?php 
            $pessoaDAO = new PessoaDAO();
            foreach ($pessoaDAO->listarNomes() as $pessoa): 
                $selected = ($pront->getPaciente()->getId() == $pessoa['id']) ? 'selected' : '';
            ?>
                <option value="<?= $pessoa['id'] ?>" <?= $selected ?>><?= htmlspecialchars($pessoa['nome']) ?></option>
            <?php endforeach; ?>
        </select><br>

        <label for="estagiario">Estagiário:</label>
        <select name="estagiario">
            <option value="">Selecione o estagiário</option>
            <?php 
            foreach ($pessoaDAO->listarNomes() as $pessoa): 
                $selected = ($pront->getEstagiario()->getId() == $pessoa['id']) ? 'selected' : '';
            ?>
                <option value="<?= $pessoa['id'] ?>" <?= $selected ?>><?= htmlspecialchars($pessoa['nome']) ?></option>
            <?php endforeach; ?>
        </select><br>

        <label for="supervisor">Supervisor:</label>
        <select name="supervisor">
            <option value="">Selecione o supervisor</option>
            <?php 
            foreach ($pessoaDAO->listarNomes() as $pessoa): 
                $selected = ($pront->getSupervisor()->getId() == $pessoa['id']) ? 'selected' : '';
            ?>
                <option value="<?= $pessoa['id'] ?>" <?= $selected ?>><?= htmlspecialchars($pessoa['nome']) ?></option>
            <?php endforeach; ?>
        </select><br>

        <p>Dados adicionais</p>

        <label for="queixaPrincipal">Queixa inicial:</label><br>
        <textarea name="queixaPrincipal" id="queixa" rows="3" cols="60" placeholder="Digite aqui..."><?= htmlspecialchars($pront->getQueixaPrincipal()) ?></textarea><br>

        <label for="historicoFamiliar">Histórico pessoal e familiar:</label><br>
        <textarea name="historicoFamiliar" id="historico" rows="6" cols="60" placeholder="Digite aqui..."><?= htmlspecialchars($pront->getHistoricoFamiliar()) ?></textarea><br>

        <div id="divisores">
            <button type="submit" class="btn salvar" value="Salvar" name="enviar">Salvar</button>
            <button type="button" class="btn cancelar" onclick="window.history.back()">Cancelar</button>
        </div>
    </form>
    <br><br>
</main>

<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/uniHealth/visao/rodape.php"); ?>
