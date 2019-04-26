

<?php
include("db.php");
// require_once 'config/db.php';
require_once 'models/ActividadesPorUsuario.php';
// var_dump($_GET['id']);die;
if(isset($_GET['id'])){
    $id = $_GET['id'];

    mysqli_query($conn, "SET NAMES 'utf8mb4'");

    $query = "SELECT * FROM Usuario WHERE idUsuarios = '$id'";
    $actividadesregistradas ="SELECT A2.nombre FROM ActividadesPorUsuario A1, Actividades A2 WHERE A1.Actividades_idActividades = A2.idActividades AND A1.Usuario_idUsuarios = '$id'";

   
    $result = mysqli_query($conn, $query);
    if(!$result){
        echo "no connection";
    }
    if (mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_array($result);

        $nombre = $row['nombre'];
        $apellidoPaterno = $row['apellidoPaterno'];
        $apellidoMaterno = $row['apellidoMaterno'];
        // $folio = $row['folio'];
        $correo = $row['correo'];
        // $curp = $row['curp'];
        $telefonoCasa = $row['telefonoCasa'];
        $telefonoCelular = $row['telefonoCelular'];
    }  

    $resultActividades =mysqli_query($conn, $actividadesregistradas);

   
}

if(isset($_POST['update'])){
    $id = $_GET['id'];
    
    $nombre = $_POST['nombre'];
    $apellidoPaterno = $_POST['apellidoPaterno'];
    $apellidoMaterno = $_POST['apellidoMaterno'];
    // $folio = $_POST['folio'];
    $correo = $_POST['correo'];
    // $curp = $_POST['curp'];
    $telefonoCasa = $_POST['telefonoCasa'];
    $telefonoCelular = $_POST['telefonoCelular'];

    $query = "UPDATE Usuario set nombre = '$nombre', 
    apellidoPaterno = '$apellidoPaterno', 
    apellidoMaterno  = '$apellidoMaterno',
    correo  = '$correo', 
    telefonoCasa  = '$telefonoCasa',  
    telefonoCelular  = '$telefonoCelular'    
    WHERE idUsuarios = '$id'";

    $result = mysqli_query($conn, $query);
    if(!$result){
        $_SESSION['message'] = "Se actualizó correctamente al usuario";
        $_SESSION['message_type'] = "success";
    }
        
    $_SESSION['message'] = "No se logró hacer la actualización del usuario";
    $_SESSION['message_type'] = "danger";
   

    // $actividadesPorUsuario = new ActividadesPorUsuario();

    // if (isset($_POST['opcionEdu'])) {
    //     $actividadesPorUsuario->setActividades_idActividades($_POST['opcionEdu']);
    //     $actividadesPorUsuario->setIdTiposActividades($_POST['opcionEdu']);
    //     $actividadesPorUsuario->setUsuario_idUsuarios($id);
    //     $actividadesPorUsuario->setUsuario_Direccion_idDireccion($id);
    //     $actividadesPorUsuario->setUsuario_idColonia($id);
    //     $actividadesPorUsuario->setUsuario_idAlcaldiasZonas($id);
    //     $actividadesPorUsuario->setUsuario_idZonas($id);

    //     $saveOpcionEducativa = $actividadesPorUsuario->save();
    //  }

    //  if(isset($_POST['check'])){

    //      foreach ($_POST['check'] as $key => $value) {
    //          $actividadesPorUsuario->setActividades_idActividades($value);
    //       //    var_dump($value);
    //          $actividadesPorUsuario->setIdTiposActividades($value);
    //          $actividadesPorUsuario->setUsuario_idUsuarios($id);
    //          $actividadesPorUsuario->setUsuario_Direccion_idDireccion($id);
    //          $actividadesPorUsuario->setUsuario_idColonia($id);
    //          $actividadesPorUsuario->setUsuario_idAlcaldiasZonas($id);
    //          $actividadesPorUsuario->setUsuario_idZonas($id);

    //          $saveActividadesPorUsuario = $actividadesPorUsuario->save();
    //      }
    //  }
     header("Location: Crud/users");

}

?>
<?php include("views/layout/headerCRUD.php") ?>

<body> 

    <div class="container p-4">
        <div class="row">
            <div class="col-xl-8 mx-auto">
                <div class="card card-body">
                    <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
                        <div class="form-group">
                            <input type="text" name="nombre" value="<?php echo $nombre; ?>"
                            class="form-control" placeholder="Editar nombre">
                        </div>
                        <div class="form-group">
                            <input  type="text" name="apellidoPaterno" value="<?php echo $apellidoPaterno; ?>"class="form-control"
                            placeholder="Editar Apellido Paterno">
                        </div>
                        <div class="form-group">
                            <input type="text" name="apellidoMaterno" value="<?php echo $apellidoMaterno; ?>"
                            class="form-control" placeholder="Editar Apellido Materno">
                        </div>
                        <!-- <div class="form-group">
                            <input type="text" name="folio" value="<?php //echo $folio; ?>"
                            class="form-control" placeholder="Editar Folio">
                        </div> -->
                        <div class="form-group">
                            <input type="mail" name="correo" value="<?php echo $correo; ?>"
                            class="form-control" placeholder="Editar Correo">
                        </div>
                        <!-- <div class="form-group">
                            <input type="text" name="curp" value="<?php //echo $curp; ?>"
                            class="form-control" placeholder="Editar CURP">
                        </div> -->
                        <div class="form-group">
                            <input type="tel" name="telefonoCasa" value="<?php echo $telefonoCasa; ?>"
                            class="form-control" placeholder="Editar Telefono Casa">
                        </div>
                        <div class="form-group">
                            <input type="tel" name="telefonoCelular" value="<?php echo $telefonoCelular; ?>"
                            class="form-control" placeholder="Editar Telefono Celular">
                        </div>
                        <div class="form-group">
                          
                            <table class="table table-bordered"  width="100%" cellspacing="0">
                            <thead>
                                    <tr>
                                        <th>Actividades registradas</th>
                                    </tr>
                                    </thead>
        
                                    <tbody>
                            <?php
                            while ($row = mysqli_fetch_array($resultActividades)) { ?>
                                    <tr>
                                        <td><?php echo $row['nombre'] ?></td>
                                    </tr>
                            <?php  } ?>
                           <!-- mysqli_close($conn); -->
                            </table>
                        </div>
                        
                        <button class="btn btn-success" name="update">
                            Actualizar Registro
                        </button>
                    </form>        
                </div>
            </div>
        </div>
    </div>


    <?php include("views/layout/footerCRUD.php") ?>
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
