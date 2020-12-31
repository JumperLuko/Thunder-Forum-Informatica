<?php
require("conectar.php");

$nome=$_POST['nome-tutorial'];
$descricao=$_POST['descricao-tutorial'];
$pdf=$_POST['pdf'];
//$sexo=$_POST['sexo'];
//$senha=$_POST['senha'];

//"'.$_SESSION['id'].'"

$sql = mysqli_query($conexao, "INSERT INTO tutorial(name,description,archive,--,--,--,tutorial_id_user)
VALUES('$nome','$descricao','$pdf','--','--','--',"'.$_SESSION['id'].'")");
?>
