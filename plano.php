<?php
ob_start();
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

	if(isset($_GET["fun"])){
		$fun = $_GET["fun"];
		
		if($fun === "cadastrarPlano"){
			include_once($_SERVER['DOCUMENT_ROOT'] . "/uniHealth/controle/CadastrarPlano.php");
    		$pag = new CadastrarPlano();
    		exit(); 
			
        }elseif($fun == "exibirPlano"){
			
			include_once("controle/ExibirPlano.php");
			$pag = new ExibirPlano();
			
		}elseif($fun == "alterarPlano"){
			
			include_once("controle/EditarPlano.php");
			$pag = new EditarPlano();
			
		}
    }
?>
