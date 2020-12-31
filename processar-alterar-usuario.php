<?php 
    session_start();
    require("conectar.php");

    $id_user=$_POST['id_user'];
    $name=$_POST['name'];
    $nick=$_POST['nick'];
    $email=$_POST['email'];
    $gender=$_POST['gender'];
    $admin=$_POST['admin'];
    $level=$_POST['level'];
    //$id_user=$_POST['tutorial_id_user'];
    $sql = mysqli_query($conexao, "UPDATE user SET user.name='".$name."',user.nickname='".$nick."',user.email='".$email."',user.gender='".$gender."',user.user_id_category_user='".$admin."',user.user_id_class_user='".$level."' WHERE id_user='".$id_user."'");
?>
<script>
    window.location='lista-usuarios.php', 0000
</script>
