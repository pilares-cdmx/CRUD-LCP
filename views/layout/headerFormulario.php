<!DOCTYPE html>
<html lang="es">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php echo constant('URL')?>public/css/estilosFormularios.css">
  <title>Formulario de registro</title>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="<?php echo constant('URL')?>public/css/jquery-ui.css" />
	<link rel="stylesheet" href="<?php echo constant('URL')?>public/css/estiloFormulario.css" />
  <script src="<?php echo constant('URL')?>public/js/jquery-1.8.2.js"></script>
  <script src="<?php echo constant('URL')?>public/js/jquery-ui.js"></script>
	<script language="JavaScript"> 
    if(window.screen.availWidth == 1920)window.parent.document.body.style.zoom="140%"
    if(window.screen.availWidth == 1280)window.parent.document.body.style.zoom="120%" 
    if(window.screen.availWidth == 1152)window.parent.document.body.style.zoom="108%" 
    if(window.screen.availWidth == 1024)window.parent.document.body.style.zoom="96%" 
    if(window.screen.availWidth == 800)window.parent.document.body.style.zoom="75%"; 
    if(window.screen.availWidth == 640)window.parent.document.body.style.zoom="60%" 
  </script>
  <script>
    function showColoniasPorAlcaldia(str) {
        if (str == "") {
            document.getElementById("txtHint").innerHTML = "";
            return;
        } else {
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("txtHint").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET","getColoniasPorAlcaldia.php?q="+str,true);
            xmlhttp.send();
        }
    }
  </script>

  
</head>