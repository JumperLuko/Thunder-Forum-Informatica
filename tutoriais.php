<?php
    include ("topo.php");
    require("conectar.php");
    $consulta = "select * from tutorial where tutorial.status=0";
    $resultado = mysqli_query($conexao,$consulta);
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
        <li class="selectli"><a class="select" href="tutoriais.php" >TUTORIAIS</a></li>
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
?>

<section class="content">
    <div class="article"><div class="title-tutoriais">Aqui você pode consultar tutoriais postados pelos administradores da página</div></div>
    <?php
        //$x=0;
        while($linha  =  mysqli_fetch_array($resultado)){
            //$x++;
            //echo("$x");
            echo('
                <div class="article">
                    <div class="block" style="background-color:'.$linha["background_tutorial"].';">
                        <a href="'.$linha["archive"].'"><div class="block_title">
                            '.$linha["title_tutorial"].'
                        </div>
                        <div class="block_description">
                            <br/>'.$linha["description"].'
                        </div>
                    </div></a>
                </div>
            ');
        }
    ?>
    <!--<div class="article">
        <div class="block">
            <a href="../pdf/fuciona_computador.pdf"><div class="block_title">
                Como Funciona um computador?
            </div>
            <div class="block_description">
                <br/>Aqui você aprenderá básicamente como fuciona o hardware do seu computador, de forma que pessoas sem o minímo conhecimento técnico possam entender.
            </div>
        </div></a>
    </div>
    
    <div class="article">
        <div class="block">
            <a href="../pdf/comecar_programar.pdf"><div class="block_title">
                Como começar a programar?
            </div>
            <div class="block_description">
                <br>Aqui você aprenderá o enrredo histórico da programação e como programar liguagens fáceis, de forma que pessoas sem o minímo conhecimento técnico possam entender.
            </div>
        </div></a>
    </div>
    
    <div class="article">
        <div class="block">
            <a href="../pdf/informatica.pdf"><div class="block_title">
                O que é informática?
            </div>
            <div class="block_description">
                <br>Explicação histórica e de definições sobre a informática.
            </div>
        </div></a>
    </div>-->

    <div class="margin-bottom"></div>

</section>

<?php
    require ("feet.php");
?>
