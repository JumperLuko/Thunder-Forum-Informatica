<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<?php
require_once "conectar.php";
?>

<head>
	<title>Thunder</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <link rel="icon" type="" href="../icon.png">
        <link type="text/css" rel="stylesheet" href="../style.css">
        <link type="text/css" rel="stylesheet" href="../css/cadastro.css">
	<style>
		.article{
			margin-bottom: 10px;
		}
	</style>
</head>

<body>

    <header>
		<a href="#" class="special"><img src="../images/special-ativate.png" width="20px"></a>
    	<a href="../index.php"><div class="header_img"></div></div>
        <a href="../html/login.html" class="ButtonLogin">LOGIN</a>
    </header>
    
    <h1 style="color: white;">Se nenhum erro apareceu, Seu cadastro foi concluido com sucesso!</h1>

<?php
require("conectar.php");

$nome=$_POST['nome'];
$nick=$_POST['nick'];
$email=$_POST['email'];
$sexo=$_POST['sexo'];
$senha=$_POST['senha'];

$sql = mysqli_query($conexao, "INSERT INTO user(name,nickname,email,gender,password)
VALUES('$nome','$nick','$email','$sexo','$senha')")
?>

</body>

</html>
