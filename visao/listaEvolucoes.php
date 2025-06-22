<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/uniHealth/visao/cabecalho.php"); ?>

<?php
        if(isset($status)){echo "<h2>".$status."</h2>";}
        //se $status está preenchida, imprimir ela
?>

 <H2 class="exibicao-h2"><?php echo $user->getNome(); ?> </H2><br>

<?php if (!empty($evolucoes) && ($pront !== null)): ?>
    <table border="1px" class="tabelas" id="listaEP">
        <tr>
            <th>ID</th>
            <th>Data</th>
            <th>Editar</th>
        </tr>
        <?php foreach ($evolucoes as $evol): ?>
            <tr>
                <td><?= $evol->getId(); ?></td>
                <td><a href="http://localhost/uniHealth/evolucao.php?fun=exibirEvol&id=<?= $evol->getId(); ?>"><?= $evol->getDataE();?></a></td>
                <td><a href="http://localhost/uniHealth/evolucao.php?fun=alterarEvol&id=<?= $evol->getId(); ?>"><img src='visao/img/update.png' title='Editar' width='15px'></a></td>   
            </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>
    <div class="card-exibicao">
        <p><strong>Nenhuma evolução registrada.</strong></p>
    </div>    
<?php endif; ?>
        
<?php if ($pront !== null): ?>
    <a href="http://localhost/uniHealth/evolucao.php?fun=cadastrarEvol&id=<?= $pront->getPaciente()->getId(); ?>" class="btn salvar">Novo</a>
<?php else: ?>
    <p><a href="http://localhost/uniHealth/prontuario.php?fun=cadastrarPront">Crie um prontuário para acompanhar as evoluções.</a></p>
<?php endif; ?>

<button type="button" class="btn cancelar" onclick="voltarListaCadastros()">Voltar</button>
     
<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/uniHealth/visao/rodape.php"); ?>