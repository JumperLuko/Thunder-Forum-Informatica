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
            <a href="lista-tutoriais.php" class="ButtonBack"> <- Voltar</a>
            <div class="title">Alterar tutorial</div>
            <div class="text">  
        <?php
            require("conectar.php");
            
            if(isset($_SESSION["id"])){
                $sql = mysqli_query($conexao, "select class_user.class,class_user.level,class_user.score as pontos,user.name,user.nickname as nick,user.email,user.gender,user.user_id_category_user as admin FROM class_user,user WHERE user_id_class_user=id_class_user and id_user='".$_SESSION["id"]."'");
                $id = mysqli_fetch_array($sql);
                if ($id["admin"]==0) {
                    if(isset($_GET['codigo'])){
                        $codigo = $_GET['codigo'];
                        $consulta = "SELECT * FROM tutorial WHERE id_tutorial='".$codigo."'";
                        $resultado = mysqli_query($conexao,$consulta);
                        while($linha  =  mysqli_fetch_array($resultado)){
                            echo('
                                <div class="homework3" action="" method="post">
                                    <div class="title-register">Aqui o administrador pode alterar informações do tutorial</div><br>
                                </div>
                                <table border="1px" class="alterar">
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
                                    <form action="processar-alterar-tutorial.php" method="post">
                                        <tr>
                                            <td>
                                                <input type="hidden" name="id_tutorial" value="'.$linha["id_tutorial"].'">
                                                '.$linha["id_tutorial"].'
                                            </td>
                                            <td>
                                                <input class="width100 space_tutorial" required="" placeholder="Atrativo" type="text" name="title_tutorial"  maxlength="1000" value="'.$linha["title_tutorial"].'">
                                            </td>
                                            <td>
                                                <input class="space_tutorial" required="" placeholder="Decente" type="text" name="descricao_tutorial"  maxlength="1000" value="'.$linha["description"].'">
                                            </td>
                                            <td>
                                                <input class="space_tutorial" required="" placeholder="link" type="text" name="pdf"  maxlength="200" value="'.$linha["archive"].'">
                                            </td>
                                            <td>
                                                <input type="hidden" name="id_user" value="'.$linha["tutorial_id_user"].'">
                                                '.$linha["tutorial_id_user"].'
                                            </td>
                                            <td>
                                                <input class="space_tutorial" required="" pattern="[0-4]+" placeholder="número" type="text" name="status"  maxlength="1" value="'.$linha["status"].'">
                                            </td>
                                            <td>
                                                <input class="space_tutorial" required="" placeholder="link" type="text" name="image"  maxlength="1000" value="'.$linha["image_tutorial"].'">
                                            </td>
                                            <td>
                                                <input class="space_tutorial" required="" pattern="#[a-fA-F0-9][a-fA-F0-9][a-fA-F0-9][a-fA-F0-9][a-fA-F0-9][a-fA-F0-9]" placeholder="Hexadecimal" type="text" name="color"  maxlength="7" value="'.$linha["background_tutorial"].'">
                                            </td>
                                            <td>
                                                <input type="submit" name="submit" value="Alterar" />
                                            </td>
                                    </form>
                                    <form action="processar-alterar-tutorial.php" method="post">
                                            <td>
                                                <input type="submit" name="submit" value="Apagar" />
                                            </td>
                                    </form>
                                        </tr>
                                </table>
                            ');
                        }
                    } else {
                        echo('<b style="color: red;">ERRO EM BUSCA ID</b>');
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
                <p>*status = 0 equivalente à sem denuncia<br>
                   *status = 1 equivalente à denunciado
                </p>
            </div>
        </div>
        <div class="margin-bottom"></div>
        <div class="news"></div>
    </section>
<?php
    require ("feet.php");
?>
