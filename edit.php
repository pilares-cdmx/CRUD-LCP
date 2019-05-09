

<?php
// ini_set('display_startup_errors', 1);
// ini_set('display_errors', 1);
// error_reporting(-1);
require_once 'config/db.php';
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

    $query = "UPDATE Usuario SET nombre = '$nombre', 
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
   

    $actividadesPorUsuario = new ActividadesPorUsuario();

    if (isset($_POST['opcionEdu'])) {
        $actividadesPorUsuario->setActividades_idActividades($_POST['opcionEdu']);
        $actividadesPorUsuario->setIdTiposActividades($_POST['opcionEdu']);
        $actividadesPorUsuario->setUsuario_idUsuarios($id);
        $actividadesPorUsuario->setUsuario_Direccion_idDireccion($id);
        $actividadesPorUsuario->setUsuario_idColonia($id);
        $actividadesPorUsuario->setUsuario_idAlcaldiasZonas($id);
        $actividadesPorUsuario->setUsuario_idZonas($id);

        $saveOpcionEducativa = $actividadesPorUsuario->save();
     }

     if(isset($_POST['check'])){

         foreach ($_POST['check'] as $key => $value) {
             $actividadesPorUsuario->setActividades_idActividades($value);
          //    var_dump($value);
             $actividadesPorUsuario->setIdTiposActividades($value);
             $actividadesPorUsuario->setUsuario_idUsuarios($id);
             $actividadesPorUsuario->setUsuario_Direccion_idDireccion($id);
             $actividadesPorUsuario->setUsuario_idColonia($id);
             $actividadesPorUsuario->setUsuario_idAlcaldiasZonas($id);
             $actividadesPorUsuario->setUsuario_idZonas($id);

             $saveActividadesPorUsuario = $actividadesPorUsuario->save();
         }
     }
     header("Location: Crud/users");

}

?>
<?php include("views/layout/headerCRUD.php") ?>

