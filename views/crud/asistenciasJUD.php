<?php require 'views/layout/headerCRUD-jud.php'; ?>
<?php
  if (isset($_SESSION['pilarAsignado'])) {
    $nombrePilar = $_SESSION['pilarAsignado'];
    $separador = "-";
    $idPilarLCP = $_SESSION['identity']->Pilares_idPilares;
  }

    $con = mysqli_connect('localhost', 'francisco', 'tu_contrasena', 'pilaresDB');
    // $con = mysqli_connect('localhost', 'root', '', 'pilaresDB');
        if (!$con) {
            die('Could not connect: ' . mysqli_error($con));
        }

    mysqli_select_db($con, "pilaresDB");
    mysqli_query($con, "SET NAMES 'utf8mb4'");
    /**
     * Asistencias totales 
     */
    $sql="SELECT count(DISTINCT Usuario_idusuarios) AS asistenciasTotal FROM Asistencias";
    $totalAsistencias = mysqli_query($con, $sql);
    //var_dump($totalAsistencias);
    $asistenciasTotales = mysqli_fetch_array($totalAsistencias);
    /**
     * Atenciones totales 
     */
    $sql="SELECT count(*) AS asistenciasTotal FROM Asistencias";
    $totalAsistencias = mysqli_query($con, $sql);
    //var_dump($totalAsistencias);
    $asistenciasTotales = mysqli_fetch_array($totalAsistencias);
    /**
     * Usuarios totales inscritos por genero
     */
    $sql="SELECT count(*) AS userPorGenero FROM Usuario WHERE sexo LIKE '%M%'";
    $totalesMujeres = mysqli_query($con, $sql);
    //var_dump($totalesMujeres);
    $mujeresTotales = mysqli_fetch_array($totalesMujeres);

    $sql="SELECT count(*) AS userPorGenero FROM Usuario WHERE sexo LIKE '%H%'";
    $totalesHombres = mysqli_query($con, $sql);
    //var_dump($totalesHombres);
    $hombresTotales = mysqli_fetch_array($totalesHombres);
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
        <!-- <li><?= $_SESSION['identity']->nombre?> <?=$_SESSION['identity']->apellidoPaterno?> <?=$_SESSION['identity']->apellidoMaterno?></li> -->
        <li><b>Información general de Asistencias</b></li>
        <li>Total de asistencias: <b><?=$asistenciasTotales['asistenciasTotal']?></b></li>
        <!-- <li><b>JUD estadística y prospección</b></li> -->
      </div>
    <?php endif; ?>
  </ol>
  <!-- Usuarios totales por Genero -->
  <div class="row">
    <div class="col-xl-6 col-sm-6 mb-3">
      <div class="card text-info bg-light o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
            <i class="fas fa-transgender-alt"></i>
            </div>
            
            <div class="mr-5"><b>Usuarios totales por Genero <span class="float-right"></span></b></div>
          </div>
          <a class="card-footer text-info clearfix small z-1" data-toggle="collapse" href="#collapsePorGenero">
            <span class="float-left">Ver detalle</span>
            <span class="float-right">
              <i class="fas fa-angle-right"></i>
            </span>
          </a>
          <div class="collapse" id="collapsePorGenero">
            <div class="card card-body">
              <table class="table table-striped ">
                <tbody class="bg-light">
                  <tr>
                    <th scope="row">Mujeres</th>
                    <td><?=$mujeresTotales['userPorGenero']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Hombres</th>
                    <td><?=$hombresTotales['userPorGenero']?></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>

    <div class="col-xl-3 col-sm-6 mb-3">
      <div class="card text-info bg-light o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
            <i class="fas fa-transgender-alt"></i>
            </div>
            
            <div class="mr-5"><b>Usuarios totales por Genero en Autonomía Económica  <span class="float-right"></span></b></div>
          </div>
          <a class="card-footer text-info clearfix small z-1" data-toggle="collapse" href="#collapsePorGeneroAutonomia">
            <span class="float-left">Ver detalle</span>
            <span class="float-right">
              <i class="fas fa-angle-right"></i>
            </span>
          </a>
          <div class="collapse" id="collapsePorGeneroAutonomia">
            <div class="card card-body">
              <table class="table table-striped ">
                <tbody class="bg-light">
                  <tr>
                    <th scope="row">Mujeres</th>
                    <td><?=$mujeresAutonomia['userPorGeneroAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Hombres</th>
                    <td><?=$hombresAutonomia['userPorGeneroAutonomia']?></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>

    <div class="col-xl-3 col-sm-6 mb-3">
      <div class="card text-info bg-light o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
            <i class="fas fa-transgender-alt"></i>
            </div>
            
            <div class="mr-5"><b>Usuarios totales por Genero en Ciberescuelas<span class="float-right"></span></b></div>
          </div>
          <a class="card-footer text-info clearfix small z-1" data-toggle="collapse" href="#collapsePorGeneroCiberescuela">
            <span class="float-left">Ver detalle</span>
            <span class="float-right">
              <i class="fas fa-angle-right"></i>
            </span>
          </a>
          <div class="collapse" id="collapsePorGeneroCiberescuela">
            <div class="card card-body">
              <table class="table table-striped ">
                <tbody class="bg-light">
                  <tr>
                    <th scope="row">Mujeres</th>
                    <td><?=$mujeresCiberescuela['userPorGeneroCiberescuela']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Hombres</th>
                    <td><?=$hombresCiberescuela['userPorGeneroCiberescuela']?></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>
  </div>

   <!-- Usuarios totales por intervalo de edad -->
   <div class="row">
    <div class="col-xl-6 col-sm-6 mb-3">
      <div class="card text-white bg-secondary o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
            <i class="fas fa-birthday-cake"></i>
            </div>
            
            <div class="mr-5"><b>Usuarios totales por intervalo de edad <span class="float-right"></span></b></div>
          </div>
          <a class="card-footer text-white clearfix small z-1" data-toggle="collapse" href="#collapsePorIntervalo">
            <span class="float-left">Ver detalle</span>
            <span class="float-right">
              <i class="fas fa-angle-right"></i>
            </span>
          </a>
          <div class="collapse" id="collapsePorIntervalo">
            <div class="card card-body">
              <table class="table table-striped ">
                <tbody class="bg-secondary">
                  <tr>
                    <th scope="row">60 años y más...</th>
                    <td><?=$totalesIntervalo1['userPorIntervalo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">de 59 y 45 años</th>
                    <td><?=$totalesIntervalo2['userPorIntervalo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">de 30 a 44 años</th>
                    <td><?=$totalesIntervalo3['userPorIntervalo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">de 15 a 29 años</th>
                    <td><?=$totalesIntervalo4['userPorIntervalo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">de 2 a 14 años</th>
                    <td><?=$totalesIntervalo5['userPorIntervalo']?></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>

    <div class="col-xl-3 col-sm-6 mb-3">  
      <div class="card text-white bg-secondary o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
            <i class="fas fa-transgender-alt"></i>
            </div>
            
            <div class="mr-5"><b>Usuarios totales por intervalo de edad mujeres  <span class="float-right"></span></b></div>
          </div>
          <a class="card-footer text-white clearfix small z-1" data-toggle="collapse" href="#collapsePorIntervaloMujeres">
            <span class="float-left">Ver detalle</span>
            <span class="float-right">
              <i class="fas fa-angle-right"></i>
            </span>
          </a>
          <div class="collapse" id="collapsePorIntervaloMujeres">
            <div class="card card-body">
              <table class="table table-striped ">
                <tbody class="bg-secondary">
                <tr>
                    <th scope="row">60 años y más...</th>
                    <td><?=$mujeresIntervalo1['userPorIntervalo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">de 59 y 45 años</th>
                    <td><?=$mujeresIntervalo2['userPorIntervalo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">de 30 a 44 años</th>
                    <td><?=$mujeresIntervalo3['userPorIntervalo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">de 15 a 29 años</th>
                    <td><?=$mujeresIntervalo4['userPorIntervalo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">de 2 a 14 años</th>
                    <td><?=$mujeresIntervalo5['userPorIntervalo']?></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>

    <div class="col-xl-3 col-sm-6 mb-3">
      <div class="card text-white bg-secondary o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
            <i class="fas fa-transgender-alt"></i>
            </div>
            
            <div class="mr-5"><b>Usuarios totales por intervalo de edad hombres<span class="float-right"></span></b></div>
          </div>
          <a class="card-footer text-white clearfix small z-1" data-toggle="collapse" href="#collapsePorIntervaloHombres">
            <span class="float-left">Ver detalle</span>
            <span class="float-right">
              <i class="fas fa-angle-right"></i>
            </span>
          </a>
          <div class="collapse" id="collapsePorIntervaloHombres">
            <div class="card card-body">
              <table class="table table-striped ">
                <tbody class="bg-secondary">
                <tr>
                    <th scope="row">60 años y más...</th>
                    <td><?=$hombresIntervalo1['userPorIntervalo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">de 59 y 45 años</th>
                    <td><?=$hombresIntervalo2['userPorIntervalo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">de 30 a 44 años</th>
                    <td><?=$hombresIntervalo3['userPorIntervalo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">de 15 a 29 años</th>
                    <td><?=$hombresIntervalo4['userPorIntervalo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">de 2 a 14 años</th>
                    <td><?=$hombresIntervalo5['userPorIntervalo']?></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>
  </div>

   <!-- Usuarios inscritos por PILARES-->
   <div class="row">
    <div class="col-xl-6 col-sm-6 mb-3">
      <div class="card text-info bg-light o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
            <i class="fas fa-landmark"></i>
            </div>
            
            <div class="mr-5"><b>Usuarios totales por PILARES<span class="float-right"></span></b></div>
          </div>
          <a class="card-footer text-info clearfix small z-1" data-toggle="collapse" href="#collapsePorPilares">
            <span class="float-left">Ver detalle</span>
            <span class="float-right">
              <i class="fas fa-angle-right"></i>
            </span>
          </a>
          <div class="collapse" id="collapsePorPilares">
            <div class="card card-body">
              <table class="table table-striped ">
                <tbody class="bg-light">
                  <tr>
                    <th scope="row">La Araña </th>
                    <td><?=$pilaresTotales1['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">El Capulín</th>
                    <td><?=$pilaresTotales2['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Jalalpa </th>
                    <td><?=$pilaresTotales3['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Xalli</th>
                    <td><?=$pilaresTotales4['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Cantera</th>
                    <td><?=$pilaresTotales5['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Emiliano Zapata</th>
                    <td><?=$pilaresTotales6['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Chimalpa</th>
                    <td><?=$pilaresTotales7['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">San Simón Tolnáhuac </th>
                    <td><?=$pilaresTotales8['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Frida Kahlo </th>
                    <td><?=$pilaresTotales9['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Atlampa</th>
                    <td><?=$pilaresTotales10['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Richard Wagner </th>
                    <td><?=$pilaresTotales11['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Benita Galeana </th>
                    <td><?=$pilaresTotales12['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Tlalpexco</th>
                    <td><?=$pilaresTotales13['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">José Martí </th>
                    <td><?=$pilaresTotales14['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Agrícola Pantitlán </th>
                    <td><?=$pilaresTotales15['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Central de Abasto</th>
                    <td><?=$pilaresTotales16['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Cooperemos Pueblo </th>
                    <td><?=$pilaresTotales17['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Acahualtepec</th>
                    <td><?=$pilaresTotales18['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Gabriela Mistral </th>
                    <td><?=$pilaresTotales19['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Huayatla</th>
                    <td><?=$pilaresTotales20['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Caneguín</th>
                    <td><?=$pilaresTotales47['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">San Salvador Cuauhtenco</th>
                    <td><?=$pilaresTotales21['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Zapotitla</th>
                    <td><?=$pilaresTotales22['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Rosario Castellanos</th>
                    <td><?=$pilaresTotales23['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Tulyehualco</th>
                    <td><?=$pilaresTotales24['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">San Francisco </th>
                    <td><?=$pilaresTotales25['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Belén de las flores</th>
                    <td><?=$pilaresTotales26['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Margarita Maza de Juárez </th>
                    <td><?=$pilaresTotales27['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Atlapulco </th>
                    <td><?=$pilaresTotales28['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Santa Cecilia </th>
                    <td><?=$pilaresTotales29['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Tepalcatlalpan</th>
                    <td><?=$pilaresTotales30['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Cerro de la estrella </th>
                    <td><?=$pilaresTotales31['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Facundo Cabral</th>
                    <td><?=$pilaresTotales32['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">San lucas xochimanca </th>
                    <td><?=$pilaresTotales33['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Zapata Vela </th>
                    <td><?=$pilaresTotales34['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Insurgentes</th>
                    <td><?=$pilaresTotales35['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Amantla</th>
                    <td><?=$pilaresTotales36['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">La Cuesta </th>
                    <td><?=$pilaresTotales37['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Tizimín</th>
                    <td><?=$pilaresTotales38['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Ecoguardas</th>
                    <td><?=$pilaresTotales39['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Árbol del conocimiento</th>
                    <td><?=$pilaresTotales40['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Santa Fe</th>
                    <td><?=$pilaresTotales41['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">La Era</th>
                    <td><?=$pilaresTotales42['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Isidro Fabela</th>
                    <td><?=$pilaresTotales43['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Villa Panamericana</th>
                    <td><?=$pilaresTotales44['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Santa Úrsula</th>
                    <td><?=$pilaresTotales45['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Paulo Freire</th>
                    <td><?=$pilaresTotales46['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">San Pedro Xalpa</th>
                    <td><?=$pilaresTotales48['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Xaltipac</th>
                    <td><?=$pilaresTotales50['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Palmitas</th>
                    <td><?=$pilaresTotales51['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Teotongo</th>
                    <td><?=$pilaresTotales52['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Insurgentes</th>
                    <td><?=$pilaresTotales53['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">La Fortaleza</th>
                    <td><?=$pilaresTotales54['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Rojo Gómez</th>
                    <td><?=$pilaresTotales55['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Municipio Libre</th>
                    <td><?=$pilaresTotales56['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">San Pedro Actopan</th>
                    <td><?=$pilaresTotales57['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">San Bartolomé Xicomulco</th>
                    <td><?=$pilaresTotales58['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Centenario</th>
                    <td><?=$pilaresTotales59['userPorPilares']?></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>

    <div class="col-xl-3 col-sm-6 mb-3">
      <div class="card text-info bg-light o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
            <i class="fas fa-transgender-alt"></i>
            </div>
            
            <div class="mr-5"><b>Usuarios totales por PILARES mujeres <span class="float-right"></span></b></div>
          </div>
          <a class="card-footer text-info clearfix small z-1" data-toggle="collapse" href="#collapsePorPilaresMujeres">
            <span class="float-left">Ver detalle</span>
            <span class="float-right">
              <i class="fas fa-angle-right"></i>
            </span>
          </a>
          <div class="collapse" id="collapsePorPilaresMujeres">
            <div class="card card-body">
              <table class="table table-striped ">
                <tbody class="bg-light">
                <tr>
                    <th scope="row">La Araña </th>
                    <td><?=$pilaresTotalesMujeres1['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">El Capulín</th>
                    <td><?=$pilaresTotalesMujeres2['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Jalalpa </th>
                    <td><?=$pilaresTotalesMujeres3['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Xalli</th>
                    <td><?=$pilaresTotalesMujeres4['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Cantera</th>
                    <td><?=$pilaresTotalesMujeres5['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Emiliano Zapata</th>
                    <td><?=$pilaresTotalesMujeres6['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Chimalpa</th>
                    <td><?=$pilaresTotalesMujeres7['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">San Simón Tolnáhuac </th>
                    <td><?=$pilaresTotalesMujeres8['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Frida Kahlo </th>
                    <td><?=$pilaresTotalesMujeres9['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Atlampa</th>
                    <td><?=$pilaresTotalesMujeres10['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Richard Wagner </th>
                    <td><?=$pilaresTotalesMujeres11['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Benita Galeana </th>
                    <td><?=$pilaresTotalesMujeres12['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Tlalpexco</th>
                    <td><?=$pilaresTotalesMujeres13['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">José Martí </th>
                    <td><?=$pilaresTotalesMujeres14['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Agrícola Pantitlán </th>
                    <td><?=$pilaresTotalesMujeres15['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Central de Abasto</th>
                    <td><?=$pilaresTotalesMujeres16['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Cooperemos Pueblo </th>
                    <td><?=$pilaresTotalesMujeres17['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Acahualtepec</th>
                    <td><?=$pilaresTotalesMujeres18['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Gabriela Mistral </th>
                    <td><?=$pilaresTotalesMujeres19['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Huayatla</th>
                    <td><?=$pilaresTotalesMujeres20['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Caneguín</th>
                    <td><?=$pilaresTotalesMujeres47['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">San Salvador Cuauhtenco</th>
                    <td><?=$pilaresTotalesMujeres21['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Zapotitla</th>
                    <td><?=$pilaresTotalesMujeres22['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Rosario Castellanos</th>
                    <td><?=$pilaresTotalesMujeres23['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Tulyehualco</th>
                    <td><?=$pilaresTotalesMujeres24['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">San Francisco </th>
                    <td><?=$pilaresTotalesMujeres25['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Belén de las flores</th>
                    <td><?=$pilaresTotalesMujeres26['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Margarita Maza de Juárez </th>
                    <td><?=$pilaresTotalesMujeres27['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Atlapulco </th>
                    <td><?=$pilaresTotalesMujeres28['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Santa Cecilia </th>
                    <td><?=$pilaresTotalesMujeres29['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Tepalcatlalpan</th>
                    <td><?=$pilaresTotalesMujeres30['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Cerro de la estrella </th>
                    <td><?=$pilaresTotalesMujeres31['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Facundo Cabral</th>
                    <td><?=$pilaresTotalesMujeres32['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">San lucas xochimanca </th>
                    <td><?=$pilaresTotalesMujeres33['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Zapata Vela </th>
                    <td><?=$pilaresTotalesMujeres34['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Insurgentes</th>
                    <td><?=$pilaresTotalesMujeres35['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Amantla</th>
                    <td><?=$pilaresTotalesMujeres36['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">La Cuesta </th>
                    <td><?=$pilaresTotalesMujeres37['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Tizimín</th>
                    <td><?=$pilaresTotalesMujeres38['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Ecoguardas</th>
                    <td><?=$pilaresTotalesMujeres39['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Árbol del conocimiento</th>
                    <td><?=$pilaresTotalesMujeres40['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Santa Fe</th>
                    <td><?=$pilaresTotalesMujeres41['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">La Era</th>
                    <td><?=$pilaresTotalesMujeres42['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Isidro Fabela</th>
                    <td><?=$pilaresTotalesMujeres43['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Villa Panamericana</th>
                    <td><?=$pilaresTotalesMujeres44['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Santa Úrsula</th>
                    <td><?=$pilaresTotalesMujeres45['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Paulo Freire</th>
                    <td><?=$pilaresTotalesMujeres46['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">San Pedro Xalpa</th>
                    <td><?=$pilaresTotalesMujeres48['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Xaltipac</th>
                    <td><?=$pilaresTotalesMujeres50['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Palmitas</th>
                    <td><?=$pilaresTotalesMujeres51['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Teotongo</th>
                    <td><?=$pilaresTotalesMujeres52['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Insurgentes</th>
                    <td><?=$pilaresTotalesMujeres53['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">La Fortaleza</th>
                    <td><?=$pilaresTotalesMujeres54['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Rojo Gómez</th>
                    <td><?=$pilaresTotalesMujeres55['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Municipio Libre</th>
                    <td><?=$pilaresTotalesMujeres56['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">San Pedro Actopan</th>
                    <td><?=$pilaresTotalesMujeres57['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">San Bartolomé Xicomulco</th>
                    <td><?=$pilaresTotalesMujeres58['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Centenario</th>
                    <td><?=$pilaresTotalesMujeres59['userPorPilares']?></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>

    <div class="col-xl-3 col-sm-6 mb-3">
      <div class="card text-info bg-light o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
            <i class="fas fa-transgender-alt"></i>
            </div>
            
            <div class="mr-5"><b>Usuarios totales por PILARES hombres<span class="float-right"></span></b></div>
          </div>
          <a class="card-footer text-info clearfix small z-1" data-toggle="collapse" href="#collapsePorPilaresHombres">
            <span class="float-left">Ver detalle</span>
            <span class="float-right">
              <i class="fas fa-angle-right"></i>
            </span>
          </a>
          <div class="collapse" id="collapsePorPilaresHombres">
            <div class="card card-body">
              <table class="table table-striped ">
                <tbody class="bg-light">
                <tr>
                    <th scope="row">La Araña </th>
                    <td><?=$pilaresTotalesHombres1['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">El Capulín</th>
                    <td><?=$pilaresTotalesHombres2['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Jalalpa </th>
                    <td><?=$pilaresTotalesHombres3['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Xalli</th>
                    <td><?=$pilaresTotalesHombres4['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Cantera</th>
                    <td><?=$pilaresTotalesHombres5['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Emiliano Zapata</th>
                    <td><?=$pilaresTotalesHombres6['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Chimalpa</th>
                    <td><?=$pilaresTotalesHombres7['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">San Simón Tolnáhuac </th>
                    <td><?=$pilaresTotalesHombres8['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Frida Kahlo </th>
                    <td><?=$pilaresTotalesHombres9['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Atlampa</th>
                    <td><?=$pilaresTotalesHombres10['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Richard Wagner </th>
                    <td><?=$pilaresTotalesHombres11['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Benita Galeana </th>
                    <td><?=$pilaresTotalesHombres12['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Tlalpexco</th>
                    <td><?=$pilaresTotalesHombres13['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">José Martí </th>
                    <td><?=$pilaresTotalesHombres14['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Agrícola Pantitlán </th>
                    <td><?=$pilaresTotalesHombres15['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Central de Abasto</th>
                    <td><?=$pilaresTotalesHombres16['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Cooperemos Pueblo </th>
                    <td><?=$pilaresTotalesHombres17['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Acahualtepec</th>
                    <td><?=$pilaresTotalesHombres18['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Gabriela Mistral </th>
                    <td><?=$pilaresTotalesHombres19['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Huayatla</th>
                    <td><?=$pilaresTotalesHombres20['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Caneguín</th>
                    <td><?=$pilaresTotalesHombres47['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">San Salvador Cuauhtenco</th>
                    <td><?=$pilaresTotalesHombres21['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Zapotitla</th>
                    <td><?=$pilaresTotalesHombres22['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Rosario Castellanos</th>
                    <td><?=$pilaresTotalesHombres23['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Tulyehualco</th>
                    <td><?=$pilaresTotalesHombres24['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">San Francisco </th>
                    <td><?=$pilaresTotalesHombres25['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Belén de las flores</th>
                    <td><?=$pilaresTotalesHombres26['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Margarita Maza de Juárez </th>
                    <td><?=$pilaresTotalesHombres27['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Atlapulco </th>
                    <td><?=$pilaresTotalesHombres28['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Santa Cecilia </th>
                    <td><?=$pilaresTotalesHombres29['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Tepalcatlalpan</th>
                    <td><?=$pilaresTotalesHombres30['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Cerro de la estrella </th>
                    <td><?=$pilaresTotalesHombres31['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Facundo Cabral</th>
                    <td><?=$pilaresTotalesHombres32['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">San lucas xochimanca </th>
                    <td><?=$pilaresTotalesHombres33['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Zapata Vela </th>
                    <td><?=$pilaresTotalesHombres34['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Insurgentes</th>
                    <td><?=$pilaresTotalesHombres35['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Amantla</th>
                    <td><?=$pilaresTotalesHombres36['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">La Cuesta </th>
                    <td><?=$pilaresTotalesHombres37['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Tizimín</th>
                    <td><?=$pilaresTotalesHombres38['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Ecoguardas</th>
                    <td><?=$pilaresTotalesHombres39['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Árbol del conocimiento</th>
                    <td><?=$pilaresTotalesHombres40['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Santa Fe</th>
                    <td><?=$pilaresTotalesHombres41['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">La Era</th>
                    <td><?=$pilaresTotalesHombres42['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Isidro Fabela</th>
                    <td><?=$pilaresTotalesHombres43['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Villa Panamericana</th>
                    <td><?=$pilaresTotalesHombres44['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Santa Úrsula</th>
                    <td><?=$pilaresTotalesHombres45['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Paulo Freire</th>
                    <td><?=$pilaresTotalesHombres46['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">San Pedro Xalpa</th>
                    <td><?=$pilaresTotalesHombres48['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Xaltipac</th>
                    <td><?=$pilaresTotalesHombres50['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Palmitas</th>
                    <td><?=$pilaresTotalesHombres51['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Teotongo</th>
                    <td><?=$pilaresTotalesHombres52['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Insurgentes</th>
                    <td><?=$pilaresTotalesHombres53['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">La Fortaleza</th>
                    <td><?=$pilaresTotalesHombres54['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Rojo Gómez</th>
                    <td><?=$pilaresTotalesHombres55['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Municipio Libre</th>
                    <td><?=$pilaresTotalesHombres56['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">San Pedro Actopan</th>
                    <td><?=$pilaresTotalesHombres57['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">San Bartolomé Xicomulco</th>
                    <td><?=$pilaresTotalesHombres58['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Centenario</th>
                    <td><?=$pilaresTotalesHombres59['userPorPilares']?></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>
  </div>

  <!-- Usuarios por Actividades Cards-->
  <!--<div class="row">
    <div class="col-xl-6 col-sm-6 mb-3">
      <div class="card text-white bg-primary o-hidden h-100">
        <div class="card-body">
          <div class="card-body-icon">
            <i class="fas fa-fw fa-music"></i>
          </div>
          
          <div class="mr-5"><b>Usuarios inscritos en Cultura <span class="float-right"> Total <?=$culturaTotales['userPorActividad']?></span></b></div>
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
                  <th scope="row">Ballet</th>
                  <td><?=$ballet['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Danza</th>
                  <td><?=$danza['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Danza Jazz</th>
                  <td><?=$danzaJazz['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Iniciación al canto</th>
                  <td><?=$iniciacionCanto['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Belly Dance</th>
                  <td><?=$bellyDance['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Fotografía</th>
                  <td><?=$fotografia['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Acercamiento al Circo</th>
                  <td><?=$acercamientoAlCirco['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Medio ambiente</th>
                  <td><?=$medioAmbiente['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Fotografía Digital</th>
                  <td><?=$fotografiaDigital['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Libroclub</th>
                  <td><?=$libroClub['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Experimentación Gráfica</th>
                  <td><?=$experimentacionGrafica['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Cinema PILARES</th>
                  <td><?=$cinemaPilares['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Baile Social</th>
                  <td><?=$baileSocial['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Danza para niños</th>
                  <td><?=$danzaNiños['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Danza para adultos</th>
                  <td><?=$danzaAdultos['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Danza folklórica</th>
                  <td><?=$folklorica['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Actuación</th>
                  <td><?=$actuacion['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Teatro de calle</th>
                  <td><?=$teatroCalle['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Danza contemporánea</th>
                  <td><?=$contemporanea['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Danza polinesia</th>
                  <td><?=$polinesia['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Teatro de máscaras</th>
                  <td><?=$mascaras['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Expresión corporal y teatro</th>
                  <td><?=$expresion['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Telar de cintura</th>
                  <td><?=$telar['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Cartonería</th>
                  <td><?=$cartoneria['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Bordado para la vida</th>
                  <td><?=$bordado['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Construcción artesanal de instrumentos</th>
                  <td><?=$construccion['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Diseño de juguetes de madera y materiales de</th>
                  <td><?=$diseñoJuguetes['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Reciclaje y medio ambiente</th>
                  <td><?=$reciclajeAmb['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Escritura creativa</th>
                  <td><?=$escritura['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Pintura artística</th>
                  <td><?=$pinturaArt['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Medios Audiovisuales </th>
                  <td><?=$audioVisual['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Cine</th>
                  <td><?=$cine['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Animación para niños</th>
                  <td><?=$animacionNiños['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Vídeo comunitario</th>
                  <td><?=$videoComunitario['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Guitarra clásica</th>
                  <td><?=$guitarra['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Música Rap</th>
                  <td><?=$rap['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Percusiones</th>
                  <td><?=$percusiones['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Iniciación a la música</th>
                  <td><?=$iniciacion['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Son Huasteco</th>
                  <td><?=$sonHuasteco['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Dibujo y grabado</th>
                  <td><?=$grabado['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Clown</th>
                  <td><?=$clown['userPorActividad']?></td>
                </tr>

                <tr>
                  <th scope="row">Modelado con plastilina</th>
                  <td><?=$modeladoPlastilina['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Libro Club</th>
                  <td><?=$libroClub['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Literatura</th>
                  <td><?=$literatura['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Salsa Cubana</th>
                  <td><?=$salsaCubana['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Encuardernación</th>
                  <td><?=$encuadernacion['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Arte y creatividad</th>
                  <td><?=$arteCreatividad['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Arte y Ciencia</th>
                  <td><?=$arteCiencia['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Transformaciones colaborativas</th>
                  <td><?=$transformaciones['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Meditación creativa</th>
                  <td><?=$meditacion['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Vitrales</th>
                  <td><?=$vitrales['userPorActividad']?></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-3">
      <div class="card text-white bg-primary o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
            <i class="fas fa-transgender-alt"></i>
            </div>
            
            <div class="mr-5"><b>Usuarios inscritos en Cultura mujeres <span class="float-right"> Total <?=$culturaTotalesMujeres['userPorActividad']?></span></b></div>
          </div>
          <a class="card-footer text-white clearfix small z-1" data-toggle="collapse" href="#collapseCulturaMujeres">
            <span class="float-left">Ver detalle</span>
            <span class="float-right">
              <i class="fas fa-angle-right"></i>
            </span>
          </a>
          <div class="collapse" id="collapseCulturaMujeres">
            <div class="card card-body">
              <table class="table table-striped ">
                <tbody class="bg-primary">
                <tr>
                  <th scope="row">Ballet</th>
                  <td><?=$balletMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Danza</th>
                  <td><?=$danzaMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Danza Jazz</th>
                  <td><?=$danzaJazzMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Iniciación al canto</th>
                  <td><?=$iniciacionCantoMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Belly Dance</th>
                  <td><?=$bellyDanceMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Fotografía</th>
                  <td><?=$fotografiaMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Acercamiento al Circo</th>
                  <td><?=$acercamientoAlCircoMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Medio ambiente</th>
                  <td><?=$medioAmbienteMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Fotografía Digital</th>
                  <td><?=$fotografiaDigitalMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Libroclub</th>
                  <td><?=$libroClubMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Experimentación Gráfica</th>
                  <td><?=$experimentacionGraficaMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Cinema PILARES</th>
                  <td><?=$cinemaPilaresMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Baile Social</th>
                  <td><?=$baileSocialMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Danza para niños</th>
                  <td><?=$danzaNiñosMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Danza para adultos</th>
                  <td><?=$danzaAdultosMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Danza folklórica</th>
                  <td><?=$folkloricaMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Actuación</th>
                  <td><?=$actuacionMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Teatro de calle</th>
                  <td><?=$teatroCalleMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Danza contemporánea</th>
                  <td><?=$contemporaneaMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Danza polinesia</th>
                  <td><?=$polinesiaMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Teatro de máscaras</th>
                  <td><?=$mascarasMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Expresión corporal y teatro</th>
                  <td><?=$expresionMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Telar de cintura</th>
                  <td><?=$telarMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Cartonería</th>
                  <td><?=$cartoneriaMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Bordado para la vida</th>
                  <td><?=$bordadoMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Construcción artesanal de instrumentos</th>
                  <td><?=$construccionMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Diseño de juguetes de madera y materiales de</th>
                  <td><?=$diseñoJuguetesMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Reciclaje y medio ambiente</th>
                  <td><?=$reciclajeAmbMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Escritura creativa</th>
                  <td><?=$escrituraMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Pintura artística</th>
                  <td><?=$pinturaArtMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Medios Audiovisuales </th>
                  <td><?=$audioVisualMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Cine</th>
                  <td><?=$cineMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Animación para niños</th>
                  <td><?=$animacionNiñosMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Vídeo comunitario</th>
                  <td><?=$videoComunitarioMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Guitarra clásica</th>
                  <td><?=$guitarraMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Música Rap</th>
                  <td><?=$rapMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Percusiones</th>
                  <td><?=$percusionesMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Iniciación a la música</th>
                  <td><?=$iniciacionMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Son Huasteco</th>
                  <td><?=$sonHuastecoMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Dibujo y grabado</th>
                  <td><?=$grabadoMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Clown</th>
                  <td><?=$clownMujeres['userPorActividad']?></td>
                </tr>

                <tr>
                  <th scope="row">Modelado con plastilina</th>
                  <td><?=$modeladoPlastilinaMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Libro Club</th>
                  <td><?=$libroClubMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Literatura</th>
                  <td><?=$literaturaMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Salsa Cubana</th>
                  <td><?=$salsaCubanaMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Encuardernación</th>
                  <td><?=$encuadernacionMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Arte y creatividad</th>
                  <td><?=$arteCreatividadMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Arte y Ciencia</th>
                  <td><?=$arteCienciaMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Transformaciones colaborativas</th>
                  <td><?=$transformacionesMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Meditación creativa</th>
                  <td><?=$meditacionMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Vitrales</th>
                  <td><?=$vitralesMujeres['userPorActividad']?></td>
                </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-3">
      <div class="card text-white bg-primary o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
            <i class="fas fa-transgender-alt"></i>
            </div>
            
            <div class="mr-5"><b>Usuarios inscritos en Cultura hombres<span class="float-right"> Total <?=$culturaTotalesHombres['userPorActividad']?></span></b></div>
          </div>
          <a class="card-footer text-white clearfix small z-1" data-toggle="collapse" href="#collapseCulturaHombres">
            <span class="float-left">Ver detalle</span>
            <span class="float-right">
              <i class="fas fa-angle-right"></i>
            </span>
          </a>
          <div class="collapse" id="collapseCulturaHombres">
            <div class="card card-body">
              <table class="table table-striped ">
                <tbody class="bg-primary">
                <tr>
                  <th scope="row">Ballet</th>
                  <td><?=$balletHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Danza</th>
                  <td><?=$danzaHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Danza Jazz</th>
                  <td><?=$danzaJazzHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Iniciación al canto</th>
                  <td><?=$iniciacionCantoHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Belly Dance</th>
                  <td><?=$bellyDanceHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Fotografía</th>
                  <td><?=$fotografiaHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Acercamiento al Circo</th>
                  <td><?=$acercamientoAlCircoHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Medio ambiente</th>
                  <td><?=$medioAmbienteHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Fotografía Digital</th>
                  <td><?=$fotografiaDigitalHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Libroclub</th>
                  <td><?=$libroClubHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Experimentación Gráfica</th>
                  <td><?=$experimentacionGraficaHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Cinema PILARES</th>
                  <td><?=$cinemaPilaresHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Baile Social</th>
                  <td><?=$baileSocialHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Danza para niños</th>
                  <td><?=$danzaNiñosHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Danza para adultos</th>
                  <td><?=$danzaAdultosHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Danza folklórica</th>
                  <td><?=$folkloricaHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Actuación</th>
                  <td><?=$actuacionHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Teatro de calle</th>
                  <td><?=$teatroCalleHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Danza contemporánea</th>
                  <td><?=$contemporaneaHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Danza polinesia</th>
                  <td><?=$polinesiaHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Teatro de máscaras</th>
                  <td><?=$mascarasHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Expresión corporal y teatro</th>
                  <td><?=$expresionHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Telar de cintura</th>
                  <td><?=$telarHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Cartonería</th>
                  <td><?=$cartoneriaHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Bordado para la vida</th>
                  <td><?=$bordadoHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Construcción artesanal de instrumentos</th>
                  <td><?=$construccionHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Diseño de juguetes de madera y materiales de</th>
                  <td><?=$diseñoJuguetesHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Reciclaje y medio ambiente</th>
                  <td><?=$reciclajeAmbHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Escritura creativa</th>
                  <td><?=$escrituraHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Pintura artística</th>
                  <td><?=$pinturaArtHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Medios Audiovisuales </th>
                  <td><?=$audioVisualHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Cine</th>
                  <td><?=$cineHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Animación para niños</th>
                  <td><?=$animacionNiñosHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Vídeo comunitario</th>
                  <td><?=$videoComunitarioHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Guitarra clásica</th>
                  <td><?=$guitarraHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Música Rap</th>
                  <td><?=$rapHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Percusiones</th>
                  <td><?=$percusionesHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Iniciación a la música</th>
                  <td><?=$iniciacionHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Son Huasteco</th>
                  <td><?=$sonHuastecoHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Dibujo y grabado</th>
                  <td><?=$grabadoHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Clown</th>
                  <td><?=$clownHombres['userPorActividad']?></td>
                </tr>

                <tr>
                  <th scope="row">Modelado con plastilina</th>
                  <td><?=$modeladoPlastilinaHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Libro Club</th>
                  <td><?=$libroClubHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Literatura</th>
                  <td><?=$literaturaHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Salsa Cubana</th>
                  <td><?=$salsaCubanaHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Encuardernación</th>
                  <td><?=$encuadernacionHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Arte y creatividad</th>
                  <td><?=$arteCreatividadHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Arte y Ciencia</th>
                  <td><?=$arteCienciaHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Transformaciones colaborativas</th>
                  <td><?=$transformacionesHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Meditación creativa</th>
                  <td><?=$meditacionHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Vitrales</th>
                  <td><?=$vitralesHombres['userPorActividad']?></td>
                </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>
  </div>

  <div class="row">
    <div class="col-xl-6 col-sm-6 mb-3">
      <div class="card text-white bg-warning o-hidden h-100">
        <div class="card-body">
          <div class="card-body-icon">
            <i class="fas fa-fw fa-list"></i>
          </div>
          <div class="mr-5"><b>Usuarios inscritos en Ciberescuelas <span class="float-right">Total <?=$ciberEscuelaTotales['userPorActividad']?></span></b></div>
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
                  <th scope="row">Ajedrez</th>
                  <td><?=$ajedrez['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Edición y Diseño</th>
                  <td><?=$edicionYdiseno['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Club de Ciencias</th>
                  <td><?=$clubCiencia['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Robótica aplicada</th>
                  <td><?=$robo['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Club de código (para niñas y niños)</th>
                  <td><?=$clubCodigo['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Amor y sexualidad</th>
                  <td><?=$amor['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Prevención de adicc</th>
                  <td><?=$prevenAdic['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Habilidades para la</th>
                  <td><?=$habilidades['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Proyecto de vida</th>
                  <td><?=$proyecto['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Sembrando autoestima</th>
                  <td><?=$autoestima['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Los duelos duelen ... tanatología y manejo del duelo</th>
                  <td><?=$tanato['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Inteligencia emocional y habilidades para la vida</th>
                  <td><?=$inteliEmo['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Recuperando mí libertad</th>
                  <td><?=$recuperandoMiLibertad['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Comprendiendo la adolescencia</th>
                  <td><?=$comprendiendoAdolescencia['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Comprendiendo la niñez</th>
                  <td><?=$comprendiendoNinez['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Es un placer conocerme</th>
                  <td><?=$conocerme['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Conversatorios</th>
                  <td><?=$conversatorios['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Autosanarte</th>
                  <td><?=$autosanarme['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Danzante mente</th>
                  <td><?=$danzanteMente['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Artística-mente</th>
                  <td><?=$arteEmo['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Club de letras y expresión</th>
                  <td><?=$redaccion['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Talleres de cómputo</th>
                  <td><?=$talleresCom['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Emociones lúdicas</th>
                  <td><?=$emoMagic['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Pintando emociones</th>
                  <td><?=$pintEmo['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Alfabetización</th>
                  <td><?=$alfabet['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Primaria</th>
                  <td><?=$primaria['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Secundaria</th>
                  <td><?=$secundaria['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">BADI</th>
                  <td><?=$badi['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Prepa en línea SEP</th>
                  <td><?=$prepaSep['userPorActividad']?></td>
                </tr>
               
                <tr>
                  <th scope="row">UnADM</th>
                  <td><?=$unadm['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Licenciatura en linea</th>
                  <td><?=$liclinea['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Licenciaturas CDMX</th>
                  <td><?=$licCdmx['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Asesorias primaria</th>
                  <td><?=$asePrimaria['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Asesorias secundaria</th>
                  <td><?=$aseSecundaria['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Asesorias bachillerato</th>
                  <td><?=$asePrep['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Asesorias licenciatura</th>
                  <td><?=$aseLic['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Baile, cuerpo y emociones</th>
                  <td><?=$baileCuerpo['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Club de Braile</th>
                  <td><?=$braile['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Computación con tecnologías de asistencia para personas ciegas</th>
                  <td><?=$computacionAsistida['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Club de lengua de señas mexicana</th>
                  <td><?=$senas['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Clase de estenografía</th>
                  <td><?=$estenografia['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Club de Inclusión y sensibilización sensorial</th>
                  <td><?=$clubSensorial['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Cultura sorda</th>
                  <td><?=$culturaSorda['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Expresión corporal y danza inclusiva</th>
                  <td><?=$expresionCorporal['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Charlando sobre la diversidad sexual</th>
                  <td><?=$diversidadSexual['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Arte inclusivo</th>
                  <td><?=$arteInclusivo['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Cursos para el aprendizaje de la lengua náhuatl</th>
                  <td><?=$talleresNahuatl['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Identidad y cultura de los pueblos indígenas y originarios</th>
                  <td><?=$identidadOriginaria['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Talleres de interculturalidad</th>
                  <td><?=$talleresInterculturalidad['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Revitalización de lenguas originarias</th>
                  <td><?=$revitalizacionLenguas['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Conocimientos y saberes de mi comunidad</th>
                  <td><?=$saberesComunidad['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Biodiversidad y territorio</th>
                  <td><?=$biodiversidad['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Derechos humanos</th>
                  <td><?=$derechoshumanos['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Derechos de los pueblos indígenas</th>
                  <td><?=$derechosIndigenas['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Feminismo comunitario</th>
                  <td><?=$feminismoComunitario['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Alfabetización a población indígena</th>
                  <td><?=$alfabetizacionIndigena['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Gestión, canalización y seguimiento a población indígena</th>
                  <td><?=$seguimientoIndigena['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Migrantes y refugiados</th>
                  <td><?=$migrantes['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Alfabetización a población migrante</th>
                  <td><?=$alfabetizacionmigrantes['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Asesorías educativas a población migrante</th>
                  <td><?=$asesoriasmigrantes['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Gestión, canalización y seguimiento a población migrante</th>
                  <td><?=$seguimientomigrantes['userPorActividad']?></td>
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
            <i class="fas fa-transgender-alt"></i>
            </div>
            
            <div class="mr-5"><b>Usuarios inscritos en Ciberescuela mujeres <span class="float-right">Total <?=$ciberEscuelaTotalesMujeres['userPorActividad']?></span></b></div>
          </div>
          <a class="card-footer text-white clearfix small z-1" data-toggle="collapse" href="#collapseCiberescuelasMujeres">
            <span class="float-left">Ver detalle</span>
            <span class="float-right">
              <i class="fas fa-angle-right"></i>
            </span>
          </a>
          <div class="collapse" id="collapseCiberescuelasMujeres">
            <div class="card card-body">
              <table class="table table-striped ">
                <tbody class="bg-warning">
                <tr>
                  <th scope="row">Ajedrez</th>
                  <td><?=$ajedrezMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Edición y Diseño</th>
                  <td><?=$edicionYdisenoMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Club de Ciencias</th>
                  <td><?=$clubCienciaMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Robótica aplicada</th>
                  <td><?=$roboMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Club de código (para niñas y niños)</th>
                  <td><?=$clubCodigoMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Amor y sexualidad</th>
                  <td><?=$amorMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Prevención de adicc</th>
                  <td><?=$prevenAdicMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Habilidades para la</th>
                  <td><?=$habilidadesMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Proyecto de vida</th>
                  <td><?=$proyectoMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Sembrando autoestima</th>
                  <td><?=$autoestimaMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Los duelos duelen ... tanatología y manejo del duelo</th>
                  <td><?=$tanatoMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Inteligencia emocional y habilidades para la vida</th>
                  <td><?=$inteliEmoMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Recuperando mí libertad</th>
                  <td><?=$recuperandoMiLibertadMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Comprendiendo la adolescencia</th>
                  <td><?=$comprendiendoAdolescenciaMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Comprendiendo la niñez</th>
                  <td><?=$comprendiendoNinezMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Es un placer conocerme</th>
                  <td><?=$conocermeMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Conversatorios</th>
                  <td><?=$conversatoriosMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Autosanarte</th>
                  <td><?=$autosanarmeMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Danzante mente</th>
                  <td><?=$danzanteMenteMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Artística-mente</th>
                  <td><?=$arteEmoMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Club de letras y expresión</th>
                  <td><?=$redaccionMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Talleres de cómputo</th>
                  <td><?=$talleresComMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Emociones lúdicas</th>
                  <td><?=$emoMagicMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Pintando emociones</th>
                  <td><?=$pintEmoMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Alfabetización</th>
                  <td><?=$alfabetMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Primaria</th>
                  <td><?=$primariaMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Secundaria</th>
                  <td><?=$secundariaMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">BADI</th>
                  <td><?=$badiMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Prepa en línea SEP</th>
                  <td><?=$prepaSepMujeres['userPorActividad']?></td>
                </tr>
               
                <tr>
                  <th scope="row">UnADM</th>
                  <td><?=$unadmMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Licenciatura en linea</th>
                  <td><?=$liclineaMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Licenciaturas CDMX</th>
                  <td><?=$licCdmxMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Asesorias primaria</th>
                  <td><?=$asePrimariaMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Asesorias secundaria</th>
                  <td><?=$aseSecundariaMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Asesorias bachillerato</th>
                  <td><?=$asePrepMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Asesorias licenciatura</th>
                  <td><?=$aseLicMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Baile, cuerpo y emociones</th>
                  <td><?=$baileCuerpoMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Club de Braile</th>
                  <td><?=$braileMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Computación con tecnologías de asistencia para personas ciegas</th>
                  <td><?=$computacionAsistidaMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Club de lengua de señas mexicana</th>
                  <td><?=$senasMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Clase de estenografía</th>
                  <td><?=$estenografiaMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Club de Inclusión y sensibilización sensorial</th>
                  <td><?=$clubSensorialMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Cultura sorda</th>
                  <td><?=$culturaSordaMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Expresión corporal y danza inclusiva</th>
                  <td><?=$expresionCorporalMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Charlando sobre la diversidad sexual</th>
                  <td><?=$diversidadSexualMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Arte inclusivo</th>
                  <td><?=$arteInclusivoMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Cursos para el aprendizaje de la lengua náhuatl</th>
                  <td><?=$talleresNahuatlMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Identidad y cultura de los pueblos indígenas y originarios</th>
                  <td><?=$identidadOriginariaMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Talleres de interculturalidad</th>
                  <td><?=$talleresInterculturalidadMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Revitalización de lenguas originarias</th>
                  <td><?=$revitalizacionLenguasMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Conocimientos y saberes de mi comunidad</th>
                  <td><?=$saberesComunidadMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Biodiversidad y territorio</th>
                  <td><?=$biodiversidadMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Derechos humanos</th>
                  <td><?=$derechoshumanosMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Derechos de los pueblos indígenas</th>
                  <td><?=$derechosIndigenasMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Feminismo comunitario</th>
                  <td><?=$feminismoComunitarioMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Alfabetización a población indígena</th>
                  <td><?=$alfabetizacionIndigenaMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Gestión, canalización y seguimiento a población indígena</th>
                  <td><?=$seguimientoIndigenaMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Migrantes y refugiados</th>
                  <td><?=$migrantesMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Alfabetización a población migrante</th>
                  <td><?=$alfabetizacionmigrantesMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Asesorías educativas a población migrante</th>
                  <td><?=$asesoriasmigrantesMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Gestión, canalización y seguimiento a población migrante</th>
                  <td><?=$seguimientomigrantesMujeres['userPorActividad']?></td>
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
            <i class="fas fa-transgender-alt"></i>
            </div>
            
            <div class="mr-5"><b>Usuarios inscritos en Ciberescuela hombres<span class="float-right">Total <?=$ciberEscuelaTotalesHombres['userPorActividad']?></span></b></div>
          </div>
          <a class="card-footer text-white clearfix small z-1" data-toggle="collapse" href="#collapseCiberescuelasHombres">
            <span class="float-left">Ver detalle</span>
            <span class="float-right">
              <i class="fas fa-angle-right"></i>
            </span>
          </a>
          <div class="collapse" id="collapseCiberescuelasHombres">
            <div class="card card-body">
              <table class="table table-striped ">
                <tbody class="bg-warning">
                <tr>
                  <th scope="row">Ajedrez</th>
                  <td><?=$ajedrezHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Edición y Diseño</th>
                  <td><?=$edicionYdisenoHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Club de Ciencias</th>
                  <td><?=$clubCienciaHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Robótica aplicada</th>
                  <td><?=$roboHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Club de código (para niñas y niños)</th>
                  <td><?=$clubCodigoHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Amor y sexualidad</th>
                  <td><?=$amorHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Prevención de adicc</th>
                  <td><?=$prevenAdicHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Habilidades para la</th>
                  <td><?=$habilidadesHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Proyecto de vida</th>
                  <td><?=$proyectoHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Sembrando autoestima</th>
                  <td><?=$autoestimaHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Los duelos duelen ... tanatología y manejo del duelo</th>
                  <td><?=$tanatoHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Inteligencia emocional y habilidades para la vida</th>
                  <td><?=$inteliEmoHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Recuperando mí libertad</th>
                  <td><?=$recuperandoMiLibertadHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Comprendiendo la adolescencia</th>
                  <td><?=$comprendiendoAdolescenciaHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Comprendiendo la niñez</th>
                  <td><?=$comprendiendoNinezHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Es un placer conocerme</th>
                  <td><?=$conocermeHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Conversatorios</th>
                  <td><?=$conversatoriosHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Autosanarte</th>
                  <td><?=$autosanarmeHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Danzante mente</th>
                  <td><?=$danzanteMenteHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Artística-mente</th>
                  <td><?=$arteEmoHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Club de letras y expresión</th>
                  <td><?=$redaccionHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Talleres de cómputo</th>
                  <td><?=$talleresComHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Emociones lúdicas</th>
                  <td><?=$emoMagicHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Pintando emociones</th>
                  <td><?=$pintEmoHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Alfabetización</th>
                  <td><?=$alfabetHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Primaria</th>
                  <td><?=$primariaHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Secundaria</th>
                  <td><?=$secundariaHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">BADI</th>
                  <td><?=$badiHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Prepa en línea SEP</th>
                  <td><?=$prepaSepHombres['userPorActividad']?></td>
                </tr>
              
                <tr>
                  <th scope="row">UnADM</th>
                  <td><?=$unadmHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Licenciatura en linea</th>
                  <td><?=$liclineaHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Licenciaturas CDMX</th>
                  <td><?=$licCdmxHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Asesorias primaria</th>
                  <td><?=$asePrimariaHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Asesorias secundaria</th>
                  <td><?=$aseSecundariaHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Asesorias bachillerato</th>
                  <td><?=$asePrepHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Asesorias licenciatura</th>
                  <td><?=$aseLicHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Baile, cuerpo y emociones</th>
                  <td><?=$baileCuerpoHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Club de Braile</th>
                  <td><?=$braileHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Computación con tecnologías de asistencia para personas ciegas</th>
                  <td><?=$computacionAsistidaHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Club de lengua de señas mexicana</th>
                  <td><?=$senasHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Clase de estenografía</th>
                  <td><?=$estenografiaHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Club de Inclusión y sensibilización sensorial</th>
                  <td><?=$clubSensorialHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Cultura sorda</th>
                  <td><?=$culturaSordaHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Expresión corporal y danza inclusiva</th>
                  <td><?=$expresionCorporalHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Charlando sobre la diversidad sexual</th>
                  <td><?=$diversidadSexualHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Arte inclusivo</th>
                  <td><?=$arteInclusivoHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Cursos para el aprendizaje de la lengua náhuatl</th>
                  <td><?=$talleresNahuatlHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Identidad y cultura de los pueblos indígenas y originarios</th>
                  <td><?=$identidadOriginariaHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Talleres de interculturalidad</th>
                  <td><?=$talleresInterculturalidadHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Revitalización de lenguas originarias</th>
                  <td><?=$revitalizacionLenguasHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Conocimientos y saberes de mi comunidad</th>
                  <td><?=$saberesComunidadHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Biodiversidad y territorio</th>
                  <td><?=$biodiversidadHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Derechos humanos</th>
                  <td><?=$derechoshumanosHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Derechos de los pueblos indígenas</th>
                  <td><?=$derechosIndigenasHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Feminismo comunitario</th>
                  <td><?=$feminismoComunitarioHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Alfabetización a población indígena</th>
                  <td><?=$alfabetizacionIndigenaHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Gestión, canalización y seguimiento a población indígena</th>
                  <td><?=$seguimientoIndigenaHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Migrantes y refugiados</th>
                  <td><?=$migrantesHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Alfabetización a población migrante</th>
                  <td><?=$alfabetizacionmigrantesHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Asesorías educativas a población migrante</th>
                  <td><?=$asesoriasmigrantesHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Gestión, canalización y seguimiento a población migrante</th>
                  <td><?=$seguimientomigrantesHombres['userPorActividad']?></td>
                </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>
  </div>

  <div class="row">
    <div class="col-xl-6 col-sm-6 mb-3">
      <div class="card text-white bg-success o-hidden h-100">
        <div class="card-body">
          <div class="card-body-icon">
            <i class="fas fa-fw fa-running"></i>
          </div>
          <div class="mr-5"><b>Usuarios inscritos en Deporte <span class="float-right">Total <?=$deporteTotales['userPorActividad']?></span></b></div>
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
                  <th scope="row">Fútbol</th>
                  <td><?=$futbol['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Basquetbol</th>
                  <td><?=$basquet['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Voleibol</th>
                  <td><?=$voley['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Acondicionamiento físico</th>
                  <td><?=$acondicionamiento['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Zumba</th>
                  <td><?=$zumba['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Tae bo</th>
                  <td><?=$tae['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Yoga</th>
                  <td><?=$yoga['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Tai chi</th>
                  <td><?=$taiChi['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Ritmos Latinos</th>
                  <td><?=$ritmosLatinos['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Boxeo</th>
                  <td><?=$boxeo['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Atletismo</th>
                  <td><?=$atletismo['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Karate do</th>
                  <td><?=$karate['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Kung fu</th>
                  <td><?=$kung['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Taekwondo</th>
                  <td><?=$taekwondo['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Capoeira</th>
                  <td><?=$capoeira['userPorActividad']?></td>
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
            <i class="fas fa-transgender-alt"></i>
            </div>
            
            <div class="mr-5"><b>Usuarios inscritos en Deporte mujeres <span class="float-right">Total <?=$deporteTotalesMujeres['userPorActividad']?></span></b></div>
          </div>
          <a class="card-footer text-white clearfix small z-1" data-toggle="collapse" href="#collapseDeporteMujeres">
            <span class="float-left">Ver detalle</span>
            <span class="float-right">
              <i class="fas fa-angle-right"></i>
            </span>
          </a>
          <div class="collapse" id="collapseDeporteMujeres">
            <div class="card card-body">
              <table class="table table-striped ">
                <tbody class="bg-success">
                <tr>
                  <th scope="row">Fútbol</th>
                  <td><?=$futbolMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Basquetbol</th>
                  <td><?=$basquetMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Voleibol</th>
                  <td><?=$voleyMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Acondicionamiento físico</th>
                  <td><?=$acondicionamientoMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Zumba</th>
                  <td><?=$zumbaMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Tae bo</th>
                  <td><?=$taeMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Yoga</th>
                  <td><?=$yogaMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Tai chi</th>
                  <td><?=$taiChiMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Ritmos Latinos</th>
                  <td><?=$ritmosLatinosMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Boxeo</th>
                  <td><?=$boxeoMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Atletismo</th>
                  <td><?=$atletismoMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Karate do</th>
                  <td><?=$karateMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Kung fu</th>
                  <td><?=$kungMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Taekwondo</th>
                  <td><?=$taekwondoMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Capoeira</th>
                  <td><?=$capoeiraMujeres['userPorActividad']?></td>
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
            <i class="fas fa-transgender-alt"></i>
            </div>
            
            <div class="mr-5"><b>Usuarios inscritos en Deporte hombres<span class="float-right">Total <?=$deporteTotalesHombres['userPorActividad']?></span></b></div>
          </div>
          <a class="card-footer text-white clearfix small z-1" data-toggle="collapse" href="#collapseDeporteHombres">
            <span class="float-left">Ver detalle</span>
            <span class="float-right">
              <i class="fas fa-angle-right"></i>
            </span>
          </a>
          <div class="collapse" id="collapseDeporteHombres">
            <div class="card card-body">
              <table class="table table-striped ">
                <tbody class="bg-success">
                <tr>
                  <th scope="row">Fútbol</th>
                  <td><?=$futbolHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Basquetbol</th>
                  <td><?=$basquetHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Voleibol</th>
                  <td><?=$voleyHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Acondicionamiento físico</th>
                  <td><?=$acondicionamientoHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Zumba</th>
                  <td><?=$zumbaHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Tae bo</th>
                  <td><?=$taeHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Yoga</th>
                  <td><?=$yogaHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Tai chi</th>
                  <td><?=$taiChiHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Ritmos Latinos</th>
                  <td><?=$ritmosLatinosHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Boxeo</th>
                  <td><?=$boxeoHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Atletismo</th>
                  <td><?=$atletismoHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Karate do</th>
                  <td><?=$karateHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Kung fu</th>
                  <td><?=$kungHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Taekwondo</th>
                  <td><?=$taekwondoHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Capoeira</th>
                  <td><?=$capoeiraHombres['userPorActividad']?></td>
                </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>
  </div> 

  <div class="row">
    <div class="col-xl-6 col-sm-6 mb-3">
      <div class="card text-white bg-danger o-hidden h-100">
        <div class="card-body">
          <div class="card-body-icon">
            <i class="fas fa-fw fa-hand-holding-usd"></i>
          </div>
          <div class="mr-5"><b>Usuarios inscritos en Autonomía Económica <span class="float-right">Total <?=$autonomiaTotales['userPorActividad']?></span></b></div>
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
                  <th scope="row">Serigrafía</th>
                  <td><?=$serigrafia['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Reciclaje</th>
                  <td><?=$reciclaje['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Empaque y embalaje</th>
                  <td><?=$empaqueEmbalaje['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Sistema de distribución</th>
                  <td><?=$sistemaDistribucion['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Edición y Diseño </th>
                  <td><?=$edicionDiseño['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Carpintería</th>
                  <td><?=$carpinteria['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Plomería</th>
                  <td><?=$plomeria['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Herrería</th>
                  <td><?=$herreria['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Electricidad</th>
                  <td><?=$electricidad['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Gastronomía, panadería y banquetes</th>
                  <td><?=$gastronomia['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Joyería y accesorios </th>
                  <td><?=$joyeria['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Huertos urbanos</th>
                  <td><?=$agricultura['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Diseño de imagen y Cosmetología orgánica</th>
                  <td><?=$diseñoImagen['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Codigo para mujeres</th>
                  <td><?=$codMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Electrónica y robótica</th>
                  <td><?=$electronica['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Textiles y diseño</th>
                  <td><?=$textileDiseño['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Fotografia de producto</th>
                  <td><?=$fotoProducto['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Logos e identidad de marca</th>
                  <td><?=$logos['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Calidad en el servicio</th>
                  <td><?=$calidad['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Creación de cooperativas</th>
                  <td><?=$cooperativas['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Emprendimiento</th>
                  <td><?=$emprende['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Creación de micro-negocios</th>
                  <td><?=$microN['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Comercio digital</th>
                  <td><?=$comercioDigital['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Estrategias de venta</th>
                  <td><?=$estrategias['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Comercio justo</th>
                  <td><?=$comercioJusto['userPorActividad']?></td>
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
            <i class="fas fa-transgender-alt"></i>
            </div>
            
            <div class="mr-5"><b>Usuarios inscritos en Autonomía Económica mujeres <span class="float-right">Total <?=$autonomiaTotalesMujeres['userPorActividad']?></span></b></div>
          </div>
          <a class="card-footer text-white clearfix small z-1" data-toggle="collapse" href="#collapseAutonomiaMujeres">
            <span class="float-left">Ver detalle</span>
            <span class="float-right">
              <i class="fas fa-angle-right"></i>
            </span>
          </a>
          <div class="collapse" id="collapseAutonomiaMujeres">
            <div class="card card-body">
              <table class="table table-striped ">
                <tbody class="bg-danger">
                <tr>
                  <th scope="row">Serigrafía</th>
                  <td><?=$serigrafiaMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Reciclaje</th>
                  <td><?=$reciclajeMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Empaque y embalaje</th>
                  <td><?=$empaqueEmbalajeMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Sistema de distribución</th>
                  <td><?=$sistemaDistribucionMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Edición y Diseño </th>
                  <td><?=$edicionDiseñoMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Carpintería</th>
                  <td><?=$carpinteriaMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Plomería</th>
                  <td><?=$plomeriaMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Herrería</th>
                  <td><?=$herreriaMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Electricidad</th>
                  <td><?=$electricidadMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Gastronomía, panadería y banquetes</th>
                  <td><?=$gastronomiaMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Joyería y accesorios </th>
                  <td><?=$joyeriaMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Huertos urbanos</th>
                  <td><?=$agriculturaMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Diseño de imagen y Cosmetología orgánica</th>
                  <td><?=$diseñoImagenMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Codigo para mujeres</th>
                  <td><?=$codMujeresMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Electrónica y robótica</th>
                  <td><?=$electronicaMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Textiles y diseño</th>
                  <td><?=$textileDiseñoMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Fotografia de producto</th>
                  <td><?=$fotoProductoMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Logos e identidad de marca</th>
                  <td><?=$logosMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Calidad en el servicio</th>
                  <td><?=$calidadMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Creación de cooperativas</th>
                  <td><?=$cooperativasMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Emprendimiento</th>
                  <td><?=$emprendeMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Creación de micro-negocios</th>
                  <td><?=$microNMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Comercio digital</th>
                  <td><?=$comercioDigitalMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Estrategias de venta</th>
                  <td><?=$estrategiasMujeres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Comercio justo</th>
                  <td><?=$comercioJustoMujeres['userPorActividad']?></td>
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
            <i class="fas fa-transgender-alt"></i>
            </div>
            
            <div class="mr-5"><b>Usuarios inscritos en Autonomía Económica hombres<span class="float-right">Total <?=$autonomiaTotalesHombres['userPorActividad']?></span></b></div>
          </div>
          <a class="card-footer text-white clearfix small z-1" data-toggle="collapse" href="#collapseAutonomiaHombres">
            <span class="float-left">Ver detalle</span>
            <span class="float-right">
              <i class="fas fa-angle-right"></i>
            </span>
          </a>
          <div class="collapse" id="collapseAutonomiaHombres">
            <div class="card card-body">
              <table class="table table-striped ">
                <tbody class="bg-danger">
                <tr>
                  <th scope="row">Serigrafía</th>
                  <td><?=$serigrafiaHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Reciclaje</th>
                  <td><?=$reciclajeHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Empaque y embalaje</th>
                  <td><?=$empaqueEmbalajeHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Sistema de distribución</th>
                  <td><?=$sistemaDistribucionHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Edición y Diseño </th>
                  <td><?=$edicionDiseñoHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Carpintería</th>
                  <td><?=$carpinteriaHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Plomería</th>
                  <td><?=$plomeriaHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Herrería</th>
                  <td><?=$herreriaHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Electricidad</th>
                  <td><?=$electricidadHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Gastronomía, panadería y banquetes</th>
                  <td><?=$gastronomiaHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Joyería y accesorios </th>
                  <td><?=$joyeriaHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Huertos urbanos</th>
                  <td><?=$agriculturaHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Diseño de imagen y Cosmetología orgánica</th>
                  <td><?=$diseñoImagenHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Codigo para Hombres</th>
                  <td><?=$codHombresHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Electrónica y robótica</th>
                  <td><?=$electronicaHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Textiles y diseño</th>
                  <td><?=$textileDiseñoHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Fotografia de producto</th>
                  <td><?=$fotoProductoHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Logos e identidad de marca</th>
                  <td><?=$logosHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Calidad en el servicio</th>
                  <td><?=$calidadHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Creación de cooperativas</th>
                  <td><?=$cooperativasHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Emprendimiento</th>
                  <td><?=$emprendeHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Creación de micro-negocios</th>
                  <td><?=$microNHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Comercio digital</th>
                  <td><?=$comercioDigitalHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Estrategias de venta</th>
                  <td><?=$estrategiasHombres['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Comercio justo</th>
                  <td><?=$comercioJustoHombres['userPorActividad']?></td>
                </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>
  </div>  -->
  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
  <!--
    <li class="breadcrumb-item active">Vista General</li>
  -->
    <?php if(isset($_SESSION['identity'])): ?>
      <div class="breadcrumb-item active">
        <!-- <li><?= $_SESSION['identity']->nombre?> <?=$_SESSION['identity']->apellidoPaterno?> <?=$_SESSION['identity']->apellidoMaterno?></li> -->
        <li><b>Información general de Atenciones</b></li>
        <!-- <li><b>JUD estadística y prospección</b></li> -->
      </div>
    <?php endif; ?>
  </ol>
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
  <div class="modal-body">Selecciona salir si estas seguro de cerrar tu sesión.</div>
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
<!-- <script src="<?php echo constant('URL')?>public/vendor/chart.js/Chart.min.js"></script>
<script src="<?php echo constant('URL')?>public/vendor/datatables/jquery.dataTables.js"></script>
<script src="<?php echo constant('URL')?>public/vendor/datatables/dataTables.bootstrap4.js"></script> -->

<!-- Custom scripts for all pages-->
<script src="<?php echo constant('URL')?>public/js/sb-admin.min.js"></script>

<!-- Demo scripts for this page-->
<!-- <script src="<?php //echo constant('URL')?>public/js/demo/datatables-demo.js"></script> -->
<!-- <script src="<?php echo constant('URL')?>public/js/demo/chart-area-jud.js"></script> -->

</body>

</html>