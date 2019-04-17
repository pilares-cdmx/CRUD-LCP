<?php require 'views/layout/headerCRUD.php'; ?>
<?php
  $con = mysqli_connect('localhost', 'pilaresDevSergio', '%C2MB10cl1m2t1c0%', 'pilaresDB');
      if (!$con) {
          die('Could not connect: ' . mysqli_error($con));
      }

  mysqli_select_db($con, "pilaresDB");
  mysqli_query($con, "SET NAMES 'utf8mb4'");
  $sql="SELECT COUNT(*) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_TiposActividades_idTiposActividades = '1'";
  $totalesCultura = mysqli_query($con, $sql);
  //var_dump($totalesCultura);
  $culturaTotales = mysqli_fetch_array($totalesCultura);

  $sql="SELECT COUNT(*) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_TiposActividades_idTiposActividades = '4'";
  $totalesCiberEscuelas = mysqli_query($con, $sql);
  //var_dump($totalesCultura);
  $ciberEscuelaTotales = mysqli_fetch_array($totalesCiberEscuelas);

  $sql="SELECT COUNT(*) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_TiposActividades_idTiposActividades = '2'";
  $totalesDeporte = mysqli_query($con, $sql);
  //var_dump($totalesCultura);
  $deporteTotales = mysqli_fetch_array($totalesDeporte);

  $sql="SELECT COUNT(*) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_TiposActividades_idTiposActividades = '3'";
  $totalesAutonomia = mysqli_query($con, $sql);
  //var_dump($totalesCultura);
  $autonomiaTotales = mysqli_fetch_array($totalesAutonomia);

  if (isset($_SESSION['pilarAsignado'])) {
      $nombrePilar = $_SESSION['pilarAsignado'];
      $separador = "-";
  }
 ?>
    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
        <!--
          <li class="breadcrumb-item active">Vista General</li>
        -->
        <?php if(isset($_SESSION['identity'])): ?>
          <div class="breadcrumb-item active">
            <li><?= $_SESSION['identity']->nombre?> <?=$_SESSION['identity']->apellidoPaterno?> <?=$_SESSION['identity']->apellidoMaterno?></li>
          </div>

        <?php endif; ?>
        <?php if(isset($_SESSION['pilarAsignado'])): ?>

             <li><?=$separador?><strong><?=$nombrePilar?></strong></li>

        <?php endif;?>
        </ol>

        <!-- Icon Cards-->
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-music"></i>
                </div>
                <div class="mr-5">Cultura</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" data-toggle="collapse" href="#collapseCultura">
                <span class="float-left">Ver detalle</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
              <div class="collapse" id="collapseCultura">
                <div class="card card-body">
                  <table class="table table-striped ">
                    <tbody class="bg-primary">
                      <tr>
                        <th scope="row">Usuarios totales</th>
                        <td><?=$culturaTotales['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Teatro</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Danza</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Perfonmance</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Música</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Artes plásticas</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Fotografía</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Video documental</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Stop motion</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Arte y biología</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Libroclub</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Cineclub y trashuma</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Difusión Científica</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Baile Social</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Danza para niños</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Danza para adultos</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Danza folklórica</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Actuación</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Teatro de calle</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Danza contemporánea</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Danza polinesia</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Teatro de máscaras</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Expresión corporal y teatro</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Telar de cintura</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Cartonería</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Bordado para la vida</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Construcción artesanal de instrumentos</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Diseño de juguetes de madera y materiales de</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Reciclaje y medio ambiente</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Escritura creativa</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Pintura artística</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Medios Audiovisuales </th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Cine</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Animación para niños</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Vídeo comunitario</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Guitarra clásica</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Música Rap</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Percusiones</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Iniciación a la música</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Son Huasteco</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Dibujo y grabado</th>
                        <td>#usuarios</td>
                      </tr>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-list"></i>
                </div>
                <div class="mr-5">Ciberescuelas</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" data-toggle="collapse" href="#collapseCiberescuelas">
                <span class="float-left">Ver detalle</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
              <div class="collapse" id="collapseCiberescuelas">
                <div class="card card-body">
                  <table class="table table-striped ">
                    <tbody class="bg-warning">
                      <tr>
                        <th scope="row">Usuarios totales</th>
                        <td><?=$ciberEscuelaTotales['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Ajedrez</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Club de Ciencias</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Robótica aplicada</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Club de Codigo</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Amor y sexualidad</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Prevención de adicc</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Habilidades para la</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Proyecto de vida</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Autoestima</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Tanatología o manej</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Inteligencia emocio</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Arte y Emociones</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Redacción y comprensión de lectura</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Talleres de cómputo</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Emociones mágicas</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Pintando emociones</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Alfabetización</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Primaria</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Secundaria</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">BADI</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Prepa en línea SEP</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">B@UNAM</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">UnADM</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Licenciatura en linea</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Licenciaturas CDMX</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Asesorias primaria</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Asesorias secundaria</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Asesorias bachillerato</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Asesorias licenciatura</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Baile, cuerpo y emociones</th>
                        <td>#usuarios</td>
                      </tr>
                    </tbody>
                  </table>
               </div>
             </div>
             </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-running"></i>
                </div>
                <div class="mr-5">Deporte</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" data-toggle="collapse" href="#collapseDeporte">
                <span class="float-left">Ver detalle</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
              <div class="collapse" id="collapseDeporte">
                <div class="card card-body">
                  <table class="table table-striped ">
                    <tbody class="bg-success">
                      <tr>
                        <th scope="row">Usuarios totales</th>
                        <td><?=$deporteTotales['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Fútbol</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Basquetbol</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Voleibol</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Acondicionamiento físico</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Zumba</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Tae bo</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Yoga</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Tai chi</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Boxeo</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Atletismo</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Karate do</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Kung fu</th>
                        <td>#usuarios</td>
                      </tr>
                    </tbody>
                  </table>
               </div>
             </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-hand-holding-usd"></i>
                </div>
                <div class="mr-5">Autonomía económica</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" data-toggle="collapse" href="#collapseAutonomia">
                <span class="float-left">Ver detalle</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
              <div class="collapse" id="collapseAutonomia">
                <div class="card card-body">
                  <table class="table table-striped ">
                    <tbody class="bg-danger">
                      <tr>
                        <th scope="row">Usuarios totales</th>
                        <td><?=$autonomiaTotales['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Encuadernación</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Reciclaje</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Taller de huerto</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Cerámica</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Programación y Apli</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Edición y Diseño </th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Carpintería</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Plomería</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Herrería y Aluminer</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Electricidad y dispositivos fotovoltaicos</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Gastronomía, panadería y catering</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Panadería</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Joyería y accesorio </th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Agricultura urbana</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Bicimaquinass</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Estilismo</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Actuación</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Diseño de imagen y Cosmetología orgánica</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Codigo para mujeres</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Electrónica y robótica</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Cosecha de agua de</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Instalación y repar</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Textiles y diseño</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Banquetes</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Fotografia de produ</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Logos e identidad d</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Calidad en el servi</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Creación de coopera</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Emprendedurismo</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Creación de micro-n</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Comercio digital</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Estrategias de vent</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Comercio justo</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Hospedaje</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Electrónica digital</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Distribución</th>
                        <td>#usuarios</td>
                      </tr>
                      <tr>
                        <th scope="row">Desarrollo web</th>
                        <td>#usuarios</td>
                      </tr>
                      </tbody>
                  </table>
               </div>
             </div>
            </div>
          </div>
        </div>

        <!-- Area Chart Example-->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-chart-area"></i>
          Gráfica general de usuarios registrados por día</div>
          <div class="card-body">
            <canvas id="myAreaChart" width="100%" height="30"></canvas>
          </div>
          <div class="card-footer small text-muted">Actualizada Ayer a las 11:59 PM</div>
        </div>

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
    <?php require 'views/layout/footerCRUD.php'; ?>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">¿Estas seguro de querer salir?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Selesciona salir si estas seguro de cerrar tu sesión.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a class="btn btn-primary" href="<?php echo constant('URL')?>Crud/index">Salir</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo constant('URL')?>public/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo constant('URL')?>public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo constant('URL')?>public/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="<?php echo constant('URL')?>public/vendor/chart.js/Chart.min.js"></script>
  <script src="<?php echo constant('URL')?>public/vendor/datatables/jquery.dataTables.js"></script>
  <script src="<?php echo constant('URL')?>public/vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo constant('URL')?>public/js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="<?php echo constant('URL')?>public/js/demo/datatables-demo.js"></script>
  <script src="<?php echo constant('URL')?>public/js/demo/chart-area-demo.js"></script>

</body>

</html>
