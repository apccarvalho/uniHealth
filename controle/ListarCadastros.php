<?php
	include_once("modelo/PessoaDAO.php");
	include_once("modelo/Pessoa.php");

	class ListarCadastros{
	
		public function __construct(){
			$dao = new PessoaDAO();
			$lista = $dao->listar();
			
			include_once("visao/listaCadastros.php");	
	
		}
	}
?>