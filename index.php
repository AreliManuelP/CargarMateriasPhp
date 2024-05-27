
<?php 
require("funciones.php");
require("conexion.php");
?>


<!doctype html>
<html lang="en">

<head>
  <title>login</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
  <header>
    <!-- place navbar here -->
    
  </header>
  <main>
      <div class="container mt-5">
        <div class="card mt-5 mx-auto w-50">
          <div class="card-header bg-warning">
          <h4 style="text-align:center">♛</h4>
            <h1 style="text-align:center">ღ  L O G I N  ღ</h1>
            <h4 style="text-align:center">ツ</h4>
            <h3 style="text-align:center">Iniciar sesión para usuarios existentes</h3>
          </div>
          <div class="card-body">
            <form action="" method="post">
              <div class="mb-3">
              <img src="login.jpg" class="mx-auto d-block">
    <br>
                <label for="usu" class="form-label">Usuario</label>
                <input type="text" class="form-control" name="usu" id="usu" placeholder="Usuario">
                <label for="contra" class="form-label">Contraseña</label>
                <input type="password" class="form-control" name="pass" id="contra" placeholder="Contraseña">
                <br>
                <label for="entrar" class="form-label"></label>
                <input type="submit" class="btn btn-success" name="entrar" id="entrar" value="Entrar">
                <label for="resetear" class="form-label"></label>
                <input type="reset" class="btn btn-danger" name="reset" id="reset" value="Reset">
                <a href="registrar.php" class="btn btn-warning">Registrar</a>
              </div>
              <?php
    if(isset($_POST)){
        if(isset($_POST['entrar'])){
            $usuario = trim((isset($_POST['usu'])))? $_POST['usu'] :"";
            $con = trim((isset($_POST['pass'])))? $_POST['pass'] :"";

            if(empty($usuario) || empty($con)){
                echo "Campos vacios, revise";
            }else if(!validarUsu($usuario)){
                echo "<br>El usuario no es admitible";
            }else if(!validarCon($con)){
                echo "<br>La contraseña no es admitible";
            }else{
                $sql = "SELECT id_profesor, nombre FROM profesores1 WHERE usuario = '$usuario' AND contrasena = '$con'";
                $ejecuta = oci_parse($conn, $sql);
                oci_execute($ejecuta);
                if ($row = oci_fetch_array($ejecuta, OCI_ASSOC)) {
                    $_SESSION['usuario_id'] = $row['ID_PROFESOR'];
                    $_SESSION['usuario_nombre'] = $row['NOMBRE'];
                    $_SESSION['logueado'] = True;
                    oci_close($conn);
                    header('Location:Materias/materias.php');
                  } else {
                    echo 'Usuario o contraseña incorrectos';
                  }
            }
        }
    }
?>   

            </form>
          </div>
        </div>
      </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>