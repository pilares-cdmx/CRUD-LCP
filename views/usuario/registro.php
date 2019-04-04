<?php
 ini_set('display_startup_errors', 1);
 ini_set('display_errors', 1);
 error_reporting(-1);
 //require 'views/layout/headerFormulario.php';
 /*
 require_once 'libs/dbcontroller.php';
 $db_handle =  new DBController;
 $query = "SELECT * FROM Alcaldias";
 $results = $db_handle->runQuery($query);
*/
 ?>
 <!DOCTYPE html>
<html lang="es">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="<?php echo constant('URL')?>public/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="<?php echo constant('URL')?>public/css/estilosFormularios.css">
  <title>Formulario de registro</title>
  <link rel="stylesheet" href="<?php echo constant('URL')?>public/css/jquery-ui.css" />
	<link rel="stylesheet" href="<?php echo constant('URL')?>public/css/estiloFormulario.css" />

	<script language="JavaScript">
    if(window.screen.availWidth == 1920)window.parent.document.body.style.zoom="140%"
    if(window.screen.availWidth == 1280)window.parent.document.body.style.zoom="120%"
    if(window.screen.availWidth == 1152)window.parent.document.body.style.zoom="108%"
    if(window.screen.availWidth == 1024)window.parent.document.body.style.zoom="96%"
    if(window.screen.availWidth == 800)window.parent.document.body.style.zoom="75%";
    if(window.screen.availWidth == 640)window.parent.document.body.style.zoom="60%"
  </script>
  <script language="JavaScript">
      function showColoniasPorAlcaldia(str) {
          if (str == "") {
              document.getElementById("colonia").innerHTML = "";
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
                      document.getElementById("colonia").innerHTML = this.responseText;
                  }
              };

              xmlhttp.open("GET", "<?=URL?>getColoniasPorAlcaldia.php?q="+str,true);
              xmlhttp.send();
          }
      }
  </script>
  <script language="JavaScript">
      function showCPporColonia(str) {
          if (str == "") {
              document.getElementById("codigoPostal").innerHTML = "";
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
                      document.getElementById("codigoPostal").innerHTML = this.responseText;
                  }
              };

              xmlhttp.open("GET", "<?=URL?>getCPporColonia.php?q="+str,true);
              xmlhttp.send();
          }
      }
  </script>
  <script language="JavaScript">
      function showPilarPorAlcaldia(str) {
          if (str == "") {
              document.getElementById("pilarSelect_id").innerHTML = "";
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
                      document.getElementById("pilarSelect_id").innerHTML = this.responseText;
                  }
              };
              xmlhttp.open("GET", "<?=URL?>getPilarPorAlcaldia.php?q="+str,true);
              xmlhttp.send();
          }
      }
  </script>
  <script type="text/javascript">
    function validaEspacios(str) {
      var curpInput = document.getElementById("curp").value;  //tomamos en una variable lo ingresado en el login nombre
      var digitos = 18;
      var noValido = /\s/;
        if(noValido.test(curpInput)){ // se chequea el regex de que el string no tenga espacio
          alert ("El CURP no puede contener espacios en blanco, es una clave de 18 dígitos");
          //return false;
        }else if (curpInput.length != digitos) {
          alert ("El CURP es una clave de 18 dígitos");
        }
    }
  </script>
