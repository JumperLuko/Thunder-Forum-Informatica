    <?php
    session_start();
    if(!isset($_SESSION["login"])){
        header("location:index.php");
    }
    $login = $_SESSION["login"];
    if($login!="administrador"){
        header("location:restrito.php");
    }
?>
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
        $conexao = mysqli_connect("localhost", "root", "", "teste");
        if ($conexao == false) {
            echo("Erro de conexão com o banco de dados. Entre em contato com o administrador.");
            $erro = mysqli_connect_error($conexao);
            echo ($erro);
        } else {
            $comando = mysqli_query($conexao, "SELECT * FROM mensagens");
            if ($comando == false) {
                echo ("erro ao enviar comando para o banco de dados.");
                $erro = mysqli_error($conexao);
                echo($erro);
            } else {
                $usuarios = mysqli_fetch_all($comando, MYSQLI_ASSOC);
                foreach ($usuarios as $umUsuario){
                    echo($umUsuario["login"] . " - " . $umUsuario["id"] . " - " . $umUsuario["senha"] . "<br />");
                }
            }
        }
        ?>
    </body>
</html>
