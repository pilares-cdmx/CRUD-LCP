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
        <li><b>Información general de Asistencias y  Atenciones</b></li>
        <li><b>JUD estadística y prospección</b></li>
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

  <!-- Usuarios totales por  intervalo de edad Autonomía Económica -->
  <div class="row">
    <div class="col-xl-6 col-sm-6 mb-3">
      <div class="card text-info bg-light o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
            <i class="fas fa-birthday-cake"></i>
            </div>
            
            <div class="mr-5"><b>Usuarios totales por intervalo de edad Autonomia economica <span class="float-right"></span></b></div>
          </div>
          <a class="card-footer text-info clearfix small z-1" data-toggle="collapse" href="#collapsePorIntervaloAutonomia">
            <span class="float-left">Ver detalle</span>
            <span class="float-right">
              <i class="fas fa-angle-right"></i>
            </span>
          </a>
          <div class="collapse" id="collapsePorIntervaloAutonomia">
            <div class="card card-body">
              <table class="table table-striped ">
                <tbody class="bg-light">
                <tr>
                    <th scope="row">60 años y más...</th>
                    <td><?=$totalesIntervaloAutonomia1['userPorIntervaloAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">de 59 y 45 años</th>
                    <td><?=$totalesIntervaloAutonomia2['userPorIntervaloAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">de 30 a 44 años</th>
                    <td><?=$totalesIntervaloAutonomia3['userPorIntervaloAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">de 15 a 29 años</th>
                    <td><?=$totalesIntervaloAutonomia4['userPorIntervaloAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">de 2 a 14 años</th>
                    <td><?=$totalesIntervaloAutonomia5['userPorIntervaloAutonomia']?></td>
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
            
            <div class="mr-5"><b>Usuarios totales por intervalo de edad Autonomia economica mujeres <span class="float-right"></span></b></div>
          </div>
          <a class="card-footer text-info clearfix small z-1" data-toggle="collapse" href="#collapsePorIntervaloAutonomiaMujeres">
            <span class="float-left">Ver detalle</span>
            <span class="float-right">
              <i class="fas fa-angle-right"></i>
            </span>
          </a>
          <div class="collapse" id="collapsePorIntervaloAutonomiaMujeres">
            <div class="card card-body">
              <table class="table table-striped ">
                <tbody class="bg-light">
                <tr>
                    <th scope="row">60 años y más...</th>
                    <td><?=$totalesIntervaloAutonomiaMujeres1['userPorIntervaloAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">de 59 y 45 años</th>
                    <td><?=$totalesIntervaloAutonomiaMujeres2['userPorIntervaloAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">de 30 a 44 años</th>
                    <td><?=$totalesIntervaloAutonomiaMujeres3['userPorIntervaloAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">de 15 a 29 años</th>
                    <td><?=$totalesIntervaloAutonomiaMujeres4['userPorIntervaloAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">de 2 a 14 años</th>
                    <td><?=$totalesIntervaloAutonomiaMujeres5['userPorIntervaloAutonomia']?></td>
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
            
            <div class="mr-5"><b>Usuarios totales por intervalo de edad Autonomia economica hombres<span class="float-right"></span></b></div>
          </div>
          <a class="card-footer text-info clearfix small z-1" data-toggle="collapse" href="#collapsePorIntervaloAutonomiaHombres">
            <span class="float-left">Ver detalle</span>
            <span class="float-right">
              <i class="fas fa-angle-right"></i>
            </span>
          </a>
          <div class="collapse" id="collapsePorIntervaloAutonomiaHombres">
            <div class="card card-body">
              <table class="table table-striped ">
                <tbody class="bg-light">
                <tr>
                    <th scope="row">60 años y más...</th>
                    <td><?=$totalesIntervaloAutonomiaHombres1['userPorIntervaloAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">de 59 y 45 años</th>
                    <td><?=$totalesIntervaloAutonomiaHombres2['userPorIntervaloAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">de 30 a 44 años</th>
                    <td><?=$totalesIntervaloAutonomiaHombres3['userPorIntervaloAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">de 15 a 29 años</th>
                    <td><?=$totalesIntervaloAutonomiaHombres4['userPorIntervaloAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">de 2 a 14 años</th>
                    <td><?=$totalesIntervaloAutonomiaHombres5['userPorIntervaloAutonomia']?></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>
  </div>

   <!-- Usuarios totales por  intervalo de edad Ciberescuelas-->
   <div class="row">
    <div class="col-xl-6 col-sm-6 mb-3">
      <div class="card text-white bg-secondary o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
            <i class="fas fa-birthday-cake"></i>
            </div>
            
            <div class="mr-5"><b>Usuarios totales por intervalo de edad Ciberescuelas <span class="float-right"></span></b></div>
          </div>
          <a class="card-footer text-white clearfix small z-1" data-toggle="collapse" href="#collapsePorIntervaloCiberescuela">
            <span class="float-left">Ver detalle</span>
            <span class="float-right">
              <i class="fas fa-angle-right"></i>
            </span>
          </a>
          <div class="collapse" id="collapsePorIntervaloCiberescuela">
            <div class="card card-body">
              <table class="table table-striped ">
                <tbody class="bg-secondary">
                <tr>
                    <th scope="row">60 años y más...</th>
                    <td><?=$totalesIntervaloCiberescuela1['userPorIntervaloCiberescuela']?></td>
                  </tr>
                  <tr>
                    <th scope="row">de 59 y 45 años</th>
                    <td><?=$totalesIntervaloCiberescuela2['userPorIntervaloCiberescuela']?></td>
                  </tr>
                  <tr>
                    <th scope="row">de 30 a 44 años</th>
                    <td><?=$totalesIntervaloCiberescuela3['userPorIntervaloCiberescuela']?></td>
                  </tr>
                  <tr>
                    <th scope="row">de 15 a 29 años</th>
                    <td><?=$totalesIntervaloCiberescuela4['userPorIntervaloCiberescuela']?></td>
                  </tr>
                  <tr>
                    <th scope="row">de 2 a 14 años</th>
                    <td><?=$totalesIntervaloCiberescuela5['userPorIntervaloCiberescuela']?></td>
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
            
            <div class="mr-5"><b>Usuarios totales por intervalo de edad Ciberescuelas mujeres <span class="float-right"></span></b></div>
          </div>
          <a class="card-footer text-white clearfix small z-1" data-toggle="collapse" href="#collapsePorIntervaloCiberescuelaMujeres">
            <span class="float-left">Ver detalle</span>
            <span class="float-right">
              <i class="fas fa-angle-right"></i>
            </span>
          </a>
          <div class="collapse" id="collapsePorIntervaloCiberescuelaMujeres">
            <div class="card card-body">
              <table class="table table-striped ">
                <tbody class="bg-secondary">
                <tr>
                    <th scope="row">60 años y más...</th>
                    <td><?=$totalesIntervaloCiberescuelaMujeres1['userPorIntervaloCiberescuela']?></td>
                  </tr>
                  <tr>
                    <th scope="row">de 59 y 45 años</th>
                    <td><?=$totalesIntervaloCiberescuelaMujeres2['userPorIntervaloCiberescuela']?></td>
                  </tr>
                  <tr>
                    <th scope="row">de 30 a 44 años</th>
                    <td><?=$totalesIntervaloCiberescuelaMujeres3['userPorIntervaloCiberescuela']?></td>
                  </tr>
                  <tr>
                    <th scope="row">de 15 a 29 años</th>
                    <td><?=$totalesIntervaloCiberescuelaMujeres4['userPorIntervaloCiberescuela']?></td>
                  </tr>
                  <tr>
                    <th scope="row">de 2 a 14 años</th>
                    <td><?=$totalesIntervaloCiberescuelaMujeres5['userPorIntervaloCiberescuela']?></td>
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
            
            <div class="mr-5"><b>Usuarios totales porintervalo de edad Ciberescuelas hombres<span class="float-right"></span></b></div>
          </div>
          <a class="card-footer text-white clearfix small z-1" data-toggle="collapse" href="#collapsePorIntervaloCiberescuelaHombres">
            <span class="float-left">Ver detalle</span>
            <span class="float-right">
              <i class="fas fa-angle-right"></i>
            </span>
          </a>
          <div class="collapse" id="collapsePorIntervaloCiberescuelaHombres">
            <div class="card card-body">
              <table class="table table-striped ">
                <tbody class="bg-secondary">
                <tr>
                    <th scope="row">60 años y más...</th>
                    <td><?=$totalesIntervaloCiberescuelaHombres1['userPorIntervaloCiberescuela']?></td>
                  </tr>
                  <tr>
                    <th scope="row">de 59 y 45 años</th>
                    <td><?=$totalesIntervaloCiberescuelaHombres2['userPorIntervaloCiberescuela']?></td>
                  </tr>
                  <tr>
                    <th scope="row">de 30 a 44 años</th>
                    <td><?=$totalesIntervaloCiberescuelaHombres3['userPorIntervaloCiberescuela']?></td>
                  </tr>
                  <tr>
                    <th scope="row">de 15 a 29 años</th>
                    <td><?=$totalesIntervaloCiberescuelaHombres4['userPorIntervaloCiberescuela']?></td>
                  </tr>
                  <tr>
                    <th scope="row">de 2 a 14 años</th>
                    <td><?=$totalesIntervaloCiberescuelaHombres5['userPorIntervaloCiberescuela']?></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>
   </div>

  <!-- Usuarios totales por  Grupo étnico -->
  <div class="row">
    <div class="col-xl-6 col-sm-6 mb-3">
      <div class="card text-info bg-light o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
            <i class="fas fa-street-view"></i>
            </div>
            
            <div class="mr-5"><b>Usuarios totales por Grupo Étnico <span class="float-right"></span></b></div>
          </div>
          <a class="card-footer text-info clearfix small z-1" data-toggle="collapse" href="#collapsePorGrupoet">
            <span class="float-left">Ver detalle</span>
            <span class="float-right">
              <i class="fas fa-angle-right"></i>
            </span>
          </a>
          <div class="collapse" id="collapsePorGrupoet">
            <div class="card card-body">
              <table class="table table-striped ">
                <tbody class="bg-light">
                  <tr>
                    <th scope="row">AKATEKOS</th>
                    <td><?=$grupoEtnicoTotales1['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">AMUZGOS</th>
                    <td><?=$grupoEtnicoTotales2['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">AWAKATEKOS</th>
                    <td><?=$grupoEtnicoTotales3['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">AYAPANECOS</th>
                    <td><?=$grupoEtnicoTotales4['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CORAS</th>
                    <td><?=$grupoEtnicoTotales5['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CUCAPÁS</th>
                    <td><?=$grupoEtnicoTotales6['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CUICATECOS</th>
                    <td><?=$grupoEtnicoTotales7['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CHATINOS</th>
                    <td><?=$grupoEtnicoTotales8['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CHICHIMECAS</th>
                    <td><?=$grupoEtnicoTotales9['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CHINANTECOS</th>
                    <td><?=$grupoEtnicoTotales10['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CHOLES</th>
                    <td><?=$grupoEtnicoTotales11['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CHOCHOLTECOS</th>
                    <td><?=$grupoEtnicoTotales12['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CHONTALES DE OAXACA</th>
                    <td><?=$grupoEtnicoTotales13['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CHONTALES DE TABASCO</th>
                    <td><?=$grupoEtnicoTotales14['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CHUJES</th>
                    <td><?=$grupoEtnicoTotales15['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">GUARIJÍOS</th>
                    <td><?=$grupoEtnicoTotales16['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">HUASTECOS</th>
                    <td><?=$grupoEtnicoTotales17['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">HUAVES</th>
                    <td><?=$grupoEtnicoTotales18['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">HUICHOLES</th>
                    <td><?=$grupoEtnicoTotales19['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">IXILES</th>
                    <td><?=$grupoEtnicoTotales20['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">JAKALTEKOS</th>
                    <td><?=$grupoEtnicoTotales21['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">KAQCHIKELES</th>
                    <td><?=$grupoEtnicoTotales22['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">K`ICHES</th>
                    <td><?=$grupoEtnicoTotales23['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">KU`AHLES</th>
                    <td><?=$grupoEtnicoTotales24['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">KILIWAS</th>
                    <td><?=$grupoEtnicoTotales25['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">KIKAPÚES</th>
                    <td><?=$grupoEtnicoTotales26['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">KUMIAIS</th>
                    <td><?=$grupoEtnicoTotales27['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">LACANDÓNES</th>
                    <td><?=$grupoEtnicoTotales28['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">MAMES</th>
                    <td><?=$grupoEtnicoTotales29['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">MATLATZINCAS</th>
                    <td><?=$grupoEtnicoTotales30['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">MAYAS</th>
                    <td><?=$grupoEtnicoTotales31['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">MAYOS</th>
                    <td><?=$grupoEtnicoTotales32['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">MAZAHUAS</th>
                    <td><?=$grupoEtnicoTotales33['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">MAZATECOS</th>
                    <td><?=$grupoEtnicoTotales34['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">MIXES</th>
                    <td><?=$grupoEtnicoTotales35['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">MIXTECOS</th>
                    <td><?=$grupoEtnicoTotales36['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">NÁHUAS</th>
                    <td><?=$grupoEtnicoTotales37['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">OLUTECOS</th>
                    <td><?=$grupoEtnicoTotales38['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">OTOMÍS</th>
                    <td><?=$grupoEtnicoTotales39['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">PAMES</th>
                    <td><?=$grupoEtnicoTotales40['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">PAIPAIS</th>
                    <td><?=$grupoEtnicoTotales41['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">PÁPAGOS</th>
                    <td><?=$grupoEtnicoTotales42['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">PIMAS</th>
                    <td><?=$grupoEtnicoTotales43['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">POPOLOCAS</th>
                    <td><?=$grupoEtnicoTotales44['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">POPOLUCAS DE LA SIERRA</th>
                    <td><?=$grupoEtnicoTotales45['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Q`ANJOB`ALES</th>
                    <td><?=$grupoEtnicoTotales46['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Q`EQCHI`S</th>
                    <td><?=$grupoEtnicoTotales47['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">QATO`K</th>
                    <td><?=$grupoEtnicoTotales48['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAYULTECOS</th>
                    <td><?=$grupoEtnicoTotales49['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SERIS</th>
                    <td><?=$grupoEtnicoTotales50['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TACUATES</th>
                    <td><?=$grupoEtnicoTotales51['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TARAHUMARAS</th>
                    <td><?=$grupoEtnicoTotales52['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TARASCOS</th>
                    <td><?=$grupoEtnicoTotales53['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TEKOS</th>
                    <td><?=$grupoEtnicoTotales54['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TEPEHUAS</th>
                    <td><?=$grupoEtnicoTotales55['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TEPEHUANOS DEL NORTE</th>
                    <td><?=$grupoEtnicoTotales56['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TEPEHUANOS DEL SUR</th>
                    <td><?=$grupoEtnicoTotales57['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TEXISTEPEQUEÑOS</th>
                    <td><?=$grupoEtnicoTotales58['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TLAHUICAS</th>
                    <td><?=$grupoEtnicoTotales59['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TLAPANECOS</th>
                    <td><?=$grupoEtnicoTotales60['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TOJOLABALES</th>
                    <td><?=$grupoEtnicoTotales61['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TOTONACOS</th>
                    <td><?=$grupoEtnicoTotales62['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TRIQUIS</th>
                    <td><?=$grupoEtnicoTotales63['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TSELTALES</th>
                    <td><?=$grupoEtnicoTotales64['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TZOTZILES</th>
                    <td><?=$grupoEtnicoTotales65['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">YAQUIS</th>
                    <td><?=$grupoEtnicoTotales66['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">ZAPOTECOS</th>
                    <td><?=$grupoEtnicoTotales67['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">ZOQUES</th>
                    <td><?=$grupoEtnicoTotales68['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">NINGUNO</th>
                    <td><?=$grupoEtnicoTotales69['userPorGrupoEtnico']?></td>
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
            
            <div class="mr-5"><b>Usuarios totales por Grupo Étnico mujeres<span class="float-right"></span></b></div>
          </div>
          <a class="card-footer text-info clearfix small z-1" data-toggle="collapse" href="#collapsePorGrupoetMujeres">
            <span class="float-left">Ver detalle</span>
            <span class="float-right">
              <i class="fas fa-angle-right"></i>
            </span>
          </a>
          <div class="collapse" id="collapsePorGrupoetMujeres">
            <div class="card card-body">
              <table class="table table-striped ">
                <tbody class="bg-light">
                <tr>
                    <th scope="row">AKATEKOS</th>
                    <td><?=$grupoEtnicoMujeres1['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">AMUZGOS</th>
                    <td><?=$grupoEtnicoMujeres2['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">AWAKATEKOS</th>
                    <td><?=$grupoEtnicoMujeres3['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">AYAPANECOS</th>
                    <td><?=$grupoEtnicoMujeres4['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CORAS</th>
                    <td><?=$grupoEtnicoMujeres5['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CUCAPÁS</th>
                    <td><?=$grupoEtnicoMujeres6['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CUICATECOS</th>
                    <td><?=$grupoEtnicoMujeres7['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CHATINOS</th>
                    <td><?=$grupoEtnicoMujeres8['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CHICHIMECAS</th>
                    <td><?=$grupoEtnicoMujeres9['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CHINANTECOS</th>
                    <td><?=$grupoEtnicoMujeres10['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CHOLES</th>
                    <td><?=$grupoEtnicoMujeres11['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CHOCHOLTECOS</th>
                    <td><?=$grupoEtnicoMujeres12['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CHONTALES DE OAXACA</th>
                    <td><?=$grupoEtnicoMujeres13['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CHONTALES DE TABASCO</th>
                    <td><?=$grupoEtnicoMujeres14['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CHUJES</th>
                    <td><?=$grupoEtnicoMujeres15['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">GUARIJÍOS</th>
                    <td><?=$grupoEtnicoMujeres16['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">HUASTECOS</th>
                    <td><?=$grupoEtnicoMujeres17['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">HUAVES</th>
                    <td><?=$grupoEtnicoMujeres18['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">HUICHOLES</th>
                    <td><?=$grupoEtnicoMujeres19['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">IXILES</th>
                    <td><?=$grupoEtnicoMujeres20['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">JAKALTEKOS</th>
                    <td><?=$grupoEtnicoMujeres21['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">KAQCHIKELES</th>
                    <td><?=$grupoEtnicoMujeres22['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">K`ICHES</th>
                    <td><?=$grupoEtnicoMujeres23['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">KU`AHLES</th>
                    <td><?=$grupoEtnicoMujeres24['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">KILIWAS</th>
                    <td><?=$grupoEtnicoMujeres25['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">KIKAPÚES</th>
                    <td><?=$grupoEtnicoMujeres26['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">KUMIAIS</th>
                    <td><?=$grupoEtnicoMujeres27['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">LACANDÓNES</th>
                    <td><?=$grupoEtnicoMujeres28['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">MAMES</th>
                    <td><?=$grupoEtnicoMujeres29['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">MATLATZINCAS</th>
                    <td><?=$grupoEtnicoMujeres30['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">MAYAS</th>
                    <td><?=$grupoEtnicoMujeres31['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">MAYOS</th>
                    <td><?=$grupoEtnicoMujeres32['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">MAZAHUAS</th>
                    <td><?=$grupoEtnicoMujeres33['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">MAZATECOS</th>
                    <td><?=$grupoEtnicoMujeres34['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">MIXES</th>
                    <td><?=$grupoEtnicoMujeres35['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">MIXTECOS</th>
                    <td><?=$grupoEtnicoMujeres36['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">NÁHUAS</th>
                    <td><?=$grupoEtnicoMujeres37['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">OLUTECOS</th>
                    <td><?=$grupoEtnicoMujeres38['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">OTOMÍS</th>
                    <td><?=$grupoEtnicoMujeres39['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">PAMES</th>
                    <td><?=$grupoEtnicoMujeres40['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">PAIPAIS</th>
                    <td><?=$grupoEtnicoMujeres41['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">PÁPAGOS</th>
                    <td><?=$grupoEtnicoMujeres42['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">PIMAS</th>
                    <td><?=$grupoEtnicoMujeres43['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">POPOLOCAS</th>
                    <td><?=$grupoEtnicoMujeres44['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">POPOLUCAS DE LA SIERRA</th>
                    <td><?=$grupoEtnicoMujeres45['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Q`ANJOB`ALES</th>
                    <td><?=$grupoEtnicoMujeres46['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Q`EQCHI`S</th>
                    <td><?=$grupoEtnicoMujeres47['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">QATO`K</th>
                    <td><?=$grupoEtnicoMujeres48['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAYULTECOS</th>
                    <td><?=$grupoEtnicoMujeres49['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SERIS</th>
                    <td><?=$grupoEtnicoMujeres50['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TACUATES</th>
                    <td><?=$grupoEtnicoMujeres51['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TARAHUMARAS</th>
                    <td><?=$grupoEtnicoMujeres52['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TARASCOS</th>
                    <td><?=$grupoEtnicoMujeres53['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TEKOS</th>
                    <td><?=$grupoEtnicoMujeres54['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TEPEHUAS</th>
                    <td><?=$grupoEtnicoMujeres55['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TEPEHUANOS DEL NORTE</th>
                    <td><?=$grupoEtnicoMujeres56['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TEPEHUANOS DEL SUR</th>
                    <td><?=$grupoEtnicoMujeres57['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TEXISTEPEQUEÑOS</th>
                    <td><?=$grupoEtnicoMujeres58['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TLAHUICAS</th>
                    <td><?=$grupoEtnicoMujeres59['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TLAPANECOS</th>
                    <td><?=$grupoEtnicoMujeres60['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TOJOLABALES</th>
                    <td><?=$grupoEtnicoMujeres61['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TOTONACOS</th>
                    <td><?=$grupoEtnicoMujeres62['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TRIQUIS</th>
                    <td><?=$grupoEtnicoMujeres63['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TSELTALES</th>
                    <td><?=$grupoEtnicoMujeres64['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TZOTZILES</th>
                    <td><?=$grupoEtnicoMujeres65['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">YAQUIS</th>
                    <td><?=$grupoEtnicoMujeres66['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">ZAPOTECOS</th>
                    <td><?=$grupoEtnicoMujeres67['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">ZOQUES</th>
                    <td><?=$grupoEtnicoMujeres68['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">NINGUNO</th>
                    <td><?=$grupoEtnicoMujeres69['userPorGrupoEtnico']?></td>
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
            
            <div class="mr-5"><b>Usuarios totales por Grupo Étnico hombres<span class="float-right"></span></b></div>
          </div>
          <a class="card-footer text-info clearfix small z-1" data-toggle="collapse" href="#collapsePorGrupoetHombres">
            <span class="float-left">Ver detalle</span>
            <span class="float-right">
              <i class="fas fa-angle-right"></i>
            </span>
          </a>
          <div class="collapse" id="collapsePorGrupoetHombres">
            <div class="card card-body">
              <table class="table table-striped ">
                <tbody class="bg-light">
                <tr>
                    <th scope="row">AKATEKOS</th>
                    <td><?=$grupoEtnicoHombres1['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">AMUZGOS</th>
                    <td><?=$grupoEtnicoHombres2['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">AWAKATEKOS</th>
                    <td><?=$grupoEtnicoHombres3['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">AYAPANECOS</th>
                    <td><?=$grupoEtnicoHombres4['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CORAS</th>
                    <td><?=$grupoEtnicoHombres5['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CUCAPÁS</th>
                    <td><?=$grupoEtnicoHombres6['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CUICATECOS</th>
                    <td><?=$grupoEtnicoHombres7['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CHATINOS</th>
                    <td><?=$grupoEtnicoHombres8['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CHICHIMECAS</th>
                    <td><?=$grupoEtnicoHombres9['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CHINANTECOS</th>
                    <td><?=$grupoEtnicoHombres10['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CHOLES</th>
                    <td><?=$grupoEtnicoHombres11['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CHOCHOLTECOS</th>
                    <td><?=$grupoEtnicoHombres12['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CHONTALES DE OAXACA</th>
                    <td><?=$grupoEtnicoHombres13['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CHONTALES DE TABASCO</th>
                    <td><?=$grupoEtnicoHombres14['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CHUJES</th>
                    <td><?=$grupoEtnicoHombres15['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">GUARIJÍOS</th>
                    <td><?=$grupoEtnicoHombres16['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">HUASTECOS</th>
                    <td><?=$grupoEtnicoHombres17['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">HUAVES</th>
                    <td><?=$grupoEtnicoHombres18['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">HUICHOLES</th>
                    <td><?=$grupoEtnicoHombres19['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">IXILES</th>
                    <td><?=$grupoEtnicoHombres20['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">JAKALTEKOS</th>
                    <td><?=$grupoEtnicoHombres21['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">KAQCHIKELES</th>
                    <td><?=$grupoEtnicoHombres22['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">K`ICHES</th>
                    <td><?=$grupoEtnicoHombres23['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">KU`AHLES</th>
                    <td><?=$grupoEtnicoHombres24['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">KILIWAS</th>
                    <td><?=$grupoEtnicoHombres25['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">KIKAPÚES</th>
                    <td><?=$grupoEtnicoHombres26['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">KUMIAIS</th>
                    <td><?=$grupoEtnicoHombres27['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">LACANDÓNES</th>
                    <td><?=$grupoEtnicoHombres28['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">MAMES</th>
                    <td><?=$grupoEtnicoHombres29['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">MATLATZINCAS</th>
                    <td><?=$grupoEtnicoHombres30['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">MAYAS</th>
                    <td><?=$grupoEtnicoHombres31['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">MAYOS</th>
                    <td><?=$grupoEtnicoHombres32['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">MAZAHUAS</th>
                    <td><?=$grupoEtnicoHombres33['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">MAZATECOS</th>
                    <td><?=$grupoEtnicoHombres34['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">MIXES</th>
                    <td><?=$grupoEtnicoHombres35['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">MIXTECOS</th>
                    <td><?=$grupoEtnicoHombres36['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">NÁHUAS</th>
                    <td><?=$grupoEtnicoHombres37['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">OLUTECOS</th>
                    <td><?=$grupoEtnicoHombres38['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">OTOMÍS</th>
                    <td><?=$grupoEtnicoHombres39['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">PAMES</th>
                    <td><?=$grupoEtnicoHombres40['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">PAIPAIS</th>
                    <td><?=$grupoEtnicoHombres41['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">PÁPAGOS</th>
                    <td><?=$grupoEtnicoHombres42['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">PIMAS</th>
                    <td><?=$grupoEtnicoHombres43['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">POPOLOCAS</th>
                    <td><?=$grupoEtnicoHombres44['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">POPOLUCAS DE LA SIERRA</th>
                    <td><?=$grupoEtnicoHombres45['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Q`ANJOB`ALES</th>
                    <td><?=$grupoEtnicoHombres46['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Q`EQCHI`S</th>
                    <td><?=$grupoEtnicoHombres47['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">QATO`K</th>
                    <td><?=$grupoEtnicoHombres48['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAYULTECOS</th>
                    <td><?=$grupoEtnicoHombres49['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SERIS</th>
                    <td><?=$grupoEtnicoHombres50['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TACUATES</th>
                    <td><?=$grupoEtnicoHombres51['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TARAHUMARAS</th>
                    <td><?=$grupoEtnicoHombres52['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TARASCOS</th>
                    <td><?=$grupoEtnicoHombres53['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TEKOS</th>
                    <td><?=$grupoEtnicoHombres54['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TEPEHUAS</th>
                    <td><?=$grupoEtnicoHombres55['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TEPEHUANOS DEL NORTE</th>
                    <td><?=$grupoEtnicoHombres56['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TEPEHUANOS DEL SUR</th>
                    <td><?=$grupoEtnicoHombres57['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TEXISTEPEQUEÑOS</th>
                    <td><?=$grupoEtnicoHombres58['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TLAHUICAS</th>
                    <td><?=$grupoEtnicoHombres59['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TLAPANECOS</th>
                    <td><?=$grupoEtnicoHombres60['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TOJOLABALES</th>
                    <td><?=$grupoEtnicoHombres61['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TOTONACOS</th>
                    <td><?=$grupoEtnicoHombres62['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TRIQUIS</th>
                    <td><?=$grupoEtnicoHombres63['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TSELTALES</th>
                    <td><?=$grupoEtnicoHombres64['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TZOTZILES</th>
                    <td><?=$grupoEtnicoHombres65['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">YAQUIS</th>
                    <td><?=$grupoEtnicoHombres66['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">ZAPOTECOS</th>
                    <td><?=$grupoEtnicoHombres67['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">ZOQUES</th>
                    <td><?=$grupoEtnicoHombres68['userPorGrupoEtnico']?></td>
                  </tr>
                  <tr>
                    <th scope="row">NINGUNO</th>
                    <td><?=$grupoEtnicoHombres69['userPorGrupoEtnico']?></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>
  </div>

  <!-- Usuarios totales por Lengua propia -->
  <div class="row">
    <div class="col-xl-6 col-sm-6 mb-3">
      <div class="card text-white bg-secondary o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
            <i class="fab fa-think-peaks"></i>
            </div>
            
            <div class="mr-5"><b>Usuarios totales por Lengua Indigena <span class="float-right"></span></b></div>
          </div>
          <a class="card-footer text-white clearfix small z-1" data-toggle="collapse" href="#collapsePorLengua">
            <span class="float-left">Ver detalle</span>
            <span class="float-right">
              <i class="fas fa-angle-right"></i>
            </span>
          </a>
          <div class="collapse" id="collapsePorLengua">
            <div class="card card-body">
              <table class="table table-striped ">
                <tbody class="bg-secondary">
                  <tr>
                    <th scope="row">AKATEKO</th>
                    <td><?=$lenguaTotales1['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">AMUZGO</th>
                    <td><?=$lenguaTotales2['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">AWAKATEKO</th>
                    <td><?=$lenguaTotales3['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">AYAPANECO</th>
                    <td><?=$lenguaTotales4['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">COCHIMÍE</th>
                    <td><?=$lenguaTotales5['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CORA</th>
                    <td><?=$lenguaTotales6['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CUCAPÁ</th>
                    <td><?=$lenguaTotales7['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CUICATECO</th>
                    <td><?=$lenguaTotales8['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CHATINO</th>
                    <td><?=$lenguaTotales9['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CHICHIMECA</th>
                    <td><?=$lenguaTotales10['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CHINANTECO</th>
                    <td><?=$lenguaTotales11['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CH`OL</th>
                    <td><?=$lenguaTotales12['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CHOCHOLTECO</th>
                    <td><?=$lenguaTotales13['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CHONTALES DE OAXACA</th>
                    <td><?=$lenguaTotales14['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CHONTAL DE TABASCO</th>
                    <td><?=$lenguaTotales15['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CHUJ</th>
                    <td><?=$lenguaTotales16['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">GUARIJÍO</th>
                    <td><?=$lenguaTotales17['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">HUASTECO</th>
                    <td><?=$lenguaTotales18['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">HUAVE</th>
                    <td><?=$lenguaTotales19['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">HUICHOL</th>
                    <td><?=$lenguaTotales20['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">IXCATECO</th>
                    <td><?=$lenguaTotales21['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">IXIL</th>
                    <td><?=$lenguaTotales22['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">JAKALTEKO</th>
                    <td><?=$lenguaTotales23['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">KAQCHIKEL</th>
                    <td><?=$lenguaTotales24['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">K`ICHE</th>
                    <td><?=$lenguaTotales25['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">KU`AHLE</th>
                    <td><?=$lenguaTotales26['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">KILIWA</th>
                    <td><?=$lenguaTotales27['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">KIKAPÚE</th>
                    <td><?=$lenguaTotales28['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">KUMIAI</th>
                    <td><?=$lenguaTotales29['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">LACANDÓN</th>
                    <td><?=$lenguaTotales30['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">MAME</th>
                    <td><?=$lenguaTotales31['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">MATLATZINCA</th>
                    <td><?=$lenguaTotales32['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">MAYA</th>
                    <td><?=$lenguaTotales33['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">MAYO</th>
                    <td><?=$lenguaTotales34['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">MAZAHUA</th>
                    <td><?=$lenguaTotales35['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">MAZATECO</th>
                    <td><?=$lenguaTotales36['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">MIXE</th>
                    <td><?=$lenguaTotales37['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">MIXTECO</th>
                    <td><?=$lenguaTotales38['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">MOCHÓ</th>
                    <td><?=$lenguaTotales39['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">NÁHUATL</th>
                    <td><?=$lenguaTotales40['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">OLUTECO</th>
                    <td><?=$lenguaTotales41['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">OTOMÍ</th>
                    <td><?=$lenguaTotales42['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">PAME</th>
                    <td><?=$lenguaTotales43['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">PAIPAI</th>
                    <td><?=$lenguaTotales44['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">PÁPAGO</th>
                    <td><?=$lenguaTotales45['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">PIMA</th>
                    <td><?=$lenguaTotales46['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">POPOLOCA</th>
                    <td><?=$lenguaTotales47['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">POPOLOCA DE LA SIERRA</th>
                    <td><?=$lenguaTotales48['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">P`URHÉPECHA</th>
                    <td><?=$lenguaTotales49['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Q`ANJOB`AL</th>
                    <td><?=$lenguaTotales50['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Q`EQCHI`</th>
                    <td><?=$lenguaTotales51['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">QATO`K</th>
                    <td><?=$lenguaTotales52['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAYULTECO</th>
                    <td><?=$lenguaTotales53['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SERI</th>
                    <td><?=$lenguaTotales54['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TACUATE</th>
                    <td><?=$lenguaTotales55['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TARAHUMARA</th>
                    <td><?=$lenguaTotales56['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TEKO</th>
                    <td><?=$lenguaTotales57['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TEPEHUA</th>
                    <td><?=$lenguaTotales58['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TEPEHUANO DEL NORTE</th>
                    <td><?=$lenguaTotales59['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TEPEHUANO DEL SUR</th>
                    <td><?=$lenguaTotales60['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TEXISTEPEQUEÑO</th>
                    <td><?=$lenguaTotales61['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TLAHUICA</th>
                    <td><?=$lenguaTotales62['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TLAPANECO</th>
                    <td><?=$lenguaTotales63['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TOJOLABAL</th>
                    <td><?=$lenguaTotales64['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TOTONACO</th>
                    <td><?=$lenguaTotales65['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TRIQUI</th>
                    <td><?=$lenguaTotales66['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TSELTAL</th>
                    <td><?=$lenguaTotales67['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TSOTSIL</th>
                    <td><?=$lenguaTotales68['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">YAQUI</th>
                    <td><?=$lenguaTotales69['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">ZAPOTECO</th>
                    <td><?=$lenguaTotales70['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">ZOQUE</th>
                    <td><?=$lenguaTotales71['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">NINGUNO</th>
                    <td><?=$lenguaTotales0['userPorLengua']?></td>
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
            
            <div class="mr-5"><b>Usuarios totales por Lengua indigena mujeres<span class="float-right"></span></b></div>
          </div>
          <a class="card-footer text-white clearfix small z-1" data-toggle="collapse" href="#collapsePorGrupoetMujeres1">
            <span class="float-left">Ver detalle</span>
            <span class="float-right">
              <i class="fas fa-angle-right"></i>
            </span>
          </a>
          <div class="collapse" id="collapsePorGrupoetMujeres1">
            <div class="card card-body">
              <table class="table table-striped ">
                <tbody class="bg-secondary">
                <tr>
                    <th scope="row">AKATEKO</th>
                    <td><?=$lenguaTotalesMujeres1['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">AMUZGO</th>
                    <td><?=$lenguaTotalesMujeres2['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">AWAKATEKO</th>
                    <td><?=$lenguaTotalesMujeres3['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">AYAPANECO</th>
                    <td><?=$lenguaTotalesMujeres4['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">COCHIMÍE</th>
                    <td><?=$lenguaTotalesMujeres5['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CORA</th>
                    <td><?=$lenguaTotalesMujeres6['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CUCAPÁ</th>
                    <td><?=$lenguaTotalesMujeres7['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CUICATECO</th>
                    <td><?=$lenguaTotalesMujeres8['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CHATINO</th>
                    <td><?=$lenguaTotalesMujeres9['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CHICHIMECA</th>
                    <td><?=$lenguaTotalesMujeres10['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CHINANTECO</th>
                    <td><?=$lenguaTotalesMujeres11['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CH`OL</th>
                    <td><?=$lenguaTotalesMujeres12['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CHOCHOLTECO</th>
                    <td><?=$lenguaTotalesMujeres13['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CHONTALES DE OAXACA</th>
                    <td><?=$lenguaTotalesMujeres14['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CHONTAL DE TABASCO</th>
                    <td><?=$lenguaTotalesMujeres15['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CHUJ</th>
                    <td><?=$lenguaTotalesMujeres16['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">GUARIJÍO</th>
                    <td><?=$lenguaTotalesMujeres17['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">HUASTECO</th>
                    <td><?=$lenguaTotalesMujeres18['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">HUAVE</th>
                    <td><?=$lenguaTotalesMujeres19['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">HUICHOL</th>
                    <td><?=$lenguaTotalesMujeres20['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">IXCATECO</th>
                    <td><?=$lenguaTotalesMujeres21['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">IXIL</th>
                    <td><?=$lenguaTotalesMujeres22['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">JAKALTEKO</th>
                    <td><?=$lenguaTotalesMujeres23['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">KAQCHIKEL</th>
                    <td><?=$lenguaTotalesMujeres24['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">K`ICHE</th>
                    <td><?=$lenguaTotalesMujeres25['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">KU`AHLE</th>
                    <td><?=$lenguaTotalesMujeres26['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">KILIWA</th>
                    <td><?=$lenguaTotalesMujeres27['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">KIKAPÚE</th>
                    <td><?=$lenguaTotalesMujeres28['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">KUMIAI</th>
                    <td><?=$lenguaTotalesMujeres29['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">LACANDÓN</th>
                    <td><?=$lenguaTotalesMujeres30['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">MAME</th>
                    <td><?=$lenguaTotalesMujeres31['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">MATLATZINCA</th>
                    <td><?=$lenguaTotalesMujeres32['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">MAYA</th>
                    <td><?=$lenguaTotalesMujeres33['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">MAYO</th>
                    <td><?=$lenguaTotalesMujeres34['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">MAZAHUA</th>
                    <td><?=$lenguaTotalesMujeres35['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">MAZATECO</th>
                    <td><?=$lenguaTotalesMujeres36['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">MIXE</th>
                    <td><?=$lenguaTotalesMujeres37['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">MIXTECO</th>
                    <td><?=$lenguaTotalesMujeres38['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">MOCHÓ</th>
                    <td><?=$lenguaTotalesMujeres39['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">NÁHUATL</th>
                    <td><?=$lenguaTotalesMujeres40['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">OLUTECO</th>
                    <td><?=$lenguaTotalesMujeres41['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">OTOMÍ</th>
                    <td><?=$lenguaTotalesMujeres42['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">PAME</th>
                    <td><?=$lenguaTotalesMujeres43['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">PAIPAI</th>
                    <td><?=$lenguaTotalesMujeres44['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">PÁPAGO</th>
                    <td><?=$lenguaTotalesMujeres45['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">PIMA</th>
                    <td><?=$lenguaTotalesMujeres46['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">POPOLOCA</th>
                    <td><?=$lenguaTotalesMujeres47['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">POPOLOCA DE LA SIERRA</th>
                    <td><?=$lenguaTotalesMujeres48['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">P`URHÉPECHA</th>
                    <td><?=$lenguaTotalesMujeres49['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Q`ANJOB`AL</th>
                    <td><?=$lenguaTotalesMujeres50['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Q`EQCHI`</th>
                    <td><?=$lenguaTotalesMujeres51['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">QATO`K</th>
                    <td><?=$lenguaTotalesMujeres52['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAYULTECO</th>
                    <td><?=$lenguaTotalesMujeres53['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SERI</th>
                    <td><?=$lenguaTotalesMujeres54['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TACUATE</th>
                    <td><?=$lenguaTotalesMujeres55['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TARAHUMARA</th>
                    <td><?=$lenguaTotalesMujeres56['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TEKO</th>
                    <td><?=$lenguaTotalesMujeres57['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TEPEHUA</th>
                    <td><?=$lenguaTotalesMujeres58['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TEPEHUANO DEL NORTE</th>
                    <td><?=$lenguaTotalesMujeres59['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TEPEHUANO DEL SUR</th>
                    <td><?=$lenguaTotalesMujeres60['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TEXISTEPEQUEÑO</th>
                    <td><?=$lenguaTotalesMujeres61['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TLAHUICA</th>
                    <td><?=$lenguaTotalesMujeres62['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TLAPANECO</th>
                    <td><?=$lenguaTotalesMujeres63['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TOJOLABAL</th>
                    <td><?=$lenguaTotalesMujeres64['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TOTONACO</th>
                    <td><?=$lenguaTotalesMujeres65['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TRIQUI</th>
                    <td><?=$lenguaTotalesMujeres66['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TSELTAL</th>
                    <td><?=$lenguaTotalesMujeres67['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TSOTSIL</th>
                    <td><?=$lenguaTotalesMujeres68['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">YAQUI</th>
                    <td><?=$lenguaTotalesMujeres69['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">ZAPOTECO</th>
                    <td><?=$lenguaTotalesMujeres70['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">ZOQUE</th>
                    <td><?=$lenguaTotalesMujeres71['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">NINGUNO</th>
                    <td><?=$lenguaTotalesMujeres0['userPorLengua']?></td>
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
            
            <div class="mr-5"><b>Usuarios totales por Lengua indigena hombres<span class="float-right"></span></b></div>
          </div>
          <a class="card-footer text-white clearfix small z-1" data-toggle="collapse" href="#collapsePorGrupoetHombres1">
            <span class="float-left">Ver detalle</span>
            <span class="float-right">
              <i class="fas fa-angle-right"></i>
            </span>
          </a>
          <div class="collapse" id="collapsePorGrupoetHombres1">
            <div class="card card-body">
              <table class="table table-striped ">
                <tbody class="bg-secondary">
                <tr>
                    <th scope="row">AKATEKO</th>
                    <td><?=$lenguaTotalesHombres1['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">AMUZGO</th>
                    <td><?=$lenguaTotalesHombres2['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">AWAKATEKO</th>
                    <td><?=$lenguaTotalesHombres3['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">AYAPANECO</th>
                    <td><?=$lenguaTotalesHombres4['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">COCHIMÍE</th>
                    <td><?=$lenguaTotalesHombres5['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CORA</th>
                    <td><?=$lenguaTotalesHombres6['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CUCAPÁ</th>
                    <td><?=$lenguaTotalesHombres7['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CUICATECO</th>
                    <td><?=$lenguaTotalesHombres8['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CHATINO</th>
                    <td><?=$lenguaTotalesHombres9['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CHICHIMECA</th>
                    <td><?=$lenguaTotalesHombres10['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CHINANTECO</th>
                    <td><?=$lenguaTotalesHombres11['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CH`OL</th>
                    <td><?=$lenguaTotalesHombres12['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CHOCHOLTECO</th>
                    <td><?=$lenguaTotalesHombres13['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CHONTALES DE OAXACA</th>
                    <td><?=$lenguaTotalesHombres14['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CHONTAL DE TABASCO</th>
                    <td><?=$lenguaTotalesHombres15['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CHUJ</th>
                    <td><?=$lenguaTotalesHombres16['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">GUARIJÍO</th>
                    <td><?=$lenguaTotalesHombres17['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">HUASTECO</th>
                    <td><?=$lenguaTotalesHombres18['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">HUAVE</th>
                    <td><?=$lenguaTotalesHombres19['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">HUICHOL</th>
                    <td><?=$lenguaTotalesHombres20['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">IXCATECO</th>
                    <td><?=$lenguaTotalesHombres21['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">IXIL</th>
                    <td><?=$lenguaTotalesHombres22['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">JAKALTEKO</th>
                    <td><?=$lenguaTotalesHombres23['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">KAQCHIKEL</th>
                    <td><?=$lenguaTotalesHombres24['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">K`ICHE</th>
                    <td><?=$lenguaTotalesHombres25['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">KU`AHLE</th>
                    <td><?=$lenguaTotalesHombres26['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">KILIWA</th>
                    <td><?=$lenguaTotalesHombres27['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">KIKAPÚE</th>
                    <td><?=$lenguaTotalesHombres28['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">KUMIAI</th>
                    <td><?=$lenguaTotalesHombres29['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">LACANDÓN</th>
                    <td><?=$lenguaTotalesHombres30['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">MAME</th>
                    <td><?=$lenguaTotalesHombres31['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">MATLATZINCA</th>
                    <td><?=$lenguaTotalesHombres32['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">MAYA</th>
                    <td><?=$lenguaTotalesHombres33['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">MAYO</th>
                    <td><?=$lenguaTotalesHombres34['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">MAZAHUA</th>
                    <td><?=$lenguaTotalesHombres35['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">MAZATECO</th>
                    <td><?=$lenguaTotalesHombres36['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">MIXE</th>
                    <td><?=$lenguaTotalesHombres37['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">MIXTECO</th>
                    <td><?=$lenguaTotalesHombres38['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">MOCHÓ</th>
                    <td><?=$lenguaTotalesHombres39['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">NÁHUATL</th>
                    <td><?=$lenguaTotalesHombres40['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">OLUTECO</th>
                    <td><?=$lenguaTotalesHombres41['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">OTOMÍ</th>
                    <td><?=$lenguaTotalesHombres42['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">PAME</th>
                    <td><?=$lenguaTotalesHombres43['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">PAIPAI</th>
                    <td><?=$lenguaTotalesHombres44['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">PÁPAGO</th>
                    <td><?=$lenguaTotalesHombres45['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">PIMA</th>
                    <td><?=$lenguaTotalesHombres46['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">POPOLOCA</th>
                    <td><?=$lenguaTotalesHombres47['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">POPOLOCA DE LA SIERRA</th>
                    <td><?=$lenguaTotalesHombres48['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">P`URHÉPECHA</th>
                    <td><?=$lenguaTotalesHombres49['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Q`ANJOB`AL</th>
                    <td><?=$lenguaTotalesHombres50['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Q`EQCHI`</th>
                    <td><?=$lenguaTotalesHombres51['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">QATO`K</th>
                    <td><?=$lenguaTotalesHombres52['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAYULTECO</th>
                    <td><?=$lenguaTotalesHombres53['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SERI</th>
                    <td><?=$lenguaTotalesHombres54['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TACUATE</th>
                    <td><?=$lenguaTotalesHombres55['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TARAHUMARA</th>
                    <td><?=$lenguaTotalesHombres56['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TEKO</th>
                    <td><?=$lenguaTotalesHombres57['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TEPEHUA</th>
                    <td><?=$lenguaTotalesHombres58['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TEPEHUANO DEL NORTE</th>
                    <td><?=$lenguaTotalesHombres59['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TEPEHUANO DEL SUR</th>
                    <td><?=$lenguaTotalesHombres60['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TEXISTEPEQUEÑO</th>
                    <td><?=$lenguaTotalesHombres61['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TLAHUICA</th>
                    <td><?=$lenguaTotalesHombres62['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TLAPANECO</th>
                    <td><?=$lenguaTotalesHombres63['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TOJOLABAL</th>
                    <td><?=$lenguaTotalesHombres64['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TOTONACO</th>
                    <td><?=$lenguaTotalesHombres65['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TRIQUI</th>
                    <td><?=$lenguaTotalesHombres66['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TSELTAL</th>
                    <td><?=$lenguaTotalesHombres67['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TSOTSIL</th>
                    <td><?=$lenguaTotalesHombres68['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">YAQUI</th>
                    <td><?=$lenguaTotalesHombres69['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">ZAPOTECO</th>
                    <td><?=$lenguaTotalesHombres70['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">ZOQUE</th>
                    <td><?=$lenguaTotalesHombres71['userPorLengua']?></td>
                  </tr>
                  <tr>
                    <th scope="row">NINGUNO</th>
                    <td><?=$lenguaTotalesHombres0['userPorLengua']?></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>
  </div>

  <!-- Usuarios totales por Pueblos Originarios -->
  <div class="row">
    <div class="col-xl-6 col-sm-6 mb-3">
      <div class="card text-info bg-light o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
            <i class="fas fa-gopuram"></i>
            </div>
            
            <div class="mr-5"><b>Usuarios totales por Pueblos Originarios<span class="float-right"></span></b></div>
          </div>
          <a class="card-footer text-info clearfix small z-1" data-toggle="collapse" href="#collapsePorPueblos">
            <span class="float-left">Ver detalle</span>
            <span class="float-right">
              <i class="fas fa-angle-right"></i>
            </span>
          </a>
          <div class="collapse" id="collapsePorPueblos">
            <div class="card card-body">
              <table class="table table-striped ">
                <tbody class="bg-light">
                  <tr>
                    <th scope="row">AXOTLA</th>
                    <td><?=$pueblosTotales1['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CHIMALISTAC</th>
                    <td><?=$pueblosTotales2['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN BARTOLO AMEYALCO</th>
                    <td><?=$pueblosTotales3['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA FÉ DE VASCO DE QUIROGA</th>
                    <td><?=$pueblosTotales4['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA LUCÍA XANTEPEC</th>
                    <td><?=$pueblosTotales5['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA MARÍA NONOALCO</th>
                    <td><?=$pueblosTotales6['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA ROSA XOCHIAC</th>
                    <td><?=$pueblosTotales7['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TETELPAN</th>
                    <td><?=$pueblosTotales8['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TIZAPAN</th>
                    <td><?=$pueblosTotales9['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TLACOPAC</th>
                    <td><?=$pueblosTotales10['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">COLTONGO</th>
                    <td><?=$pueblosTotales11['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN ANDRES DE LAS SALINAS</th>
                    <td><?=$pueblosTotales12['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN ANDRÉS TETLANMAN</th>
                    <td><?=$pueblosTotales13['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN BARTOLO CAHUALTONGO</th>
                    <td><?=$pueblosTotales14['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN FRANCISCO TETECALA</th>
                    <td><?=$pueblosTotales15['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN JUAN TLILHUACA</th>
                    <td><?=$pueblosTotales16['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN LUCAS ATENCO</th>
                    <td><?=$pueblosTotales17['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN MARTIN XOCHINÁHUAC</th>
                    <td><?=$pueblosTotales18['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN MATEO XALTELOLCO</th>
                    <td><?=$pueblosTotales19['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN MIGUEL AMANTLA</th>
                    <td><?=$pueblosTotales20['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN PEDRO DE LAS SALINAS CALHUACATZINGO</th>
                    <td><?=$pueblosTotales21['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN PEDRO XALPA</th>
                    <td><?=$pueblosTotales22['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN SALVADOR NEXTENGO</th>
                    <td><?=$pueblosTotales23['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN SALVADOR XOCHIMANCA</th>
                    <td><?=$pueblosTotales24['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN SEBASTIÁN ATENCO</th>
                    <td><?=$pueblosTotales25['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN SIMÓN POCHTLAN</th>
                    <td><?=$pueblosTotales26['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA APOLONIA TEZCOLCO</th>
                    <td><?=$pueblosTotales27['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA BÁRBARA TETLANMAN, YOPICO</th>
                    <td><?=$pueblosTotales28['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA CATARINA ATZACUALCO</th>
                    <td><?=$pueblosTotales29['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA LUCIA TOMATLAN</th>
                    <td><?=$pueblosTotales30['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA MARÍA MALINALCO</th>
                    <td><?=$pueblosTotales31['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTIAGO AHUIZOTLA</th>
                    <td><?=$pueblosTotales32['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTO DOMINGO HUEXOTITLÁN</th>
                    <td><?=$pueblosTotales33['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTO TOMÁS TLAMATZINGO</th>
                    <td><?=$pueblosTotales34['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">ACTIPAN</th>
                    <td><?=$pueblosTotales35['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">LA PIEDAD</th>
                    <td><?=$pueblosTotales36['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">MIXCOAC</th>
                    <td><?=$pueblosTotales37['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN JUAN MALINALTONGO</th>
                    <td><?=$pueblosTotales38['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN SEBASTIÁN XOCO</th>
                    <td><?=$pueblosTotales39['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN SIMÓN TICUMAC</th>
                    <td><?=$pueblosTotales40['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA CRUZ ATOYAC</th>
                    <td><?=$pueblosTotales41['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA CRUZ TLACOQUEMECATL</th>
                    <td><?=$pueblosTotales42['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA MARÍA NATIVITAS TEPETLALTZINCO</th>
                    <td><?=$pueblosTotales43['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CHURUBUSCO</th>
                    <td><?=$pueblosTotales44['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">COPILCO</th>
                    <td><?=$pueblosTotales45['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">LA CANDELARIA</th>
                    <td><?=$pueblosTotales46['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">LOS REYES HUEYTILAC</th>
                    <td><?=$pueblosTotales47['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">PUEBLO DE SAN FRANCISCO CULHUACÁN</th>
                    <td><?=$pueblosTotales48['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN PABLO TEPETLAPA</th>
                    <td><?=$pueblosTotales49['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA ÚRSULA COAPA</th>
                    <td><?=$pueblosTotales50['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CONTADERO</th>
                    <td><?=$pueblosTotales51['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN LORENZO ACOPILCO</th>
                    <td><?=$pueblosTotales52['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN MATEO TLALTENANGO</th>
                    <td><?=$pueblosTotales53['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN PABLO CHIMALPA</th>
                    <td><?=$pueblosTotales54['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN PEDRO CUAJIMALPA</th>
                    <td><?=$pueblosTotales55['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN SIMÓN TOLNAHUAC</th>
                    <td><?=$pueblosTotales56['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TLATELOLCO</th>
                    <td><?=$pueblosTotales57['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CALPULTITLAN</th>
                    <td><?=$pueblosTotales58['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CUAUHTEPEC</th>
                    <td><?=$pueblosTotales59['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">MAGDALENA DE LAS SALINAS</th>
                    <td><?=$pueblosTotales60['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN BARTOLO ATEPEHUACAN</th>
                    <td><?=$pueblosTotales61['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN PEDRO ZACATENCO</th>
                    <td><?=$pueblosTotales62['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA ISABEL TOLA</th>
                    <td><?=$pueblosTotales63['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTIAGO ATEPETLAC</th>
                    <td><?=$pueblosTotales64['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTIAGO ATZACOALCO</th>
                    <td><?=$pueblosTotales65['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA ANITA ZACATLALMANCO </th>
                    <td><?=$pueblosTotales66['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">ACULCO</th>
                    <td><?=$pueblosTotales67['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CULHUACAN</th>
                    <td><?=$pueblosTotales68['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">LA MAGDALENA ATLAZOLPA</th>
                    <td><?=$pueblosTotales69['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">LOS REYES CULHUACAN</th>
                    <td><?=$pueblosTotales70['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">MEXICALTZINGO</th>
                    <td><?=$pueblosTotales71['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN ANDRÉS TETEPILCO</th>
                    <td><?=$pueblosTotales72['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN ANDRÉS TOMATLAN</th>
                    <td><?=$pueblosTotales73['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN JUANICO NEXTIPAC</th>
                    <td><?=$pueblosTotales74['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN LORENZO TEZONCO</th>
                    <td><?=$pueblosTotales75['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA CRUZ MEYEHUALCO</th>
                    <td><?=$pueblosTotales76['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA MARÍA AZTAHUACAN</th>
                    <td><?=$pueblosTotales77['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA MARÍA TOMATLAN</th>
                    <td><?=$pueblosTotales78['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA MARTHA ACATITLA</th>
                    <td><?=$pueblosTotales79['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">MAGDALENA CONTRERAS ATLICTIC</th>
                    <td><?=$pueblosTotales80['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN BERNABÉ OCOTEPEC</th>
                    <td><?=$pueblosTotales81['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN JERÓNIMO ACULCO-LIDICE</th>
                    <td><?=$pueblosTotales82['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN NICOLÁS TOTOLAPAN</th>
                    <td><?=$pueblosTotales83['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">POPOTLA</th>
                    <td><?=$pueblosTotales84['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN DIEGO OCOYOACAC</th>
                    <td><?=$pueblosTotales85['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN LORENZO TLALTENANGO</th>
                    <td><?=$pueblosTotales86['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TACUBA</th>
                    <td><?=$pueblosTotales87['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TACUBAYA</th>
                    <td><?=$pueblosTotales88['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN AGUSTÍN OHTENCO</th>
                    <td><?=$pueblosTotales89['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN ANTONIO TECOMITL</th>
                    <td><?=$pueblosTotales90['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN BARTOLOMÉ XICOMULCO</th>
                    <td><?=$pueblosTotales91['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN FRANCISCO TECOXPA</th>
                    <td><?=$pueblosTotales92['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN JERÓNIMO MIACATLAN</th>
                    <td><?=$pueblosTotales93['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN JUAN TEPENAHUAC</th>
                    <td><?=$pueblosTotales94['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN LORENZO TLACOYUCAN</th>
                    <td><?=$pueblosTotales95['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN PABLO OZTOTEPEC</th>
                    <td><?=$pueblosTotales96['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN PEDRO ATOCPAN</th>
                    <td><?=$pueblosTotales97['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN SALVADOR CUAUHTENCO</th>
                    <td><?=$pueblosTotales98['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA ANA TLACOTENCO</th>
                    <td><?=$pueblosTotales99['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN ANDRÉS MIXQUIC</th>
                    <td><?=$pueblosTotales100['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN FRANCISCO TLALTENCO</th>
                    <td><?=$pueblosTotales101['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN JUAN IXTAYOPAN</th>
                    <td><?=$pueblosTotales102['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN NICOLÁS TETELCO</th>
                    <td><?=$pueblosTotales103['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN PEDRO TLAHUAC</th>
                    <td><?=$pueblosTotales104['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA CATARINA YECAHUIZOTL</th>
                    <td><?=$pueblosTotales105['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTIAGO ZAPOTITLÁN</th>
                    <td><?=$pueblosTotales106['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CHIMALCOYOC (LA ASUNCIÓN)</th>
                    <td><?=$pueblosTotales107['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">MAGDALENA PETLACALCO</th>
                    <td><?=$pueblosTotales108['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">PARRES EL GUARDA</th>
                    <td><?=$pueblosTotales109['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN ANDRÉS TOTOLTEPEC</th>
                    <td><?=$pueblosTotales110['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN LORENZO HUIPULCO</th>
                    <td><?=$pueblosTotales111['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN MIGUEL AJUSCO</th>
                    <td><?=$pueblosTotales112['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN MIGUEL TOPILEJO</th>
                    <td><?=$pueblosTotales113['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN MIGUEL XICALCO</th>
                    <td><?=$pueblosTotales114['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN PEDRO MÁRTIR</th>
                    <td><?=$pueblosTotales115['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA URSULA XITLA</th>
                    <td><?=$pueblosTotales116['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTO TOMÁS AJUSCO</th>
                    <td><?=$pueblosTotales117['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">EL PEÑÓN DE LOS BAÑOS</th>
                    <td><?=$pueblosTotales118['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">MAGDALENA MIXHIUCA</th>
                    <td><?=$pueblosTotales119['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN ANDRÉS AHUAYUCAN</th>
                    <td><?=$pueblosTotales120['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN FRANCISCO TLALNEPANTLA</th>
                    <td><?=$pueblosTotales121['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN GREGORIO ATLAPULCO</th>
                    <td><?=$pueblosTotales122['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN LORENZO ATEMOAYA</th>
                    <td><?=$pueblosTotales123['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN LUCAS XOCHIMANCA</th>
                    <td><?=$pueblosTotales124['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN LUIS TLAXIALTEMALCO</th>
                    <td><?=$pueblosTotales125['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN MATEO XALPA</th>
                    <td><?=$pueblosTotales126['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA CECILIA TEPETLAPA</th>
                    <td><?=$pueblosTotales127['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA CRUZ ACALPIXCA</th>
                    <td><?=$pueblosTotales130['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA CRUZ XOCHITEPEC</th>
                    <td><?=$pueblosTotales131['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA MARÍA NATIVITAS</th>
                    <td><?=$pueblosTotales132['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA MARÍA TEPEPAN</th>
                    <td><?=$pueblosTotales133['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTIAGO TEPALCATLALPAN</th>
                    <td><?=$pueblosTotales134['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTIAGO TULYEHUALCO</th>
                    <td><?=$pueblosTotales135['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">NINGUNO</th>
                    <td><?=$pueblosTotales0['userPorPueblo']?></td>
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
            
            <div class="mr-5"><b>Usuarios totales por Pueblos Originarios mujeres<span class="float-right"></span></b></div>
          </div>
          <a class="card-footer text-info clearfix small z-1" data-toggle="collapse" href="#collapsePorPueblosMujeres">
            <span class="float-left">Ver detalle</span>
            <span class="float-right">
              <i class="fas fa-angle-right"></i>
            </span>
          </a>
          <div class="collapse" id="collapsePorPueblosMujeres">
            <div class="card card-body">
              <table class="table table-striped ">
                <tbody class="bg-light">
                <tr>
                    <th scope="row">AXOTLA</th>
                    <td><?=$pueblosTotalesMujeres1['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CHIMALISTAC</th>
                    <td><?=$pueblosTotalesMujeres2['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN BARTOLO AMEYALCO</th>
                    <td><?=$pueblosTotalesMujeres3['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA FÉ DE VASCO DE QUIROGA</th>
                    <td><?=$pueblosTotalesMujeres4['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA LUCÍA XANTEPEC</th>
                    <td><?=$pueblosTotalesMujeres5['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA MARÍA NONOALCO</th>
                    <td><?=$pueblosTotalesMujeres6['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA ROSA XOCHIAC</th>
                    <td><?=$pueblosTotalesMujeres7['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TETELPAN</th>
                    <td><?=$pueblosTotalesMujeres8['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TIZAPAN</th>
                    <td><?=$pueblosTotalesMujeres9['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TLACOPAC</th>
                    <td><?=$pueblosTotalesMujeres10['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">COLTONGO</th>
                    <td><?=$pueblosTotalesMujeres11['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN ANDRES DE LAS SALINAS</th>
                    <td><?=$pueblosTotalesMujeres12['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN ANDRÉS TETLANMAN</th>
                    <td><?=$pueblosTotalesMujeres13['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN BARTOLO CAHUALTONGO</th>
                    <td><?=$pueblosTotalesMujeres14['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN FRANCISCO TETECALA</th>
                    <td><?=$pueblosTotalesMujeres15['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN JUAN TLILHUACA</th>
                    <td><?=$pueblosTotalesMujeres16['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN LUCAS ATENCO</th>
                    <td><?=$pueblosTotalesMujeres17['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN MARTIN XOCHINÁHUAC</th>
                    <td><?=$pueblosTotalesMujeres18['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN MATEO XALTELOLCO</th>
                    <td><?=$pueblosTotalesMujeres19['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN MIGUEL AMANTLA</th>
                    <td><?=$pueblosTotalesMujeres20['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN PEDRO DE LAS SALINAS CALHUACATZINGO</th>
                    <td><?=$pueblosTotalesMujeres21['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN PEDRO XALPA</th>
                    <td><?=$pueblosTotalesMujeres22['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN SALVADOR NEXTENGO</th>
                    <td><?=$pueblosTotalesMujeres23['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN SALVADOR XOCHIMANCA</th>
                    <td><?=$pueblosTotalesMujeres24['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN SEBASTIÁN ATENCO</th>
                    <td><?=$pueblosTotalesMujeres25['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN SIMÓN POCHTLAN</th>
                    <td><?=$pueblosTotalesMujeres26['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA APOLONIA TEZCOLCO</th>
                    <td><?=$pueblosTotalesMujeres27['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA BÁRBARA TETLANMAN, YOPICO</th>
                    <td><?=$pueblosTotalesMujeres28['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA CATARINA ATZACUALCO</th>
                    <td><?=$pueblosTotalesMujeres29['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA LUCIA TOMATLAN</th>
                    <td><?=$pueblosTotalesMujeres30['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA MARÍA MALINALCO</th>
                    <td><?=$pueblosTotalesMujeres31['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTIAGO AHUIZOTLA</th>
                    <td><?=$pueblosTotalesMujeres32['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTO DOMINGO HUEXOTITLÁN</th>
                    <td><?=$pueblosTotalesMujeres33['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTO TOMÁS TLAMATZINGO</th>
                    <td><?=$pueblosTotalesMujeres34['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">ACTIPAN</th>
                    <td><?=$pueblosTotalesMujeres35['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">LA PIEDAD</th>
                    <td><?=$pueblosTotalesMujeres36['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">MIXCOAC</th>
                    <td><?=$pueblosTotalesMujeres37['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN JUAN MALINALTONGO</th>
                    <td><?=$pueblosTotalesMujeres38['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN SEBASTIÁN XOCO</th>
                    <td><?=$pueblosTotalesMujeres39['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN SIMÓN TICUMAC</th>
                    <td><?=$pueblosTotalesMujeres40['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA CRUZ ATOYAC</th>
                    <td><?=$pueblosTotalesMujeres41['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA CRUZ TLACOQUEMECATL</th>
                    <td><?=$pueblosTotalesMujeres42['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA MARÍA NATIVITAS TEPETLALTZINCO</th>
                    <td><?=$pueblosTotalesMujeres43['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CHURUBUSCO</th>
                    <td><?=$pueblosTotalesMujeres44['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">COPILCO</th>
                    <td><?=$pueblosTotalesMujeres45['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">LA CANDELARIA</th>
                    <td><?=$pueblosTotalesMujeres46['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">LOS REYES HUEYTILAC</th>
                    <td><?=$pueblosTotalesMujeres47['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">PUEBLO DE SAN FRANCISCO CULHUACÁN</th>
                    <td><?=$pueblosTotalesMujeres48['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN PABLO TEPETLAPA</th>
                    <td><?=$pueblosTotalesMujeres49['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA ÚRSULA COAPA</th>
                    <td><?=$pueblosTotalesMujeres50['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CONTADERO</th>
                    <td><?=$pueblosTotalesMujeres51['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN LORENZO ACOPILCO</th>
                    <td><?=$pueblosTotalesMujeres52['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN MATEO TLALTENANGO</th>
                    <td><?=$pueblosTotalesMujeres53['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN PABLO CHIMALPA</th>
                    <td><?=$pueblosTotalesMujeres54['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN PEDRO CUAJIMALPA</th>
                    <td><?=$pueblosTotalesMujeres55['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN SIMÓN TOLNAHUAC</th>
                    <td><?=$pueblosTotalesMujeres56['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TLATELOLCO</th>
                    <td><?=$pueblosTotalesMujeres57['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CALPULTITLAN</th>
                    <td><?=$pueblosTotalesMujeres58['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CUAUHTEPEC</th>
                    <td><?=$pueblosTotalesMujeres59['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">MAGDALENA DE LAS SALINAS</th>
                    <td><?=$pueblosTotalesMujeres60['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN BARTOLO ATEPEHUACAN</th>
                    <td><?=$pueblosTotalesMujeres61['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN PEDRO ZACATENCO</th>
                    <td><?=$pueblosTotalesMujeres62['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA ISABEL TOLA</th>
                    <td><?=$pueblosTotalesMujeres63['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTIAGO ATEPETLAC</th>
                    <td><?=$pueblosTotalesMujeres64['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTIAGO ATZACOALCO</th>
                    <td><?=$pueblosTotalesMujeres65['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA ANITA ZACATLALMANCO </th>
                    <td><?=$pueblosTotalesMujeres66['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">ACULCO</th>
                    <td><?=$pueblosTotalesMujeres67['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CULHUACAN</th>
                    <td><?=$pueblosTotalesMujeres68['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">LA MAGDALENA ATLAZOLPA</th>
                    <td><?=$pueblosTotalesMujeres69['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">LOS REYES CULHUACAN</th>
                    <td><?=$pueblosTotalesMujeres70['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">MEXICALTZINGO</th>
                    <td><?=$pueblosTotalesMujeres71['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN ANDRÉS TETEPILCO</th>
                    <td><?=$pueblosTotalesMujeres72['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN ANDRÉS TOMATLAN</th>
                    <td><?=$pueblosTotalesMujeres73['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN JUANICO NEXTIPAC</th>
                    <td><?=$pueblosTotalesMujeres74['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN LORENZO TEZONCO</th>
                    <td><?=$pueblosTotalesMujeres75['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA CRUZ MEYEHUALCO</th>
                    <td><?=$pueblosTotalesMujeres76['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA MARÍA AZTAHUACAN</th>
                    <td><?=$pueblosTotalesMujeres77['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA MARÍA TOMATLAN</th>
                    <td><?=$pueblosTotalesMujeres78['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA MARTHA ACATITLA</th>
                    <td><?=$pueblosTotalesMujeres79['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">MAGDALENA CONTRERAS ATLICTIC</th>
                    <td><?=$pueblosTotalesMujeres80['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN BERNABÉ OCOTEPEC</th>
                    <td><?=$pueblosTotalesMujeres81['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN JERÓNIMO ACULCO-LIDICE</th>
                    <td><?=$pueblosTotalesMujeres82['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN NICOLÁS TOTOLAPAN</th>
                    <td><?=$pueblosTotalesMujeres83['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">POPOTLA</th>
                    <td><?=$pueblosTotalesMujeres84['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN DIEGO OCOYOACAC</th>
                    <td><?=$pueblosTotalesMujeres85['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN LORENZO TLALTENANGO</th>
                    <td><?=$pueblosTotalesMujeres86['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TACUBA</th>
                    <td><?=$pueblosTotalesMujeres87['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TACUBAYA</th>
                    <td><?=$pueblosTotalesMujeres88['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN AGUSTÍN OHTENCO</th>
                    <td><?=$pueblosTotalesMujeres89['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN ANTONIO TECOMITL</th>
                    <td><?=$pueblosTotalesMujeres90['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN BARTOLOMÉ XICOMULCO</th>
                    <td><?=$pueblosTotalesMujeres91['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN FRANCISCO TECOXPA</th>
                    <td><?=$pueblosTotalesMujeres92['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN JERÓNIMO MIACATLAN</th>
                    <td><?=$pueblosTotalesMujeres93['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN JUAN TEPENAHUAC</th>
                    <td><?=$pueblosTotalesMujeres94['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN LORENZO TLACOYUCAN</th>
                    <td><?=$pueblosTotalesMujeres95['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN PABLO OZTOTEPEC</th>
                    <td><?=$pueblosTotalesMujeres96['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN PEDRO ATOCPAN</th>
                    <td><?=$pueblosTotalesMujeres97['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN SALVADOR CUAUHTENCO</th>
                    <td><?=$pueblosTotalesMujeres98['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA ANA TLACOTENCO</th>
                    <td><?=$pueblosTotalesMujeres99['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN ANDRÉS MIXQUIC</th>
                    <td><?=$pueblosTotalesMujeres100['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN FRANCISCO TLALTENCO</th>
                    <td><?=$pueblosTotalesMujeres101['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN JUAN IXTAYOPAN</th>
                    <td><?=$pueblosTotalesMujeres102['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN NICOLÁS TETELCO</th>
                    <td><?=$pueblosTotalesMujeres103['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN PEDRO TLAHUAC</th>
                    <td><?=$pueblosTotalesMujeres104['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA CATARINA YECAHUIZOTL</th>
                    <td><?=$pueblosTotalesMujeres105['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTIAGO ZAPOTITLÁN</th>
                    <td><?=$pueblosTotalesMujeres106['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CHIMALCOYOC (LA ASUNCIÓN)</th>
                    <td><?=$pueblosTotalesMujeres107['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">MAGDALENA PETLACALCO</th>
                    <td><?=$pueblosTotalesMujeres108['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">PARRES EL GUARDA</th>
                    <td><?=$pueblosTotalesMujeres109['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN ANDRÉS TOTOLTEPEC</th>
                    <td><?=$pueblosTotalesMujeres110['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN LORENZO HUIPULCO</th>
                    <td><?=$pueblosTotalesMujeres111['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN MIGUEL AJUSCO</th>
                    <td><?=$pueblosTotalesMujeres112['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN MIGUEL TOPILEJO</th>
                    <td><?=$pueblosTotalesMujeres113['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN MIGUEL XICALCO</th>
                    <td><?=$pueblosTotalesMujeres114['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN PEDRO MÁRTIR</th>
                    <td><?=$pueblosTotalesMujeres115['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA URSULA XITLA</th>
                    <td><?=$pueblosTotalesMujeres116['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTO TOMÁS AJUSCO</th>
                    <td><?=$pueblosTotalesMujeres117['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">EL PEÑÓN DE LOS BAÑOS</th>
                    <td><?=$pueblosTotalesMujeres118['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">MAGDALENA MIXHIUCA</th>
                    <td><?=$pueblosTotalesMujeres119['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN ANDRÉS AHUAYUCAN</th>
                    <td><?=$pueblosTotalesMujeres120['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN FRANCISCO TLALNEPANTLA</th>
                    <td><?=$pueblosTotalesMujeres121['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN GREGORIO ATLAPULCO</th>
                    <td><?=$pueblosTotalesMujeres122['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN LORENZO ATEMOAYA</th>
                    <td><?=$pueblosTotalesMujeres123['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN LUCAS XOCHIMANCA</th>
                    <td><?=$pueblosTotalesMujeres124['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN LUIS TLAXIALTEMALCO</th>
                    <td><?=$pueblosTotalesMujeres125['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN MATEO XALPA</th>
                    <td><?=$pueblosTotalesMujeres126['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA CECILIA TEPETLAPA</th>
                    <td><?=$pueblosTotalesMujeres127['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA CRUZ ACALPIXCA</th>
                    <td><?=$pueblosTotalesMujeres130['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA CRUZ XOCHITEPEC</th>
                    <td><?=$pueblosTotalesMujeres131['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA MARÍA NATIVITAS</th>
                    <td><?=$pueblosTotalesMujeres132['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA MARÍA TEPEPAN</th>
                    <td><?=$pueblosTotalesMujeres133['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTIAGO TEPALCATLALPAN</th>
                    <td><?=$pueblosTotalesMujeres134['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTIAGO TULYEHUALCO</th>
                    <td><?=$pueblosTotalesMujeres135['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">NINGUNO</th>
                    <td><?=$pueblosTotalesMujeres0['userPorPueblo']?></td>
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
            
            <div class="mr-5"><b>Usuarios totales por Pueblos Originarios hombres<span class="float-right"></span></b></div>
          </div>
          <a class="card-footer text-info clearfix small z-1" data-toggle="collapse" href="#collapsePorPueblosHombres">
            <span class="float-left">Ver detalle</span>
            <span class="float-right">
              <i class="fas fa-angle-right"></i>
            </span>
          </a>
          <div class="collapse" id="collapsePorPueblosHombres">
            <div class="card card-body">
              <table class="table table-striped ">
                <tbody class="bg-light">
                <tr>
                    <th scope="row">AXOTLA</th>
                    <td><?=$pueblosTotalesHombres1['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CHIMALISTAC</th>
                    <td><?=$pueblosTotalesHombres2['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN BARTOLO AMEYALCO</th>
                    <td><?=$pueblosTotalesHombres3['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA FÉ DE VASCO DE QUIROGA</th>
                    <td><?=$pueblosTotalesHombres4['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA LUCÍA XANTEPEC</th>
                    <td><?=$pueblosTotalesHombres5['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA MARÍA NONOALCO</th>
                    <td><?=$pueblosTotalesHombres6['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA ROSA XOCHIAC</th>
                    <td><?=$pueblosTotalesHombres7['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TETELPAN</th>
                    <td><?=$pueblosTotalesHombres8['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TIZAPAN</th>
                    <td><?=$pueblosTotalesHombres9['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TLACOPAC</th>
                    <td><?=$pueblosTotalesHombres10['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">COLTONGO</th>
                    <td><?=$pueblosTotalesHombres11['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN ANDRES DE LAS SALINAS</th>
                    <td><?=$pueblosTotalesHombres12['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN ANDRÉS TETLANMAN</th>
                    <td><?=$pueblosTotalesHombres13['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN BARTOLO CAHUALTONGO</th>
                    <td><?=$pueblosTotalesHombres14['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN FRANCISCO TETECALA</th>
                    <td><?=$pueblosTotalesHombres15['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN JUAN TLILHUACA</th>
                    <td><?=$pueblosTotalesHombres16['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN LUCAS ATENCO</th>
                    <td><?=$pueblosTotalesHombres17['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN MARTIN XOCHINÁHUAC</th>
                    <td><?=$pueblosTotalesHombres18['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN MATEO XALTELOLCO</th>
                    <td><?=$pueblosTotalesHombres19['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN MIGUEL AMANTLA</th>
                    <td><?=$pueblosTotalesHombres20['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN PEDRO DE LAS SALINAS CALHUACATZINGO</th>
                    <td><?=$pueblosTotalesHombres21['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN PEDRO XALPA</th>
                    <td><?=$pueblosTotalesHombres22['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN SALVADOR NEXTENGO</th>
                    <td><?=$pueblosTotalesHombres23['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN SALVADOR XOCHIMANCA</th>
                    <td><?=$pueblosTotalesHombres24['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN SEBASTIÁN ATENCO</th>
                    <td><?=$pueblosTotalesHombres25['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN SIMÓN POCHTLAN</th>
                    <td><?=$pueblosTotalesHombres26['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA APOLONIA TEZCOLCO</th>
                    <td><?=$pueblosTotalesHombres27['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA BÁRBARA TETLANMAN, YOPICO</th>
                    <td><?=$pueblosTotalesHombres28['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA CATARINA ATZACUALCO</th>
                    <td><?=$pueblosTotalesHombres29['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA LUCIA TOMATLAN</th>
                    <td><?=$pueblosTotalesHombres30['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA MARÍA MALINALCO</th>
                    <td><?=$pueblosTotalesHombres31['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTIAGO AHUIZOTLA</th>
                    <td><?=$pueblosTotalesHombres32['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTO DOMINGO HUEXOTITLÁN</th>
                    <td><?=$pueblosTotalesHombres33['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTO TOMÁS TLAMATZINGO</th>
                    <td><?=$pueblosTotalesHombres34['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">ACTIPAN</th>
                    <td><?=$pueblosTotalesHombres35['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">LA PIEDAD</th>
                    <td><?=$pueblosTotalesHombres36['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">MIXCOAC</th>
                    <td><?=$pueblosTotalesHombres37['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN JUAN MALINALTONGO</th>
                    <td><?=$pueblosTotalesHombres38['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN SEBASTIÁN XOCO</th>
                    <td><?=$pueblosTotalesHombres39['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN SIMÓN TICUMAC</th>
                    <td><?=$pueblosTotalesHombres40['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA CRUZ ATOYAC</th>
                    <td><?=$pueblosTotalesHombres41['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA CRUZ TLACOQUEMECATL</th>
                    <td><?=$pueblosTotalesHombres42['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA MARÍA NATIVITAS TEPETLALTZINCO</th>
                    <td><?=$pueblosTotalesHombres43['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CHURUBUSCO</th>
                    <td><?=$pueblosTotalesHombres44['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">COPILCO</th>
                    <td><?=$pueblosTotalesHombres45['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">LA CANDELARIA</th>
                    <td><?=$pueblosTotalesHombres46['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">LOS REYES HUEYTILAC</th>
                    <td><?=$pueblosTotalesHombres47['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">PUEBLO DE SAN FRANCISCO CULHUACÁN</th>
                    <td><?=$pueblosTotalesHombres48['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN PABLO TEPETLAPA</th>
                    <td><?=$pueblosTotalesHombres49['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA ÚRSULA COAPA</th>
                    <td><?=$pueblosTotalesHombres50['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CONTADERO</th>
                    <td><?=$pueblosTotalesHombres51['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN LORENZO ACOPILCO</th>
                    <td><?=$pueblosTotalesHombres52['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN MATEO TLALTENANGO</th>
                    <td><?=$pueblosTotalesHombres53['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN PABLO CHIMALPA</th>
                    <td><?=$pueblosTotalesHombres54['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN PEDRO CUAJIMALPA</th>
                    <td><?=$pueblosTotalesHombres55['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN SIMÓN TOLNAHUAC</th>
                    <td><?=$pueblosTotalesHombres56['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TLATELOLCO</th>
                    <td><?=$pueblosTotalesHombres57['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CALPULTITLAN</th>
                    <td><?=$pueblosTotalesHombres58['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CUAUHTEPEC</th>
                    <td><?=$pueblosTotalesHombres59['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">MAGDALENA DE LAS SALINAS</th>
                    <td><?=$pueblosTotalesHombres60['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN BARTOLO ATEPEHUACAN</th>
                    <td><?=$pueblosTotalesHombres61['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN PEDRO ZACATENCO</th>
                    <td><?=$pueblosTotalesHombres62['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA ISABEL TOLA</th>
                    <td><?=$pueblosTotalesHombres63['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTIAGO ATEPETLAC</th>
                    <td><?=$pueblosTotalesHombres64['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTIAGO ATZACOALCO</th>
                    <td><?=$pueblosTotalesHombres65['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA ANITA ZACATLALMANCO </th>
                    <td><?=$pueblosTotalesHombres66['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">ACULCO</th>
                    <td><?=$pueblosTotalesHombres67['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CULHUACAN</th>
                    <td><?=$pueblosTotalesHombres68['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">LA MAGDALENA ATLAZOLPA</th>
                    <td><?=$pueblosTotalesHombres69['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">LOS REYES CULHUACAN</th>
                    <td><?=$pueblosTotalesHombres70['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">MEXICALTZINGO</th>
                    <td><?=$pueblosTotalesHombres71['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN ANDRÉS TETEPILCO</th>
                    <td><?=$pueblosTotalesHombres72['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN ANDRÉS TOMATLAN</th>
                    <td><?=$pueblosTotalesHombres73['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN JUANICO NEXTIPAC</th>
                    <td><?=$pueblosTotalesHombres74['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN LORENZO TEZONCO</th>
                    <td><?=$pueblosTotalesHombres75['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA CRUZ MEYEHUALCO</th>
                    <td><?=$pueblosTotalesHombres76['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA MARÍA AZTAHUACAN</th>
                    <td><?=$pueblosTotalesHombres77['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA MARÍA TOMATLAN</th>
                    <td><?=$pueblosTotalesHombres78['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA MARTHA ACATITLA</th>
                    <td><?=$pueblosTotalesHombres79['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">MAGDALENA CONTRERAS ATLICTIC</th>
                    <td><?=$pueblosTotalesHombres80['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN BERNABÉ OCOTEPEC</th>
                    <td><?=$pueblosTotalesHombres81['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN JERÓNIMO ACULCO-LIDICE</th>
                    <td><?=$pueblosTotalesHombres82['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN NICOLÁS TOTOLAPAN</th>
                    <td><?=$pueblosTotalesHombres83['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">POPOTLA</th>
                    <td><?=$pueblosTotalesHombres84['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN DIEGO OCOYOACAC</th>
                    <td><?=$pueblosTotalesHombres85['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN LORENZO TLALTENANGO</th>
                    <td><?=$pueblosTotalesHombres86['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TACUBA</th>
                    <td><?=$pueblosTotalesHombres87['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">TACUBAYA</th>
                    <td><?=$pueblosTotalesHombres88['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN AGUSTÍN OHTENCO</th>
                    <td><?=$pueblosTotalesHombres89['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN ANTONIO TECOMITL</th>
                    <td><?=$pueblosTotalesHombres90['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN BARTOLOMÉ XICOMULCO</th>
                    <td><?=$pueblosTotalesHombres91['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN FRANCISCO TECOXPA</th>
                    <td><?=$pueblosTotalesHombres92['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN JERÓNIMO MIACATLAN</th>
                    <td><?=$pueblosTotalesHombres93['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN JUAN TEPENAHUAC</th>
                    <td><?=$pueblosTotalesHombres94['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN LORENZO TLACOYUCAN</th>
                    <td><?=$pueblosTotalesHombres95['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN PABLO OZTOTEPEC</th>
                    <td><?=$pueblosTotalesHombres96['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN PEDRO ATOCPAN</th>
                    <td><?=$pueblosTotalesHombres97['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN SALVADOR CUAUHTENCO</th>
                    <td><?=$pueblosTotalesHombres98['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA ANA TLACOTENCO</th>
                    <td><?=$pueblosTotalesHombres99['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN ANDRÉS MIXQUIC</th>
                    <td><?=$pueblosTotalesHombres100['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN FRANCISCO TLALTENCO</th>
                    <td><?=$pueblosTotalesHombres101['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN JUAN IXTAYOPAN</th>
                    <td><?=$pueblosTotalesHombres102['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN NICOLÁS TETELCO</th>
                    <td><?=$pueblosTotalesHombres103['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN PEDRO TLAHUAC</th>
                    <td><?=$pueblosTotalesHombres104['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA CATARINA YECAHUIZOTL</th>
                    <td><?=$pueblosTotalesHombres105['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTIAGO ZAPOTITLÁN</th>
                    <td><?=$pueblosTotalesHombres106['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">CHIMALCOYOC (LA ASUNCIÓN)</th>
                    <td><?=$pueblosTotalesHombres107['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">MAGDALENA PETLACALCO</th>
                    <td><?=$pueblosTotalesHombres108['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">PARRES EL GUARDA</th>
                    <td><?=$pueblosTotalesHombres109['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN ANDRÉS TOTOLTEPEC</th>
                    <td><?=$pueblosTotalesHombres110['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN LORENZO HUIPULCO</th>
                    <td><?=$pueblosTotalesHombres111['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN MIGUEL AJUSCO</th>
                    <td><?=$pueblosTotalesHombres112['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN MIGUEL TOPILEJO</th>
                    <td><?=$pueblosTotalesHombres113['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN MIGUEL XICALCO</th>
                    <td><?=$pueblosTotalesHombres114['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN PEDRO MÁRTIR</th>
                    <td><?=$pueblosTotalesHombres115['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA URSULA XITLA</th>
                    <td><?=$pueblosTotalesHombres116['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTO TOMÁS AJUSCO</th>
                    <td><?=$pueblosTotalesHombres117['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">EL PEÑÓN DE LOS BAÑOS</th>
                    <td><?=$pueblosTotalesHombres118['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">MAGDALENA MIXHIUCA</th>
                    <td><?=$pueblosTotalesHombres119['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN ANDRÉS AHUAYUCAN</th>
                    <td><?=$pueblosTotalesHombres120['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN FRANCISCO TLALNEPANTLA</th>
                    <td><?=$pueblosTotalesHombres121['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN GREGORIO ATLAPULCO</th>
                    <td><?=$pueblosTotalesHombres122['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN LORENZO ATEMOAYA</th>
                    <td><?=$pueblosTotalesHombres123['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN LUCAS XOCHIMANCA</th>
                    <td><?=$pueblosTotalesHombres124['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN LUIS TLAXIALTEMALCO</th>
                    <td><?=$pueblosTotalesHombres125['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SAN MATEO XALPA</th>
                    <td><?=$pueblosTotalesHombres126['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA CECILIA TEPETLAPA</th>
                    <td><?=$pueblosTotalesHombres127['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA CRUZ ACALPIXCA</th>
                    <td><?=$pueblosTotalesHombres130['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA CRUZ XOCHITEPEC</th>
                    <td><?=$pueblosTotalesHombres131['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA MARÍA NATIVITAS</th>
                    <td><?=$pueblosTotalesHombres132['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTA MARÍA TEPEPAN</th>
                    <td><?=$pueblosTotalesHombres133['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTIAGO TEPALCATLALPAN</th>
                    <td><?=$pueblosTotalesHombres134['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">SANTIAGO TULYEHUALCO</th>
                    <td><?=$pueblosTotalesHombres135['userPorPueblo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">NINGUNO</th>
                    <td><?=$pueblosTotalesHombres0['userPorPueblo']?></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>
  </div>


   <!-- Usuarios inscritos por Ocupacion-->
   <div class="row">
    <div class="col-xl-6 col-sm-6 mb-3">
      <div class="card text-white bg-secondary o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
            <i class="fas fa-user-md"></i>
            </div>
            
            <div class="mr-5"><b>Usuarios totales por Ocupación<span class="float-right"></span></b></div>
          </div>
          <a class="card-footer text-white clearfix small z-1" data-toggle="collapse" href="#collapsePorOcupacion">
            <span class="float-left">Ver detalle</span>
            <span class="float-right">
              <i class="fas fa-angle-right"></i>
            </span>
          </a>
          <div class="collapse" id="collapsePorOcupacion">
            <div class="card card-body">
              <table class="table table-striped ">
                <tbody class="bg-secondary">
                  <tr>
                    <th scope="row">Estudiantes</th>
                    <td><?=$totalesOcupacion1['userPorOcupacion']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Personas en actividades sin ingresos económicos</th>
                    <td><?=$totalesOcupacion2['userPorOcupacion']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Personas profesionistas y técnicas</th>
                    <td><?=$totalesOcupacion3['userPorOcupacion']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Personas comerciantes, empleadas en ventas y agentes de ventas</th>
                    <td><?=$totalesOcupacion4['userPorOcupacion']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Personas trabajadoras artesanales, en la construcción y otros oficios</th>
                    <td><?=$totalesOcupacion5['userPorOcupacion']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Personas operadoras de maquinaria industrial, ensambladoras, choferes y conductoras de transporte</th>
                    <td><?=$totalesOcupacion6['userPorOcupacion']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Personas trabajadoras en actividades agrícolas, ganaderas, forestales, caza y pesca</th>
                    <td><?=$totalesOcupacion7['userPorOcupacion']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Personas trabajadoras en servicios personales y de vigilancia</th>
                    <td><?=$totalesOcupacion8['userPorOcupacion']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Personas trabajadoras auxiliares en actividades administrativas</th>
                    <td><?=$totalesOcupacion9['userPorOcupacion']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Personas funcionarias, directoras y jefas</th>
                    <td><?=$totalesOcupacion10['userPorOcupacion']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Otras actividades no especificadas</th>
                    <td><?=$totalesOcupacion11['userPorOcupacion']?></td>
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
            
            <div class="mr-5"><b>Usuarios totales por Ocupación mujeres <span class="float-right"></span></b></div>
          </div>
          <a class="card-footer text-white clearfix small z-1" data-toggle="collapse" href="#collapsePorOcupacionMujeres">
            <span class="float-left">Ver detalle</span>
            <span class="float-right">
              <i class="fas fa-angle-right"></i>
            </span>
          </a>
          <div class="collapse" id="collapsePorOcupacionMujeres">
            <div class="card card-body">
              <table class="table table-striped ">
                <tbody class="bg-secondary">
                <tr>
                    <th scope="row">Estudiantes</th>
                    <td><?=$totalesOcupacionMujeres1['userPorOcupacion']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Personas en actividades sin ingresos económicos</th>
                    <td><?=$totalesOcupacionMujeres2['userPorOcupacion']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Personas profesionistas y técnicas</th>
                    <td><?=$totalesOcupacionMujeres3['userPorOcupacion']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Personas comerciantes, empleadas en ventas y agentes de ventas</th>
                    <td><?=$totalesOcupacionMujeres4['userPorOcupacion']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Personas trabajadoras artesanales, en la construcción y otros oficios</th>
                    <td><?=$totalesOcupacionMujeres5['userPorOcupacion']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Personas operadoras de maquinaria industrial, ensambladoras, choferes y conductoras de transporte</th>
                    <td><?=$totalesOcupacionMujeres6['userPorOcupacion']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Personas trabajadoras en actividades agrícolas, ganaderas, forestales, caza y pesca</th>
                    <td><?=$totalesOcupacionMujeres7['userPorOcupacion']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Personas trabajadoras en servicios personales y de vigilancia</th>
                    <td><?=$totalesOcupacionMujeres8['userPorOcupacion']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Personas trabajadoras auxiliares en actividades administrativas</th>
                    <td><?=$totalesOcupacionMujeres9['userPorOcupacion']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Personas funcionarias, directoras y jefas</th>
                    <td><?=$totalesOcupacionMujeres10['userPorOcupacion']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Otras actividades no especificadas</th>
                    <td><?=$totalesOcupacionMujeres11['userPorOcupacion']?></td>
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
            
            <div class="mr-5"><b>Usuarios totales por Ocupación hombres<span class="float-right"></span></b></div>
          </div>
          <a class="card-footer text-white clearfix small z-1" data-toggle="collapse" href="#collapsePorOcupacionHombres">
            <span class="float-left">Ver detalle</span>
            <span class="float-right">
              <i class="fas fa-angle-right"></i>
            </span>
          </a>
          <div class="collapse" id="collapsePorOcupacionHombres">
            <div class="card card-body">
              <table class="table table-striped ">
                <tbody class="bg-secondary">
                <tr>
                    <th scope="row">Estudiantes</th>
                    <td><?=$totalesOcupacionHombres1['userPorOcupacion']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Personas en actividades sin ingresos económicos</th>
                    <td><?=$totalesOcupacionHombres2['userPorOcupacion']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Personas profesionistas y técnicas</th>
                    <td><?=$totalesOcupacionHombres3['userPorOcupacion']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Personas comerciantes, empleadas en ventas y agentes de ventas</th>
                    <td><?=$totalesOcupacionHombres4['userPorOcupacion']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Personas trabajadoras artesanales, en la construcción y otros oficios</th>
                    <td><?=$totalesOcupacionHombres5['userPorOcupacion']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Personas operadoras de maquinaria industrial, ensambladoras, choferes y conductoras de transporte</th>
                    <td><?=$totalesOcupacionHombres6['userPorOcupacion']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Personas trabajadoras en actividades agrícolas, ganaderas, forestales, caza y pesca</th>
                    <td><?=$totalesOcupacionHombres7['userPorOcupacion']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Personas trabajadoras en servicios personales y de vigilancia</th>
                    <td><?=$totalesOcupacionHombres8['userPorOcupacion']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Personas trabajadoras auxiliares en actividades administrativas</th>
                    <td><?=$totalesOcupacionHombres9['userPorOcupacion']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Personas funcionarias, directoras y jefas</th>
                    <td><?=$totalesOcupacionHombres10['userPorOcupacion']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Otras actividades no especificadas</th>
                    <td><?=$totalesOcupacionHombres11['userPorOcupacion']?></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>
  </div>

   <!-- Usuarios inscritos por Ocupacion segmento mayores de 15 años-->
   <div class="row">
    <div class="col-xl-6 col-sm-6 mb-3">
      <div class="card text-white bg-secondary o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
            <i class="fas fa-user-md"></i>
            </div>
            
            <div class="mr-5"><b>Usuarios  por Ocupación mayores de 15 años<span class="float-right"></span></b></div>
          </div>
          <a class="card-footer text-white clearfix small z-1" data-toggle="collapse" href="#collapsePorOcupacion15mas">
            <span class="float-left">Ver detalle</span>
            <span class="float-right">
              <i class="fas fa-angle-right"></i>
            </span>
          </a>
          <div class="collapse" id="collapsePorOcupacion15mas">
            <div class="card card-body">
              <table class="table table-striped ">
                <tbody class="bg-secondary">
                  <tr>
                    <th scope="row">Estudiantes</th>
                    <td><?=$totalesOcupacion15mas1['userPorOcupacion']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Personas en actividades sin ingresos económicos</th>
                    <td><?=$totalesOcupacion15mas2['userPorOcupacion']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Personas profesionistas y técnicas</th>
                    <td><?=$totalesOcupacion15mas3['userPorOcupacion']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Personas comerciantes, empleadas en ventas y agentes de ventas</th>
                    <td><?=$totalesOcupacion15mas4['userPorOcupacion']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Personas trabajadoras artesanales, en la construcción y otros oficios</th>
                    <td><?=$totalesOcupacion15mas5['userPorOcupacion']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Personas operadoras de maquinaria industrial, ensambladoras, choferes y conductoras de transporte</th>
                    <td><?=$totalesOcupacion15mas6['userPorOcupacion']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Personas trabajadoras en actividades agrícolas, ganaderas, forestales, caza y pesca</th>
                    <td><?=$totalesOcupacion15mas7['userPorOcupacion']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Personas trabajadoras en servicios personales y de vigilancia</th>
                    <td><?=$totalesOcupacion15mas8['userPorOcupacion']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Personas trabajadoras auxiliares en actividades administrativas</th>
                    <td><?=$totalesOcupacion15mas9['userPorOcupacion']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Personas funcionarias, directoras y jefas</th>
                    <td><?=$totalesOcupacion15mas10['userPorOcupacion']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Otras actividades no especificadas</th>
                    <td><?=$totalesOcupacion15mas11['userPorOcupacion']?></td>
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
            
            <div class="mr-5"><b>Usuarios por Ocupación mayores de 15 años mujeres <span class="float-right"></span></b></div>
          </div>
          <a class="card-footer text-white clearfix small z-1" data-toggle="collapse" href="#collapsePorOcupacionMujeres15mas">
            <span class="float-left">Ver detalle</span>
            <span class="float-right">
              <i class="fas fa-angle-right"></i>
            </span>
          </a>
          <div class="collapse" id="collapsePorOcupacionMujeres15mas">
            <div class="card card-body">
              <table class="table table-striped ">
                <tbody class="bg-secondary">
                <tr>
                    <th scope="row">Estudiantes</th>
                    <td><?=$totalesOcupacion15masMujeres1['userPorOcupacion']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Personas en actividades sin ingresos económicos</th>
                    <td><?=$totalesOcupacion15masMujeres2['userPorOcupacion']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Personas profesionistas y técnicas</th>
                    <td><?=$totalesOcupacion15masMujeres3['userPorOcupacion']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Personas comerciantes, empleadas en ventas y agentes de ventas</th>
                    <td><?=$totalesOcupacion15masMujeres4['userPorOcupacion']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Personas trabajadoras artesanales, en la construcción y otros oficios</th>
                    <td><?=$totalesOcupacion15masMujeres5['userPorOcupacion']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Personas operadoras de maquinaria industrial, ensambladoras, choferes y conductoras de transporte</th>
                    <td><?=$totalesOcupacion15masMujeres6['userPorOcupacion']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Personas trabajadoras en actividades agrícolas, ganaderas, forestales, caza y pesca</th>
                    <td><?=$totalesOcupacion15masMujeres7['userPorOcupacion']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Personas trabajadoras en servicios personales y de vigilancia</th>
                    <td><?=$totalesOcupacion15masMujeres8['userPorOcupacion']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Personas trabajadoras auxiliares en actividades administrativas</th>
                    <td><?=$totalesOcupacion15masMujeres9['userPorOcupacion']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Personas funcionarias, directoras y jefas</th>
                    <td><?=$totalesOcupacion15masMujeres10['userPorOcupacion']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Otras actividades no especificadas</th>
                    <td><?=$totalesOcupacion15masMujeres11['userPorOcupacion']?></td>
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
            
            <div class="mr-5"><b>Usuarios por Ocupación mayores de 15 años hombres<span class="float-right"></span></b></div>
          </div>
          <a class="card-footer text-white clearfix small z-1" data-toggle="collapse" href="#collapsePorOcupacionHombres15mas">
            <span class="float-left">Ver detalle</span>
            <span class="float-right">
              <i class="fas fa-angle-right"></i>
            </span>
          </a>
          <div class="collapse" id="collapsePorOcupacionHombres15mas">
            <div class="card card-body">
              <table class="table table-striped ">
                <tbody class="bg-secondary">
                <tr>
                    <th scope="row">Estudiantes</th>
                    <td><?=$totalesOcupacion15masHombres1['userPorOcupacion']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Personas en actividades sin ingresos económicos</th>
                    <td><?=$totalesOcupacion15masHombres2['userPorOcupacion']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Personas profesionistas y técnicas</th>
                    <td><?=$totalesOcupacion15masHombres3['userPorOcupacion']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Personas comerciantes, empleadas en ventas y agentes de ventas</th>
                    <td><?=$totalesOcupacion15masHombres4['userPorOcupacion']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Personas trabajadoras artesanales, en la construcción y otros oficios</th>
                    <td><?=$totalesOcupacion15masHombres5['userPorOcupacion']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Personas operadoras de maquinaria industrial, ensambladoras, choferes y conductoras de transporte</th>
                    <td><?=$totalesOcupacion15masHombres6['userPorOcupacion']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Personas trabajadoras en actividades agrícolas, ganaderas, forestales, caza y pesca</th>
                    <td><?=$totalesOcupacion15masHombres7['userPorOcupacion']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Personas trabajadoras en servicios personales y de vigilancia</th>
                    <td><?=$totalesOcupacion15masHombres8['userPorOcupacion']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Personas trabajadoras auxiliares en actividades administrativas</th>
                    <td><?=$totalesOcupacion15masHombres9['userPorOcupacion']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Personas funcionarias, directoras y jefas</th>
                    <td><?=$totalesOcupacion15masHombres10['userPorOcupacion']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Otras actividades no especificadas</th>
                    <td><?=$totalesOcupacion15masHombres11['userPorOcupacion']?></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>
  </div>

    <!-- Usuarios totales por  Gruado Estudios-->
    <div class="row">
    <div class="col-xl-6 col-sm-6 mb-3">
      <div class="card text-info bg-light o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
            <i class="fas fa-graduation-cap"></i>
            </div>
            
            <div class="mr-5"><b>Usuarios totales por Grado de Estudios <span class="float-right"></span></b></div>
          </div>
          <a class="card-footer text-info clearfix small z-1" data-toggle="collapse" href="#collapsePorGradoEstudios">
            <span class="float-left">Ver detalle</span>
            <span class="float-right">
              <i class="fas fa-angle-right"></i>
            </span>
          </a>
          <div class="collapse" id="collapsePorGradoEstudios">
            <div class="card card-body">
              <table class="table table-striped ">
                <tbody class="bg-light">
                  <tr>
                    <th scope="row">Sin estudios previos</th>
                    <td><?=$gradoEstudiosTotales1['userPorGradoEstudios']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Preprimaria</th>
                    <td><?=$gradoEstudiosTotales2['userPorGradoEstudios']?></td>
                  </tr>
                  <tr>
                    <th scope="row">1º de primaria</th>
                    <td><?=$gradoEstudiosTotales3['userPorGradoEstudios']?></td>
                  </tr>
                  <tr>
                    <th scope="row">2º de primaria</th>
                    <td><?=$gradoEstudiosTotales4['userPorGradoEstudios']?></td>
                  </tr>
                  <tr>
                    <th scope="row">3º de primaria</th>
                    <td><?=$gradoEstudiosTotales5['userPorGradoEstudios']?></td>
                  </tr>
                  <tr>
                    <th scope="row">4º de primaria</th>
                    <td><?=$gradoEstudiosTotales6['userPorGradoEstudios']?></td>
                  </tr>
                  <tr>
                    <th scope="row">5º de primaria</th>
                    <td><?=$gradoEstudiosTotales7['userPorGradoEstudios']?></td>
                  </tr>
                  <tr>
                    <th scope="row">6º de primaria</th>
                    <td><?=$gradoEstudiosTotales8['userPorGradoEstudios']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Primaria con certificado</th>
                    <td><?=$gradoEstudiosTotales9['userPorGradoEstudios']?></td>
                  </tr>
                  <tr>
                    <th scope="row">1º de secundaria</th>
                    <td><?=$gradoEstudiosTotales10['userPorGradoEstudios']?></td>
                  </tr>
                  <tr>
                    <th scope="row">2º de secundaria</th>
                    <td><?=$gradoEstudiosTotales11['userPorGradoEstudios']?></td>
                  </tr>
                  <tr>
                    <th scope="row">3º de secundaria</th>
                    <td><?=$gradoEstudiosTotales12['userPorGradoEstudios']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Secundaria con certificado</th>
                    <td><?=$gradoEstudiosTotales13['userPorGradoEstudios']?></td>
                  </tr>
                  <tr>
                    <th scope="row">1er. semestre de bachillerato</th>
                    <td><?=$gradoEstudiosTotales14['userPorGradoEstudios']?></td>
                  </tr>
                  <tr>
                    <th scope="row">2er. semestre de bachillerato</th>
                    <td><?=$gradoEstudiosTotales15['userPorGradoEstudios']?></td>
                  </tr>
                  <tr>
                    <th scope="row">3er. semestre de bachillerato</th>
                    <td><?=$gradoEstudiosTotales16['userPorGradoEstudios']?></td>
                  </tr>
                  <tr>
                    <th scope="row">4er. semestre de bachillerato</th>
                    <td><?=$gradoEstudiosTotales17['userPorGradoEstudios']?></td>
                  </tr>
                  <tr>
                    <th scope="row">5er. semestre de bachillerato</th>
                    <td><?=$gradoEstudiosTotales18['userPorGradoEstudios']?></td>
                  </tr>
                  <tr>
                    <th scope="row">6er. semestre de bachillerato</th>
                    <td><?=$gradoEstudiosTotales19['userPorGradoEstudios']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Bachillerato con certificado</th>
                    <td><?=$gradoEstudiosTotales20['userPorGradoEstudios']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Carrera técnica</th>
                    <td><?=$gradoEstudiosTotales21['userPorGradoEstudios']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Licenciatura trunca</th>
                    <td><?=$gradoEstudiosTotales22['userPorGradoEstudios']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Licenciatura sin título</th>
                    <td><?=$gradoEstudiosTotales23['userPorGradoEstudios']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Licenciatura con título</th>
                    <td><?=$gradoEstudiosTotales24['userPorGradoEstudios']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Posgrado</th>
                    <td><?=$gradoEstudiosTotales25['userPorGradoEstudios']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Posgrado con título</th>
                    <td><?=$gradoEstudiosTotales26['userPorGradoEstudios']?></td>
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
            
            <div class="mr-5"><b>Usuarios totales por Grado de Estudios mujeres<span class="float-right"></span></b></div>
          </div>
          <a class="card-footer text-info clearfix small z-1" data-toggle="collapse" href="#collapsePorGradoEstudiosMujeres">
            <span class="float-left">Ver detalle</span>
            <span class="float-right">
              <i class="fas fa-angle-right"></i>
            </span>
          </a>
          <div class="collapse" id="collapsePorGradoEstudiosMujeres">
            <div class="card card-body">
              <table class="table table-striped ">
                <tbody class="bg-light">
                <tr>
                    <th scope="row">Sin estudios previos</th>
                    <td><?=$gradoEstudiosTotalesMujeres1['userPorGradoEstudios']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Preprimaria</th>
                    <td><?=$gradoEstudiosTotalesMujeres2['userPorGradoEstudios']?></td>
                  </tr>
                  <tr>
                    <th scope="row">1º de primaria</th>
                    <td><?=$gradoEstudiosTotalesMujeres3['userPorGradoEstudios']?></td>
                  </tr>
                  <tr>
                    <th scope="row">2º de primaria</th>
                    <td><?=$gradoEstudiosTotalesMujeres4['userPorGradoEstudios']?></td>
                  </tr>
                  <tr>
                    <th scope="row">3º de primaria</th>
                    <td><?=$gradoEstudiosTotalesMujeres5['userPorGradoEstudios']?></td>
                  </tr>
                  <tr>
                    <th scope="row">4º de primaria</th>
                    <td><?=$gradoEstudiosTotalesMujeres6['userPorGradoEstudios']?></td>
                  </tr>
                  <tr>
                    <th scope="row">5º de primaria</th>
                    <td><?=$gradoEstudiosTotalesMujeres7['userPorGradoEstudios']?></td>
                  </tr>
                  <tr>
                    <th scope="row">6º de primaria</th>
                    <td><?=$gradoEstudiosTotalesMujeres8['userPorGradoEstudios']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Primaria con certificado</th>
                    <td><?=$gradoEstudiosTotalesMujeres9['userPorGradoEstudios']?></td>
                  </tr>
                  <tr>
                    <th scope="row">1º de secundaria</th>
                    <td><?=$gradoEstudiosTotalesMujeres10['userPorGradoEstudios']?></td>
                  </tr>
                  <tr>
                    <th scope="row">2º de secundaria</th>
                    <td><?=$gradoEstudiosTotalesMujeres11['userPorGradoEstudios']?></td>
                  </tr>
                  <tr>
                    <th scope="row">3º de secundaria</th>
                    <td><?=$gradoEstudiosTotalesMujeres12['userPorGradoEstudios']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Secundaria con certificado</th>
                    <td><?=$gradoEstudiosTotalesMujeres13['userPorGradoEstudios']?></td>
                  </tr>
                  <tr>
                    <th scope="row">1er. semestre de bachillerato</th>
                    <td><?=$gradoEstudiosTotalesMujeres14['userPorGradoEstudios']?></td>
                  </tr>
                  <tr>
                    <th scope="row">2er. semestre de bachillerato</th>
                    <td><?=$gradoEstudiosTotalesMujeres15['userPorGradoEstudios']?></td>
                  </tr>
                  <tr>
                    <th scope="row">3er. semestre de bachillerato</th>
                    <td><?=$gradoEstudiosTotalesMujeres16['userPorGradoEstudios']?></td>
                  </tr>
                  <tr>
                    <th scope="row">4er. semestre de bachillerato</th>
                    <td><?=$gradoEstudiosTotalesMujeres17['userPorGradoEstudios']?></td>
                  </tr>
                  <tr>
                    <th scope="row">5er. semestre de bachillerato</th>
                    <td><?=$gradoEstudiosTotalesMujeres18['userPorGradoEstudios']?></td>
                  </tr>
                  <tr>
                    <th scope="row">6er. semestre de bachillerato</th>
                    <td><?=$gradoEstudiosTotalesMujeres19['userPorGradoEstudios']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Bachillerato con certificado</th>
                    <td><?=$gradoEstudiosTotalesMujeres20['userPorGradoEstudios']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Carrera técnica</th>
                    <td><?=$gradoEstudiosTotalesMujeres21['userPorGradoEstudios']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Licenciatura trunca</th>
                    <td><?=$gradoEstudiosTotalesMujeres22['userPorGradoEstudios']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Licenciatura sin título</th>
                    <td><?=$gradoEstudiosTotalesMujeres23['userPorGradoEstudios']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Licenciatura con título</th>
                    <td><?=$gradoEstudiosTotalesMujeres24['userPorGradoEstudios']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Posgrado</th>
                    <td><?=$gradoEstudiosTotalesMujeres25['userPorGradoEstudios']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Posgrado con título</th>
                    <td><?=$gradoEstudiosTotalesMujeres26['userPorGradoEstudios']?></td>
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
            
            <div class="mr-5"><b>Usuarios totales por Grado de Estudios hombres<span class="float-right"></span></b></div>
          </div>
          <a class="card-footer text-info clearfix small z-1" data-toggle="collapse" href="#collapsePorGradoEstudiosHombres">
            <span class="float-left">Ver detalle</span>
            <span class="float-right">
              <i class="fas fa-angle-right"></i>
            </span>
          </a>
          <div class="collapse" id="collapsePorGradoEstudiosHombres">
            <div class="card card-body">
              <table class="table table-striped ">
                <tbody class="bg-light">
                <tr>
                    <th scope="row">Sin estudios previos</th>
                    <td><?=$gradoEstudiosTotalesHombres1['userPorGradoEstudios']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Preprimaria</th>
                    <td><?=$gradoEstudiosTotalesHombres2['userPorGradoEstudios']?></td>
                  </tr>
                  <tr>
                    <th scope="row">1º de primaria</th>
                    <td><?=$gradoEstudiosTotalesHombres3['userPorGradoEstudios']?></td>
                  </tr>
                  <tr>
                    <th scope="row">2º de primaria</th>
                    <td><?=$gradoEstudiosTotalesHombres4['userPorGradoEstudios']?></td>
                  </tr>
                  <tr>
                    <th scope="row">3º de primaria</th>
                    <td><?=$gradoEstudiosTotalesHombres5['userPorGradoEstudios']?></td>
                  </tr>
                  <tr>
                    <th scope="row">4º de primaria</th>
                    <td><?=$gradoEstudiosTotalesHombres6['userPorGradoEstudios']?></td>
                  </tr>
                  <tr>
                    <th scope="row">5º de primaria</th>
                    <td><?=$gradoEstudiosTotalesHombres7['userPorGradoEstudios']?></td>
                  </tr>
                  <tr>
                    <th scope="row">6º de primaria</th>
                    <td><?=$gradoEstudiosTotalesHombres8['userPorGradoEstudios']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Primaria con certificado</th>
                    <td><?=$gradoEstudiosTotalesHombres9['userPorGradoEstudios']?></td>
                  </tr>
                  <tr>
                    <th scope="row">1º de secundaria</th>
                    <td><?=$gradoEstudiosTotalesHombres10['userPorGradoEstudios']?></td>
                  </tr>
                  <tr>
                    <th scope="row">2º de secundaria</th>
                    <td><?=$gradoEstudiosTotalesHombres11['userPorGradoEstudios']?></td>
                  </tr>
                  <tr>
                    <th scope="row">3º de secundaria</th>
                    <td><?=$gradoEstudiosTotalesHombres12['userPorGradoEstudios']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Secundaria con certificado</th>
                    <td><?=$gradoEstudiosTotalesHombres13['userPorGradoEstudios']?></td>
                  </tr>
                  <tr>
                    <th scope="row">1er. semestre de bachillerato</th>
                    <td><?=$gradoEstudiosTotalesHombres14['userPorGradoEstudios']?></td>
                  </tr>
                  <tr>
                    <th scope="row">2er. semestre de bachillerato</th>
                    <td><?=$gradoEstudiosTotalesHombres15['userPorGradoEstudios']?></td>
                  </tr>
                  <tr>
                    <th scope="row">3er. semestre de bachillerato</th>
                    <td><?=$gradoEstudiosTotalesHombres16['userPorGradoEstudios']?></td>
                  </tr>
                  <tr>
                    <th scope="row">4er. semestre de bachillerato</th>
                    <td><?=$gradoEstudiosTotalesHombres17['userPorGradoEstudios']?></td>
                  </tr>
                  <tr>
                    <th scope="row">5er. semestre de bachillerato</th>
                    <td><?=$gradoEstudiosTotalesHombres18['userPorGradoEstudios']?></td>
                  </tr>
                  <tr>
                    <th scope="row">6er. semestre de bachillerato</th>
                    <td><?=$gradoEstudiosTotalesHombres19['userPorGradoEstudios']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Bachillerato con certificado</th>
                    <td><?=$gradoEstudiosTotalesHombres20['userPorGradoEstudios']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Carrera técnica</th>
                    <td><?=$gradoEstudiosTotalesHombres21['userPorGradoEstudios']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Licenciatura trunca</th>
                    <td><?=$gradoEstudiosTotalesHombres22['userPorGradoEstudios']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Licenciatura sin título</th>
                    <td><?=$gradoEstudiosTotalesHombres23['userPorGradoEstudios']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Licenciatura con título</th>
                    <td><?=$gradoEstudiosTotalesHombres24['userPorGradoEstudios']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Posgrado</th>
                    <td><?=$gradoEstudiosTotalesHombres25['userPorGradoEstudios']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Posgrado con título</th>
                    <td><?=$gradoEstudiosTotalesHombres26['userPorGradoEstudios']?></td>
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
      <div class="card text-white bg-secondary o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
            <i class="fas fa-landmark"></i>
            </div>
            
            <div class="mr-5"><b>Usuarios totales por PILARES<span class="float-right"></span></b></div>
          </div>
          <a class="card-footer text-white clearfix small z-1" data-toggle="collapse" href="#collapsePorPilares">
            <span class="float-left">Ver detalle</span>
            <span class="float-right">
              <i class="fas fa-angle-right"></i>
            </span>
          </a>
          <div class="collapse" id="collapsePorPilares">
            <div class="card card-body">
              <table class="table table-striped ">
                <tbody class="bg-secondary">
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
      <div class="card text-white bg-secondary o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
            <i class="fas fa-transgender-alt"></i>
            </div>
            
            <div class="mr-5"><b>Usuarios totales por PILARES mujeres <span class="float-right"></span></b></div>
          </div>
          <a class="card-footer text-white clearfix small z-1" data-toggle="collapse" href="#collapsePorPilaresMujeres">
            <span class="float-left">Ver detalle</span>
            <span class="float-right">
              <i class="fas fa-angle-right"></i>
            </span>
          </a>
          <div class="collapse" id="collapsePorPilaresMujeres">
            <div class="card card-body">
              <table class="table table-striped ">
                <tbody class="bg-secondary">
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
      <div class="card text-white bg-secondary o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
            <i class="fas fa-transgender-alt"></i>
            </div>
            
            <div class="mr-5"><b>Usuarios totales por PILARES hombres<span class="float-right"></span></b></div>
          </div>
          <a class="card-footer text-white clearfix small z-1" data-toggle="collapse" href="#collapsePorPilaresHombres">
            <span class="float-left">Ver detalle</span>
            <span class="float-right">
              <i class="fas fa-angle-right"></i>
            </span>
          </a>
          <div class="collapse" id="collapsePorPilaresHombres">
            <div class="card card-body">
              <table class="table table-striped ">
                <tbody class="bg-secondary">
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

   <!-- Usuarios totales por PILARES en Autonomía Económica-->
   <div class="row">
    <div class="col-xl-6 col-sm-6 mb-3">
      <div class="card text-info bg-light o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
            <i class="fas fa-fw fa-hand-holding-usd"></i>
            </div>
            
            <div class="mr-5"><b>Usuarios totales por PILARES en Autonomía Económica <span class="float-right"></span></b></div>
          </div>
          <a class="card-footer text-info clearfix small z-1" data-toggle="collapse" href="#collapsePorPilaresAutonomia">
            <span class="float-left">Ver detalle</span>
            <span class="float-right">
              <i class="fas fa-angle-right"></i>
            </span>
          </a>
          <div class="collapse" id="collapsePorPilaresAutonomia">
            <div class="card card-body">
              <table class="table table-striped ">
                <tbody class="bg-light">
                <tr>
                    <th scope="row">La Araña </th>
                    <td><?=$pilaresTotalesAutnomia1['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">El Capulín</th>
                    <td><?=$pilaresTotalesAutnomia2['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Jalalpa </th>
                    <td><?=$pilaresTotalesAutnomia3['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Xalli</th>
                    <td><?=$pilaresTotalesAutnomia4['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Cantera</th>
                    <td><?=$pilaresTotalesAutnomia5['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Emiliano Zapata</th>
                    <td><?=$pilaresTotalesAutnomia6['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Chimalpa</th>
                    <td><?=$pilaresTotalesAutnomia7['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">San Simón Tolnáhuac </th>
                    <td><?=$pilaresTotalesAutnomia8['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Frida Kahlo </th>
                    <td><?=$pilaresTotalesAutnomia9['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Atlampa</th>
                    <td><?=$pilaresTotalesAutnomia10['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Richard Wagner </th>
                    <td><?=$pilaresTotalesAutnomia11['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Benita Galeana </th>
                    <td><?=$pilaresTotalesAutnomia12['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Tlalpexco</th>
                    <td><?=$pilaresTotalesAutnomia13['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">José Martí </th>
                    <td><?=$pilaresTotalesAutnomia14['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Agrícola Pantitlán </th>
                    <td><?=$pilaresTotalesAutnomia15['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Central de Abasto</th>
                    <td><?=$pilaresTotalesAutnomia16['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Cooperemos Pueblo </th>
                    <td><?=$pilaresTotalesAutnomia17['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Acahualtepec</th>
                    <td><?=$pilaresTotalesAutnomia18['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Gabriela Mistral </th>
                    <td><?=$pilaresTotalesAutnomia19['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Huayatla</th>
                    <td><?=$pilaresTotalesAutnomia20['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Caneguín</th>
                    <td><?=$pilaresTotalesAutnomia47['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">San Salvador Cuauhtenco</th>
                    <td><?=$pilaresTotalesAutnomia21['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Zapotitla</th>
                    <td><?=$pilaresTotalesAutnomia22['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Rosario Castellanos</th>
                    <td><?=$pilaresTotalesAutnomia23['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Tulyehualco</th>
                    <td><?=$pilaresTotalesAutnomia24['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">San Francisco </th>
                    <td><?=$pilaresTotalesAutnomia25['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Belén de las flores</th>
                    <td><?=$pilaresTotalesAutnomia26['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Margarita Maza de Juárez </th>
                    <td><?=$pilaresTotalesAutnomia27['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Atlapulco </th>
                    <td><?=$pilaresTotalesAutnomia28['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Santa Cecilia </th>
                    <td><?=$pilaresTotalesAutnomia29['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Tepalcatlalpan</th>
                    <td><?=$pilaresTotalesAutnomia30['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Cerro de la estrella </th>
                    <td><?=$pilaresTotalesAutnomia31['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Facundo Cabral</th>
                    <td><?=$pilaresTotalesAutnomia32['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">San lucas xochimanca </th>
                    <td><?=$pilaresTotalesAutnomia33['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Zapata Vela </th>
                    <td><?=$pilaresTotalesAutnomia34['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Insurgentes</th>
                    <td><?=$pilaresTotalesAutnomia35['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Amantla</th>
                    <td><?=$pilaresTotalesAutnomia36['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">La Cuesta </th>
                    <td><?=$pilaresTotalesAutnomia37['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Tizimín</th>
                    <td><?=$pilaresTotalesAutnomia38['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Ecoguardas</th>
                    <td><?=$pilaresTotalesAutnomia39['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Árbol del conocimiento</th>
                    <td><?=$pilaresTotalesAutnomia40['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Santa Fe</th>
                    <td><?=$pilaresTotalesAutnomia41['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">La Era</th>
                    <td><?=$pilaresTotalesAutnomia42['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Isidro Fabela</th>
                    <td><?=$pilaresTotalesAutnomia43['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Villa Panamericana</th>
                    <td><?=$pilaresTotalesAutnomia44['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Santa Úrsula</th>
                    <td><?=$pilaresTotalesAutnomia45['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Paulo Freire</th>
                    <td><?=$pilaresTotalesAutnomia46['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">San Pedro Xalpa</th>
                    <td><?=$pilaresTotalesAutnomia48['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Xaltipac</th>
                    <td><?=$pilaresTotalesAutnomia50['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Palmitas</th>
                    <td><?=$pilaresTotalesAutnomia51['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Teotongo</th>
                    <td><?=$pilaresTotalesAutnomia52['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Insurgentes</th>
                    <td><?=$pilaresTotalesAutnomia53['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">La Fortaleza</th>
                    <td><?=$pilaresTotalesAutnomia54['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Rojo Gómez</th>
                    <td><?=$pilaresTotalesAutnomia55['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Municipio Libre</th>
                    <td><?=$pilaresTotalesAutnomia56['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">San Pedro Actopan</th>
                    <td><?=$pilaresTotalesAutnomia57['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">San Bartolomé Xicomulco</th>
                    <td><?=$pilaresTotalesAutnomia58['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Centenario</th>
                    <td><?=$pilaresTotalesAutnomia59['userPorPilaresAutonomia']?></td>
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
            
            <div class="mr-5"><b>Usuarios totales por PILARES en Autonomía Económica mujeres<span class="float-right"></span></b></div>
          </div>
          <a class="card-footer text-info clearfix small z-1" data-toggle="collapse" href="#collapsePorPilaresAutonomiaMujeres">
            <span class="float-left">Ver detalle</span>
            <span class="float-right">
              <i class="fas fa-angle-right"></i>
            </span>
          </a>
          <div class="collapse" id="collapsePorPilaresAutonomiaMujeres">
            <div class="card card-body">
              <table class="table table-striped ">
                <tbody class="bg-light">
                <tr>
                    <th scope="row">La Araña </th>
                    <td><?=$pilaresTotalesAutnomiaMujeres1['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">El Capulín</th>
                    <td><?=$pilaresTotalesAutnomiaMujeres2['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Jalalpa </th>
                    <td><?=$pilaresTotalesAutnomiaMujeres3['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Xalli</th>
                    <td><?=$pilaresTotalesAutnomiaMujeres4['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Cantera</th>
                    <td><?=$pilaresTotalesAutnomiaMujeres5['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Emiliano Zapata</th>
                    <td><?=$pilaresTotalesAutnomiaMujeres6['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Chimalpa</th>
                    <td><?=$pilaresTotalesAutnomiaMujeres7['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">San Simón Tolnáhuac </th>
                    <td><?=$pilaresTotalesAutnomiaMujeres8['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Frida Kahlo </th>
                    <td><?=$pilaresTotalesAutnomiaMujeres9['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Atlampa</th>
                    <td><?=$pilaresTotalesAutnomiaMujeres10['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Richard Wagner </th>
                    <td><?=$pilaresTotalesAutnomiaMujeres11['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Benita Galeana </th>
                    <td><?=$pilaresTotalesAutnomiaMujeres12['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Tlalpexco</th>
                    <td><?=$pilaresTotalesAutnomiaMujeres13['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">José Martí </th>
                    <td><?=$pilaresTotalesAutnomiaMujeres14['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Agrícola Pantitlán </th>
                    <td><?=$pilaresTotalesAutnomiaMujeres15['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Central de Abasto</th>
                    <td><?=$pilaresTotalesAutnomiaMujeres16['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Cooperemos Pueblo </th>
                    <td><?=$pilaresTotalesAutnomiaMujeres17['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Acahualtepec</th>
                    <td><?=$pilaresTotalesAutnomiaMujeres18['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Gabriela Mistral </th>
                    <td><?=$pilaresTotalesAutnomiaMujeres19['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Huayatla</th>
                    <td><?=$pilaresTotalesAutnomiaMujeres20['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Caneguín</th>
                    <td><?=$pilaresTotalesAutnomiaMujeres47['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">San Salvador Cuauhtenco</th>
                    <td><?=$pilaresTotalesAutnomiaMujeres21['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Zapotitla</th>
                    <td><?=$pilaresTotalesAutnomiaMujeres22['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Rosario Castellanos</th>
                    <td><?=$pilaresTotalesAutnomiaMujeres23['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Tulyehualco</th>
                    <td><?=$pilaresTotalesAutnomiaMujeres24['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">San Francisco </th>
                    <td><?=$pilaresTotalesAutnomiaMujeres25['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Belén de las flores</th>
                    <td><?=$pilaresTotalesAutnomiaMujeres26['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Margarita Maza de Juárez </th>
                    <td><?=$pilaresTotalesAutnomiaMujeres27['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Atlapulco </th>
                    <td><?=$pilaresTotalesAutnomiaMujeres28['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Santa Cecilia </th>
                    <td><?=$pilaresTotalesAutnomiaMujeres29['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Tepalcatlalpan</th>
                    <td><?=$pilaresTotalesAutnomiaMujeres30['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Cerro de la estrella </th>
                    <td><?=$pilaresTotalesAutnomiaMujeres31['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Facundo Cabral</th>
                    <td><?=$pilaresTotalesAutnomiaMujeres32['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">San lucas xochimanca </th>
                    <td><?=$pilaresTotalesAutnomiaMujeres33['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Zapata Vela </th>
                    <td><?=$pilaresTotalesAutnomiaMujeres34['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Insurgentes</th>
                    <td><?=$pilaresTotalesAutnomiaMujeres35['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Amantla</th>
                    <td><?=$pilaresTotalesAutnomiaMujeres36['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">La Cuesta </th>
                    <td><?=$pilaresTotalesAutnomiaMujeres37['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Tizimín</th>
                    <td><?=$pilaresTotalesAutnomiaMujeres38['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Ecoguardas</th>
                    <td><?=$pilaresTotalesAutnomiaMujeres39['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Árbol del conocimiento</th>
                    <td><?=$pilaresTotalesAutnomiaMujeres40['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Santa Fe</th>
                    <td><?=$pilaresTotalesAutnomiaMujeres41['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">La Era</th>
                    <td><?=$pilaresTotalesAutnomiaMujeres42['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Isidro Fabela</th>
                    <td><?=$pilaresTotalesAutnomiaMujeres43['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Villa Panamericana</th>
                    <td><?=$pilaresTotalesAutnomiaMujeres44['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Santa Úrsula</th>
                    <td><?=$pilaresTotalesAutnomiaMujeres45['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Paulo Freire</th>
                    <td><?=$pilaresTotalesAutnomiaMujeres46['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">San Pedro Xalpa</th>
                    <td><?=$pilaresTotalesAutnomiaMujeres48['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Xaltipac</th>
                    <td><?=$pilaresTotalesAutnomiaMujeres50['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Palmitas</th>
                    <td><?=$pilaresTotalesAutnomiaMujeres51['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Teotongo</th>
                    <td><?=$pilaresTotalesAutnomiaMujeres52['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Insurgentes</th>
                    <td><?=$pilaresTotalesAutnomiaMujeres53['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">La Fortaleza</th>
                    <td><?=$pilaresTotalesAutnomiaMujeres54['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Rojo Gómez</th>
                    <td><?=$pilaresTotalesAutnomiaMujeres55['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Municipio Libre</th>
                    <td><?=$pilaresTotalesAutnomiaMujeres56['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">San Pedro Actopan</th>
                    <td><?=$pilaresTotalesAutnomiaMujeres57['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">San Bartolomé Xicomulco</th>
                    <td><?=$pilaresTotalesAutnomiaMujeres58['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Centenario</th>
                    <td><?=$pilaresTotalesAutnomiaMujeres59['userPorPilaresAutonomia']?></td>
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
            
            <div class="mr-5"><b>Usuarios totales por PILARES en Autonomía Económica hombres<span class="float-right"></span></b></div>
          </div>
          <a class="card-footer text-info clearfix small z-1" data-toggle="collapse" href="#collapsePorPilaresAutnomiaHombres">
            <span class="float-left">Ver detalle</span>
            <span class="float-right">
              <i class="fas fa-angle-right"></i>
            </span>
          </a>
          <div class="collapse" id="collapsePorPilaresAutnomiaHombres">
            <div class="card card-body">
              <table class="table table-striped ">
                <tbody class="bg-light">
                <tr>
                    <th scope="row">La Araña </th>
                    <td><?=$pilaresTotalesAutnomiaHombres1['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">El Capulín</th>
                    <td><?=$pilaresTotalesAutnomiaHombres2['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Jalalpa </th>
                    <td><?=$pilaresTotalesAutnomiaHombres3['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Xalli</th>
                    <td><?=$pilaresTotalesAutnomiaHombres4['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Cantera</th>
                    <td><?=$pilaresTotalesAutnomiaHombres5['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Emiliano Zapata</th>
                    <td><?=$pilaresTotalesAutnomiaHombres6['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Chimalpa</th>
                    <td><?=$pilaresTotalesAutnomiaHombres7['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">San Simón Tolnáhuac </th>
                    <td><?=$pilaresTotalesAutnomiaHombres8['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Frida Kahlo </th>
                    <td><?=$pilaresTotalesAutnomiaHombres9['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Atlampa</th>
                    <td><?=$pilaresTotalesAutnomiaHombres10['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Richard Wagner </th>
                    <td><?=$pilaresTotalesAutnomiaHombres11['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Benita Galeana </th>
                    <td><?=$pilaresTotalesAutnomiaHombres12['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Tlalpexco</th>
                    <td><?=$pilaresTotalesAutnomiaHombres13['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">José Martí </th>
                    <td><?=$pilaresTotalesAutnomiaHombres14['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Agrícola Pantitlán </th>
                    <td><?=$pilaresTotalesAutnomiaHombres15['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Central de Abasto</th>
                    <td><?=$pilaresTotalesAutnomiaHombres16['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Cooperemos Pueblo </th>
                    <td><?=$pilaresTotalesAutnomiaHombres17['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Acahualtepec</th>
                    <td><?=$pilaresTotalesAutnomiaHombres18['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Gabriela Mistral </th>
                    <td><?=$pilaresTotalesAutnomiaHombres19['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Huayatla</th>
                    <td><?=$pilaresTotalesAutnomiaHombres20['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Caneguín</th>
                    <td><?=$pilaresTotalesAutnomiaHombres47['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">San Salvador Cuauhtenco</th>
                    <td><?=$pilaresTotalesAutnomiaHombres21['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Zapotitla</th>
                    <td><?=$pilaresTotalesAutnomiaHombres22['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Rosario Castellanos</th>
                    <td><?=$pilaresTotalesAutnomiaHombres23['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Tulyehualco</th>
                    <td><?=$pilaresTotalesAutnomiaHombres24['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">San Francisco </th>
                    <td><?=$pilaresTotalesAutnomiaHombres25['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Belén de las flores</th>
                    <td><?=$pilaresTotalesAutnomiaHombres26['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Margarita Maza de Juárez </th>
                    <td><?=$pilaresTotalesAutnomiaHombres27['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Atlapulco </th>
                    <td><?=$pilaresTotalesAutnomiaHombres28['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Santa Cecilia </th>
                    <td><?=$pilaresTotalesAutnomiaHombres29['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Tepalcatlalpan</th>
                    <td><?=$pilaresTotalesAutnomiaHombres30['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Cerro de la estrella </th>
                    <td><?=$pilaresTotalesAutnomiaHombres31['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Facundo Cabral</th>
                    <td><?=$pilaresTotalesAutnomiaHombres32['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">San lucas xochimanca </th>
                    <td><?=$pilaresTotalesAutnomiaHombres33['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Zapata Vela </th>
                    <td><?=$pilaresTotalesAutnomiaHombres34['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Insurgentes</th>
                    <td><?=$pilaresTotalesAutnomiaHombres35['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Amantla</th>
                    <td><?=$pilaresTotalesAutnomiaHombres36['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">La Cuesta </th>
                    <td><?=$pilaresTotalesAutnomiaHombres37['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Tizimín</th>
                    <td><?=$pilaresTotalesAutnomiaHombres38['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Ecoguardas</th>
                    <td><?=$pilaresTotalesAutnomiaHombres39['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Árbol del conocimiento</th>
                    <td><?=$pilaresTotalesAutnomiaHombres40['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Santa Fe</th>
                    <td><?=$pilaresTotalesAutnomiaHombres41['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">La Era</th>
                    <td><?=$pilaresTotalesAutnomiaHombres42['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Isidro Fabela</th>
                    <td><?=$pilaresTotalesAutnomiaHombres43['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Villa Panamericana</th>
                    <td><?=$pilaresTotalesAutnomiaHombres44['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Santa Úrsula</th>
                    <td><?=$pilaresTotalesAutnomiaHombres45['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Paulo Freire</th>
                    <td><?=$pilaresTotalesAutnomiaHombres46['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">San Pedro Xalpa</th>
                    <td><?=$pilaresTotalesAutnomiaHombres48['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Xaltipac</th>
                    <td><?=$pilaresTotalesAutnomiaHombres50['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Palmitas</th>
                    <td><?=$pilaresTotalesAutnomiaHombres51['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Teotongo</th>
                    <td><?=$pilaresTotalesAutnomiaHombres52['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Insurgentes</th>
                    <td><?=$pilaresTotalesAutnomiaHombres53['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">La Fortaleza</th>
                    <td><?=$pilaresTotalesAutnomiaHombres54['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Rojo Gómez</th>
                    <td><?=$pilaresTotalesAutnomiaHombres55['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Municipio Libre</th>
                    <td><?=$pilaresTotalesAutnomiaHombres56['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">San Pedro Actopan</th>
                    <td><?=$pilaresTotalesAutnomiaHombres57['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">San Bartolomé Xicomulco</th>
                    <td><?=$pilaresTotalesAutnomiaHombres58['userPorPilaresAutonomia']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Centenario</th>
                    <td><?=$pilaresTotalesAutnomiaHombres59['userPorPilaresAutonomia']?></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>
  </div>

   <!-- Usuarios inscritos por PILARES en -ciberescuela-->
   <div class="row">
    <div class="col-xl-6 col-sm-6 mb-3">
      <div class="card text-white bg-secondary o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
            <i class="fas fa-fw fa-list"></i>
            </div>
            
            <div class="mr-5"><b>Usuarios totales por PILARES en Ciberescuela<span class="float-right"></span></b></div>
          </div>
          <a class="card-footer text-white clearfix small z-1" data-toggle="collapse" href="#collapsePorPilaresCiberescuela">
            <span class="float-left">Ver detalle</span>
            <span class="float-right">
              <i class="fas fa-angle-right"></i>
            </span>
          </a>
          <div class="collapse" id="collapsePorPilaresCiberescuela">
            <div class="card card-body">
              <table class="table table-striped ">
                <tbody class="bg-secondary">
                  <tr>
                    <th scope="row">La Araña </th>
                    <td><?=$pilaresTotalesCiberescuelas1['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">El Capulín</th>
                    <td><?=$pilaresTotalesCiberescuelas2['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Jalalpa </th>
                    <td><?=$pilaresTotalesCiberescuelas3['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Xalli</th>
                    <td><?=$pilaresTotalesCiberescuelas4['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Cantera</th>
                    <td><?=$pilaresTotalesCiberescuelas5['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Emiliano Zapata</th>
                    <td><?=$pilaresTotalesCiberescuelas6['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Chimalpa</th>
                    <td><?=$pilaresTotalesCiberescuelas7['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">San Simón Tolnáhuac </th>
                    <td><?=$pilaresTotalesCiberescuelas8['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Frida Kahlo </th>
                    <td><?=$pilaresTotalesCiberescuelas9['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Atlampa</th>
                    <td><?=$pilaresTotalesCiberescuelas10['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Richard Wagner </th>
                    <td><?=$pilaresTotalesCiberescuelas11['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Benita Galeana </th>
                    <td><?=$pilaresTotalesCiberescuelas12['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Tlalpexco</th>
                    <td><?=$pilaresTotalesCiberescuelas13['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">José Martí </th>
                    <td><?=$pilaresTotalesCiberescuelas14['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Agrícola Pantitlán </th>
                    <td><?=$pilaresTotalesCiberescuelas15['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Central de Abasto</th>
                    <td><?=$pilaresTotalesCiberescuelas16['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Cooperemos Pueblo </th>
                    <td><?=$pilaresTotalesCiberescuelas17['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Acahualtepec</th>
                    <td><?=$pilaresTotalesCiberescuelas18['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Gabriela Mistral </th>
                    <td><?=$pilaresTotalesCiberescuelas19['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Huayatla</th>
                    <td><?=$pilaresTotalesCiberescuelas20['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Caneguín</th>
                    <td><?=$pilaresTotalesCiberescuelas47['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">San Salvador Cuauhtenco</th>
                    <td><?=$pilaresTotalesCiberescuelas21['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Zapotitla</th>
                    <td><?=$pilaresTotalesCiberescuelas22['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Rosario Castellanos</th>
                    <td><?=$pilaresTotalesCiberescuelas23['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Tulyehualco</th>
                    <td><?=$pilaresTotalesCiberescuelas24['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">San Francisco </th>
                    <td><?=$pilaresTotalesCiberescuelas25['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Belén de las flores</th>
                    <td><?=$pilaresTotalesCiberescuelas26['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Margarita Maza de Juárez </th>
                    <td><?=$pilaresTotalesCiberescuelas27['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Atlapulco </th>
                    <td><?=$pilaresTotalesCiberescuelas28['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Santa Cecilia </th>
                    <td><?=$pilaresTotalesCiberescuelas29['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Tepalcatlalpan</th>
                    <td><?=$pilaresTotalesCiberescuelas30['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Cerro de la estrella </th>
                    <td><?=$pilaresTotalesCiberescuelas31['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Facundo Cabral</th>
                    <td><?=$pilaresTotalesCiberescuelas32['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">San lucas xochimanca </th>
                    <td><?=$pilaresTotalesCiberescuelas33['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Zapata Vela </th>
                    <td><?=$pilaresTotalesCiberescuelas34['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Insurgentes</th>
                    <td><?=$pilaresTotalesCiberescuelas35['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Amantla</th>
                    <td><?=$pilaresTotalesCiberescuelas36['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">La Cuesta </th>
                    <td><?=$pilaresTotalesCiberescuelas37['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Tizimín</th>
                    <td><?=$pilaresTotalesCiberescuelas38['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Ecoguardas</th>
                    <td><?=$pilaresTotalesCiberescuelas39['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Árbol del conocimiento</th>
                    <td><?=$pilaresTotalesCiberescuelas40['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Santa Fe</th>
                    <td><?=$pilaresTotalesCiberescuelas41['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">La Era</th>
                    <td><?=$pilaresTotalesCiberescuelas42['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Isidro Fabela</th>
                    <td><?=$pilaresTotalesCiberescuelas43['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Villa Panamericana</th>
                    <td><?=$pilaresTotalesCiberescuelas44['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Santa Úrsula</th>
                    <td><?=$pilaresTotalesCiberescuelas45['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Paulo Freire</th>
                    <td><?=$pilaresTotalesCiberescuelas46['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">San Pedro Xalpa</th>
                    <td><?=$pilaresTotalesCiberescuelas48['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Xaltipac</th>
                    <td><?=$pilaresTotalesCiberescuelas50['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Palmitas</th>
                    <td><?=$pilaresTotalesCiberescuelas51['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Teotongo</th>
                    <td><?=$pilaresTotalesCiberescuelas52['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Insurgentes</th>
                    <td><?=$pilaresTotalesCiberescuelas53['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">La Fortaleza</th>
                    <td><?=$pilaresTotalesCiberescuelas54['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Rojo Gómez</th>
                    <td><?=$pilaresTotalesCiberescuelas55['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Municipio Libre</th>
                    <td><?=$pilaresTotalesCiberescuelas56['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">San Pedro Actopan</th>
                    <td><?=$pilaresTotalesCiberescuelas57['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">San Bartolomé Xicomulco</th>
                    <td><?=$pilaresTotalesCiberescuelas58['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Centenario</th>
                    <td><?=$pilaresTotalesCiberescuelas59['userPorPilaresCiberescuelas']?></td>
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
            
            <div class="mr-5"><b>Usuarios totales por PILARES en Ciberescuela mujeres <span class="float-right"></span></b></div>
          </div>
          <a class="card-footer text-white clearfix small z-1" data-toggle="collapse" href="#collapsePorPilaresCiberescuelaMujeres">
            <span class="float-left">Ver detalle</span>
            <span class="float-right">
              <i class="fas fa-angle-right"></i>
            </span>
          </a>
          <div class="collapse" id="collapsePorPilaresCiberescuelaMujeres">
            <div class="card card-body">
              <table class="table table-striped ">
                <tbody class="bg-secondary">
                <tr>
                    <th scope="row">La Araña </th>
                    <td><?=$pilaresTotalesCiberescelasMujeres1['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">El Capulín</th>
                    <td><?=$pilaresTotalesCiberescelasMujeres2['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Jalalpa </th>
                    <td><?=$pilaresTotalesCiberescelasMujeres3['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Xalli</th>
                    <td><?=$pilaresTotalesCiberescelasMujeres4['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Cantera</th>
                    <td><?=$pilaresTotalesCiberescelasMujeres5['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Emiliano Zapata</th>
                    <td><?=$pilaresTotalesCiberescelasMujeres6['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Chimalpa</th>
                    <td><?=$pilaresTotalesCiberescelasMujeres7['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">San Simón Tolnáhuac </th>
                    <td><?=$pilaresTotalesCiberescelasMujeres8['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Frida Kahlo </th>
                    <td><?=$pilaresTotalesCiberescelasMujeres9['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Atlampa</th>
                    <td><?=$pilaresTotalesCiberescelasMujeres10['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Richard Wagner </th>
                    <td><?=$pilaresTotalesCiberescelasMujeres11['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Benita Galeana </th>
                    <td><?=$pilaresTotalesCiberescelasMujeres12['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Tlalpexco</th>
                    <td><?=$pilaresTotalesCiberescelasMujeres13['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">José Martí </th>
                    <td><?=$pilaresTotalesCiberescelasMujeres14['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Agrícola Pantitlán </th>
                    <td><?=$pilaresTotalesCiberescelasMujeres15['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Central de Abasto</th>
                    <td><?=$pilaresTotalesCiberescelasMujeres16['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Cooperemos Pueblo </th>
                    <td><?=$pilaresTotalesCiberescelasMujeres17['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Acahualtepec</th>
                    <td><?=$pilaresTotalesCiberescelasMujeres18['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Gabriela Mistral </th>
                    <td><?=$pilaresTotalesCiberescelasMujeres19['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Huayatla</th>
                    <td><?=$pilaresTotalesCiberescelasMujeres20['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Caneguín</th>
                    <td><?=$pilaresTotalesCiberescelasMujeres47['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">San Salvador Cuauhtenco</th>
                    <td><?=$pilaresTotalesCiberescelasMujeres21['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Zapotitla</th>
                    <td><?=$pilaresTotalesCiberescelasMujeres22['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Rosario Castellanos</th>
                    <td><?=$pilaresTotalesCiberescelasMujeres23['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Tulyehualco</th>
                    <td><?=$pilaresTotalesCiberescelasMujeres24['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">San Francisco </th>
                    <td><?=$pilaresTotalesCiberescelasMujeres25['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Belén de las flores</th>
                    <td><?=$pilaresTotalesCiberescelasMujeres26['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Margarita Maza de Juárez </th>
                    <td><?=$pilaresTotalesCiberescelasMujeres27['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Atlapulco </th>
                    <td><?=$pilaresTotalesCiberescelasMujeres28['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Santa Cecilia </th>
                    <td><?=$pilaresTotalesCiberescelasMujeres29['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Tepalcatlalpan</th>
                    <td><?=$pilaresTotalesCiberescelasMujeres30['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Cerro de la estrella </th>
                    <td><?=$pilaresTotalesCiberescelasMujeres31['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Facundo Cabral</th>
                    <td><?=$pilaresTotalesCiberescelasMujeres32['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">San lucas xochimanca </th>
                    <td><?=$pilaresTotalesCiberescelasMujeres33['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Zapata Vela </th>
                    <td><?=$pilaresTotalesCiberescelasMujeres34['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Insurgentes</th>
                    <td><?=$pilaresTotalesCiberescelasMujeres35['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Amantla</th>
                    <td><?=$pilaresTotalesCiberescelasMujeres36['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">La Cuesta </th>
                    <td><?=$pilaresTotalesCiberescelasMujeres37['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Tizimín</th>
                    <td><?=$pilaresTotalesCiberescelasMujeres38['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Ecoguardas</th>
                    <td><?=$pilaresTotalesCiberescelasMujeres39['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Árbol del conocimiento</th>
                    <td><?=$pilaresTotalesCiberescelasMujeres40['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Santa Fe</th>
                    <td><?=$pilaresTotalesCiberescelasMujeres41['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">La Era</th>
                    <td><?=$pilaresTotalesCiberescelasMujeres42['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Isidro Fabela</th>
                    <td><?=$pilaresTotalesCiberescelasMujeres43['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Villa Panamericana</th>
                    <td><?=$pilaresTotalesCiberescelasMujeres44['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Santa Úrsula</th>
                    <td><?=$pilaresTotalesCiberescelasMujeres45['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Paulo Freire</th>
                    <td><?=$pilaresTotalesCiberescelasMujeres46['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">San Pedro Xalpa</th>
                    <td><?=$pilaresTotalesCiberescelasMujeres48['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Xaltipac</th>
                    <td><?=$pilaresTotalesCiberescelasMujeres50['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Palmitas</th>
                    <td><?=$pilaresTotalesCiberescelasMujeres51['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Teotongo</th>
                    <td><?=$pilaresTotalesCiberescelasMujeres52['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Insurgentes</th>
                    <td><?=$pilaresTotalesCiberescelasMujeres53['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">La Fortaleza</th>
                    <td><?=$pilaresTotalesCiberescelasMujeres54['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Rojo Gómez</th>
                    <td><?=$pilaresTotalesCiberescelasMujeres55['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Municipio Libre</th>
                    <td><?=$pilaresTotalesCiberescelasMujeres56['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">San Pedro Actopan</th>
                    <td><?=$pilaresTotalesCiberescelasMujeres57['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">San Bartolomé Xicomulco</th>
                    <td><?=$pilaresTotalesCiberescelasMujeres58['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Centenario</th>
                    <td><?=$pilaresTotalesCiberescelasMujeres59['userPorPilaresCiberescuelas']?></td>
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
            
            <div class="mr-5"><b>Usuarios totales por PILARES en Ciberescuela hombres<span class="float-right"></span></b></div>
          </div>
          <a class="card-footer text-white clearfix small z-1" data-toggle="collapse" href="#collapsePorPilaresCiberescuelaHombres">
            <span class="float-left">Ver detalle</span>
            <span class="float-right">
              <i class="fas fa-angle-right"></i>
            </span>
          </a>
          <div class="collapse" id="collapsePorPilaresCiberescuelaHombres">
            <div class="card card-body">
              <table class="table table-striped ">
                <tbody class="bg-secondary">
                <tr>
                    <th scope="row">La Araña </th>
                    <td><?=$pilaresTotalesCiberescelasHombres1['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">El Capulín</th>
                    <td><?=$pilaresTotalesCiberescelasHombres2['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Jalalpa </th>
                    <td><?=$pilaresTotalesCiberescelasHombres3['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Xalli</th>
                    <td><?=$pilaresTotalesCiberescelasHombres4['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Cantera</th>
                    <td><?=$pilaresTotalesCiberescelasHombres5['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Emiliano Zapata</th>
                    <td><?=$pilaresTotalesCiberescelasHombres6['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Chimalpa</th>
                    <td><?=$pilaresTotalesCiberescelasHombres7['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">San Simón Tolnáhuac </th>
                    <td><?=$pilaresTotalesCiberescelasHombres8['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Frida Kahlo </th>
                    <td><?=$pilaresTotalesCiberescelasHombres9['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Atlampa</th>
                    <td><?=$pilaresTotalesCiberescelasHombres10['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Richard Wagner </th>
                    <td><?=$pilaresTotalesCiberescelasHombres11['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Benita Galeana </th>
                    <td><?=$pilaresTotalesCiberescelasHombres12['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Tlalpexco</th>
                    <td><?=$pilaresTotalesCiberescelasHombres13['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">José Martí </th>
                    <td><?=$pilaresTotalesCiberescelasHombres14['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Agrícola Pantitlán </th>
                    <td><?=$pilaresTotalesCiberescelasHombres15['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Central de Abasto</th>
                    <td><?=$pilaresTotalesCiberescelasHombres16['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Cooperemos Pueblo </th>
                    <td><?=$pilaresTotalesCiberescelasHombres17['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Acahualtepec</th>
                    <td><?=$pilaresTotalesCiberescelasHombres18['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Gabriela Mistral </th>
                    <td><?=$pilaresTotalesCiberescelasHombres19['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Huayatla</th>
                    <td><?=$pilaresTotalesCiberescelasHombres20['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Caneguín</th>
                    <td><?=$pilaresTotalesCiberescelasHombres47['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">San Salvador Cuauhtenco</th>
                    <td><?=$pilaresTotalesCiberescelasHombres21['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Zapotitla</th>
                    <td><?=$pilaresTotalesCiberescelasHombres22['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Rosario Castellanos</th>
                    <td><?=$pilaresTotalesCiberescelasHombres23['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Tulyehualco</th>
                    <td><?=$pilaresTotalesCiberescelasHombres24['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">San Francisco </th>
                    <td><?=$pilaresTotalesCiberescelasHombres25['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Belén de las flores</th>
                    <td><?=$pilaresTotalesCiberescelasHombres26['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Margarita Maza de Juárez </th>
                    <td><?=$pilaresTotalesCiberescelasHombres27['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Atlapulco </th>
                    <td><?=$pilaresTotalesCiberescelasHombres28['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Santa Cecilia </th>
                    <td><?=$pilaresTotalesCiberescelasHombres29['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Tepalcatlalpan</th>
                    <td><?=$pilaresTotalesCiberescelasHombres30['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Cerro de la estrella </th>
                    <td><?=$pilaresTotalesCiberescelasHombres31['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Facundo Cabral</th>
                    <td><?=$pilaresTotalesCiberescelasHombres32['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">San lucas xochimanca </th>
                    <td><?=$pilaresTotalesCiberescelasHombres33['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Zapata Vela </th>
                    <td><?=$pilaresTotalesCiberescelasHombres34['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Insurgentes</th>
                    <td><?=$pilaresTotalesCiberescelasHombres35['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Amantla</th>
                    <td><?=$pilaresTotalesCiberescelasHombres36['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">La Cuesta </th>
                    <td><?=$pilaresTotalesCiberescelasHombres37['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Tizimín</th>
                    <td><?=$pilaresTotalesCiberescelasHombres38['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Ecoguardas</th>
                    <td><?=$pilaresTotalesCiberescelasHombres39['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Árbol del conocimiento</th>
                    <td><?=$pilaresTotalesCiberescelasHombres40['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Santa Fe</th>
                    <td><?=$pilaresTotalesCiberescelasHombres41['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">La Era</th>
                    <td><?=$pilaresTotalesCiberescelasHombres42['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Isidro Fabela</th>
                    <td><?=$pilaresTotalesCiberescelasHombres43['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Villa Panamericana</th>
                    <td><?=$pilaresTotalesCiberescelasHombres44['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Santa Úrsula</th>
                    <td><?=$pilaresTotalesCiberescelasHombres45['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Paulo Freire</th>
                    <td><?=$pilaresTotalesCiberescelasHombres46['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">San Pedro Xalpa</th>
                    <td><?=$pilaresTotalesCiberescelasHombres48['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Xaltipac</th>
                    <td><?=$pilaresTotalesCiberescelasHombres50['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Palmitas</th>
                    <td><?=$pilaresTotalesCiberescelasHombres51['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Teotongo</th>
                    <td><?=$pilaresTotalesCiberescelasHombres52['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Insurgentes</th>
                    <td><?=$pilaresTotalesCiberescelasHombres53['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">La Fortaleza</th>
                    <td><?=$pilaresTotalesCiberescelasHombres54['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Rojo Gómez</th>
                    <td><?=$pilaresTotalesCiberescelasHombres55['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Municipio Libre</th>
                    <td><?=$pilaresTotalesCiberescelasHombres56['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">San Pedro Actopan</th>
                    <td><?=$pilaresTotalesCiberescelasHombres57['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">San Bartolomé Xicomulco</th>
                    <td><?=$pilaresTotalesCiberescelasHombres58['userPorPilaresCiberescuelas']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Centenario</th>
                    <td><?=$pilaresTotalesCiberescelasHombres59['userPorPilaresCiberescuelas']?></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>
  </div>
  <!-- Usuarios por Actividades Cards-->
  <div class="row">
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
                <!-- <tr>
                  <th scope="row">Usuarios totales</th>
                  <td><b><?=$culturaTotales['userPorActividad']?></b></td>
                </tr> -->
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
                <!-- <tr>
                  <th scope="row">Usuarios totales</th>
                  <td><b><?=$ciberEscuelaTotales['userPorActividad']?></b></td>
                </tr> -->
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
                <!-- <tr>
                  <th scope="row">B@UNAM</th>
                  <td><?=$bunam['userPorActividad']?></td>
                </tr> -->
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
                <!-- <tr>
                  <th scope="row">B@UNAM</th>
                  <td><?=$bunamMujeres['userPorActividad']?></td>
                </tr> -->
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
                <!-- <tr>
                  <th scope="row">B@UNAM</th>
                  <td><?=$bunamHombres['userPorActividad']?></td>
                </tr> -->
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
                <!-- <tr>
                  <th scope="row">Usuarios totales</th>
                  <td><b><?=$deporteTotales['userPorActividad']?></b></td>
                </tr> -->
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
                <!-- <tr>
                  <th scope="row">Usuarios totales</th>
                  <td><strong><?=$autonomiaTotales['userPorActividad']?></strong></td>
                </tr> -->
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
  </div>
  <!-- Area Chart Example-->
  <!-- <div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-chart-area"></i>
    Gráfica general de usuarios registrados por mes</div>
    <div class="card-body">
      <canvas id="myAreaChart" width="100%" height="30"></canvas>
    </div>
    <div class="card-footer small text-muted">Actualizada Ayer a las 11:59 PM</div>
  </div> -->
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
<script src="<?php echo constant('URL')?>public/vendor/chart.js/Chart.min.js"></script>
<script src="<?php echo constant('URL')?>public/vendor/datatables/jquery.dataTables.js"></script>
<script src="<?php echo constant('URL')?>public/vendor/datatables/dataTables.bootstrap4.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo constant('URL')?>public/js/sb-admin.min.js"></script>

<!-- Demo scripts for this page-->
<!-- <script src="<?php //echo constant('URL')?>public/js/demo/datatables-demo.js"></script> -->
<script src="<?php echo constant('URL')?>public/js/demo/chart-area-jud.js"></script>

</body>

</html>