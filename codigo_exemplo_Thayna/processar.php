<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require("conectar.php");

        $nome = $_POST["nome"];
        $mensagem = $_POST["mensagem"];

        $resultado = mysqli_query($conexao, "INSERT INTO mensagens (nome, mensagem) VALUES ('$nome','$mensagem')");
        if ($resultado == false) {
            $erro = mysqli_errno($conexao);
            header("location:erro.php?erro=$erro");
        }
        echo("Mensagem enviada com sucesso!");
        ?>
        Clique <a href="index.php">aqui</a> para voltar
    </body>
</html>
