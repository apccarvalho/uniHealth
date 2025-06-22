<?php
ob_start();
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

	if(isset($_GET["fun"])){
		$fun = $_GET["fun"];
		
		if($fun === "cadastrarPront"){
			include_once($_SERVER['DOCUMENT_ROOT'] . "/uniHealth/controle/CadastrarProntuario.php");
    		$pag = new CadastrarProntuario();
    		exit(); 
		
		}elseif($fun == "alterarPront"){
			
			include_once("controle/EditarProntuario.php");
			$pag = new EditarProntuario();
			
		}
    }
?>
