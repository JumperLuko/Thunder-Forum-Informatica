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
        $login = $_POST["email"];
        $senha = $_POST["password"];
        
        $senha = sha1($senha);
        //abrir conexão com o banco de dados
        $conexao = mysqli_connect("localhost", "root", "root", "thunder");
        //Se a conexão foi aberta com sucesso, manda o comando. Se não foi, mostra qual erro ocorreu
        if ($conexao == false) {
            echo("Erro de conexão com o banco de dados. Entre em contato com o administrador.");
            $erro = mysqli_connect_error($conexao);
            echo ($erro);
        } else {
            //o comando é de buscar os usuários, mas somente um: o que tiver login e senha iguais ao que foi informado no formulário de login
            $comando = mysqli_query($conexao, "SELECT * FROM user WHERE email = '$login' AND password = '$senha' ");
            if ($comando == false) {
                echo ("erro ao enviar comando para o banco de dados.");
                $erro = mysqli_error($conexao);
                echo($erro);
            }else{
                //Se o comando não retornou false, analisamos quantos registros vieram do banco.
                //Se veio um registro, achamos um usuário com login e senha iguais aos que foram informados no formulário.
                //Se não veio registro, não foi encontrado qualquer usuário com login e senha iguais aos que foram informados no formulário.
                $usuarios = mysqli_num_rows($comando);
                if($usuarios == 1){
                    echo("bem vindo $login");
                }else{
                    echo("login ou senha incorretos.");
                }
            }
        }
        ?>
        <a href="../index-homework.html">Voltar</a>
    </body>
</html>
