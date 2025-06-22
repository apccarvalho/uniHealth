<?php
	include_once("ConnectionFactory_class.php");
	include_once("Pessoa.php"); 
	
	class PessoaDAO{
	
		public $pon = null; 
		
		public function __construct(){
			$ponF = new ConnectionFactory();
			$this->con = $ponF->getConnection();
		}
	
		//cadastrar
		public function cadastrar($pessoa){
			try{
				$stmt = $this->con->prepare(
					"INSERT INTO pessoas(nome, data_nascimento, cpf, genero, telefone, email, rua, numero, bairro, cidade, cartao_sus, crp)
					VALUES (:nome, :dataNascimento, :cpf, :genero, :telefone, :email, :rua, :numero, :bairro, :cidade, :cartaoSus, :crp)");
					$stmt->bindValue(":nome", $pessoa->getNome());
					$stmt->bindValue(":dataNascimento", date("Y-m-d", strtotime($pessoa->getDataNascimento())));
					$stmt->bindValue(":cpf", $pessoa->getCpf());
                    $stmt->bindValue(":genero", $pessoa->getGenero());
                    $stmt->bindValue(":telefone", $pessoa->getTelefone());
					$stmt->bindValue(":email", $pessoa->getEmail());
                    $stmt->bindValue(":rua", $pessoa->getRua());
                    $stmt->bindValue(":numero", $pessoa->getNumero());
                    $stmt->bindValue(":bairro", $pessoa->getBairro());
                    $stmt->bindValue(":cidade", $pessoa->getCidade());
                    $stmt->bindValue(":cartaoSus", $pessoa->getCartaoSus());
                    $stmt->bindValue(":crp", $pessoa->getCrp());	
					
					$stmt->execute(); 

			}
			catch(PDOException $ex){
				echo "Erro: " . $ex->getMessage();
			}
		}
		
		//alterar
		public function alterar($pessoa){
			try{
				$stmt = $this->con->prepare(
					"UPDATE pessoas SET nome=:nome, data_nascimento=:dataNascimento, cpf=:cpf, genero=:genero,
					telefone=:telefone, email=:email, rua=:rua, numero=:numero, bairro=:bairro, cidade=:cidade, cartao_sus=:cartaoSus, 
                    crp=:crp WHERE id=:id");
					
					$stmt->bindValue(":id", $pessoa->getId());
                    $stmt->bindValue(":nome", $pessoa->getNome());
					$stmt->bindValue(":dataNascimento", date("Y-m-d", strtotime($pessoa->getDataNascimento())));
					$stmt->bindValue(":cpf", $pessoa->getCpf());
                    $stmt->bindValue(":genero", $pessoa->getGenero());
                    $stmt->bindValue(":telefone", $pessoa->getTelefone());
					$stmt->bindValue(":email", $pessoa->getEmail());
                    $stmt->bindValue(":rua", $pessoa->getRua());
                    $stmt->bindValue(":numero", $pessoa->getNumero());
                    $stmt->bindValue(":bairro", $pessoa->getBairro());
                    $stmt->bindValue(":cidade", $pessoa->getCidade());
                    $stmt->bindValue(":cartaoSus", $pessoa->getCartaoSus());
                    $stmt->bindValue(":crp", $pessoa->getCrp());
					
					$this->con->beginTransaction();
					$stmt->execute(); 
					$this->con->commit(); 
			}
			catch(PDOException $ex){
				echo "Erro: " . $ex->getMessage();
			}
		}
		//excluir
		public function excluir($pessoa){
			try{
				$num = $this->con->exec("DELETE FROM pessoas WHERE id = " . $pessoa->getId());
				
				if($num >= 1){
					return 1;
				} else {
					return 0;
				}
			}
			catch(PDOException $ex){
				echo "Erro: " . $ex->getMessage();
			}
		}
	
		//listar
		public function listar($query = null){		

			try{
				if($query == null){
					$dados = $this->con->query("SELECT * FROM pessoas");
				} else {
					$dados = $this->con->query($query);
				}
				$lista = array(); 

				foreach($dados as $linha){

					$p = new Pessoa();
					$p->setId($linha["id"]);
					$p->setNome($linha["nome"]);
					$p->setDataNascimento(date("d/m/Y", strtotime($linha["data_nascimento"])));
					$p->setCpf($linha["cpf"]);
                    $p->setGenero($linha["genero"]);
                    $p->setTelefone($linha["telefone"]);
                    $p->setEmail($linha["email"]);	
                    $p->setRua($linha["rua"]);
                    $p->setNumero($linha["numero"]);
                    $p->setBairro($linha["bairro"]);
                    $p->setCidade($linha["cidade"]);
                    $p->setCartaoSus($linha["cartao_sus"]);
                    $p->setCrp($linha["crp"]);
						
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
			try{				
				$lista = $this->con->query("SELECT * FROM pessoas WHERE id = " . $id);
				
				$dado = $lista->fetchAll(PDO::FETCH_ASSOC);
				
				$p = new Pessoa();
				$p->setId($dado[0]["id"]);
				$p->setNome($dado[0]["nome"]);
				$p->setDataNascimento($dado[0]["data_nascimento"]);
				$p->setCpf($dado[0]["cpf"]);
                $p->setGenero($dado[0]["genero"]);
                $p->setTelefone($dado[0]["telefone"]);
                $p->setEmail($dado[0]["email"]);	
                $p->setRua($dado[0]["rua"]);
                $p->setNumero($dado[0]["numero"]);
                $p->setBairro($dado[0]["bairro"]);
                $p->setCidade($dado[0]["cidade"]);
                $p->setCartaoSus($dado[0]["cartao_sus"]);
                $p->setCrp($dado[0]["crp"]);
				
				return $p;	
			}
			catch(PDOException $ex){
				echo "Erro: " . $ex->getMessage();
			}
		}

		public function listarNomes(){

			try{				
				$stmt = $this->con->query("SELECT id,nome FROM pessoas ORDER BY nome ASC");
				$stmt->execute(); 
				$nomes = [];
				
				while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
					$nomes[] = [
						'id' => $linha['id'],
						'nome' => $linha['nome']
					];
   				}
				return $nomes;	
			}
			catch(PDOException $ex){
				echo "Erro: " . $ex->getMessage();
				return [];
			}

		}

		public function buscar($termo){
			try {
				$sql = "SELECT * FROM pessoas WHERE nome LIKE :termo OR cpf LIKE :termo OR id LIKE :termo";
				$stmt = $this->con->prepare($sql);
				$termo = '%' . $termo . '%';
				$stmt->bindValue(":termo", $termo);
				$stmt->execute();

				$dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
				$lista = [];

				foreach ($dados as $dado) {
					$p = new Pessoa();
					$p->setId($dado["id"]);
					$p->setNome($dado["nome"]);
					$p->setDataNascimento($dado["data_nascimento"]);
					$p->setCpf($dado["cpf"]);
					$p->setGenero($dado["genero"]);
					$p->setTelefone($dado["telefone"]);
					$p->setEmail($dado["email"]);
					$p->setRua($dado["rua"]);
					$p->setNumero($dado["numero"]);
					$p->setBairro($dado["bairro"]);
					$p->setCidade($dado["cidade"]);
					$p->setCartaoSus($dado["cartao_sus"]);
					$p->setCrp($dado["crp"]);

					$lista[] = $p;
				}

       		return $lista;
			}	
			catch(PDOException $ex){
				echo "Erro: " . $ex->getMessage();
				return [];
			}
		}
	}
?>