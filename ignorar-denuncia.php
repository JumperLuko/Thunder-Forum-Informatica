<?php 
    session_start();
    require("conectar.php");

    $iddenouncement=$_POST['id_denouncement'];
    //$status=$_POST['status'];
    $sql = mysqli_query($conexao, "UPDATE denouncement SET denouncement.status=1 WHERE id_denouncement='".$iddenouncement."';");
?>
<script>
    window.location='lista-denuncia.php', 0000
</script>
