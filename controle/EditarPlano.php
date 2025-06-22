<?php
include_once("modelo/PlanoTerapeuticoDAO.php");
include_once("modelo/PlanoTerapeutico.php");
include_once("modelo/ProntuarioDAO.php");
include_once("controle/ExibirPessoa.php");

class EditarPlano {
    public function __construct() {

        if (isset($_POST["enviar"])) {
            $plano = new PlanoTerapeutico();
            $plano->setId($_POST["id"]);
            $plano->setHipoteses($_POST["hipoteses"]);
            $plano->setObjetivos($_POST["objetivos"]);
            $plano->setAbordagem($_POST["abordagem"]);
            $plano->setDataP($_POST["dataP"]);

            // Recupera o prontuário pelo paciente
            $daoPront = new ProntuarioDAO();
            $pront = $daoPront->exibir($_POST["idPaciente"]);

            if (!$pront) {
                die("Prontuário não encontrado.");
            }

            $plano->setProntuario($pront);

            $dao = new PlanoTerapeuticoDAO();
            $dao->alterar($plano);

            $_GET["id"] = $_POST["idPaciente"];
            $status = "Plano alterado com sucesso!";
            new ExibirPessoa();

        } else {

            $dao = new PlanoTerapeuticoDAO();
            $plano = $dao->exibir($_GET["id"]);

            if (!$plano) {
                die("Plano não encontrada.");
            }

            include_once("visao/formEditarPlano.php");
        }
    }
}
?>
