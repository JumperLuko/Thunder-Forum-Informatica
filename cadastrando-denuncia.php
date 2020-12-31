<?php
    require("conectar.php");
    $post_id_user=$_POST['id_user'];
    $content=$_POST['conteudo'];
    if(isset($_POST["post"])){
        $why = $_POST["post"];
        $sql = mysqli_query($conexao, "INSERT INTO denouncement(content,denouncement_id_user,denouncement_id_post)
        VALUES('$content','$post_id_user','$why')");
    }else if(isset($_POST["comment"])){
        $why = $_POST["comment"];
        $sql = mysqli_query($conexao, "INSERT INTO denouncement(content,denouncement_id_user,denouncement_id_comment)
        VALUES('$content','$post_id_user','$why')");
    }

?>
    <script>
        window.location='perguntas.php', 0000
    </script>