</head>
<body>
  <img src="<?php echo constant('URL')?>public/img/blog-img/cenefa4.png" <br>
  <br>
  <div class="container">
    <div class="row">
      <div class="col">
          <h1><center>FORMULARIO DE REGISTRO</center></h1>
      </div>
    </div>
  </div><br>
  <form action="<?=URL?>Usuario/save" name="formularioRegistro" method="POST">

    <div class="container">
      <fieldset>
        <legend>DATOS PERSONALES</legend>
        <div class="row">
          <div class="col-lg-12 col-md-12 estilo-forma">
            <label for="nombre">Nombre(s)</label><br>
            <input id="nombre" type="text" class="validate text-uppercase" name="nombre"  size="40" required>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12 col-md-12 estilo-forma">
            <label for="ap_pat">Apellido paterno</label><br>
            <input id="ap_pat" type="text" class="validate text-uppercase" name="apellidoPat"  size="40" required>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12 col-md-12 estilo-forma">
            <label for="ap_mat">Apellido materno</label><br>
            <input id="ap_mat" type="text" class="validate text-uppercase" name="apellidoMat"  size="40" required>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12 col-md-12 estilo-forma">
            <label for="curp" class="active ">CURP</label><br>
            <input maxlength="18" minlength="18" id="curp" name="curp" type="text" class="validate text-uppercase" oninput="validarInput(this)" onchange="validaEspacios(this.value)"  style="text-transform:uppercase;" maxlength="18" size="40" required>
            <small class="form-text text-muted" tabindex="0">Consulta tu CURP <a href="https://www.gob.mx/curp/" target="popup" onclick="window.open(this.href, this.target, 'width=900px,height=800px'); return false;">aquí</a> </small>
            <div id="curp-error" name="curp-error"></div>
            <pre id="resultado"></pre>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12 col-md-12 estilo-forma">
            <label>Grupo étnico</label><br>
            <select name="gruPoet">
              <option value="0" disabled selected>Selecciona</option>
              <option value="Náhuatl">Náhuatl</option>
              <option value="Mixteco">Mixteco</option>
              <option value="Otomí">Otomí</option>
              <option value="Mazateco">Mazateco</option>
              <option value="Zapoteco">Zapoteco</option>
              <option value="Mazahua">Mazahua</option>
              <option value="Totonaca">Totonaca</option>
              <option value="Mixe">Mixe</option>
              <option value="Chinanteco">Chinanteco</option>
              <option value="Tlapaneco">Tlapaneco</option>
              <option value="Maya">Maya</option>
              <option value="Purépecha">Purépecha (Tarasco)</option>
              <option value="Tzeltal">Tzeltal</option>
              <option value="Triqui">Triqui</option>
              <option value="Huasteco">Huasteco</option>
              <option value="Tzotzil">Tzotzil</option>
              <option value="CDMX">Pueblo Originario (CDMX)</option>
              <option value="Ninguno">Ninguno</option>
              <option value="Otro">Otro</option>
            </select>
          </div>
        </div>
      </fieldset>
    </div>

    <div class="container">
      <fieldset>
        <legend>DATOS DE CONTACTO</legend>


        <div class="row">
          <div class="col-lg-12 estilo-forma">

            <label for="nombre">Alcaldia </label><br>
            <!--id "alcaldia" corresponde a Alcaldias-->
            <select name="alcaldia"  onchange="showColoniasPorAlcaldia(this.value)" required>
              <option value="0" disabled selected>Selecciona</option>
              <option value="1">Álvaro Obregón</option>
              <option value="2">Azcapotzalco</option>
              <option value="3">Benito Juárez</option>
              <option value="4">Coyoacán</option>
              <option value="5">Cuajimalpa de Morelos </option>
              <option value="6">Cuauhtémoc</option>
              <option value="7">Gustavo A. Madero</option>
              <option value="8">Iztacalco</option>
              <option value="9">Iztapalapa</option>
              <option value="10">Magdalena Contreras</option>
              <option value="11">Miguel Hidalgo</option>
              <option value="12">Milpa Alta</option>
              <option value="13">Tláhuac</option>
              <option value="14">Tlalpan</option>
              <option value="15">Venustiano Carranza</option>
              <option value="16">Xochimilco</option>

            </select>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12 estilo-forma">

            <label for="nombre">Colonia </label><br>
              <!--id "estados" corresponde a Colonia   -->
            <select name="colonia" id="colonia" onchange="showCPporColonia(this.value)" required>
              <option value="0" disabled selected>Selecciona</option>

            </select>

          </div>
        </div>

        <div class="row">
          <div class="col-lg-12 estilo-forma">
            <label for="nombre">Código postal </label><br>
            <!--id "municipio" corresponde a Codigo postal    -->
            <select name="codigoPostal" id="codigoPostal" required>
              <option value="0" disabled selected>Selecciona</option>

            </select>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12  estilo-forma">
            <label for="nombre">Calle y número</label><br>
            <input id="nombre" type="text" class="validate" name="calleNumero" style="text-transform:uppercase;" size="40" required>
          </div>
        </div>


        <div class="row">
          <div class="col-lg-12  estilo-forma">
            <label for="numrec">Tiempo de residencia en CDMX</label><br>
            <input onkeypress="return justNumbers(event);" maxlength="2" id="timepoResidencia" type="text" class="validate" name="timepoResidencia" size="40">
            <small id="residenciaHelp" class="form-text text-muted">Tiempo en años</small>
          </div>
        </div>


        <div class="row">
          <div class="col-lg-12 col-md-12 estilo-forma">
            <label for="telCasa" <input type="number">Teléfono de casa</label><br>
            <input onkeypress="return justNumbers(event);" maxlength="12" id="telCasa" type="text" class="validate" name="telCasa" size="40" >
          </div>
        </div>

