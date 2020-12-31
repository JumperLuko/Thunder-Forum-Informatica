<?php 
    session_start();
    require("conectar.php");

    $denouncement_id=$_POST['denouncement_id'];
    $id_denouncement=$_POST['id_denouncement'];
    //$status=$_POST['status'];
    $sql = mysqli_query($conexao, "UPDATE comment SET comment.status=2 WHERE comment.id_comment='".$denouncement_id."';");
    $sql = mysqli_query($conexao, "UPDATE denouncement SET denouncement.status=2 WHERE denouncement.id_denouncement='".$id_denouncement."';");
?>
<script>
    window.location='lista-denuncia.php', 0000
    //UPDATE status=1 FROM comment,denouncement WHERE comment.id_comment=$denouncement_id_comment;
</script>
