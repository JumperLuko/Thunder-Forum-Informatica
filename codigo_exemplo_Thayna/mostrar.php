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
        //abrir conexão com o banco de dados
        $conexao = mysqli_connect("localhost", "root", "", "teste");
        //Se a conexão foi aberta com sucesso, manda o comando. Se não foi, mostra qual erro ocorreu
        if ($conexao == false) {
            echo("Erro de conexão com o banco de dados. Entre em contato com o administrador.");
            $erro = mysqli_connect_error($conexao);
            echo ($erro);
        } else {
            //o comando é de buscar os usuários.
            $comando = mysqli_query($conexao, "SELECT * FROM usuarios");
            if ($comando == false) {
                echo ("erro ao enviar comando para o banco de dados.");
                $erro = mysqli_error($conexao);
                echo($erro);
            } else {
                //caso o comando não retorne false, significa que recebemos o resultado do banco de dados
                //contendo todos os usuários. Para usar esses dados, é necessário usar a função abaixo:
                $usuarios = mysqli_fetch_all($comando, MYSQLI_ASSOC);
                //a variável $usuarios se transforma em um array bidimensional contendo todos os dados da consulta
                //para percorrer item por item desse array, é necessário usar o foreach:
                foreach ($usuarios as $umUsuario){
                    echo($umUsuario["login"] . " - " . $umUsuario["id"] . " - " . $umUsuario["senha"] . "<br />");
                }
            }
        }
        ?>
        <a href="index.php">Voltar</a>
    </body>
</html>
