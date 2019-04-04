<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>PILARES</title>
      <link rel="stylesheet" href="<?php echo constant('URL');?>public/css/loginStyle.css">
</head>

<body>

  <div class="wrapper">
      <div class="hero-area">
        <div id="cenefa">
          <img id="pie" src="<?php echo constant('URL');?>public/img/blog-img/cenefa4.png">
        </div>
	<div class="container">
		<h1>Ingresa Usuario y Contraseña</h1>

		<form action='<?php echo constant('URL');?>Usuario/validar' method="POST">
			<input placeholder="Usuario" name='txtusuario'>
			<input type="password" placeholder="Contraseña" name='txtpass'>
			<button type="submit" name="login">Ingresar</button>
		</form>

	</div>

	<ul class="bg-bubbles">
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
        <li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>

	</ul>
</div>
  	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="<?php echo constant('URL');?>js/loginVerde.js"></script>
</body>
</html>
