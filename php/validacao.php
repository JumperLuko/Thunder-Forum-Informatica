<?php
    session_start();
    require("conectar.php");
    require("incluir.php");
    if(isset($_POST['enviar_comentario'])){
        $consulta = Incluir('comment',$_POST['comentario'],0,$_SESSION['id'],$_POST['id_post']);
        $resultado=mysqli_query($conexao,$consulta);
    }
    echo('<meta http-equiv="refresh" content="0;../html/perguntas-aberto.php?codigo='.$_POST["id_post"].'">');
?>
