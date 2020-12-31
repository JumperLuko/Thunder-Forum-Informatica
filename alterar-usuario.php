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
            <a href="lista-usuarios.php" class="ButtonBack"> <- Voltar</a>
            <div class="title">Alterar user</div>
            <div class="text">  
        <?php
            require("conectar.php");
            
            if(isset($_SESSION["id"])){
                $sql = mysqli_query($conexao, "select class_user.class,class_user.level,class_user.score as pontos,user.name,user.nickname as nick,user.email,user.gender,user.user_id_category_user as admin FROM class_user,user WHERE user_id_class_user=id_class_user and id_user='".$_SESSION["id"]."'");
                $id = mysqli_fetch_array($sql);
                if ($id["admin"]==0) {
                    if(isset($_GET['codigo'])){
                        $codigo = $_GET['codigo'];
                        $consulta = "SELECT user.id_user,user.name,user.nickname,user.email,user.gender,user.user_id_category_user,user.user_id_class_user FROM user WHERE id_user='".$codigo."'";
                        $resultado = mysqli_query($conexao,$consulta);
                        while($linha  =  mysqli_fetch_array($resultado)){
                            echo('
                                <div class="homework3" action="" method="post">
                                    <div class="title-register">Aqui o administrador pode alterar informações do usuário</div><br>
                                </div>
                                <table border="1px">
                                    <tr>
                                        <td>ID</td>
                                        <td>Nome</td>
                                        <td>Nickname</td>
                                        <td>Email</td>
                                        <td>Gender</td>
                                        <td>Admin</td>
                                        <td>Level</td>
                                    </tr>
                                    <form action="processar-alterar-usuario.php" method="post">
                                        <tr>
                                            <td>
                                                <input type="hidden" name="id_user" value="'.$linha["id_user"].'">
                                                '.$linha["id_user"].'
                                            </td>
                                            <td>
                                                <input class="space_tutorial" required="" placeholder="Real" type="text" name="name"  maxlength="1000" value="'.$linha["name"].'">
                                            </td>
                                            <td>
                                                <input class="space_tutorial" required="" placeholder="Decente" type="text" name="nick"  maxlength="1000" value="'.$linha["nickname"].'">
                                            </td>
                                            <td>
                                                <input class="space_tutorial" required="" placeholder="link" type="text" name="email"  maxlength="1000" value="'.$linha["email"].'">
                                            </td>
                                            <td>
                                                <input type="hidden" name="gender" value="'.$linha["gender"].'">
                                                '.$linha["gender"].'
                                            </td>
                                            <td>
                                ');
                                if($linha["user_id_category_user"]==0){
                                    echo('
                                        <select name="admin">
                                            <option value="0">Admin</option>
                                            <option value="1">Usuário</option>
                                        </select>
                                    ');
                                } elseif($linha["user_id_category_user"]==1){
                                    echo('
                                        <select name="admin">
                                            <option value="1">Usuário</option>
                                            <option value="0">admin</option>
                                        </select>
                                    ');
                                } else{
                                    echo('2');
                                }
                                echo('
                                                <!--<input class="space_tutorial" required="" pattern="[0-4]+" placeholder="número" type="text" name="admin"  maxlength="11" value="'.$linha["user_id_category_user"].'">-->
                                            </td>
                                            <td>
                                                <input class="space_tutorial" required="" placeholder="link" type="text" name="level"  maxlength="11" value="'.$linha["user_id_class_user"].'">
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
                <p>*admin = 0<br>
            </div>
        </div>
        <div class="margin-bottom"></div>
        <div class="news"></div>
    </section>
<?php
    require ("feet.php");
?>
