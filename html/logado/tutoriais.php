<?php
    session_start();
    if(!isset($_SESSION["id"])){
        header("location:../../index.php");
    }
?>

<?php require("../../php/topo-logado.php");?>

<nav class="navbar" role="navigation">
	<div class="navbar_padding">
		<li class="border_top_left_radius_menu"><a class="no_select" href="index.php">User</a></li>
		<li class="border_menu"><a class="no_select" href="perguntas.php" >PERGUNTAS</a></li>
		<li class="border_menu" style="
    border-bottom: 4px rgb(87, 155, 190) solid;
"><a class="select" href="tutoriais.php" >TUTORIAIS</a></li>
		<li class="border_menu"><a class="no_select" href="contato.php" >CONTATO</a></li>
		<input type="text" name="searching" placeholder="Pesquisar no fórum" class="search" value="">
		<a href="../index.html" class="ButtonSearch"><img src="../../images/search-icon.png" width="20px"></a>
    </div>
</nav>
    
<div class="marca_da_agua"><a href="../codigos.html">_</a></div>  
  
<section class="content">
	
	<!--<div class="article">Texto</div>-->
	
	<div class="article">
		<div class="block">
			<a href="../pdf/fuciona_computador.pdf"><div class="block_title">
				Como Funciona um computador?
			</div>
			<div class="block_description">
				<br/>Aqui você aprenderá básicamente como fuciona o hardware do seu computador, de forma que pessoas sem o minímo conhecimento técnico possam entender.
			</div>
		</div></a>
	</div>
	
	<div class="article">
		<div class="block">
			<a href="../pdf/comecar_programar.pdf"><div class="block_title">
				Como começar a programar?
			</div>
			<div class="block_description">
				<br>Aqui você aprenderá o enrredo histórico da programação e como programar liguagens fáceis, de forma que pessoas sem o minímo conhecimento técnico possam entender.
			</div>
		</div></a>
	</div>
	
	<div class="article">
		<div class="block">
			<a href="../pdf/informatica.pdf"><div class="block_title">
				O que é informática?
			</div>
			<div class="block_description">
				<br>Explicação histórica e de definições sobre a informática.
			</div>
		</div></a>
	</div>

	<div class="margin-bottom"></div>

</section>
    
<?php require("../../php/footer-logado.php");?>

</body>

</html>
