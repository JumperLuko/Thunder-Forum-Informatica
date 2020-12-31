<?php
    require ("topo.php");
?>
    
    <h1 style="color: white;">Se nenhum erro apareceu, Seu cadastro foi concluido com sucesso!</h1>

<?php
require("conectar.php");

$nome=$_POST['nome'];
$nick=$_POST['nick'];
$email=$_POST['email'];
$sexo=$_POST['sexo'];
$senha=$_POST['senha'];
//$senha = sha1($senha);

$sql = mysqli_query($conexao, "INSERT INTO user(name,nickname,email,gender,password,user_id_category_user,user_id_class_user)
VALUES('$nome','$nick','$email','$sexo','$senha','1','0')");
?>

</body>

</html>
<script>
window.location='login.php', 0000
</script>
