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
        <li class="selectli"><a class="select" href="cadastro.php">CADASTRO</a></li>

    <?php
        require ("topo2.php");
    ?>
<section class="content">
<div class="article">
<!--<form action="?go=../php/cadastrando.php" method="post">-->
<form action="cadastrando.php" method="post">
<fieldset>
    <legend><h1>Cadastrando usuario</h1></legend>
    <li>
        <label>Nome:</label>
        <input class="space" required="" pattern="[a-zA-Z� �]+" placeholder="verdadeiro" type="text" name="nome" id="name" maxlength="1000">
    </li>
    <li>
        <label>Nickname:</label>
        <input class="space" required="" pattern="[a-zA-Z� �0-9_]+" placeholder="ate 100 caracteres" type="text" name="nick" maxlength="150">
    </li>
    <li>
        <label>Email:</label>
        <input class="space" required="" pattern="[a-zA-Z� �_-.]+@[a-zA-Z� �.]+" placeholder="email@dominio" type="text" name="email" maxlength="100">
    </li>
    
     <li>
        <label>G�nero:</label>
        <select name="sexo">
            <option value="m">Masculino</option>
            <option value="f">Feminino</option>
        </select>
    </li>
    
    <!--<li>
        <label>G�nero:</label>
        <select class="sexo">
            <option value="f" '.$check1.'>Feminino</option>
            <option value="m" '.$check2.'>Masculino</option>
            <!--<option value="n">none</option>
        </select>
    </li>
    <li> -->

    <!--<li>
        <label>Nascimento:</label>
        <input required="" pattern="[0-3][0-9]/[0-1][0-9]/[1-2][0-9][0-9][0-9]" placeholder="dd/mm/yyyy" type="date" name="date">
    </li>-->
    
    <li>
        <label>Senha:</label>
        <input class="space" required="" placeholder="lembre-se dela" type="password" name="senha" maxlength="255">
    </li>

        <input id="enviar" value="Cadastrar" type="submit">  <!--formaction="../index.html"-->
    </li>
</fieldset>
</form>
</div>
</section>
    
<footer class="feet">
        <p><font>Recomenda��es: </font></p><a href="http://store.steampowered.com/"><strong>Steam</strong> (Comunidade de jogos)</a>, <a href="https://cpanel.hostinger.com.br/"><strong>Hostinger</strong> (hospedagem gratuita)</a>
</footer>

</body>

</html>
