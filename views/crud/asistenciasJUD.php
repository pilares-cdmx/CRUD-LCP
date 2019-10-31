<?php require 'views/layout/headerCRUD-jud.php'; ?>
<?php
  if (isset($_SESSION['pilarAsignado'])) {
    $nombrePilar = $_SESSION['pilarAsignado'];
    $separador = "-";
    $idPilarLCP = $_SESSION['identity']->Pilares_idPilares;
  }

    $con = mysqli_connect('localhost', 'produccion', '%C2R2B1N2d32MBR0S10%', 'pilaresDB');
    // $con = mysqli_connect('localhost', 'root', '', 'pilaresDB');
        if (!$con) {
            die('Could not connect: ' . mysqli_error($con));
        }

    mysqli_select_db($con, "pilaresDB");
    mysqli_query($con, "SET NAMES 'utf8mb4'");
    /** 
     * Ususarios totales     asistenciasTotal
     */
    $sql="SELECT count(DISTINCT B1.idUsuario) AS asistenciasTotal FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios";
    $totalAsistencias = mysqli_query($con, $sql);
    //var_dump($totalAsistencias);
    $asistenciasTotales = mysqli_fetch_array($totalAsistencias);
     /**
     * Usuarios totales inscritos por genero      asistenciasPorGenero
     */
    $sql="SELECT count(DISTINCT B1.idUsuario) AS asistenciasPorGenero FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND U1.sexo LIKE '%M%'";
    $asistenciasMujeres = mysqli_query($con, $sql);
    //var_dump($asistenciasMujeres);
    $mujeresAsistencias = mysqli_fetch_array($asistenciasMujeres);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS asistenciasPorGenero FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND U1.sexo LIKE '%H%'";
    $asistenciasHombres = mysqli_query($con, $sql);
    //var_dump($asistenciasHombres);
    $hombresAsistencias = mysqli_fetch_array($asistenciasHombres);
/**
* Usuarios inscritos por intervalo de edad  asistenciasPorIntervalo
*/
    $sql="SELECT count(DISTINCT B1.idUsuario) AS asistenciasPorIntervalo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND B1.edadUsuario = '15'"; 
    $intervaloTotales1 = mysqli_query($con, $sql);
    //var_dump($intervaloTotales1);
    $usuarioIntervalo1 = mysqli_fetch_array($intervaloTotales1);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS asistenciasPorIntervalo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND B1.edadUsuario = '16'";
    $intervaloTotales2 = mysqli_query($con, $sql);
    //var_dump($intervaloTotales2);
    $usuarioIntervalo2 = mysqli_fetch_array($intervaloTotales2);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS asistenciasPorIntervalo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND B1.edadUsuario = '17'";
    $intervaloTotales3 = mysqli_query($con, $sql);
    //var_dump($intervaloTotales3);
    $usuarioIntervalo3 = mysqli_fetch_array($intervaloTotales3);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS asistenciasPorIntervalo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND B1.edadUsuario = '18'";
    $intervaloTotales4 = mysqli_query($con, $sql);
    //var_dump($intervaloTotales4);
    $usuarioIntervalo4 = mysqli_fetch_array($intervaloTotales4);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS asistenciasPorIntervalo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND B1.edadUsuario = '19'";
    $intervaloTotales5 = mysqli_query($con, $sql);
    //var_dump($intervaloTotales5);
    $usuarioIntervalo5 = mysqli_fetch_array($intervaloTotales5);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS asistenciasPorIntervalo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND B1.edadUsuario = '20'"; 
    $intervaloTotales6 = mysqli_query($con, $sql);
    //var_dump($intervaloTotales6);
    $usuarioIntervalo6 = mysqli_fetch_array($intervaloTotales6);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS asistenciasPorIntervalo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND B1.edadUsuario = '21'";
    $intervaloTotales7 = mysqli_query($con, $sql);
    //var_dump($intervaloTotales7);
    $usuarioIntervalo7 = mysqli_fetch_array($intervaloTotales7);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS asistenciasPorIntervalo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND B1.edadUsuario = '22'";
    $intervaloTotales8 = mysqli_query($con, $sql);
    //var_dump($intervaloTotales8);
    $usuarioIntervalo8 = mysqli_fetch_array($intervaloTotales8);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS asistenciasPorIntervalo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND B1.edadUsuario = '23'";
    $intervaloTotales9 = mysqli_query($con, $sql);
    //var_dump($intervaloTotales9);
    $usuarioIntervalo9 = mysqli_fetch_array($intervaloTotales9);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS asistenciasPorIntervalo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND B1.edadUsuario = '24'";
    $intervaloTotales10 = mysqli_query($con, $sql);
    //var_dump($intervaloTotales10);
    $usuarioIntervalo10 = mysqli_fetch_array($intervaloTotales10);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS asistenciasPorIntervalo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND B1.edadUsuario = '25'"; 
    $intervaloTotales11 = mysqli_query($con, $sql);
    //var_dump($intervaloTotales11);
    $usuarioIntervalo11 = mysqli_fetch_array($intervaloTotales11);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS asistenciasPorIntervalo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND B1.edadUsuario = '26'";
    $intervaloTotales12 = mysqli_query($con, $sql);
    //var_dump($intervaloTotales12);
    $usuarioIntervalo12 = mysqli_fetch_array($intervaloTotales12);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS asistenciasPorIntervalo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND B1.edadUsuario = '27'";
    $intervaloTotales13 = mysqli_query($con, $sql);
    //var_dump($intervaloTotales13);
    $usuarioIntervalo13 = mysqli_fetch_array($intervaloTotales13);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS asistenciasPorIntervalo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND B1.edadUsuario = '28'";
    $intervaloTotales14 = mysqli_query($con, $sql);
    //var_dump($intervaloTotales14);
    $usuarioIntervalo14 = mysqli_fetch_array($intervaloTotales14);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS asistenciasPorIntervalo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND B1.edadUsuario = '29'";
    $intervaloTotales15 = mysqli_query($con, $sql);
    //var_dump($intervaloTotales15);
    $usuarioIntervalo15 = mysqli_fetch_array($intervaloTotales15);
/**
 * Usuarios con beca porActividad CULTURA
 */
    // $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '2'";
    // $totalesDanza = mysqli_query($con, $sql);
    // //var_dump($totalesCultura);
    // $danza = mysqli_fetch_array($totalesDanza);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '3'";
    $totalesBallet = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $ballet = mysqli_fetch_array($totalesBallet);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '2'";
    $totalesDanza = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $danza = mysqli_fetch_array($totalesDanza);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '9'";
    $totalesFoto = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $fotografia = mysqli_fetch_array($totalesFoto);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '67'";
    $totalesBaileSocial = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $baileSocial = mysqli_fetch_array($totalesBaileSocial);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '68'";
    $totalesDanzaNiños = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $danzaNiños = mysqli_fetch_array($totalesDanzaNiños);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '69'";
    $totalesDanzaAdultos = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $danzaAdultos = mysqli_fetch_array($totalesDanzaAdultos);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '70'";
    $totalesFolklorica = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $folklorica = mysqli_fetch_array($totalesFolklorica);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '71'";
    $totalesActuacion = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $actuacion = mysqli_fetch_array($totalesActuacion);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '72'";
    $totalesTeatroCalle = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $teatroCalle = mysqli_fetch_array($totalesTeatroCalle);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '73'";
    $totalesDanzaContemporanea = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $contemporanea = mysqli_fetch_array($totalesDanzaContemporanea);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '74'";
    $totalesPolinesia = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $polinesia = mysqli_fetch_array($totalesPolinesia);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '75'";
    $totalesTeatroMascaras = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $mascaras = mysqli_fetch_array($totalesTeatroMascaras);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '76'";
    $totalesExpresio = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $expresion = mysqli_fetch_array($totalesExpresio);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '77'";
    $totalesTelar = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $telar = mysqli_fetch_array($totalesTelar);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '78'";
    $totalesCArtoneria = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $cartoneria = mysqli_fetch_array($totalesCArtoneria);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '79'";
    $totalesBordado = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $bordado = mysqli_fetch_array($totalesBordado);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '80'";
    $totalesConstruccion = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $construccion = mysqli_fetch_array($totalesConstruccion);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '81'";
    $totalesDiseñoJuguetes = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $diseñoJuguetes = mysqli_fetch_array($totalesDiseñoJuguetes);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '82'";
    $totalesReciclajeAmb = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $reciclajeAmb = mysqli_fetch_array($totalesReciclajeAmb);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '83'";
    $totalesEscritura = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $escritura = mysqli_fetch_array($totalesEscritura);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '84'";
    $totalesPinturaArt = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $pinturaArt = mysqli_fetch_array($totalesPinturaArt);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '85'";
    $totalesAudioVisual = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $audioVisual = mysqli_fetch_array($totalesAudioVisual);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '86'";
    $totalesCine = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $cine = mysqli_fetch_array($totalesCine);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '87'";
    $totalesAnimacionNiños = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $animacionNiños = mysqli_fetch_array($totalesAnimacionNiños);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '88'";
    $totalesVideoComunitario = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $videoComunitario = mysqli_fetch_array($totalesVideoComunitario);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '89'";
    $totalesGuitarra = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $guitarra = mysqli_fetch_array($totalesGuitarra);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '90'";
    $totalesRap = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $rap = mysqli_fetch_array($totalesRap);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '91'";
    $totalesPercusiones = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $percusiones = mysqli_fetch_array($totalesPercusiones);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '92'";
    $totalesIniciacion = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $iniciacion = mysqli_fetch_array($totalesIniciacion);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '93'";
    $totalesSonHuasteco = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $sonHuasteco = mysqli_fetch_array($totalesSonHuasteco);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '123'";
    $totalesGrabado = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $grabado = mysqli_fetch_array($totalesGrabado);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '136'";
    $totalesClown = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $clown = mysqli_fetch_array($totalesClown);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '143'";
    $totalesDanzaJazz = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $danzaJazz = mysqli_fetch_array($totalesDanzaJazz);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '144'";
    $totalesIniciacionCanto = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $iniciacionCanto = mysqli_fetch_array($totalesIniciacionCanto);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '146'";
    $totalesBellyDance = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $bellyDance = mysqli_fetch_array($totalesBellyDance);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '149'";
    $totalesAcercamientoAlCirco = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $acercamientoAlCirco = mysqli_fetch_array($totalesAcercamientoAlCirco);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '148'";
    $totalesMedioAmbiente = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $medioAmbiente = mysqli_fetch_array($totalesMedioAmbiente);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '135'";
    $totalesFotografiaDigital = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $fotografiaDigital = mysqli_fetch_array($totalesFotografiaDigital);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '142'";
    $totalesExperimentacionGrafica = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $experimentacionGrafica = mysqli_fetch_array($totalesExperimentacionGrafica);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '139'";
    $totalesCinemaPilares = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $cinemaPilares = mysqli_fetch_array($totalesCinemaPilares);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '132'";
    $totalesModeladoPlastilina = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $modeladoPlastilina = mysqli_fetch_array($totalesModeladoPlastilina);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '138'";
    $totalesLibroClub = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $libroClub = mysqli_fetch_array($totalesLibroClub);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '147'";
    $totalesLiteratura = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $literatura = mysqli_fetch_array($totalesLiteratura);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '131'";
    $totalesSalsaCubana = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $salsaCubana = mysqli_fetch_array($totalesSalsaCubana);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '150'";
    $totalesEncuadernacion = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $encuadernacion = mysqli_fetch_array($totalesEncuadernacion);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '128'";
    $totalesArteCreatividad = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $arteCreatividad = mysqli_fetch_array($totalesArteCreatividad);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '137'";
    $totalesArteCiencia = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $arteCiencia = mysqli_fetch_array($totalesArteCiencia);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '140'";
    $totalesTransformaciones = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $transformaciones = mysqli_fetch_array($totalesTransformaciones);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '141'";
    $totalesMeditacion = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $meditacion = mysqli_fetch_array($totalesMeditacion);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '145'";
    $totalesVitrales = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $vitrales = mysqli_fetch_array($totalesVitrales);
/**
* USUARIOS por actividad Ciberescuelas
*/
    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '21'";
    $totalesAjedrez = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $ajedrez = mysqli_fetch_array($totalesAjedrez);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '152'";
    $totalesEdicionYdiseno = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $edicionYdiseno = mysqli_fetch_array($totalesEdicionYdiseno);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '24'";
    $totalesClubCiencia = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $clubCiencia = mysqli_fetch_array($totalesClubCiencia);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '25'";
    $totalesRoboticaApli = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $robo = mysqli_fetch_array($totalesRoboticaApli);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '28'";
    $totalesClubCodigo = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $clubCodigo = mysqli_fetch_array($totalesClubCodigo);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '29'";
    $totalesAmor = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $amor = mysqli_fetch_array($totalesAmor);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '30'";
    $totalesPrevenAdic = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $prevenAdic = mysqli_fetch_array($totalesPrevenAdic);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '31'";
    $totalesHabilidades = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $habilidades = mysqli_fetch_array($totalesHabilidades);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '32'";
    $totalesProyecto = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $proyecto = mysqli_fetch_array($totalesProyecto);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '33'";
    $totalesAutoestima = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $autoestima = mysqli_fetch_array($totalesAutoestima);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '34'";
    $totalesTanato = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $tanato = mysqli_fetch_array($totalesTanato);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '35'";
    $totalesInteliEmo = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $inteliEmo = mysqli_fetch_array($totalesInteliEmo);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '177'";
    $totalesRecuperandoMiLibertad = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $recuperandoMiLibertad = mysqli_fetch_array($totalesRecuperandoMiLibertad);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '178'";
    $totalesComprendiendoAdolescencia = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $comprendiendoAdolescencia = mysqli_fetch_array($totalesComprendiendoAdolescencia);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '185'";
    $totalesComprendiendoNinez = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $comprendiendoNinez = mysqli_fetch_array($totalesComprendiendoNinez);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '179'";
    $totalesConocerme = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $conocerme = mysqli_fetch_array($totalesConocerme);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '180'";
    $totalesConversatorios = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $conversatorios = mysqli_fetch_array($totalesConversatorios);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '181'";
    $totalesAutosanarme = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $autosanarme = mysqli_fetch_array($totalesAutosanarme);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '182'";
    $totalesDanzanteMente = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $danzanteMente = mysqli_fetch_array($totalesDanzanteMente);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '36'";
    $totalesArteEmo = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $arteEmo = mysqli_fetch_array($totalesArteEmo);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '102'";
    $totalesREdaccion = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $redaccion = mysqli_fetch_array($totalesREdaccion);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '103'";
    $totalesTalleComp = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $talleresCom = mysqli_fetch_array($totalesTalleComp);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '104'";
    $totalesEmoMagic = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $emoMagic = mysqli_fetch_array($totalesEmoMagic);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '105'";
    $totalesPintEmo = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $pintEmo = mysqli_fetch_array($totalesPintEmo);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '106'";
    $totalesAlfabet = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $alfabet = mysqli_fetch_array($totalesAlfabet);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '107'";
    $totalesPrimaRIA = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $primaria = mysqli_fetch_array($totalesPrimaRIA);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '108'";
    $totalesSec = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $secundaria = mysqli_fetch_array($totalesSec);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A2.Actividades_idActividades = '109'";
    $totalesBadi = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $badi = mysqli_fetch_array($totalesBadi);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '110'";
    $totalesPrepaSep = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $prepaSep = mysqli_fetch_array($totalesPrepaSep);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '112'";
    $totalesColbach = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $colbach = mysqli_fetch_array($totalesColbach);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '113'";
    $totalesPrepaAbierta = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $prepaAbierta = mysqli_fetch_array($totalesPrepaAbierta);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '114'";
    $totalesBunam= mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $bunam = mysqli_fetch_array($totalesBunam);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '115'";
    $totalesUnadm = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $unadm = mysqli_fetch_array($totalesUnadm);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '116'";
    $totalesLicLinea = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $liclinea = mysqli_fetch_array($totalesLicLinea);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '117'";
    $totalesLicCdmx = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $licCdmx = mysqli_fetch_array($totalesLicCdmx);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '118'";
    $totalesAsePrim = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $asePrimaria = mysqli_fetch_array($totalesAsePrim);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '119'";
    $totalesAseSec = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $aseSecundaria = mysqli_fetch_array($totalesAseSec);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '120'";
    $totalesAsePrepa = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $asePrep = mysqli_fetch_array($totalesAsePrepa);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '121'";
    $totalesAseLic = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $aseLic= mysqli_fetch_array($totalesAseLic);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '122'";
    $totalesBaileCuero= mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $baileCuerpo= mysqli_fetch_array($totalesBaileCuero);


    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '122'";
    $totalesBaileCuero= mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $baileCuerpo= mysqli_fetch_array($totalesBaileCuero);


    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '124'";
    $totalesElectronicaBraile = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $braile = mysqli_fetch_array($totalesElectronicaBraile);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '125'";
    $totalesComputacionAsistida= mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $computacionAsistida= mysqli_fetch_array($totalesComputacionAsistida);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '126'";
    $totalesSenas= mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $senas= mysqli_fetch_array($totalesSenas);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '155'";
    $totalesEstenografia= mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $estenografia= mysqli_fetch_array($totalesEstenografia);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '156'";
    $totalesClubSensorial= mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $clubSensorial= mysqli_fetch_array($totalesClubSensorial);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '157'";
    $totalesCulturaSorda= mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $culturaSorda= mysqli_fetch_array($totalesCulturaSorda);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '158'";
    $totalesExpresionCorporal= mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $expresionCorporal= mysqli_fetch_array($totalesExpresionCorporal);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '161'";
    $totalesDiversidadSexual= mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $diversidadSexual= mysqli_fetch_array($totalesDiversidadSexual);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '160'";
    $totalesArteInclusivo= mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $arteInclusivo = mysqli_fetch_array($totalesArteInclusivo); 

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '162'";
    $totalesTalleresNahuatl= mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $talleresNahuatl = mysqli_fetch_array($totalesTalleresNahuatl); 

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '163'";
    $totalesIdentidadOriginaria= mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $identidadOriginaria = mysqli_fetch_array($totalesIdentidadOriginaria); 

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '164'";
    $totalesTalleresInterculturalidad = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $talleresInterculturalidad = mysqli_fetch_array($totalesTalleresInterculturalidad);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '165'";
    $totalesRevitalizacionLenguas = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $revitalizacionLenguas = mysqli_fetch_array($totalesRevitalizacionLenguas);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '166'";
    $totalesSaberesComunidad = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $saberesComunidad = mysqli_fetch_array($totalesSaberesComunidad);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '168'";
    $totalesBiodiversidad = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $biodiversidad = mysqli_fetch_array($totalesBiodiversidad);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '169'";
    $totalesDerechoshumanos = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $derechoshumanos = mysqli_fetch_array($totalesDerechoshumanos);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '183'";
    $totalesDerechosIndigenas = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $derechosIndigenas = mysqli_fetch_array($totalesDerechosIndigenas);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '167'";
    $totalesFeminismoComunitario = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $feminismoComunitario = mysqli_fetch_array($totalesFeminismoComunitario);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '170'";
    $totalesAlfabetizacionIndigena = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $alfabetizacionIndigena = mysqli_fetch_array($totalesAlfabetizacionIndigena);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '171'";
    $totalesAsesoriasIndigena = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $asesoriasIndigena = mysqli_fetch_array($totalesAsesoriasIndigena);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '172'";
    $totalesSeguimientoIndigena = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $seguimientoIndigena = mysqli_fetch_array($totalesSeguimientoIndigena);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '173'";
    $totalesMigrantes = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $migrantes = mysqli_fetch_array($totalesMigrantes);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '174'";
    $totalesAlfabetizacionMigrantes = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $alfabetizacionmigrantes = mysqli_fetch_array($totalesAlfabetizacionMigrantes);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '175'";
    $totalesAsesoriasMigrantes = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $asesoriasmigrantes = mysqli_fetch_array($totalesAsesoriasMigrantes);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '176'";
    $totalesSeguimientoMigrantes = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $seguimientomigrantes = mysqli_fetch_array($totalesSeguimientoMigrantes);
/**
* Usuarios con beca en Ciberescuelas Por modulo
*/
    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '10'";
    $totalesBadiModulo1 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $badiModulo1 = mysqli_fetch_array($totalesBadiModulo1);

        $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '10' AND A2.ActividadesSubModulo_idSubModulo = '145'";
        $totalesBadiSubModulo1 = mysqli_query($con, $sql);
        //var_dump($totalesCultura);
        $badiSubModulo1 = mysqli_fetch_array($totalesBadiSubModulo1);

        $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '10' AND A2.ActividadesSubModulo_idSubModulo = '146'";
        $totalesBadiSubModulo2 = mysqli_query($con, $sql);
        //var_dump($totalesCultura);
        $badiSubModulo2 = mysqli_fetch_array($totalesBadiSubModulo2);

        $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '10' AND A2.ActividadesSubModulo_idSubModulo = '147'";
        $totalesBadiSubModulo3 = mysqli_query($con, $sql);
        //var_dump($totalesCultura);
        $badiSubModulo3 = mysqli_fetch_array($totalesBadiSubModulo3);

        $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '10' AND A2.ActividadesSubModulo_idSubModulo = '148'";
        $totalesBadiSubModulo4 = mysqli_query($con, $sql);
        //var_dump($totalesCultura);
        $badiSubModulo4 = mysqli_fetch_array($totalesBadiSubModulo4);

        $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '10' AND A2.ActividadesSubModulo_idSubModulo = '149'";
        $totalesBadiSubModulo5 = mysqli_query($con, $sql);
        //var_dump($totalesCultura);
        $badiSubModulo5 = mysqli_fetch_array($totalesBadiSubModulo5);

        $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '10' AND A2.ActividadesSubModulo_idSubModulo = '150'";
        $totalesBadiSubModulo6 = mysqli_query($con, $sql);
        //var_dump($totalesCultura);
        $badiSubModulo6 = mysqli_fetch_array($totalesBadiSubModulo6);

        $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '10' AND A2.ActividadesSubModulo_idSubModulo = '151'";
        $totalesBadiSubModulo7 = mysqli_query($con, $sql);
        //var_dump($totalesCultura);
        $badiSubModulo7 = mysqli_fetch_array($totalesBadiSubModulo7);
    
    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '11'";
    $totalesBadiModulo2 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $badiModulo2 = mysqli_fetch_array($totalesBadiModulo2);

        $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '11' AND A2.ActividadesSubModulo_idSubModulo = '152'";
        $totalesBadi2SubModulo1 = mysqli_query($con, $sql);
        //var_dump($totalesCultura);
        $badi2SubModulo1 = mysqli_fetch_array($totalesBadi2SubModulo1);

        $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '11' AND A2.ActividadesSubModulo_idSubModulo = '153'";
        $totalesBadi2SubModulo2 = mysqli_query($con, $sql);
        //var_dump($totalesCultura);
        $badi2SubModulo2 = mysqli_fetch_array($totalesBadi2SubModulo2);

        $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '11' AND A2.ActividadesSubModulo_idSubModulo = '154'";
        $totalesBadi2SubModulo3 = mysqli_query($con, $sql);
        //var_dump($totalesCultura);
        $badi2SubModulo3 = mysqli_fetch_array($totalesBadi2SubModulo3);

        $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '11' AND A2.ActividadesSubModulo_idSubModulo = '155'";
        $totalesBadi2SubModulo4 = mysqli_query($con, $sql);
        //var_dump($totalesCultura);
        $badi2SubModulo4 = mysqli_fetch_array($totalesBadi2SubModulo4);

        $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '11' AND A2.ActividadesSubModulo_idSubModulo = '156'";
        $totalesBadi2SubModulo5 = mysqli_query($con, $sql);
        //var_dump($totalesCultura);
        $badi2SubModulo5 = mysqli_fetch_array($totalesBadi2SubModulo5);

        $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '11' AND A2.ActividadesSubModulo_idSubModulo = '157'";
        $totalesBadi2SubModulo6 = mysqli_query($con, $sql);
        //var_dump($totalesCultura);
        $badi2SubModulo6 = mysqli_fetch_array($totalesBadi2SubModulo6);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '12'";
    $totalesBadiModulo3 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $badiModulo3 = mysqli_fetch_array($totalesBadiModulo3);

        $sql="SELECT count(DISTINCT B1.idUsuario)  AS userPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '12' AND A2.ActividadesSubModulo_idSubModulo = '158'";
        $totalesBadi3SubModulo1 = mysqli_query($con, $sql);
        //var_dump($totalesCultura);
        $badi3SubModulo1 = mysqli_fetch_array($totalesBadi3SubModulo1);

        $sql="SELECT count(DISTINCT B1.idUsuario)  AS userPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '12' AND A2.ActividadesSubModulo_idSubModulo = '159'";
        $totalesBadi3SubModulo2 = mysqli_query($con, $sql);
        //var_dump($totalesCultura);
        $badi3SubModulo2 = mysqli_fetch_array($totalesBadi3SubModulo2);

        $sql="SELECT count(DISTINCT B1.idUsuario)  AS userPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '12' AND A2.ActividadesSubModulo_idSubModulo = '160'";
        $totalesBadi3SubModulo3 = mysqli_query($con, $sql);
        //var_dump($totalesCultura);
        $badi3SubModulo3 = mysqli_fetch_array($totalesBadi3SubModulo3);

        $sql="SELECT count(DISTINCT B1.idUsuario)  AS userPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '12' AND A2.ActividadesSubModulo_idSubModulo = '161'";
        $totalesBadi3SubModulo4 = mysqli_query($con, $sql);
        //var_dump($totalesCultura);
        $badi3SubModulo4 = mysqli_fetch_array($totalesBadi3SubModulo4);

        $sql="SELECT count(DISTINCT B1.idUsuario)  AS userPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '12' AND A2.ActividadesSubModulo_idSubModulo = '162'";
        $totalesBadi3SubModulo5 = mysqli_query($con, $sql);
        //var_dump($totalesCultura);
        $badi3SubModulo5 = mysqli_fetch_array($totalesBadi3SubModulo5);

        $sql="SELECT count(DISTINCT B1.idUsuario)  AS userPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '12' AND A2.ActividadesSubModulo_idSubModulo = '163'";
        $totalesBadi3SubModulo6 = mysqli_query($con, $sql);
        //var_dump($totalesCultura);
        $badi3SubModulo6 = mysqli_fetch_array($totalesBadi3SubModulo6);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '13'";
    $totalesBadiModulo4 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $badiModulo4 = mysqli_fetch_array($totalesBadiModulo4);

        $sql="SELECT count(DISTINCT B1.idUsuario)  AS userPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '13' AND A2.ActividadesSubModulo_idSubModulo = '164'";
        $totalesBadi4SubModulo1 = mysqli_query($con, $sql);
        //var_dump($totalesCultura);
        $badi4SubModulo1 = mysqli_fetch_array($totalesBadi4SubModulo1);

        $sql="SELECT count(DISTINCT B1.idUsuario)  AS userPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '13' AND A2.ActividadesSubModulo_idSubModulo = '165'";
        $totalesBadi4SubModulo2 = mysqli_query($con, $sql);
        //var_dump($totalesCultura);
        $badi4SubModulo2 = mysqli_fetch_array($totalesBadi4SubModulo2);

        $sql="SELECT count(DISTINCT B1.idUsuario)  AS userPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '13' AND A2.ActividadesSubModulo_idSubModulo = '166'";
        $totalesBadi4SubModulo3 = mysqli_query($con, $sql);
        //var_dump($totalesCultura);
        $badi4SubModulo3 = mysqli_fetch_array($totalesBadi4SubModulo3);

        $sql="SELECT count(DISTINCT B1.idUsuario)  AS userPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '13' AND A2.ActividadesSubModulo_idSubModulo = '167'";
        $totalesBadi4SubModulo4 = mysqli_query($con, $sql);
        //var_dump($totalesCultura);
        $badi4SubModulo4 = mysqli_fetch_array($totalesBadi4SubModulo4);

        $sql="SELECT count(DISTINCT B1.idUsuario)  AS userPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '13' AND A2.ActividadesSubModulo_idSubModulo = '168'";
        $totalesBadi4SubModulo5 = mysqli_query($con, $sql);
        //var_dump($totalesCultura);
        $badi4SubModulo5 = mysqli_fetch_array($totalesBadi4SubModulo5);

        $sql="SELECT count(DISTINCT B1.idUsuario)  AS userPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '13' AND A2.ActividadesSubModulo_idSubModulo = '169'";
        $totalesBadi4SubModulo6 = mysqli_query($con, $sql);
        //var_dump($totalesCultura);
        $badi4SubModulo6 = mysqli_fetch_array($totalesBadi4SubModulo6);

        $sql="SELECT count(DISTINCT B1.idUsuario)  AS userPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '13' AND A2.ActividadesSubModulo_idSubModulo = '170'";
        $totalesBadi4SubModulo7 = mysqli_query($con, $sql);
        //var_dump($totalesCultura);
        $badi4SubModulo7 = mysqli_fetch_array($totalesBadi4SubModulo7);

        $sql="SELECT count(DISTINCT B1.idUsuario)  AS userPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '13' AND A2.ActividadesSubModulo_idSubModulo = '171'";
        $totalesBadi4SubModulo8 = mysqli_query($con, $sql);
        //var_dump($totalesCultura);
        $badi4SubModulo8 = mysqli_fetch_array($totalesBadi4SubModulo8);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '14'";
    $totalesBadiModulo5 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $badiModulo5 = mysqli_fetch_array($totalesBadiModulo5);

        $sql="SELECT count(DISTINCT B1.idUsuario)  AS userPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '14' AND A2.ActividadesSubModulo_idSubModulo = '172'";
        $totalesBadi5SubModulo1 = mysqli_query($con, $sql);
        //var_dump($totalesCultura);
        $badi5SubModulo1 = mysqli_fetch_array($totalesBadi5SubModulo1);

        $sql="SELECT count(DISTINCT B1.idUsuario)  AS userPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '14' AND A2.ActividadesSubModulo_idSubModulo = '173'";
        $totalesBadi5SubModulo2 = mysqli_query($con, $sql);
        //var_dump($totalesCultura);
        $badi5SubModulo2 = mysqli_fetch_array($totalesBadi5SubModulo2);

        $sql="SELECT count(DISTINCT B1.idUsuario)  AS userPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '14' AND A2.ActividadesSubModulo_idSubModulo = '174'";
        $totalesBadi5SubModulo3 = mysqli_query($con, $sql);
        //var_dump($totalesCultura);
        $badi5SubModulo3 = mysqli_fetch_array($totalesBadi5SubModulo3);

        $sql="SELECT count(DISTINCT B1.idUsuario)  AS userPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '14' AND A2.ActividadesSubModulo_idSubModulo = '175'";
        $totalesBadi5SubModulo4 = mysqli_query($con, $sql);
        //var_dump($totalesCultura);
        $badi5SubModulo4 = mysqli_fetch_array($totalesBadi5SubModulo4);

        $sql="SELECT count(DISTINCT B1.idUsuario)  AS userPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '14' AND A2.ActividadesSubModulo_idSubModulo = '176'";
        $totalesBadi5SubModulo5 = mysqli_query($con, $sql);
        //var_dump($totalesCultura);
        $badi5SubModulo5 = mysqli_fetch_array($totalesBadi5SubModulo5);

        $sql="SELECT count(DISTINCT B1.idUsuario)  AS userPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '14' AND A2.ActividadesSubModulo_idSubModulo = '177'";
        $totalesBadi5SubModulo6 = mysqli_query($con, $sql);
        //var_dump($totalesCultura);
        $badi5SubModulo6 = mysqli_fetch_array($totalesBadi5SubModulo6);

        $sql="SELECT count(DISTINCT B1.idUsuario)  AS userPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '14' AND A2.ActividadesSubModulo_idSubModulo = '178'";
        $totalesBadi5SubModulo7 = mysqli_query($con, $sql);
        //var_dump($totalesCultura);
        $badi5SubModulo7 = mysqli_fetch_array($totalesBadi5SubModulo7);

        $sql="SELECT count(DISTINCT B1.idUsuario)  AS userPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '14' AND A2.ActividadesSubModulo_idSubModulo = '179'";
        $totalesBadi5SubModulo8 = mysqli_query($con, $sql);
        //var_dump($totalesCultura);
        $badi5SubModulo8 = mysqli_fetch_array($totalesBadi5SubModulo8);

        $sql="SELECT count(DISTINCT B1.idUsuario)  AS userPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '14' AND A2.ActividadesSubModulo_idSubModulo = '180'";
        $totalesBadi5SubModulo9 = mysqli_query($con, $sql);
        //var_dump($totalesCultura);
        $badi5SubModulo9 = mysqli_fetch_array($totalesBadi5SubModulo9);
