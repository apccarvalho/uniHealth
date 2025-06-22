<?php
	include_once("modelo/PessoaDAO.php");
    include_once("modelo/Pessoa.php");
    include_once("modelo/ProntuarioDAO.php");
	
	class EditarProntuario{
		public function __construct(){		
				
            if(isset($_POST["enviar"])){
                $paciente = new Pessoa();
                $paciente->setId($_POST["paciente"]);

                $estagiario = new Pessoa();
                $estagiario->setId($_POST["estagiario"]);

                $supervisor = new Pessoa();
                $supervisor->setId($_POST["supervisor"]);

                $pront = new Prontuario();
                $pront->setId($_POST["id"]);
                $pront->setPaciente($paciente);
                $pront->setEstagiario($estagiario);
                $pront->setSupervisor($supervisor);
                $pront->setHistoricoFamiliar($_POST["historicoFamiliar"]);
                $pront->setQueixaPrincipal($_POST["queixaPrincipal"]);
				
                $daoPront = new ProntuarioDAO();
                $daoPront->alterar($pront);
				
				$status = "Alteração efetuada com sucesso";
				
                $daoPessoa = new PessoaDAO();
				$lista = $daoPessoa->listar();
				
				include_once("visao/listaCadastros.php");
				
			} else{
				$dao = new PessoaDAO();
				$user = $dao->exibir($_GET["id"]);
                $daoPront = new ProntuarioDAO();
                $pront = $daoPront->exibirPorIdProntuario($_GET["id"]);

				include_once("visao/formEditarProntuario.php");	
			
			}
		}
	}

?>
