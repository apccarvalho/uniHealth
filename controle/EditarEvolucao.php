<?php
include_once("modelo/EvolucaoDAO.php");
include_once("modelo/Evolucao.php");
include_once("modelo/ProntuarioDAO.php");
include_once("controle/ExibirPessoa.php");

class EditarEvolucao {
    public function __construct() {

        if (isset($_POST["enviar"])) {
            $evol = new Evolucao();
            $evol->setId($_POST["id"]);
            $evol->setResumo($_POST["resumo"]);
            $evol->setDataE($_POST["dataE"]);

            // Recupera o prontuário pelo paciente
            $daoPront = new ProntuarioDAO();
            $pront = $daoPront->exibir($_POST["idPaciente"]);

            if (!$pront) {
                die("Prontuário não encontrado.");
            }

            $evol->setProntuario($pront);

            $dao = new EvolucaoDAO();
            $dao->alterar($evol);

            $_GET["id"] = $_POST["idPaciente"];
            $status = "Evolução alterada com sucesso!";
            new ExibirPessoa();

        } else {

            $dao = new EvolucaoDAO();
            $evol = $dao->exibir($_GET["id"]);

            if (!$evol) {
                die("Evolução não encontrada.");
            }

            include_once("visao/formEditarEvolucao.php");
        }
    }
}
?>
