<?php
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);
    if (isset($_SESSION['nombreUsuarioNuevo'])) {
        $nombre = $_SESSION['nombreUsuarioNuevo'];
        $folio = $_SESSION['folioUsuarioNuevo'];
        $nombrePilar = $_SESSION['pilarUsuarioNuevo'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="<?php echo constant('URL')?>public/bootstrap/css/bootstrap.css">
    <title>Document</title>
</head>
<body>
 <br>
    <div class="container">
        <div class="jumbotron mt-5">
            <div class="mx-auto text-center">
                <h1 class="display-4 mx">Bienvenido a tu PILARES "<?=$nombrePilar?>"</h1>
            </div>

            <p class="lead">Hola <span class="text-uppercase"><?=$nombre?></span></p>
            <hr class="my-4">
            <p>Anota tu número de registro <strong><?=$folio?></strong>, es un número personal que te servirá más adelante.</p>
            <div class="text-center">
                <a class="btn btn-primary btn-lg center" href="<?php echo constant('URL')?>" role="button">Terminar </a>
            </div>

        </div>

    </div>
    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="<?php echo constant('URL')?>public/js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="<?php echo constant('URL')?>public/js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="<?php echo constant('URL')?>public/js/bootstrap.min.js"></script>
</body>
</html>
