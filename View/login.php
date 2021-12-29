<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
    <title>Veículos - Login</title>
    <link href="/View/css/default.css" rel="stylesheet"/>
</head>
<body class="container">
    
    <div>
        <h2 align="center">Faça Login</h2>
        <form action="/auth/validateLogin" method="post" name="login">
            <div>
                <input maxlength='32' name='username' placeholder="Nome de Usuário" type='text' value='' />
            </div>
            <div>
                <input maxlength='32' name='password' placeholder="Senha" type='password' value='' />
            </div>
            <div>
                <input name='submit' type='submit' value='Login' />
            </div>
        </form>
    </div>
    <div class="alert">
        <span>
        <?php
            if(isset($_GET['i'])) {
                echo 'credenciais inválidas';
            } else if($wasLogged) {
                echo 'deslogado com sucesso';
            }
        ?>
        </span>
    </div>
    
</body>
</html>