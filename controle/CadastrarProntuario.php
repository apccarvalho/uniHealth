<?php
    include_once("modelo/ProntuarioDAO.php");
    include_once("modelo/Prontuario.php");
    include_once("modelo/Pessoa.php");
    include_once("modelo/PessoaDAO.php");

    class CadastrarProntuario{
        public function __construct(){
            if(isset($_POST["enviar"])){
                $paciente = new Pessoa();
                $paciente->setId($_POST["paciente"]);

                $estagiario = new Pessoa();
                $estagiario->setId($_POST["estagiario"]);

                $supervisor = new Pessoa();
                $supervisor->setId($_POST["supervisor"]);

            // Criar prontuário e preencher os dados
                $p = new Prontuario();
                $p->setPaciente($paciente);
                $p->setEstagiario($estagiario);
                $p->setSupervisor($supervisor);
                $p->setHistoricoFamiliar($_POST["historicoFamiliar"]);
                $p->setQueixaPrincipal($_POST["queixaPrincipal"]);

                $dao = new ProntuarioDAO();
                $dao->cadastrar($p);

                $status = "Cadastro efetuado com sucesso";
                
                $daoPessoa = new PessoaDAO();
                $lista = $daoPessoa->listar();
                include_once("visao/listaCadastros.php");
               
            } else{
                include_once($_SERVER['DOCUMENT_ROOT'] . "/uniHealth/visao/formCadastroProntuario.php");
            }
        }
    }
?>