<?php
require("conectar.php");

session_start();
if(!isset($_SESSION['email']) || !isset($_SESSION['senha']))	{
	header("Location: Login.php");
	exit;
}
if($_SESSION['email']=\\comparar com cadastro do banco) 

else {
	echo "Você esta logado! :D";
}
?>


<html>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
<title>painel</title>
<head>
</head>

<body>
</body>
</html>
