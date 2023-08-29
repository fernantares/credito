
<?php 
    include_once('config.php');

    $idtxt = $_POST['txtid'];
    $abono = $_POST['txtabono'];
    $deuda = $_POST['txtdeuda'];
    $sqlabono = "update credittable set deuda = ? - ? where iddeudor =?";
    $res = $conn->execute_query($sqlabono,[$deuda,$abono,$idtxt]); 
    header("Location: index.php");   
?>