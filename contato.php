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
        <li class="border_menu"><a class="no_select" href="perguntas.php" >PERGUNTAS</a></li>
        <li class="border_menu"><a class="no_select" href="tutoriais.php" >TUTORIAIS</a></li>
        <li class="selectli"><a class="select" href="contato.php">CONTATO</a></li>
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
<section class="content">
    <div class="article">
        <div class="text_contato">
            Email: email@email. <br>
            Google+: <br><br><br>

            <strong>Quem somos:</strong> <br><br>
            Somos tr�s estudantes do Instituto Federal Catarinense de Araquari, cursando o ensino m�dio com curso t�cnico integrado de inform�tica. Come�amos a criar este site para o trabalho de conclus�o de curso, mas n�o iremos parar quando acabarmos o ensino m�dio, pois nosso objetivo com este site vai muito al�m de simplesmente terminar o curso. Nosso objetivo � auxiliar a todos aqueles que precisem de ajuda em rela��o � inform�tica. 
        </div>
    </div>
</section>
<?php
    require ("feet.php");
?>
