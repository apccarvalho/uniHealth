<?php
ob_start();
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

	if(isset($_GET["fun"])){
		$fun = $_GET["fun"];
		
		if($fun === "cadastrarEvol"){
			include_once($_SERVER['DOCUMENT_ROOT'] . "/uniHealth/controle/CadastrarEvolucao.php");
    		$pag = new CadastrarEvolucao();
    		exit(); 
			
        }elseif($fun == "exibirEvol"){
			
			include_once("controle/ExibirEvolucao.php");
			$pag = new ExibirEvolucao();
			
		}elseif($fun == "alterarEvol"){
			
			include_once("controle/EditarEvolucao.php");
			$pag = new EditarEvolucao();
			
		}
    }
?>
