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
        </a></li>
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
<?php
    require("conectar.php");
    if(isset($_GET['pagina'])){
        $page = $_GET['pagina'];
    } else {
        $page = 0;
    }
    $offset = $page*5;
    if(isset($_GET['categoria'])){
        $consulta = "select post.id_post,post.content from post WHERE post.status=0 and post.post_id_category_post='".$_GET['categoria']."' order by post.id_post desc limit 100 offset ".$offset.";";
        // like '%meu%'
        // select post.id_post,post.content from post WHERE post.post_id_category_post=5 and post.content like '%meu%' order by post.id_post desc limit 3 offset 0;
    } else {
            $consulta = "select post.id_post,post.content from post WHERE post.status=0 order by post.id_post desc limit 5 offset ".$offset.";";
    }
    $resultado = mysqli_query($conexao,$consulta);
    while($linha  =  mysqli_fetch_array($resultado)){
        echo('<div class="content_question"><a href="perguntas-aberto.php?codigo='.$linha["id_post"].'"><div class="article"><div class="tag-post">quest '.$linha["id_post"].'</div><div class="text_quest"><p>'.$linha["content"].'</p></div></div><div class="margin-bottom"></div></a></div>');
    }
    
    $offset = ($page+1)*5;
    $consulta = "select post.id_post,post.content from post WHERE post.status=0 order by post.id_post desc limit 5 offset ".$offset;
    $resultado = mysqli_query($conexao,$consulta);
    $linha  =  mysqli_fetch_array($resultado);
    if(isset($linha["id_post"])){
        if(!isset($_GET['categoria'])){
            $pagina = $page+1;
            echo('
                <div class="next"><a href="perguntas.php?pagina='.$pagina.'">Next</a></div>
            ');
        }
    }
?>
<?php
    require ("feet.php");
?>
