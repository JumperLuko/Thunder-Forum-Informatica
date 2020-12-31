<?php
    session_start();
    if(!isset($_SESSION["id"])){
        header("location:../../index.php");
    }
?>

<?php require("../../php/topo-logado.php");?>

<nav class="navbar" role="navigation">
    <div class="navbar_padding">
    <li class="border_top_left_radius_menu" style="
    border-bottom: 4px rgb(87, 155, 190) solid;
"><div class="border-li"><a class="select" href="index.php">USER</a></div></li>
		<li class="border_menu"><a class="no_select" href="perguntas.php" >PERGUNTAS</a></li>
		<li class="border_menu"><a class="no_select" href="tutoriais.php" >TUTORIAIS</a></li>
		<li class="border_menu"><a class="no_select" href="contato.php" >CONTATO</a></li>
		<input type="text" name="searching" placeholder="Pesquisar no fórum" class="search" value="">
		<a href="../index.html" class="ButtonSearch"><img src="../../images/search-icon.png" width="20px"></a>
    </div>
</nav>

<!--<audio controls="auto" id="demo" hidden="true" controls autoplay>
    <source src="PC_Thunder_speak.mp3" type="audio/mp3">
</audio>-->

<!--<div>
  <button onclick="document.getElementById('demo').play()">Reproduzir o áudio</button>
  <button onclick="document.getElementById('demo').pause()">Pausar o áudio</button>
  <button onclick="document.getElementById('demo').volume+=0.1">Aumentar o volume</button>
  <button onclick="document.getElementById('demo').volume-=0.1">Diminuir o volume</button>
</div>-->
    
<div class="marca_da_agua"><a href="codigos.html">_</a></div>  
  
<section class="content">
	
	<div class="article">
		<div class="title">Home</div>
		<div class="text">
			<p>Seja bem-vindo usuário, aqui você pode receber respostas para qualquer dúvida que tiver quanto à informática e para as dúvidas que nem sabia que tinha.<br>
		</div>
	</div>

	<div class=""></div>

	<div class="margin-bottom"></div>

<!--<div class="myAccount">
	<div class="more"><img src="images/more.png" id="more"/><div class="more_border"></div></div>
    <h1>Minha conta</h1>
	<div class="container">
		<div class="linha">
        	<div class="tile yellow">
				<img src="images/icones/engrenagem.png" alt="icone engrenagem">
                <span>Manutenção</span>
			</div>
			<div class="tile blue">
			</div>
			<div class="tile tileLargo green">
			</div>
			<div class="tile yellow">
			</div>              
			<div class="tile tileLargo green">
			</div>
		</div>
		<div class="linha">
        	<div class="tile tileLargo red">
			</div>
			<div class="tile red">
			</div>
			<div class="tile blue">
			</div>
			<div class="tile green">
			</div>              
			<div class="tile tileLargo red">
			</div>
		</div>       
		<div class="linha">
        	<div class="tile blue">
			</div>
			<div class="tile green">
			</div>
			<div class="tile tileLargo yellow">
			</div>
			<div class="tile blue">
			</div>              
			<div class="tile green">
			</div>
		</div>
	</div>
</div>-->

<div class="news"></div>

</section>


<!--    <div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			 <a id="modal-620419" href="#modal-container-620419" role="button" class="btn" data-toggle="modal">Launch demo modal</a>
			
			<div class="modal fade" id="modal-container-620419" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							 
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
								×
							</button>
							<h4 class="modal-title" id="myModalLabel">
								Modal title
							</h4>
						</div>
						<div class="modal-body">
							...
						</div>
						<div class="modal-footer">
							 
							<button type="button" class="btn btn-default" data-dismiss="modal">
								Close
							</button> 
							<button type="button" class="btn btn-primary">
								Save changes
							</button>
						</div>
					</div>
					
				</div>
				
			</div>
			
		</div>
	</div>
</div>

    <script src="layoutit/js/jquery.min.js"></script>
    <script src="layoutit/js/bootstrap.min.js"></script>-->

<?php require("../../php/footer-logado.php");?>
 
</body>

</html>
