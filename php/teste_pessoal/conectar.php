<?php

//Abrir a conexão com o banco
$conexao = mysqli_connect("localhost", "root", "", "thunder");
if ($conexao == false) {
    $erro = mysqli_connect_errno();
    header("location:erro.php?erro=$erro");
}

//require("conectar.php");
//$host = "localhost";
//$user = "root";
//$user = "root";
//$pass = "";
//$banco = "thunder";
//$conexao = mysqli_connect($host, $user, $pass) or die(mysqli_error());
//mysqli_select_db($banco) or die(mysqli_error());

?>
