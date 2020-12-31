<?php

//Abrir a conexão com o banco
@$conexao = mysqli_connect("localhost", "root", "", "thunder");

if ($conexao == false) {
    $erro = mysqli_connect_errno();
    echo($erro);
    //header("location:erro.php?erro=$erro");
    header('Content-Type: text/html; charset=utf-8');
}
?>
