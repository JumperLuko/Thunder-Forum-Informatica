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
            $sql = mysqli_query($conexao, "select class_user.class,class_user.level,class_user.score as pontos,user.name,user.nickname,user.email,user.gender FROM class_user,user WHERE user_id_class_user=id_class_user");
            $id = mysqli_fetch_array($sql);
        
            if(isset($_SESSION["id"])){
                echo('
                    <p><b>Olá '.$_SESSION["nick"].'</b></p>
                    <form class="homework">
                        <li>
                            <label>Nome: '.$_SESSION["name"].'</label>
                        </li>
                        <li>
                            <label>Nickname: '.$_SESSION["nick"].'</label>
                        </li>
                        <li>
                            <label>Email: '.$_SESSION["email"].'</label>
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
                ');}
        ?>
            </div>
        </div>
        <div class="margin-bottom"></div>
        <div class="news"></div>
    </section>
<?php
    require ("feet.php");
?>
