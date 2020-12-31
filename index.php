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
            <div class="title">Bem-Vindo ao Thunder</div>
            <div class="text">
        <?php
            $texto = '<p>Seja bem-vindo usuário, aqui você pode receber respostas para qualquer dúvida que tiver quanto à informática e para as dúvidas que nem sabia que tinha.<br>';
            echo($texto);
        
            require("conectar.php");
        
            if(isset($_SESSION["id"])){
                $sql = mysqli_query($conexao, "select class_user.class,class_user.level,class_user.score as pontos,user.password,user.name,user.nickname as nick,user.email,user.gender,user.user_id_category_user as admin FROM class_user,user WHERE user_id_class_user=id_class_user and id_user='".$_SESSION["id"]."'");
                $id = mysqli_fetch_array($sql);
                $genero=$id["gender"];
                //$senha = sha1('.$id["password"].');
                //echo($senha);
                if($id["gender"]=='m'){
                    $genero='Masculino';
                }
                if($id["gender"]=='f'){
                    $genero='Feminino';
                }
                echo('
                    <p><b>Olá '.$_SESSION["nick"].'</b></p>
                    <div>
                        <form class="homework">
                            <table>
                                <div class="title-register">Dados cadastrais do usuário</div>
                                <tr>
                                    <td><label>Nome:</label></td><td> '.$id["name"].'</label></td>
                                </tr>
                                <tr>
                                    <td><label>Nickname:</label></td><td> '.$id["nick"].'</td>
                                </tr>
                                <tr>
                                    <td><label>Email:</td><td> '.$id["email"].'</label></td>
                                </tr>
                                <tr>
                                    <td><label>Gênero:</td><td> '.$genero.'</label></td>
                                </tr>
                                <tr>
                                    <td><label>Classe:</td><td> '.$id["class"].'</label></td>
                                </tr>
                                <tr>
                                    <td><label>Nivel:</td><td> '.$id["level"].'</label></td>
                                </tr>
                                <tr>
                                    <td><label>Score:</td><td> '.$id["pontos"].'</label></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                    <div>
                        <form class="homework2" action="atualizar-cadastro.php" method="post">
                            <div class="title-register">Alteração dos dados cadastrais</div>
                            <table>
                                <tr>
                                    <td><label>Nome:</label></td>
                                    <td><input class="space1" required="" pattern="[a-zA-Zç Ç1]+" placeholder="Modificação" type="text" name="nome2" id="name" maxlength="100" value="'.$id["name"].'"></td>
                                </tr>
                                <tr>
                                    <td><label>Nick:</label></td>
                                    <td><input class="space1" required="" pattern="[a-zA-Zç Ç0-9_]+" placeholder="ate 100 caracteres" type="text" name="nick2" maxlength="30" value="'.$id["nick"].'"></td>
                                </tr>
                                <tr>
                                    <td><label>Email:</label></td>
                                    <td><input class="space1" required="" pattern="[a-zA-Zç Ç_-.]+@[a-zA-Zç Ç.]+" placeholder="email@dominio" type="text" name="email2" maxlength="100" value="'.$id["email"].'"></td>
                                </tr>
                                <tr>
                                    <td><label>Senha</label></td>
                                    <td><input class="space1" required="" placeholder="Lembre-se dela" type="password" name="password2" id="password2" maxlength="100" value="'.$id["password"].'"></td>
                                </tr>
                                <tr><td><input type="submit" name="submit" value="Enviar" /></td></tr>
                            </table>
                        </form>
                        <!--'.$id["admin"].'-->
                    </div>
                ');
                if ($id["admin"]==0) {
                    echo('
                        <div class="homework3">
                            <div class="title-register">Hey admin!</div>
                            <form action="insert-tutorial.php" method="post">
                                <table>
                                    <tr>
                                        <td><label>Titulo do Tutorial:</label></td>
                                        <td class="li_grande"><input class="space2" required="" placeholder="Faça um nome atrativo" type="text" name="title_tutorial" maxlength="1000" /></td>
                                    </tr>
                                    <tr>
                                        <td><label>Descrição do tutorial:</label></td>
                                        <td><input class="space2" required="" placeholder="Escreva sua descrição decente" type="text" name="descricao-tutorial" maxlength="1000" /></td>
                                    </tr>
                                    <tr>
                                        <td>PDF do Tutorial:</td> <td><input type="text" name="pdf" id="pdf" class="space2" placeholder="Coloque o link" maxlength="200"/></td>
                                    </tr>
                                    <tr>
                                        <td>Imagem do Tutorial:</td> <td><input type="text" name="image" id="image"  class="space2" placeholder="Coloque o link"/></td>
                                    </tr>
                                    <tr>
                                        <td>Cor do tutorial</td> <td><input type="text" name="color" id="color" pattern="#[a-fA-F0-9][a-fA-F0-9][a-fA-F0-9][a-fA-F0-9][a-fA-F0-9][a-fA-F0-9]" class="space2" placeholder="#FFFFFF    <--   Hexadecimal" maxlength="7"/></td>
                                    </tr>
                                        <input type="hidden" name="id_user" value="'.$_SESSION["id"].'">
                                    <tr>
                                        <td><input type="submit" name="submit" value="Enviar" /></td>
                                    </tr>
                                    </form><br><br>
                                </table>
                                <table>
                                    <form action="" method="post">
                                        <tr>
                                            <td>
                                                <li>
                                                Lista de usuários: <a href="lista-usuarios.php">Clique aqui para acessar</a>
                                                </li>
                                            </td>
                                        </tr>
                                    </form>
                                    <form action="" method="post">
                                        <tr>
                                            <td>
                                            <li>
                                                <p>Lista de tutoriais e suas informações: <a href="lista-tutoriais.php">Clique aqui para acessar</a></p>
                                            </li>
                                            </td>
                                        </tr>
                                    </form>
                                    <form action="" method="post">
                                        <tr>
                                            <td>
                                            <li>
                                                <p>Lista de denuncias: <a href="lista-denuncia.php">Clique aqui para acessar</a></p>
                                            </li>
                                            </td>
                                        </tr>
                                    </form>
                                </table>
                        </div>
                    ');
                }
            } else{
                $consulta = "select post.id_post,post.content from post order by post.id_post desc limit 3 offset 0;";
                //echo('Não logado');
                $resultado = mysqli_query($conexao,$consulta);
                echo('<br><p class="ultimas_quests">Últimas quests</p>');
                while($linha  =  mysqli_fetch_array($resultado)){
                    echo('
                        <div class="content_question_home">
                            <a href="perguntas-aberto.php?codigo='.$linha["id_post"].'">
                            <div class="article">
                            <div class="tag-post">quest '.$linha["id_post"].'</div>
                                <div class="text_quest"><p>'.$linha["content"].'</p></div>
                            </div>
                            <div class="margin-bottom"></div>
                        </div>
                    ');
                }
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

<script>
    tam = document.getElementById("password2").lenght;
    if (tam < 4)
        alert("Campo tem que ter mais que 4 caracteres");
</script>
