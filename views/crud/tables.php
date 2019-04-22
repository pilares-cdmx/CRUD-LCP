<?php
require 'views/layout/headerCRUD.php';

    if (isset($_SESSION['pilarAsignado'])) {
        $nombrePilar = $_SESSION['pilarAsignado'];
        $separador = "-";
    }
    $con = mysqli_connect('localhost', 'pilaresDevSergio', '%C2MB10cl1m2t1c0%', 'pilaresDB');
        if (!$con) {
            die('Could not connect: ' . mysqli_error($con));
        }

    mysqli_select_db($con, "pilaresDB");
    mysqli_query($con, "SET NAMES 'utf8mb4'");
    $sql="SELECT * FROM Usuario";
    $result = mysqli_query($con, $sql);
    //var_dump($result);

 ?>
    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item active">Administración de Usuarios<?=$separador?> <b><?=$nombrePilar?></b></li>
        </ol>
        <!-- <div class="container p-4"> -->
        <?php if(isset($_SESSION['message'])){ ?>
        <div class="alert alert-<?=$_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
      
<?php session_unset(); }?>
        <!-- Base de Datos Usuarios por Pilar -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Base de Datos Usuarios</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                      <tr>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>folio</th>
                        <th>correo</th>
                        <th>CURP</th>
                        <th>Telefono Casa</th>
                        <th>Telefono Cel.</th>
                        <th>Fecha Registro</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>folio</th>
                        <th>correo</th>
                        <th>CURP</th>
                        <th>Telefono Casa</th>
                        <th>Telefono Cel.</th>
                        <th>Fecha Registro</th>
                        <th>Acciones</th>
                      </tr>
                    </tfoot>
                    <tbody>
            <?php
            while ($row = mysqli_fetch_array($result)) { ?>
                     <tr>
                        <td><?php echo $row['nombre'] ?></td>
                        <td><?php echo $row['apellidoPaterno'] ?></td>
                        <td><?php echo $row['apellidoMaterno'] ?></td>
                        <td><?php echo $row['folio'] ?></td>
                        <td><?php echo $row['correo'] ?></td>
                        <td><?php echo $row['curp'] ?></td>
                        <td><?php echo $row['telefonoCasa'] ?></td>
                        <td><?php echo $row['telefonoCelular'] ?></td>
                        <td><?php echo $row['fechaDeRegistro'] ?></td>
                        <td>
                            <a href="<?=URL?>edit.php?id=<?php echo $row['idUsuarios']?>" class="btn btn-secondary">
                                <i class="fas fa-marker"></i>
                            </a>
                        </td>
                    </tr>
            <?php  } ?>

            <!-- mysqli_close($conn); -->
            
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Actualizado ayer a las 11:59 PM</div>
        </div>

        <p class="small text-center text-muted my-5">
          <em>Administración de usuarios</em>
        </p>

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
  <script src="<?php echo constant('URL')?>public/vendor/datatables/jquery.dataTables.js"></script>
  <script src="<?php echo constant('URL')?>public/vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo constant('URL')?>public/js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="<?php echo constant('URL')?>public/js/demo/datatables-demo.js"></script>

</body>

</html>
