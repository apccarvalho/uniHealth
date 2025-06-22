<?php
if (headers_sent()) {
    die("Erro: Headers já enviados antes do formulário!");
}

// Verifique se este formulário já foi incluído
if (isset($formProntuarioIncluido)) {
    die("Erro: Formulário duplicado!");
}
$formProntuarioIncluido = true;
include_once($_SERVER['DOCUMENT_ROOT'] . "/uniHealth/visao/cabecalho.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/uniHealth/modelo/PessoaDAO.php");?>
 
	<header>
		<H1> Novo Prontuário</H1>
	</header>		

	<main>

		<FORM action="http://localhost/uniHealth/prontuario.php?fun=cadastrarPront" method="POST" 
		enctype="multipart/form-data" class="formulario">
				
				<p>Dados de identificação</p>
				<label for="paciente">Paciente:</label>
                <select name="paciente" required>
                <option value="">Selecione o paciente</option>
					<?php 
						$pessoaDAO = new PessoaDAO();
						foreach ($pessoaDAO->listarNomes() as $pessoa): ?>
						<option value="<?= $pessoa['id'] ?>"><?= htmlspecialchars($pessoa['nome']) ?></option>
					<?php endforeach; ?>
                </select>
				</br>

				<label for="estagiario">Estagiário:</label>
                <select name="estagiario" required>
                    <option value="">Selecione o estagiário</option>
                        <?php 
							$pessoaDAO = new PessoaDAO();
							foreach ($pessoaDAO->listarNomes() as $pessoa): ?>
                            <option value="<?= $pessoa['id'] ?>"><?= htmlspecialchars($pessoa['nome']) ?></option>
                        <?php endforeach; ?>
                </select></br>
				
				<label for="supervisor">Supervisor:</label>
                <select name="supervisor" required>
                    <option value="">Selecione o supervisor</option>
                        <?php 
							$pessoaDAO = new PessoaDAO();
							foreach ($pessoaDAO->listarNomes() as $pessoa): ?>
                            <option value="<?= $pessoa['id'] ?>"><?= htmlspecialchars($pessoa['nome']) ?></option>
                        <?php endforeach; ?>
                </select></br>

				<p>Dados adicionais</p>		

				<LABEL for="queixaPrincipal">Queixa inicial: </LABEL></br>
				<textarea name="queixaPrincipal" id="historico" rows="3" cols="60" placeholder="Digite aqui..." required></textarea>
				
				<LABEL for="historicoFamiliar"> Histórico pessoal e familiar: </LABEL></br>
				<textarea name="historicoFamiliar" id="historico" rows="6" cols="60" placeholder="Digite aqui..." required></textarea>

			<div id="divisores">
					<button type="submit" class="btn salvar" value="Enviar" name="enviar">Salvar</button>
					<button type="button" class="btn cancelar" onclick="voltarListaCadastros()">Cancelar</button>
			</div>
		</FORM>
		<br><br>
	</main>

<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/uniHealth/visao/rodape.php"); ?> 



