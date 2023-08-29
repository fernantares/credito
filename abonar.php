<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"
        defer></script>
    <title>ABONO</title>
</head>
<?php
include("config.php");
?>

<body>
    <div class="container-fluid">
        <nav class="navbar bg-dark mb-3 border-bottom">
            <div class="container-fluid">
                <span class="navbar-text text-light fw-bold fs-2">CREDITO</span>
            </div>
        </nav>
        
        <div class="row">
            <?php 
                $id = $_GET['id'];
                $sql = "select iddeudor, deuda from credittable where iddeudor =?";
                $res = $conn->execute_query($sql,[$id]);
                $row = $res->fetch_assoc();
            ?>
            <form  name="abonar" action="actualizar.php" method="POST">
                <div class=" mb-3 text-center form-group">
                    <span>ABONAR</span>
                    <input  name="txtid" class="form-control mb-3" type="hidden" value="<?php echo $row["iddeudor"] ?>"/>
                    <input  name="txtdeuda" class="form-control mb-3" type="hidden"  value="<?php echo $row["deuda"] ?>"/>
                    <input autofocus name="txtabono" class="form-control mb-3" type="number"/>
                    <button class="btn btn-primary">ACEPTAR</button>
                    <a class="btn btn-warning" href="index.php">CANCELAR</a>
                </div>
            </form>
        </div>
    </div>
</body>
<script src="mainjs.js"></script>

</html>