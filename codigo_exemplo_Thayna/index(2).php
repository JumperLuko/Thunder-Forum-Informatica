<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <?php
    $conexao = mysqli_connect("localhost", "root", "", "teste");
    if ($conexao == false) {
        echo("Erro de conexão com o banco de dados. Entre em contato com o administrador.");
        $erro = mysqli_connect_error($conexao);
        echo ($erro);
    } else {
        $comando = mysqli_query($conexao, "SELECT * FROM mensagens");
        if ($comando == false) {
            echo ("erro ao enviar comando para o banco de dados.");
            $erro = mysqli_error($conexao);
            echo($erro);
        } else {
            $mensagens = mysqli_fetch_all($comando, MYSQLI_ASSOC);
            foreach ($mensagens as $umaMensagem) {
                echo($umaMensagem["Nome"] . ": " . $umaMensagem["Mensagem"] . '<br />');
            }
        }
    }
    ?>
    Clique <a href="login.php">aqui</a> para fazer o login
    <form action="processar.php" method="post">

        Nome: <input type="text" name="nome" />
        Mensagem: <input type="text" name="mensagem" />
        <input type="submit" />

    </form>
</body>
</html>