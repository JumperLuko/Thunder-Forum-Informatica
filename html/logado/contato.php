<?php
    session_start();
    if(!isset($_SESSION["id"])){
        header("location:../../index.php");
    }
?>

<?php require("../../php/topo-logado.php");?>

<nav class="navbar" role="navigation">
	<div class="navbar_padding">
		<li class="border_top_left_radius_menu"><a class="no_select" href="../index.php">HOME</a></li>
		<li class="border_menu"><a class="no_select" href="perguntas.php" >PERGUNTAS</a></li>
		<li class="border_menu"><a class="no_select" href="tutoriais.php" >TUTORIAIS</a></li>
		<li class="border_menu" style="
		border-bottom: 4px rgb(87, 155, 190) solid;
	"><a class="select" href="contato.php">CONTATO</a></li>
		<input type="text" name="searching" placeholder="Pesquisar no fórum" class="search" value="">
		<a href="../index.html" class="ButtonSearch"><img src="../../images/search-icon.png" width="20px"></a>
	</div>
</nav>
    
<div class="marca_da_agua"><a href="../../codigos.html">_</a></div>  
  
<section class="content">
<div class="article">

<div class="text">
Email: email@email. <br>
Google+: <br><br><br>

<strong>Quem somos:</strong> <br><br>
Somos três estudantes do Instituto Federal Catarinense de Araquari, cursando o ensino médio com curso técnico integrado de informática. Começamos a criar este site para o trabalho de conclusão de curso, mas não iremos parar quando acabarmos o ensino médio, pois nosso objetivo com este site vai muito além de simplesmente terminar o curso. Nosso objetivo é auxiliar a todos aqueles que precisem de ajuda em relação à informática. 
</div></div>

</section>
    
<?php require("../../php/footer-logado.php");?>

</body>

</html>
