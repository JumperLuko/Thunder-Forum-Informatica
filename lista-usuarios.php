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
            <div class="title">List users</div>
            <div class="text">  
        <?php
            require("conectar.php");
        
            if(isset($_SESSION["id"])){
                $sql = mysqli_query($conexao, "select class_user.class,class_user.level,class_user.score as pontos,user.name,user.nickname as nick,user.email,user.gender,user.user_id_category_user as admin FROM class_user,user WHERE user_id_class_user=id_class_user and id_user='".$_SESSION["id"]."'");
                $id = mysqli_fetch_array($sql);
                if ($id["admin"]==0) {
                    echo('
                        <div class="homework3" action="" method="post">
                            <div class="title-register">Aqui o administrador pode alterar informações dos usuários</div><br>
                            <form action="" method="post">
                                <li>
                                <a href="lista-usuarios.php">Clique recarregar a página</a>
                                </li>
                            </form>
                        </div>
                        <table border="1px">
                        <tr>
                            <td>ID</td>
                            <td>Name</td>
                            <td>Nickname</td>
                            <td>Email</td>
                            <td>Gender</td>
                            <td>admin</td>
                            <td>level</td>
                        </tr>
                    ');
                    //$consulta = "select post.id_post,post.content from post WHERE post.post_id_category_post='".$_GET['categoria']."'";
                    $consulta = "select user.id_user,user.name,user.nickname,user.email,user.gender,user.user_id_category_user,user.user_id_class_user from user";
                    $resultado = mysqli_query($conexao,$consulta);
                    while($linha  =  mysqli_fetch_array($resultado)){
                    echo('
                            <tr>
                                <td>'.$linha["id_user"].'</td>
                                <td>'.$linha["name"].'</td>
                                <td>'.$linha["nickname"].'</td>
                                <td>'.$linha["email"].'</td>
                                <td>'.$linha["gender"].'</td>
                                <td>'.$linha["user_id_category_user"].'</td>
                                <td>'.$linha["user_id_class_user"].'</td>
                                <td><a href="alterar-usuario.php?codigo='.$linha["id_user"].'">alterar</a></td>
                            </tr>
                    ');
                    }
                }
            } else {
                echo("
                    <script>
                        window.location='index.php', 0000
                    </script>
                ");
            }
        ?>
                </table>
                <p>*admin = 0</p>
            </div>
        </div>
        <div class="margin-bottom"></div>
        <div class="news"></div>
    </section>
<?php
    require ("feet.php");
?>
