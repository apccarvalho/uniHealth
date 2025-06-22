<?php
	include_once("ConnectionFactory_class.php");
	include_once("Prontuario.php"); 
	include_once("PlanoTerapeutico.php"); 
	include_once("Evolucao.php"); 
	include_once("Pessoa.php"); 
	include_once("PessoaDAO.php");

	class ProntuarioDAO{
	
		public $pon = null; 
		
		public function __construct(){
			$ponF = new ConnectionFactory();
			$this->con = $ponF->getConnection();
		}
	
		//cadastrar
		public function cadastrar($prontuario){
			try{
				$stmt = $this->con->prepare(
					"INSERT INTO prontuarios(paciente, estagiario, supervisor, historicoFamiliar, queixaPrincipal)
					VALUES (:paciente, :estagiario, :supervisor, :historicoFamiliar, :queixaPrincipal)");
					$stmt->bindValue(":paciente", $prontuario->getPaciente()->getId());
					$stmt->bindValue(":estagiario", $prontuario->getEstagiario()->getId());
					$stmt->bindValue(":supervisor", $prontuario->getSupervisor()->getId());
                    $stmt->bindValue(":historicoFamiliar", $prontuario->getHistoricoFamiliar());
                    $stmt->bindValue(":queixaPrincipal", $prontuario->getQueixaPrincipal());
					
					$stmt->execute(); 

					$idProntuario = $this->con->lastInsertId();

					
			}
			catch(PDOException $ex){
				echo "Erro: " . $ex->getMessage();
			}
		}
		
		//alterar
		public function alterar($prontuario){
			try{
				$stmt = $this->con->prepare(
					"UPDATE prontuarios SET paciente=:paciente, estagiario=:estagiario, supervisor=:supervisor, historicoFamiliar=:historicoFamiliar, queixaPrincipal=:queixaPrincipal WHERE id=:id");
					
					$stmt->bindValue(":id", $prontuario->getId());
                    $stmt->bindValue(":paciente", $prontuario->getPaciente()->getId());
					$stmt->bindValue(":estagiario", $prontuario->getEstagiario()->getId());
                    $stmt->bindValue(":supervisor", $prontuario->getSupervisor()->getId());
                    $stmt->bindValue(":historicoFamiliar", $prontuario->getHistoricoFamiliar());
					$stmt->bindValue(":queixaPrincipal", $prontuario->getQueixaPrincipal());
          					
					$this->con->beginTransaction();
					$stmt->execute(); 
					$this->con->commit(); 
			}
			catch(PDOException $ex){
				echo "Erro: " . $ex->getMessage();
			}
		}
		//excluir
		/*public function excluir($prontuario){
			try{
				$num = $this->con->exec("DELETE FROM prontuarios WHERE id = " . $prontuario->getId());
				
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
					$dados = $this->con->query("SELECT * FROM prontuarios");
				} else {
					$dados = $this->con->query($query);
				}
				$lista = array(); 

				// DAOs auxiliares para montar os objetos relacionados
				$pessoaDAO = new PessoaDAO($this->con);

				foreach($dados as $linha){

					$p = new Prontuario();

					//Montando os objetos associados
					$paciente = $pessoaDAO->exibir($linha["paciente"]);
					$estagiario = $pessoaDAO->exibir($linha["estagiario"]);
					$supervisor = $pessoaDAO->exibir($linha["supervisor"]);	

					$p->setId($linha["id"]);
					$p->setPaciente($paciente);
					$p->setEstagiario($estagiario);
                    $p->setSupervisor($supervisor);
                    $p->setHistoricoFamiliar($linha["HistoricoFamiliar"]);
                    $p->setQueixaPrincipal($linha["queixaPrincipal"]);	
						
					$lista[] = $p;
				}
				return $lista;	
			}
			catch(PDOException $ex){
				echo "Erro: " . $ex->getMessage();
			}
		}
		
		//exibir por paciente
		public function exibir($idPaciente){			
			try {
			
				$stmt = $this->con->prepare("SELECT * FROM prontuarios WHERE paciente = :idPaciente");
				$stmt->bindValue(":idPaciente", $idPaciente, PDO::PARAM_INT);
				$stmt->execute();

				$dado = $stmt->fetch(PDO::FETCH_ASSOC);

				if (!$dado) {
					return null; // Nenhum registro encontrado
				}

				// DAOs auxiliares para montar os objetos relacionados
				$pessoaDAO = new PessoaDAO($this->con);
				//$planoDAO = new PlanoDAO($this->con);
				//$evolucaoDAO = new EvolucaoDAO($this->con);

				$p = new Prontuario();
				$p->setId($dado["id"]);
				$p->setPaciente($pessoaDAO->exibir($dado["paciente"])); 
				$p->setEstagiario($pessoaDAO->exibir($dado["estagiario"]));
				$p->setSupervisor($pessoaDAO->exibir($dado["supervisor"]));
				$p->setHistoricoFamiliar($dado["historicoFamiliar"]);
				$p->setQueixaPrincipal($dado["queixaPrincipal"]);

				return $p;

			} catch(PDOException $ex) {
				echo "Erro: " . $ex->getMessage();
			}
		}
		
		//exibir por prontuario
		public function exibirPorIdProntuario($idProntuario) {
			try {
				$stmt = $this->con->prepare("SELECT * FROM prontuarios WHERE id = :idProntuario");
				$stmt->bindValue(":idProntuario", $idProntuario, PDO::PARAM_INT);
				$stmt->execute();
				$dado = $stmt->fetch(PDO::FETCH_ASSOC);

				if (!$dado) {
					return null;
				}

				//DAOs auxiliares
				$pessoaDAO = new PessoaDAO();

				// Criar Prontuario
				$p = new Prontuario();
				$p->setId($dado["id"]);

				// Objetos 
				$paciente = $pessoaDAO->exibir($dado["paciente"]);
				$estagiario = $pessoaDAO->exibir($dado["estagiario"]);
				$supervisor = $pessoaDAO->exibir($dado["supervisor"]);

				$p->setPaciente($paciente);
				$p->setEstagiario($estagiario);
				$p->setSupervisor($supervisor);
				$p->setHistoricoFamiliar($dado["historicoFamiliar"]);
				$p->setQueixaPrincipal($dado["queixaPrincipal"]);

				return $p;

			} catch (PDOException $ex) {
				echo "Erro: " . $ex->getMessage();
			}
		}	
	}

?>