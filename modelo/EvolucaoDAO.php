<?php
	include_once("ConnectionFactory_class.php");
	include_once("Evolucao.php"); 
	include_once("ProntuarioDAO.php");


	class EvolucaoDAO{
	
		public $eon = null; 
		
		public function __construct(){
			$eonF = new ConnectionFactory();
			$this->con = $eonF->getConnection();
		}
	
		//cadastrar
		public function cadastrar($evolucao){
			try{
				$stmt = $this->con->prepare(
					"INSERT INTO evolucoes(dataE, resumo, prontuario)
					VALUES (:dataE, :resumo, :prontuario)");
                    $stmt->bindValue(":dataE", date("Y-m-d", strtotime($evolucao->getDataE())));					
                    $stmt->bindValue(":resumo", $evolucao->getResumo());
					$stmt->bindValue(":prontuario", $evolucao->getProntuario()->getId());
					
					$stmt->execute(); 
			}
			catch(PDOException $ex){
				echo "Erro: " . $ex->getMessage();
			}
		}
		
		//alterar
		public function alterar($evolucao){
			try{
				$stmt = $this->con->prepare(
					"UPDATE evolucoes SET dataE=:dataE, resumo=:resumo, prontuario=:prontuario WHERE id=:id");
					
					$stmt->bindValue(":id", $evolucao->getId());
                    $stmt->bindValue(":dataE", date("Y-m-d", strtotime($evolucao->getDataE())));					
                    $stmt->bindValue(":resumo", $evolucao->getResumo());
					$stmt->bindValue(":prontuario", $evolucao->getProntuario()->getId());
					
					$this->con->beginTransaction();
					$stmt->execute(); 
					$this->con->commit(); 
			}
			catch(PDOException $ex){
				echo "Erro: " . $ex->getMessage();
			}
		}
		//excluir
		/*public function excluir($evolucao){
			try{
				$num = $this->con->exec("DELETE FROM evolucoes WHERE id = " . $evolucao->getId());
				
				if($num >= 1){
					return 1;
				} else {
					return 0;
				}
			}
			catch(PDOException $ex){
				echo "Erro: " . $ex->getMessage();
			}
		}*/
	
		//listar
		public function listar($query = null){		

			try{
				if($query == null){
					$dados = $this->con->query("SELECT * FROM evolucoes");
				} else {
					$dados = $this->con->query($query);
				}
				$lista = array(); 
				
				$prontuarioDAO = new ProntuarioDAO($this->con);

				foreach($dados as $linha){

					$e = new Evolucao();
					$prontuario = $prontuarioDAO->exibir($linha["prontuario"]);

					$e->setId($linha["id"]);
                    $e->setDataE(date("d/m/Y", strtotime($linha["dataE"])));                   
                    $e->setResumo($linha["resumo"]);
					$e->setProntuario($prontuario);
                 					
					$lista[] = $e;
				}
				return $lista;	
			}
			catch(PDOException $ex){
				echo "Erro: " . $ex->getMessage();
			}
		}
		
		//exibir 
		public function exibir($id){			
			try {
			
				$stmt = $this->con->prepare("SELECT * FROM evolucoes WHERE id = :id");
				$stmt->bindValue(":id", $id, PDO::PARAM_INT);
				$stmt->execute();

				$dado = $stmt->fetch(PDO::FETCH_ASSOC);

				if (!$dado) {
					return null; // Nenhum registro encontrado
				}

				$prontuarioDAO = new ProntuarioDAO($this->con);

				$e = new Evolucao();
				$e->setId($dado["id"]);
				$e->setDataE(date("d/m/Y", strtotime($dado["dataE"])));				
                $e->setResumo($dado["resumo"]);
				$e->setProntuario($prontuarioDAO->exibirPorIdProntuario($dado["prontuario"]));

				return $e;

			} catch(PDOException $ex) {
				echo "Erro: " . $ex->getMessage();
			}
		}	

		public function listarPorProntuario($idProntuario) {
			try {
				$stmt = $this->con->prepare("SELECT * FROM evolucoes WHERE prontuario = :idProntuario ORDER BY dataE ASC");
				$stmt->bindValue(":idProntuario", $idProntuario, PDO::PARAM_INT);
				$stmt->execute();

				$lista = [];
				$prontuarioDAO = new ProntuarioDAO($this->con);
				$prontuario = $prontuarioDAO->exibirPorIdProntuario($idProntuario);

				while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
					$e = new Evolucao();
					$e->setId($linha["id"]);
					$e->setDataE(date("d/m/Y", strtotime($linha["dataE"])));
					$e->setResumo($linha["resumo"]);
					$e->setProntuario($prontuario);

					$lista[] = $e;
				}

				return $lista;

			} catch (PDOException $ex) {
				echo "Erro: " . $ex->getMessage();
				return [];
			}
		}

}

?>