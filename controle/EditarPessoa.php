<?php
	include_once("modelo/PessoaDAO.php");
    include_once("modelo/Pessoa.php");
	
	class EditarPessoa{
		public function __construct(){		
			if(isset($_POST["enviar"])){
				//formulário enviar foi enviado
				
                $p = new Pessoa();
                $p->setId($_POST["id"]);
                $p->setNome($_POST["nome"]);
                $p->setDataNascimento($_POST["dataNascimento"]);
                $p->setCpf($_POST["cpf"]);
                $p->setGenero($_POST["genero"]);
                $p->setTelefone($_POST["telefone"]);
                $p->setEmail($_POST["email"]);
                $p->setRua($_POST["rua"]);
                $p->setNumero($_POST["numero"]);
                $p->setBairro($_POST["bairro"]);
                $p->setCidade($_POST["cidade"]);
                $p->setCartaoSus($_POST["cartaoSus"]);
                $p->setCrp($_POST["crp"]);
				
                $dao = new PessoaDAO();
                $dao->alterar($p);
				
				$status = "Alteração efetuada com sucesso";
				
				$lista = $dao->listar();
				
				include_once("visao/listaCadastros.php");
				
			} else{
			
				$dao = new PessoaDAO();
				$user = $dao->exibir($_GET["id"]);
				include_once("visao/formEditarPessoa.php");	
			
			}
		}
	}

?>
