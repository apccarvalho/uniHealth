<?php

	include_once("modelo/PlanoTerapeuticoDAO.php");
	
	class ExibirPlano{
	
		public function __construct(){
			
			$dao = new PlanoTerapeuticoDAO();
			$plano = $dao->exibir($_GET["id"]);
			
			include_once("visao/exibePlano.php");	
			
		}
	}

?>