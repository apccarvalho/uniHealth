<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/uniHealth/modelo/ConnectionFactory_class.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/uniHealth/modelo/Usuario.php");

class LoginDAO {
	
    public $pon = null; 
		
	public function __construct(){
			$ponF = new ConnectionFactory();
			$this->con = $ponF->getConnection();
	}

    public function autenticar($usuario, $senha) {
        $sql = "SELECT * FROM usuarios WHERE usuario = :usuario";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':usuario', $usuario);
        $stmt->execute();

        $dados = $stmt->fetch(PDO::FETCH_OBJ);

        if ($dados && $dados->senha){
            $user = new Usuario();
            $user->setId($dados->id);
            $user->setNome($dados->nome);
            $user->setUsuario($dados->usuario);
            return $user;
        }

        return null;
    }
}