/**
* Prepa en linea Usuarios por Modulo
*/        
    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '110' AND A2.ActividadesModulo_idModulo = '58'";
    $totalesPrepaLineaModulo1 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $prepaLineaModulo1 = mysqli_fetch_array($totalesPrepaLineaModulo1);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '110' AND A2.ActividadesModulo_idModulo = '15'";
    $totalesPrepaLineaModulo2 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $prepaLineaModulo2 = mysqli_fetch_array($totalesPrepaLineaModulo2);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '110' AND A2.ActividadesModulo_idModulo = '16'";
    $totalesPrepaLineaModulo3 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $prepaLineaModulo3 = mysqli_fetch_array($totalesPrepaLineaModulo3);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '110' AND A2.ActividadesModulo_idModulo = '17'";
    $totalesPrepaLineaModulo4 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $prepaLineaModulo4 = mysqli_fetch_array($totalesPrepaLineaModulo4);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '110' AND A2.ActividadesModulo_idModulo = '18'";
    $totalesPrepaLineaModulo5 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $prepaLineaModulo5 = mysqli_fetch_array($totalesPrepaLineaModulo5);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '110' AND A2.ActividadesModulo_idModulo = '19'";
    $totalesPrepaLineaModulo6 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $prepaLineaModulo6 = mysqli_fetch_array($totalesPrepaLineaModulo6);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '110' AND A2.ActividadesModulo_idModulo = '20'";
    $totalesPrepaLineaModulo7 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $prepaLineaModulo7 = mysqli_fetch_array($totalesPrepaLineaModulo7);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '110' AND A2.ActividadesModulo_idModulo = '21'";
    $totalesPrepaLineaModulo8 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $prepaLineaModulo8 = mysqli_fetch_array($totalesPrepaLineaModulo8);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '110' AND A2.ActividadesModulo_idModulo = '22'";
    $totalesPrepaLineaModulo9 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $prepaLineaModulo9 = mysqli_fetch_array($totalesPrepaLineaModulo9);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '110' AND A2.ActividadesModulo_idModulo = '23'";
    $totalesPrepaLineaModulo10 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $prepaLineaModulo10 = mysqli_fetch_array($totalesPrepaLineaModulo10);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '110' AND A2.ActividadesModulo_idModulo = '24'";
    $totalesPrepaLineaModulo11 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $prepaLineaModulo11 = mysqli_fetch_array($totalesPrepaLineaModulo11);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '110' AND A2.ActividadesModulo_idModulo = '25'";
    $totalesPrepaLineaModulo12 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $prepaLineaModulo12 = mysqli_fetch_array($totalesPrepaLineaModulo12);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '110' AND A2.ActividadesModulo_idModulo = '26'";
    $totalesPrepaLineaModulo13 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $prepaLineaModulo13 = mysqli_fetch_array($totalesPrepaLineaModulo13);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '110' AND A2.ActividadesModulo_idModulo = '27'";
    $totalesPrepaLineaModulo14 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $prepaLineaModulo14 = mysqli_fetch_array($totalesPrepaLineaModulo14);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '110' AND A2.ActividadesModulo_idModulo = '28'";
    $totalesPrepaLineaModulo15 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $prepaLineaModulo15 = mysqli_fetch_array($totalesPrepaLineaModulo15);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '110' AND A2.ActividadesModulo_idModulo = '29'";
    $totalesPrepaLineaModulo16 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $prepaLineaModulo16 = mysqli_fetch_array($totalesPrepaLineaModulo16);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '110' AND A2.ActividadesModulo_idModulo = '30'";
    $totalesPrepaLineaModulo17 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $prepaLineaModulo17 = mysqli_fetch_array($totalesPrepaLineaModulo17);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '110' AND A2.ActividadesModulo_idModulo = '31'";
    $totalesPrepaLineaModulo18 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $prepaLineaModulo18 = mysqli_fetch_array($totalesPrepaLineaModulo18);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '110' AND A2.ActividadesModulo_idModulo = '32'";
    $totalesPrepaLineaModulo19 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $prepaLineaModulo19 = mysqli_fetch_array($totalesPrepaLineaModulo19);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '110' AND A2.ActividadesModulo_idModulo = '33'";
    $totalesPrepaLineaModulo20 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $prepaLineaModulo20 = mysqli_fetch_array($totalesPrepaLineaModulo20);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '110' AND A2.ActividadesModulo_idModulo = '34'";
    $totalesPrepaLineaModulo21 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $prepaLineaModulo21 = mysqli_fetch_array($totalesPrepaLineaModulo21);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '110' AND A2.ActividadesModulo_idModulo = '35'";
    $totalesPrepaLineaModulo22 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $prepaLineaModulo22 = mysqli_fetch_array($totalesPrepaLineaModulo22);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '110' AND A2.ActividadesModulo_idModulo = '36'";
    $totalesPrepaLineaModulo23 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $prepaLineaModulo23 = mysqli_fetch_array($totalesPrepaLineaModulo23);

/**
* COLBACH Usuarios por Modulo
*/        
    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '112' AND A2.ActividadesModulo_idModulo = '50'";
    $totalesColbachModulo1 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $colbachModulo1 = mysqli_fetch_array($totalesColbachModulo1);

        $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '112' AND A2.ActividadesModulo_idModulo = '50' AND A2.ActividadesSubModulo_idSubModulo = '181'";
        $totalesColbach1SubModulo1 = mysqli_query($con, $sql);
        //var_dump($totalesCultura);
        $colbach1SubModulo1 = mysqli_fetch_array($totalesColbach1SubModulo1);

        $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '112' AND A2.ActividadesModulo_idModulo = '50' AND A2.ActividadesSubModulo_idSubModulo = '182'";
        $totalesColbach1SubModulo2 = mysqli_query($con, $sql);
        //var_dump($totalesCultura);
        $colbach1SubModulo2 = mysqli_fetch_array($totalesColbach1SubModulo2);

        $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '112' AND A2.ActividadesModulo_idModulo = '50' AND A2.ActividadesSubModulo_idSubModulo = '183'";
        $totalesColbach1SubModulo3 = mysqli_query($con, $sql);
        //var_dump($totalesCultura);
        $colbach1SubModulo3 = mysqli_fetch_array($totalesColbach1SubModulo3);

        $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '112' AND A2.ActividadesModulo_idModulo = '50' AND A2.ActividadesSubModulo_idSubModulo = '184'";
        $totalesColbach1SubModulo4 = mysqli_query($con, $sql);
        //var_dump($totalesCultura);
        $colbach1SubModulo4 = mysqli_fetch_array($totalesColbach1SubModulo4);

        $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '112' AND A2.ActividadesModulo_idModulo = '50' AND A2.ActividadesSubModulo_idSubModulo = '185'";
        $totalesColbach1SubModulo5 = mysqli_query($con, $sql);
        //var_dump($totalesCultura);
        $colbach1SubModulo5 = mysqli_fetch_array($totalesColbach1SubModulo5);

        $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '112' AND A2.ActividadesModulo_idModulo = '50' AND A2.ActividadesSubModulo_idSubModulo = '186'";
        $totalesColbach1SubModulo6 = mysqli_query($con, $sql);
        //var_dump($totalesCultura);
        $colbach1SubModulo6 = mysqli_fetch_array($totalesColbach1SubModulo6);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '112' AND A2.ActividadesModulo_idModulo = '51'";
    $totalesColbachModulo2 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $colbachModulo2 = mysqli_fetch_array($totalesColbachModulo2);

        $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '112' AND A2.ActividadesModulo_idModulo = '51' AND A2.ActividadesSubModulo_idSubModulo = '187'";
        $totalesColbach2SubModulo1 = mysqli_query($con, $sql);
        //var_dump($totalesCultura);
        $colbach2SubModulo1 = mysqli_fetch_array($totalesColbach2SubModulo1);

        $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '112' AND A2.ActividadesModulo_idModulo = '51' AND A2.ActividadesSubModulo_idSubModulo = '188'";
        $totalesColbach2SubModulo2 = mysqli_query($con, $sql);
        //var_dump($totalesCultura);
        $colbach2SubModulo2 = mysqli_fetch_array($totalesColbach2SubModulo2);

        $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '112' AND A2.ActividadesModulo_idModulo = '51' AND A2.ActividadesSubModulo_idSubModulo = '189'";
        $totalesColbach2SubModulo3 = mysqli_query($con, $sql);
        //var_dump($totalesCultura);
        $colbach2SubModulo3 = mysqli_fetch_array($totalesColbach2SubModulo3);
/**
* Prepa Abierta Usuarios por Modulo
*/  
    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '113' AND A2.ActividadesModulo_idModulo = '53'";
    $totalesPrepaAbiertaModulo1 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $prepaAbiertaModulo1 = mysqli_fetch_array($totalesPrepaAbiertaModulo1);

        $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '113' AND A2.ActividadesModulo_idModulo = '53' AND A2.ActividadesSubModulo_idSubModulo = '220'";
        $totalesPrepaAbierta1SubModulo1 = mysqli_query($con, $sql);
        //var_dump($totalesCultura);
        $prepaAbierta1SubModulo1 = mysqli_fetch_array($totalesPrepaAbierta1SubModulo1);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '113' AND A2.ActividadesModulo_idModulo = '54'";
    $totalesPrepaAbiertaModulo2 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $prepaAbiertaModulo2 = mysqli_fetch_array($totalesPrepaAbiertaModulo2);

        $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '113' AND A2.ActividadesModulo_idModulo = '54' AND A2.ActividadesSubModulo_idSubModulo = '221'";
        $totalesPrepaAbierta2SubModulo1 = mysqli_query($con, $sql);
        //var_dump($totalesCultura);
        $prepaAbierta2SubModulo1 = mysqli_fetch_array($totalesPrepaAbierta2SubModulo1);

        $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '113' AND A2.ActividadesModulo_idModulo = '54' AND A2.ActividadesSubModulo_idSubModulo = '222'";
        $totalesPrepaAbierta2SubModulo2 = mysqli_query($con, $sql);
        //var_dump($totalesCultura);
        $prepaAbierta2SubModulo2 = mysqli_fetch_array($totalesPrepaAbierta2SubModulo2);

        $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '113' AND A2.ActividadesModulo_idModulo = '54' AND A2.ActividadesSubModulo_idSubModulo = '223'";
        $totalesPrepaAbierta2SubModulo3 = mysqli_query($con, $sql);
        //var_dump($totalesCultura);
        $prepaAbierta2SubModulo3 = mysqli_fetch_array($totalesPrepaAbierta2SubModulo3);

        $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '113' AND A2.ActividadesModulo_idModulo = '54' AND A2.ActividadesSubModulo_idSubModulo = '224'";
        $totalesPrepaAbierta2SubModulo4 = mysqli_query($con, $sql);
        //var_dump($totalesCultura);
        $prepaAbierta2SubModulo4 = mysqli_fetch_array($totalesPrepaAbierta2SubModulo4);

        $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '113' AND A2.ActividadesModulo_idModulo = '54' AND A2.ActividadesSubModulo_idSubModulo = '225'";
        $totalesPrepaAbierta2SubModulo5 = mysqli_query($con, $sql);
        //var_dump($totalesCultura);
        $prepaAbierta2SubModulo5 = mysqli_fetch_array($totalesPrepaAbierta2SubModulo5);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '113' AND A2.ActividadesModulo_idModulo = '55'";
    $totalesPrepaAbiertaModulo3 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $prepaAbiertaModulo3 = mysqli_fetch_array($totalesPrepaAbiertaModulo3);

        $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '113' AND A2.ActividadesModulo_idModulo = '55' AND A2.ActividadesSubModulo_idSubModulo = '226'";
        $totalesPrepaAbierta3SubModulo1 = mysqli_query($con, $sql);
        //var_dump($totalesCultura);
        $prepaAbierta3SubModulo1 = mysqli_fetch_array($totalesPrepaAbierta3SubModulo1);

        $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '113' AND A2.ActividadesModulo_idModulo = '55' AND A2.ActividadesSubModulo_idSubModulo = '227'";
        $totalesPrepaAbierta3SubModulo2 = mysqli_query($con, $sql);
        //var_dump($totalesCultura);
        $prepaAbierta3SubModulo2 = mysqli_fetch_array($totalesPrepaAbierta3SubModulo2);

        $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '113' AND A2.ActividadesModulo_idModulo = '55' AND A2.ActividadesSubModulo_idSubModulo = '228'";
        $totalesPrepaAbierta3SubModulo3 = mysqli_query($con, $sql);
        //var_dump($totalesCultura);
        $prepaAbierta3SubModulo3 = mysqli_fetch_array($totalesPrepaAbierta3SubModulo3);

        $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '113' AND A2.ActividadesModulo_idModulo = '55' AND A2.ActividadesSubModulo_idSubModulo = '229'";
        $totalesPrepaAbierta3SubModulo4 = mysqli_query($con, $sql);
        //var_dump($totalesCultura);
        $prepaAbierta3SubModulo4 = mysqli_fetch_array($totalesPrepaAbierta3SubModulo4);

        $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '113' AND A2.ActividadesModulo_idModulo = '55' AND A2.ActividadesSubModulo_idSubModulo = '230'";
        $totalesPrepaAbierta3SubModulo5 = mysqli_query($con, $sql);
        //var_dump($totalesCultura);
        $prepaAbierta3SubModulo5 = mysqli_fetch_array($totalesPrepaAbierta3SubModulo5);

        $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '113' AND A2.ActividadesModulo_idModulo = '55' AND A2.ActividadesSubModulo_idSubModulo = '231'";
        $totalesPrepaAbierta3SubModulo6 = mysqli_query($con, $sql);
        //var_dump($totalesCultura);
        $prepaAbierta3SubModulo6 = mysqli_fetch_array($totalesPrepaAbierta3SubModulo6);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '113' AND A2.ActividadesModulo_idModulo = '56'";
    $totalesPrepaAbiertaModulo4 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $prepaAbiertaModulo4 = mysqli_fetch_array($totalesPrepaAbiertaModulo4);

        $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '113' AND A2.ActividadesModulo_idModulo = '56' AND A2.ActividadesSubModulo_idSubModulo = '232'";
        $totalesPrepaAbierta4SubModulo1 = mysqli_query($con, $sql);
        //var_dump($totalesCultura);
        $prepaAbierta4SubModulo1 = mysqli_fetch_array($totalesPrepaAbierta4SubModulo1);

        $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '113' AND A2.ActividadesModulo_idModulo = '56' AND A2.ActividadesSubModulo_idSubModulo = '233'";
        $totalesPrepaAbierta4SubModulo2 = mysqli_query($con, $sql);
        //var_dump($totalesCultura);
        $prepaAbierta4SubModulo2 = mysqli_fetch_array($totalesPrepaAbierta4SubModulo2);

        $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '113' AND A2.ActividadesModulo_idModulo = '56' AND A2.ActividadesSubModulo_idSubModulo = '234'";
        $totalesPrepaAbierta4SubModulo3 = mysqli_query($con, $sql);
        //var_dump($totalesCultura);
        $prepaAbierta4SubModulo3 = mysqli_fetch_array($totalesPrepaAbierta4SubModulo3);

        $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '113' AND A2.ActividadesModulo_idModulo = '56' AND A2.ActividadesSubModulo_idSubModulo = '235'";
        $totalesPrepaAbierta4SubModulo4 = mysqli_query($con, $sql);
        //var_dump($totalesCultura);
        $prepaAbierta4SubModulo4 = mysqli_fetch_array($totalesPrepaAbierta4SubModulo4);

        $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '113' AND A2.ActividadesModulo_idModulo = '56' AND A2.ActividadesSubModulo_idSubModulo = '236'";
        $totalesPrepaAbierta4SubModulo5 = mysqli_query($con, $sql);
        //var_dump($totalesCultura);
        $prepaAbierta4SubModulo5 = mysqli_fetch_array($totalesPrepaAbierta4SubModulo5);

        $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '113' AND A2.ActividadesModulo_idModulo = '56' AND A2.ActividadesSubModulo_idSubModulo = '237'";
        $totalesPrepaAbierta4SubModulo6 = mysqli_query($con, $sql);
        //var_dump($totalesCultura);
        $prepaAbierta4SubModulo6 = mysqli_fetch_array($totalesPrepaAbierta4SubModulo6);

        $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '113' AND A2.ActividadesModulo_idModulo = '56' AND A2.ActividadesSubModulo_idSubModulo = '238'";
        $totalesPrepaAbierta4SubModulo7 = mysqli_query($con, $sql);
        //var_dump($totalesCultura);
        $prepaAbierta4SubModulo7 = mysqli_fetch_array($totalesPrepaAbierta4SubModulo7);


    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '113' AND A2.ActividadesModulo_idModulo = '57'";
    $totalesPrepaAbiertaModulo5 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $prepaAbiertaModulo5 = mysqli_fetch_array($totalesPrepaAbiertaModulo5);

        $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '113' AND A2.ActividadesModulo_idModulo = '57' AND A2.ActividadesSubModulo_idSubModulo = '239'";
        $totalesPrepaAbierta5SubModulo1 = mysqli_query($con, $sql);
        //var_dump($totalesCultura);
        $prepaAbierta5SubModulo1 = mysqli_fetch_array($totalesPrepaAbierta5SubModulo1);

        $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '113' AND A2.ActividadesModulo_idModulo = '57' AND A2.ActividadesSubModulo_idSubModulo = '240'";
        $totalesPrepaAbierta5SubModulo2 = mysqli_query($con, $sql);
        //var_dump($totalesCultura);
        $prepaAbierta5SubModulo2 = mysqli_fetch_array($totalesPrepaAbierta5SubModulo2);

/**
* FIN - Usuarios con beca en Ciberescuelas Por modulo
*/

/**
* Atenciones de usuarios con beca en Ciberescuelas Por modulo
*/
$sql="SELECT count(*) AS atencionesPorActividadModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '10'";
$totalesBadiAtencionesModulo1 = mysqli_query($con, $sql);
//var_dump($totalesCultura);
$badiAtencionesModulo1 = mysqli_fetch_array($totalesBadiAtencionesModulo1);

    $sql="SELECT count(*) AS atencionesPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '10' AND A2.ActividadesSubModulo_idSubModulo = '145'";
    $totalesBadiAtencionesSubModulo1 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $badiAtencionesSubModulo1 = mysqli_fetch_array($totalesBadiAtencionesSubModulo1);

    $sql="SELECT count(*) AS atencionesPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '10' AND A2.ActividadesSubModulo_idSubModulo = '146'";
    $totalesBadiAtencionesSubModulo2 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $badiAtencionesSubModulo2 = mysqli_fetch_array($totalesBadiAtencionesSubModulo2);

    $sql="SELECT count(*) AS atencionesPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '10' AND A2.ActividadesSubModulo_idSubModulo = '147'";
    $totalesBadiAtencionesSubModulo3 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $badiAtencionesSubModulo3 = mysqli_fetch_array($totalesBadiAtencionesSubModulo3);

    $sql="SELECT count(*) AS atencionesPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '10' AND A2.ActividadesSubModulo_idSubModulo = '148'";
    $totalesBadiAtencionesSubModulo4 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $badiAtencionesSubModulo4 = mysqli_fetch_array($totalesBadiAtencionesSubModulo4);

    $sql="SELECT count(*) AS atencionesPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '10' AND A2.ActividadesSubModulo_idSubModulo = '149'";
    $totalesBadiAtencionesSubModulo5 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $badiAtencionesSubModulo5 = mysqli_fetch_array($totalesBadiAtencionesSubModulo5);

    $sql="SELECT count(*) AS atencionesPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '10' AND A2.ActividadesSubModulo_idSubModulo = '150'";
    $totalesBadiAtencionesSubModulo6 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $badiAtencionesSubModulo6 = mysqli_fetch_array($totalesBadiAtencionesSubModulo6);

    $sql="SELECT count(*) AS atencionesPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '10' AND A2.ActividadesSubModulo_idSubModulo = '151'";
    $totalesBadiAtencionesSubModulo7 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $badiAtencionesSubModulo7 = mysqli_fetch_array($totalesBadiAtencionesSubModulo7);

$sql="SELECT count(*) AS atencionesPorActividadModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '11'";
$totalesBadiAtencionesModulo2 = mysqli_query($con, $sql);
//var_dump($totalesCultura);
$badiAtencionesModulo2 = mysqli_fetch_array($totalesBadiAtencionesModulo2);

    $sql="SELECT count(*) AS atencionesPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '11' AND A2.ActividadesSubModulo_idSubModulo = '152'";
    $totalesBadiAtenciones2SubModulo1 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $badiAtenciones2SubModulo1 = mysqli_fetch_array($totalesBadiAtenciones2SubModulo1);

    $sql="SELECT count(*) AS atencionesPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '11' AND A2.ActividadesSubModulo_idSubModulo = '153'";
    $totalesBadiAtenciones2SubModulo2 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $badiAtenciones2SubModulo2 = mysqli_fetch_array($totalesBadiAtenciones2SubModulo2);

    $sql="SELECT count(*) AS atencionesPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '11' AND A2.ActividadesSubModulo_idSubModulo = '154'";
    $totalesBadiAtenciones2SubModulo3 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $badiAtenciones2SubModulo3 = mysqli_fetch_array($totalesBadiAtenciones2SubModulo3);

    $sql="SELECT count(*) AS atencionesPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '11' AND A2.ActividadesSubModulo_idSubModulo = '155'";
    $totalesBadiAtenciones2SubModulo4 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $badiAtenciones2SubModulo4 = mysqli_fetch_array($totalesBadiAtenciones2SubModulo4);

    $sql="SELECT count(*) AS atencionesPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '11' AND A2.ActividadesSubModulo_idSubModulo = '156'";
    $totalesBadiAtenciones2SubModulo5 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $badiAtenciones2SubModulo5 = mysqli_fetch_array($totalesBadiAtenciones2SubModulo5);

    $sql="SELECT count(*) AS atencionesPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '11' AND A2.ActividadesSubModulo_idSubModulo = '157'";
    $totalesBadiAtenciones2SubModulo6 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $badiAtenciones2SubModulo6 = mysqli_fetch_array($totalesBadiAtenciones2SubModulo6);

$sql="SELECT count(*) AS atencionesPorActividadModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '12'";
$totalesBadiAtencionesModulo3 = mysqli_query($con, $sql);
//var_dump($totalesCultura);
$badiAtencionesModulo3 = mysqli_fetch_array($totalesBadiAtencionesModulo3);

    $sql="SELECT count(*)  AS atencionesPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '12' AND A2.ActividadesSubModulo_idSubModulo = '158'";
    $totalesBadiAtenciones3SubModulo1 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $badiAtenciones3SubModulo1 = mysqli_fetch_array($totalesBadiAtenciones3SubModulo1);

    $sql="SELECT count(*)  AS atencionesPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '12' AND A2.ActividadesSubModulo_idSubModulo = '159'";
    $totalesBadiAtenciones3SubModulo2 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $badiAtenciones3SubModulo2 = mysqli_fetch_array($totalesBadiAtenciones3SubModulo2);

    $sql="SELECT count(*)  AS atencionesPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '12' AND A2.ActividadesSubModulo_idSubModulo = '160'";
    $totalesBadiAtenciones3SubModulo3 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $badiAtenciones3SubModulo3 = mysqli_fetch_array($totalesBadiAtenciones3SubModulo3);

    $sql="SELECT count(*)  AS atencionesPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '12' AND A2.ActividadesSubModulo_idSubModulo = '161'";
    $totalesBadiAtenciones3SubModulo4 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $badiAtenciones3SubModulo4 = mysqli_fetch_array($totalesBadiAtenciones3SubModulo4);

    $sql="SELECT count(*)  AS atencionesPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '12' AND A2.ActividadesSubModulo_idSubModulo = '162'";
    $totalesBadiAtenciones3SubModulo5 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $badiAtenciones3SubModulo5 = mysqli_fetch_array($totalesBadiAtenciones3SubModulo5);

    $sql="SELECT count(*)  AS atencionesPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '12' AND A2.ActividadesSubModulo_idSubModulo = '163'";
    $totalesBadiAtenciones3SubModulo6 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $badiAtenciones3SubModulo6 = mysqli_fetch_array($totalesBadiAtenciones3SubModulo6);

$sql="SELECT count(*) AS atencionesPorActividadModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '13'";
$totalesBadiAtencionesModulo4 = mysqli_query($con, $sql);
//var_dump($totalesCultura);
$badiAtencionesModulo4 = mysqli_fetch_array($totalesBadiAtencionesModulo4);

    $sql="SELECT count(*)  AS atencionesPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '13' AND A2.ActividadesSubModulo_idSubModulo = '164'";
    $totalesBadiAtenciones4SubModulo1 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $badiAtenciones4SubModulo1 = mysqli_fetch_array($totalesBadiAtenciones4SubModulo1);

    $sql="SELECT count(*)  AS atencionesPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '13' AND A2.ActividadesSubModulo_idSubModulo = '165'";
    $totalesBadiAtenciones4SubModulo2 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $badiAtenciones4SubModulo2 = mysqli_fetch_array($totalesBadiAtenciones4SubModulo2);

    $sql="SELECT count(*)  AS atencionesPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '13' AND A2.ActividadesSubModulo_idSubModulo = '166'";
    $totalesBadiAtenciones4SubModulo3 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $badiAtenciones4SubModulo3 = mysqli_fetch_array($totalesBadiAtenciones4SubModulo3);

    $sql="SELECT count(*)  AS atencionesPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '13' AND A2.ActividadesSubModulo_idSubModulo = '167'";
    $totalesBadiAtenciones4SubModulo4 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $badiAtenciones4SubModulo4 = mysqli_fetch_array($totalesBadiAtenciones4SubModulo4);

    $sql="SELECT count(*)  AS atencionesPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '13' AND A2.ActividadesSubModulo_idSubModulo = '168'";
    $totalesBadiAtenciones4SubModulo5 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $badiAtenciones4SubModulo5 = mysqli_fetch_array($totalesBadiAtenciones4SubModulo5);

    $sql="SELECT count(*)  AS atencionesPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '13' AND A2.ActividadesSubModulo_idSubModulo = '169'";
    $totalesBadiAtenciones4SubModulo6 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $badiAtenciones4SubModulo6 = mysqli_fetch_array($totalesBadiAtenciones4SubModulo6);

    $sql="SELECT count(*)  AS atencionesPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '13' AND A2.ActividadesSubModulo_idSubModulo = '170'";
    $totalesBadiAtenciones4SubModulo7 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $badiAtenciones4SubModulo7 = mysqli_fetch_array($totalesBadiAtenciones4SubModulo7);

    $sql="SELECT count(*)  AS atencionesPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '13' AND A2.ActividadesSubModulo_idSubModulo = '171'";
    $totalesBadiAtenciones4SubModulo8 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $badiAtenciones4SubModulo8 = mysqli_fetch_array($totalesBadiAtenciones4SubModulo8);

$sql="SELECT count(*) AS atencionesPorActividadModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '14'";
$totalesBadiAtencionesModulo5 = mysqli_query($con, $sql);
//var_dump($totalesCultura);
$badiAtencionesModulo5 = mysqli_fetch_array($totalesBadiAtencionesModulo5);

    $sql="SELECT count(*)  AS atencionesPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '14' AND A2.ActividadesSubModulo_idSubModulo = '172'";
    $totalesBadiAtenciones5SubModulo1 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $badiAtenciones5SubModulo1 = mysqli_fetch_array($totalesBadiAtenciones5SubModulo1);

    $sql="SELECT count(*)  AS atencionesPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '14' AND A2.ActividadesSubModulo_idSubModulo = '173'";
    $totalesBadiAtenciones5SubModulo2 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $badiAtenciones5SubModulo2 = mysqli_fetch_array($totalesBadiAtenciones5SubModulo2);

    $sql="SELECT count(*)  AS atencionesPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '14' AND A2.ActividadesSubModulo_idSubModulo = '174'";
    $totalesBadiAtenciones5SubModulo3 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $badiAtenciones5SubModulo3 = mysqli_fetch_array($totalesBadiAtenciones5SubModulo3);

    $sql="SELECT count(*)  AS atencionesPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '14' AND A2.ActividadesSubModulo_idSubModulo = '175'";
    $totalesBadiAtenciones5SubModulo4 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $badiAtenciones5SubModulo4 = mysqli_fetch_array($totalesBadiAtenciones5SubModulo4);

    $sql="SELECT count(*)  AS atencionesPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '14' AND A2.ActividadesSubModulo_idSubModulo = '176'";
    $totalesBadiAtenciones5SubModulo5 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $badiAtenciones5SubModulo5 = mysqli_fetch_array($totalesBadiAtenciones5SubModulo5);

    $sql="SELECT count(*)  AS atencionesPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '14' AND A2.ActividadesSubModulo_idSubModulo = '177'";
    $totalesBadiAtenciones5SubModulo6 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $badiAtenciones5SubModulo6 = mysqli_fetch_array($totalesBadiAtenciones5SubModulo6);

    $sql="SELECT count(*)  AS atencionesPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '14' AND A2.ActividadesSubModulo_idSubModulo = '178'";
    $totalesBadiAtenciones5SubModulo7 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $badiAtenciones5SubModulo7 = mysqli_fetch_array($totalesBadiAtenciones5SubModulo7);

    $sql="SELECT count(*)  AS atencionesPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '14' AND A2.ActividadesSubModulo_idSubModulo = '179'";
    $totalesBadiAtenciones5SubModulo8 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $badiAtenciones5SubModulo8 = mysqli_fetch_array($totalesBadiAtenciones5SubModulo8);

    $sql="SELECT count(*)  AS atencionesPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '14' AND A2.ActividadesSubModulo_idSubModulo = '180'";
    $totalesBadiAtenciones5SubModulo9 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $badiAtenciones5SubModulo9 = mysqli_fetch_array($totalesBadiAtenciones5SubModulo9);
/**
* Atenciones Prepa en linea Usuarios por Modulo
*/        
$sql="SELECT count(*) AS atencionesPorActividadModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '110' AND A2.ActividadesModulo_idModulo = '58'";
$totalesPrepaLineaAtencionesModulo1 = mysqli_query($con, $sql);
//var_dump($totalesCultura);
$prepaLineaAtencionesModulo1 = mysqli_fetch_array($totalesPrepaLineaAtencionesModulo1);

$sql="SELECT count(*) AS atencionesPorActividadModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '110' AND A2.ActividadesModulo_idModulo = '15'";
$totalesPrepaLineaAtencionesModulo2 = mysqli_query($con, $sql);
//var_dump($totalesCultura);
$prepaLineaAtencionesModulo2 = mysqli_fetch_array($totalesPrepaLineaAtencionesModulo2);

$sql="SELECT count(*) AS atencionesPorActividadModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '110' AND A2.ActividadesModulo_idModulo = '16'";
$totalesPrepaLineaAtencionesModulo3 = mysqli_query($con, $sql);
//var_dump($totalesCultura);
$prepaLineaAtencionesModulo3 = mysqli_fetch_array($totalesPrepaLineaAtencionesModulo3);

$sql="SELECT count(*) AS atencionesPorActividadModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '110' AND A2.ActividadesModulo_idModulo = '17'";
$totalesPrepaLineaAtencionesModulo4 = mysqli_query($con, $sql);
//var_dump($totalesCultura);
$prepaLineaAtencionesModulo4 = mysqli_fetch_array($totalesPrepaLineaAtencionesModulo4);

$sql="SELECT count(*) AS atencionesPorActividadModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '110' AND A2.ActividadesModulo_idModulo = '18'";
$totalesPrepaLineaAtencionesModulo5 = mysqli_query($con, $sql);
//var_dump($totalesCultura);
$prepaLineaAtencionesModulo5 = mysqli_fetch_array($totalesPrepaLineaAtencionesModulo5);

