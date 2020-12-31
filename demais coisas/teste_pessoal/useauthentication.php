<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
<title>Autenticando</title>
<script type="text/javascript">
	function login(){
			setTimeout("window.location='index.php'", 2000);
	}
	
	function loginf()  {
		setTimeout("window.location='login.php'", 2000);
	}
</script>
</head>

<body>
<?php
require("conectar.php");

$email=$_POST['email'];
$senha=$_POST['senha'];

$sql = mysqli_query($conexao, "SELECT * FROM user WHERE email = '$email' AND password = '$senha'");
$row = mysqli_num_rows($sql);
if($row > 0) {
	session_start();
	$_SESSION['email']=$_POST['email'];
	$_SESSION['password']=$_POST['senha'];
	echo "<center>Você foi autenticado com sucesso! Aguarde um instante.</center>";
	echo "<script>login()</script>";
} else {
	echo "<center>Nome de usuário ou senha inválidos! Aguarde um instante para tentar novamente</center>";
	echo "<script>loginf()</script>";
  }

?>
</body>
</html>
