<?php include("templetes/dis.php");?>
<br/>
<?php 
require("funciones.php");
require("conexion.php");

session_start();
if(isset($_SESSION['logueado']) && $_SESSION['logueado'] == True){
    header('location:inicio.php');
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="registro.css">
    <title>Registro de profesores</title>
</head>

<body>
    <form class="register-form" action="" method="post">
        <h2>Registrar profesor</h2>
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" class="form-control" id="name" name="nombre" required>
        </div>
        <div class="form-group">
            <label for="last-name">Apellido Paterno:</label>
            <input type="text" class="form-control" id="last-name" name="ap1" required>
        </div>
        <div class="form-group">
            <label for="second-last-name">Apellido Materno:</label>
            <input type="text" class="form-control" id="second-last-name" name="ap2" required>
        </div>
        <div class="form-group">
            <label for="username">Usuario:</label>
            <input type="text" class="form-control" id="username" name="usu" required>
        </div>
        <div class="form-group">
            <label for="password">Contraseña:</label>
            <input type="password" class="form-control" id="password" name="con" required>
        </div>
        <button type="submit" class="btn btn-warning" name="registrar">Registrarse</button>
        <a class="btn btn-success" href="index.php">Regresar</a>
        <?php
    if(isset($_POST)){
        if(isset($_POST['registrar'])){
            $nombre = trim((isset($_POST['nombre'])))?$_POST['nombre']:"";
            $ape1 = trim((isset($_POST['ap1'])))?$_POST['ap1']:"";
            $ape2 = trim((isset($_POST['ap2'])))?$_POST['ap2']:"";
            $usu = trim((isset($_POST['usu'])))?$_POST['usu']:"";
            $con = trim((isset($_POST['con'])))?$_POST['con']:"";

            if(empty($nombre) || empty($ape1) || empty($ape2) || empty($usu) || empty($con)){
                echo "<br>Campos vacios, favor de revisar";
            }else if(!validarUsu($nombre) || !validarUsu($ape1) || !validarUsu($ape2) || !validarUsu($usu)){
                echo "<br>los campos deben ser letras";
            }else if(!validarCon($con)){
                echo "<br>La contraseña no cumple";
            }else{
                // ejecutar la consulta INSERT
                $sql = "INSERT INTO profesores1 (nombre, apellido_p, apellido_m, usuario, contrasena) VALUES ('$nombre', '$ape1', '$ape2','$usu','$con')";
                if(oci_execute(oci_parse($conn, $sql))){
                    echo '<br>Se guardo correctamente';
                    oci_close($conn);
                }
            }
        }
    }

?>
    </form>

</body>

</html>