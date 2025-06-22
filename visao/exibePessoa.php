<?php 
include_once($_SERVER['DOCUMENT_ROOT'] . "/uniHealth/visao/cabecalho.php");

function traduzirGenero($codigo) {
    $generos = [
        'F'  => 'Feminino',
        'M'  => 'Masculino',
        'NB' => 'Não-Binário',
        'ND' => 'Prefere não dizer'
    ];
    return $generos[$codigo] ?? 'Não informado';
}
?>

        <HEAD>
            <TITLE><?php echo $user->getNome(); ?> </TITLE>
        </HEAD>            
            
         <H2 class="exibicao-h2"><?php echo $user->getNome(); ?> </H2>

            <div id="exibir-dados">   
                
                <div class="campo">
                    
                    <p><strong>Data de Nascimento:</strong> <?php echo date("d/m/Y", strtotime($user->getDataNascimento())); ?><br><br>  
                    <p><strong>CPF:</strong> <?php echo $user->getCpf(); ?></p><br>
                    <p><strong>Telefone:</strong> <?php echo $user->getTelefone(); ?></p><br>
                    <p><strong>E-mail:</strong> <?php echo $user->getEmail(); ?></p><br>
                    <p><strong>Cartão SUS:</strong> <?php echo $user->getCartaoSus(); ?></p><br>
                    <p><strong>CRP:</strong> <?php echo $user->getCrp(); ?></p>  
                </div>
                
                <div class="campo"> 
                    <p><strong>Genêro:</strong> <?php echo traduzirGenero($user->getGenero()) ?></p><br>     
                    <p><strong>Rua:</strong> <?php echo $user->getRua(); ?></p><br>
                    <p><strong>Numero:</strong> <?php echo $user->getNumero(); ?></p><br>
                    <p><strong>Bairro:</strong> <?php echo $user->getBairro(); ?></p><br>
                    <p><strong>Cidade:</strong> <?php echo $user->getCidade(); ?></p>
                    
  
                </div>

            </div>    
            <button type="button" class="btn salvar" onclick="editarCadastro(<?php echo $user->getId(); ?>)">Editar</button>
            <button type="button" class="btn cancelar" onclick="voltarListaCadastros()">Voltar</button>
        

<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/uniHealth/visao/rodape.php"); ?>