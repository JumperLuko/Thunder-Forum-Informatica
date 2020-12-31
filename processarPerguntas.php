<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
<title>Enviando</title>
</head>

<body>
<?php
require("conectar.php");

$idpost=$_POST['id_post'];
$post = mysqli_query($conexao, "SELECT content FROM post WHERE id_post = $idpost");
?>
</body>
</html>
