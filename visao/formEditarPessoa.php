	<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/uniHealth/visao/cabecalho.php"); ?>
    
    <main>

		<FORM action="http://localhost/uniHealth/pessoa.php?fun=alterar" method="POST" 
		enctype="multipart/form-data">
				
			<div class="divisores" id="dadosPessoais">
				<p>Dados pessoais</p></br>	
					
				<INPUT type="hidden" name="id" 
			    <?php echo "value='" . $user->getId() . "'"; ?> />
                
                <div class="camposForm">
					<LABEL for="nome" id="teste"> Nome: </LABEL> 
					<INPUT type="text" id="nome" name="nome" <?php echo "value='" . $user->getNome() . "'"; ?>/> <br />
				</div>

				<div class="camposForm">
					<LABEL for="cpf"> CPF: </LABEL> 
					<INPUT type="text" id="cpf" name="cpf" <?php echo "value='" . $user->getCpf() . "'"; ?> /> <br />
				</div>

				<div class="camposForm">
					<LABEL for="dataNascimento"> Data de Nascimento: </LABEL> 
					<INPUT type="date" id="dataNascimento" name="dataNascimento" <?php echo "value='" . $user->getDataNascimento() . "'"; ?> /> <br />
				</div>

				<div class="camposForm">
					<label for="genero">Gênero:</label></br>
					<select name="genero" id="genero">
						<option value=""disabled <?php echo empty($user->getGenero()) ? 'selected' : ''; ?> >Selecione uma opção</option>	
						<option value="F" <?php echo ($user->getGenero() == 'F') ? 'selected' : ''; ?> >Feminino</option>
						<option value="M" <?php echo ($user->getGenero() == 'M') ? 'selected' : ''; ?> >Masculino</option>
						<option value="NB" <?php echo ($user->getGenero() == 'NB') ? 'selected' : ''; ?> >Não Binário</option>
						<option value="ND" <?php echo ($user->getGenero() == 'ND') ? 'selected' : ''; ?>>Não Declarado</option>
					</select><br><br>
				</div>

				</div>

				<div class="divisores">
					<p>Contatos</p></br>
					<div class="camposForm">
						<LABEL for="telefone"> Telefone: </LABEL> 
						<INPUT type="text" id="telefone" name="telefone" <?php echo "value='" . $user->getTelefone() . "'"; ?> /> <br />
					</div>	
					
					<div class="camposForm">
					<LABEL for="email"> Email: </LABEL> 
					<INPUT type="text" id="email" name="email" <?php echo "value='" . $user->getEmail() . "'"; ?> /> <br />
					</div>
				</div>

				<div class="divisores">	
					<p>Endereço</p>	</br>			
					<div class="camposForm">
						<LABEL for="rua"> Rua/Avenida: </LABEL> 
						<INPUT type="text" id="rua" name="rua" <?php echo "value='" . $user->getRua() . "'"; ?> /> <br />
					</div>
					
					<div class="camposForm">
						<LABEL for="numero"> Número: </LABEL> 
						<INPUT type="text" id="numero" name="numero" <?php echo "value='" . $user->getNumero() . "'"; ?> /> <br />
					</div>
					
					<div class="camposForm">
						<LABEL for="bairro"> Bairro: </LABEL> 
						<INPUT type="text" id="bairro" name="bairro" <?php echo "value='" . $user->getBairro() . "'"; ?> /> <br />
					</div>
					<div class="camposForm">
						<LABEL for="cidade"> Cidade: </LABEL> 
						<INPUT type="text" id="cidade" name="cidade" <?php echo "value='" . $user->getCidade() . "'"; ?> /> <br />
					</div>
				</div>

				<div class="divisores">
					<p>Outras Informações</p></br>
					<div class="camposForm">
						<LABEL for="cartaoSus"> Cartão SUS: </LABEL> 
						<INPUT type="text" id="cartaoSus" name="cartaoSus" <?php echo "value='" . $user->getCartaoSus() . "'"; ?> /> <br />
					</div>
					<div class="camposForm">
						<LABEL for="crp"> CRP (Apenas para supervisores): </LABEL> 
						<INPUT type="text" id="crp" name="crp" <?php echo "value='" . $user->getCrp() . "'"; ?> /> <br />
					</div>
				</div>
				</br>
				
				<div id="divisores">
					<button type="submit" class="btn salvar" value="Enviar" name="enviar">Salvar</button>
					<button type="button" class="btn cancelar" onclick="voltarListaCadastros()">Cancelar</button>
				</div>
			
			</FORM>
			<br><br>
	</main>

<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/uniHealth/visao/rodape.php"); ?>