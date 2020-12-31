<?php
    session_start();
    if(!isset($_SESSION["email"])){
        header("location:index.php");
    }
    $email = $_SESSION["email"];
    if($email=="administrador"){
        header("location:admin.php");
    }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            echo("Bem-vindo $email");
        ?>
    </body>
</html>
