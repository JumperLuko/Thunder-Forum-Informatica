<?php 
session_start();
?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
		"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

	<head>
		<title>Thunder</title>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		<link rel="icon" type="image/png" href="http://icdn.pro/images/en/l/i/lightning-icone-7684-96.png">
		<link type="text/css" rel="stylesheet" href="../style.css">
		<link type="text/css" rel="stylesheet" href="../css/login.css">
		<style type="text/css" rel="stylesheet">
	</style>
</head>

<body>

    <header>
		<a href="../index-special.html" class="special"><img src="../images/special-ativate.png" width="20px"></a>
    	<a href="../index.php"><div class="header_img"></div></div>
        <?php
            if(isset($_SESSION["id"])){
                echo('
                <a href="../php/logout.php" class="ButtonLogin">Logout</a>
                ');
            }else{
                echo('
                <a href="login.php" class="ButtonLogin">Login</a>
                ');
            }
        ?>
    </header>

<nav class="navbar" role="navigation">
	<div class="navbar_padding">
		<li class="border_top_left_radius_menu"><a class="no_select" href="../index.php">HOME</a></li>
		<li class="border_menu"><a class="no_select" href="perguntas.php" >PERGUNTAS</a></li>
		<li class="border_menu"><a class="no_select" href="tutoriais.php" >TUTORIAIS</a></li>
		<li class="border_menu"><a class="no_select" href="contato.php" >CONTATO</a></li>
		<?php
            if(isset($_SESSION["id"])){
                echo('
                <li class="border_menu"><a class="no_select" href="criar_perguntas.php">CRIAR  PERGUNTAS</a></li>
                ');
            }else{
                echo('
                <li class="border_menu"><a class="no_select" href="cadastro.php">CADASTRO</a></li>
                ');
            }
        ?>
		<input type="text" name="searching" placeholder="Pesquisar no fórum" class="search" value="">
		<a href="../index.html" class="ButtonSearch"><img src="../images/search-icon.png" width="20px"></a>
    </div>
</nav>

    <form action="../php/processarLogin.php" method="post" name="login" class="login">
        <ul>
            <li><div>Email:</div> <input placeholder="Digite seu email" type="text"  name="email"></li>
            <li><div>Senha:</div><input placeholder="Digite sua senha" type="password" name="senha"></li>
            <!-- <li><a href="../index-homework.html" class="myButton">ENTRAR</a></li> -->
            <li><a style="color: rgb(79, 79, 119);" href="../index-homework.html" ><input type="submit" class="myButton" value="Logar"/>ENTRAR</a></li>
        </ul>
    </form>
    
<div class="marca_da_agua"><a href="codigos.html">_</a></div>  
  
    
</body>

</html>
