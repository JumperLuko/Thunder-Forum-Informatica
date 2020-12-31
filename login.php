<?php
    require ("topo.php");
?>
        <li class="border_top_left_radius_menu"><a class="no_select" href="index.php">HOME</a></li>
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
        ?>

    <form action="processarLogin.php" method="post" name="login" class="login">
        <ul>
            <li><div>Email:</div> <input placeholder="Digite seu email" type="text"  name="email"></li>
            <li><div>Senha:</div><input placeholder="Digite sua senha" type="password" name="senha"></li>
            <!-- <li><a href="../index-homework.html" class="myButton">ENTRAR</a></li> -->
            <li><!--<a style="color: rgb(79, 79, 119);" href="index-homework.html" >ENTRAR</a>--><input type="submit" class="myButton" value="Logar"/></li>
        </ul>
    </form>
    
<div class="marca_da_agua"><a href="codigos.html">_</a></div>  
<?php
    require ("feet.php");
?>
