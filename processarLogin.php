<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
<title>Autenticando</title>
<script type="text/javascript">
    function login(){
        setTimeout("window.location='index.php'", 0000);
    }
    function loginf()  {
        setTimeout("window.location='login.php'", 0000);
    }
</script>
</head>

<body>
<?php
require("conectar.php");

$email=$_POST['email'];
$senha=$_POST['senha'];

$sql = mysqli_query($conexao, "SELECT user.id_user,user.nickname as nick,user.email as email,user.name as name,user.gender as gender FROM user WHERE email = '".$email."' AND password = '".$senha."'");
$row = mysqli_num_rows($sql);
$id = mysqli_fetch_array($sql);
if($row == 1) {
    session_start();
    $_SESSION['id']=$id['id_user'];
    $_SESSION['nick']=$id['nick'];
    //$_SESSION['email']=$id['email'];
    //$_SESSION['name']=$id['name'];
    //$_SESSION['gender']=$id['gender'];
    echo "<center><h1>Você foi autenticado com sucesso! Aguarde um instante.</h1></center>";
    echo "<script>login()</script>";
} else {
    echo "<center><h1>Nome de usuário ou senha inválidos! Aguarde um instante para tentar novamente</h1></center>";
    echo "<script>loginf()</script>";
  }
?>
</body>
</html>
