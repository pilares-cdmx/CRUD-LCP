<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>PILARES acceso</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo constant('URL') ?>public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="<?php echo constant('URL') ?>public/css/sb-admin.css" rel="stylesheet">

</head>

<body class="miBg h-100">

  <nav class="navbar navbar-expand-sm  bg-cdmx h-100">

    <img class="navbar-brand img-fluid float-left" src="<?php echo constant('URL') ?>public/img/png-cdmx_1.png" alt="CDMX">
    <!-- <img class=" img-fluid float-right" src="../../../assets/img/pilares-png.png" alt="Logo oficial PILARES"> -->
    <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"> -->
    <!-- <span class="navbar-toggler-icon"></span> -->
    <!-- </button> -->
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="">
          <a class="nav-link img-fluid" routerLinkActive="active">
            <img src="<?php echo constant('URL') ?>public/img/eslogan-png.png" alt="ciudad inovadora y de derechos"></a>
        </li>
        <!-- <li class="nav-item">
              <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li> -->
      </ul>
    </div>

  </nav>
  <div class="">
    <img class="img-fluid" src="<?php echo constant('URL') ?>public/img/cenefa_1.png">
  </div>




  <div class="container h-100">
    <div class="card card-login mx-auto m-5">
      <div class="card-header">Acceso</div>
      <?php if (isset($_SESSION['error_login'])) : $mensajeError = $_SESSION['error_login'] ?>
        <!-- <div class="card-header"><?= $mensajeError ?></div> -->
      <?php endif; ?>
      <?php if (isset($_SESSION['registroLCPExitoso'])) : $mensaje = $_SESSION['registroLCPExitoso'] ?>
        <div class="card-header"><?= $mensaje ?></div>
      <?php endif; ?>
      <?php session_unset(); ?>
      <div class="card-body">
        <form action='<?php echo constant('URL'); ?>Crud/login' method="POST">
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" id="inputEmail" name="correoLCP" class="form-control" placeholder="Correo Electrónico" required="required" autofocus="autofocus">
              <label for="inputEmail">Correo</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="inputPassword" name="contrasenaLCP" class="form-control" placeholder="Contraseña" required="required">
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
          <!--
          <a class="btn btn-primary btn-block" href="<?php echo constant('URL') ?>Crud/ingresoExitoso" name="acceso">Acceso</a>
          -->

          <button type="submit" class="btn btn-primary btn-block" name="acceso">Acceso</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="<?php echo constant('URL') ?>Crud/register">Registrar una cuenta</a>
          <a class="d-block small" href="<?php echo constant('URL') ?>Crud/forgotPassword">¿Olvidaste tu contraseña?</a>
        </div>
      </div>

    </div>
  </div>
  <p style="height: 19em;"></p>





  <nav class="navbar navbar-expand-sm navbar-light bg-cdmx ">

    <img class="navbar-brand img-fluid " src="<?php echo constant('URL') ?>public/img/png-cdmx_2.png" alt="">
    <!-- <img class="navbar-brand" src="../../../assets/img/sectei-png.png" alt=""> -->
    <img class="navbar-brand miBarra" src="<?php echo constant('URL') ?>public/img/cgiei_png.png" alt="">

    <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      
    </button> -->


  </nav>
  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo constant('URL') ?>public/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo constant('URL') ?>public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo constant('URL') ?>public/vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>