<?php
	include_once("ConnectionFactory_class.php");
	include_once("PlanoTerapeutico.php"); 
	include_once("ProntuarioDAO.php"); 
	include_once("Prontuario.php"); 

	class PlanoTerapeuticoDAO{
	
		public $pon = null; 
		
		public function __construct(){
			$ponF = new ConnectionFactory();
			$this->con = $ponF->getConnection();
		}
	
		//cadastrar
		public function cadastrar($plano){
			try{
				$stmt = $this->con->prepare(
					"INSERT INTO planos(objetivos, abordagem, hipoteses, dataP, prontuario)
					VALUES (:objetivos, :abordagem, :hipoteses, :dataP, :prontuario)");
					$stmt->bindValue(":objetivos", $plano->getObjetivos());
					$stmt->bindValue(":abordagem", $plano->getAbordagem());
					$stmt->bindValue(":hipoteses", $plano->getHipoteses());
                    $stmt->bindValue(":dataP", date("Y-m-d", strtotime($plano->getDataP())));
					$stmt->bindValue(":prontuario", $plano->getProntuario()->getId());

					$stmt->execute(); 
			}
			catch(PDOException $ex){
				echo "Erro: " . $ex->getMessage();
			}
		}
		
		//alterar
		public function alterar($plano){
			try{
				$stmt = $this->con->prepare(
					"UPDATE planos SET objetivos=:objetivos, abordagem=:abordagem, hipoteses=:hipoteses, dataP=:dataP, prontuario=:prontuario WHERE id=:id");
					
					$stmt->bindValue(":id", $plano->getId());
					$stmt->bindValue(":objetivos", $plano->getObjetivos());
					$stmt->bindValue(":abordagem", $plano->getAbordagem());
					$stmt->bindValue(":hipoteses", $plano->getHipoteses());
                    $stmt->bindValue(":dataP", date("Y-m-d", strtotime($plano->getDataP())));
          			$stmt->bindValue(":prontuario", $plano->getProntuario()->getId());
					
					$this->con->beginTransaction();
					$stmt->execute(); 
					$this->con->commit(); 
			}
			catch(PDOException $ex){
				echo "Erro: " . $ex->getMessage();
			}
		}
		//excluir
		/*public function excluir($plano){
			try{
				$num = $this->con->exec("DELETE FROM planos WHERE id = " . $plano->getId());
				
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
					$dados = $this->con->query("SELECT * FROM planos");
				} else {
					$dados = $this->con->query($query);
				}
				$lista = array(); 
				$prontuarioDAO = new ProntuarioDAO($this->con);

				foreach($dados as $linha){

					$p = new PlanoTerapeutico();
					$prontuario = $prontuarioDAO->exibir($linha["prontuario"]);

					$p->setId($linha["id"]);
                    $p->setObjetivos($linha["objetivos"]);
                    $p->setAbordagem($linha["abordagem"]);	
                    $p->setHipoteses($linha["hipoteses"]);
                    $p->setDataP(date("d/m/Y", strtotime($linha["dataP"])));
					$p->setProntuario($prontuario);
						
					$lista[] = $p;
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
			
				$stmt = $this->con->prepare("SELECT * FROM planos WHERE id = :id");
				$stmt->bindValue(":id", $id, PDO::PARAM_INT);
				$stmt->execute();

				$dado = $stmt->fetch(PDO::FETCH_ASSOC);

				if (!$dado) {
					return null; // Nenhum registro encontrado
				}

				$prontuarioDAO = new ProntuarioDAO($this->con);
				$p = new PlanoTerapeutico();
				$p->setId($dado["id"]);
				$p->setObjetivos($dado["objetivos"]);
				$p->setAbordagem($dado["abordagem"]);
				$p->setHipoteses($dado["hipoteses"]);
				$p->setDataP(date("d/m/Y", strtotime($dado["dataP"])));
				$p->setProntuario($prontuarioDAO->exibirPorIdProntuario($dado["prontuario"]));

				return $p;

			} catch(PDOException $ex) {
				echo "Erro: " . $ex->getMessage();
			}
		}	

		public function listarPorProntuario($idProntuario) {
			try {
				$stmt = $this->con->prepare("SELECT * FROM planos WHERE prontuario = :idProntuario ORDER BY dataP DESC");
				$stmt->bindValue(":idProntuario", $idProntuario, PDO::PARAM_INT);
				$stmt->execute();

				$lista = [];
				$prontuarioDAO = new ProntuarioDAO($this->con);
				$prontuario = $prontuarioDAO->exibirPorIdProntuario($idProntuario);

				while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
					$pl = new PlanoTerapeutico();
					$pl->setId($linha["id"]);
					$pl->setDataP(date("d/m/Y", strtotime($linha["dataP"])));
					$pl->setObjetivos($linha["objetivos"]);
					$pl->setAbordagem($linha["abordagem"]);
					$pl->setHipoteses($linha["hipoteses"]);
					$pl->setProntuario($prontuario);

					$lista[] = $pl;
				}

				return $lista;

			} catch (PDOException $ex) {
				echo "Erro: " . $ex->getMessage();
				return [];
			}
		}



	}

?>