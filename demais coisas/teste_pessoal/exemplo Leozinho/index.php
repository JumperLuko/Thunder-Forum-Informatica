<?php
    session_start();
    session_destroy();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Index</title>
    </head>
    <body>

        <form action="processarLogin.php" method="post">

            <h3>Login</h3>
            Email: <input type="text" name="email"><br/>
            senha: <input type="password" name="senha"><br/>
            <br />
            <input type="submit"/>

        </form>

        <a href="cadastro.php">Cadastre-se</a>

    </body>
</html>
