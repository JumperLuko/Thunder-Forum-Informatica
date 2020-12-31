<?php

require("conectar.php");

//Receber os dados do formulário
$login = $_POST["login"];
$senha = $_POST["senha"];
$senha = md5($senha);
//Buscar do banco usuários com login igual ao que está se cadastrando
$resultado = mysqli_query($conexao, "SELECT * FROM usuarios
                                    WHERE login='$login' ");
if ($resultado == false) {
    $erro = mysqli_errno($conexao);
    header("location:erro.php?erro=$erro");
} else {
    //Verifica se retornou usuário com o mesmo login cadastradoo
    $quantidadeDeLinhas = mysqli_num_rows($resultado);
    if ($quantidadeDeLinhas == 1) {
        echo("usuário já existe");
    } else {
        //Se não existe usuário com o login cadastrado, insere no banco
        $resultado = mysqli_query($conexao, "INSERT INTO usuarios (login, senha)
                                            VALUES ('$login','$senha')");
        if ($resultado == false) {
            $erro = mysqli_errno($conexao);
            header("location:erro.php?erro=$erro");
        }
        echo("Cadastro realizado com sucesso!");
    }
}
?>
<a href="chat.php"></a>