<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>PILARES acceso</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo constant('URL')?>public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="<?php echo constant('URL')?>public/css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Acceso</div>
      <div class="card-body">
        <form>
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" id="inputEmail" class="form-control" placeholder="Correo Electrónico" required="required" autofocus="autofocus">
              <label for="inputEmail">Correo</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="inputPassword" class="form-control" placeholder="Contraseña" required="required">
              <label for="inputPassword">Contraseña</label>
            </div>
          </div>
          <div class="form-group">
            <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me">
                Recordar Contraseña
              </label>
            </div>
          </div>
          <a class="btn btn-primary btn-block" href="<?php echo constant('URL')?>Crud/registroExitoso" name="acceso">Acceso</a>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="<?php echo constant('URL')?>Crud/register">Registrar una cuenta</a>
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
