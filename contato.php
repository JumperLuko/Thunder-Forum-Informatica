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
            Somos três estudantes do Instituto Federal Catarinense de Araquari, cursando o ensino médio com curso técnico integrado de informática. Começamos a criar este site para o trabalho de conclusão de curso, mas não iremos parar quando acabarmos o ensino médio, pois nosso objetivo com este site vai muito além de simplesmente terminar o curso. Nosso objetivo é auxiliar a todos aqueles que precisem de ajuda em relação à informática. 
        </div>
    </div>
</section>
<?php
    require ("feet.php");
?>
