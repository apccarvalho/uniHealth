<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/uniHealth/visao/cabecalho.php"); ?>

<head>
	<title>Cadastro</title>
</head>
<body>
	
	<header>
		<H1> Cadastro</H1>
	</header>		

	<main>

		<FORM action="http://localhost/uniHealth/pessoa.php?fun=cadastrar" method="POST" 
		enctype="multipart/form-data" >
				
			<div class="divisores" id="dadosPessoais">
				<p>Dados pessoais</p></br>	
					
				<div class="camposForm">
					<LABEL for="nome" id="teste"> Nome: </LABEL> 
					<INPUT type="text" id="nome" name="nome" placeholder="Nome completo" required/> <br />
				</div>

				<div class="camposForm">
					<LABEL for="cpf"> CPF: </LABEL> 
					<INPUT type="text" id="cpf" name="cpf" placeholder="xxx.xxx.xxx-xx" required /> <br />
				</div>

				<div class="camposForm">
					<LABEL for="dataNascimento"> Data de Nascimento: </LABEL> 
					<INPUT type="date" id="dataNascimento" name="dataNascimento" placeholder="xx-xx-xxxx" required /> <br />
				</div>

				<div class="camposForm">
					<label for="genero">Gênero:</label></br>
					<select name="genero" id="genero" required>
						<option value="" selected disabled>Selecione uma opção</option>	
						<option value="F">Feminino</option>
						<option value="M">Masculino</option>
						<option value="NB">Não Binário</option>
						<option value="ND">Não Declarado</option>
					</select><br><br>
				</div>
			
				</div>

				<div class="divisores">
					<p>Contatos</p></br>
					<div class="camposForm">
						<LABEL for="telefone"> Telefone: </LABEL> 
						<INPUT type="text" id="telefone" name="telefone" placeholder="(xx)xxxxx-xxxx" required /> <br />
					</div>	
					
					<div class="camposForm">
					<LABEL for="email"> Email: </LABEL> 
					<INPUT type="text" id="email" name="email" placeholder="meuemail@email.com" required /> <br />
					</div>
				</div>

				<div class="divisores">	
					<p>Endereço</p>	</br>			
					<div class="camposForm">
						<LABEL for="rua"> Rua/Avenida: </LABEL> 
						<INPUT type="text" id="rua" name="rua" placeholder="Rua das Flores / Av das Flores" required /> <br />
					</div>
					
					<div class="camposForm">
						<LABEL for="numero"> Número: </LABEL> 
						<INPUT type="text" id="numero" name="numero" required /> <br />
					</div>
					
					<div class="camposForm">
						<LABEL for="bairro"> Bairro: </LABEL> 
						<INPUT type="text" id="bairro" name="bairro" required /> <br />
					</div>
					<div class="camposForm">
						<LABEL for="cidade"> Cidade: </LABEL> 
						<INPUT type="text" id="cidade" name="cidade" required /> <br />
					</div>
				</div>

				<div class="divisores">
					<p>Outras Informações</p></br>
					<div class="camposForm">
						<LABEL for="cartaoSus"> Cartão SUS: </LABEL> 
						<INPUT type="text" id="cartaoSus" name="cartaoSus" /> <br />
					</div>
					<div class="camposForm">
						<LABEL for="crp"> CRP (Apenas para supervisores): </LABEL> 
						<INPUT type="text" id="crp" name="crp"/> <br />
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
</body>

<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/uniHealth/visao/rodape.php"); ?>



