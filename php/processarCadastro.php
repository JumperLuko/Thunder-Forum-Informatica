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
        //recebe os dados preenchidos no formulário
        $name = $_POST["name"];
        $password = $_POST["password"];
        $nickname = $_POST["nickname"];
        $email = $_POST["email"];
        //criptografa a senha
        $password = md5($password);
        //abrir conexão com o banco de dados
        $conexao = mysqli_connect("localhost", "root", "root", "teste");
        //Se a conexão foi aberta com sucesso, manda o comando. Se não foi, mostra qual erro ocorreu
        if ($conexao == false) {
            echo("Erro de conexão com o banco de dados. Entre em contato com o administrador.");
            $erro = mysqli_connect_error($conexao);
            echo ($erro);
        } else {
            //o comando é de inserir o novo usuário no banco
            $comando = mysqli_query($conexao, "INSERT INTO usuarios (name, password, nickname, email) VALUES ('$name','$password', '$nickname', '$email')");
            if ($comando == false) {
                echo ("erro ao enviar comando para o banco de dados.");
                $erro = mysqli_error($conexao);
                echo($erro);
            }else{
                //caso o comando não retorne false, significa que deu certo.
                echo("usuário cadastrado com sucesso.");
            }
        }
        ?>
        <a href="../index-homework.html">Voltar</a>
    </body>
</html>
