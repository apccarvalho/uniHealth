<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="visao/styles/index.css">
    <title>Login</title>
</head>
<body>
    <div class="main-login">
        <div class="left-login">
            <img src="visao/img/logo.png" alt="logotipo" class="left-login-img">
        </div>
        
        <div class="right-login">
            <div class="card-login">
                <h1>Login</h1>

                <form action="validarLogin.php" method="post">

                    <div class="textfield">
                        <label for="usuario">Usuário</label>
                        <input type="text" name="usuario" placeholder="Usuário" required>
                    </div>   

                    <div class="textfield">
                        <label for="senha">Senha</label>
                        <input type="password" name="senha" placeholder="Senha" required>
                    </div> 

                    <button type="submit" class="btn-login">ENTRAR</button>

                </form>

                <?php
                    session_start();
                    if (isset($_SESSION['erro_login'])) {
                        echo '<p style="color: red;">' . $_SESSION['erro_login'] . '</p>';
                        unset($_SESSION['erro_login']);
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>