$sql="SELECT count(*) AS atencionesPorActividadModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '110' AND A2.ActividadesModulo_idModulo = '19'";
$totalesPrepaLineaAtencionesModulo6 = mysqli_query($con, $sql);
//var_dump($totalesCultura);
$prepaLineaAtencionesModulo6 = mysqli_fetch_array($totalesPrepaLineaAtencionesModulo6);

$sql="SELECT count(*) AS atencionesPorActividadModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '110' AND A2.ActividadesModulo_idModulo = '20'";
$totalesPrepaLineaAtencionesModulo7 = mysqli_query($con, $sql);
//var_dump($totalesCultura);
$prepaLineaAtencionesModulo7 = mysqli_fetch_array($totalesPrepaLineaAtencionesModulo7);

$sql="SELECT count(*) AS atencionesPorActividadModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '110' AND A2.ActividadesModulo_idModulo = '21'";
$totalesPrepaLineaAtencionesModulo8 = mysqli_query($con, $sql);
//var_dump($totalesCultura);
$prepaLineaAtencionesModulo8 = mysqli_fetch_array($totalesPrepaLineaAtencionesModulo8);

$sql="SELECT count(*) AS atencionesPorActividadModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '110' AND A2.ActividadesModulo_idModulo = '22'";
$totalesPrepaLineaAtencionesModulo9 = mysqli_query($con, $sql);
//var_dump($totalesCultura);
$prepaLineaAtencionesModulo9 = mysqli_fetch_array($totalesPrepaLineaAtencionesModulo9);

$sql="SELECT count(*) AS atencionesPorActividadModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '110' AND A2.ActividadesModulo_idModulo = '23'";
$totalesPrepaLineaAtencionesModulo10 = mysqli_query($con, $sql);
//var_dump($totalesCultura);
$prepaLineaAtencionesModulo10 = mysqli_fetch_array($totalesPrepaLineaAtencionesModulo10);

$sql="SELECT count(*) AS atencionesPorActividadModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '110' AND A2.ActividadesModulo_idModulo = '24'";
$totalesPrepaLineaAtencionesModulo11 = mysqli_query($con, $sql);
//var_dump($totalesCultura);
$prepaLineaAtencionesModulo11 = mysqli_fetch_array($totalesPrepaLineaAtencionesModulo11);

$sql="SELECT count(*) AS atencionesPorActividadModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '110' AND A2.ActividadesModulo_idModulo = '25'";
$totalesPrepaLineaAtencionesModulo12 = mysqli_query($con, $sql);
//var_dump($totalesCultura);
$prepaLineaAtencionesModulo12 = mysqli_fetch_array($totalesPrepaLineaAtencionesModulo12);

$sql="SELECT count(*) AS atencionesPorActividadModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '110' AND A2.ActividadesModulo_idModulo = '26'";
$totalesPrepaLineaAtencionesModulo13 = mysqli_query($con, $sql);
//var_dump($totalesCultura);
$prepaLineaAtencionesModulo13 = mysqli_fetch_array($totalesPrepaLineaAtencionesModulo13);

$sql="SELECT count(*) AS atencionesPorActividadModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '110' AND A2.ActividadesModulo_idModulo = '27'";
$totalesPrepaLineaAtencionesModulo14 = mysqli_query($con, $sql);
//var_dump($totalesCultura);
$prepaLineaAtencionesModulo14 = mysqli_fetch_array($totalesPrepaLineaAtencionesModulo14);

$sql="SELECT count(*) AS atencionesPorActividadModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '110' AND A2.ActividadesModulo_idModulo = '28'";
$totalesPrepaLineaAtencionesModulo15 = mysqli_query($con, $sql);
//var_dump($totalesCultura);
$prepaLineaAtencionesModulo15 = mysqli_fetch_array($totalesPrepaLineaAtencionesModulo15);

$sql="SELECT count(*) AS atencionesPorActividadModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '110' AND A2.ActividadesModulo_idModulo = '29'";
$totalesPrepaLineaAtencionesModulo16 = mysqli_query($con, $sql);
//var_dump($totalesCultura);
$prepaLineaAtencionesModulo16 = mysqli_fetch_array($totalesPrepaLineaAtencionesModulo16);

$sql="SELECT count(*) AS atencionesPorActividadModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '110' AND A2.ActividadesModulo_idModulo = '30'";
$totalesPrepaLineaAtencionesModulo17 = mysqli_query($con, $sql);
//var_dump($totalesCultura);
$prepaLineaAtencionesModulo17 = mysqli_fetch_array($totalesPrepaLineaAtencionesModulo17);

$sql="SELECT count(*) AS atencionesPorActividadModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '110' AND A2.ActividadesModulo_idModulo = '31'";
$totalesPrepaLineaAtencionesModulo18 = mysqli_query($con, $sql);
//var_dump($totalesCultura);
$prepaLineaAtencionesModulo18 = mysqli_fetch_array($totalesPrepaLineaAtencionesModulo18);

$sql="SELECT count(*) AS atencionesPorActividadModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '110' AND A2.ActividadesModulo_idModulo = '32'";
$totalesPrepaLineaAtencionesModulo19 = mysqli_query($con, $sql);
//var_dump($totalesCultura);
$prepaLineaAtencionesModulo19 = mysqli_fetch_array($totalesPrepaLineaAtencionesModulo19);

$sql="SELECT count(*) AS atencionesPorActividadModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '110' AND A2.ActividadesModulo_idModulo = '33'";
$totalesPrepaLineaAtencionesModulo20 = mysqli_query($con, $sql);
//var_dump($totalesCultura);
$prepaLineaAtencionesModulo20 = mysqli_fetch_array($totalesPrepaLineaAtencionesModulo20);

$sql="SELECT count(*) AS atencionesPorActividadModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '110' AND A2.ActividadesModulo_idModulo = '34'";
$totalesPrepaLineaAtencionesModulo21 = mysqli_query($con, $sql);
//var_dump($totalesCultura);
$prepaLineaAtencionesModulo21 = mysqli_fetch_array($totalesPrepaLineaAtencionesModulo21);

$sql="SELECT count(*) AS atencionesPorActividadModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '110' AND A2.ActividadesModulo_idModulo = '35'";
$totalesPrepaLineaAtencionesModulo22 = mysqli_query($con, $sql);
//var_dump($totalesCultura);
$prepaLineaAtencionesModulo22 = mysqli_fetch_array($totalesPrepaLineaAtencionesModulo22);

$sql="SELECT count(*) AS atencionesPorActividadModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '110' AND A2.ActividadesModulo_idModulo = '36'";
$totalesPrepaLineaAtencionesModulo23 = mysqli_query($con, $sql);
//var_dump($totalesCultura);
$prepaLineaAtencionesModulo23 = mysqli_fetch_array($totalesPrepaLineaAtencionesModulo23);

/**
* Atenciones COLBACH Usuarios por Modulo
*/        
$sql="SELECT count(*) AS atencionesPorActividadModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '112' AND A2.ActividadesModulo_idModulo = '50'";
$totalesColbachAtencionesModulo1 = mysqli_query($con, $sql);
//var_dump($totalesCultura);
$colbachAtencionesModulo1 = mysqli_fetch_array($totalesColbachAtencionesModulo1);

    $sql="SELECT count(*) AS atencionesPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '112' AND A2.ActividadesModulo_idModulo = '50' AND A2.ActividadesSubModulo_idSubModulo = '181'";
    $totalesColbachAtenciones1SubModulo1 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $colbachAtenciones1SubModulo1 = mysqli_fetch_array($totalesColbachAtenciones1SubModulo1);

    $sql="SELECT count(*) AS atencionesPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '112' AND A2.ActividadesModulo_idModulo = '50' AND A2.ActividadesSubModulo_idSubModulo = '182'";
    $totalesColbachAtenciones1SubModulo2 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $colbachAtenciones1SubModulo2 = mysqli_fetch_array($totalesColbachAtenciones1SubModulo2);

    $sql="SELECT count(*) AS atencionesPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '112' AND A2.ActividadesModulo_idModulo = '50' AND A2.ActividadesSubModulo_idSubModulo = '183'";
    $totalesColbachAtenciones1SubModulo3 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $colbachAtenciones1SubModulo3 = mysqli_fetch_array($totalesColbachAtenciones1SubModulo3);

    $sql="SELECT count(*) AS atencionesPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '112' AND A2.ActividadesModulo_idModulo = '50' AND A2.ActividadesSubModulo_idSubModulo = '184'";
    $totalesColbachAtenciones1SubModulo4 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $colbachAtenciones1SubModulo4 = mysqli_fetch_array($totalesColbachAtenciones1SubModulo4);

    $sql="SELECT count(*) AS atencionesPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '112' AND A2.ActividadesModulo_idModulo = '50' AND A2.ActividadesSubModulo_idSubModulo = '185'";
    $totalesColbachAtenciones1SubModulo5 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $colbachAtenciones1SubModulo5 = mysqli_fetch_array($totalesColbachAtenciones1SubModulo5);

    $sql="SELECT count(*) AS atencionesPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '112' AND A2.ActividadesModulo_idModulo = '50' AND A2.ActividadesSubModulo_idSubModulo = '186'";
    $totalesColbachAtenciones1SubModulo6 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $colbachAtenciones1SubModulo6 = mysqli_fetch_array($totalesColbachAtenciones1SubModulo6);

$sql="SELECT count(*) AS atencionesPorActividadModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '112' AND A2.ActividadesModulo_idModulo = '51'";
$totalesColbachAtencionesModulo2 = mysqli_query($con, $sql);
//var_dump($totalesCultura);
$colbachAtencionesModulo2 = mysqli_fetch_array($totalesColbachAtencionesModulo2);

    $sql="SELECT count(*) AS atencionesPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '112' AND A2.ActividadesModulo_idModulo = '51' AND A2.ActividadesSubModulo_idSubModulo = '187'";
    $totalesColbachAtenciones2SubModulo1 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $colbachAtenciones2SubModulo1 = mysqli_fetch_array($totalesColbachAtenciones2SubModulo1);

    $sql="SELECT count(*) AS atencionesPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '112' AND A2.ActividadesModulo_idModulo = '51' AND A2.ActividadesSubModulo_idSubModulo = '188'";
    $totalesColbachAtenciones2SubModulo2 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $colbachAtenciones2SubModulo2 = mysqli_fetch_array($totalesColbachAtenciones2SubModulo2);

    $sql="SELECT count(*) AS atencionesPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '112' AND A2.ActividadesModulo_idModulo = '51' AND A2.ActividadesSubModulo_idSubModulo = '189'";
    $totalesColbachAtenciones2SubModulo3 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $colbachAtenciones2SubModulo3 = mysqli_fetch_array($totalesColbachAtenciones2SubModulo3);
/**
* Atenciones Prepa Abierta Usuarios por Modulo
*/  
$sql="SELECT count(*) AS atencionesPorActividadModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '113' AND A2.ActividadesModulo_idModulo = '53'";
$totalesPrepaAbiertaAtencionesModulo1 = mysqli_query($con, $sql);
//var_dump($totalesCultura);
$prepaAbiertaAtencionesModulo1 = mysqli_fetch_array($totalesPrepaAbiertaAtencionesModulo1);

    $sql="SELECT count(*) AS atencionesPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '113' AND A2.ActividadesModulo_idModulo = '53' AND A2.ActividadesSubModulo_idSubModulo = '220'";
    $totalesPrepaAbiertaAtenciones1SubModulo1 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $prepaAbiertaAtenciones1SubModulo1 = mysqli_fetch_array($totalesPrepaAbiertaAtenciones1SubModulo1);

$sql="SELECT count(*) AS atencionesPorActividadModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '113' AND A2.ActividadesModulo_idModulo = '54'";
$totalesPrepaAbiertaAtencionesModulo2 = mysqli_query($con, $sql);
//var_dump($totalesCultura);
$prepaAbiertaAtencionesModulo2 = mysqli_fetch_array($totalesPrepaAbiertaAtencionesModulo2);

    $sql="SELECT count(*) AS atencionesPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '113' AND A2.ActividadesModulo_idModulo = '54' AND A2.ActividadesSubModulo_idSubModulo = '221'";
    $totalesPrepaAbiertaAtenciones2SubModulo1 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $prepaAbiertaAtenciones2SubModulo1 = mysqli_fetch_array($totalesPrepaAbiertaAtenciones2SubModulo1);

    $sql="SELECT count(*) AS atencionesPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '113' AND A2.ActividadesModulo_idModulo = '54' AND A2.ActividadesSubModulo_idSubModulo = '222'";
    $totalesPrepaAbiertaAtenciones2SubModulo2 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $prepaAbiertaAtenciones2SubModulo2 = mysqli_fetch_array($totalesPrepaAbiertaAtenciones2SubModulo2);

    $sql="SELECT count(*) AS atencionesPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '113' AND A2.ActividadesModulo_idModulo = '54' AND A2.ActividadesSubModulo_idSubModulo = '223'";
    $totalesPrepaAbiertaAtenciones2SubModulo3 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $prepaAbiertaAtenciones2SubModulo3 = mysqli_fetch_array($totalesPrepaAbiertaAtenciones2SubModulo3);

    $sql="SELECT count(*) AS atencionesPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '113' AND A2.ActividadesModulo_idModulo = '54' AND A2.ActividadesSubModulo_idSubModulo = '224'";
    $totalesPrepaAbiertaAtenciones2SubModulo4 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $prepaAbiertaAtenciones2SubModulo4 = mysqli_fetch_array($totalesPrepaAbiertaAtenciones2SubModulo4);

    $sql="SELECT count(*) AS atencionesPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '113' AND A2.ActividadesModulo_idModulo = '54' AND A2.ActividadesSubModulo_idSubModulo = '225'";
    $totalesPrepaAbiertaAtenciones2SubModulo5 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $prepaAbiertaAtenciones2SubModulo5 = mysqli_fetch_array($totalesPrepaAbiertaAtenciones2SubModulo5);

$sql="SELECT count(*) AS atencionesPorActividadModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '113' AND A2.ActividadesModulo_idModulo = '55'";
$totalesPrepaAbiertaAtencionesModulo3 = mysqli_query($con, $sql);
//var_dump($totalesCultura);
$prepaAbiertaAtencionesModulo3 = mysqli_fetch_array($totalesPrepaAbiertaAtencionesModulo3);

    $sql="SELECT count(*) AS atencionesPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '113' AND A2.ActividadesModulo_idModulo = '55' AND A2.ActividadesSubModulo_idSubModulo = '226'";
    $totalesPrepaAbiertaAtenciones3SubModulo1 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $prepaAbiertaAtenciones3SubModulo1 = mysqli_fetch_array($totalesPrepaAbiertaAtenciones3SubModulo1);

    $sql="SELECT count(*) AS atencionesPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '113' AND A2.ActividadesModulo_idModulo = '55' AND A2.ActividadesSubModulo_idSubModulo = '227'";
    $totalesPrepaAbiertaAtenciones3SubModulo2 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $prepaAbiertaAtenciones3SubModulo2 = mysqli_fetch_array($totalesPrepaAbiertaAtenciones3SubModulo2);

    $sql="SELECT count(*) AS atencionesPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '113' AND A2.ActividadesModulo_idModulo = '55' AND A2.ActividadesSubModulo_idSubModulo = '228'";
    $totalesPrepaAbiertaAtenciones3SubModulo3 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $prepaAbiertaAtenciones3SubModulo3 = mysqli_fetch_array($totalesPrepaAbiertaAtenciones3SubModulo3);

    $sql="SELECT count(*) AS atencionesPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '113' AND A2.ActividadesModulo_idModulo = '55' AND A2.ActividadesSubModulo_idSubModulo = '229'";
    $totalesPrepaAbiertaAtenciones3SubModulo4 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $prepaAbiertaAtenciones3SubModulo4 = mysqli_fetch_array($totalesPrepaAbiertaAtenciones3SubModulo4);

    $sql="SELECT count(*) AS atencionesPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '113' AND A2.ActividadesModulo_idModulo = '55' AND A2.ActividadesSubModulo_idSubModulo = '230'";
    $totalesPrepaAbiertaAtenciones3SubModulo5 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $prepaAbiertaAtenciones3SubModulo5 = mysqli_fetch_array($totalesPrepaAbiertaAtenciones3SubModulo5);

    $sql="SELECT count(*) AS atencionesPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '113' AND A2.ActividadesModulo_idModulo = '55' AND A2.ActividadesSubModulo_idSubModulo = '231'";
    $totalesPrepaAbiertaAtenciones3SubModulo6 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $prepaAbiertaAtenciones3SubModulo6 = mysqli_fetch_array($totalesPrepaAbiertaAtenciones3SubModulo6);

$sql="SELECT count(*) AS atencionesPorActividadModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '113' AND A2.ActividadesModulo_idModulo = '56'";
$totalesPrepaAbiertaAtencionesModulo4 = mysqli_query($con, $sql);
//var_dump($totalesCultura);
$prepaAbiertaAtencionesModulo4 = mysqli_fetch_array($totalesPrepaAbiertaAtencionesModulo4);

    $sql="SELECT count(*) AS atencionesPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '113' AND A2.ActividadesModulo_idModulo = '56' AND A2.ActividadesSubModulo_idSubModulo = '232'";
    $totalesPrepaAbiertaAtenciones4SubModulo1 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $prepaAbiertaAtenciones4SubModulo1 = mysqli_fetch_array($totalesPrepaAbiertaAtenciones4SubModulo1);

    $sql="SELECT count(*) AS atencionesPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '113' AND A2.ActividadesModulo_idModulo = '56' AND A2.ActividadesSubModulo_idSubModulo = '233'";
    $totalesPrepaAbiertaAtenciones4SubModulo2 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $prepaAbiertaAtenciones4SubModulo2 = mysqli_fetch_array($totalesPrepaAbiertaAtenciones4SubModulo2);

    $sql="SELECT count(*) AS atencionesPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '113' AND A2.ActividadesModulo_idModulo = '56' AND A2.ActividadesSubModulo_idSubModulo = '234'";
    $totalesPrepaAbiertaAtenciones4SubModulo3 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $prepaAbiertaAtenciones4SubModulo3 = mysqli_fetch_array($totalesPrepaAbiertaAtenciones4SubModulo3);

    $sql="SELECT count(*) AS atencionesPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '113' AND A2.ActividadesModulo_idModulo = '56' AND A2.ActividadesSubModulo_idSubModulo = '235'";
    $totalesPrepaAbiertaAtenciones4SubModulo4 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $prepaAbiertaAtenciones4SubModulo4 = mysqli_fetch_array($totalesPrepaAbiertaAtenciones4SubModulo4);

    $sql="SELECT count(*) AS atencionesPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '113' AND A2.ActividadesModulo_idModulo = '56' AND A2.ActividadesSubModulo_idSubModulo = '236'";
    $totalesPrepaAbiertaAtenciones4SubModulo5 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $prepaAbiertaAtenciones4SubModulo5 = mysqli_fetch_array($totalesPrepaAbiertaAtenciones4SubModulo5);

    $sql="SELECT count(*) AS atencionesPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '113' AND A2.ActividadesModulo_idModulo = '56' AND A2.ActividadesSubModulo_idSubModulo = '237'";
    $totalesPrepaAbiertaAtenciones4SubModulo6 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $prepaAbiertaAtenciones4SubModulo6 = mysqli_fetch_array($totalesPrepaAbiertaAtenciones4SubModulo6);

    $sql="SELECT count(*) AS atencionesPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '113' AND A2.ActividadesModulo_idModulo = '56' AND A2.ActividadesSubModulo_idSubModulo = '238'";
    $totalesPrepaAbiertaAtenciones4SubModulo7 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $prepaAbiertaAtenciones4SubModulo7 = mysqli_fetch_array($totalesPrepaAbiertaAtenciones4SubModulo7);


$sql="SELECT count(*) AS atencionesPorActividadModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '113' AND A2.ActividadesModulo_idModulo = '57'";
$totalesPrepaAbiertaAtencionesModulo5 = mysqli_query($con, $sql);
//var_dump($totalesCultura);
$prepaAbiertaAtencionesModulo5 = mysqli_fetch_array($totalesPrepaAbiertaAtencionesModulo5);

    $sql="SELECT count(*) AS atencionesPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '113' AND A2.ActividadesModulo_idModulo = '57' AND A2.ActividadesSubModulo_idSubModulo = '239'";
    $totalesPrepaAbiertaAtenciones5SubModulo1 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $prepaAbiertaAtenciones5SubModulo1 = mysqli_fetch_array($totalesPrepaAbiertaAtenciones5SubModulo1);

    $sql="SELECT count(*) AS atencionesPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '113' AND A2.ActividadesModulo_idModulo = '57' AND A2.ActividadesSubModulo_idSubModulo = '240'";
    $totalesPrepaAbiertaAtenciones5SubModulo2 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $prepaAbiertaAtenciones5SubModulo2 = mysqli_fetch_array($totalesPrepaAbiertaAtenciones5SubModulo2);

/**
* FIN - Atenciones de ususarios con beca en Ciberescuelas Por modulo
*/
/**
* Totales por actividad Deporte
*/
    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '17'";
    $totalesFutbol = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $futbol = mysqli_fetch_array($totalesFutbol);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '18'";
    $totalesBasquet = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $basquet = mysqli_fetch_array($totalesBasquet);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '19'";
    $totaleVoley = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $voley = mysqli_fetch_array($totaleVoley);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '20'";
    $totalesAcondicionamiento = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $acondicionamiento = mysqli_fetch_array($totalesAcondicionamiento);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '94'";
    $totalesZumba = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $zumba = mysqli_fetch_array($totalesZumba);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '95'";
    $totalesTae = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $tae = mysqli_fetch_array($totalesTae);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '96'";
    $totalesYoga = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $yoga = mysqli_fetch_array($totalesYoga);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '97'";
    $totalesTai = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $taiChi = mysqli_fetch_array($totalesTai);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '129'";
    $totalesRitmosLatinos = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $ritmosLatinos = mysqli_fetch_array($totalesRitmosLatinos);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '98'";
    $totalesBoxeo = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $boxeo = mysqli_fetch_array($totalesBoxeo);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '99'";
    $totalesAtletismo = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $atletismo = mysqli_fetch_array($totalesAtletismo);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '100'";
    $totalesKarate = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $karate = mysqli_fetch_array($totalesKarate);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '101'";
    $totalesKung = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $kung = mysqli_fetch_array($totalesKung);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '130'";
    $totalesTaekwondo = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $taekwondo = mysqli_fetch_array($totalesTaekwondo);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '203'";
    $totalesCapoeira = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $capoeira = mysqli_fetch_array($totalesCapoeira);

    /**
 * Totales por actividad Autonomía
*/
    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '153'";
    $totalesSerigrafia = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $serigrafia = mysqli_fetch_array($totalesSerigrafia);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '7'";
    $totalesReciclaje = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $reciclaje = mysqli_fetch_array($totalesReciclaje);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '186'";
    $totalesempaqueEmbalaje = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $empaqueEmbalaje = mysqli_fetch_array($totalesempaqueEmbalaje);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '65'";
    $totalesSistemaDistribucion = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $sistemaDistribucion = mysqli_fetch_array($totalesSistemaDistribucion);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '27'";
    $totalesEdicionDiseño = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $edicionDiseño = mysqli_fetch_array($totalesEdicionDiseño);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '37'";
    $totalesCarpinteria = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $carpinteria = mysqli_fetch_array($totalesCarpinteria);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '38'";
    $totalesPlomeria = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $plomeria = mysqli_fetch_array($totalesPlomeria);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '33'";
    $totalesAutoestima = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $autoestima = mysqli_fetch_array($totalesAutoestima);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '39'";
    $totalesHerreria = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $herreria = mysqli_fetch_array($totalesHerreria);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '40'";
    $totalesElectricidad = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $electricidad= mysqli_fetch_array($totalesElectricidad);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '41'";
    $totalesGastronomia = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $gastronomia = mysqli_fetch_array($totalesGastronomia);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '43'";
    $totalesJoyeria= mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $joyeria = mysqli_fetch_array($totalesJoyeria);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '44'";
    $totalesAgricultura = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $agricultura = mysqli_fetch_array($totalesAgricultura);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '47'";
    $totalesDiseñoImagen = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $diseñoImagen = mysqli_fetch_array($totalesDiseñoImagen);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '48'";
    $totalesCodMujeres = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $codMujeres = mysqli_fetch_array($totalesCodMujeres);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '49'";
    $totalesElectronica = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $electronica = mysqli_fetch_array($totalesElectronica);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '52'";
    $totalesTExtiles = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $textileDiseño = mysqli_fetch_array($totalesTExtiles);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '54'";
    $totalesFotoProducto = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $fotoProducto = mysqli_fetch_array($totalesFotoProducto);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '55'";
    $totalesLogos = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $logos = mysqli_fetch_array($totalesLogos);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '56'";
    $totalesCalidad = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $calidad = mysqli_fetch_array($totalesCalidad);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '57'";
    $totalesCooperativas = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $cooperativas = mysqli_fetch_array($totalesCooperativas);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '58'";
    $totalesEmprende= mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $emprende= mysqli_fetch_array($totalesEmprende);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '59'";
    $totalesMicroN= mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $microN= mysqli_fetch_array($totalesMicroN);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '60'";
    $totalesComercioDigital = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $comercioDigital = mysqli_fetch_array($totalesComercioDigital);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '61'";
    $totalesEstrategias = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $estrategias = mysqli_fetch_array($totalesEstrategias);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '62'";
    $totalesComercioJusto = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $comercioJusto = mysqli_fetch_array($totalesComercioJusto);

    
    /**
     * Atenciones totales atencionesTotal
     */
    $sql="SELECT count(*) AS atencionesTotal FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios";
    $totalAtenciones = mysqli_query($con, $sql);
    //var_dump($totalAtenciones);
    $atencionesTotales = mysqli_fetch_array($totalAtenciones);
     /**
     * Atenciones totales inscritos por genero  atencionesPorGenero
     */
    $sql="SELECT count(*) AS atencionesPorGenero FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND U1.sexo LIKE '%M%'";
    $atencionesMujeres = mysqli_query($con, $sql);
    //var_dump($atencionesMujeres);
    $mujeresAtenciones = mysqli_fetch_array($atencionesMujeres);

    $sql="SELECT count(*) AS atencionesPorGenero FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND U1.sexo LIKE '%H%'";
    $atencionesHombres = mysqli_query($con, $sql);
    //var_dump($atencionesHombres);
    $hombresAtenciones = mysqli_fetch_array($atencionesHombres);

    /**
* Atenciones  por intervalo de edad  asistenciasPorIntervalo
*/
$sql="SELECT count(*) AS atencionesPorIntervalo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND B1.edadUsuario = '15'"; 
$intervaloTotales1 = mysqli_query($con, $sql);
//var_dump($intervaloTotales1);
$totalesIntervalo1 = mysqli_fetch_array($intervaloTotales1);

$sql="SELECT count(*) AS atencionesPorIntervalo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND B1.edadUsuario = '16'";
$intervaloTotales2 = mysqli_query($con, $sql);
//var_dump($intervaloTotales2);
$totalesIntervalo2 = mysqli_fetch_array($intervaloTotales2);

$sql="SELECT count(*) AS atencionesPorIntervalo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND B1.edadUsuario = '17'";
$intervaloTotales3 = mysqli_query($con, $sql);
//var_dump($intervaloTotales3);
$totalesIntervalo3 = mysqli_fetch_array($intervaloTotales3);

$sql="SELECT count(*) AS atencionesPorIntervalo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND B1.edadUsuario = '18'";
$intervaloTotales4 = mysqli_query($con, $sql);
//var_dump($intervaloTotales4);
$totalesIntervalo4 = mysqli_fetch_array($intervaloTotales4);

$sql="SELECT count(*) AS atencionesPorIntervalo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND B1.edadUsuario = '19'";
$intervaloTotales5 = mysqli_query($con, $sql);
//var_dump($intervaloTotales5);
$totalesIntervalo5 = mysqli_fetch_array($intervaloTotales5);

$sql="SELECT count(*) AS atencionesPorIntervalo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND B1.edadUsuario = '20'"; 
$intervaloTotales6 = mysqli_query($con, $sql);
//var_dump($intervaloTotales6);
$totalesIntervalo6 = mysqli_fetch_array($intervaloTotales6);

$sql="SELECT count(*) AS atencionesPorIntervalo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND B1.edadUsuario = '21'";
$intervaloTotales7 = mysqli_query($con, $sql);
//var_dump($intervaloTotales7);
$totalesIntervalo7 = mysqli_fetch_array($intervaloTotales7);

$sql="SELECT count(*) AS atencionesPorIntervalo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND B1.edadUsuario = '22'";
$intervaloTotales8 = mysqli_query($con, $sql);
//var_dump($intervaloTotales8);
$totalesIntervalo8 = mysqli_fetch_array($intervaloTotales8);

$sql="SELECT count(*) AS atencionesPorIntervalo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND B1.edadUsuario = '23'";
$intervaloTotales9 = mysqli_query($con, $sql);
//var_dump($intervaloTotales9);
$totalesIntervalo9 = mysqli_fetch_array($intervaloTotales9);

$sql="SELECT count(*) AS atencionesPorIntervalo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND B1.edadUsuario = '24'";
$intervaloTotales10 = mysqli_query($con, $sql);
//var_dump($intervaloTotales10);
$totalesIntervalo10 = mysqli_fetch_array($intervaloTotales10);

$sql="SELECT count(*) AS atencionesPorIntervalo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND B1.edadUsuario = '25'"; 
$intervaloTotales11 = mysqli_query($con, $sql);
//var_dump($intervaloTotales11);
$totalesIntervalo11 = mysqli_fetch_array($intervaloTotales11);

$sql="SELECT count(*) AS atencionesPorIntervalo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND B1.edadUsuario = '26'";
$intervaloTotales12 = mysqli_query($con, $sql);
//var_dump($intervaloTotales12);
$totalesIntervalo12 = mysqli_fetch_array($intervaloTotales12);

$sql="SELECT count(*) AS atencionesPorIntervalo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND B1.edadUsuario = '27'";
$intervaloTotales13 = mysqli_query($con, $sql);
//var_dump($intervaloTotales13);
$totalesIntervalo13 = mysqli_fetch_array($intervaloTotales13);

$sql="SELECT count(*) AS atencionesPorIntervalo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND B1.edadUsuario = '28'";
$intervaloTotales14 = mysqli_query($con, $sql);
//var_dump($intervaloTotales14);
$totalesIntervalo14 = mysqli_fetch_array($intervaloTotales14);

