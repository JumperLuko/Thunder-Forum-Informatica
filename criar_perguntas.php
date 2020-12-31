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
        <li class="border_menu"><a class="no_select" href="contato.php" >CONTATO</a></li>
        <?php
            if(isset($_SESSION["id"])){
                echo('
                <li class="selectli"><a class="select" href="criar_perguntas.php">CRIAR  PERGUNTAS</a></li>
                ');
            }else{
                echo('
                <li class="selectli"><a class="select" href="cadastro.php">CADASTRO</a></li>
                ');
            }
        ?>
<?php
    require ("topo2.php");
?>
<section class="content">
    <div class="article">
        <form action="../php/cadastrando-pergunta.php" method="post">
            <fieldset>
                <legend><h1>Cadastramento de postagem</h1></legend>
                <li>
                    <label>Pergunta: </label>
                    <input type="text" class="textarea-perguntas" required="" placeholder="Escreva aqui"  name="conteudo" id="conteudo" maxlength="2000"/>
                </li>
                <li>
                    <label>Categoria: </label>
                    <select name="categorias">
                    <?php
                        require("conectar.php");
                        $consulta = "select * from category_post";
                        $resultado = mysqli_query($conexao,$consulta);
                        while($linha  =  mysqli_fetch_array($resultado)){
                            echo('<option value="'.$linha["idcategory_post"].'">'.$linha["category"].'</option>');
                        }
                    ?>
                    </select>
                </li>
                <?php
                    echo('
                    <input type="hidden" name="id_user" value="'.$_SESSION["id"].'">
                    ')
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
