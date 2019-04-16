<?php require 'views/layout/headerCRUD.php'; ?>
<?php
    if (isset($_SESSION['pilarAsignado'])) {
        $nombrePilar = $_SESSION['pilarAsignado'];
        $separador = "-";
    }
 ?>
 <div id="content-wrapper">
      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">

          <li class="breadcrumb-item active">Visualización de datos</li>
        </ol>

        <!-- Area Chart Example-->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-chart-area"></i>
           Gráfica de ususarios registrados</div>
          <div class="card-body">
            <canvas id="myAreaChart" width="100%" height="30"></canvas>
          </div>
          <div class="card-footer small text-muted">Actualizado ayer a las 11:59 PM</div>
        </div>

        <div class="row">
          <div class="col-lg-8">
            <div class="card mb-3">
              <div class="card-header">
                <i class="fas fa-chart-bar"></i>
                Gráfica de Usuarios registrados por zona</div>
              <div class="card-body">
                <canvas id="myBarChart" width="100%" height="50"></canvas>
              </div>
              <div class="card-footer small text-muted">Actualizado ayer a las 11:59 PM</div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card mb-3">
              <div class="card-header">
                <i class="fas fa-chart-pie"></i>
                Gráfica de usuarios registrados por tipo de actividad</div>
              <div class="card-body">
                <canvas id="myPieChart" width="100%" height="100"></canvas>
              </div>
              <div class="card-footer small text-muted">Actualizado ayer a las 11:59 PM</div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xl-12">
            <div class="card mb-3">
              <div class="card-header">
                <i class="fas fa-chart-bar"></i>
                Gráfica de Usuarios registrados por PILARES</div>
              <div class="card-body">
                <canvas id="usuariosPorPilar" width="100%" height="50"></canvas>
              </div>
              <div class="card-footer small text-muted">Actualizado ayer a las 11:59 PM</div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xl-6">
            <div class="card mb-3">
              <div class="card-header">
                <i class="fas fa-chart-bar"></i>
                Gráfica de Usuarios registrados por PILARES zona Poniente</div>
              <div class="card-body">
                <canvas id="usuariosPoniente" width="100%" height="50"></canvas>
              </div>
              <div class="card-footer small text-muted">Actualizado ayer a las 11:59 PM</div>
            </div>
          </div>
          <div class="col-xl-6">
            <div class="card mb-3">
              <div class="card-header">
                <i class="fas fa-chart-bar"></i>
                Gráfica de Usuarios registrados por PILARES zona Norte</div>
              <div class="card-body">
                <canvas id="usuariosNorte" width="100%" height="50"></canvas>
              </div>
              <div class="card-footer small text-muted">Actualizado ayer a las 11:59 PM</div>
            </div>
          </div>
         </div>
         <div class="row">
           <div class="col-xl-6">
             <div class="card mb-3">
               <div class="card-header">
                 <i class="fas fa-chart-bar"></i>
                 Gráfica de Usuarios registrados por PILARES zona Iztapalapa</div>
               <div class="card-body">
                 <canvas id="usuariosIztapalapa" width="100%" height="50"></canvas>
               </div>
               <div class="card-footer small text-muted">Actualizado ayer a las 11:59 PM</div>
             </div>
           </div>
           <div class="col-xl-6">
             <div class="card mb-3">
               <div class="card-header">
                 <i class="fas fa-chart-bar"></i>
                 Gráfica de Usuarios registrados por PILARES zona Sur Poniente</div>
               <div class="card-body">
                 <canvas id="usuariosSurPoniente" width="100%" height="50"></canvas>
               </div>
               <div class="card-footer small text-muted">Actualizado ayer a las 11:59 PM</div>
             </div>
           </div>
          </div>
          <div class="row">
            <div class="col-xl-6">
              <div class="card mb-3">
                <div class="card-header">
                  <i class="fas fa-chart-bar"></i>
                  Gráfica de Usuarios registrados por PILARES zona Sur</div>
                <div class="card-body">
                  <canvas id="usuariosSur" width="100%" height="50"></canvas>
                </div>
                <div class="card-footer small text-muted">Actualizado ayer a las 11:59 PM</div>
              </div>
            </div>
            <div class="col-xl-6">
              <div class="card mb-3">
                <div class="card-header">
                  <i class="fas fa-chart-bar"></i>
                  Gráfica de Usuarios registrados por PILARES zona Centro y Oriente</div>
                <div class="card-body">
                  <canvas id="usuariosCentroOriente" width="100%" height="50"></canvas>
                </div>
                <div class="card-footer small text-muted">Actualizado ayer a las 11:59 PM</div>
              </div>
            </div>
           </div>

        <p class="small text-center text-muted my-5">
          <!--
          <em>More chart examples coming soon...</em>
        -->
        </p>

      </div>
      <!-- /.container-fluid -->

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

  <!-- Custom scripts for all pages-->
  <script src="<?php echo constant('URL')?>public/js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="<?php echo constant('URL')?>public/js/demo/chart-area-demo.js"></script>
  <script src="<?php echo constant('URL')?>public/js/demo/chart-bar-demo.js"></script>
  <script src="<?php echo constant('URL')?>public/js/demo/chart-pie-demo.js"></script>
  <script src="<?php echo constant('URL')?>public/js/demo/chart-UsuariosPorPilar.js"></script>
  <script src="<?php echo constant('URL')?>public/js/demo/chart-UsuariosPorPilarZonaPoniente.js"></script>
  <script src="<?php echo constant('URL')?>public/js/demo/chart-UsuariosPorPilarZonaNorte.js"></script>
  <script src="<?php echo constant('URL')?>public/js/demo/chart-UsuariosPorPilarZonaIztapalapa.js"></script>
  <script src="<?php echo constant('URL')?>public/js/demo/chart-UsuariosPorPilarZonaSurPoniente.js"></script>
  <script src="<?php echo constant('URL')?>public/js/demo/chart-UsuariosPorPilarZonaSur.js"></script>
  <script src="<?php echo constant('URL')?>public/js/demo/chart-UsuariosPorPilarZonaCentroOriente.js"></script>

</body>

</html>
