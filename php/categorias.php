<?php
    require("../php/conectar.php");
    
    $consulta = "select * from category_post";
    $resultado = mysqli_query($conexao,$consulta);
    while($linha  =  mysqli_fetch_array($resultado)){
    echo('<img src="../images/arrow-right.png" width="5px"><a href="../html/perguntas.php?categoria='.$linha["idcategory_post"].'">'.$linha["category"].'</a><br>');
    }
?>
