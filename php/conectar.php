<?php

//Abrir a conexão com o banco
$conexao = mysqli_connect("localhost", "root", "", "thunder");
if ($conexao == false) {
    $erro = mysqli_connect_errno();
    header("location:erro.php?erro=$erro");
}

?>
