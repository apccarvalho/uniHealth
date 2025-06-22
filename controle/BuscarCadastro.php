<?php
echo "controle";
include_once($_SERVER['DOCUMENT_ROOT'] . "/uniHealth/modelo/PessoaDAO.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/uniHealth/modelo/Pessoa.php");

class BuscarCadastro {
    
    private $lista = [];

    public function executar() {
        $dao = new PessoaDAO();
        
        if (isset($_GET['busca']) && trim($_GET['busca']) !== '') {
            $busca = trim($_GET['busca']);
            $this->lista = $dao->buscar($busca);
        } else {
            $this->lista = $dao->listar();
        }

        // Para que $lista exista em listaCadastros.php
        $lista = $this->lista;

        include("visao/listaCadastros.php");
    }
}

?>