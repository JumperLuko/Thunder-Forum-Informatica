<?php
    require ("topo.php");
?>
        <li class="selectli"><a class="select" href="index.php">
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
        </a></div></li>
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

    <?php
        require ("topo2.php");

        //setcookie($cookie_name, $cookie_value, time() + (600), "/");

        /*if(!isset($_SESSION["id"])){
            echo('
                <audio controls="auto" id="demo" hidden="true" controls autoplay>
                    <source src="PC_Thunder_speak.mp3" type="audio/mp3">
                </audio>
            ');
        }*/
    ?>
      
    <section class="content">
        
        <div class="article">
            <a href="index.php" class="ButtonBack"><- Voltar</a>
            <div class="title">Lista de denuncias</div>
            <div class="text">  
        <?php
            require("conectar.php");
        
            if(isset($_SESSION["id"])){
                $sql = mysqli_query($conexao, "select class_user.class,class_user.level,class_user.score as pontos,user.name,user.nickname as nick,user.email,user.gender,user.user_id_category_user as admin FROM class_user,user WHERE user_id_class_user=id_class_user and id_user='".$_SESSION["id"]."'");
                $id = mysqli_fetch_array($sql);
                if ($id["admin"]==0) {
                    echo('
                        <div class="homework3" action="" method="post">
                            <div class="title-register">Aqui o administrador pode visualizar e alterar informações dos tutorias</div><br>
                            <form action="" method="post">
                                <li>
                                <a href="lista-tutoriais.php">Clique recarregar a página</a>
                                </li>
                            </form>
                        </div>
                        <table border="1px">
                        <tr>
                            <td>ID</td>
                            <td>Title</td>
                            <td>Descrição</td>
                            <td>PDF</td>
                            <td>Id User</td>
                            <td>Status</td>
                            <td>Imagem</td>
                            <td>Background</td>
                        </tr>
                    ');
                    //$consulta = "select post.id_post,post.content from post WHERE post.post_id_category_post='".$_GET['categoria']."'";
                    $consulta = "select * from tutorial";
                    $resultado = mysqli_query($conexao,$consulta);
                    while($linha  =  mysqli_fetch_array($resultado)){
                    echo('
                            <tr>
                                <td>'.$linha["id_tutorial"].'</td>
                                <td>'.$linha["title_tutorial"].'</td>
                                <td>'.$linha["description"].'</td>
                                <td><a href="'.$linha["archive"].'">'.$linha["archive"].'</a></td>
                                <td>'.$linha["tutorial_id_user"].'</td>
                                <td>'.$linha["status"].'</td>
                                <td><a href="'.$linha["image_tutorial"].'">link</a></td>
                                <td>'.$linha["background_tutorial"].'</td>
                                <td><a href="alterar-tutorial.php?codigo='.$linha["id_tutorial"].'">alterar</a></td>
                            </tr>
                    ');
                    }
                    echo('
                        </table>
                        <p>*status = 0 equivalente à sem denuncia<br>
                           *status = 1 equivalente à denunciado
                        </p>
                    ');
                }
            } else {
                echo('
                    <h1 style="color: red; font-weight: bold; border-radius: 1px; box-shadow: 0px 0px 99px 150px rgb(255, 72, 0);">AQUI NÃO É ÁREA PARA USUÁRIO COMUM!!</h1>
                    <script>
                        window.location="index.php", 0000
                    </script>
                ');
            }
        ?>
            </div>
        </div>
        <div class="margin-bottom"></div>
        <div class="news"></div>
    </section>
<?php
    require ("feet.php");
?>
