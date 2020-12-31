<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
<title>Cadastrando...</title>
</head>

<body>

<?php
require("conectar.php");

$nome=$_POST['nome'];
$nick=$_POST['nick'];
$email=$_POST['email'];
$senha=$_POST['senha'];
$sexo=$_POST['sexo'];

$sql = mysqli_query($conexao, "INSERT INTO user(name,nickname,email,gender,password)
VALUES('$nome','$nick','$email','$sexo','$senha')")
?>
</body>

</html>
