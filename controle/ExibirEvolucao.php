<?php

	include_once("modelo/EvolucaoDAO.php");
	
	class ExibirEvolucao{
	
		public function __construct(){
			
			$dao = new EvolucaoDAO();
			$evol = $dao->exibir($_GET["id"]);
			
			include_once("visao/exibeEvolucao.php");	
			
		}
	}

?>