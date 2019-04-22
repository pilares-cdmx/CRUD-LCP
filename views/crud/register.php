<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Registro</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo constant('URL')?>public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="<?php echo constant('URL')?>public/css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Registrar una cuenta </div>
      <div class="card-header">Únicamente para LCP </div>
      <div class="card-body">
        <form action='<?php echo constant('URL');?>Crud/registrarLCP' method="POST">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-4">
                <div class="form-label-group">
                  <input type="text" id="firstName" class="form-control" placeholder="Nombre" name="nombreLCP" required="required" autofocus="autofocus">
                  <label for="firstName">Nombre</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-label-group">
                  <input type="text" id="lastName" class="form-control" placeholder="Apellido Paterno" name="paternoLCP"required="required">
                  <label for="lastName">Apellido Paterno</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-label-group">
                  <input type="text" id="lastName2" class="form-control" placeholder="Apellido Materno" name="maternoLCP"required="required">
                  <label for="lastName2">Apellido Materno</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" id="inputEmail" class="form-control" placeholder="Correo Electrónico" name="correo"required="required">
              <label for="inputEmail">Correo Electrónico</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password" id="inputPassword" class="form-control" placeholder="Contraseña" name="contrasena" required="required">
                  <label for="inputPassword">Contraseña</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password" id="confirmPassword" class="form-control" placeholder="Confirmar Contraseña" name="confirmContrasena"required="required">
                  <label for="confirmPassword">Confirmar Contraseña</label>
                </div>
              </div>
            </div>
          </div>
          <!--
          <a class="btn btn-primary btn-block" href="<?php echo constant('URL')?>Crud/registrarLCP" name="registrarLCP">Registrar</a>
           -->
          	<button type="submit" class="btn btn-primary btn-block" name="registrarLCP">Registrar</button>

        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="<?php echo constant('URL')?>Crud/index">Página de Acceso</a>
          <a class="d-block small" href="<?php echo constant('URL')?>Crud/forgotPassword">¿Olvidaste tu contraseña?</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo constant('URL')?>public/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo constant('URL')?>public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo constant('URL')?>public/vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
