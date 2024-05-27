<?php include("../templetes/header.php");?>
<?php 
require_once('../conexion.php');




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>
<body>
<div class="container-fluid p-3 bg-secondary text-white text-center">
  <p>✧┈┈┈┈┈•♛•┈┈┈┈┈✧</p>
  <h1>B I E N V E N I D O</h1>
  <p>꧁༻-༺꧂</p>

</div>
   
    <?php

// Definir la consulta SQL
$sql = 'SELECT * FROM materias';

// Analizar la consulta SQL
$stmt = oci_parse($conn, $sql);

// Ejecutar la consulta
oci_execute($stmt);


?>
 <h1 style="text-shadow: 7px 4px 5px #f7797d"  >Materias</h1>
    <div class="container w-100">
    
    <a  href="agregar.php" class="btn btn-danger"  >Agregar registro</a>
        <table class="table table-danger table-striped m-2 w-100">
    <?php
    
echo "<tr>
<th>id_materia</th>
			<th>nombre_m</th>
			<th>Semestre</th>
			<th>Periodo</th>
			<th>Carrera</th>
			<th>Editar</th></tr>";
while ($row = oci_fetch_assoc($stmt)) {
    echo "<tr>";
  
    echo "<td>".$row['ID_MATERIA']."</td>";
    echo "<td>".$row['NOMBRE_M']."</td>";
    echo "<td>".$row['SEMESTRE']."</td>";
    echo "<td>".$row['PERIODO']."</td>";
    echo "<td>".$row['CARRERA']."</td>";
    
    echo "<td COLSPAN='2'>";
  
    echo "<form method='POST' action='accion.php'>";
    echo "<input type='hidden' name='id' value='".$row['ID_MATERIA']."'>";
    echo "<input type='hidden' name='nombre' value='".$row['NOMBRE_M']."'>";
    echo "<input type='hidden' name='sem' value='".$row['SEMESTRE']."'>";
    echo "<input type='hidden' name='per' value='".$row['PERIODO']."'>";
    echo "<input type='hidden' name='car' value='".$row['CARRERA']."'>";
    echo "<input type='submit' class='btn btn-info' name='editar' value='Editar'>";
    echo "</form>";
    
    echo "<form method='POST' action='accion.php'>";
    echo "<input type='hidden' name='id' value='".$row['ID_MATERIA']."'>";
    echo "<input type='submit'  class='btn btn-warning' name='eliminar' value='Eliminar'>";
    echo "</form>";
    echo "</td>";
    echo "</tr>";
    

}
echo "</table>";

// Cerrar la conexión a la base de datos
oci_close($conn);
?>
    <?php
   oci_close($conn);
   ?>
    

</div>
</body>
</html>