$sql="SELECT count(*) AS atencionesPorIntervalo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND B1.edadUsuario = '29'";
$intervaloTotales15 = mysqli_query($con, $sql);
//var_dump($intervaloTotales15);
$totalesIntervalo15 = mysqli_fetch_array($intervaloTotales15);
/**
* Atenciones con beca porActividad
*/
/**
 * Atenciones con beca porActividad CULTURA
 */
    // $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '2'";
    // $totalesDanza = mysqli_query($con, $sql);
    // //var_dump($totalesCultura);
    // $danza = mysqli_fetch_array($totalesDanza);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '3'";
    $totalesBallet = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $balletAtenciones = mysqli_fetch_array($totalesBallet);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '2'";
    $totalesDanza = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $danzaAtenciones = mysqli_fetch_array($totalesDanza);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '9'";
    $totalesFoto = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $fotografiaAtenciones = mysqli_fetch_array($totalesFoto);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '67'";
    $totalesBaileSocial = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $baileSocialAtenciones = mysqli_fetch_array($totalesBaileSocial);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '68'";
    $totalesDanzaNiños = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $danzaNiñosAtenciones = mysqli_fetch_array($totalesDanzaNiños);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '69'";
    $totalesDanzaAdultos = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $danzaAdultosAtenciones = mysqli_fetch_array($totalesDanzaAdultos);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '70'";
    $totalesFolklorica = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $folkloricaAtenciones = mysqli_fetch_array($totalesFolklorica);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '71'";
    $totalesActuacion = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $actuacionAtenciones = mysqli_fetch_array($totalesActuacion);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '72'";
    $totalesTeatroCalle = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $teatroCalleAtenciones = mysqli_fetch_array($totalesTeatroCalle);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '73'";
    $totalesDanzaContemporanea = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $contemporaneaAtenciones = mysqli_fetch_array($totalesDanzaContemporanea);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '74'";
    $totalesPolinesia = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $polinesiaAtenciones = mysqli_fetch_array($totalesPolinesia);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '75'";
    $totalesTeatroMascaras = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $mascarasAtenciones = mysqli_fetch_array($totalesTeatroMascaras);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '76'";
    $totalesExpresio = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $expresionAtenciones = mysqli_fetch_array($totalesExpresio);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '77'";
    $totalesTelar = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $telarAtenciones = mysqli_fetch_array($totalesTelar);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '78'";
    $totalesCArtoneria = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $cartoneriaAtenciones = mysqli_fetch_array($totalesCArtoneria);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '79'";
    $totalesBordado = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $bordadoAtenciones = mysqli_fetch_array($totalesBordado);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '80'";
    $totalesConstruccion = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $construccionAtenciones = mysqli_fetch_array($totalesConstruccion);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '81'";
    $totalesDiseñoJuguetes = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $diseñoJuguetesAtenciones = mysqli_fetch_array($totalesDiseñoJuguetes);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '82'";
    $totalesReciclajeAmb = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $reciclajeAmbAtenciones = mysqli_fetch_array($totalesReciclajeAmb);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '83'";
    $totalesEscritura = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $escrituraAtenciones = mysqli_fetch_array($totalesEscritura);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '84'";
    $totalesPinturaArt = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $pinturaArtAtenciones = mysqli_fetch_array($totalesPinturaArt);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '85'";
    $totalesAudioVisual = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $audioVisualAtenciones = mysqli_fetch_array($totalesAudioVisual);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '86'";
    $totalesCine = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $cineAtenciones = mysqli_fetch_array($totalesCine);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '87'";
    $totalesAnimacionNiños = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $animacionNiñosAtenciones = mysqli_fetch_array($totalesAnimacionNiños);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '88'";
    $totalesVideoComunitario = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $videoComunitarioAtenciones = mysqli_fetch_array($totalesVideoComunitario);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '89'";
    $totalesGuitarra = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $guitarraAtenciones = mysqli_fetch_array($totalesGuitarra);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '90'";
    $totalesRap = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $rapAtenciones = mysqli_fetch_array($totalesRap);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '91'";
    $totalesPercusiones = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $percusionesAtenciones = mysqli_fetch_array($totalesPercusiones);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '92'";
    $totalesIniciacion = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $iniciacionAtenciones = mysqli_fetch_array($totalesIniciacion);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '93'";
    $totalesSonHuasteco = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $sonHuastecoAtenciones = mysqli_fetch_array($totalesSonHuasteco);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '123'";
    $totalesGrabado = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $grabadoAtenciones = mysqli_fetch_array($totalesGrabado);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '136'";
    $totalesClown = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $clownAtenciones = mysqli_fetch_array($totalesClown);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '143'";
    $totalesDanzaJazz = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $danzaJazzAtenciones = mysqli_fetch_array($totalesDanzaJazz);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '144'";
    $totalesIniciacionCanto = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $iniciacionCantoAtenciones = mysqli_fetch_array($totalesIniciacionCanto);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '146'";
    $totalesBellyDance = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $bellyDanceAtenciones = mysqli_fetch_array($totalesBellyDance);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '149'";
    $totalesAcercamientoAlCirco = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $acercamientoAlCircoAtenciones = mysqli_fetch_array($totalesAcercamientoAlCirco);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '148'";
    $totalesMedioAmbiente = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $medioAmbienteAtenciones = mysqli_fetch_array($totalesMedioAmbiente);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '135'";
    $totalesFotografiaDigital = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $fotografiaDigitalAtenciones = mysqli_fetch_array($totalesFotografiaDigital);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '142'";
    $totalesExperimentacionGrafica = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $experimentacionGraficaAtenciones = mysqli_fetch_array($totalesExperimentacionGrafica);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '139'";
    $totalesCinemaPilares = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $cinemaPilaresAtenciones = mysqli_fetch_array($totalesCinemaPilares);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '132'";
    $totalesModeladoPlastilina = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $modeladoPlastilinaAtenciones = mysqli_fetch_array($totalesModeladoPlastilina);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '138'";
    $totalesLibroClub = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $libroClubAtenciones = mysqli_fetch_array($totalesLibroClub);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '147'";
    $totalesLiteratura = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $literaturaAtenciones = mysqli_fetch_array($totalesLiteratura);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '131'";
    $totalesSalsaCubana = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $salsaCubanaAtenciones = mysqli_fetch_array($totalesSalsaCubana);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '150'";
    $totalesEncuadernacion = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $encuadernacionAtenciones = mysqli_fetch_array($totalesEncuadernacion);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '128'";
    $totalesArteCreatividad = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $arteCreatividadAtenciones = mysqli_fetch_array($totalesArteCreatividad);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '137'";
    $totalesArteCiencia = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $arteCienciaAtenciones = mysqli_fetch_array($totalesArteCiencia);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '140'";
    $totalesTransformaciones = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $transformacionesAtenciones = mysqli_fetch_array($totalesTransformaciones);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '141'";
    $totalesMeditacion = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $meditacionAtenciones = mysqli_fetch_array($totalesMeditacion);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '145'";
    $totalesVitrales = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $vitralesAtenciones = mysqli_fetch_array($totalesVitrales);
/**
* USUARIOS por actividad Ciberescuelas
*/
    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '21'";
    $totalesAjedrez = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $ajedrezAtenciones = mysqli_fetch_array($totalesAjedrez);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '152'";
    $totalesEdicionYdiseno = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $edicionYdisenoAtenciones = mysqli_fetch_array($totalesEdicionYdiseno);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '24'";
    $totalesClubCiencia = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $clubCienciaAtenciones = mysqli_fetch_array($totalesClubCiencia);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '25'";
    $totalesRoboticaApli = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $roboAtenciones = mysqli_fetch_array($totalesRoboticaApli);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '28'";
    $totalesClubCodigo = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $clubCodigoAtenciones = mysqli_fetch_array($totalesClubCodigo);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '29'";
    $totalesAmor = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $amorAtenciones = mysqli_fetch_array($totalesAmor);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '30'";
    $totalesPrevenAdic = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $prevenAdicAtenciones = mysqli_fetch_array($totalesPrevenAdic);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '31'";
    $totalesHabilidades = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $habilidadesAtenciones = mysqli_fetch_array($totalesHabilidades);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '32'";
    $totalesProyecto = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $proyectoAtenciones = mysqli_fetch_array($totalesProyecto);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '33'";
    $totalesAutoestima = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $autoestimaAtenciones = mysqli_fetch_array($totalesAutoestima);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '34'";
    $totalesTanato = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $tanatoAtenciones = mysqli_fetch_array($totalesTanato);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '35'";
    $totalesInteliEmo = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $inteliEmoAtenciones = mysqli_fetch_array($totalesInteliEmo);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '177'";
    $totalesRecuperandoMiLibertad = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $recuperandoMiLibertadAtenciones = mysqli_fetch_array($totalesRecuperandoMiLibertad);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '178'";
    $totalesComprendiendoAdolescencia = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $comprendiendoAdolescenciaAtenciones = mysqli_fetch_array($totalesComprendiendoAdolescencia);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '185'";
    $totalesComprendiendoNinez = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $comprendiendoNinezAtenciones = mysqli_fetch_array($totalesComprendiendoNinez);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '179'";
    $totalesConocerme = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $conocermeAtenciones = mysqli_fetch_array($totalesConocerme);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '180'";
    $totalesConversatorios = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $conversatoriosAtenciones = mysqli_fetch_array($totalesConversatorios);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '181'";
    $totalesAutosanarme = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $autosanarmeAtenciones = mysqli_fetch_array($totalesAutosanarme);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '182'";
    $totalesDanzanteMente = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $danzanteMenteAtenciones = mysqli_fetch_array($totalesDanzanteMente);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '36'";
    $totalesArteEmo = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $arteEmoAtenciones = mysqli_fetch_array($totalesArteEmo);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '102'";
    $totalesREdaccion = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $redaccionAtenciones = mysqli_fetch_array($totalesREdaccion);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '103'";
    $totalesTalleComp = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $talleresComAtenciones = mysqli_fetch_array($totalesTalleComp);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '104'";
    $totalesEmoMagic = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $emoMagicAtenciones = mysqli_fetch_array($totalesEmoMagic);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '105'";
    $totalesPintEmo = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $pintEmoAtenciones = mysqli_fetch_array($totalesPintEmo);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '106'";
    $totalesAlfabet = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $alfabetAtenciones = mysqli_fetch_array($totalesAlfabet);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '107'";
    $totalesPrimaRIA = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $primariaAtenciones = mysqli_fetch_array($totalesPrimaRIA);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '108'";
    $totalesSec = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $secundariaAtenciones = mysqli_fetch_array($totalesSec);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109'";
    $totalesBadi = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $badiAtenciones = mysqli_fetch_array($totalesBadi);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '110'";
    $totalesPrepaSep = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $prepaSepAtenciones = mysqli_fetch_array($totalesPrepaSep);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '112'";
    $totalesColbach = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $colbachAtenciones = mysqli_fetch_array($totalesColbach);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '113'";
    $totalesPrepaAbierta = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $prepaAbiertaAtenciones = mysqli_fetch_array($totalesPrepaAbierta);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '114'";
    $totalesBunam= mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $bunamAtenciones = mysqli_fetch_array($totalesBunam);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '115'";
    $totalesUnadm = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $unadmAtenciones = mysqli_fetch_array($totalesUnadm);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '116'";
    $totalesLicLinea = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $liclineaAtenciones = mysqli_fetch_array($totalesLicLinea);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '117'";
    $totalesLicCdmx = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $licCdmxAtenciones = mysqli_fetch_array($totalesLicCdmx);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '118'";
    $totalesAsePrim = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $asePrimariaAtenciones = mysqli_fetch_array($totalesAsePrim);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '119'";
    $totalesAseSec = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $aseSecundariaAtenciones = mysqli_fetch_array($totalesAseSec);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '120'";
    $totalesAsePrepa = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $asePrepAtenciones = mysqli_fetch_array($totalesAsePrepa);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '121'";
    $totalesAseLic = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $aseLicAtenciones= mysqli_fetch_array($totalesAseLic);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '122'";
    $totalesBaileCuero= mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $baileCuerpoAtenciones= mysqli_fetch_array($totalesBaileCuero);


    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '122'";
    $totalesBaileCuero= mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $baileCuerpoAtenciones= mysqli_fetch_array($totalesBaileCuero);


    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '124'";
    $totalesElectronicaBraile = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $braileAtenciones = mysqli_fetch_array($totalesElectronicaBraile);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '125'";
    $totalesComputacionAsistida= mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $computacionAsistidaAtenciones= mysqli_fetch_array($totalesComputacionAsistida);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '126'";
    $totalesSenas= mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $senasAtenciones= mysqli_fetch_array($totalesSenas);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '155'";
    $totalesEstenografia= mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $estenografiaAtenciones= mysqli_fetch_array($totalesEstenografia);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '156'";
    $totalesClubSensorial= mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $clubSensorialAtenciones= mysqli_fetch_array($totalesClubSensorial);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '157'";
    $totalesCulturaSorda= mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $culturaSordaAtenciones= mysqli_fetch_array($totalesCulturaSorda);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '158'";
    $totalesExpresionCorporal= mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $expresionCorporalAtenciones= mysqli_fetch_array($totalesExpresionCorporal);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '161'";
    $totalesDiversidadSexual= mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $diversidadSexualAtenciones= mysqli_fetch_array($totalesDiversidadSexual);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '160'";
    $totalesArteInclusivo= mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $arteInclusivoAtenciones = mysqli_fetch_array($totalesArteInclusivo); 

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '162'";
    $totalesTalleresNahuatl= mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $talleresNahuatlAtenciones = mysqli_fetch_array($totalesTalleresNahuatl); 

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '163'";
    $totalesIdentidadOriginaria= mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $identidadOriginariaAtenciones = mysqli_fetch_array($totalesIdentidadOriginaria); 

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '164'";
    $totalesTalleresInterculturalidad = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $talleresInterculturalidadAtenciones = mysqli_fetch_array($totalesTalleresInterculturalidad);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '165'";
    $totalesRevitalizacionLenguas = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $revitalizacionLenguasAtenciones = mysqli_fetch_array($totalesRevitalizacionLenguas);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '166'";
    $totalesSaberesComunidad = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $saberesComunidadAtenciones = mysqli_fetch_array($totalesSaberesComunidad);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '168'";
    $totalesBiodiversidad = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $biodiversidadAtenciones = mysqli_fetch_array($totalesBiodiversidad);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '169'";
    $totalesDerechoshumanos = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $derechoshumanosAtenciones = mysqli_fetch_array($totalesDerechoshumanos);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '183'";
    $totalesDerechosIndigenas = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $derechosIndigenasAtenciones = mysqli_fetch_array($totalesDerechosIndigenas);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '167'";
    $totalesFeminismoComunitario = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $feminismoComunitarioAtenciones = mysqli_fetch_array($totalesFeminismoComunitario);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '170'";
    $totalesAlfabetizacionIndigena = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $alfabetizacionIndigenaAtenciones = mysqli_fetch_array($totalesAlfabetizacionIndigena);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '171'";
    $totalesAsesoriasIndigena = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $asesoriasIndigenaAtenciones = mysqli_fetch_array($totalesAsesoriasIndigena);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '172'";
    $totalesSeguimientoIndigena = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $seguimientoIndigenaAtenciones = mysqli_fetch_array($totalesSeguimientoIndigena);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '173'";
    $totalesMigrantes = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $migrantesAtenciones = mysqli_fetch_array($totalesMigrantes);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '174'";
    $totalesAlfabetizacionMigrantes = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $alfabetizacionmigrantesAtenciones = mysqli_fetch_array($totalesAlfabetizacionMigrantes);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '175'";
    $totalesAsesoriasMigrantes = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $asesoriasmigrantesAtenciones = mysqli_fetch_array($totalesAsesoriasMigrantes);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '176'";
    $totalesSeguimientoMigrantes = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $seguimientomigrantesAtenciones = mysqli_fetch_array($totalesSeguimientoMigrantes);

/**
* Usuarios con beca en Ciberescuelas Por modulo
*/


/**
* Totales por actividad Deporte
*/
    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '17'";
    $totalesFutbol = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $futbolAtenciones = mysqli_fetch_array($totalesFutbol);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '18'";
    $totalesBasquet = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $basquetAtenciones = mysqli_fetch_array($totalesBasquet);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '19'";
    $totaleVoley = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $voleyAtenciones = mysqli_fetch_array($totaleVoley);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '20'";
    $totalesAcondicionamiento = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $acondicionamientoAtenciones = mysqli_fetch_array($totalesAcondicionamiento);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '94'";
    $totalesZumba = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $zumbaAtenciones = mysqli_fetch_array($totalesZumba);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '95'";
    $totalesTae = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $taeAtenciones = mysqli_fetch_array($totalesTae);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '96'";
    $totalesYoga = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $yogaAtenciones = mysqli_fetch_array($totalesYoga);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '97'";
    $totalesTai = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $taiChiAtenciones = mysqli_fetch_array($totalesTai);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '129'";
    $totalesRitmosLatinos = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $ritmosLatinosAtenciones = mysqli_fetch_array($totalesRitmosLatinos);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '98'";
    $totalesBoxeo = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $boxeoAtenciones = mysqli_fetch_array($totalesBoxeo);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '99'";
    $totalesAtletismo = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $atletismoAtenciones = mysqli_fetch_array($totalesAtletismo);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '100'";
    $totalesKarate = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $karateAtenciones = mysqli_fetch_array($totalesKarate);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '101'";
    $totalesKung = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $kungAtenciones = mysqli_fetch_array($totalesKung);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '130'";
    $totalesTaekwondo = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $taekwondoAtenciones = mysqli_fetch_array($totalesTaekwondo);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '203'";
    $totalesCapoeira = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $capoeiraAtenciones = mysqli_fetch_array($totalesCapoeira);

    /**
 * Totales por actividad Autonomía
*/
    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '153'";
    $totalesSerigrafia = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $serigrafiaAtenciones = mysqli_fetch_array($totalesSerigrafia);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '7'";
    $totalesReciclaje = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $reciclajeAtenciones = mysqli_fetch_array($totalesReciclaje);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '186'";
    $totalesempaqueEmbalaje = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $empaqueEmbalajeAtenciones = mysqli_fetch_array($totalesempaqueEmbalaje);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '65'";
    $totalesSistemaDistribucion = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $sistemaDistribucionAtenciones = mysqli_fetch_array($totalesSistemaDistribucion);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '27'";
    $totalesEdicionDiseño = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $edicionDiseñoAtenciones = mysqli_fetch_array($totalesEdicionDiseño);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '37'";
    $totalesCarpinteria = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $carpinteriaAtenciones = mysqli_fetch_array($totalesCarpinteria);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '38'";
    $totalesPlomeria = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $plomeriaAtenciones = mysqli_fetch_array($totalesPlomeria);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '33'";
    $totalesAutoestima = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $autoestimaAtenciones = mysqli_fetch_array($totalesAutoestima);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '39'";
    $totalesHerreria = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $herreriaAtenciones = mysqli_fetch_array($totalesHerreria);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '40'";
    $totalesElectricidad = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $electricidadAtenciones= mysqli_fetch_array($totalesElectricidad);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '41'";
    $totalesGastronomia = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $gastronomiaAtenciones = mysqli_fetch_array($totalesGastronomia);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '43'";
    $totalesJoyeria= mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $joyeriaAtenciones = mysqli_fetch_array($totalesJoyeria);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '44'";
    $totalesAgricultura = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $agriculturaAtenciones = mysqli_fetch_array($totalesAgricultura);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '47'";
    $totalesDiseñoImagen = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $diseñoImagenAtenciones = mysqli_fetch_array($totalesDiseñoImagen);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '48'";
    $totalesCodMujeres = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $codMujeresAtenciones = mysqli_fetch_array($totalesCodMujeres);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '49'";
    $totalesElectronica = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $electronicaAtenciones = mysqli_fetch_array($totalesElectronica);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '52'";
    $totalesTExtiles = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $textileDiseñoAtenciones = mysqli_fetch_array($totalesTExtiles);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '54'";
    $totalesFotoProducto = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $fotoProductoAtenciones = mysqli_fetch_array($totalesFotoProducto);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '55'";
    $totalesLogos = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $logosAtenciones = mysqli_fetch_array($totalesLogos);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '56'";
    $totalesCalidad = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $calidadAtenciones = mysqli_fetch_array($totalesCalidad);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '57'";
    $totalesCooperativas = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $cooperativasAtenciones = mysqli_fetch_array($totalesCooperativas);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '58'";
    $totalesEmprende= mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $emprendeAtenciones= mysqli_fetch_array($totalesEmprende);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '59'";
    $totalesMicroN= mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $microNAtenciones= mysqli_fetch_array($totalesMicroN);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '60'";
    $totalesComercioDigital = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $comercioDigitalAtenciones = mysqli_fetch_array($totalesComercioDigital);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '61'";
    $totalesEstrategias = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $estrategiasAtenciones = mysqli_fetch_array($totalesEstrategias);

    $sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '62'";
    $totalesComercioJusto = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $comercioJustoAtenciones = mysqli_fetch_array($totalesComercioJusto);

/**
 * Usuarios totales por PILARES   SELECT count(DISTINCT U1.idUsuarios) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2, Becas_produccion B1 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.idUsuarios = B1.idUsuario AND U2.Pilares_idPilares = '1'
 */
    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '1'";
    $totalesPilares1 = mysqli_query($con, $sql);
    //var_dump($totalesPilares1);
    $pilaresTotales1= mysqli_fetch_array($totalesPilares1);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '2'";
    $totalesPilares2 = mysqli_query($con, $sql);
    //var_dump($totalesPilares2);
    $pilaresTotales2= mysqli_fetch_array($totalesPilares2);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '3'";
    $totalesPilares3 = mysqli_query($con, $sql);
    //var_dump($totalesPilares3);
    $pilaresTotales3= mysqli_fetch_array($totalesPilares3);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '4'";
    $totalesPilares4 = mysqli_query($con, $sql);
    //var_dump($totalesPilares4);
    $pilaresTotales4= mysqli_fetch_array($totalesPilares4);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '5'";
    $totalesPilares5 = mysqli_query($con, $sql);
    //var_dump($totalesPilares5);
    $pilaresTotales5= mysqli_fetch_array($totalesPilares5);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '6'";
    $totalesPilares6 = mysqli_query($con, $sql);
    //var_dump($totalesPilares6);
    $pilaresTotales6= mysqli_fetch_array($totalesPilares6);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '7'";
    $totalesPilares7 = mysqli_query($con, $sql);
    //var_dump($totalesPilares7);
    $pilaresTotales7= mysqli_fetch_array($totalesPilares7);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '8'";
    $totalesPilares8 = mysqli_query($con, $sql);
    //var_dump($totalesPilares8);
    $pilaresTotales8= mysqli_fetch_array($totalesPilares8);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '9'";
    $totalesPilares9 = mysqli_query($con, $sql);
    //var_dump($totalesPilares9);
    $pilaresTotales9= mysqli_fetch_array($totalesPilares9);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '10'";
    $totalesPilares10 = mysqli_query($con, $sql);
    //var_dump($totalesPilares10);
    $pilaresTotales10= mysqli_fetch_array($totalesPilares10);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '11'";
    $totalesPilares11 = mysqli_query($con, $sql);
    //var_dump($totalesPilares11);
    $pilaresTotales11= mysqli_fetch_array($totalesPilares11);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '12'";
    $totalesPilares12 = mysqli_query($con, $sql);
    //var_dump($totalesPilares12);
    $pilaresTotales12= mysqli_fetch_array($totalesPilares12);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '13'";
    $totalesPilares13 = mysqli_query($con, $sql);
    //var_dump($totalesPilares13);
    $pilaresTotales13= mysqli_fetch_array($totalesPilares13);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '14'";
    $totalesPilares14 = mysqli_query($con, $sql);
    //var_dump($totalesPilares14);
    $pilaresTotales14= mysqli_fetch_array($totalesPilares14);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '15'";
    $totalesPilares15 = mysqli_query($con, $sql);
    //var_dump($totalesPilares15);
    $pilaresTotales15= mysqli_fetch_array($totalesPilares15);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '16'";
    $totalesPilares16 = mysqli_query($con, $sql);
    //var_dump($totalesPilares16);
    $pilaresTotales16= mysqli_fetch_array($totalesPilares16);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '17'";
    $totalesPilares17 = mysqli_query($con, $sql);
    //var_dump($totalesPilares17);
    $pilaresTotales17= mysqli_fetch_array($totalesPilares17);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '18'";
    $totalesPilares18 = mysqli_query($con, $sql);
    //var_dump($totalesPilares18);
    $pilaresTotales18= mysqli_fetch_array($totalesPilares18);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '19'";
    $totalesPilares19 = mysqli_query($con, $sql);
    //var_dump($totalesPilares19);
    $pilaresTotales19= mysqli_fetch_array($totalesPilares19);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '20'";
    $totalesPilares20 = mysqli_query($con, $sql);
    //var_dump($totalesPilares20);
    $pilaresTotales20= mysqli_fetch_array($totalesPilares20);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '21'";
    $totalesPilares47 = mysqli_query($con, $sql);
    //var_dump($totalesPilares21);
    $pilaresTotales47= mysqli_fetch_array($totalesPilares47);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '22'";
    $totalesPilares21 = mysqli_query($con, $sql);
    //var_dump($totalesPilares21);
    $pilaresTotales21= mysqli_fetch_array($totalesPilares21);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '23'";
    $totalesPilares22 = mysqli_query($con, $sql);
    //var_dump($totalesPilares22);
    $pilaresTotales22= mysqli_fetch_array($totalesPilares22);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '24'";
    $totalesPilares23 = mysqli_query($con, $sql);
    //var_dump($totalesPilares23);
    $pilaresTotales23= mysqli_fetch_array($totalesPilares23);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '26'";
    $totalesPilares24 = mysqli_query($con, $sql);
    //var_dump($totalesPilares24);
    $pilaresTotales24= mysqli_fetch_array($totalesPilares24);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '27'";
    $totalesPilares25 = mysqli_query($con, $sql);
    //var_dump($totalesPilares25);
    $pilaresTotales25= mysqli_fetch_array($totalesPilares25);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '31'";
    $totalesPilares26 = mysqli_query($con, $sql);
    //var_dump($totalesPilares26);
    $pilaresTotales26= mysqli_fetch_array($totalesPilares26);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '32'";
    $totalesPilares27 = mysqli_query($con, $sql);
    //var_dump($totalesPilares27);
    $pilaresTotales27= mysqli_fetch_array($totalesPilares27);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '33'";
    $totalesPilares28 = mysqli_query($con, $sql);
    //var_dump($totalesPilares28);
    $pilaresTotales28= mysqli_fetch_array($totalesPilares28);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '34'";
    $totalesPilares29 = mysqli_query($con, $sql);
    //var_dump($totalesPilares29);
    $pilaresTotales29= mysqli_fetch_array($totalesPilares29);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '35'";
    $totalesPilares30 = mysqli_query($con, $sql);
    //var_dump($totalesPilares30);
    $pilaresTotales30= mysqli_fetch_array($totalesPilares30);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '36'";
    $totalesPilares31 = mysqli_query($con, $sql);
    //var_dump($totalesPilares31);
    $pilaresTotales31= mysqli_fetch_array($totalesPilares31);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '37'";
    $totalesPilares32 = mysqli_query($con, $sql);
    //var_dump($totalesPilares32);
    $pilaresTotales32= mysqli_fetch_array($totalesPilares32);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '38'";
    $totalesPilares33 = mysqli_query($con, $sql);
    //var_dump($totalesPilares33);
    $pilaresTotales33= mysqli_fetch_array($totalesPilares33);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '39'";
    $totalesPilares34 = mysqli_query($con, $sql);
    //var_dump($totalesPilares34);
    $pilaresTotales34= mysqli_fetch_array($totalesPilares34);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '40'";
    $totalesPilares35 = mysqli_query($con, $sql);
    //var_dump($totalesPilares35);
    $pilaresTotales35= mysqli_fetch_array($totalesPilares35);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '41'";
    $totalesPilares36 = mysqli_query($con, $sql);
    //var_dump($totalesPilares36);
    $pilaresTotales36= mysqli_fetch_array($totalesPilares36);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '42'";
    $totalesPilares37 = mysqli_query($con, $sql);
    //var_dump($totalesPilares37);
    $pilaresTotales37= mysqli_fetch_array($totalesPilares37);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '43'";
    $totalesPilares38 = mysqli_query($con, $sql);
    //var_dump($totalesPilares38);
    $pilaresTotales38= mysqli_fetch_array($totalesPilares38);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '44'";
    $totalesPilares39 = mysqli_query($con, $sql);
    //var_dump($totalesPilares39);
    $pilaresTotales39= mysqli_fetch_array($totalesPilares39);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '45'";
    $totalesPilares40 = mysqli_query($con, $sql);
    //var_dump($totalesPilares40);
    $pilaresTotales40= mysqli_fetch_array($totalesPilares40);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '46'";
    $totalesPilares41 = mysqli_query($con, $sql);
    //var_dump($totalesPilares41);
    $pilaresTotales41= mysqli_fetch_array($totalesPilares41);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '47'";
    $totalesPilares42 = mysqli_query($con, $sql);
    //var_dump($totalesPilares42);
    $pilaresTotales42= mysqli_fetch_array($totalesPilares42);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '48'";
    $totalesPilares43 = mysqli_query($con, $sql);
    //var_dump($totalesPilares43);
    $pilaresTotales43= mysqli_fetch_array($totalesPilares43);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '49'";
    $totalesPilares44 = mysqli_query($con, $sql);
    //var_dump($totalesPilares44);
    $pilaresTotales44= mysqli_fetch_array($totalesPilares44);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '50'";
    $totalesPilares45 = mysqli_query($con, $sql);
    //var_dump($totalesPilares45);
    $pilaresTotales45= mysqli_fetch_array($totalesPilares45);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '51'";
    $totalesPilares46 = mysqli_query($con, $sql);
    //var_dump($totalesPilares46);
    $pilaresTotales46= mysqli_fetch_array($totalesPilares46);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '52'";
    $totalesPilares48 = mysqli_query($con, $sql);
    //var_dump($totalesPilares48);
    $pilaresTotales48= mysqli_fetch_array($totalesPilares48);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '53'";
    $totalesPilares49 = mysqli_query($con, $sql);
    //var_dump($totalesPilares49);
    $pilaresTotales49= mysqli_fetch_array($totalesPilares49);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '54'";
    $totalesPilares50 = mysqli_query($con, $sql);
    //var_dump($totalesPilares50);
    $pilaresTotales50= mysqli_fetch_array($totalesPilares50);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '55'";
    $totalesPilares51 = mysqli_query($con, $sql);
    //var_dump($totalesPilares51);
    $pilaresTotales51= mysqli_fetch_array($totalesPilares51);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '56'";
    $totalesPilares52 = mysqli_query($con, $sql);
    //var_dump($totalesPilares52);
    $pilaresTotales52= mysqli_fetch_array($totalesPilares52);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '57'";
    $totalesPilares53 = mysqli_query($con, $sql);
    //var_dump($totalesPilares53);
    $pilaresTotales53= mysqli_fetch_array($totalesPilares53);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '58'";
    $totalesPilares54 = mysqli_query($con, $sql);
    //var_dump($totalesPilares54);
    $pilaresTotales54= mysqli_fetch_array($totalesPilares54);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '59'";
    $totalesPilares55 = mysqli_query($con, $sql);
    //var_dump($totalesPilares55);
    $pilaresTotales55= mysqli_fetch_array($totalesPilares55);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '60'";
    $totalesPilares56 = mysqli_query($con, $sql);
    //var_dump($totalesPilares56);
    $pilaresTotales56= mysqli_fetch_array($totalesPilares56);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '61'";
    $totalesPilares57 = mysqli_query($con, $sql);
    //var_dump($totalesPilares57);
    $pilaresTotales57= mysqli_fetch_array($totalesPilares57);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '62'";
    $totalesPilares58 = mysqli_query($con, $sql);
    //var_dump($totalesPilares58);
    $pilaresTotales58= mysqli_fetch_array($totalesPilares58);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '63'";
    $totalesPilares59 = mysqli_query($con, $sql);
    //var_dump($totalesPilares59);
    $pilaresTotales59= mysqli_fetch_array($totalesPilares59);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '64'";
    $totalesPilares60 = mysqli_query($con, $sql);
    //var_dump($totalesPilares60);
    $pilaresTotales60= mysqli_fetch_array($totalesPilares60);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '65'";
    $totalesPilares61 = mysqli_query($con, $sql);
    //var_dump($totalesPilares61);
    $pilaresTotales61= mysqli_fetch_array($totalesPilares61);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '66'";
    $totalesPilares62 = mysqli_query($con, $sql);
    //var_dump($totalesPilares62);
    $pilaresTotales62= mysqli_fetch_array($totalesPilares62);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '67'";
    $totalesPilares63 = mysqli_query($con, $sql);
    //var_dump($totalesPilares63);
    $pilaresTotales63= mysqli_fetch_array($totalesPilares63);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '68'";
    $totalesPilares64 = mysqli_query($con, $sql);
    //var_dump($totalesPilares64);
    $pilaresTotales64= mysqli_fetch_array($totalesPilares64);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '70'";
    $totalesPilares65 = mysqli_query($con, $sql);
    //var_dump($totalesPilares65);
    $pilaresTotales65= mysqli_fetch_array($totalesPilares65);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '71'";
    $totalesPilares66 = mysqli_query($con, $sql);
    //var_dump($totalesPilares66);
    $pilaresTotales66= mysqli_fetch_array($totalesPilares66);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '72'";
    $totalesPilares67 = mysqli_query($con, $sql);
    //var_dump($totalesPilares67);
    $pilaresTotales67= mysqli_fetch_array($totalesPilares67);

