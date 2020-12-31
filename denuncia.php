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
        <li class="border_menu" style="border-bottom: 4px rgb(87, 155, 190) solid;"><a class="select" href="perguntas.php" >PERGUNTAS</a></li>
        <li class="border_menu"><a class="no_select" href="tutoriais.php" >TUTORIAIS</a></li>
        <li class="border_menu"><a class="no_select" href="contato.php" >CONTATO</a></li>
        <?php
            if(isset($_SESSION["id"])){
                echo('
                <li class="border_top_right_radius_menu"><a class="no_select" href="criar_perguntas.php" >CRIAR  PERGUNTAS</a></li>
                ');
            }else{
                echo('
                <li class="border_top_right_radius_menu"><a class="no_select" href="cadastro.php" >CADASTRE-SE</a></li>
                ');
            }
        ?>
        <input type="text" name="searching" placeholder="Pesquisar no fórum" class="search" value="">
        <a href="../index.html" class="ButtonSearch"><img src="../images/search-icon.png" width="20px"></a>
    </div>
</nav>
    
<div class="marca_da_agua"><a href="codigos.html">_</a></div>  
  
<section class="content">
    <div class="article">
        <form action="cadastrando-denuncia.php" method="post">
            <fieldset>
                <legend><h1>Cadastramento de Denuncia</h1></legend>
                <li>
                    <label>Denuncia: </label>
                    <input type="text" class="textarea-perguntas" required="" placeholder="Escreva aqui"  name="conteudo" id="conteudo" maxlength="2000"/>
                </li>
                <?php
                    echo('<input type="hidden" name="id_user" value="'.$_SESSION["id"].'">');
                    if(isset($_GET["post"])){
                        echo('<input type="hidden" name="post" value="'.$_GET["post"].'">');
                    }else if(isset($_GET["comment"])){
                        echo('<input type="hidden" name="comment" value="'.$_GET["comment"].'">');
                    }
                ?>
                <li>
                    <input id="enviar" value="Cadastrar" type="submit">
                </li>
            </fieldset>
        </form>
    </div>
</section>
<?php
    require ("feet.php");
?>
