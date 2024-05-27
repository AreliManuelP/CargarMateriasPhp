<?php include("../templetes/header.php");?>
<?php 

require("../conexion.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container-fluid p-3 bg-secondary text-white text-center">
  <p>✧┈┈┈┈┈•♛•┈┈┈┈┈✧</p>
  <h1>A G R E G A R </h1>
  <h1>M A T E R I A</h1>
  <p>꧁༻-༺꧂</p>

</div>

    <form class="register-form mt-3 mx-auto w-50" action="" method="post" >
        <h2>Llenar campos:</h2>
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" class="form-control" id="name" name="nombre" required>
        </div>
        <div class="form-group">
            <label for="last-name">Semestre:</label>
            <input type="text" class="form-control" id="last-name" name="sem" required>
        </div>
        <div class="form-group">
            <label for="second-last-name">Periodo:</label>
            <input type="text" class="form-control" id="second-last-name" name="per" required>
        </div>
        <div class="form-group">
            <label for="username">Carrera:</label>
            <input type="text" class="form-control" id="username" name="car" required>
        </div>
     
        <button type="submit" class="btn btn-warning" name="registrar">Agregar</button>
        <a href="materias.php" class="btn btn-success">Regresar</a>
        <?php
    if(isset($_POST)){
        if(isset($_POST['registrar'])){
            $nombre = trim((isset($_POST['nombre'])))?$_POST['nombre']:"";
            $sem = trim((isset($_POST['sem'])))?$_POST['sem']:"";
            $per = trim((isset($_POST['per'])))?$_POST['per']:"";
            $car = trim((isset($_POST['car'])))?$_POST['car']:"";

            if(empty($nombre) || empty($sem) || empty($per) || empty($car) ){
                echo "<br>Campos vacios, favor de revisar";
           
            }else{
                // ejecutar la consulta INSERT
                $sql = "INSERT INTO materias (nombre_m, semestre, periodo, carrera) VALUES ('$nombre', '$sem', '$per','$car')";
                if(oci_execute(oci_parse($conn, $sql))){
                    session_start();
                    $_SESSION['mensaje'] = 'Se guardo correctamente';
                    oci_close($conn);
                    header('location:materias.php');
                }
            }
        }
    }
?>
  <?php if(isset($_SESSION['mensaje'])){
            echo $_SESSION['mensaje'];
            unset($_SESSION['mensaje']);
        }?>

    </form>


</body>
</html>
