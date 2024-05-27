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
  <h1>M O D I F I C A R</h1>
  <p>꧁༻-༺꧂</p>

</div>

<style>
    /* Estilos CSS */
form {
      width: 500px;
      margin: 20px auto;
    }

  label {
      display: block;
      margin-bottom: 5px;
    }

input[type="text"],
 input[type="number"] {
      width: 100%;
      padding: 8px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

select {
      width: 100%;
      padding: 8px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

input[type="submit"] {
      padding: 10px 20px;
      background-color: #f7797d;
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

input[type="submit"]:hover {
      background-color: #45a049;
    }
  </style>
<?php
require("../conexion.php");
$id = "";
$nombre = "";
$sem = "";
$per = "";
$car = "";

if(isset($_POST)){
    if(isset($_POST['editar'])){

        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $sem = $_POST['sem'];
        $per = $_POST['per'];
        $car = $_POST['car'];
       
    }

        echo "<form method='POST' action=''>";
        echo "<input type='hidden' name='id1' value='".$id."'>";
        echo "<input type='text' name='nombre1' value='".$nombre."'>";
        echo "<input type='text' name='sem11' value='".$sem."'>";
        echo "<input type='text' name='per21' value='".$per."'>";
        echo "<input type='text' name='car1' value='".$car."'>";
        
        echo "<input type='submit' class='boton-azul' name='guardar' value='Guardar'>";
        echo "</form>";

        if(isset($_POST['guardar'])){
            $id1 = $_POST['id1'];
            $nombre1 = $_POST['nombre1'];
            $sem11 = $_POST['sem11'];
            $per21 = $_POST['per21'];
            $car1 = $_POST['car1'];
           

            $sql = "UPDATE materias SET nombre_m = '$nombre1', semestre = '$sem11', periodo = '$per21', carrera = '$car1' WHERE id_materia = '$id1'";
        
            
   
       
           
        
        
        // Realiza la conexión con la base de datos Oracle
            
     
        $conn = oci_connect('sys', '060801Areli', '//localhost:1521/orcl', 'UTF8', OCI_SYSDBA);
        $stmt = oci_parse($conn, $sql);
     
        $result = oci_execute($stmt);
        
        if($result !== false){
          
               
        oci_commit($conn); // Realiza la confirmación explícita de los cambios
             
        oci_close($conn);
            
        header('location:materias.php');
                
               
        exit;
            } 
           
        else {
                
            
        $error = oci_error($stmt);
                
               
        echo "Error al actualizar los datos: " . $error['message'];
            }
        }
        
            }
      
    if(isset($_POST['eliminar'])){
        $id = $_POST['id'];
        $sql = "DELETE materias WHERE id_materia = '$id'";
        if(oci_execute(oci_parse($conn, $sql))){
            oci_close($conn);
            header('location:materias.php');
        }
    }



?>