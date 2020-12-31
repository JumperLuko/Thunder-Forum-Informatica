<?php

session_start();
    require("conectar.php");
if (!isset($_SESSION["admin"])) {
    header("location: index.php");
}
    $link = $_GET["link"];
    $result = mysqli_query($conexao, "INSERT INTO Imagens (link, jogo)
                                    VALUES ('link' 'jogo')");
    if ($result == false){
        echo 'erro';
    }else{    
        echo 'cadastro realizado com sucesso';
    }
?>