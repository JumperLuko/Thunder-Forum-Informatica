<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

<?php
require("conectar.php");

//Recebe os dados do formulário
$login = $_POST["login"];
$senha = $_POST["senha"];
$senha = md5($senha);
//Busca do banco usuário e senha iguais aos do login
$resultado = mysqli_query($conexao, "SELECT * FROM usuarios
                                    WHERE login='$login' AND
                                    senha='$senha' ");
if ($resultado == false) {
    $erro = mysqli_errno($conexao);
    header("location:erro.php?erro=$erro");
} else {
    //Se encontrar o usuário e a senha corretos mostra bem-vindo
    $quantidadeDeLinhas = mysqli_num_rows($resultado);
    if($quantidadeDeLinhas == 1){
        echo("Bem-vindo $login! 
              Acesse sua área restrita: <a href='restrito.php'>Acessar</a>");
        session_start();
        $_SESSION["login"] = $login;
    }else{
        echo("acesso negado");
    }
}
?>
    </body>
</html>