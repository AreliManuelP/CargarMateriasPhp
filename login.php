<?php 
    require("conexion.php");
    require("funciones.php");
    session_start();
    if(isset($_SESSION['logueado']) && $_SESSION['logueado'] == True){
        header('location:login.php');
    }
    $correo="";
    $contraseña="";
?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>

    <div class="contenedor">
        <img src="img1.png" alt="">
        <form class="login-form" action="" method="post">
<?php
    if(isset($_POST)){
        if(isset($_POST['entrar'])){
            $usuario = trim((isset($_POST['correo'])))? $_POST['correo'] :"";
            $con = trim((isset($_POST['contraña'])))? $_POST['contraseña'] :"";

            if(empty($usuario) || empty($con)){
                echo "Campos vacios, revise";
            }else if(!validarUsu($usuario)){
                echo "<br>El usuario no es admitible";
            }else if(!validarCon($con)){
                echo "<br>La contraseña no es admitible";
            }else{
                $sql = "SELECT id_cajero, nombre FROM cajeros WHERE usuario = '$usuario' AND contrasenia = '$con'";
                $ejecuta = oci_parse($conn, $sql);
                oci_execute($ejecuta);
                if ($row = oci_fetch_array($ejecuta, OCI_ASSOC)) {
                    $_SESSION['usuario_id'] = $row['ID_CAJERO'];
                    $_SESSION['usuario_nombre'] = $row['NOMBRE'];
                    $_SESSION['logueado'] = True;
                    oci_close($conn);
                    header('Location:login.php');
                  } else {
                    echo 'Usuario o contraseña incorrectos';
                  }
            }
        }
    }