/**
 * Usuarios por PILARES  de procedencia   SELECT count(DISTINCT U1.idUsuarios) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2, Becas_produccion B1 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.idUsuarios = B1.idUsuario AND U2.Pilares_idPilares = '1'
 */
    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2, Becas_produccion B1 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.idUsuarios = B1.idUsuario AND U2.Pilares_idPilares = '1'";
    $totalesPilares1 = mysqli_query($con, $sql);
    //var_dump($totalesPilares1);
    $pilaresProcedenciaTotales1= mysqli_fetch_array($totalesPilares1);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2, Becas_produccion B1 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.idUsuarios = B1.idUsuario AND U2.Pilares_idPilares = '2'";
    $totalesPilares2 = mysqli_query($con, $sql);
    //var_dump($totalesPilares2);
    $pilaresProcedenciaTotales2= mysqli_fetch_array($totalesPilares2);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2, Becas_produccion B1 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.idUsuarios = B1.idUsuario AND U2.Pilares_idPilares = '3'";
    $totalesPilares3 = mysqli_query($con, $sql);
    //var_dump($totalesPilares3);
    $pilaresProcedenciaTotales3= mysqli_fetch_array($totalesPilares3);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2, Becas_produccion B1 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.idUsuarios = B1.idUsuario AND U2.Pilares_idPilares = '4'";
    $totalesPilares4 = mysqli_query($con, $sql);
    //var_dump($totalesPilares4);
    $pilaresProcedenciaTotales4= mysqli_fetch_array($totalesPilares4);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2, Becas_produccion B1 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.idUsuarios = B1.idUsuario AND U2.Pilares_idPilares = '5'";
    $totalesPilares5 = mysqli_query($con, $sql);
    //var_dump($totalesPilares5);
    $pilaresProcedenciaTotales5= mysqli_fetch_array($totalesPilares5);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2, Becas_produccion B1 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.idUsuarios = B1.idUsuario AND U2.Pilares_idPilares = '6'";
    $totalesPilares6 = mysqli_query($con, $sql);
    //var_dump($totalesPilares6);
    $pilaresProcedenciaTotales6= mysqli_fetch_array($totalesPilares6);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2, Becas_produccion B1 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.idUsuarios = B1.idUsuario AND U2.Pilares_idPilares = '7'";
    $totalesPilares7 = mysqli_query($con, $sql);
    //var_dump($totalesPilares7);
    $pilaresProcedenciaTotales7= mysqli_fetch_array($totalesPilares7);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2, Becas_produccion B1 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.idUsuarios = B1.idUsuario AND U2.Pilares_idPilares = '8'";
    $totalesPilares8 = mysqli_query($con, $sql);
    //var_dump($totalesPilares8);
    $pilaresProcedenciaTotales8= mysqli_fetch_array($totalesPilares8);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2, Becas_produccion B1 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.idUsuarios = B1.idUsuario AND U2.Pilares_idPilares = '9'";
    $totalesPilares9 = mysqli_query($con, $sql);
    //var_dump($totalesPilares9);
    $pilaresProcedenciaTotales9= mysqli_fetch_array($totalesPilares9);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2, Becas_produccion B1 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.idUsuarios = B1.idUsuario AND U2.Pilares_idPilares = '10'";
    $totalesPilares10 = mysqli_query($con, $sql);
    //var_dump($totalesPilares10);
    $pilaresProcedenciaTotales10= mysqli_fetch_array($totalesPilares10);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2, Becas_produccion B1 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.idUsuarios = B1.idUsuario AND U2.Pilares_idPilares = '11'";
    $totalesPilares11 = mysqli_query($con, $sql);
    //var_dump($totalesPilares11);
    $pilaresProcedenciaTotales11= mysqli_fetch_array($totalesPilares11);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2, Becas_produccion B1 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.idUsuarios = B1.idUsuario AND U2.Pilares_idPilares = '12'";
    $totalesPilares12 = mysqli_query($con, $sql);
    //var_dump($totalesPilares12);
    $pilaresProcedenciaTotales12= mysqli_fetch_array($totalesPilares12);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2, Becas_produccion B1 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.idUsuarios = B1.idUsuario AND U2.Pilares_idPilares = '13'";
    $totalesPilares13 = mysqli_query($con, $sql);
    //var_dump($totalesPilares13);
    $pilaresProcedenciaTotales13= mysqli_fetch_array($totalesPilares13);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2, Becas_produccion B1 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.idUsuarios = B1.idUsuario AND U2.Pilares_idPilares = '14'";
    $totalesPilares14 = mysqli_query($con, $sql);
    //var_dump($totalesPilares14);
    $pilaresProcedenciaTotales14= mysqli_fetch_array($totalesPilares14);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2, Becas_produccion B1 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.idUsuarios = B1.idUsuario AND U2.Pilares_idPilares = '15'";
    $totalesPilares15 = mysqli_query($con, $sql);
    //var_dump($totalesPilares15);
    $pilaresProcedenciaTotales15= mysqli_fetch_array($totalesPilares15);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2, Becas_produccion B1 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.idUsuarios = B1.idUsuario AND U2.Pilares_idPilares = '16'";
    $totalesPilares16 = mysqli_query($con, $sql);
    //var_dump($totalesPilares16);
    $pilaresProcedenciaTotales16= mysqli_fetch_array($totalesPilares16);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2, Becas_produccion B1 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.idUsuarios = B1.idUsuario AND U2.Pilares_idPilares = '17'";
    $totalesPilares17 = mysqli_query($con, $sql);
    //var_dump($totalesPilares17);
    $pilaresProcedenciaTotales17= mysqli_fetch_array($totalesPilares17);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2, Becas_produccion B1 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.idUsuarios = B1.idUsuario AND U2.Pilares_idPilares = '18'";
    $totalesPilares18 = mysqli_query($con, $sql);
    //var_dump($totalesPilares18);
    $pilaresProcedenciaTotales18= mysqli_fetch_array($totalesPilares18);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2, Becas_produccion B1 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.idUsuarios = B1.idUsuario AND U2.Pilares_idPilares = '19'";
    $totalesPilares19 = mysqli_query($con, $sql);
    //var_dump($totalesPilares19);
    $pilaresProcedenciaTotales19= mysqli_fetch_array($totalesPilares19);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2, Becas_produccion B1 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.idUsuarios = B1.idUsuario AND U2.Pilares_idPilares = '20'";
    $totalesPilares20 = mysqli_query($con, $sql);
    //var_dump($totalesPilares20);
    $pilaresProcedenciaTotales20= mysqli_fetch_array($totalesPilares20);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2, Becas_produccion B1 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.idUsuarios = B1.idUsuario AND U2.Pilares_idPilares = '21'";
    $totalesPilares47 = mysqli_query($con, $sql);
    //var_dump($totalesPilares21);
    $pilaresProcedenciaTotales47= mysqli_fetch_array($totalesPilares47);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2, Becas_produccion B1 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.idUsuarios = B1.idUsuario AND U2.Pilares_idPilares = '22'";
    $totalesPilares21 = mysqli_query($con, $sql);
    //var_dump($totalesPilares21);
    $pilaresProcedenciaTotales21= mysqli_fetch_array($totalesPilares21);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2, Becas_produccion B1 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.idUsuarios = B1.idUsuario AND U2.Pilares_idPilares = '23'";
    $totalesPilares22 = mysqli_query($con, $sql);
    //var_dump($totalesPilares22);
    $pilaresProcedenciaTotales22= mysqli_fetch_array($totalesPilares22);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2, Becas_produccion B1 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.idUsuarios = B1.idUsuario AND U2.Pilares_idPilares = '24'";
    $totalesPilares23 = mysqli_query($con, $sql);
    //var_dump($totalesPilares23);
    $pilaresProcedenciaTotales23= mysqli_fetch_array($totalesPilares23);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2, Becas_produccion B1 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.idUsuarios = B1.idUsuario AND U2.Pilares_idPilares = '26'";
    $totalesPilares24 = mysqli_query($con, $sql);
    //var_dump($totalesPilares24);
    $pilaresProcedenciaTotales24= mysqli_fetch_array($totalesPilares24);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2, Becas_produccion B1 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.idUsuarios = B1.idUsuario AND U2.Pilares_idPilares = '27'";
    $totalesPilares25 = mysqli_query($con, $sql);
    //var_dump($totalesPilares25);
    $pilaresProcedenciaTotales25= mysqli_fetch_array($totalesPilares25);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2, Becas_produccion B1 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.idUsuarios = B1.idUsuario AND U2.Pilares_idPilares = '31'";
    $totalesPilares26 = mysqli_query($con, $sql);
    //var_dump($totalesPilares26);
    $pilaresProcedenciaTotales26= mysqli_fetch_array($totalesPilares26);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2, Becas_produccion B1 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.idUsuarios = B1.idUsuario AND U2.Pilares_idPilares = '32'";
    $totalesPilares27 = mysqli_query($con, $sql);
    //var_dump($totalesPilares27);
    $pilaresProcedenciaTotales27= mysqli_fetch_array($totalesPilares27);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2, Becas_produccion B1 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.idUsuarios = B1.idUsuario AND U2.Pilares_idPilares = '33'";
    $totalesPilares28 = mysqli_query($con, $sql);
    //var_dump($totalesPilares28);
    $pilaresProcedenciaTotales28= mysqli_fetch_array($totalesPilares28);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2, Becas_produccion B1 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.idUsuarios = B1.idUsuario AND U2.Pilares_idPilares = '34'";
    $totalesPilares29 = mysqli_query($con, $sql);
    //var_dump($totalesPilares29);
    $pilaresProcedenciaTotales29= mysqli_fetch_array($totalesPilares29);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2, Becas_produccion B1 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.idUsuarios = B1.idUsuario AND U2.Pilares_idPilares = '35'";
    $totalesPilares30 = mysqli_query($con, $sql);
    //var_dump($totalesPilares30);
    $pilaresProcedenciaTotales30= mysqli_fetch_array($totalesPilares30);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2, Becas_produccion B1 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.idUsuarios = B1.idUsuario AND U2.Pilares_idPilares = '36'";
    $totalesPilares31 = mysqli_query($con, $sql);
    //var_dump($totalesPilares31);
    $pilaresProcedenciaTotales31= mysqli_fetch_array($totalesPilares31);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2, Becas_produccion B1 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.idUsuarios = B1.idUsuario AND U2.Pilares_idPilares = '37'";
    $totalesPilares32 = mysqli_query($con, $sql);
    //var_dump($totalesPilares32);
    $pilaresProcedenciaTotales32= mysqli_fetch_array($totalesPilares32);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2, Becas_produccion B1 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.idUsuarios = B1.idUsuario AND U2.Pilares_idPilares = '38'";
    $totalesPilares33 = mysqli_query($con, $sql);
    //var_dump($totalesPilares33);
    $pilaresProcedenciaTotales33= mysqli_fetch_array($totalesPilares33);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2, Becas_produccion B1 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.idUsuarios = B1.idUsuario AND U2.Pilares_idPilares = '39'";
    $totalesPilares34 = mysqli_query($con, $sql);
    //var_dump($totalesPilares34);
    $pilaresProcedenciaTotales34= mysqli_fetch_array($totalesPilares34);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2, Becas_produccion B1 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.idUsuarios = B1.idUsuario AND U2.Pilares_idPilares = '40'";
    $totalesPilares35 = mysqli_query($con, $sql);
    //var_dump($totalesPilares35);
    $pilaresProcedenciaTotales35= mysqli_fetch_array($totalesPilares35);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2, Becas_produccion B1 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.idUsuarios = B1.idUsuario AND U2.Pilares_idPilares = '41'";
    $totalesPilares36 = mysqli_query($con, $sql);
    //var_dump($totalesPilares36);
    $pilaresProcedenciaTotales36= mysqli_fetch_array($totalesPilares36);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2, Becas_produccion B1 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.idUsuarios = B1.idUsuario AND U2.Pilares_idPilares = '42'";
    $totalesPilares37 = mysqli_query($con, $sql);
    //var_dump($totalesPilares37);
    $pilaresProcedenciaTotales37= mysqli_fetch_array($totalesPilares37);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2, Becas_produccion B1 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.idUsuarios = B1.idUsuario AND U2.Pilares_idPilares = '43'";
    $totalesPilares38 = mysqli_query($con, $sql);
    //var_dump($totalesPilares38);
    $pilaresProcedenciaTotales38= mysqli_fetch_array($totalesPilares38);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2, Becas_produccion B1 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.idUsuarios = B1.idUsuario AND U2.Pilares_idPilares = '44'";
    $totalesPilares39 = mysqli_query($con, $sql);
    //var_dump($totalesPilares39);
    $pilaresProcedenciaTotales39= mysqli_fetch_array($totalesPilares39);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2, Becas_produccion B1 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.idUsuarios = B1.idUsuario AND U2.Pilares_idPilares = '45'";
    $totalesPilares40 = mysqli_query($con, $sql);
    //var_dump($totalesPilares40);
    $pilaresProcedenciaTotales40= mysqli_fetch_array($totalesPilares40);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2, Becas_produccion B1 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.idUsuarios = B1.idUsuario AND U2.Pilares_idPilares = '46'";
    $totalesPilares41 = mysqli_query($con, $sql);
    //var_dump($totalesPilares41);
    $pilaresProcedenciaTotales41= mysqli_fetch_array($totalesPilares41);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2, Becas_produccion B1 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.idUsuarios = B1.idUsuario AND U2.Pilares_idPilares = '47'";
    $totalesPilares42 = mysqli_query($con, $sql);
    //var_dump($totalesPilares42);
    $pilaresProcedenciaTotales42= mysqli_fetch_array($totalesPilares42);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2, Becas_produccion B1 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.idUsuarios = B1.idUsuario AND U2.Pilares_idPilares = '48'";
    $totalesPilares43 = mysqli_query($con, $sql);
    //var_dump($totalesPilares43);
    $pilaresProcedenciaTotales43= mysqli_fetch_array($totalesPilares43);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2, Becas_produccion B1 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.idUsuarios = B1.idUsuario AND U2.Pilares_idPilares = '49'";
    $totalesPilares44 = mysqli_query($con, $sql);
    //var_dump($totalesPilares44);
    $pilaresProcedenciaTotales44= mysqli_fetch_array($totalesPilares44);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2, Becas_produccion B1 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.idUsuarios = B1.idUsuario AND U2.Pilares_idPilares = '50'";
    $totalesPilares45 = mysqli_query($con, $sql);
    //var_dump($totalesPilares45);
    $pilaresProcedenciaTotales45= mysqli_fetch_array($totalesPilares45);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2, Becas_produccion B1 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.idUsuarios = B1.idUsuario AND U2.Pilares_idPilares = '51'";
    $totalesPilares46 = mysqli_query($con, $sql);
    //var_dump($totalesPilares46);
    $pilaresProcedenciaTotales46= mysqli_fetch_array($totalesPilares46);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2, Becas_produccion B1 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.idUsuarios = B1.idUsuario AND U2.Pilares_idPilares = '52'";
    $totalesPilares48 = mysqli_query($con, $sql);
    //var_dump($totalesPilares48);
    $pilaresProcedenciaTotales48= mysqli_fetch_array($totalesPilares48);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2, Becas_produccion B1 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.idUsuarios = B1.idUsuario AND U2.Pilares_idPilares = '53'";
    $totalesPilares49 = mysqli_query($con, $sql);
    //var_dump($totalesPilares49);
    $pilaresProcedenciaTotales49= mysqli_fetch_array($totalesPilares49);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2, Becas_produccion B1 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.idUsuarios = B1.idUsuario AND U2.Pilares_idPilares = '54'";
    $totalesPilares50 = mysqli_query($con, $sql);
    //var_dump($totalesPilares50);
    $pilaresProcedenciaTotales50= mysqli_fetch_array($totalesPilares50);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2, Becas_produccion B1 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.idUsuarios = B1.idUsuario AND U2.Pilares_idPilares = '55'";
    $totalesPilares51 = mysqli_query($con, $sql);
    //var_dump($totalesPilares51);
    $pilaresProcedenciaTotales51= mysqli_fetch_array($totalesPilares51);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2, Becas_produccion B1 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.idUsuarios = B1.idUsuario AND U2.Pilares_idPilares = '56'";
    $totalesPilares52 = mysqli_query($con, $sql);
    //var_dump($totalesPilares52);
    $pilaresProcedenciaTotales52= mysqli_fetch_array($totalesPilares52);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2, Becas_produccion B1 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.idUsuarios = B1.idUsuario AND U2.Pilares_idPilares = '57'";
    $totalesPilares53 = mysqli_query($con, $sql);
    //var_dump($totalesPilares53);
    $pilaresProcedenciaTotales53= mysqli_fetch_array($totalesPilares53);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2, Becas_produccion B1 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.idUsuarios = B1.idUsuario AND U2.Pilares_idPilares = '58'";
    $totalesPilares54 = mysqli_query($con, $sql);
    //var_dump($totalesPilares54);
    $pilaresProcedenciaTotales54= mysqli_fetch_array($totalesPilares54);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2, Becas_produccion B1 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.idUsuarios = B1.idUsuario AND U2.Pilares_idPilares = '59'";
    $totalesPilares55 = mysqli_query($con, $sql);
    //var_dump($totalesPilares55);
    $pilaresProcedenciaTotales55= mysqli_fetch_array($totalesPilares55);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2, Becas_produccion B1 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.idUsuarios = B1.idUsuario AND U2.Pilares_idPilares = '60'";
    $totalesPilares56 = mysqli_query($con, $sql);
    //var_dump($totalesPilares56);
    $pilaresProcedenciaTotales56= mysqli_fetch_array($totalesPilares56);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2, Becas_produccion B1 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.idUsuarios = B1.idUsuario AND U2.Pilares_idPilares = '61'";
    $totalesPilares57 = mysqli_query($con, $sql);
    //var_dump($totalesPilares57);
    $pilaresProcedenciaTotales57= mysqli_fetch_array($totalesPilares57);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2, Becas_produccion B1 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.idUsuarios = B1.idUsuario AND U2.Pilares_idPilares = '62'";
    $totalesPilares58 = mysqli_query($con, $sql);
    //var_dump($totalesPilares58);
    $pilaresProcedenciaTotales58= mysqli_fetch_array($totalesPilares58);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2, Becas_produccion B1 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.idUsuarios = B1.idUsuario AND U2.Pilares_idPilares = '63'";
    $totalesPilares59 = mysqli_query($con, $sql);
    //var_dump($totalesPilares59);
    $pilaresProcedenciaTotales59= mysqli_fetch_array($totalesPilares59);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2, Becas_produccion B1 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.idUsuarios = B1.idUsuario AND U2.Pilares_idPilares = '64'";
    $totalesPilares60 = mysqli_query($con, $sql);
    //var_dump($totalesPilares60);
    $pilaresProcedenciaTotales60= mysqli_fetch_array($totalesPilares60);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2, Becas_produccion B1 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.idUsuarios = B1.idUsuario AND U2.Pilares_idPilares = '65'";
    $totalesPilares61 = mysqli_query($con, $sql);
    //var_dump($totalesPilares61);
    $pilaresProcedenciaTotales61= mysqli_fetch_array($totalesPilares61);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2, Becas_produccion B1 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.idUsuarios = B1.idUsuario AND U2.Pilares_idPilares = '66'";
    $totalesPilares62 = mysqli_query($con, $sql);
    //var_dump($totalesPilares62);
    $pilaresProcedenciaTotales62= mysqli_fetch_array($totalesPilares62);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2, Becas_produccion B1 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.idUsuarios = B1.idUsuario AND U2.Pilares_idPilares = '67'";
    $totalesPilares63 = mysqli_query($con, $sql);
    //var_dump($totalesPilares63);
    $pilaresProcedenciaTotales63= mysqli_fetch_array($totalesPilares63);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2, Becas_produccion B1 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.idUsuarios = B1.idUsuario AND U2.Pilares_idPilares = '68'";
    $totalesPilares64 = mysqli_query($con, $sql);
    //var_dump($totalesPilares64);
    $pilaresProcedenciaTotales64= mysqli_fetch_array($totalesPilares64);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2, Becas_produccion B1 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.idUsuarios = B1.idUsuario AND U2.Pilares_idPilares = '70'";
    $totalesPilares65 = mysqli_query($con, $sql);
    //var_dump($totalesPilares65);
    $pilaresProcedenciaTotales65= mysqli_fetch_array($totalesPilares65);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2, Becas_produccion B1 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.idUsuarios = B1.idUsuario AND U2.Pilares_idPilares = '71'";
    $totalesPilares66 = mysqli_query($con, $sql);
    //var_dump($totalesPilares66);
    $pilaresProcedenciaTotales66= mysqli_fetch_array($totalesPilares66);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2, Becas_produccion B1 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.idUsuarios = B1.idUsuario AND U2.Pilares_idPilares = '72'";
    $totalesPilares67 = mysqli_query($con, $sql);
    //var_dump($totalesPilares67);
    $pilaresProcedenciaTotales67= mysqli_fetch_array($totalesPilares67);
