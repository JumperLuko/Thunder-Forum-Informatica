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
                $sql = mysqli_query($conexao, "select class_user.class,class_user.level,class_user.score as pontos,user.name,user.nickname as nick,user.email,user.gender,user.user_id_category_user as admin FROM class_user,user WHERE user_id_class_user=id_class_user and id_user='".$_SESSION["id"]."'");
                $id = mysqli_fetch_array($sql);
                echo('
                    <p><b>Olá '.$_SESSION["nick"].'</b></p>
                    <div>
                        <form class="homework">
                            <div class="title-register">Dados cadastrais do usuário</div>
                            <li>
                                <label>Nome: '.$id["name"].'</label>
                            </li>
                            <li>
                                <label>Nickname: '.$id["nick"].'</label>
                            </li>
                            <li>
                                <label>Email: '.$id["email"].'</label>
                            </li>
                            <li>
                                <label>Gênero: '.$id["gender"].'</label>
                            </li>
                            <li>
                                <label>Classe: '.$id["class"].'</label>
                            </li>
                            <li>
                                <label>Nivel: '.$id["level"].'</label>
                            </li>
                            <li>
                                <label>Score: '.$id["pontos"].'</label>
                            </li>
                        </form>
                    </div>
                    <div>
                        <form class="homework2" action="atualizar-cadastro.php">
                            <div class="title-register">Alteração dos dados cadastrais</div>
                            <li>
                                <label>Nome:</label>
                                <input class="space1" required="" pattern="[a-zA-Zç Ç]+" placeholder="Modificação" type="text" name="nome2" id="name" maxlength="100" value="'.$id["name"].'">
                            </li>
                            <li>
                                <label>Nick:</label>
                                <input class="space1" required="" pattern="[a-zA-Zç Ç0-9_]+" placeholder="ate 100 caracteres" type="text" name="nick2" maxlength="30" value="'.$id["nick"].'">
                            </li>
                            <li>
                                <label>Email:</label>
                                <input class="space1" required="" pattern="[a-zA-Zç Ç_-.]+@[a-zA-Zç Ç.]+" placeholder="email@dominio" type="text" name="email2" maxlength="100" value="'.$id["email"].'">
                            </li>
                            <input type="submit" name="submit" value="Enviar" />
                        </form>
                        <!--'.$id["admin"].'-->
                    </div>
                ');
                if ($id["admin"]==0) {
                    echo('
                        <div class="homework3">
                            Hey admin!<br><br>
                            <form action="insert-tutorial.php">
                                <li>
                                    <label>Nome do Tutorial:</label>
                                    <input class="space2" required="" pattern="[a-zA-Zç Ç0-9_]+" placeholder="Faça um nome atrativo" type="text" name="nome-tutorial" maxlength="30">
                                </li>
                                <li>
                                    <label>Descrição do tutorial:</label>
                                    <input class="space2" required="" pattern="[a-zA-Zç Ç0-9_]+" placeholder="Escreva sua descrição decente" type="text" name="descricao-tutorial" maxlength="30>
                                </li>
                                <input type="file" name="pdf" id="pdf" /> <br>
                                Imagem do Tutorial: <input type="submit" name="submit" value="Enviar" />
                            </form>
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
