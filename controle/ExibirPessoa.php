<?php

	include_once("modelo/PessoaDAO.php");
    include_once("modelo/Pessoa.php");
	include_once("modelo/Prontuario.php");
	include_once("modelo/ProntuarioDAO.php");
	include_once("modelo/EvolucaoDAO.php");
	include_once("modelo/PlanoTerapeuticoDAO.php");
	
	class ExibirPessoa{
	
		public function __construct(){
			
			$dao = new PessoaDAO();
			$user = $dao->exibir($_GET["id"]);
			
			$daoPront = new ProntuarioDAO();
			$pront = $daoPront->exibir($_GET["id"]);

			if ($pront !== null) {
				$daoEvol = new EvolucaoDAO();
				$evolucoes = $daoEvol->listarPorProntuario($pront->getId());
				$daoPlano = new PlanoTerapeuticoDAO();
				$planos = $daoPlano->listarPorProntuario($pront->getId());
			}	
			
			include_once("visao/prontuarioIndividual.php");	
			
		}
	}

?>