/**
 *Atenciones de Usuarios con beca por PILARES   SELECT count(DISTINCT U1.idUsuarios) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2, Becas_produccion B1 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.idUsuarios = B1.idUsuario AND U2.PiUares_idPilares = '1'
 */
    $sql="SELECT count(*) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '1'";
    $totalesPilaresAtenciones1 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAtenciones1);
    $pilaresTotalesAtenciones1= mysqli_fetch_array($totalesPilaresAtenciones1);

    $sql="SELECT count(*) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '2'";
    $totalesPilaresAtenciones2 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAtenciones2);
    $pilaresTotalesAtenciones2= mysqli_fetch_array($totalesPilaresAtenciones2);

    $sql="SELECT count(*) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '3'";
    $totalesPilaresAtenciones3 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAtenciones3);
    $pilaresTotalesAtenciones3= mysqli_fetch_array($totalesPilaresAtenciones3);

    $sql="SELECT count(*) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '4'";
    $totalesPilaresAtenciones4 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAtenciones4);
    $pilaresTotalesAtenciones4= mysqli_fetch_array($totalesPilaresAtenciones4);

    $sql="SELECT count(*) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '5'";
    $totalesPilaresAtenciones5 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAtenciones5);
    $pilaresTotalesAtenciones5= mysqli_fetch_array($totalesPilaresAtenciones5);

    $sql="SELECT count(*) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '6'";
    $totalesPilaresAtenciones6 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAtenciones6);
    $pilaresTotalesAtenciones6= mysqli_fetch_array($totalesPilaresAtenciones6);

    $sql="SELECT count(*) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '7'";
    $totalesPilaresAtenciones7 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAtenciones7);
    $pilaresTotalesAtenciones7= mysqli_fetch_array($totalesPilaresAtenciones7);

    $sql="SELECT count(*) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '8'";
    $totalesPilaresAtenciones8 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAtenciones8);
    $pilaresTotalesAtenciones8= mysqli_fetch_array($totalesPilaresAtenciones8);

    $sql="SELECT count(*) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '9'";
    $totalesPilaresAtenciones9 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAtenciones9);
    $pilaresTotalesAtenciones9= mysqli_fetch_array($totalesPilaresAtenciones9);

    $sql="SELECT count(*) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '10'";
    $totalesPilaresAtenciones10 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAtenciones10);
    $pilaresTotalesAtenciones10= mysqli_fetch_array($totalesPilaresAtenciones10);

    $sql="SELECT count(*) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '11'";
    $totalesPilaresAtenciones11 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAtenciones11);
    $pilaresTotalesAtenciones11= mysqli_fetch_array($totalesPilaresAtenciones11);

    $sql="SELECT count(*) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '12'";
    $totalesPilaresAtenciones12 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAtenciones12);
    $pilaresTotalesAtenciones12= mysqli_fetch_array($totalesPilaresAtenciones12);

    $sql="SELECT count(*) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '13'";
    $totalesPilaresAtenciones13 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAtenciones13);
    $pilaresTotalesAtenciones13= mysqli_fetch_array($totalesPilaresAtenciones13);

    $sql="SELECT count(*) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '14'";
    $totalesPilaresAtenciones14 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAtenciones14);
    $pilaresTotalesAtenciones14= mysqli_fetch_array($totalesPilaresAtenciones14);

    $sql="SELECT count(*) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '15'";
    $totalesPilaresAtenciones15 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAtenciones15);
    $pilaresTotalesAtenciones15= mysqli_fetch_array($totalesPilaresAtenciones15);

    $sql="SELECT count(*) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '16'";
    $totalesPilaresAtenciones16 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAtenciones16);
    $pilaresTotalesAtenciones16= mysqli_fetch_array($totalesPilaresAtenciones16);

    $sql="SELECT count(*) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '17'";
    $totalesPilaresAtenciones17 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAtenciones17);
    $pilaresTotalesAtenciones17= mysqli_fetch_array($totalesPilaresAtenciones17);

    $sql="SELECT count(*) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '18'";
    $totalesPilaresAtenciones18 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAtenciones18);
    $pilaresTotalesAtenciones18= mysqli_fetch_array($totalesPilaresAtenciones18);

    $sql="SELECT count(*) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '19'";
    $totalesPilaresAtenciones19 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAtenciones19);
    $pilaresTotalesAtenciones19= mysqli_fetch_array($totalesPilaresAtenciones19);

    $sql="SELECT count(*) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '20'";
    $totalesPilaresAtenciones20 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAtenciones20);
    $pilaresTotalesAtenciones20= mysqli_fetch_array($totalesPilaresAtenciones20);

    $sql="SELECT count(*) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '21'";
    $totalesPilaresAtenciones47 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAtenciones21);
    $pilaresTotalesAtenciones47= mysqli_fetch_array($totalesPilaresAtenciones47);

    $sql="SELECT count(*) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '22'";
    $totalesPilaresAtenciones21 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAtenciones21);
    $pilaresTotalesAtenciones21= mysqli_fetch_array($totalesPilaresAtenciones21);

    $sql="SELECT count(*) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '23'";
    $totalesPilaresAtenciones22 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAtenciones22);
    $pilaresTotalesAtenciones22= mysqli_fetch_array($totalesPilaresAtenciones22);

    $sql="SELECT count(*) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '24'";
    $totalesPilaresAtenciones23 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAtenciones23);
    $pilaresTotalesAtenciones23= mysqli_fetch_array($totalesPilaresAtenciones23);

    $sql="SELECT count(*) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '26'";
    $totalesPilaresAtenciones24 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAtenciones24);
    $pilaresTotalesAtenciones24= mysqli_fetch_array($totalesPilaresAtenciones24);

    $sql="SELECT count(*) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '27'";
    $totalesPilaresAtenciones25 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAtenciones25);
    $pilaresTotalesAtenciones25= mysqli_fetch_array($totalesPilaresAtenciones25);

    $sql="SELECT count(*) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '31'";
    $totalesPilaresAtenciones26 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAtenciones26);
    $pilaresTotalesAtenciones26= mysqli_fetch_array($totalesPilaresAtenciones26);

    $sql="SELECT count(*) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '32'";
    $totalesPilaresAtenciones27 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAtenciones27);
    $pilaresTotalesAtenciones27= mysqli_fetch_array($totalesPilaresAtenciones27);

    $sql="SELECT count(*) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '33'";
    $totalesPilaresAtenciones28 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAtenciones28);
    $pilaresTotalesAtenciones28= mysqli_fetch_array($totalesPilaresAtenciones28);

    $sql="SELECT count(*) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '34'";
    $totalesPilaresAtenciones29 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAtenciones29);
    $pilaresTotalesAtenciones29= mysqli_fetch_array($totalesPilaresAtenciones29);

    $sql="SELECT count(*) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '35'";
    $totalesPilaresAtenciones30 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAtenciones30);
    $pilaresTotalesAtenciones30= mysqli_fetch_array($totalesPilaresAtenciones30);

    $sql="SELECT count(*) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '36'";
    $totalesPilaresAtenciones31 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAtenciones31);
    $pilaresTotalesAtenciones31= mysqli_fetch_array($totalesPilaresAtenciones31);

    $sql="SELECT count(*) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '37'";
    $totalesPilaresAtenciones32 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAtenciones32);
    $pilaresTotalesAtenciones32= mysqli_fetch_array($totalesPilaresAtenciones32);

    $sql="SELECT count(*) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '38'";
    $totalesPilaresAtenciones33 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAtenciones33);
    $pilaresTotalesAtenciones33= mysqli_fetch_array($totalesPilaresAtenciones33);

    $sql="SELECT count(*) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '39'";
    $totalesPilaresAtenciones34 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAtenciones34);
    $pilaresTotalesAtenciones34= mysqli_fetch_array($totalesPilaresAtenciones34);

    $sql="SELECT count(*) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '40'";
    $totalesPilaresAtenciones35 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAtenciones35);
    $pilaresTotalesAtenciones35= mysqli_fetch_array($totalesPilaresAtenciones35);

    $sql="SELECT count(*) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '41'";
    $totalesPilaresAtenciones36 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAtenciones36);
    $pilaresTotalesAtenciones36= mysqli_fetch_array($totalesPilaresAtenciones36);

    $sql="SELECT count(*) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '42'";
    $totalesPilaresAtenciones37 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAtenciones37);
    $pilaresTotalesAtenciones37= mysqli_fetch_array($totalesPilaresAtenciones37);

    $sql="SELECT count(*) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '43'";
    $totalesPilaresAtenciones38 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAtenciones38);
    $pilaresTotalesAtenciones38= mysqli_fetch_array($totalesPilaresAtenciones38);

    $sql="SELECT count(*) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '44'";
    $totalesPilaresAtenciones39 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAtenciones39);
    $pilaresTotalesAtenciones39= mysqli_fetch_array($totalesPilaresAtenciones39);

    $sql="SELECT count(*) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '45'";
    $totalesPilaresAtenciones40 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAtenciones40);
    $pilaresTotalesAtenciones40= mysqli_fetch_array($totalesPilaresAtenciones40);

    $sql="SELECT count(*) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '46'";
    $totalesPilaresAtenciones41 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAtenciones41);
    $pilaresTotalesAtenciones41= mysqli_fetch_array($totalesPilaresAtenciones41);

    $sql="SELECT count(*) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '47'";
    $totalesPilaresAtenciones42 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAtenciones42);
    $pilaresTotalesAtenciones42= mysqli_fetch_array($totalesPilaresAtenciones42);

    $sql="SELECT count(*) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '48'";
    $totalesPilaresAtenciones43 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAtenciones43);
    $pilaresTotalesAtenciones43= mysqli_fetch_array($totalesPilaresAtenciones43);

    $sql="SELECT count(*) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '49'";
    $totalesPilaresAtenciones44 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAtenciones44);
    $pilaresTotalesAtenciones44= mysqli_fetch_array($totalesPilaresAtenciones44);

    $sql="SELECT count(*) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '50'";
    $totalesPilaresAtenciones45 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAtenciones45);
    $pilaresTotalesAtenciones45= mysqli_fetch_array($totalesPilaresAtenciones45);

    $sql="SELECT count(*) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '51'";
    $totalesPilaresAtenciones46 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAtenciones46);
    $pilaresTotalesAtenciones46= mysqli_fetch_array($totalesPilaresAtenciones46);

    $sql="SELECT count(*) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '52'";
    $totalesPilaresAtenciones48 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAtenciones48);
    $pilaresTotalesAtenciones48= mysqli_fetch_array($totalesPilaresAtenciones48);

    $sql="SELECT count(*) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '53'";
    $totalesPilaresAtenciones49 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAtenciones49);
    $pilaresTotalesAtenciones49= mysqli_fetch_array($totalesPilaresAtenciones49);

    $sql="SELECT count(*) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '54'";
    $totalesPilaresAtenciones50 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAtenciones50);
    $pilaresTotalesAtenciones50= mysqli_fetch_array($totalesPilaresAtenciones50);

    $sql="SELECT count(*) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '55'";
    $totalesPilaresAtenciones51 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAtenciones51);
    $pilaresTotalesAtenciones51= mysqli_fetch_array($totalesPilaresAtenciones51);

    $sql="SELECT count(*) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '56'";
    $totalesPilaresAtenciones52 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAtenciones52);
    $pilaresTotalesAtenciones52= mysqli_fetch_array($totalesPilaresAtenciones52);

    $sql="SELECT count(*) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '57'";
    $totalesPilaresAtenciones53 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAtenciones53);
    $pilaresTotalesAtenciones53= mysqli_fetch_array($totalesPilaresAtenciones53);

    $sql="SELECT count(*) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '58'";
    $totalesPilaresAtenciones54 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAtenciones54);
    $pilaresTotalesAtenciones54= mysqli_fetch_array($totalesPilaresAtenciones54);

    $sql="SELECT count(*) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '59'";
    $totalesPilaresAtenciones55 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAtenciones55);
    $pilaresTotalesAtenciones55= mysqli_fetch_array($totalesPilaresAtenciones55);

    $sql="SELECT count(*) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '60'";
    $totalesPilaresAtenciones56 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAtenciones56);
    $pilaresTotalesAtenciones56= mysqli_fetch_array($totalesPilaresAtenciones56);

    $sql="SELECT count(*) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '61'";
    $totalesPilaresAtenciones57 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAtenciones57);
    $pilaresTotalesAtenciones57= mysqli_fetch_array($totalesPilaresAtenciones57);

    $sql="SELECT count(*) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '62'";
    $totalesPilaresAtenciones58 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAtenciones58);
    $pilaresTotalesAtenciones58= mysqli_fetch_array($totalesPilaresAtenciones58);

    $sql="SELECT count(*) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '63'";
    $totalesPilaresAtenciones59 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAtenciones59);
    $pilaresTotalesAtenciones59= mysqli_fetch_array($totalesPilaresAtenciones59);

    $sql="SELECT count(*) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '64'";
    $totalesPilaresAtenciones60 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAtenciones60);
    $pilaresTotalesAtenciones60= mysqli_fetch_array($totalesPilaresAtenciones60);

    $sql="SELECT count(*) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '65'";
    $totalesPilaresAtenciones61 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAtenciones61);
    $pilaresTotalesAtenciones61= mysqli_fetch_array($totalesPilaresAtenciones61);

    $sql="SELECT count(*) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '66'";
    $totalesPilaresAtenciones62 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAtenciones62);
    $pilaresTotalesAtenciones62= mysqli_fetch_array($totalesPilaresAtenciones62);

    $sql="SELECT count(*) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '67'";
    $totalesPilaresAtenciones63 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAtenciones63);
    $pilaresTotalesAtenciones63= mysqli_fetch_array($totalesPilaresAtenciones63);

    $sql="SELECT count(*) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '68'";
    $totalesPilaresAtenciones64 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAtenciones64);
    $pilaresTotalesAtenciones64= mysqli_fetch_array($totalesPilaresAtenciones64);

    $sql="SELECT count(*) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '70'";
    $totalesPilaresAtenciones65 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAtenciones65);
    $pilaresTotalesAtenciones65= mysqli_fetch_array($totalesPilaresAtenciones65);

    $sql="SELECT count(*) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '71'";
    $totalesPilaresAtenciones66 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAtenciones66);
    $pilaresTotalesAtenciones66= mysqli_fetch_array($totalesPilaresAtenciones66);

    $sql="SELECT count(*) AS userPorPilares FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, AsistenciasPorPilar A3, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND U1.idUsuarios = A3.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND A1.idAsistencias = A3.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.Pilares_idPilares = '72'";
    $totalesPilaresAtenciones67 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAtenciones67);
    $pilaresTotalesAtenciones67= mysqli_fetch_array($totalesPilaresAtenciones67);

   
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
        <li><b>Información general de Becas</b></li>
        <li>Total de Usuarios: <b><?=$asistenciasTotales['asistenciasTotal']?></b></li>
        <!-- <li><b>JUD estadística y prospección</b></li> -->
      </div>
    <?php endif; ?>
  </ol>
  <!-- Usuarios por Genero -->
  <div class="row">
    <div class="col-xl-6 col-sm-6 mb-3">
      <div class="card text-info bg-light o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
            <i class="fas fa-transgender-alt"></i>
            </div>
            
            <div class="mr-5"><b>Usuarios con beca por Genero <span class="float-right"></span></b></div>
          </div>
          <a class="card-footer text-info clearfix small z-1" data-toggle="collapse" href="#collapseAsistenciasPorGenero">
            <span class="float-left">Ver detalle</span>
            <span class="float-right">
              <i class="fas fa-angle-right"></i>
            </span>
          </a>
          <div class="collapse" id="collapseAsistenciasPorGenero">
            <div class="card card-body">
              <table class="table table-striped ">
                <tbody class="bg-light">
                  <tr>
                    <th scope="row">Mujeres</th>
                    <td><?=$mujeresAsistencias['asistenciasPorGenero']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Hombres</th>
                    <td><?=$hombresAsistencias['asistenciasPorGenero']?></td>
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
              
              <div class="mr-5"><b>Usuarios con beca por edad <span class="float-right"></span></b></div>
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
                      <th scope="row">15 años</th>
                      <td><?=$usuarioIntervalo1['asistenciasPorIntervalo']?></td>
                    </tr>
                    <tr>
                      <th scope="row">16 años</th>
                      <td><?=$usuarioIntervalo2['asistenciasPorIntervalo']?></td>
                    </tr>
                    <tr>
                      <th scope="row">17 años</th>
                      <td><?=$usuarioIntervalo3['asistenciasPorIntervalo']?></td>
                    </tr>
                    <tr>
                      <th scope="row">18 años</th>
                      <td><?=$usuarioIntervalo4['asistenciasPorIntervalo']?></td>
                    </tr>
                    <tr>
                      <th scope="row">19 años</th>
                      <td><?=$usuarioIntervalo5['asistenciasPorIntervalo']?></td>
                    </tr>
                    <tr>
                      <th scope="row">20 años</th>
                      <td><?=$usuarioIntervalo6['asistenciasPorIntervalo']?></td>
                    </tr>
                    <tr>
                      <th scope="row">21 años</th>
                      <td><?=$usuarioIntervalo7['asistenciasPorIntervalo']?></td>
                    </tr>
                    <tr>
                      <th scope="row">22 años</th>
                      <td><?=$usuarioIntervalo8['asistenciasPorIntervalo']?></td>
                    </tr>
                    <tr>
                      <th scope="row">23 años</th>
                      <td><?=$usuarioIntervalo9['asistenciasPorIntervalo']?></td>
                    </tr>
                    <tr>
                      <th scope="row">24 años</th>
                      <td><?=$usuarioIntervalo10['asistenciasPorIntervalo']?></td>
                    </tr>
                    <tr>
                      <th scope="row">25 años</th>
                      <td><?=$usuarioIntervalo11['asistenciasPorIntervalo']?></td>
                    </tr>
                    <tr>
                      <th scope="row">26 años</th>
                      <td><?=$usuarioIntervalo12['asistenciasPorIntervalo']?></td>
                    </tr>
                    <tr>
                      <th scope="row">27 años</th>
                      <td><?=$usuarioIntervalo13['asistenciasPorIntervalo']?></td>
                    </tr>
                    <tr>
                      <th scope="row">28 años</th>
                      <td><?=$usuarioIntervalo14['asistenciasPorIntervalo']?></td>
                    </tr>
                    <tr>
                      <th scope="row">29 años</th>
                      <td><?=$usuarioIntervalo15['asistenciasPorIntervalo']?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
      </div>
    </div> 

  <!-- Usuarios por Actividad -->
  
  <div class="row">
    <div class="col-xl-6 col-sm-6 mb-3">
      <div class="card text-white bg-primary o-hidden h-100">
        <div class="card-body">
          <div class="card-body-icon">
            <i class="fas fa-fw fa-music"></i>
          </div>
          
          <div class="mr-5"><b>Usuarios con beca en Cultura </b></div>
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
                <!-- <tr>
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
                </tr> -->
                <tr>
                  <th scope="row">Fotografía</th>
                  <td><?=$fotografia['userPorActividad']?></td>
                </tr>
                <!-- <tr>
                  <th scope="row">Acercamiento al Circo</th>
                  <td><?=$acercamientoAlCirco['userPorActividad']?></td>
                </tr> -->
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
                <!-- <tr>
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
                </tr> -->
                <tr>
                  <th scope="row">Danza folklórica</th>
                  <td><?=$folklorica['userPorActividad']?></td>
                </tr>
                <!-- <tr>
                  <th scope="row">Actuación</th>
                  <td><?=$actuacion['userPorActividad']?></td>
                </tr> -->
                <tr>
                  <th scope="row">Teatro de calle</th>
                  <td><?=$teatroCalle['userPorActividad']?></td>
                </tr>
                <!-- <tr>
                  <th scope="row">Danza contemporánea</th>
                  <td><?=$contemporanea['userPorActividad']?></td>
                </tr> -->
                <tr>
                  <th scope="row">Danza polinesia</th>
                  <td><?=$polinesia['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Teatro de máscaras</th>
                  <td><?=$mascaras['userPorActividad']?></td>
                </tr>
                <!-- <tr>
                  <th scope="row">Expresión corporal y teatro</th>
                  <td><?=$expresion['userPorActividad']?></td>
                </tr> -->
                <tr>
                  <th scope="row">Telar de cintura</th>
                  <td><?=$telar['userPorActividad']?></td>
                </tr>
                <!-- <tr>
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
                </tr> -->
                <tr>
                  <th scope="row">Escritura creativa</th>
                  <td><?=$escritura['userPorActividad']?></td>
                </tr>
                <!-- <tr>
                  <th scope="row">Pintura artística</th>
                  <td><?=$pinturaArt['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Medios Audiovisuales </th>
                  <td><?=$audioVisual['userPorActividad']?></td>
                </tr> -->
                <tr>
                  <th scope="row">Cine</th>
                  <td><?=$cine['userPorActividad']?></td>
                </tr>
                <!-- <tr>
                  <th scope="row">Animación para niños</th>
                  <td><?=$animacionNiños['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Vídeo comunitario</th>
                  <td><?=$videoComunitario['userPorActividad']?></td>
                </tr> -->
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
                <!-- <tr>
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
                </tr> -->

                <tr>
                  <th scope="row">Modelado con plastilina</th>
                  <td><?=$modeladoPlastilina['userPorActividad']?></td>
                </tr>
                <!-- <tr>
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
                </tr> -->
                <tr>
                  <th scope="row">Arte y creatividad</th>
                  <td><?=$arteCreatividad['userPorActividad']?></td>
                </tr>
                <!-- <tr>
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
                </tr> -->
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
          <div class="mr-5"><b>Usuarios con beca en Ciberescuelas</b></div>
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
                <!-- <tr>
                  <th scope="row">Edición y Diseño</th>
                  <td><?=$edicionYdiseno['userPorActividad']?></td>
                </tr> -->
                <tr>
                  <th scope="row">Club de Ciencias</th>
                  <td><?=$clubCiencia['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Robótica aplicada</th>
                  <td><?=$robo['userPorActividad']?></td>
                </tr>
                <!-- <tr>
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
                </tr> -->
                <tr>
                  <th scope="row">Sembrando autoestima</th>
                  <td><?=$autoestima['userPorActividad']?></td>
                </tr>
                <!-- <tr>
                  <th scope="row">Los duelos duelen ... tanatología y manejo del duelo</th>
                  <td><?=$tanato['userPorActividad']?></td>
                </tr> -->
                <tr>
                  <th scope="row">Inteligencia emocional y habilidades para la vida</th>
                  <td><?=$inteliEmo['userPorActividad']?></td>
                </tr>
                <!-- <tr>
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
                </tr> -->
                <tr>
                  <th scope="row">Autosanarte</th>
                  <td><?=$autosanarme['userPorActividad']?></td>
                </tr>
                <!-- <tr>
                  <th scope="row">Danzante mente</th>
                  <td><?=$danzanteMente['userPorActividad']?></td>
                </tr>-->
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
                  <!-- <th scope="row">Emociones lúdicas</th>
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
                </tr> -->
                <tr>
                  <th scope="row">BADI</th>
                  <td><?=$badi['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Prepa en línea SEP</th>
                  <td><?=$prepaSep['userPorActividad']?></td>
                </tr> 
                <tr>
                  <th scope="row">COLBACH (EXACER)</th>
                  <td><?=$colbach['userPorActividad']?></td>
                </tr>  
                <tr>
                  <th scope="row">Prepa abierta SEP</th>
                  <td><?=$prepaAbierta['userPorActividad']?></td>
                </tr>            
                <!-- <tr>
                  <th scope="row">UnADM</th>
                  <td><?=$unadm['userPorActividad']?></td>
                </tr> -->
                <tr>
                  <th scope="row">Licenciatura en linea</th>
                  <td><?=$liclinea['userPorActividad']?></td>
                </tr>
                <!-- <tr>
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
                </tr> -->
                <tr>
                  <th scope="row">Asesorias bachillerato</th>
                  <td><?=$asePrep['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Asesorias licenciatura</th>
                  <td><?=$aseLic['userPorActividad']?></td>
                </tr>
                <!-- <tr>
                  <th scope="row">Baile, cuerpo y emociones</th>
                  <td><?=$baileCuerpo['userPorActividad']?></td>
                </tr> -->
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
                <!-- <tr>
                  <th scope="row">Clase de estenografía</th>
                  <td><?=$estenografia['userPorActividad']?></td>
                </tr> -->
                <tr>
                  <th scope="row">Club de Inclusión y sensibilización sensorial</th>
                  <td><?=$clubSensorial['userPorActividad']?></td>
                </tr>
                <!-- <tr>
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
                </tr> -->
                <tr>
                  <th scope="row">Cursos para el aprendizaje de la lengua náhuatl</th>
                  <td><?=$talleresNahuatl['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Identidad y cultura de los pueblos indígenas y originarios</th>
                  <td><?=$identidadOriginaria['userPorActividad']?></td>
                </tr>
                <!-- <tr>
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
                </tr> -->
              </tbody>
            </table>
         </div>
       </div>
       </div>
    </div> 
    <div class="col-xl-6 col-sm-6 mb-3">
      <div class="card text-white bg-warning o-hidden h-100">
        <div class="card-body">
          <div class="card-body-icon">
            <i class="fas fa-fw fa-list"></i>
          </div>
          <div class="mr-5"><b>Usuarios con beca en Ciberescuelas por modulo</b></div>
        </div>
        <a class="card-footer text-white clearfix small z-1" data-toggle="collapse" href="#collapseCiberescuelasModulo">
          <span class="float-left">Ver detalle</span>
          <span class="float-right">
            <i class="fas fa-angle-right"></i>
          </span>
        </a>
        <div class="collapse" id="collapseCiberescuelasModulo">
          <div class="card card-body">
            <table class="table table-striped ">
              <tbody class="bg-warning">     
                <tr>
                  <th scope="row">Bachillerato Digital (SECTEI)</th> 
                  <td></td>
                  <td></td>   
                  <td></td>  
                </tr>
                <tr>
                  <th scope="row"></th>    
                      <td>Semestre 1</td>
                      <td><?=$badiModulo1['userPorModulo'] ?></td>
                      <td></td>  
                </tr>
                    <tr>
                      <th scope="row"></th> 
                          <td></td>   
                          <td>Reconociendo mis habilidades para el estudio</td>
                          <td><?=$badiSubModulo1['userPorSubModulo']?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th> 
                          <td></td>   
                          <td>Leo, analizo, comento y uso internet</td>
                          <td><?=$badiSubModulo2['userPorSubModulo']?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th> 
                          <td></td>   
                          <td>Habilidades operativas</td>
                          <td><?=$badiSubModulo3['userPorSubModulo']?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th> 
                          <td></td>   
                          <td>Viajando por las estrellas</td>
                          <td><?=$badiSubModulo4['userPorSubModulo']?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th> 
                          <td></td>   
                          <td>Las matemáticas en mi vida I</td>
                          <td><?=$badiSubModulo5['userPorSubModulo']?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th> 
                          <td></td>   
                          <td>Mi entorno social y cultural</td>
                          <td><?=$badiSubModulo6['userPorSubModulo']?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th> 
                          <td></td>   
                          <td>Argumento, dialogo y decido</td>
                          <td><?=$badiSubModulo7['userPorSubModulo']?></td>
                    </tr>
                <tr>
                  <th scope="row"></th>    
                      <td>Semestre 2</td>
                      <td><?=$badiModulo2['userPorModulo'] ?></td>
                      <td></td>  
                </tr>
                    <tr>
                      <th scope="row"></th> 
                          <td></td>   
                          <td>Investigar y reportar hallazgos</td>
                          <td><?=$badi2SubModulo1['userPorSubModulo']?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th> 
                          <td></td>   
                          <td>Herramientas de ofimática</td>
                          <td><?=$badi2SubModulo2['userPorSubModulo']?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th> 
                          <td></td>   
                          <td>La máquina del tiempo</td>
                          <td><?=$badi2SubModulo3['userPorSubModulo']?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th> 
                          <td></td>   
                          <td>Las matemáticas en mi vida II</td>
                          <td><?=$badi2SubModulo4['userPorSubModulo']?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th> 
                          <td></td>   
                          <td>Desarrollando mi pensamiento lógico</td>
                          <td><?=$badi2SubModulo5['userPorSubModulo']?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th> 
                          <td></td>   
                          <td>Las ideas y las prácticas democráticas</td>
                          <td><?=$badi2SubModulo6['userPorSubModulo']?></td>
                    </tr>
                <tr>
                  <th scope="row"></th>    
                      <td>Semestre 3</td>
                      <td><?=$badiModulo3['userPorModulo'] ?></td>
                      <td></td>  
                </tr>
                    <tr>
                      <th scope="row"></th> 
                          <td></td>   
                          <td>El arte: diario oculto del mundo</td>
                          <td><?=$badi3SubModulo1['userPorSubModulo']?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th> 
                          <td></td>   
                          <td>Calidad en el servicio</td>
                          <td><?=$badi3SubModulo2['userPorSubModulo']?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th> 
                          <td></td>   
                          <td>Formando cónicas</td>
                          <td><?=$badi3SubModulo3['userPorSubModulo']?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th> 
                          <td></td>   
                          <td>Entendiendo al mundo I</td>
                          <td><?=$badi3SubModulo4['userPorSubModulo']?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th> 
                          <td></td>   
                          <td>Ética ciudadana</td>
                          <td><?=$badi3SubModulo5['userPorSubModulo']?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th> 
                          <td></td>   
                          <td>México: acontecer y cotidianidad</td>
                          <td><?=$badi3SubModulo6['userPorSubModulo']?></td>
                    </tr>
                <tr>
                  <th scope="row"></th>    
                      <td>Semestre 4</td>
                      <td><?=$badiModulo4['userPorModulo'] ?></td>
                      <td></td>  
                </tr>
                    <tr>
                      <th scope="row"></th> 
                          <td></td>   
                          <td>Cuidando mi casa</td>
                          <td><?=$badi4SubModulo1['userPorSubModulo']?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th> 
                          <td></td>   
                          <td>Ser un ciudadano del mundo</td>
                          <td><?=$badi4SubModulo2['userPorSubModulo']?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th> 
                          <td></td>   
                          <td>Administración de negocios, PyMES</td>
                          <td><?=$badi4SubModulo3['userPorSubModulo']?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th> 
                          <td></td>   
                          <td>Entendiendo al mundo II</td>
                          <td><?=$badi4SubModulo4['userPorSubModulo']?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th> 
                          <td></td>   
                          <td>Amantes del conocimiento</td>
                          <td><?=$badi4SubModulo5['userPorSubModulo']?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th> 
                          <td></td>   
                          <td>Estadística y probabilidad</td>
                          <td><?=$badi4SubModulo6['userPorSubModulo']?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th> 
                          <td></td>   
                          <td>Optativa I</td>
                          <td><?=$badi4SubModulo7['userPorSubModulo']?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th> 
                          <td></td>   
                          <td>Optativa II</td>
                          <td><?=$badi4SubModulo8['userPorSubModulo']?></td>
                    </tr>
                <tr>
                  <th scope="row"></th>    
                      <td>Asignaturas Optativas</td>
                      <td><?=$badiModulo5['userPorModulo'] ?></td>
                      <td></td>  
                </tr>
                    <tr>
                      <th scope="row"></th> 
                          <td></td>   
                          <td>El cálculo en mi vida diaria</td>
                          <td><?=$badi5SubModulo1['userPorSubModulo']?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th> 
                          <td></td>   
                          <td>Una mirada a la optimización económica</td>
                          <td><?=$badi5SubModulo2['userPorSubModulo']?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th> 
                          <td></td>   
                          <td>Politicas públicas, medio ambiente y desarrollo sustentable</td>
                          <td><?=$badi5SubModulo3['userPorSubModulo']?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th> 
                          <td></td>   
                          <td>Depredador y presa en mi entorno ¿cómo cambiar?</td>
                          <td><?=$badi5SubModulo4['userPorSubModulo']?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th> 
                          <td></td>   
                          <td>Déjame que te cuente…</td>
                          <td><?=$badi5SubModulo5['userPorSubModulo']?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th> 
                          <td></td>   
                          <td>Desarrollo sustentable</td>
                          <td><?=$badi5SubModulo6['userPorSubModulo']?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th> 
                          <td></td>   
                          <td>Plantas medicinales</td>
                          <td><?=$badi5SubModulo7['userPorSubModulo']?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th> 
                          <td></td>   
                          <td>Aprendiendo a cuidarme</td>
                          <td><?=$badi5SubModulo8['userPorSubModulo']?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th> 
                          <td></td>   
                          <td>Construyendo mi proyecto de vida</td>
                          <td><?=$badi5SubModulo9['userPorSubModulo']?></td>
                    </tr>
                <tr>
                  <th scope="row">Prepa en línea SEP</th>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Propedéutico</td>
                          <td><?=$prepaLineaModulo1['userPorModulo'] ?></td>
                          <td></td>
                    </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Tecnología de la información y comunicación</td>
                          <td><?=$prepaLineaModulo2['userPorModulo'] ?></td>
                          <td></td>
                    </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>De la información al conocimiento</td>
                          <td><?=$prepaLineaModulo3['userPorModulo'] ?></td>
                          <td></td>
                    </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>El lenguaje en la relación del hombre con el mundo</td>
                          <td><?=$prepaLineaModulo4['userPorModulo'] ?></td>
                          <td></td>
                    </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Textos y visiones del mundo</td>
                          <td><?=$prepaLineaModulo5['userPorModulo'] ?></td>
                          <td></td>
                    </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Argumentación</td>
                          <td><?=$prepaLineaModulo6['userPorModulo'] ?></td>
                          <td></td>
                    </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Mi mundo en otra lengua</td>
                          <td><?=$prepaLineaModulo7['userPorModulo'] ?></td>
                          <td></td>
                    </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Mi vida en otras lenguas</td>
                          <td><?=$prepaLineaModulo8['userPorModulo'] ?></td>
                          <td></td>
                    </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Ser social y sociedad</td>
                          <td><?=$prepaLineaModulo9['userPorModulo'] ?></td>
                          <td></td>
                    </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Sociedad mexicana contemporáneo</td>
                          <td><?=$prepaLineaModulo10['userPorModulo'] ?></td>
                          <td></td>
                    </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Representación simbólicas y algoritmos</td>
                          <td><?=$prepaLineaModulo11['userPorModulo'] ?></td>
                          <td></td>
                    </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Matemáticas y representaciones del sistema natural</td>
                          <td><?=$prepaLineaModulo12['userPorModulo'] ?></td>
                          <td></td>
                    </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Variación en procesos sociales</td>
                          <td><?=$prepaLineaModulo13['userPorModulo'] ?></td>
                          <td></td>
                    </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Universo natural</td>
                          <td><?=$prepaLineaModulo14['userPorModulo'] ?></td>
                          <td></td>
                    </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Hacia un desarrollo sustentable</td>
                          <td><?=$prepaLineaModulo15['userPorModulo'] ?></td>
                          <td></td>
                    </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Evolución y sus repercusiones sociales</td>
                          <td><?=$prepaLineaModulo16['userPorModulo'] ?></td>
                          <td></td>

                    </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Estadística en fenómenos naturales y procesos sociales</td>
                          <td><?=$prepaLineaModulo17['userPorModulo'] ?></td>
                          <td></td>
                    </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Cálculo en fenómenos naturales y procesos sociales</td>
                          <td><?=$prepaLineaModulo18['userPorModulo'] ?></td>
                          <td></td>
                    </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Dinámica en la naturaleza: el movimiento</td>
                          <td><?=$prepaLineaModulo19['userPorModulo'] ?></td>
                          <td></td>
                    </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Optimización en sistemas naturales y sociales</td>
                          <td><?=$prepaLineaModulo20['userPorModulo'] ?></td>
                          <td></td>
                    </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Impacto de la ciencia y la tecnología</td>
                          <td><?=$prepaLineaModulo21['userPorModulo'] ?></td>
                          <td></td>
                    </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Tecnologías emergentes en la resolución de problemas</td>
                          <td><?=$prepaLineaModulo22['userPorModulo'] ?></td>
                          <td></td>
                    </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Tecnologías emergentes para la administración y gestión</td>
                          <td><?=$prepaLineaModulo23['userPorModulo'] ?></td>
                          <td></td>
                    </tr>
                <tr>
                  <th scope="row">COLBACH (EXACER)</th>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Asesorías. Áreas de conocimiento</td>
                          <td><?=$colbachModulo1['userPorModulo'] ?></td>
                          <td></td>
                    </tr>
                         <tr>
                          <th scope="row"></th> 
                              <td></td>   
                              <td>Matemáticas</td>
                              <td><?=$colbach1SubModulo1['userPorSubModulo']?></td>
                        </tr>
                        <tr>
                          <th scope="row"></th> 
                              <td></td>   
                              <td>Ciencias Naturales</td>
                              <td><?=$colbach1SubModulo2['userPorSubModulo']?></td>
                        </tr>
                        <tr>
                          <th scope="row"></th> 
                              <td></td>   
                              <td>Ciencias Histórico Sociales</td>
                              <td><?=$colbach1SubModulo3['userPorSubModulo']?></td>
                        </tr>
                        <tr>
                          <th scope="row"></th> 
                              <td></td>   
                              <td>Ciencias Naturales</td>
                              <td><?=$colbach1SubModulo4['userPorSubModulo']?></td>
                        </tr>
                        <tr>
                          <th scope="row"></th> 
                              <td></td>   
                              <td>Lenguaje y Comunicación</td>
                              <td><?=$colbach1SubModulo5['userPorSubModulo']?></td>
                        </tr>
                        <tr>
                          <th scope="row"></th> 
                              <td></td>   
                              <td>Metodología y Filosofía</td>
                              <td><?=$colbach1SubModulo6['userPorSubModulo']?></td>
                        </tr>
                    <tr>
                      <th scope="row"></th>    
                         <td>Asesorías. Capacitación para el trabajo</td>
                        <td><?=$colbachModulo2['userPorModulo'] ?></td>
                        <td></td>
                    </tr> 
                        <tr>
                          <th scope="row"></th> 
                              <td></td>   
                              <td>Administración de Recursos Humanos</td>
                              <td><?=$colbach2SubModulo1['userPorSubModulo']?></td>
                        </tr>
                        <tr>
                          <th scope="row"></th> 
                              <td></td>   
                              <td>Informática</td>
                              <td><?=$colbach2SubModulo2['userPorSubModulo']?></td>
                        </tr>
                        <tr>
                          <th scope="row"></th> 
                              <td></td>   
                              <td>Contabilidad</td>
                              <td><?=$colbach2SubModulo3['userPorSubModulo']?></td>
                        </tr>    
                <tr>
                  <th scope="row">Preparatoria abierta (SEP)</th>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Nivel 1. Bases</td>
                          <td><?=$prepaAbiertaModulo1['userPorModulo'] ?></td>
                          <td></td>
                    </tr>
                        <tr>
                          <th scope="row"></th> 
                              <td></td>   
                              <td>De la información al conocimiento</td>
                              <td><?=$prepaAbierta1SubModulo1['userPorSubModulo']?></td>
                        </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Nivel 2. Instrumentos</td>
                          <td><?=$prepaAbiertaModulo2['userPorModulo'] ?></td>
                          <td></td>
                    </tr>
                        <tr>
                          <th scope="row"></th> 
                              <td></td>   
                              <td>El lenguaje en la relación del hombre con el mundo</td>
                              <td><?=$prepaAbierta2SubModulo1['userPorSubModulo']?></td>
                        </tr>
                        <tr>
                          <th scope="row"></th> 
                              <td></td>   
                              <td>Representaciones simbólicas y algoritmos</td>
                              <td><?=$prepaAbierta2SubModulo2['userPorSubModulo']?></td>
                        </tr>
                        <tr>
                          <th scope="row"></th> 
                              <td></td>   
                              <td>Ser social y sociedad</td>
                              <td><?=$prepaAbierta2SubModulo3['userPorSubModulo']?></td>
                        </tr>
                        <tr>
                          <th scope="row"></th> 
                              <td></td>   
                              <td>Mi mundo en otra lengua</td>
                              <td><?=$prepaAbierta2SubModulo4['userPorSubModulo']?></td>
                        </tr>
                        <tr>
                          <th scope="row"></th> 
                              <td></td>   
                              <td>Tecnología de información y comunicación</td>
                              <td><?=$prepaAbierta2SubModulo5['userPorSubModulo']?></td>
                        </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Nivel 3. Métodos y contextos</td>
                          <td><?=$prepaAbiertaModulo3['userPorModulo'] ?></td>
                          <td></td>
                    </tr>
                       <tr>
                          <th scope="row"></th> 
                              <td></td>   
                              <td>Textos y visiones del mundo</td>
                              <td><?=$prepaAbierta3SubModulo1['userPorSubModulo']?></td>
                        </tr>
                        <tr>
                          <th scope="row"></th> 
                              <td></td>   
                              <td>Matemáticas y representaciones del sistema natural</td>
                              <td><?=$prepaAbierta3SubModulo2['userPorSubModulo']?></td>
                        </tr>
                        <tr>
                          <th scope="row"></th> 
                              <td></td>   
                              <td>Universo natural</td>
                              <td><?=$prepaAbierta3SubModulo3['userPorSubModulo']?></td>
                        </tr>
                        <tr>
                          <th scope="row"></th> 
                              <td></td>   
                              <td>Sociedad mexicana contemporánea</td>
                              <td><?=$prepaAbierta3SubModulo4['userPorSubModulo']?></td>
                        </tr>
                        <tr>
                          <th scope="row"></th> 
                              <td></td>   
                              <td>Transformaciones en el mundo contemporáneo</td>
                              <td><?=$prepaAbierta3SubModulo5['userPorSubModulo']?></td>
                        </tr>
                        <tr>
                          <th scope="row"></th> 
                              <td></td>   
                              <td>Mi vida en otra lengua</td>
                              <td><?=$prepaAbierta3SubModulo6['userPorSubModulo']?></td>
                        </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Nivel 4. Relacionesy cambios</td>
                          <td><?=$prepaAbiertaModulo4['userPorModulo'] ?></td>
                          <td></td>
                    </tr>
                       <tr>
                          <th scope="row"></th> 
                              <td></td>   
                              <td>Argumentación</td>
                              <td><?=$prepaAbierta4SubModulo1['userPorSubModulo']?></td>
                        </tr>
                        <tr>
                          <th scope="row"></th> 
                              <td></td>   
                              <td>Variación en procesos sociales</td>
                              <td><?=$prepaAbierta4SubModulo2['userPorSubModulo']?></td>
                        </tr>
                        <tr>
                          <th scope="row"></th> 
                              <td></td>   
                              <td>Cálculo en fenómenos naturales y procesos sociales</td>
                              <td><?=$prepaAbierta4SubModulo3['userPorSubModulo']?></td>
                        </tr>
                        <tr>
                          <th scope="row"></th> 
                              <td></td>   
                              <td>Hacia un desarrollo sustentable</td>
                              <td><?=$prepaAbierta4SubModulo4['userPorSubModulo']?></td>
                        </tr>
                        <tr>
                          <th scope="row"></th> 
                              <td></td>   
                              <td>Evolución y sus repercusiones sociales</td>
                              <td><?=$prepaAbierta4SubModulo5['userPorSubModulo']?></td>
                        </tr>
                        <tr>
                          <th scope="row"></th> 
                              <td></td>   
                              <td>Estadística en fenómenos naturales y procesos sociales</td>
                              <td><?=$prepaAbierta4SubModulo6['userPorSubModulo']?></td>
                        </tr>
                        <tr>
                          <th scope="row"></th> 
                              <td></td>   
                              <td>Dinámica en la naturaleza: El movimiento</td>
                              <td><?=$prepaAbierta4SubModulo7['userPorSubModulo']?></td>
                        </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Nivel 5. Efectos y propuestas</td>
                          <td><?=$prepaAbiertaModulo5['userPorModulo'] ?></td>
                          <td></td>
                    </tr>       
                        <tr>
                          <th scope="row"></th> 
                              <td></td>   
                              <td>Optimización en sistemas naturales y sociales</td>
                              <td><?=$prepaAbierta5SubModulo1['userPorSubModulo']?></td>
                        </tr>
                        <tr>
                          <th scope="row"></th> 
                              <td></td>   
                              <td>Impacto de la ciencia y la tecnología</td>
                              <td><?=$prepaAbierta5SubModulo2['userPorSubModulo']?></td>
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
          <div class="mr-5"><b>Usuarios con beca en Deporte </b></div>
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
                <!-- <tr>
                  <th scope="row">Basquetbol</th>
                  <td><?=$basquet['userPorActividad']?></td>
                </tr> -->
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
                <!-- <tr>
                  <th scope="row">Tae bo</th>
                  <td><?=$tae['userPorActividad']?></td>
                </tr> -->
                <tr>
                  <th scope="row">Yoga</th>
                  <td><?=$yoga['userPorActividad']?></td>
                </tr>
                <!-- <tr>
                  <th scope="row">Tai chi</th>
                  <td><?=$taiChi['userPorActividad']?></td>
                </tr> -->
                <tr>
                  <th scope="row">Ritmos Latinos</th>
                  <td><?=$ritmosLatinos['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Boxeo</th>
                  <td><?=$boxeo['userPorActividad']?></td>
                </tr>
                <!-- <tr>
                  <th scope="row">Atletismo</th>
                  <td><?=$atletismo['userPorActividad']?></td>
                </tr> -->
                <tr>
                  <th scope="row">Karate do</th>
                  <td><?=$karate['userPorActividad']?></td>
                </tr>
                <!-- <tr>
                  <th scope="row">Kung fu</th>
                  <td><?=$kung['userPorActividad']?></td>
                </tr> -->
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
  </div>

  <div class="row">
    <div class="col-xl-6 col-sm-6 mb-3">
      <div class="card text-white bg-danger o-hidden h-100">
        <div class="card-body">
          <div class="card-body-icon">
            <i class="fas fa-fw fa-hand-holding-usd"></i>
          </div>
          <div class="mr-5"><b>Usuarios con beca en Autonomía Económica </b></div>
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
                <!-- <tr>
                  <th scope="row">Reciclaje</th>
                  <td><?=$reciclaje['userPorActividad']?></td>
                </tr> -->
                <!-- <tr>
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
                </tr> -->
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
                <!-- <tr>
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
                </tr> -->
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
                <!-- <tr>
                  <th scope="row">Estrategias de venta</th>
                  <td><?=$estrategias['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Comercio justo</th>
                  <td><?=$comercioJusto['userPorActividad']?></td>
                </tr> -->
                </tbody>
            </table>
         </div>
       </div>
      </div>
    </div>
  </div> 
  
<!-- Usuarios con beca por PILARES-->
  <div class="row">
    <div class="col-xl-6 col-sm-6 mb-3">
      <div class="card text-info bg-light o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
            <i class="fas fa-landmark"></i>
            </div>
            
            <div class="mr-5"><b>Usuarios con beca por PILARES<span class="float-right"></span></b></div>
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
                  <tr>
                      <th scope="row">16 de Septiembre</th>
                          <td><?=$pilaresTotales60['userPorPilares']?></td>
                  </tr>
                  <tr>
                      <th scope="row">La Naranja</th>
                      <td><?=$pilaresTotales61['userPorPilares']?></td>
                  </tr>
                        <tr>
                          <th scope="row">Xochinahuac</th>
                          <td><?=$pilaresTotales62['userPorPilares']?></td>
                        </tr>
                        <tr>
                          <th scope="row">Renovación</th>
                          <td><?=$pilaresTotales63['userPorPilares']?></td>
                        </tr>
                        <tr>
                          <th scope="row">Mixquic</th>
                          <td><?=$pilaresTotales64['userPorPilares']?></td>
                        </tr>
                        <tr>
                          <th scope="row">Presidentes</th>
                          <td><?=$pilaresTotales65['userPorPilares']?></td>
                        </tr>
                        <tr>
                          <th scope="row">Santa Lucía</th>
                          <td><?=$pilaresTotales66['userPorPilares']?></td>
                        </tr>
                        <tr>
                          <th scope="row">Tetecón</th>
                          <td><?=$pilaresTotales67['userPorPilares']?></td>
                        </tr>    
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>

    <div class="col-xl-6 col-sm-6 mb-3">
      <div class="card text-info bg-light o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
            <i class="fas fa-landmark"></i>
            </div>
            
            <div class="mr-5"><b>Usuarios con beca por PILARES de procedencia<span class="float-right"></span></b></div>
          </div>
          <a class="card-footer text-info clearfix small z-1" data-toggle="collapse" href="#collapsePorPilaresProcedencia">
            <span class="float-left">Ver detalle</span>
            <span class="float-right">
              <i class="fas fa-angle-right"></i>
            </span>
          </a>
          <div class="collapse" id="collapsePorPilaresProcedencia">
            <div class="card card-body">
              <table class="table table-striped ">
                <tbody class="bg-light">
                  <tr>
                    <th scope="row">La Araña </th>
                    <td><?=$pilaresProcedenciaTotales1['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">El Capulín</th> 
                    <td><?=$pilaresProcedenciaTotales2['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Jalalpa </th>
                    <td><?=$pilaresProcedenciaTotales3['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Xalli</th>
                    <td><?=$pilaresProcedenciaTotales4['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Cantera</th>
                    <td><?=$pilaresProcedenciaTotales5['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Emiliano Zapata</th>
                    <td><?=$pilaresProcedenciaTotales6['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Chimalpa</th>
                    <td><?=$pilaresProcedenciaTotales7['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">San Simón Tolnáhuac </th>
                    <td><?=$pilaresProcedenciaTotales8['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Frida Kahlo </th>
                    <td><?=$pilaresProcedenciaTotales9['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Atlampa</th>
                    <td><?=$pilaresProcedenciaTotales10['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Richard Wagner </th>
                    <td><?=$pilaresProcedenciaTotales11['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Benita Galeana </th>
                    <td><?=$pilaresProcedenciaTotales12['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Tlalpexco</th>
                    <td><?=$pilaresProcedenciaTotales13['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">José Martí </th>
                    <td><?=$pilaresProcedenciaTotales14['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Agrícola Pantitlán </th>
                    <td><?=$pilaresProcedenciaTotales15['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Central de Abasto</th>
                    <td><?=$pilaresProcedenciaTotales16['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Cooperemos Pueblo </th>
                    <td><?=$pilaresProcedenciaTotales17['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Acahualtepec</th>
                    <td><?=$pilaresProcedenciaTotales18['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Gabriela Mistral </th>
                    <td><?=$pilaresProcedenciaTotales19['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Huayatla</th>
                    <td><?=$pilaresProcedenciaTotales20['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Caneguín</th>
                    <td><?=$pilaresProcedenciaTotales47['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">San Salvador Cuauhtenco</th>
                    <td><?=$pilaresProcedenciaTotales21['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Zapotitla</th>
                    <td><?=$pilaresProcedenciaTotales22['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Rosario Castellanos</th>
                    <td><?=$pilaresProcedenciaTotales23['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Tulyehualco</th>
                    <td><?=$pilaresProcedenciaTotales24['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">San Francisco </th>
                    <td><?=$pilaresProcedenciaTotales25['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Belén de las flores</th>
                    <td><?=$pilaresProcedenciaTotales26['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Margarita Maza de Juárez </th>
                    <td><?=$pilaresProcedenciaTotales27['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Atlapulco </th>
                    <td><?=$pilaresProcedenciaTotales28['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Santa Cecilia </th>
                    <td><?=$pilaresProcedenciaTotales29['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Tepalcatlalpan</th>
                    <td><?=$pilaresProcedenciaTotales30['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Cerro de la estrella </th>
                    <td><?=$pilaresProcedenciaTotales31['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Facundo Cabral</th>
                    <td><?=$pilaresProcedenciaTotales32['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">San lucas xochimanca </th>
                    <td><?=$pilaresProcedenciaTotales33['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Zapata Vela </th>
                    <td><?=$pilaresProcedenciaTotales34['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Insurgentes</th>
                    <td><?=$pilaresProcedenciaTotales35['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Amantla</th>
                    <td><?=$pilaresProcedenciaTotales36['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">La Cuesta </th>
                    <td><?=$pilaresProcedenciaTotales37['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Tizimín</th>
                    <td><?=$pilaresProcedenciaTotales38['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Ecoguardas</th>
                    <td><?=$pilaresProcedenciaTotales39['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Árbol del conocimiento</th>
                    <td><?=$pilaresProcedenciaTotales40['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Santa Fe</th>
                    <td><?=$pilaresProcedenciaTotales41['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">La Era</th>
                    <td><?=$pilaresProcedenciaTotales42['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Isidro Fabela</th>
                    <td><?=$pilaresProcedenciaTotales43['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Villa Panamericana</th>
                    <td><?=$pilaresProcedenciaTotales44['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Santa Úrsula</th>
                    <td><?=$pilaresProcedenciaTotales45['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Paulo Freire</th>
                    <td><?=$pilaresProcedenciaTotales46['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">San Pedro Xalpa</th>
                    <td><?=$pilaresProcedenciaTotales48['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Xaltipac</th>
                    <td><?=$pilaresProcedenciaTotales50['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Palmitas</th>
                    <td><?=$pilaresProcedenciaTotales51['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Teotongo</th>
                    <td><?=$pilaresProcedenciaTotales52['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Insurgentes</th>
                    <td><?=$pilaresProcedenciaTotales53['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">La Fortaleza</th>
                    <td><?=$pilaresProcedenciaTotales54['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Rojo Gómez</th>
                    <td><?=$pilaresProcedenciaTotales55['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Municipio Libre</th>
                    <td><?=$pilaresProcedenciaTotales56['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">San Pedro Actopan</th>
                    <td><?=$pilaresProcedenciaTotales57['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">San Bartolomé Xicomulco</th>
                    <td><?=$pilaresProcedenciaTotales58['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Centenario</th>
                    <td><?=$pilaresProcedenciaTotales59['userPorPilares']?></td>
                  </tr>
                  <tr>
                      <th scope="row">16 de Septiembre</th>
                       <td><?=$pilaresProcedenciaTotales60['userPorPilares']?></td>
                  </tr>
                  <tr>
                      <th scope="row">La Naranja</th>
                      <td><?=$pilaresProcedenciaTotales61['userPorPilares']?></td>
                  </tr>
                  <tr>
                      <th scope="row">Xochinahuac</th>
                      <td><?=$pilaresProcedenciaTotales62['userPorPilares']?></td>
                  </tr>
                  <tr>
                       <th scope="row">Renovación</th>
                      <td><?=$pilaresProcedenciaTotales63['userPorPilares']?></td>
                   </tr>
                  <tr>
                      <th scope="row">Mixquic</th>
                      <td><?=$pilaresProcedenciaTotales64['userPorPilares']?></td>
                   </tr>
                   <tr>
                       <th scope="row">Presidentes</th>
                       <td><?=$pilaresProcedenciaTotales65['userPorPilares']?></td>
                  </tr>
                  <tr>
                      <th scope="row">Santa Lucía</th>
                       <td><?=$pilaresProcedenciaTotales66['userPorPilares']?></td>
                   </tr>
                   <tr>
                       <th scope="row">Tetecón</th>
                       <td><?=$pilaresProcedenciaTotales67['userPorPilares']?></td>
                  </tr>    
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>

  </div>


  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
  <!--
    <li class="breadcrumb-item active">Vista General</li>
  -->
    <?php if(isset($_SESSION['identity'])): ?>
      <div class="breadcrumb-item active">
        <!-- <li><?= $_SESSION['identity']->nombre?> <?=$_SESSION['identity']->apellidoPaterno?> <?=$_SESSION['identity']->apellidoMaterno?></li> -->
        <li><b>Información general de Atenciones</b></li>
        <li>Total de atenciones: <b><?=$atencionesTotales['atencionesTotal']?></b></li>
        <!-- <li><b>JUD estadística y prospección</b></li> -->
      </div>
    <?php endif; ?>
  </ol>
   <!-- Atenciones por Genero -->
   <div class="row">
    <div class="col-xl-6 col-sm-6 mb-3">
      <div class="card text-info bg-light o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
            <i class="fas fa-transgender-alt"></i>
            </div>
            
            <div class="mr-5"><b>Atenciones de usuarios por Genero <span class="float-right"></span></b></div>
          </div>
          <a class="card-footer text-info clearfix small z-1" data-toggle="collapse" href="#collapseAtencionesPorGenero">
            <span class="float-left">Ver detalle</span>
            <span class="float-right">
              <i class="fas fa-angle-right"></i>
            </span>
          </a>
          <div class="collapse" id="collapseAtencionesPorGenero">
            <div class="card card-body">
              <table class="table table-striped ">
                <tbody class="bg-light">
                  <tr>
                    <th scope="row">Mujeres</th>
                    <td><?=$mujeresAtenciones['atencionesPorGenero']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Hombres</th>
                    <td><?=$hombresAtenciones['atencionesPorGenero']?></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>

  </div>
     <!-- Atenciones totales por intervalo de edad -->
     <div class="row">
    <div class="col-xl-6 col-sm-6 mb-3">
      <div class="card text-white bg-secondary o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
            <i class="fas fa-birthday-cake"></i>
            </div>
            
            <div class="mr-5"><b>Atenciones de usuarios con beca por edad <span class="float-right"></span></b></div>
          </div>
          <a class="card-footer text-white clearfix small z-1" data-toggle="collapse" href="#collapsePorIntervaloAtenciones">
            <span class="float-left">Ver detalle</span>
            <span class="float-right">
              <i class="fas fa-angle-right"></i>
            </span>
          </a>
          <div class="collapse" id="collapsePorIntervaloAtenciones">
            <div class="card card-body">
              <table class="table table-striped ">
                <tbody class="bg-secondary">
                  <tr>
                    <th scope="row">15 años</th>
                    <td><?=$totalesIntervalo1['atencionesPorIntervalo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">16 años</th>
                    <td><?=$totalesIntervalo2['atencionesPorIntervalo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">17 años</th>
                    <td><?=$totalesIntervalo3['atencionesPorIntervalo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">18 años</th>
                    <td><?=$totalesIntervalo4['atencionesPorIntervalo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">19 años</th>
                    <td><?=$totalesIntervalo5['atencionesPorIntervalo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">20 años</th>
                    <td><?=$totalesIntervalo6['atencionesPorIntervalo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">21 años</th>
                    <td><?=$totalesIntervalo7['atencionesPorIntervalo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">22 años</th>
                    <td><?=$totalesIntervalo8['atencionesPorIntervalo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">23 años</th>
                    <td><?=$totalesIntervalo9['atencionesPorIntervalo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">24 años</th>
                    <td><?=$totalesIntervalo10['atencionesPorIntervalo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">25 años</th>
                    <td><?=$totalesIntervalo11['atencionesPorIntervalo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">26 años</th>
                    <td><?=$totalesIntervalo12['atencionesPorIntervalo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">27 años</th>
                    <td><?=$totalesIntervalo13['atencionesPorIntervalo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">28 años</th>
                    <td><?=$totalesIntervalo14['atencionesPorIntervalo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">29 años</th>
                    <td><?=$totalesIntervalo15['atencionesPorIntervalo']?></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>
 
  </div> 

  <!-- Atenciones por Actividad -->
  <!-- -->
  
  <div class="row">
    <div class="col-xl-6 col-sm-6 mb-3">
      <div class="card text-white bg-primary o-hidden h-100">
        <div class="card-body">
          <div class="card-body-icon">
            <i class="fas fa-fw fa-music"></i>
          </div>
          
          <div class="mr-5"><b>Atenciones de usuarios con beca en Cultura </b></div>
        </div>
        <a class="card-footer text-white clearfix small z-1" data-toggle="collapse" href="#collapseCulturaAtenciones">
          <span class="float-left">Ver detalle</span>
          <span class="float-right">
            <i class="fas fa-angle-right"></i>
          </span>
        </a>
        <div class="collapse" id="collapseCulturaAtenciones">
          <div class="card card-body">
            <table class="table table-striped ">
              <tbody class="bg-primary">
            
                <tr>
                  <th scope="row">Ballet</th>
                  <td><?=$balletAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Danza</th>
                  <td><?=$danzaAtenciones['atencionesPorActividad']?></td>
                </tr>
                <!-- <tr>
                  <th scope="row">Danza Jazz</th>
                  <td><?=$danzaJazzAtenciones['atencionesPorActividad']?></td>
                </tr> 
                <tr>
                  <th scope="row">Iniciación al canto</th>
                  <td><?=$iniciacionCantoAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Belly Dance</th>
                  <td><?=$bellyDanceAtenciones['atencionesPorActividad']?></td>
                </tr> -->
                <tr>
                  <th scope="row">Fotografía</th>
                  <td><?=$fotografiaAtenciones['atencionesPorActividad']?></td>
                </tr>
                <!-- <tr>
                  <th scope="row">Acercamiento al Circo</th>
                  <td><?=$acercamientoAlCircoAtenciones['atencionesPorActividad']?></td>
                </tr> -->
                <tr>
                  <th scope="row">Medio ambiente</th>
                  <td><?=$medioAmbienteAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Fotografía Digital</th>
                  <td><?=$fotografiaDigitalAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Libroclub</th>
                  <td><?=$libroClubAtenciones['atencionesPorActividad']?></td>
                </tr>
                <!-- <tr>
                  <th scope="row">Experimentación Gráfica</th>
                  <td><?=$experimentacionGraficaAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Cinema PILARES</th>
                  <td><?=$cinemaPilaresAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Baile Social</th>
                  <td><?=$baileSocialAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Danza para niños</th>
                  <td><?=$danzaNiñosAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Danza para adultos</th>
                  <td><?=$danzaAdultosAtenciones['atencionesPorActividad']?></td>
                </tr> -->
                <tr>
                  <th scope="row">Danza folklórica</th>
                  <td><?=$folkloricaAtenciones['atencionesPorActividad']?></td>
                </tr>
                <!-- <tr>
                  <th scope="row">Actuación</th>
                  <td><?=$actuacionAtenciones['atencionesPorActividad']?></td>
                </tr> -->
                <tr>
                  <th scope="row">Teatro de calle</th>
                  <td><?=$teatroCalleAtenciones['atencionesPorActividad']?></td>
                </tr>
                <!-- <tr>
                  <th scope="row">Danza contemporánea</th>
                  <td><?=$contemporaneaAtenciones['atencionesPorActividad']?></td>
                </tr> -->
                <tr>
                  <th scope="row">Danza polinesia</th>
                  <td><?=$polinesiaAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Teatro de máscaras</th>
                  <td><?=$mascarasAtenciones['atencionesPorActividad']?></td>
                </tr>
                <!-- <tr>
                  <th scope="row">Expresión corporal y teatro</th>
                  <td><?=$expresionAtenciones['atencionesPorActividad']?></td>
                </tr> -->
                <tr>
                  <th scope="row">Telar de cintura</th>
                  <td><?=$telarAtenciones['atencionesPorActividad']?></td>
                </tr>
                <!-- <tr>
                  <th scope="row">Cartonería</th>
                  <td><?=$cartoneriaAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Bordado para la vida</th>
                  <td><?=$bordadoAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Construcción artesanal de instrumentos</th>
                  <td><?=$construccionAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Diseño de juguetes de madera y materiales de</th>
                  <td><?=$diseñoJuguetesAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Reciclaje y medio ambiente</th>
                  <td><?=$reciclajeAmbAtenciones['atencionesPorActividad']?></td>
                </tr> -->
                <tr>
                  <th scope="row">Escritura creativa</th>
                  <td><?=$escrituraAtenciones['atencionesPorActividad']?></td>
                </tr>
                <!-- <tr>
                  <th scope="row">Pintura artística</th>
                  <td><?=$pinturaArtAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Medios Audiovisuales </th>
                  <td><?=$audioVisualAtenciones['atencionesPorActividad']?></td>
                </tr> -->
                <tr>
                  <th scope="row">Cine</th>
                  <td><?=$cineAtenciones['atencionesPorActividad']?></td>
                </tr>
                <!-- <tr>
                  <th scope="row">Animación para niños</th>
                  <td><?=$animacionNiñosAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Vídeo comunitario</th>
                  <td><?=$videoComunitarioAtenciones['atencionesPorActividad']?></td>
                </tr> -->
                <tr>
                  <th scope="row">Guitarra clásica</th>
                  <td><?=$guitarraAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Música Rap</th>
                  <td><?=$rapAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Percusiones</th>
                  <td><?=$percusionesAtenciones['atencionesPorActividad']?></td>
                </tr>
                <!-- <tr>
                  <th scope="row">Iniciación a la música</th>
                  <td><?=$iniciacionAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Son Huasteco</th>
                  <td><?=$sonHuastecoAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Dibujo y grabado</th>
                  <td><?=$grabadoAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Clown</th>
                  <td><?=$clownAtenciones['atencionesPorActividad']?></td>
                </tr> -->

                <tr>
                  <th scope="row">Modelado con plastilina</th>
                  <td><?=$modeladoPlastilinaAtenciones['atencionesPorActividad']?></td>
                </tr>
                <!-- <tr>
                  <th scope="row">Libro Club</th>
                  <td><?=$libroClubAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Literatura</th>
                  <td><?=$literaturaAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Salsa Cubana</th>
                  <td><?=$salsaCubanaAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Encuardernación</th>
                  <td><?=$encuadernacionAtenciones['atencionesPorActividad']?></td>
                </tr> -->
                <tr>
                  <th scope="row">Arte y creatividad</th>
                  <td><?=$arteCreatividadAtenciones['atencionesPorActividad']?></td>
                </tr>
                <!-- <tr>
                  <th scope="row">Arte y Ciencia</th>
                  <td><?=$arteCienciaAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Transformaciones colaborativas</th>
                  <td><?=$transformacionesAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Meditación creativa</th>
                  <td><?=$meditacionAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Vitrales</th>
                  <td><?=$vitralesAtenciones['atencionesPorActividad']?></td>
                </tr> -->
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
          <div class="mr-5"><b>Atenciones de usuarios con beca en Ciberescuelas</b></div>
        </div>
        <a class="card-footer text-white clearfix small z-1" data-toggle="collapse" href="#collapseCiberescuelasAtenciones">
          <span class="float-left">Ver detalle</span>
          <span class="float-right">
            <i class="fas fa-angle-right"></i>
          </span>
        </a>
        <div class="collapse" id="collapseCiberescuelasAtenciones">
          <div class="card card-body">
            <table class="table table-striped ">
              <tbody class="bg-warning">     
                <tr>
                  <th scope="row">Ajedrez</th>
                  <td><?=$ajedrezAtenciones['atencionesPorActividad']?></td>
                </tr>
                <!-- <tr>
                  <th scope="row">Edición y Diseño</th>
                  <td><?=$edicionYdisenoAtenciones['atencionesPorActividad']?></td>
                </tr> -->
                <tr>
                  <th scope="row">Club de Ciencias</th>
                  <td><?=$clubCienciaAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Robótica aplicada</th>
                  <td><?=$roboAtenciones['atencionesPorActividad']?></td>
                </tr>
                <!-- <tr>
                  <th scope="row">Club de código (para niñas y niños)</th>
                  <td><?=$clubCodigoAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Amor y sexualidad</th>
                  <td><?=$amorAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Prevención de adicc</th>
                  <td><?=$prevenAdicAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Habilidades para la</th>
                  <td><?=$habilidadesAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Proyecto de vida</th>
                  <td><?=$proyectoAtenciones['atencionesPorActividad']?></td>
                </tr> -->
                <tr>
                  <th scope="row">Sembrando autoestima</th>
                  <td><?=$autoestimaAtenciones['atencionesPorActividad']?></td>
                </tr>
                <!-- <tr>
                  <th scope="row">Los duelos duelen ... tanatología y manejo del duelo</th>
                  <td><?=$tanatoAtenciones['atencionesPorActividad']?></td>
                </tr> -->
                <tr>
                  <th scope="row">Inteligencia emocional y habilidades para la vida</th>
                  <td><?=$inteliEmoAtenciones['atencionesPorActividad']?></td>
                </tr>
                <!-- <tr>
                  <th scope="row">Recuperando mí libertad</th>
                  <td><?=$recuperandoMiLibertadAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Comprendiendo la adolescencia</th>
                  <td><?=$comprendiendoAdolescenciaAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Comprendiendo la niñez</th>
                  <td><?=$comprendiendoNinezAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Es un placer conocerme</th>
                  <td><?=$conocermeAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Conversatorios</th>
                  <td><?=$conversatoriosAtenciones['atencionesPorActividad']?></td>
                </tr> -->
                <tr>
                  <th scope="row">Autosanarte</th>
                  <td><?=$autosanarmeAtenciones['atencionesPorActividad']?></td>
                </tr>
                <!-- <tr>
                  <th scope="row">Danzante mente</th>
                  <td><?=$danzanteMenteAtenciones['atencionesPorActividad']?></td>
                </tr>-->
                <tr>
                  <th scope="row">Artística-mente</th>
                  <td><?=$arteEmoAtenciones['atencionesPorActividad']?></td>
                </tr> 
                <tr>
                  <th scope="row">Club de letras y expresión</th>
                  <td><?=$redaccionAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Talleres de cómputo</th>
                  <td><?=$talleresComAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <!-- <th scope="row">Emociones lúdicas</th>
                  <td><?=$emoMagicAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Pintando emociones</th>
                  <td><?=$pintEmoAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Alfabetización</th>
                  <td><?=$alfabetAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Primaria</th>
                  <td><?=$primariaAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Secundaria</th>
                  <td><?=$secundariaAtenciones['atencionesPorActividad']?></td>
                </tr> -->
                <tr>
                  <th scope="row">BADI</th>
                  <td><?=$badiAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Prepa en línea SEP</th>
                  <td><?=$prepaSepAtenciones['atencionesPorActividad']?></td>
                </tr>   
                <tr>
                  <th scope="row">COLBACH (EXACER)</th>
                  <td><?=$colbachAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Preparatoria abierta (SEP)</th>
                  <td><?=$prepaAbiertaAtenciones['atencionesPorActividad']?></td>
                </tr>        
                <!-- <tr>
                  <th scope="row">UnADM</th>
                  <td><?=$unadmAtenciones['atencionesPorActividad']?></td>
                </tr> -->
                <tr>
                  <th scope="row">Licenciatura en linea</th>
                  <td><?=$liclineaAtenciones['atencionesPorActividad']?></td>
                </tr>
                <!-- <tr>
                  <th scope="row">Licenciaturas CDMX</th>
                  <td><?=$licCdmxAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Asesorias primaria</th>
                  <td><?=$asePrimariaAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Asesorias secundaria</th>
                  <td><?=$aseSecundariaAtenciones['atencionesPorActividad']?></td>
                </tr> -->
                <tr>
                  <th scope="row">Asesorias bachillerato</th>
                  <td><?=$asePrepAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Asesorias licenciatura</th>
                  <td><?=$aseLicAtenciones['atencionesPorActividad']?></td>
                </tr>
                <!-- <tr>
                  <th scope="row">Baile, cuerpo y emociones</th>
                  <td><?=$baileCuerpoAtenciones['atencionesPorActividad']?></td>
                </tr> -->
                <tr>
                  <th scope="row">Club de Braile</th>
                  <td><?=$braileAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Computación con tecnologías de asistencia para personas ciegas</th>
                  <td><?=$computacionAsistidaAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Club de lengua de señas mexicana</th>
                  <td><?=$senasAtenciones['atencionesPorActividad']?></td>
                </tr>
                <!-- <tr>
                  <th scope="row">Clase de estenografía</th>
                  <td><?=$estenografiaAtenciones['atencionesPorActividad']?></td>
                </tr> -->
                <tr>
                  <th scope="row">Club de Inclusión y sensibilización sensorial</th>
                  <td><?=$clubSensorialAtenciones['atencionesPorActividad']?></td>
                </tr>
                <!-- <tr>
                  <th scope="row">Cultura sorda</th>
                  <td><?=$culturaSordaAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Expresión corporal y danza inclusiva</th>
                  <td><?=$expresionCorporalAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Charlando sobre la diversidad sexual</th>
                  <td><?=$diversidadSexualAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Arte inclusivo</th>
                  <td><?=$arteInclusivoAtenciones['atencionesPorActividad']?></td>
                </tr> -->
                <tr>
                  <th scope="row">Cursos para el aprendizaje de la lengua náhuatl</th>
                  <td><?=$talleresNahuatlAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Identidad y cultura de los pueblos indígenas y originarios</th>
                  <td><?=$identidadOriginariaAtenciones['atencionesPorActividad']?></td>
                </tr>
                <!-- <tr>
                  <th scope="row">Talleres de interculturalidad</th>
                  <td><?=$talleresInterculturalidadAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Revitalización de lenguas originarias</th>
                  <td><?=$revitalizacionLenguasAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Conocimientos y saberes de mi comunidad</th>
                  <td><?=$saberesComunidadAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Biodiversidad y territorio</th>
                  <td><?=$biodiversidadAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Derechos humanos</th>
                  <td><?=$derechoshumanosAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Derechos de los pueblos indígenas</th>
                  <td><?=$derechosIndigenasAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Feminismo comunitario</th>
                  <td><?=$feminismoComunitarioAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Alfabetización a población indígena</th>
                  <td><?=$alfabetizacionIndigenaAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Gestión, canalización y seguimiento a población indígena</th>
                  <td><?=$seguimientoIndigenaAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Migrantes y refugiados</th>
                  <td><?=$migrantesAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Alfabetización a población migrante</th>
                  <td><?=$alfabetizacionmigrantesAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Asesorías educativas a población migrante</th>
                  <td><?=$asesoriasmigrantesAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Gestión, canalización y seguimiento a población migrante</th>
                  <td><?=$seguimientomigrantesAtenciones['atencionesPorActividad']?></td>
                </tr> -->
              </tbody>
            </table>
         </div>
       </div>
       </div>
    </div> 
    
    <div class="col-xl-6 col-sm-6 mb-3">
      <div class="card text-white bg-warning o-hidden h-100">
        <div class="card-body">
          <div class="card-body-icon">
            <i class="fas fa-fw fa-list"></i>
          </div>
          <div class="mr-5"><b>Atenciones de usuarios con beca en Ciberescuelas por modulo</b></div>
        </div>
        <a class="card-footer text-white clearfix small z-1" data-toggle="collapse" href="#collapseCiberescuelasAtencionesModulos">
          <span class="float-left">Ver detalle</span>
          <span class="float-right">
            <i class="fas fa-angle-right"></i>
          </span>
        </a>
        <div class="collapse" id="collapseCiberescuelasAtencionesModulos">
          <div class="card card-body">
            <table class="table table-striped ">
              <tbody class="bg-warning">     
                <tr>
                  <th scope="row">Bachillerato Digital (SECTEI)</th> 
                  <td></td>
                  <td></td>   
                  <td></td>  
                </tr>
                <tr>
                  <th scope="row"></th>    
                      <td>Semestre 1</td>
                      <td><?=$badiAtencionesModulo1['atencionesPorActividadModulo'] ?></td>
                      <td></td>  
                </tr>
                    <tr>
                      <th scope="row"></th> 
                          <td></td>   
                          <td>Reconociendo mis habilidades para el estudio</td>
                          <td><?=$badiAtencionesSubModulo1['atencionesPorSubModulo']?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th> 
                          <td></td>   
                          <td>Leo, analizo, comento y uso internet</td>
                          <td><?=$badiAtencionesSubModulo2['atencionesPorSubModulo']?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th> 
                          <td></td>   
                          <td>Habilidades operativas</td>
                          <td><?=$badiAtencionesSubModulo3['atencionesPorSubModulo']?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th> 
                          <td></td>   
                          <td>Viajando por las estrellas</td>
                          <td><?=$badiAtencionesSubModulo4['atencionesPorSubModulo']?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th> 
                          <td></td>   
                          <td>Las matemáticas en mi vida I</td>
                          <td><?=$badiAtencionesSubModulo5['atencionesPorSubModulo']?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th> 
                          <td></td>   
                          <td>Mi entorno social y cultural</td>
                          <td><?=$badiAtencionesSubModulo6['atencionesPorSubModulo']?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th> 
                          <td></td>   
                          <td>Argumento, dialogo y decido</td>
                          <td><?=$badiAtencionesSubModulo7['atencionesPorSubModulo']?></td>
                    </tr>
                <tr>
                  <th scope="row"></th>    
                      <td>Semestre 2</td>
                      <td><?=$badiAtencionesModulo2['atencionesPorActividadModulo'] ?></td>
                      <td></td>  
                </tr>
                    <tr>
                      <th scope="row"></th> 
                          <td></td>   
                          <td>Investigar y reportar hallazgos</td>
                          <td><?=$badiAtenciones2SubModulo1['atencionesPorSubModulo']?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th> 
                          <td></td>   
                          <td>Herramientas de ofimática</td>
                          <td><?=$badiAtenciones2SubModulo2['atencionesPorSubModulo']?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th> 
                          <td></td>   
                          <td>La máquina del tiempo</td>
                          <td><?=$badiAtenciones2SubModulo3['atencionesPorSubModulo']?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th> 
                          <td></td>   
                          <td>Las matemáticas en mi vida II</td>
                          <td><?=$badiAtenciones2SubModulo4['atencionesPorSubModulo']?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th> 
                          <td></td>   
                          <td>Desarrollando mi pensamiento lógico</td>
                          <td><?=$badiAtenciones2SubModulo5['atencionesPorSubModulo']?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th> 
                          <td></td>   
                          <td>Las ideas y las prácticas democráticas</td>
                          <td><?=$badiAtenciones2SubModulo6['atencionesPorSubModulo']?></td>
                    </tr>
                <tr>
                  <th scope="row"></th>    
                      <td>Semestre 3</td>
                      <td><?=$badiAtencionesModulo3['atencionesPorActividadModulo'] ?></td>
                      <td></td>  
                </tr>
                    <tr>
                      <th scope="row"></th> 
                          <td></td>   
                          <td>El arte: diario oculto del mundo</td>
                          <td><?=$badiAtenciones3SubModulo1['atencionesPorSubModulo']?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th> 
                          <td></td>   
                          <td>Calidad en el servicio</td>
                          <td><?=$badiAtenciones3SubModulo2['atencionesPorSubModulo']?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th> 
                          <td></td>   
                          <td>Formando cónicas</td>
                          <td><?=$badiAtenciones3SubModulo3['atencionesPorSubModulo']?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th> 
                          <td></td>   
                          <td>Entendiendo al mundo I</td>
                          <td><?=$badiAtenciones3SubModulo4['atencionesPorSubModulo']?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th> 
                          <td></td>   
                          <td>Ética ciudadana</td>
                          <td><?=$badiAtenciones3SubModulo5['atencionesPorSubModulo']?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th> 
                          <td></td>   
                          <td>México: acontecer y cotidianidad</td>
                          <td><?=$badiAtenciones3SubModulo6['atencionesPorSubModulo']?></td>
                    </tr>
                <tr>
                  <th scope="row"></th>    
                      <td>Semestre 4</td>
                      <td><?=$badiAtencionesModulo4['atencionesPorActividadModulo'] ?></td>
                      <td></td>  
                </tr>
                    <tr>
                      <th scope="row"></th> 
                          <td></td>   
                          <td>Cuidando mi casa</td>
                          <td><?=$badiAtenciones4SubModulo1['atencionesPorSubModulo']?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th> 
                          <td></td>   
                          <td>Ser un ciudadano del mundo</td>
                          <td><?=$badiAtenciones4SubModulo2['atencionesPorSubModulo']?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th> 
                          <td></td>   
                          <td>Administración de negocios, PyMES</td>
                          <td><?=$badiAtenciones4SubModulo3['atencionesPorSubModulo']?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th> 
                          <td></td>   
                          <td>Entendiendo al mundo II</td>
                          <td><?=$badiAtenciones4SubModulo4['atencionesPorSubModulo']?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th> 
                          <td></td>   
                          <td>Amantes del conocimiento</td>
                          <td><?=$badiAtenciones4SubModulo5['atencionesPorSubModulo']?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th> 
                          <td></td>   
                          <td>Estadística y probabilidad</td>
                          <td><?=$badiAtenciones4SubModulo6['atencionesPorSubModulo']?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th> 
                          <td></td>   
                          <td>Optativa I</td>
                          <td><?=$badiAtenciones4SubModulo7['atencionesPorSubModulo']?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th> 
                          <td></td>   
                          <td>Optativa II</td>
                          <td><?=$badiAtenciones4SubModulo8['atencionesPorSubModulo']?></td>
                    </tr>
                <tr>
                  <th scope="row"></th>    
                      <td>Asignaturas Optativas</td>
                      <td><?=$badiAtencionesModulo5['atencionesPorActividadModulo'] ?></td>
                      <td></td>  
                </tr>
                    <tr>
                      <th scope="row"></th> 
                          <td></td>   
                          <td>El cálculo en mi vida diaria</td>
                          <td><?=$badiAtenciones5SubModulo1['atencionesPorSubModulo']?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th> 
                          <td></td>   
                          <td>Una mirada a la optimización económica</td>
                          <td><?=$badiAtenciones5SubModulo2['atencionesPorSubModulo']?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th> 
                          <td></td>   
                          <td>Politicas públicas, medio ambiente y desarrollo sustentable</td>
                          <td><?=$badiAtenciones5SubModulo3['atencionesPorSubModulo']?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th> 
                          <td></td>   
                          <td>Depredador y presa en mi entorno ¿cómo cambiar?</td>
                          <td><?=$badiAtenciones5SubModulo4['atencionesPorSubModulo']?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th> 
                          <td></td>   
                          <td>Déjame que te cuente…</td>
                          <td><?=$badiAtenciones5SubModulo5['atencionesPorSubModulo']?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th> 
                          <td></td>   
                          <td>Desarrollo sustentable</td>
                          <td><?=$badiAtenciones5SubModulo6['atencionesPorSubModulo']?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th> 
                          <td></td>   
                          <td>Plantas medicinales</td>
                          <td><?=$badiAtenciones5SubModulo7['atencionesPorSubModulo']?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th> 
                          <td></td>   
                          <td>Aprendiendo a cuidarme</td>
                          <td><?=$badiAtenciones5SubModulo8['atencionesPorSubModulo']?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th> 
                          <td></td>   
                          <td>Construyendo mi proyecto de vida</td>
                          <td><?=$badiAtenciones5SubModulo9['atencionesPorSubModulo']?></td>
                    </tr>
                <tr>
                  <th scope="row">Prepa en línea SEP</th>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Propedéutico</td>
                          <td><?=$prepaLineaAtencionesModulo1['atencionesPorActividadModulo'] ?></td>
                          <td></td>
                    </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Tecnología de la información y comunicación</td>
                          <td><?=$prepaLineaAtencionesModulo2['atencionesPorActividadModulo'] ?></td>
                          <td></td>
                    </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>De la información al conocimiento</td>
                          <td><?=$prepaLineaAtencionesModulo3['atencionesPorActividadModulo'] ?></td>
                          <td></td>
                    </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>El lenguaje en la relación del hombre con el mundo</td>
                          <td><?=$prepaLineaAtencionesModulo4['atencionesPorActividadModulo'] ?></td>
                          <td></td>
                    </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Textos y visiones del mundo</td>
                          <td><?=$prepaLineaAtencionesModulo5['atencionesPorActividadModulo'] ?></td>
                          <td></td>
                    </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Argumentación</td>
                          <td><?=$prepaLineaAtencionesModulo6['atencionesPorActividadModulo'] ?></td>
                          <td></td>
                    </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Mi mundo en otra lengua</td>
                          <td><?=$prepaLineaAtencionesModulo7['atencionesPorActividadModulo'] ?></td>
                          <td></td>
                    </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Mi vida en otras lenguas</td>
                          <td><?=$prepaLineaAtencionesModulo8['atencionesPorActividadModulo'] ?></td>
                          <td></td>
                    </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Ser social y sociedad</td>
                          <td><?=$prepaLineaAtencionesModulo9['atencionesPorActividadModulo'] ?></td>
                          <td></td>
                    </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Sociedad mexicana contemporáneo</td>
                          <td><?=$prepaLineaAtencionesModulo10['atencionesPorActividadModulo'] ?></td>
                          <td></td>
                    </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Representación simbólicas y algoritmos</td>
                          <td><?=$prepaLineaAtencionesModulo11['atencionesPorActividadModulo'] ?></td>
                          <td></td>
                    </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Matemáticas y representaciones del sistema natural</td>
                          <td><?=$prepaLineaAtencionesModulo12['atencionesPorActividadModulo'] ?></td>
                          <td></td>
                    </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Variación en procesos sociales</td>
                          <td><?=$prepaLineaAtencionesModulo13['atencionesPorActividadModulo'] ?></td>
                          <td></td>
                    </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Universo natural</td>
                          <td><?=$prepaLineaAtencionesModulo14['atencionesPorActividadModulo'] ?></td>
                          <td></td>
                    </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Hacia un desarrollo sustentable</td>
                          <td><?=$prepaLineaAtencionesModulo15['atencionesPorActividadModulo'] ?></td>
                          <td></td>
                    </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Evolución y sus repercusiones sociales</td>
                          <td><?=$prepaLineaAtencionesModulo16['atencionesPorActividadModulo'] ?></td>
                          <td></td>

                    </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Estadística en fenómenos naturales y procesos sociales</td>
                          <td><?=$prepaLineaAtencionesModulo17['atencionesPorActividadModulo'] ?></td>
                          <td></td>
                    </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Cálculo en fenómenos naturales y procesos sociales</td>
                          <td><?=$prepaLineaAtencionesModulo18['atencionesPorActividadModulo'] ?></td>
                          <td></td>
                    </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Dinámica en la naturaleza: el movimiento</td>
                          <td><?=$prepaLineaAtencionesModulo19['atencionesPorActividadModulo'] ?></td>
                          <td></td>
                    </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Optimización en sistemas naturales y sociales</td>
                          <td><?=$prepaLineaAtencionesModulo20['atencionesPorActividadModulo'] ?></td>
                          <td></td>
                    </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Impacto de la ciencia y la tecnología</td>
                          <td><?=$prepaLineaAtencionesModulo21['atencionesPorActividadModulo'] ?></td>
                          <td></td>
                    </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Tecnologías emergentes en la resolución de problemas</td>
                          <td><?=$prepaLineaAtencionesModulo22['atencionesPorActividadModulo'] ?></td>
                          <td></td>
                    </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Tecnologías emergentes para la administración y gestión</td>
                          <td><?=$prepaLineaAtencionesModulo23['atencionesPorActividadModulo'] ?></td>
                          <td></td>
                    </tr>
                <tr>
                  <th scope="row">COLBACH (EXACER)</th>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Asesorías. Áreas de conocimiento</td>
                          <td><?=$colbachAtencionesModulo1['atencionesPorActividadModulo'] ?></td>
                          <td></td>
                    </tr>
                         <tr>
                          <th scope="row"></th> 
                              <td></td>   
                              <td>Matemáticas</td>
                              <td><?=$colbachAtenciones1SubModulo1['atencionesPorSubModulo']?></td>
                        </tr>
                        <tr>
                          <th scope="row"></th> 
                              <td></td>   
                              <td>Ciencias Naturales</td>
                              <td><?=$colbachAtenciones1SubModulo2['atencionesPorSubModulo']?></td>
                        </tr>
                        <tr>
                          <th scope="row"></th> 
                              <td></td>   
                              <td>Ciencias Histórico Sociales</td>
                              <td><?=$colbachAtenciones1SubModulo3['atencionesPorSubModulo']?></td>
                        </tr>
                        <tr>
                          <th scope="row"></th> 
                              <td></td>   
                              <td>Ciencias Naturales</td>
                              <td><?=$colbachAtenciones1SubModulo4['atencionesPorSubModulo']?></td>
                        </tr>
                        <tr>
                          <th scope="row"></th> 
                              <td></td>   
                              <td>Lenguaje y Comunicación</td>
                              <td><?=$colbachAtenciones1SubModulo5['atencionesPorSubModulo']?></td>
                        </tr>
                        <tr>
                          <th scope="row"></th> 
                              <td></td>   
                              <td>Metodología y Filosofía</td>
                              <td><?=$colbachAtenciones1SubModulo6['atencionesPorSubModulo']?></td>
                        </tr>
                    <tr>
                      <th scope="row"></th>    
                         <td>Asesorías. Capacitación para el trabajo</td>
                        <td><?=$colbachAtencionesModulo2['atencionesPorActividadModulo'] ?></td>
                        <td></td>
                    </tr> 
                        <tr>
                          <th scope="row"></th> 
                              <td></td>   
                              <td>Administración de Recursos Humanos</td>
                              <td><?=$colbachAtenciones2SubModulo1['atencionesPorSubModulo']?></td>
                        </tr>
                        <tr>
                          <th scope="row"></th> 
                              <td></td>   
                              <td>Informática</td>
                              <td><?=$colbachAtenciones2SubModulo2['atencionesPorSubModulo']?></td>
                        </tr>
                        <tr>
                          <th scope="row"></th> 
                              <td></td>   
                              <td>Contabilidad</td>
                              <td><?=$colbachAtenciones2SubModulo3['atencionesPorSubModulo']?></td>
                        </tr>    
                <tr>
                  <th scope="row">Preparatoria abierta (SEP)</th>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Nivel 1. Bases</td>
                          <td><?=$prepaAbiertaAtencionesModulo1['atencionesPorActividadModulo'] ?></td>
                          <td></td>
                    </tr>
                        <tr>
                          <th scope="row"></th> 
                              <td></td>   
                              <td>De la información al conocimiento</td>
                              <td><?=$prepaAbiertaAtenciones1SubModulo1['atencionesPorSubModulo']?></td>
                        </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Nivel 2. Instrumentos</td>
                          <td><?=$prepaAbiertaAtencionesModulo2['atencionesPorActividadModulo'] ?></td>
                          <td></td>
                    </tr>
                        <tr>
                          <th scope="row"></th> 
                              <td></td>   
                              <td>El lenguaje en la relación del hombre con el mundo</td>
                              <td><?=$prepaAbiertaAtenciones2SubModulo1['atencionesPorSubModulo']?></td>
                        </tr>
                        <tr>
                          <th scope="row"></th> 
                              <td></td>   
                              <td>Representaciones simbólicas y algoritmos</td>
                              <td><?=$prepaAbiertaAtenciones2SubModulo2['atencionesPorSubModulo']?></td>
                        </tr>
                        <tr>
                          <th scope="row"></th> 
                              <td></td>   
                              <td>Ser social y sociedad</td>
                              <td><?=$prepaAbiertaAtenciones2SubModulo3['atencionesPorSubModulo']?></td>
                        </tr>
                        <tr>
                          <th scope="row"></th> 
                              <td></td>   
                              <td>Mi mundo en otra lengua</td>
                              <td><?=$prepaAbiertaAtenciones2SubModulo4['atencionesPorSubModulo']?></td>
                        </tr>
                        <tr>
                          <th scope="row"></th> 
                              <td></td>   
                              <td>Tecnología de información y comunicación</td>
                              <td><?=$prepaAbiertaAtenciones2SubModulo5['atencionesPorSubModulo']?></td>
                        </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Nivel 3. Métodos y contextos</td>
                          <td><?=$prepaAbiertaAtencionesModulo3['atencionesPorActividadModulo'] ?></td>
                          <td></td>
                    </tr>
                       <tr>
                          <th scope="row"></th> 
                              <td></td>   
                              <td>Textos y visiones del mundo</td>
                              <td><?=$prepaAbiertaAtenciones3SubModulo1['atencionesPorSubModulo']?></td>
                        </tr>
                        <tr>
                          <th scope="row"></th> 
                              <td></td>   
                              <td>Matemáticas y representaciones del sistema natural</td>
                              <td><?=$prepaAbiertaAtenciones3SubModulo2['atencionesPorSubModulo']?></td>
                        </tr>
                        <tr>
                          <th scope="row"></th> 
                              <td></td>   
                              <td>Universo natural</td>
                              <td><?=$prepaAbiertaAtenciones3SubModulo3['atencionesPorSubModulo']?></td>
                        </tr>
                        <tr>
                          <th scope="row"></th> 
                              <td></td>   
                              <td>Sociedad mexicana contemporánea</td>
                              <td><?=$prepaAbiertaAtenciones3SubModulo4['atencionesPorSubModulo']?></td>
                        </tr>
                        <tr>
                          <th scope="row"></th> 
                              <td></td>   
                              <td>Transformaciones en el mundo contemporáneo</td>
                              <td><?=$prepaAbiertaAtenciones3SubModulo5['atencionesPorSubModulo']?></td>
                        </tr>
                        <tr>
                          <th scope="row"></th> 
                              <td></td>   
                              <td>Mi vida en otra lengua</td>
                              <td><?=$prepaAbiertaAtenciones3SubModulo6['atencionesPorSubModulo']?></td>
                        </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Nivel 4. Relacionesy cambios</td>
                          <td><?=$prepaAbiertaAtencionesModulo4['atencionesPorActividadModulo'] ?></td>
                          <td></td>
                    </tr>
                       <tr>
                          <th scope="row"></th> 
                              <td></td>   
                              <td>Argumentación</td>
                              <td><?=$prepaAbiertaAtenciones4SubModulo1['atencionesPorSubModulo']?></td>
                        </tr>
                        <tr>
                          <th scope="row"></th> 
                              <td></td>   
                              <td>Variación en procesos sociales</td>
                              <td><?=$prepaAbiertaAtenciones4SubModulo2['atencionesPorSubModulo']?></td>
                        </tr>
                        <tr>
                          <th scope="row"></th> 
                              <td></td>   
                              <td>Cálculo en fenómenos naturales y procesos sociales</td>
                              <td><?=$prepaAbiertaAtenciones4SubModulo3['atencionesPorSubModulo']?></td>
                        </tr>
                        <tr>
                          <th scope="row"></th> 
                              <td></td>   
                              <td>Hacia un desarrollo sustentable</td>
                              <td><?=$prepaAbiertaAtenciones4SubModulo4['atencionesPorSubModulo']?></td>
                        </tr>
                        <tr>
                          <th scope="row"></th> 
                              <td></td>   
                              <td>Evolución y sus repercusiones sociales</td>
                              <td><?=$prepaAbiertaAtenciones4SubModulo5['atencionesPorSubModulo']?></td>
                        </tr>
                        <tr>
                          <th scope="row"></th> 
                              <td></td>   
                              <td>Estadística en fenómenos naturales y procesos sociales</td>
                              <td><?=$prepaAbiertaAtenciones4SubModulo6['atencionesPorSubModulo']?></td>
                        </tr>
                        <tr>
                          <th scope="row"></th> 
                              <td></td>   
                              <td>Dinámica en la naturaleza: El movimiento</td>
                              <td><?=$prepaAbiertaAtenciones4SubModulo7['atencionesPorSubModulo']?></td>
                        </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Nivel 5. Efectos y propuestas</td>
                          <td><?=$prepaAbiertaAtencionesModulo5['atencionesPorActividadModulo'] ?></td>
                          <td></td>
                    </tr>       
                        <tr>
                          <th scope="row"></th> 
                              <td></td>   
                              <td>Optimización en sistemas naturales y sociales</td>
                              <td><?=$prepaAbiertaAtenciones5SubModulo1['atencionesPorSubModulo']?></td>
                        </tr>
                        <tr>
                          <th scope="row"></th> 
                              <td></td>   
                              <td>Impacto de la ciencia y la tecnología</td>
                              <td><?=$prepaAbiertaAtenciones5SubModulo2['atencionesPorSubModulo']?></td>
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
          <div class="mr-5"><b>Atenciones de usuarios con beca en Deporte </b></div>
        </div>
        <a class="card-footer text-white clearfix small z-1" data-toggle="collapse" href="#collapseDeporteAtenciones">
          <span class="float-left">Ver detalle</span>
          <span class="float-right">
            <i class="fas fa-angle-right"></i>
          </span>
        </a>
        <div class="collapse" id="collapseDeporteAtenciones">
          <div class="card card-body">
            <table class="table table-striped ">
              <tbody class="bg-success">
                
                <tr>
                  <th scope="row">Fútbol</th>
                  <td><?=$futbolAtenciones['atencionesPorActividad']?></td>
                </tr>
                <!-- <tr>
                  <th scope="row">Basquetbol</th>
                  <td><?=$basquetAtenciones['atencionesPorActividad']?></td>
                </tr> -->
                <tr>
                  <th scope="row">Voleibol</th>
                  <td><?=$voleyAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Acondicionamiento físico</th>
                  <td><?=$acondicionamientoAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Zumba</th>
                  <td><?=$zumbaAtenciones['atencionesPorActividad']?></td>
                </tr>
                <!-- <tr>
                  <th scope="row">Tae bo</th>
                  <td><?=$taeAtenciones['atencionesPorActividad']?></td>
                </tr> -->
                <tr>
                  <th scope="row">Yoga</th>
                  <td><?=$yogaAtenciones['atencionesPorActividad']?></td>
                </tr>
                <!-- <tr>
                  <th scope="row">Tai chi</th>
                  <td><?=$taiChiAtenciones['atencionesPorActividad']?></td>
                </tr> -->
                <tr>
                  <th scope="row">Ritmos Latinos</th>
                  <td><?=$ritmosLatinosAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Boxeo</th>
                  <td><?=$boxeoAtenciones['atencionesPorActividad']?></td>
                </tr>
                <!-- <tr>
                  <th scope="row">Atletismo</th>
                  <td><?=$atletismoAtenciones['atencionesPorActividad']?></td>
                </tr> -->
                <tr>
                  <th scope="row">Karate do</th>
                  <td><?=$karateAtenciones['atencionesPorActividad']?></td>
                </tr>
                <!-- <tr>
                  <th scope="row">Kung fu</th>
                  <td><?=$kungAtenciones['atencionesPorActividad']?></td>
                </tr> -->
                <tr>
                  <th scope="row">Taekwondo</th>
                  <td><?=$taekwondoAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Capoeira</th>
                  <td><?=$capoeiraAtenciones['atencionesPorActividad']?></td>
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
          <div class="mr-5"><b>Atenciones de usuarios con beca en Autonomía Económica </b></div>
        </div>
        <a class="card-footer text-white clearfix small z-1" data-toggle="collapse" href="#collapseAutonomiaAtenciones">
          <span class="float-left">Ver detalle</span>
          <span class="float-right">
            <i class="fas fa-angle-right"></i>
          </span>
        </a>
       <div class="collapse" id="collapseAutonomiaAtenciones">
          <div class="card card-body">
            <table class="table table-striped ">
              <tbody class="bg-danger">
               
                <tr>
                  <th scope="row">Serigrafía</th>
                  <td><?=$serigrafiaAtenciones['atencionesPorActividad']?></td>
                </tr>
                <!-- <tr>
                  <th scope="row">Reciclaje</th>
                  <td><?=$reciclajeAtenciones['atencionesPorActividad']?></td>
                </tr> -->
                <!-- <tr>
                  <th scope="row">Empaque y embalaje</th>
                  <td><?=$empaqueEmbalajeAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Sistema de distribución</th>
                  <td><?=$sistemaDistribucionAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Edición y Diseño </th>
                  <td><?=$edicionDiseñoAtenciones['atencionesPorActividad']?></td>
                </tr> -->
                <tr>
                  <th scope="row">Carpintería</th>
                  <td><?=$carpinteriaAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Plomería</th>
                  <td><?=$plomeriaAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Herrería</th>
                  <td><?=$herreriaAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Electricidad</th>
                  <td><?=$electricidadAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Gastronomía, panadería y banquetes</th>
                  <td><?=$gastronomiaAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Joyería y accesorios </th>
                  <td><?=$joyeriaAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Huertos urbanos</th>
                  <td><?=$agriculturaAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Diseño de imagen y Cosmetología orgánica</th>
                  <td><?=$diseñoImagenAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Codigo para mujeres</th>
                  <td><?=$codMujeresAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Electrónica y robótica</th>
                  <td><?=$electronicaAtenciones['atencionesPorActividad']?></td>
                </tr>
                <!-- <tr>
                  <th scope="row">Textiles y diseño</th>
                  <td><?=$textileDiseñoAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Fotografia de producto</th>
                  <td><?=$fotoProductoAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Logos e identidad de marca</th>
                  <td><?=$logosAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Calidad en el servicio</th>
                  <td><?=$calidadAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Creación de cooperativas</th>
                  <td><?=$cooperativasAtenciones['atencionesPorActividad']?></td>
                </tr> -->
                <tr>
                  <th scope="row">Emprendimiento</th>
                  <td><?=$emprendeAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Creación de micro-negocios</th>
                  <td><?=$microNAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Comercio digital</th>
                  <td><?=$comercioDigitalAtenciones['atencionesPorActividad']?></td>
                </tr>
                <!-- <tr>
                  <th scope="row">Estrategias de venta</th>
                  <td><?=$estrategiasAtenciones['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Comercio justo</th>
                  <td><?=$comercioJustoAtenciones['atencionesPorActividad']?></td>
                </tr> -->
                </tbody>
            </table>
         </div>
       </div>
      </div>
    </div>
  </div> 

  <!-- Atenciones de ususarios con beca por PILARES-->
  <div class="row">
    <div class="col-xl-6 col-sm-6 mb-3">
      <div class="card text-info bg-light o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
            <i class="fas fa-landmark"></i>
            </div>
            
            <div class="mr-5"><b>Atenciones de ususarios con beca por PILARES<span class="float-right"></span></b></div>
          </div>
          <a class="card-footer text-info clearfix small z-1" data-toggle="collapse" href="#collapsePorPilaresAtenciones">
            <span class="float-left">Ver detalle</span>
            <span class="float-right">
              <i class="fas fa-angle-right"></i>
            </span>
          </a>
          <div class="collapse" id="collapsePorPilaresAtenciones">
            <div class="card card-body">
              <table class="table table-striped ">
                <tbody class="bg-light">
                  <tr>
                    <th scope="row">La Araña </th>
                    <td><?=$pilaresTotalesAtenciones1['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">El Capulín</th>
                    <td><?=$pilaresTotalesAtenciones2['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Jalalpa </th>
                    <td><?=$pilaresTotalesAtenciones3['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Xalli</th>
                    <td><?=$pilaresTotalesAtenciones4['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Cantera</th>
                    <td><?=$pilaresTotalesAtenciones5['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Emiliano Zapata</th>
                    <td><?=$pilaresTotalesAtenciones6['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Chimalpa</th>
                    <td><?=$pilaresTotalesAtenciones7['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">San Simón Tolnáhuac </th>
                    <td><?=$pilaresTotalesAtenciones8['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Frida Kahlo </th>
                    <td><?=$pilaresTotalesAtenciones9['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Atlampa</th>
                    <td><?=$pilaresTotalesAtenciones10['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Richard Wagner </th>
                    <td><?=$pilaresTotalesAtenciones11['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Benita Galeana </th>
                    <td><?=$pilaresTotalesAtenciones12['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Tlalpexco</th>
                    <td><?=$pilaresTotalesAtenciones13['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">José Martí </th>
                    <td><?=$pilaresTotalesAtenciones14['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Agrícola Pantitlán </th>
                    <td><?=$pilaresTotalesAtenciones15['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Central de Abasto</th>
                    <td><?=$pilaresTotalesAtenciones16['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Cooperemos Pueblo </th>
                    <td><?=$pilaresTotalesAtenciones17['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Acahualtepec</th>
                    <td><?=$pilaresTotalesAtenciones18['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Gabriela Mistral </th>
                    <td><?=$pilaresTotalesAtenciones19['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Huayatla</th>
                    <td><?=$pilaresTotalesAtenciones20['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Caneguín</th>
                    <td><?=$pilaresTotalesAtenciones47['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">San Salvador Cuauhtenco</th>
                    <td><?=$pilaresTotalesAtenciones21['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Zapotitla</th>
                    <td><?=$pilaresTotalesAtenciones22['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Rosario Castellanos</th>
                    <td><?=$pilaresTotalesAtenciones23['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Tulyehualco</th>
                    <td><?=$pilaresTotalesAtenciones24['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">San Francisco </th>
                    <td><?=$pilaresTotalesAtenciones25['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Belén de las flores</th>
                    <td><?=$pilaresTotalesAtenciones26['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Margarita Maza de Juárez </th>
                    <td><?=$pilaresTotalesAtenciones27['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Atlapulco </th>
                    <td><?=$pilaresTotalesAtenciones28['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Santa Cecilia </th>
                    <td><?=$pilaresTotalesAtenciones29['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Tepalcatlalpan</th>
                    <td><?=$pilaresTotalesAtenciones30['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Cerro de la estrella </th>
                    <td><?=$pilaresTotalesAtenciones31['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Facundo Cabral</th>
                    <td><?=$pilaresTotalesAtenciones32['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">San lucas xochimanca </th>
                    <td><?=$pilaresTotalesAtenciones33['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Zapata Vela </th>
                    <td><?=$pilaresTotalesAtenciones34['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Insurgentes</th>
                    <td><?=$pilaresTotalesAtenciones35['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Amantla</th>
                    <td><?=$pilaresTotalesAtenciones36['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">La Cuesta </th>
                    <td><?=$pilaresTotalesAtenciones37['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Tizimín</th>
                    <td><?=$pilaresTotalesAtenciones38['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Ecoguardas</th>
                    <td><?=$pilaresTotalesAtenciones39['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Árbol del conocimiento</th>
                    <td><?=$pilaresTotalesAtenciones40['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Santa Fe</th>
                    <td><?=$pilaresTotalesAtenciones41['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">La Era</th>
                    <td><?=$pilaresTotalesAtenciones42['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Isidro Fabela</th>
                    <td><?=$pilaresTotalesAtenciones43['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Villa Panamericana</th>
                    <td><?=$pilaresTotalesAtenciones44['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Santa Úrsula</th>
                    <td><?=$pilaresTotalesAtenciones45['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Paulo Freire</th>
                    <td><?=$pilaresTotalesAtenciones46['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">San Pedro Xalpa</th>
                    <td><?=$pilaresTotalesAtenciones48['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Xaltipac</th>
                    <td><?=$pilaresTotalesAtenciones50['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Palmitas</th>
                    <td><?=$pilaresTotalesAtenciones51['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Teotongo</th>
                    <td><?=$pilaresTotalesAtenciones52['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Insurgentes</th>
                    <td><?=$pilaresTotalesAtenciones53['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">La Fortaleza</th>
                    <td><?=$pilaresTotalesAtenciones54['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Rojo Gómez</th>
                    <td><?=$pilaresTotalesAtenciones55['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Municipio Libre</th>
                    <td><?=$pilaresTotalesAtenciones56['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">San Pedro Actopan</th>
                    <td><?=$pilaresTotalesAtenciones57['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">San Bartolomé Xicomulco</th>
                    <td><?=$pilaresTotalesAtenciones58['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Centenario</th>
                    <td><?=$pilaresTotalesAtenciones59['userPorPilares']?></td>
                  </tr>
                  <tr>
                      <th scope="row">16 de Septiembre</th>
                          <td><?=$pilaresTotalesAtenciones60['userPorPilares']?></td>
                  </tr>
                  <tr>
                      <th scope="row">La Naranja</th>
                      <td><?=$pilaresTotalesAtenciones61['userPorPilares']?></td>
                  </tr>
                  <tr>
                      <th scope="row">Xochinahuac</th>
                       <td><?=$pilaresTotalesAtenciones62['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Renovación</th>
                    <td><?=$pilaresTotalesAtenciones63['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Mixquic</th>
                    <td><?=$pilaresTotalesAtenciones64['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Presidentes</th>
                    <td><?=$pilaresTotalesAtenciones65['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Santa Lucía</th>
                    <td><?=$pilaresTotalesAtenciones66['userPorPilares']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Tetecón</th>
                    <td><?=$pilaresTotalesAtenciones67['userPorPilares']?></td>
                  </tr>    
                </tbody>
              </table>
            </div>
          </div>
        </div>
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