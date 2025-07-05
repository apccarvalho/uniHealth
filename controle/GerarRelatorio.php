<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/uniHealth/modelo/ProntuarioDAO.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/uniHealth/modelo/PessoaDAO.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/uniHealth/modelo/EvolucaoDAO.php");

function traduzirGenero($codigo) {
    $generos = [
        'F'  => 'Feminino',
        'M'  => 'Masculino',
        'NB' => 'Não-Binário',
        'ND' => 'Prefere não dizer'
    ];
    return $generos[$codigo] ?? 'Não informado';
}

$pacienteId = $_GET['paciente'] ?? null;
$tipo = $_GET['tipo'] ?? 'sintetico';

if (!$pacienteId) {
    echo "Paciente inválido.";
    exit;
}

$pacienteDAO = new PessoaDAO();
$prontuarioDAO = new ProntuarioDAO();
$evolucaoDAO = new EvolucaoDAO();

$paciente = $pacienteDAO->exibir($pacienteId);
$prontuario = $prontuarioDAO->exibir($pacienteId);
if($prontuario){
    $evolucoes = $evolucaoDAO->listarPorProntuario($prontuario->getId());
}


// Exemplo de relatório simples
if ($tipo === 'sintetico') {
    echo "<h2>Relatório de {$paciente->getNome()}</h2><br>";
    echo "<h3>Dados pessoais</h3>";
    echo "<div class='dados'>";
    echo "<div class='campo-a'>";
    echo "<p><strong>CPF:</strong> " . $paciente->getCpf() . "</p>";
    echo "<p><strong>Data de nascimento:</strong> " . date("d/m/Y", strtotime($paciente->getDataNascimento())) . "</p>";
    echo "<p><strong>Gênero:</strong> " .traduzirGenero($paciente->getGenero()) . "</p>";
    echo "<p><strong>Cartão SUS:</strong> " . $paciente->getCartaoSus() . "</p>";
    echo "</div>";
    echo "<div class='campo-a'>";
    echo "<p><strong>Telefone:</strong> " . $paciente->getTelefone() . "</p>";
    echo "<p><strong>Email:</strong> " . $paciente->getEmail() . "</p>";
    echo "<p><strong>Endereço:</strong> " . $paciente->getRua() . ", " . $paciente->getNumero() . "</p>";
    echo "<p><strong>Bairro:</strong> " . $paciente->getBairro() . " - " . $paciente->getCidade() . "</p>";
    echo "</div>";
    echo "</div>";
    echo "<ul>";
    echo "<h3>Consultas</h3><br>";
    if(!$prontuario){
        echo "O referido paciente ainda não compareceu em consultas na clínica até a presente data.";
    }else{
        foreach ($evolucoes as $evol):
            echo "<li>" . $evol->getDataE() . "</li>";           
        endforeach;
        echo "</ul>";
    }

} else {
    echo "<h2>Relatório de {$paciente->getNome()}</h2><br>";
    echo "<h3>Dados pessoais</h3>";
    echo "<div class='dados'>";
    echo "<div class='campo-a'>";
    echo "<p><strong>CPF:</strong> " . $paciente->getCpf() . "</p>";
    echo "<p><strong>Data de nascimento:</strong> " . date("d/m/Y", strtotime($paciente->getDataNascimento())) . "</p>";
    echo "<p><strong>Gênero:</strong> " . traduzirGenero($paciente->getGenero()) . "</p>";
    echo "<p><strong>Cartão SUS:</strong> " . $paciente->getCartaoSus() . "</p>";
    echo "</div>";
    echo "<div class='campo-a'>";
    echo "<p><strong>Telefone:</strong> " . $paciente->getTelefone() . "</p>";
    echo "<p><strong>Email:</strong> " . $paciente->getEmail() . "</p>";
    echo "<p><strong>Endereço:</strong> " . $paciente->getRua() . ", " . $paciente->getNumero() . "</p>";
    echo "<p><strong>Bairro:</strong> " . $paciente->getBairro() . " - " . $paciente->getCidade() . "</p>";
    echo "</div>";
    echo "</div>";
    if(!$prontuario){
        echo "O referido paciente ainda não compareceu em consultas na clínica até a presente data.";
    }else{
        echo "<h3>Histórico</h3><br>";
        echo "<p><strong>Queixa Inicial:</strong> " . $prontuario->getQueixaPrincipal(); "</p><br>";
        echo "<p><strong>Histórico familiar:</strong> " . $prontuario->getHistoricoFamiliar(); "</p><br>";
        
        echo "<h3>Consultas</h3><br>";
        echo "<table border='1px'>";
            echo "<tr>";
            echo "<th>Data</th>";
            echo "<th>Editar</th>";
            echo "</tr>";
            foreach ($evolucoes as $evol):
                echo "<tr>";
                    echo "<td>" . $evol->getDataE() . "</td>"; 
                    echo "<td>" . $evol->getResumo() . "</td>"; 
                echo "</tr>";         
            endforeach;
        echo "</table>";



    }
}
?>