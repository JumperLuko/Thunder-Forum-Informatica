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
            <a href="index.php" class="ButtonBack"><img src="images/arrow-left-back.png" width="12px"> Voltar</a>
            <div class="title">Lista de denuncias</div>
            <div class="text">  
        <?php
            require("conectar.php");
        
            if(isset($_SESSION["id"])){
                $sql = mysqli_query($conexao, "select class_user.class,class_user.level,class_user.score as pontos,user.name,user.nickname as nick,user.email,user.gender,user.user_id_category_user as admin FROM class_user,user WHERE user_id_class_user=id_class_user and id_user='".$_SESSION["id"]."'");
                $id = mysqli_fetch_array($sql);
                if ($id["admin"]==0) {
                    $consulta = "select denouncement.id_denouncement,denouncement.status,denouncement.denouncement_id_post,denouncement.denouncement_id_user,denouncement.content from denouncement WHERE status=0";
                    $resultado = mysqli_query($conexao,$consulta);
                    //$linha  =  mysqli_fetch_array($resultado);
                    //while($linha  =  mysqli_fetch_array($resultado)){
                    echo('
                        <div class="homework3" action="" method="post">
                            <div class="title-register">Denuncias de posts</div><br>
                            <table border="1">
                                <tr>
                                    <form action="" method="post">
                                        <td>
                                            ID denuncia
                                        </td>
                                        <td>
                                            ID post
                                        </td>
                                        <td>
                                            ID user
                                        </td>
                                        <td>
                                            Conte�do den�ncia
                                        </td>
                                    </form>
                                </tr>
                    ');
                        while($linha  =  mysqli_fetch_array($resultado)){
                            if(isset($linha["denouncement_id_post"])){
                                echo('
                                <tr>
                                    <td>'.$linha["id_denouncement"].'</td>
                                    <td><a href="perguntas-aberto.php?codigo='.$linha["denouncement_id_post"].'">'.$linha["denouncement_id_post"].'</a></td>
                                    <td><a href="lista-usuarios.php">'.$linha["denouncement_id_user"].'</a></td>
                                    <td>'.$linha["content"].'</td>
                                    <td>
                                        <form action="bloquear-denuncia-post.php" method="post">
                                                <input type="hidden" name="denouncement_id" value="'.$linha["denouncement_id_post"].'"/>
                                                <input type="hidden" name="id_denouncement" value="'.$linha["id_denouncement"].'"/>
                                                <input type="submit" value="bloquear"/>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="ignorar-denuncia.php" method="post">
                                            <input type="hidden" name="id_denouncement" value="'.$linha["id_denouncement"].'"/>
                                            <input type="submit" value="ignorar"/>
                                        </form>
                                    </td>
                                </tr>
                                ');
                            }
                        }
                        echo('
                                
                            </table>
                        </div>
                        ');
                        
                        //-----------------------------------------------------------------------
                        
                        //~ $consulta = "select denouncement.id_denouncement,denouncement.status,denouncement.denouncement_id_tutorial,denouncement.denouncement_id_user,denouncement.content from denouncement WHERE status=0";
                        //~ $resultado = mysqli_query($conexao,$consulta);
                        //~ echo('
                            //~ <div class="homework3" action="" method="post">
                                //~ <div class="title-register">Denuncias de tutorial</div><br>
                                //~ <table border="1">
                                    //~ <tr>
                                        //~ <form action="" method="post">
                                            //~ <td>
                                                //~ ID denuncia
                                            //~ </td>
                                            //~ <td>
                                                //~ ID tutorial
                                            //~ </td>
                                            //~ <td>
                                                //~ ID user
                                            //~ </td>
                                            //~ <td>
                                                //~ Conte�do den�ncia
                                            //~ </td>
                                        //~ </form>
                                    //~ </tr>
                        //~ ');
                        //~ while($linha  =  mysqli_fetch_array($resultado)){
                            //~ if(isset($linha["denouncement_id_tutorial"])){
                                //~ echo('
                                    //~ <tr>
                                        //~ <form action="" method="post">
                                            //~ <td>'.$linha["id_denouncement"].'</td>
                                            //~ <td>'.$linha["denouncement_id_tutorial"].'</td>
                                            //~ <td>'.$linha["denouncement_id_user"].'</td>
                                            //~ <td>'.$linha["content"].'</td>
                                            //~ <td>
                                                //~ <form action="bloquear-denuncia.php" method="post">
                                                    //~ <input type="hidden" name="denouncement_id" value="'.$linha["denouncement_id_comment"].'"/>
                                                    //~ <input type="hidden" name="id_denouncement" value="'.$linha["id_denouncement"].'"/>
                                                    //~ <input type="submit" value="bloquear"/>
                                                //~ </form>
                                            //~ </td>
                                            //~ <td>
                                                //~ <form action="ignorar-denuncia.php" method="post">
                                                    //~ <input type="hidden" name="id_denouncement" value="'.$linha["id_denouncement"].'"/>
                                                    //~ <input type="submit" value="ignorar"/>
                                                //~ </form>
                                            //~ </td>
                                        //~ </form>
                                    //~ </tr>
                                //~ ');
                            //~ }
                        //~ }
                        
                        //~ echo('
                                
                                //~ </table>
                            //~ </div>
                        //~ ');
                        
                        //-----------------------------------------------------------------------
                        
                        $consulta = "select denouncement.id_denouncement,denouncement.status,denouncement.denouncement_id_comment,denouncement.denouncement_id_user,denouncement.content from denouncement WHERE status=0;";
                        $resultado = mysqli_query($conexao,$consulta);
                        echo('
                            <div class="homework3" action="" method="post">
                                <div class="title-register">Denuncias de coment�rio</div><br>
                                <table border="1">
                                    <tr>
                                        <form action="" method="post">
                                            <td>
                                                ID denuncia
                                            </td>
                                            <td>
                                                ID comment
                                            </td>
                                            <td>
                                                ID user
                                            </td>
                                            <td>
                                                Conte�do den�ncia
                                            </td>
                                        </form>
                                    </tr>
                        ');
                        while($linha  =  mysqli_fetch_array($resultado)){
                            if(isset($linha["denouncement_id_comment"])){
                                echo('
                                    <tr>
                                        
                                            <td>'.$linha["id_denouncement"].'</td>
                                            <td>'.$linha["denouncement_id_comment"].'</td>
                                            <td>'.$linha["denouncement_id_user"].'</td>
                                            <td>'.$linha["content"].'</td>
                                            <td>
                                                <form action="bloquear-denuncia.php" method="post">
                                                    <input type="hidden" name="denouncement_id" value="'.$linha["denouncement_id_comment"].'"/>
                                                    <input type="hidden" name="id_denouncement" value="'.$linha["id_denouncement"].'"/>
                                                    <input type="submit" value="bloquear"/>
                                                </form>
                                            </td>
                                            <td>
                                                <form action="ignorar-denuncia.php" method="post">
                                                    <input type="hidden" name="id_denouncement" value="'.$linha["id_denouncement"].'"/>
                                                    <input type="submit" value="ignorar"/>
                                                </form>
                                            </td>
                                        
                                    </tr>
                                ');
                            }
                        }
                        echo('
                            </table>
                        
                        <p>
                            *status = 0 equivalente � sem denuncia<br>
                            *status = 1 equivalente � denunciado
                        </p>
                    ');
                }
            } else {
                echo('
                    <h1 style="color: red; font-weight: bold; border-radius: 1px; box-shadow: 0px 0px 99px 150px rgb(255, 72, 0);">AQUI N�O � �REA PARA USU�RIO COMUM, SAIA DAQUI!!</h1>
                    <script>
                        window.location="index.php", 9000
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
