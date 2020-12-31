<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<?php
//require_once "../php/conectar.php";
?>

<head>
	<title>Thunder</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <link rel="icon" type="" href="../icon.png">
        <link type="text/css" rel="stylesheet" href="../style.css">
        <link type="text/css" rel="stylesheet" href="../css/cadastro.css">
        <script type="text/javascript" src="script/cadastro.js"></script>
	<style>
		.article{
			margin-bottom: 10px;
		}
	</style>
</head>

<body>
    <header>
		<a href="cadastro-special.php" class="special"><img src="../images/special-ativate.png" width="20px" alt="Thunder logo"></a>
    	<a href="../index.php"><div class="header_img"></div></div>
        <a href="login.php" class="ButtonLogin">LOGIN</a>
    </header>

<nav class="navbar" role="navigation"> 
	<div class="navbar_padding">
		<li class="border_top_left_radius_menu"><a class="no_select" href="../index.php">HOME</a></li>
		<li class="border_menu"><a class="no_select" href="perguntas.php" >PERGUNTAS</a></li>
		<li class="border_menu"><a class="no_select" href="tutoriais.php" >TUTORIAIS</a></li>
		<li class="border_menu"><a class="no_select" href="contato.php" >CONTATO</a></li>
		<li class="border_top_right_radius_menu" style="
    border-bottom: 4px rgb(87, 155, 190) solid;
"><a class="select" href="cadastro.php" >CADASTRE-SE</a></li>
		<input type="text" name="searching" placeholder="Pesquisar no fórum" class="search" value="">
		<a href="../index.html" class="ButtonSearch"><img src="../images/search-icon.png" width="20px"></a>
    </div>
</nav>
    
<div class="marca_da_agua"><a href="../codigos.html">_</a></div>  
  
<section class="content">
<div class="article">
<!--<form action="?go=../php/cadastrando.php" method="post">-->
<form action="../php/cadastrando.php" method="post">
<fieldset>
	<legend><h1>Cadastrando usuário</h1></legend>
    <li>
		<label>Nome:</label>
		<input class="space" required="" pattern="[a-zA-Zç Ç]+" placeholder="verdadeiro" type="text" name="nome" id="name" maxlength="100">
	</li>
    <li>
		<label>Nickname:</label>
		<input class="space" required="" pattern="[a-zA-Zç Ç0-9_]+" placeholder="até x caracteres" type="text" name="nick" maxlength="30">
	</li>
    <li>
		<label>Email:</label>
		<input class="space" required="" pattern="[a-zA-Zç Ç_-.]+@[a-zA-Zç Ç.]+" placeholder="email@dominio" type="text" name="email" maxlength="100">
	</li>
	
	 <li>
		<label>Gênero:</label>
		<input class="space" required="" pattern="[mfMF]" placeholder="M(Masculino) F(Feminino)" type="text" name="sexo" maxlength="100">
	</li>
	
    <!--<li>
		<label>Gênero:</label>
		<select class="sexo">
			<option value="f" '.$check1.'>Feminino</option>
			<option value="m" '.$check2.'>Masculino</option>
			<!--<option value="n">none</option>
		</select>
	</li>
    <li> -->

    <!--<li>
		<label>Nascimento:</label>
		<input required="" pattern="[0-3][0-9]/[0-1][0-9]/[1-2][0-9][0-9][0-9]" placeholder="dd/mm/yyyy" type="date" name="date">
	</li>-->
	
	<li>
		<label>Senha:</label>
		<input class="space" required="" placeholder="lembre-se dela" type="password" name="senha" maxlength="255">
	</li>

		<input id="enviar" value="Cadastrar" type="submit">  <!--formaction="../index.html"-->
	</li>
</fieldset>
</form>
</div>
</section>
    
<footer class="feet">
        <p><font>Recomendações: </font></p><a href="http://store.steampowered.com/"><strong>Steam</strong> (Comunidade de jogos)</a>, <a href="https://cpanel.hostinger.com.br/"><strong>Hostinger</strong> (hospedagem gratuita)</a>
</footer>
 
<div class="pro_footer"><img src="../images/teste/morcego.png"/><img src="../images/teste/coracao.png"/><img src="../images/teste/morcego.png"/><img src="../images/teste/coracao.png"/></div>
 
</body>

</html>
