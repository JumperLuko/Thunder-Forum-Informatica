<?php
    session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<?php
//require_once "../php/conectar.php";
?>
<head>
    <title>Thunder</title>
    <meta http-equiv="content-type" content="text/html;charset=ISO-8859-1" />
        <link rel="icon" type="" href="../icon.png">
        <link type="text/css" rel="stylesheet" href="../style.css">
        <link type="text/css" rel="stylesheet" href="../css/cadastro.css">
        <script type="text/javascript" src="script/cadastro.js"></script>
    <style>
        .article{
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <header>
        <a href="cadastro-special.php" class="special"><img src="../images/special-ativate.png" width="20px" alt="Thunder logo"></a>
        <a href="../index.php"><div class="header_img"></div></div>
        <?php
            if(isset($_SESSION["id"])){
                echo('
                <a href="../php/logout.php" class="ButtonLogin">Logout</a>
                ');
            }else{
                echo('
                <a href="login.php" class="ButtonLogin">Login</a>
                ');
            }
        ?>
    </header>

<nav class="navbar" role="navigation"> 
    <div class="navbar_padding">
        <li class="border_top_left_radius_menu"><a class="no_select" href="../index.php">HOME</a></li>
        <li class="border_menu"><a class="no_select" href="perguntas.php" >PERGUNTAS</a></li>
        <li class="border_menu"><a class="no_select" href="tutoriais.php" >TUTORIAIS</a></li>
        <li class="border_menu"><a class="no_select" href="contato.php" >CONTATO</a></li>
        <?php
            if(isset($_SESSION["id"])){
                echo('
                <li class="border_top_right_radius_menu" style="border-bottom: 4px rgb(87, 155, 190) solid;"><a class="select" href="criar_perguntas.php" >CRIAR  PERGUNTAS</a></li>
                ');
            }else{
                echo('
                <li class="border_top_right_radius_menu" style="border-bottom: 4px rgb(87, 155, 190) solid;"><a class="select" href="cadastro.php" >CADASTRE-SE</a></li>
                ');
            }
        ?>
        <input type="text" name="searching" placeholder="Pesquisar no fórum" class="search" value="">
        <a href="../index.html" class="ButtonSearch"><img src="../images/search-icon.png" width="20px"></a>
    </div>
</nav>
    
<div class="marca_da_agua"><a href="../codigos.html">_</a></div>  
  
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
                        require("../php/conectar.php");
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
    
<footer class="feet">
        <p><font>Recomendacoes: </font></p><a href="http://store.steampowered.com/"><strong>Steam</strong> (Comunidade de jogos)</a>, <a href="https://cpanel.hostinger.com.br/"><strong>Hostinger</strong> (hospedagem gratuita)</a>
</footer>

</body>

</html>
