<?php
    include_once("modelo/PessoaDAO.php");
    include_once("modelo/Pessoa.php");
    class CadastrarPessoa{
        public function __construct(){
            if(isset($_POST["enviar"])){
                
                $p = new Pessoa();
                $p->setNome($_POST["nome"]);
                $p->setDataNascimento($_POST["dataNascimento"]);
                $p->setCpf($_POST["cpf"]);
                $p->setGenero($_POST["genero"]);
                $p->setTelefone($_POST["telefone"]);
                $p->setEmail($_POST["email"]);
                $p->setRua($_POST["rua"]);
                $p->setNumero($_POST["numero"]);
                $p->setBairro($_POST["bairro"]);
                $p->setCidade($_POST["cidade"]);
                $p->setCartaoSus($_POST["cartaoSus"]);
                $p->setCrp($_POST["crp"]);

                $dao = new PessoaDAO();
                $dao->cadastrar($p);

                $status = "Cadastro efetuado com sucesso";

                $lista = $dao->listar();

                include_once("visao/listaCadastros.php");
               
            } else{
                include_once("visao/formCadastroPessoas.php");
            }
        }
    }
?>