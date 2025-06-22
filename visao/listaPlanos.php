<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/uniHealth/visao/cabecalho.php"); ?>

<?php
        if(isset($status)){echo "<h2>".$status."</h2>";}
        //se $status está preenchida, imprimir ela
?>

<H2 class="exibicao-h2"><?php echo $user->getNome(); ?> </H2><br>

<?php if (!empty($planos) && ($pront !== null)): ?>
    <table border="1px" class="tabelas" id="listaEP">
        <tr>
            <th>ID</th>
            <th>Data</th>
            <th>Objetivos</th>
            <th>Editar</th>
        </tr>
        <?php foreach ($planos as $plan): ?>
            <tr>
                <td><?= $plan->getId(); ?></td>
                <td><a href="http://localhost/uniHealth/plano.php?fun=exibirPlano&id=<?= $plan->getId(); ?>"><?= $plan->getDataP();?></a></td>
                <td><?= nl2br($plan->getObjetivos()); ?></td>
                <td><a href="http://localhost/uniHealth/plano.php?fun=alterarPlano&id=<?= $plan->getId(); ?>"><img src='visao/img/update.png' title='Editar' width='15px'></a></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>
    <div class="card-exibicao">
        <p><strong>Nenhum plano registrado.</strong></p>
    </div>
<?php endif; ?>

<?php if ($pront !== null): ?>
    <a href="http://localhost/uniHealth/plano.php?fun=cadastrarPlano&id=<?= $pront->getPaciente()->getId(); ?>" class="btn salvar">Novo</a>
<?php else: ?>
    <p><a href="http://localhost/uniHealth/prontuario.php?fun=cadastrarPront">Crie um prontuário para elaborar planos.</a></p>
<?php endif; ?>

<button type="button" class="btn cancelar"onclick="window.history.back()">Voltar</button>
     
<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/uniHealth/visao/rodape.php"); ?>