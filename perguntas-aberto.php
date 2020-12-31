<?php
    require ("topo.php");
?>
        <li class="border_top_left_radius_menu"><a class="no_select" href="index.php">
            <?php
                if(isset($_SESSION["id"])){
                    echo('
                    User
                    ');
                }else{
                    echo('
                    Home
                    ');
                }
            ?>
        <li class="selectli"><a class="select" href="perguntas.php">PERGUNTAS</a></li>
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
        <?php
            require ("topo2.php");
        ?>
        <div class="category">
        <div class="title-category">Categorias</div>
        <div class="categorys">
        <?php
            require("categorias.php");
        ?>
    </div>
</div>

<div class="content_question">
    <div class="article">
        <div class="perguntas">
            <?php
                require("conectar.php");
                if(isset($_GET['codigo'])){
                    $codigo = $_GET['codigo'];
                } else {
                    $codigo = 1;
                }
                $consulta = "select post.content,post.id_post from post where post.id_post='".$codigo."'";
                $resultado = mysqli_query($conexao,$consulta);
                while($linha  =  mysqli_fetch_array($resultado)){
                    echo('
                        <div class="denuncia"> <a href="denuncia.php?post='.$linha["id_post"].'">Denunciar</a></div>
                        <div class="title">Quest '.$codigo.'</div>
                        <div class="text"><p>'.$linha["content"].'</p></div>
                    ');
                }
            ?>
        </div>
        
        <div class="respostas">
            <?php                
                $consulta = "select user.nickname as nick,comment.content as comentario,comment.id_comment from comment,user WHERE comment.comment_id_post='".$codigo."' and user.id_user=comment.comment_id_user";
                $resultado = mysqli_query($conexao,$consulta);
                while($linha  =  mysqli_fetch_array($resultado)){
                    
                echo('
                    <div class="post">
                        <a>
                            <img src="images/user.png" alt="Avatar">
                        </a>
                        <span class="post-body">
                            <span class="user-name"><a>'.$linha["nick"].'</a></span><br>
                            <span class="post-mensage">'.$linha["comentario"].'</span>
                        </span>
                        <div class="denuncia"> <a href="denuncia.php?comment='.$linha["id_comment"].'">Denunciar</a></div>
                    </div>
                ');
                }
            ?>
            <?php
                if(isset($_SESSION["id"])){
                    echo('
                        <form class="resposta" name="resposta" method="POST" action="validacao.php">
                            <textarea name="comentario" class="comentario" placeholder="Responda aqui"></textarea>
                            <input type="hidden" name="id_user" value="'.$_SESSION["id"].'">
                            <input type="hidden" name="id_post" value="'.$codigo.'"><br>
                            <div class="homeworkinput"><input type="submit" name="enviar_comentario" value="Enviar"></div>
                        </form>
                    ');
                } else{
                    echo('<br><div class="aviso-comment">Só usuários logados podem comentar!</div>');
                }
            ?>
        </div>
    </div>
    <div class="margin-bottom"></div>
</div>

<footer class="feet">
        <p><font>Recomendações: </font></p><a href="http://store.steampowered.com/"><strong>Steam</strong> (Comunidade de jogos)</a>, <a href="https://cpanel.hostinger.com.br/"><strong>Hostinger</strong> (hospedagem gratuita)</a>
</footer>
 
<!-- <div class="pro_footer"><img src="../images/teste/morcego.png"/><img src="../images/teste/coracao.png"/><img src="../images/teste/morcego.png"/><img src="../images/teste/coracao.png"/></div> -->
 
</body>

</html>
