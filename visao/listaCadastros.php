<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/uniHealth/visao/cabecalho.php"); ?>

    <?php
        if(isset($status)){echo "<h2>".$status."</h2>";}
        //se $status está preenchida, imprimir ela
    ?>

        <div class="busca-container">
            <form method="GET" action="pessoa.php">
                <input type="hidden" name="fun" value="buscar">
                <input type="text" id="busca-input" name="busca" placeholder="Buscar por nome, CPF...">
                <button type="submit" id="busca-btn">Pesquisar</button>
            </form>
        </div>


        <table border="1px" class="tabelas">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Data de Nascimento</th>
                <th>CPF</th>
                <th>Email</th>
                <th>Telefone</th>             
                <th> </th>
            </tr>

        <?php

            foreach($lista as $c){
                echo "<tr>";
                echo "<td>" . $c->getId() . "</td>";
                echo "<td><a href=http://localhost/unihealth/pessoa.php?fun=exibir&id=" . $c->getId() . ">" . $c->getNome() . "</a></td>";
                echo "<td>" . $c->getDataNascimento() . "</td>";
                echo "<td>" . $c->getCpf() . "</td>";
                echo "<td>" . $c->getEmail() . "</td>";
                echo "<td>" . $c->getTelefone() . "</td>";
                echo "<td><a href=http://localhost/unihealth/pessoa.php?fun=alterar&id=" . $c->getId() . "><img src='visao/img/update.png' title='Editar' width='15px'></a></td>";
                echo "</tr>";
            }
        ?>
        </table>  

        <button type="button" class="btn cancelar" onclick="voltarMenuPrincipal()">Voltar</button>
     
<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/uniHealth/visao/rodape.php"); ?>