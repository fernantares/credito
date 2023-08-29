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
    <title>CREDITO</title>
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

            <?php if(isset($_POST['nuevocredito'])){
                $nuevocred = $_POST['nuevocredito'];
                $sqlnuevo = "Insert into credittable (name) values ('".strtoupper($nuevocred)."')";
                $res = $conn->query($sqlnuevo);}
            ?>

            <form  name="nuevocredito" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> method="POST">
                <div class="input-group mb-3">
                    <span class="col-2 input-group-text">NUEVO CREDITO</span>
                    <input name="nuevocredito" type="text" class="col-6 form-control" placeholder="NOMBRE COMPLETO" aria-label="NOMBBRE">
                    <button class="col-4 btn btn-primary" type="submit">ACEPTAR</button>
                </div>
            </form>
    <!-------------------------------------------------------------------------------------------------------------------------------------->
           <?php        
           if($_GET){
            $id = $_GET['iddeudor'];
            $sql2 = "update credittable set deuda = deuda + 15 where iddeudor =?";
            $res2 = $conn->execute_query($sql2,[$id]);
           };
            ?>

                <form name="modificar" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> method="GET">
                <table class="table table-hover table-md table-responsive table-bordered border-prymary ">
                    <thead class="table-dark fs-7">
                        <th></th>
                        <th>NOMBRE</th>
                        <th class="col-2 text-center">AGREGAR COCA</th>
                        <th class="col-2 text-center">ABONAR</th>
                        <th class="col-2 text-center">DEBE TOTAL</th>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "select * from credittable order by name asc";
                        $res = $conn->query($sql);
                        while ($row = $res->fetch_assoc()) {
                            ?>
                            <tr>
                                <td><input name="txtid" type="hidden" value="<?php echo $row['iddeudor']?>"></td>
                                <td class="fs-4 text-center"><?php echo $row['name']; ?></td>
                                <td class="text-center"><a href="index.php?iddeudor=<?php echo $row['iddeudor']?>" class="btn"><img style="width: 40px; height: 40px;" src="soda.png" alt="">+1</button></td>
                                <td class="text-center">
                                <a name="abonobtn" href="abonar.php?id=<?php echo $row['iddeudor']?>" class="btn btn-primary text-center">ABONAR</a>
                                </td>
                                <td class="fs-4 text-center"><input id="deudatxt" name="deudatxt" class="input-form text-center" type="text" value="<?php echo $row['deuda'];?>"></td>
                            </tr>
                        <?php 
                        }
                        ?>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</body>
<script src="mainjs.js"></script>

</html>