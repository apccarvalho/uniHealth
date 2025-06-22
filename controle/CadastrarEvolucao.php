<?php
    include_once("modelo/EvolucaoDAO.php");
    include_once("modelo/Evolucao.php");
    include_once("modelo/Prontuario.php");
    include_once("modelo/ProntuarioDAO.php");
    include_once("controle/ExibirPessoa.php");

class CadastrarEvolucao{
    
        public function __construct(){

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            
            if (!isset($_POST["idPaciente"])) {
                die("ID do paciente não informado.");
            }
            
            $resumo = $_POST["resumo"];
            
            $idPaciente = $_POST["idPaciente"];

            //buscar o prontuario pelo id do paciente
            $daoPront = new ProntuarioDAO();
            $pront = $daoPront->exibir($idPaciente);

            if (!$pront) {
                die("Prontuário não encontrado.");
            }

            $evolucao = new Evolucao();
            
            $evolucao->setDataE(date("Y-m-d")); //Data do servidor, invisivel para o user
            $evolucao->setResumo($resumo);
            $evolucao->setProntuario($pront);

            $dao = new EvolucaoDAO();
            $dao->cadastrar($evolucao);

            $_GET["id"] = $idPaciente;
            new ExibirPessoa();


        } else{
            include_once("visao/formCadastrarEvolucao.php");
        }
    }    
}    
?>