<?php
    $nome2=$_POST['nome2'];
    $nick2=$_POST['nick2'];
    $email2=$_POST['email2'];
    
    $sql = mysqli_query($conexao, "UPDATE user SET name='".$nome2."',nickname='".$nick2."',email='".$email2."' WHERE id_user='".$_SESSION["id"]."'");
?>
<script>
    //window.location='index.php', 9000
</script>
