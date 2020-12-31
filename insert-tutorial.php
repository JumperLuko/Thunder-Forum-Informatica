<?php
    session_start();
    require("conectar.php");
    if ('.$_SESSION["id"].'==0) {
    $title=$_POST['title_tutorial'];
    $descricao=$_POST['descricao-tutorial'];
    $pdf=$_POST['pdf'];
    $image=$_POST['image'];
    $color=$_POST['color'];
    $id_user=$_POST['id_user'];

    $sql = mysqli_query($conexao, "INSERT INTO tutorial(title_tutorial,description,archive,tutorial_id_user,status,image_tutorial,background_tutorial)
    VALUES('$title','$descricao','$pdf','$id_user','0','$image','$color')");
    echo("
        <h1>OK</h1>
        <script>
            window.location='index.php', 0000
        </script>
    ");
    } else {
        echo('Esta área é somente para administrador!!!');
        echo("
            <script>
                window.location='index.php', 9000
            </script>
        ");
    }
?>
