    <?php
    session_start();
    if(!isset($_SESSION["login"])){
        header("location:index.php");
    }
    $login = $_SESSION["login"];
    if($login=="administrador"){
        header("location:admin.php");
    }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            echo("Bem-vindo $login");
            echo ('<a href="chat.php"></a>');
        ?>
        
    </body>
</html>
