<?php

//Abrir a conexão com o banco
@$conexao = mysqli_connect("localhost", "root", "", "thunder");

if ($conexao == false) {
    $erro = mysqli_connect_errno();
    echo($erro);
    //header("location:erro.php?erro=$erro");
    header('Content-Type: text/html; charset=utf-8');
}
mysqli_set_charset($conexao,'uft8');
//mysql_query("SET NAMES 'utf8'");
//mysql_query('SET character_set_connection=utf8');
//mysql_query('SET character_set_client=utf8');
//mysql_query('SET character_set_results=utf8');
?>
