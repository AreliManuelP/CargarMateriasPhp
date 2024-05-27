<!DOCTYPE html>
<html lang="en" xmlns:th="http://www.thymeleaf.org">
<head>
	<title>User Information and Form</title>
	
	<!--JQUERY-->
	<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	
	<!-- FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
	<link rel="stylesheet"
		href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script
		src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script 
		src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script 
		src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	
	<!-- Los iconos tipo Solid de Fontawesome-->
	<link rel="stylesheet"
		href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
	<script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
	
	<!-- Nuestro css-->
	<link rel="stylesheet" type="text/css" href="static/css/user-form.css"
		th:href="@{/css/user-form.css}">
	<!-- DATA TABLE -->
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">	
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">



</head>
<body>
	<div class="container">
	<div class="mx-auto col-sm-8 main-section" id="myTab" role="tablist">
		<ul class="nav nav-tabs justify-content-end">
			<li class="nav-item">
			<a class="nav-link active" id="list-tab" data-toggle="tab" href="#list" role="tab" aria-controls="list" aria-selected="false">List</a>
			</li>
			<li class="nav-item">
			<a class="nav-link" id="form-tab" data-toggle="tab" href="#form" role="tab" aria-controls="form" aria-selected="true">Form</a>				   	
			</li>
		</ul>
		<div class="tab-content" id="myTabContent">
			<div class="tab-pane fade show active" id="list" role="tabpanel" aria-labelledby="list-tab">
				<div class="card">
					<div class="card-header">
						<h4>Lista PROFESORES</h4>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table id="userList" class="table table-bordered table-hover table-striped">
								<thead class="thead-light">
								<tr>
									<th scope="col">ID</th>
									<th scope="col">Nombre</th>
									<th scope="col">APP</th>
									<th scope="col">APM</th>
									<th scope="col">Carrera</th>
									<th scope="col">Correo</th>
									<th scope="col">Turno</th>
								
									
								
								</tr>
								</thead>
								<tbody>
									<?php
									$consulta = "SELECT * FROM profesor";
									$ejecute= sqlsrv_query($conn,$consulta);
									$i=0;
									while ($fila = sqlsrv_fetch_array($ejecute)){
									  $id_profesor= $fila['id_profesor'];
									  $Nombre=$fila['Nombre'];
									  $App=$fila['App'];
									  $Apm=$fila['Apm'];
									  $Carrera=$fila['Carrera'];
									  $Correo=$fila['Correo'];
									  $Turno=$fila['Turno'];
									 

									  $i++;
									
									?>
									<tr aling ="center">
									  <td><?php echo $id_profesor?></td>
									  <td><?php echo $Nombre?></td>
									  <td><?php echo $App?></td>
									  <td><?php echo $Apm?></td>
									  <td><?php echo $Carrera?></td>
									  <td><?php echo $Correo?></td>
									  <td><?php echo $Turno?></td>
								
									  <td>
										| <a href="bajas.php"><i class="fas fa-user-times"></i></a>
									</td>
									</tr>

									<?php }?>
										
									
								
								</tbody>
							</table>
						</div>


<?php
if(isset($GET['borrar'])){
	$borrar_id= $_GET['borrar'];
    $borrar ="DELETE FROM alumno WHERE matricula='$borrar_id'";
	if ($ejecute){
		echo "<script>alert('El alumno se borro')</script>";
echo "<script>window.open('galumno.php','_self')</script>";
	}
}
?>
					</div>
				</div>
			</div>
			<div class="tab-pane fade" id="form" role="tabpanel" aria-labelledby="form-tab">
				<div class="card">
					<div class="card-header">
					<form action='fprofesor.php' method='post' >
						<h4>Formulario Ingresar JEFE DIVISION</h4>
					</div>
					<div class="card-body">
						<form class="form" role="form" autocomplete="off">
							<div class="form-group row">
								<label class="col-lg-3 col-form-label form-control-label">ID_Profesor</label>
								<div class="col-lg-9">
								<input id="caja" type="text" name="id_profesor" class="col-lg-9" placeholder="Ingrese el id profesor">
								</div>
						</div>
						<div class="form-group row">
								<label class="col-lg-3 col-form-label form-control-label">Nombre</label>
								<div class="col-lg-9">
								<input id="caja" type="text" name="Nombre" class="col-lg-9" placeholder="Ingrese el nombre">
								</div>
						</div>
						<div class="form-group row">
								<label class="col-lg-3 col-form-label form-control-label">Apellido Paterno</label>
								<div class="col-lg-9">
								<input id="caja" type="text" name="App" class="col-lg-9" placeholder="Ingrese el app">
								</div>
						</div>
						<div class="form-group row">
								<label class="col-lg-3 col-form-label form-control-label">Apellido Materno</label>
								<div class="col-lg-9">
								<input id="caja" type="text" name="Apm" class="col-lg-9" placeholder="Ingrese el apm">
								</div>
						</div>
						<div class="form-group row">
								<label class="col-lg-3 col-form-label form-control-label">Carrera</label>
								<div class="col-lg-9">
								<input id="caja" type="text" name="Carrera" class="col-lg-9" placeholder="Ingrese la carrera">
								</div>
						</div>
						<div class="form-group row">
								<label class="col-lg-3 col-form-label form-control-label">Correo</label>
								<div class="col-lg-9">
								<input id="caja" type="text" name="Correo" class="col-lg-9" placeholder="Ingrese el correo">
								</div>
						</div>
						<div class="form-group row">
								<label class="col-lg-3 col-form-label form-control-label">Turno</label>
								<div class="col-lg-9">
								<input id="caja" type="text" name="Turno" class="col-lg-9" placeholder="Ingrese el turno">
								</div>
						</div>
					
							
							<div class="form-group row">
								<div class="col-lg-12 text-center">
									<input type="reset" class="btn btn-secondary" value="Cancel">
									<input type="submit" value ="Registrar" class="btn-enviar" required>
										
								</div>
							</div>
						</form>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>