<!--onkeypress="return justNumbers(event);"-->
        <div class="row">
          <div class="col-lg-12 col-md-12 estilo-forma">
            <label for="telMovil" <input type="number">Teléfono celular</label><br>
            <input  maxlength="12" id="telMovil" type="text" name="telMovil" class="validate" size="40">
          </div>
        </div>

<div class="row">
        <div class="col-lg-12 col-md-12 estilo-forma">
          <label for="correo">Correo</label><br>
          <input type="email" class="validate" name="email" id="correo" aria-describedby="emailHelp" size="40" required>
          <small id="emailHelp" class="form-text text-muted"></small>
        </div>
      </fieldset>
    </div>

    <div class="container">
      <fieldset>
        <legend>DATOS ESCOLARES</legend>
        <div class="row">
          <div class="col-lg-12 col-md-12">
            <label>¿Estudias actualmente?</label>
            <div class="radio">
              <!--Se modifico el name de los radio buttons. ahora tienen
                el mismo nombre para darles la propiedad "group"-->
              <input name="estudias" type="radio" id="4" value="si">
              <label for="4" class="rc_sty">Si</label>
              <input name="estudias" type="radio" id="5" value="no">
              <label for="5" class="rc_sty">No</label>
            </div>
          </div>
        </div>



        <div class="row">
          <div class="col-lg-12 col-md-12 estilo-forma">
            <label>Último grado de estudios</label><br>
            <select name="grado" >
              <option value="0" disabled selected>Selecciona</option>
              <option value="1">Preprimaria</option>
              <option value="2">1º de primaria</option>
              <option value="3">2º de primaria</option>
              <option value="4">3º de primaria</option>
              <option value="5">4º de primaria</option>
              <option value="6">5º de primaria</option>
              <option value="7">6º de primaria</option>
              <option value="8">1º de secundaria</option>
              <option value="9">2º de secundaria</option>
              <option value="10">3º de secundaria</option>
              <option value="11">1er. semestre de bachillerato</option>
              <option value="12">2do. semestre de bachillerato</option>
              <option value="13">3er. semestre de bachillerato</option>
              <option value="14">4to. semestre de bachillerato</option>
              <option value="15">5to. semestre de bachillerato</option>
              <option value="16">6to. semestre de bachillerato</option>
              <option value="17">Licenciatura trunca</option>
              <option value="18">Licenciatura sin título</option>
              <option value="19">Licenciatura con título</option>
              <option value="20">Posgrado</option>
            </select>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12 col-md-12 estilo-forma">
            <label>Ocupación actual</label><br>

            <select name="ocupacionAct" class="selectOcupacion" required>
              <option value="0" disabled selected>Selecciona</option>
              <option value="1">Estudiantes</option>
              <option value="2">Profesionistas</option>
              <option value="3">Técnicos</option>
              <option value="4">Trabajadores de la educación</option>
              <option value="5">Trabajadores del arte, espectáculos y deportes</option>
              <option value="6">Funcionarios y directivos de los sectores públicos, privado y social </option>
              <option value="7">Trabajadores en actividades agrícolas, ganaderas, silvícolas y de caza y pezca</option>
              <option value="8">Jefes, supervisores y otros trabajadores de control en la fabricación artesanal e industrial y en actividades de reparación y mantenimiento</option>
              <option value="9">Artesanos y trabajadores fabriles en la industria de la transformación y trabajadores en actividades de reparación y mantenimiento</option>
              <option value="10">Operadores de maquinaria fija de movimiento continuo y equipos en el proceso de fabricación industrial</option>
              <option value="11">Ayudantes, peones y similares en el proceso de fabricación artesanal e industrial y en actividades de reparación y mantenimiento</option>
              <option value="12">Conductores y ayudantes de conductores de maquinaria móvil y medios de transporte</option>
              <option value="13">Jefes de departamento, coordinadores y supervisires en actividades administrativas y de servicios</option>
              <option value="14">Trabajadores de apoyo en actividades administrativas</option>
              <option value="15">Comerciantes, empleados de comercio y agentes de ventas</option>
              <option value="16">Vendedores ambulantes y trabajadores ambulantes de servicios</option>
              <option value="17">Trabajadores en servicios personales</option>
              <option value="18">Trabajores en servicios domésticos</option>
              <option value="19">Trabajadores en servicios de protección y vigilancia y fuerzas armadas</option>
              <option value="20">Otros trabajadores con ocupaciones no especificadas</option>
            </select>
          </div>
        </div>
      </fieldset>
    </div>

    <div class="container">
      <fieldset>
        <legend>SERVICIOS</legend>


        <div class="row">
          <div class="col-lg-12 estilo-forma">
              <label class="h3"><h3>Cultura</h3></label>
              <div class="row">
                <div class="col-lg-4">
                  <label>Artes escénicas</label>
                  <div class="checkbox">
                    <input type="checkbox" value="2" name="check[]" id="cul1" />
                    <label for="cul1" class="rc_sty"value="2" name="check[]" >Danza</label><br>
                    <input type="checkbox" value="67" name="check[]" id="cul2" />
                    <label for="cul2" class="rc_sty" value="67" name="check[]">Baile Social</label><br>
                    <input type="checkbox" value="68" name="check[]"  id="cul3" />
                    <label for="cul3" class="rc_sty" value="68" name="check[]">Danza para niños</label><br>
                    <input type="checkbox" value="69" name="check[]" id="cul4" />
                    <label for="cul4" class="rc_sty" value="69" name="check[]">Danza para adultos</label><br>
                    <input type="checkbox" value="70" name="check[]" id="cul5" />
                    <label for="cul5" class="rc_sty" value="70" name="check[]">Danza folklórica</label> <br>
                    <input type="checkbox" value="3" name="check[]" id="cul6" />
                    <label for="cul6" class="rc_sty" value="3" name="check[]">Ballet</label><br>
                    <input type="checkbox" value="71" name="check[]" id="cul7" />
                    <label for="cul7" class="rc_sty" value="71" name="check[]">Actuación</label><br>
                    <input type="checkbox" value="72" name="check[]" id="cul8" />
                    <label for="cul8" class="rc_sty" value="72" name="check[]">Teatro de calle</label><br>
                    <input type="checkbox" value="73" name="check[]" id="cul9" />
                    <label for="cul9" class="rc_sty" value="73" name="check[]">Danza contemporánea</label><br>
                    <input type="checkbox" value="74" name="check[]" id="cul10" />
                    <label for="cul10" class="rc_sty" value="74" name="check[]">Danza polinesia</label> <br>
                    <input type="checkbox" value="75" name="check[]" id="cul11" />
                    <label for="cul11" class="rc_sty" value="75" name="check[]">Teatro de máscaras</label><br>
                    <input type="checkbox" value="76" name="check[]" id="cul12" />
                    <label for="cul12" class="rc_sty" value="76" name="check[]">Expresión corporal y teatro</label> <br>
                  </div>
                </div>
                <div class="col-lg-4">
                  <label>Oficios</label>
                  <div class="checkbox">
                    <input type="checkbox" value="77" name="check[]" id="cul13" />
                    <label for="cul13" class="rc_sty" value="77" name="check[]">Telar de cintura</label><br>
                    <input type="checkbox" value="78" name="check[]" id="cul14" />
                    <label for="cul14" class="rc_sty" value="78" name="check[]">Cartonería</label><br>
                    <input type="checkbox" value="79" name="check[]" id="cul15" />
                    <label for="cul15" class="rc_sty" value="79" name="check[]">Bordado para la vida</label><br>
                    <input type="checkbox" value="6" name="check[]" id="cul16" />
                    <label for="cul16" class="rc_sty" value="6" name="check[]">Encuadernación</label><br>
                    <input type="checkbox" value="80" name="check[]" id="cul17" />
                    <label for="cul17" class="rc_sty" value="80" name="check[]">Construcción artesanal de instrumentos</label>
                    <input type="checkbox" value="81" name="check[]" id="cul18" />
                    <label for="cul18" class="rc_sty" value="81" name="check[]">Diseño de juguetes de madera y materiales de reuso</label>
                    <br>
                  </div>
                  <label>Artes sustentables</label>
                  <div class="checkbox">
                    <input type="checkbox" value="82" name="check[]" id="cul19" />
                    <label for="cul19" class="rc_sty" value="82" name="check[]">Reciclaje y medio ambiente</label><br>
                  </div>
                  <label>Literatura</label>
                  <div class="checkbox">
                    <input type="checkbox" value="83" name="check[]" id="cul20" />
                    <label for="cul20" class="rc_sty" value="83" name="check[]">Escritura creativa</label><br>
                  </div>
                  <label>Artes plásticas</label>
                  <div class="checkbox">
                    <input type="checkbox" value="84" name="check[]" id="cul21" />
                    <label for="cul21" class="rc_sty" value="84" name="check[]">Pintura artística</label><br>
                  </div>
                </div>
                <div class="col-lg-4">
                  <label>Artes Visuales</label>
                  <div class="checkbox">
                    <input type="checkbox" value="85" name="check[]" id="cul22" />
                    <label for="cul22" class="rc_sty" value="85" name="check[]">Medios Audiovisuales</label><br>
                    <input type="checkbox" value="86" name="check[]" id="cul23" />
                    <label for="cul23" class="rc_sty" value="86" name="check[]">Cine</label><br>
                    <input type="checkbox" value="9" name="check[]" id="cul24" />
                    <label for="cul24" class="rc_sty" value="9" name="check[]">Fotografía</label><br>
                    <input type="checkbox" value="87" name="check[]" id="cul25" />
                    <label for="cul25" class="rc_sty" value="87" name="check[]">Animación para niños</label><br>
                    <input type="checkbox" value="88" name="check[]" id="cul26" />
                    <label for="cul26" class="rc_sty" value="88" name="check[]">Vídeo comunitario</label> <br>
                  </div>
                  <label>Música</label>
                  <div class="checkbox">
                    <input type="checkbox" value="89" name="check[]" id="cul27" />
                    <label for="cul27" class="rc_sty" value="89" name="check[]">Guitarra clásica</label><br>
                    <input type="checkbox" value="90" name="check[]" id="cul28" />
                    <label for="cul28" class="rc_sty" value="90" name="check[]">Música Rap</label><br>
                    <input type="checkbox" value="91" name="check[]" id="cul29" />
                    <label for="cul29" class="rc_sty" value="91" name="check[]">Percusiones</label><br>
                    <input type="checkbox" value="92" name="check[]" id="cul30" />
                    <label for="cul30" class="rc_sty" value="92" name="check[]">Iniciación a la música</label><br>
                    <input type="checkbox" value="93" name="check[]" id="cul31" />
                    <label for="cul31" class="rc_sty" value="93" name="check[]">Son Huasteco</label> <br>
                  </div>
                </div>
              </div>

          </div>
        </div>

        <div class="row">
          <div class="col-lg-12 estilo-forma">
            <label class="h3">Deporte</label><br>
              <div class="row">
                <div class="col-lg-4">
                  <label>Escuela técnico deportivas de:</label>
                  <div class="checkbox">
                    <input type="checkbox" value="17" name="check[]" id="dep1" />
                    <label for="dep1" class="rc_sty" value="17" name="check[]">Fútbol</label><br>
                    <input type="checkbox" value="18" name="check[]" id="dep2" />
                    <label for="dep2" class="rc_sty" value="18" name="check[]">Basquetbol</label><br>
                    <input type="checkbox" value="19" name="check[]" id="dep3" />
                    <label for="dep3" class="rc_sty" value="19" name="check[]">Voleibol</label><br>
                  </div>
                </div>
                <div class="col-lg-4">
                  <label>Activación Física</label>
                  <div class="checkbox">
                    <input type="checkbox" value="20" name="check[]" id="dep4" />
                    <label for="dep4" class="rc_sty" value="20" name="check[]">Acondicionamiento físico</label><br>
                    <input type="checkbox" value="94" name="check[]" id="dep5" />
                    <label for="dep5" class="rc_sty" value="94" name="check[]">Zumba</label><br>
                    <input type="checkbox" value="95" name="check[]" id="dep6" />
                    <label for="dep6" class="rc_sty" value="95" name="check[]">Tae bo</label><br>
                    <input type="checkbox" value="96" name="check[]" id="dep7" />
                    <label for="dep7" class="rc_sty" value="96" name="check[]">Yoga</label><br>
                    <input type="checkbox" value="97" name="check[]" id="dep8" />
                    <label for="dep8" class="rc_sty" value="97" name="check[]">Tai chi</label>
                    <br>
                  </div>
                </div>
                <div class="col-lg-4">
                  <label>Otras disciplinas</label>
                  <div class="checkbox">
                    <input type="checkbox" value="98" name="check[]" id="dep9" />
                    <label for="dep9" class="rc_sty" value="98" name="check[]">Boxeo</label><br>
                    <input type="checkbox" value="99" name="check[]" id="dep10" />
                    <label for="dep10" class="rc_sty" value="99" name="check[]">Atletismo</label><br>
                    <input type="checkbox" value="100" name="check[]" id="dep11" />
                    <label for="dep11" class="rc_sty" value="100" name="check[]">Karate do</label><br>
                    <input type="checkbox" value="101" name="check[]" id="dep12" />
                    <label for="dep12" class="rc_sty" value="101" name="check[]">Kung fu</label>

                  </div>
                </div>
              </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12 col-md-12 estilo-forma">
            <label class="h3">Ciberescuela</label><br><BR>
            <select name="opcionEdu">
              <option value="0" disabled selected>Opción</option>
              <option value="106">Alfabetización</option>
              <option value="107">Primaria</option>
              <option value="108">Secundaria</option>
              <option value="109">BADI</option>
              <option value="110">Prepa en línea SEP</option>
              <option value="111">CENEVAL</option>
              <option value="112">COLBACH</option>
              <option value="113">Prepa abierta</option>
              <option value="114">B@UNAM</option>
              <option value="115">UnADM</option>
              <option value="116">Licenciatura en linea</option>
              <option value="117">Licenciaturas CDMX</option>
              <option value="118">Asesorias primaria</option>
              <option value="119">Asesorias secundaria</option>
              <option value="120">Asesorias bachillerato</option>
              <option value="121">Asesorias licenciatura</option>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12 estilo-forma">
            <label>Talleres de habilidades cognitivas</label><br>
            <div class="checkbox">
              <div class="row">
                <div class="col-lg-4">
                  <input type="checkbox" value="21" name="check[]" id="cog1" />
                  <label for="cog1" class="rc_sty" value="21" name="check[]">Ajedrez</label>
                </div>
                <div class="col-lg-4">
                  <input type="checkbox" value="102" name="check[]" id="cog2" />
                  <label for="cog2" class="rc_sty" value="102" name="check[]">Redacción y comprensión de lectura</label>
                </div>
              </div>
            </div>
          </div>
        </div>

            <div class="row">
          <div class="col-lg-12 estilo-forma">
            <label>Talleres de habilidades digitales</label><br>
            <div class="checkbox">
              <div class="row">
                <div class="col-lg-4">
                  <input type="checkbox" value="24" name="check[]" id="dig1" />
                  <label for="dig1" class="rc_sty" value="24" name="check[]">Club de Ciencias</label><br>
                  <input type="checkbox" value="28" name="check[]" id="dig2" />
                  <label for="dig2" class="rc_sty" value="28" name="check[]">Club de Código</label><br>


                </div>
                <div class="col-lg-4">
                  <input type="checkbox" value="27" name="check[]" id="dig3" />
                  <label for="dig3" class="rc_sty" value="27" name="check[]">Edición y diseño</label>
                  <br>
                  <input type="checkbox" value="103" name="check[]" id="dig4" />
                  <label for="dig4" class="rc_sty" value="103" name="check[]">Talleres de cómputo</label> <br>

                </div>
                  <div class="col-lg-4">
                  <input type="checkbox" value="25" name="check[]" id="dig5" />
                  <label for="dig5" class="rc_sty" value="25" name="check[]">Robótica aplicada</label>

                </div>

                </div>


              </div>
            </div>
          </div>
        <div class="row">
          <div class="col-lg-12 estilo-forma">
            <label>Talleres de habilidades emocionales</label><br>
            <div class="checkbox">
              <div class="row">
                <div class="col-lg-4">
                  <input type="checkbox" value="29" name="check[]" id="emo1" />
                  <label for="emo1" class="rc_sty" value="29" name="check[]">Amor y sexualidad</label><br>
                  <input type="checkbox" value="30" name="check[]" id="emo2" />
                  <label for="emo2" class="rc_sty" value="30" name="check[]">Prevención de adicciones</label><br>
                  <input type="checkbox" value="31" name="check[]" id="emo3" />
                  <label for="emo3" class="rc_sty" value="31" name="check[]">Habilidades para la vida</label> <br>
                    <input type="checkbox" value="122" name="check[]" id="emo4" />
                  <label for="emo4" class="rc_sty" value="122" name="check[]">Baile, cuerpo y emociones</label>
                </div>
                <div class="col-lg-4">
                  <input type="checkbox" value="32" name="check[]" id="emo5" />
                  <label for="emo5" class="rc_sty" value="32" name="check[]">Proyecto de vida</label>
                  <br>
                  <input type="checkbox" value="33" name="check[]" id="emo6" />
                  <label for="emo6" class="rc_sty" value="33" name="check[]">Autoestima</label> <br>
                  <input type="checkbox" value="34" name="check[]" id="emo7" />
                  <label for="emo7" class="rc_sty" value="34" name="check[]">Tanatología o manejo del duelo</label>
                <input type="checkbox" value="104" name="check[]" id="emo8" />
                  <label for="emo8" class="rc_sty" value="104" name="check[]">Emociones mágicas</label>
                  <br>
                </div>
                  <div class="col-lg-4">
                  <input type="checkbox" value="35" name="check[]" id="emo9" />
                  <label for="emo9" class="rc_sty" value="35" name="check[]">Inteligencia emocional</label>
                  <br>
                  <input type="checkbox" value="36" name="check[]" id="emo10" />
                  <label for="emo10" class="rc_sty" value="36" name="check[]">Arte y Emociones</label> <br>
                  <input type="checkbox" value="105" name="check[]" id="emo11" />
                  <label for="emo11" class="rc_sty" value="105" name="check[]">Pintando emociones</label>
                  <br>
                </div>

                </div>

                <br>
              </div>
            </div>
          </div>

        <div class="row">
          <div class="col-lg-12 col-md-12 estilo-forma">
            <label class="h3">Talleres de autonomía económica</label><br>
            <div class="checkbox">
              <div class="row">
                <div class="col-lg-4">
                  <input type="checkbox" value="37" name="check[]" id="econo1" />
                  <label for="econo1" class="rc_sty" value="37" name="check[]">Carpintería</label> <br>

                  <input type="checkbox" value="38" name="check[]" id="econo2" />
                  <label for="econo2" class="rc_sty" value="38" name="check[]">Plomería</label><br>

                  <input type="checkbox" value="39" name="check[]" id="econo3" />
                  <label for="econo3" class="rc_sty" value="39" name="check[]">Herrería y Aluminero</label> <br>

                  <input type="checkbox" value="40" name="check[]" id="econo4" />
                  <label for="econo4" class="rc_sty" value="40" name="check[]">Electricidad y dispositivos fotovoltaicos</label> <br>


                  <input type="checkbox" value="43" name="check[]" id="econo7" />
                  <label for="econo7" class="rc_sty" value="43" name="check[]">Joyería y accesorios</label> <br>

                  <input type="checkbox" value="44" name="check[]" id="econo8" />
                  <label for="econo8" class="rc_sty" value="44" name="check[]">Agricultura urbana</label> <br>

                </div>
                <div class="col-lg-4">
                  <input type="checkbox" value="47" name="check[]" id="econo11" />
                  <label for="econo11" class="rc_sty" value="47" name="check[]">Diseño de imagen y Cosmetología orgánica</label>
                  <br>

                  <input type="checkbox" value="48" name="check[]" id="econo12" />
                  <label for="econo12" class="rc_sty" value="48" name="check[]">Código para mujeres</label>
                  <br>

                  <input type="checkbox" value="49" name="check[]" id="econo13" />
                  <label for="econo13" class="rc_sty" value="49" name="check[]">Electrónica y robótica</label>
                  <br>


                  <input type="checkbox" value="52" name="check[]" id="econo16" />
                  <label for="econo16" class="rc_sty" value="52" name="check[]">Textiles y diseño de modas</label>
                  <br>

                  <input type="checkbox" value="54" name="check[]" id="econo18" />
                  <label for="econo18" class="rc_sty" value="54" name="check[]">Fotografia de producto</label>
                  <br>

                  <input type="checkbox" value="55" name="check[]" id="econo19" />
                  <label for="econo19" class="rc_sty" value="55" name="check[]">Logos e identidad de marca</label>
                  <br>

                  <input type="checkbox" value="56" name="check[]" id="econo20" />
                  <label for="econo20" class="rc_sty" value="56" name="check[]">Calidad en el servicio</label>
                </div>

                <div class="col-lg-4">
                  <input type="checkbox" value="57" name="check[]" id="econo21" />
                  <label for="econo21" class="rc_sty" value="57" name="check[]">Creación de cooperativas</label>
                  <br>

                  <input type="checkbox" value="58" name="check[]" id="econo22" />
                  <label for="econo22" class="rc_sty" value="58" name="check[]">Emprendedurismo</label>
                  <br>

                  <input type="checkbox" value="59" name="check[]" id="econo23" />
                  <label for="econo23" class="rc_sty" value="59" name="check[]">Creación de micro-negocios</label>
                  <br>

                  <input type="checkbox" value="60" name="check[]" id="econo24" />
                  <label for="econo24" class="rc_sty" value="60" name="check[]">Comercio digital</label>
                  <br>

                  <input type="checkbox"  value="61" name="check[]" id="econo25" />
                  <label for="econo25" class="rc_sty" value="61" name="check[]">Estrategias de venta</label>
                  <br>

                  <input type="checkbox" value="62" name="check[]" id="econo26" />
                  <label for="econo26" class="rc_sty" value="62" name="check[]">Comercio justo</label>
                  <br>

                  <input type="checkbox" value="65" name="check[]" id="econo29" />
                  <label for="econo29" class="rc_sty" value="65" name="check[]">Distribución</label>
                  <br>
                </div>


              </div>
            </div>
          </div>
        </div>
     </fieldset>


      <fieldset>
        <legend>PILARES</legend>
        <div class="row">
          <div class="col-md-6">
          <!--                            -->
            <div class="form-group">
              <label for="name1">Alcaldia</label>
              <select id="alcaldia_id" class="form-control" name="alcaldia_id" onchange="showPilarPorAlcaldia(this.value)"  required>
                <option value="">Selecciona</option>
                <option value="0" disabled selected>Selecciona</option>
                <option value="1">Álvaro Obregón</option>
                <option value="2">Azcapotzalco</option>
                <option value="3">Benito Juárez</option>
                <option value="4">Coyoacán</option>
                <option value="5">Cuajimalpa de Morelos </option>
                <option value="6">Cuauhtémoc</option>
                <option value="7">Gustavo A. Madero</option>
                <option value="8">Iztacalco</option>
                <option value="9">Iztapalapa</option>
                <option value="10">Magdalena Contreras</option>
                <option value="11">Miguel Hidalgo</option>
                <option value="12">Milpa Alta</option>
                <option value="13">Tláhuac</option>
                <option value="14">Tlalpan</option>
                <option value="15">Venustiano Carranza</option>
                <option value="16">Xochimilco</option>
                 </select>
            </div>
            <!--                            -->
            <div class="form-group">
              <label for="name1">PILARES</label>
              <select id="pilarSelect_id" class="form-control" name="pilarSelect_id" required>
                <option value="">Selecciona</option>
              </select>
            </div> <br><br>
          </div>
        </div>
        <div class="text-center">
            <small class="form-text text-muted"><strong>Verifica que tus datos sean correctos antes de enviar.</strong></small>
        </div>
        <div class="text-center m-auto btn-block">
          <button type="submit"  class="btn btn-info btn-lg px-5">Enviar</button>
        </div>
      </fieldset>

    </div>
  </form>
  <img src="<?php echo constant('URL')?>public/img/form-img/cenefa.png">

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="<?php echo constant('URL')?>public/js/curpValidacion.js" charset="utf-8"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script src="<?php echo constant('URL')?>public/js/jquery-1.8.2.js"></script>
  <script src="<?php echo constant('URL')?>public/js/jquery-ui.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script type="text/javascript">
    window.addEventListener('keydown', function(e) {
      if (e.keyIdentifier == 'U+000A' || e.keyIdentifier == 'Enter' || e.keyCode == 13) {
        if (e.target.nodeName == 'INPUT' && e.target.type == 'text') {
          e.preventDefault();
          return false;
        }
      }
    }, true);
  </script>
  <script>
    function justNumbers(e) {
      var keynum = window.event ? window.event.keyCode : e.which;
      if ((keynum == 8) || (keynum == 46))
        return true;

      return /\d/.test(String.fromCharCode(keynum));
    }
  </script>
<style>
      div {

        padding-top: 10px;
        padding-right: 10px;
        padding-left: 15px;
      }
</style>

</body>

</html>
