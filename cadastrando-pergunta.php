<?php
    require("conectar.php");
    $consulta = "select NOW() as date";
    $resultado = mysqli_query($conexao,$consulta);
    $linha = mysqli_fetch_array($resultado);
    $content=$_POST['conteudo'];
    $status=0;
    $date=$linha['date'];
    $post_id_category_post=$_POST['categorias'];
    $post_id_user=$_POST['id_user'];

    $sql = mysqli_query($conexao, "INSERT INTO post(date,content,status,post_id_category_post,post_id_user)
    VALUES('$date','$content','$status','$post_id_category_post','$post_id_user')");
?>
    <script>
        window.location='../html/perguntas.php', 0000
    </script>
