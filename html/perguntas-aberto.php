<?php
    session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>Thunder - Perguntas</title>
    <meta http-equiv="content-type" content="text/html;charset=ISO-8859-1" />
        <link rel="icon" type="image/png" href="http://icdn.pro/images/en/l/i/lightning-icone-7684-96.png">
        <link type="text/css" rel="stylesheet" href="../style.css">
        <link type="text/css" rel="stylesheet" href="../css/perguntas.css">
    </head>

<body>
    <header>
        <a href="../index-special.html" class="special" alt="Thunder logo"><img src="../images/special-ativate.png" width="20px" alt="Daltonicos"></a>
        <a href="../index.php"><div class="header_img"></div></div>
        <a href="login.php" class="ButtonLogin">LOGIN</a>
    </header>

<nav class="navbar" role="navigation">
    <div class="navbar_padding">
        <li class="border_top_left_radius_menu"><a class="no_select" href="../index.php">HOME</a></li>
        <li class="border_menu" style="
        border-bottom: 4px rgb(87, 155, 190) solid;
    "><a class="select" href="perguntas.php">PERGUNTAS</a></li>
        <li class="border_menu"><a class="no_select" href="tutoriais.php" >TUTORIAIS</a></li>
        <li class="border_menu"><a class="no_select" href="contato.php" >CONTATO</a></li>
        <li class="border_top_right_radius_menu"><a class="no_select" href="cadastro.php" >CADASTRE-SE</a></li>
        <input type="text" name="searching" placeholder="Pesquisar no forum" class="search" value="">
        <a href="../index.html" class="ButtonSearch"><img src="../images/search-icon.png" width="20px"></a>
    </div>
</nav>
    
<div class="marca_da_agua"><a href="codigos.html">_</a></div>  


<div class="category">
<div class="title-category">Categorias</div>
<div class="categorys">
<?php require("../php/categorias.php"); ?>
</div>
</div>

<div class="content_question">
    <div class="article">
        <?php
            require("../php/conectar.php");
            if(isset($_GET['codigo'])){
                $codigo = $_GET['codigo'];
            } else {
                $codigo = 1;
            }
            $consulta = "select post.content from post where post.id_post='".$codigo."'";
            $resultado = mysqli_query($conexao,$consulta);
            while($linha  =  mysqli_fetch_array($resultado)){
                echo('
                    <div class="title">Quest '.$codigo.'</div>
                    <div class="text"><p>'.$linha["content"].'</p></div>
                ');
            }
        ?>
        <div class="respostas">
            <?php                
                $consulta = "select user.nickname as nick,comment.content as comentario from comment,user WHERE comment.comment_id_post='".$codigo."' and user.id_user=comment.comment_id_user";
                $resultado = mysqli_query($conexao,$consulta);
                while($linha  =  mysqli_fetch_array($resultado)){
                    
                echo('
                    <div class="post">
                        <a>
                            <img src="../images/user.png" alt="Avatar">
                        </a>
                        <span class="post-body">
                            <span class="user-name"><a>'.$linha["nick"].'</a></span><br>
                            <span class="post-mensage">'.$linha["comentario"].'</span>
                        </span>
                    </div>
                ');
                }
            ?>
            <?php
                if(isset($_SESSION["id"])){
                    echo('
                        <form class="resposta" name="resposta" method="POST" action="../php/validacao.php">
                            <textarea name="comentario" rows="4" cols="30" placeholder="Responda aqui"></textarea>
                            <input type="hidden" name="id_user" value="'.$_SESSION["id"].'">
                            <input type="hidden" name="id_post" value="'.$codigo.'">
                            <input type="submit" name="enviar_comentario" value="Enviar">
                        </form>
                    ');
                }
            ?>
        </div>
    </div>
    <div class="margin-bottom"></div>
</div>

<footer class="feet">
        <p><font>Recomendacoes: </font></p><a href="http://store.steampowered.com/"><strong>Steam</strong> (Comunidade de jogos)</a>, <a href="https://cpanel.hostinger.com.br/"><strong>Hostinger</strong> (hospedagem gratuita)</a>
</footer>
 
<div class="pro_footer"><img src="../images/teste/morcego.png"/><img src="../images/teste/coracao.png"/><img src="../images/teste/morcego.png"/><img src="../images/teste/coracao.png"/></div>
 
</body>

</html>
