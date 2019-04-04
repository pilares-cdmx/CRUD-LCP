<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- Title  -->
    <title>PILARES</title>
    <!-- Favicon  -->
    <link rel="icon" href="<?php echo constant('URL')?>public/img/core-img/favicon.ico">
  <!--  <link rel='stylesheet' href='http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.2.0/css/bootstrap.css'>
  -->
    <link rel="stylesheet" href="<?php echo constant('URL')?>public/css/normalize.css">
    <link rel="stylesheet" href="<?php echo constant('URL')?>public/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo constant('URL')?>public/css/bootstrap.min.css">
    <!--Material Design for Bootsrap -->
    <link rel="stylesheet" href="<?php echo constant('URL')?>public/css/mdb.min.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="<?php echo constant('URL')?>public/css/mpg.css">
    <link rel="stylesheet" href="<?php echo constant('URL')?>public/css/scroll-style.css">
    <link rel="stylesheet" href="<?php echo constant('URL')?>public/css/estilos.css">
    <link rel="stylesheet" href="<?php echo constant('URL')?>public/css/style.css">
</head>
<body>
    <!-- Preloader Start -->
    <div id="preloader">
        <div class="preload-content">
            <div id="world-load"></div>
        </div>
    </div>
    <!-- ***** Header Area Start ***** -->
    <header class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg">
                        <!-- Logo -->
                        <a class="navbar-brand" href="<?php echo constant('URL')?>principal/index.php"><img src="<?php echo constant('URL')?>public/img/core-img/Pilares_logo.svg" alt="Logo"></a>
                        <!-- Navbar Toggler -->
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#worldNav" aria-controls="worldNav" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <!-- Navbar -->
                        <div class="collapse navbar-collapse" id="worldNav">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo constant('URL')?>views/main/convocatorias.php">Convocatorias</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo constant('URL')?>views/main/ubicapilares.php">Ubica tu PILARES</a>
                                </li>
                                <li class="nav-item">
                                    <a id="btn-abrir-popup" class="nav-link btn-abrir-popup">Registro Usuarios</a>
                                </li>
                                <li class="nav-item">
                                    <a  class="nav-link" href="<?php echo constant('URL')?>views/main/administracion.php">Administración <span class="sr-only">(current)</span></a>
                                </li>
                            </ul>
                            <ul class="navbar-nav nav-flex-icons">
                              <li class="nav-item">
                                <a class="nav-link" href="https://www.facebook.com/Pilares-CDMX-325332928095841/" target="_blank"><i class="fa fa-facebook"></i></a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="https://twitter.com/CdmxPilares?s=08" target="_blank"><i class="fa fa-twitter"></i></a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="https://www.instagram.com/pilarescdmx/?utm_source=ig_profile_share&igshid=u462xj96zovt" target="_blank"><i class="fa fa-instagram"></i></a>
                              </li>
                            </ul>
                              <!--Vantana emergente de Registro Usuarios-->
                              <div class="contenedor">
                                <div class="overlay" id="overlay">
                                  <div class="popup" id="popup">
                                    <a href="index.html" id="btn-cerrar-popup" class="btn-cerrar-popup"><i class="fa fa-times"></i></a>
                                    <h4 class="text-white">Ingresa usuario y contraseña </h4>
                                      <form action='<?php echo constant('URL')?>control/validar' method="post">
                                        <input placeholder="Usuario" name='txtusuario'>
                                        <input type="password" placeholder="Contraseña" name='txtpass'>
                                        <button type="submit" name="login">Ingresar</button>
                                      </form>
                                   </div>
                                  </div>
                                </div>
                            <!--Search Form  --- elemneto visual para la busqueda de palabras o contenido
                            <div id="search-wrapper">
                                <form action="#">
                                    <input type="text" id="search" placeholder="Search something...">
                                    <div id="close-icon"></div>
                                    <input class="d-none" type="submit" value="">
                                </form>
                             -->
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <body>
    <!-- ***** Header Area End ***** -->
    