<?php
include("db.php");
// var_dump($_GET['id']);die;
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM Usuario WHERE idUsuarios = '$id'";
    $result = mysqli_query($conn, $query);
    if(!result){
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
    header("Location: Crud/users");
}

?>
<?php include("views/layout/headerCRUD.php") ?>

    <div class="container p-4">
        <div class="row">
            <div class="col-md-4 mx-auto">
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

                        <button class="btn btn-success" name="update">
                            Actualizar Registro
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
        

    <?php include("views/layout/footerCRUD.php") ?>