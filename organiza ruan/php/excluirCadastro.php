    <?php

    session_start();
    if (!isset($_SESSION["admin"])) {
        header("location: index.php");
        
    $id = $_GET["id"];
    require("conectar.php");
    $result = mysqli_query($link, "DELETE FROM tabelaCadastross WHERE id = $id");
    header("location: admin.php");
    ?>