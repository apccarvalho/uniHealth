<?php
    include_once("modelo/PlanoTerapeuticoDAO.php");
    include_once("modelo/PlanoTerapeutico.php");
    include_once("modelo/Prontuario.php");
    include_once("modelo/ProntuarioDAO.php");
    include_once("controle/ExibirPessoa.php");

class CadastrarPlano{
    
        public function __construct(){

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            
            if (!isset($_POST["idPaciente"])) {
                die("ID do paciente não informado.");
            }
            
            $hipoteses = $_POST["hipoteses"];
            $abordagem = $_POST["abordagem"];
            $objetivos = $_POST["objetivos"];
            
            $idPaciente = $_POST["idPaciente"];

            //buscar o prontuario pelo id do paciente
            $daoPront = new ProntuarioDAO();
            $prontuario = $daoPront->exibir($idPaciente);

            if (!$prontuario) {
                die("Prontuário não encontrado.");
            }

            $plano = new PlanoTerapeutico();
            
            $plano->setDataP(date("Y-m-d")); //Data do servidor, invisivel para o user
            $plano->setHipoteses($hipoteses);
            $plano->setAbordagem($abordagem);
            $plano->setObjetivos($objetivos);
            $plano->setProntuario($prontuario);

            $dao = new PlanoTerapeuticoDAO();
            $dao->cadastrar($plano);

            $_GET["id"] = $idPaciente;
            new ExibirPessoa();

        } else{
            include_once("visao/formCadastrarPlano.php");
        }
    }    
}    
?>