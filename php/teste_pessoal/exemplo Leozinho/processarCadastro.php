<?php
require("conectar.php");

//Receber os dados do formulário
$email = $_POST["email"];
$senha = $_POST["senha"];
//$senha = md5($senha);
//Buscar do banco usuários com login igual ao que está se cadastrando
$resultado = mysqli_query($conexao, "SELECT * FROM user
                                    WHERE email='$email' ");
if ($resultado == false) {
    $erro = mysqli_ernor($conexao);
    header("location:erro.php?erro=$erro");
} else {
    //Verifica se retornou usuário com o mesmo login cadastrado
    $quantidadeDeLinhas = mysqli_num_rows($resultado);
    if ($quantidadeDeLinhas == 1) {
        echo("usuário já existe");
    } else {
        //Se não existe usuário com o login cadastrado, insere no banco
        $resultado = mysqli_query($conexao, "INSERT INTO user (email, password)
                                            VALUES ('$email','$senha')");
        if ($resultado == false) {
            $erro = mysqli_error($conexao);
            header("location:erro.php?erro=$erro");
        }
        echo("Cadastro realizado com sucesso!");
    }
}
?>
