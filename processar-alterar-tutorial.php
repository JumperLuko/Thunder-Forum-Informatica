<?php 
    session_start();
    require("conectar.php");

    $id_tutorial=$_POST['id_tutorial'];
    $title=$_POST['title_tutorial'];
    $descricao=$_POST['descricao_tutorial'];
    $pdf=$_POST['pdf'];
    $status=$_POST['status'];
    $image=$_POST['image'];
    $color=$_POST['color'];
    //$id_user=$_POST['tutorial_id_user'];
    $sql = mysqli_query($conexao, "UPDATE user SET tutorial.title_tutorial='".$title."',tutorial.description='".$descricao."',tutorial.archive='".$pdf."',tutorial.status='".$status."',tutorial.image_tutorial='".$image."',tutorial.background_tutorial='".$color."' WHERE id_tutorial='".$id_tutorial."'");
?>
<script>
    window.location='lista-tutoriais.php', 0000
</script>