<body> 
                            
    <div class="container p-4">
        <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                
                                <table class="table table-bordered"  width="100%" cellspacing="0">
                                <thead>
                                        <tr>
                                            <th>Actividades registradas</th>
                                        </tr>
                                        </thead>
            
                                        <tbody>
                                <?php
                                while ($actividades= mysqli_fetch_array($resultActividades)) { ?>
                                        <tr>
                                            <td><?php echo $actividades['nombre'] ?></td>
                                        </tr>
                                <?php  } ?>
                                </table>
                            </div>
                          </div>
                       
            <div class="col-xl-12 mx-auto">
                <div class="card card-body">
                        <!-- <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
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
                            <div class="form-group">
                                <input type="text" name="folio" value="<?php //echo $folio; ?>"
                                class="form-control" placeholder="Editar Folio">
                            </div> 
                            <div class="form-group">
                                <input type="mail" name="correo" value="<?php echo $correo; ?>"
                                class="form-control" placeholder="Editar Correo">
                            </div>
                            <div class="form-group">
                                <input type="text" name="curp" value="<?php //echo $curp; ?>"
                                class="form-control" placeholder="Editar CURP">
                            </div> 
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
                                while ($actividades= mysqli_fetch_array($resultActividades)) { ?>
                                        <tr>
                                            <td><?php echo $actividades['nombre'] ?></td>
                                        </tr>
                                <?php  } ?>
                              mysqli_close($conn); 
                                </table>
                            </div>
                            
                            <button class="btn btn-success" name="update">
                                Actualizar Registro
                            </button>
                        </form>         -->
                          <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST"> 
                          
                          <div class="col-lg-6">                    
                                  <div class="container">
                                      <fieldset>
                                        <legend>DATOS PERSONALES</legend>
                                        <div class="row">
                                          <div class="col-lg-12 col-md-12 estilo-forma">
                                            <label for="nombre">Nombre(s)</label><br>
                                            <input  type="text" class="validate text-uppercase" name="nombre"  size="40" 
                                            placeholder="Editar nombre" value="<?php echo $nombre; ?>" required>  
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-lg-12 col-md-12 estilo-forma">
                                            <label for="ap_pat">Apellido paterno</label><br>
                                            <input class="validate text-uppercase" name="apellidoPaterno"  size="40" 
                                            value="<?php echo $apellidoPaterno; ?>"class="form-control" placeholder="Editar Apellido Paterno"required>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-lg-12 col-md-12 estilo-forma">
                                            <label for="ap_mat">Apellido materno</label><br>
                                            <input class="validate text-uppercase" name="apellidoMaterno"  size="40" 
                                            value="<?php echo $apellidoMaterno; ?>" placeholder="Editar Apellido Materno" required>
                                          </div>
                                        </div>
                                      <!-- <div class="row">
                                          <div class="col-lg-12 col-md-12 estilo-forma">
                                            <label for="curp" class="active ">CURP</label><br>
                                            <input maxlength="18" minlength="18"name="curp" type="text" class="validate text-uppercase" oninput="validarInput(this)" 
                                            onchange="validaEspacios(this.value)"  style="text-transform:uppercase;" size="40" value="<?php echo $curp;?>" 
                                            placeholder="Editar CURP"  required>
                                            <small class="form-text text-muted" tabindex="0">Consulta tu CURP <a href="https://www.gob.mx/curp/" target="popup" onclick="window.open(this.href, this.target, 'width=900px,height=800px'); return false;">aquí</a> </small>
                                            <div id="curp-error" name="curp-error"></div>
                                            <pre id="resultado"></pre>
                                          </div>
                                        </div>  -->
                                      </fieldset>
                                  </div>

                                  <div class="container">
                                    <fieldset>
                                      <legend>DATOS DE CONTACTO</legend>
                                      <div class="row">
                                        <div class="col-lg-12 col-md-12 estilo-forma">
                                          <label for="telCasa" <input type="number">Teléfono de casa</label><br>
                                          <input onkeypress="return justNumbers(event);" maxlength="12" type="tel" class="validate" name="telefonoCasa" size="40" 
                                          value="<?php echo $telefonoCasa; ?>" placeholder="Editar Telefono Casa" >
                                        </div>
                                      </div>

                                  
                                        <div class="row">
                                          <div class="col-lg-12 col-md-12 estilo-forma">
                                            <label for="telMovil" <input type="number">Teléfono celular</label><br>
                                            <input  maxlength="12" type="tel" name="telefonoCelular" class="validate" size="40"
                                            value="<?php echo $telefonoCelular; ?>"  placeholder="Editar Telefono Celular" >
                                          </div>
                                        </div>

                                      <div class="row">
                                          <div class="col-lg-12 col-md-12 estilo-forma">
                                            <label for="correo">Correo</label><br>
                                            <input type="email" class="validate" name="correo" aria-describedby="emailHelp" size="40" 
                                            value="<?php echo $correo; ?>" placeholder="Editar Correo" >
                                            <small id="emailHelp" class="form-text text-muted"></small>
                                        </div>
                                  
                                      
                                      </fieldset>
                                      
                                  </div>
                            </div>       
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
                                                <input type="checkbox" value="128" name="check[]" id="cul33" />
                                                <label for="cul33" class="rc_sty" value="128" name="check[]">Arte y creatividad</label>
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
                                                <input type="checkbox" value="123" name="check[]" id="cul32" />
                                                <label for="cul32" class="rc_sty " value="123" name="check[]">Dibujo y grabado</label><br>
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
                                                <label for="dep8" class="rc_sty" value="97" name="check[]">Tai chi</label><br>
                                                <input type="checkbox" value="129" name="check[]" id="dep13" />
                                                <label for="dep13" class="rc_sty" value="129" name="check[]">Ritmos Latinos</label>
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
                                                <label for="dep12" class="rc_sty" value="101" name="check[]">Kung fu</label><br>
                                                <input type="checkbox" value="130" name="check[]" id="dep14" />
                                                <label for="dep14" class="rc_sty" value="130" name="check[]">Taekwondo</label>

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
                                             
                                              <input type="checkbox" value="41" name="check[]" id="econo9" />
                                              <label for="econo9" class="rc_sty" value="41" name="check[]">Gastronomía, panadería y catering</label> <br> 

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
                                    <div class="row">
                                      <div class="col-lg-12 estilo-forma">
                                        <label>Talleres extra</label><br>
                                        <div class="checkbox">
                                          <div class="row">
                                            <div class="col-lg-4">
                                              <input type="checkbox" name="check52" id="braile" />
                                              <label for="braile" class="rc_sty" value="124">Braile</label><br>
                                            
                                            </div>
                                              <div class="col-lg-4">
                                                <input type="checkbox" name="check56" id="computo" />
                                                <label for="computo" class="rc_sty" value="125">Computación asistida</label>
                                                                </div>
                                                <div class="col-lg-4">
                                                <input type="checkbox" name="check60" id="señas" />
                                                <label for="señas" class="rc_sty" value="126">Introducción a  la lengua de señas Mexicana</label>
                                              
                                              </div>
                                              
                                            </div>
                                        
                                            <br>
                                          </div>
                                      </div>
                                  </div> 
                                    <div class="text-center">
                                        <small class="form-text text-muted"><strong>Verifica que los datos sean correctos antes de enviar.</strong></small>
                                    </div> 
                                    <div class="text-center m-auto btn-block">
                                      <button  class="btn btn-info btn-lg px-5" name="update"> 
                                        Actualizar Registro
                                      </button>   
                                    </div>
                                  </fieldset>
                                </div>
                              </form>
                  </div>
              </div>
          </div>
      </div>
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
    <?php //include("views/layout/footerCRUD.php") ?>
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
