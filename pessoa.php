<?php
ob_start();
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

	if(isset($_GET["fun"])){
		$fun = $_GET["fun"];
		
		if($fun == "cadastrar"){
			
			include_once("controle/CadastrarPessoa.php");
			$pag = new CadastrarPessoa();
			
        }elseif($fun == "listar"){
			
			include_once("controle/ListarCadastros.php");
			$pag = new ListarCadastros();
			
		}elseif($fun == "alterar"){
			
			include_once("controle/EditarPessoa.php");
			$pag = new EditarPessoa();
			
		} elseif($fun == "buscar"){
			
			include_once("controle/BuscarCadastro.php");
			$busca = new BuscarCadastro();
			$busca->executar();
			
		}  elseif($fun == "exibir") {
			include_once("controle/ExibirPessoa.php");
			$pag = new ExibirPessoa();
		}	
    }
?>
