<?php
    function Incluir($tabela,$content,$status,$comment_id_user,$comment_id_post){
    $incluir="INSERT INTO ".$tabela." (`content`, `status`, `comment_id_user`, `comment_id_post`) VALUES ('".$content."','".$status."','".$comment_id_user."','".$comment_id_post."')";
    return $incluir;
 }
?>
