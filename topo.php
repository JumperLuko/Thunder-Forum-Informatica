<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <title>Thunder</title>
    <meta charset="ISO-8859-1" >
    <link rel="icon" type="image/png" href="icon.png">
    <link type="text/css" rel="stylesheet" href="style.css">
    <link type="text/css" rel="stylesheet" href="index.css">
    <link type="text/css" rel="stylesheet" href="metro.css">
    <link type="text/css" rel="stylesheet" href="login.css">
    <link type="text/css" rel="stylesheet" href="perguntas.css">
    <link type="text/css" rel="stylesheet" href="tutoriais.css">
    <link type="text/css" rel="stylesheet" href="cadastro.css">
    <link type="text/css" rel="stylesheet" href="homework.css">
    <link type="text/css" rel="stylesheet" href="contato.css">
    <link type="text/css" rel="stylesheet" href="index.css">
    <script type="text/javascript" src="script/metro.js"></script>
</head>

<body>
    <header>
        <a href="index-special.html" class="special"><img src="images/special-ativate.png" width="20px"></a>
        <a href="index.php"><div class="header_img"></div></a>
        <div class="login">
        <?php
            if(isset($_SESSION["id"])){
                echo('
                <a href="logout.php" class="ButtonLogin">Logout</a>
                ');
            }else{
                echo('
                <a href="login.php" class="ButtonLogin">Login</a>
                ');
            }
        ?>

        </div>
    </header>
    <nav class="navbar" role="navigation">
    <div class="navbar_padding">
