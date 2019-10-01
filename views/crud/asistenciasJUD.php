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
    * uSUARIOS por actividad Ciberescuelas
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

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109'";
    $totalesBadi = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $badi = mysqli_fetch_array($totalesBadi);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '110'";
    $totalesPrepaSep = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $prepaSep = mysqli_fetch_array($totalesPrepaSep);

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
$sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '2'";
$userPorActividad2 = mysqli_query($con, $sql);
//var_dump($userPorActividad2);
$actividadAtenciones2 = mysqli_fetch_array($userPorActividad2);

$sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '3'";
$userPorActividad3 = mysqli_query($con, $sql);
//var_dump($userPorActividad3);
$actividadAtenciones3 = mysqli_fetch_array($userPorActividad3);

$sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '7'";
$userPorActividad4 = mysqli_query($con, $sql);
//var_dump($userPorActividad4);
$actividadAtenciones4 = mysqli_fetch_array($userPorActividad4);

$sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '9'";
$userPorActividad5 = mysqli_query($con, $sql);
//var_dump($userPorActividad5);
$actividadAtenciones5 = mysqli_fetch_array($userPorActividad5);

$sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '17'";
$userPorActividad6 = mysqli_query($con, $sql);
//var_dump($userPorActividad6);
$actividadAtenciones6 = mysqli_fetch_array($userPorActividad6);

$sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '19'";
$userPorActividad7 = mysqli_query($con, $sql);
//var_dump($userPorActividad7);
$actividadAtenciones7 = mysqli_fetch_array($userPorActividad7);

$sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '20'";
$userPorActividad8 = mysqli_query($con, $sql);
//var_dump($userPorActividad8);
$actividadAtenciones8 = mysqli_fetch_array($userPorActividad8);

$sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '21'";
$userPorActividad9 = mysqli_query($con, $sql);
//var_dump($userPorActividad9);
$actividadAtenciones9 = mysqli_fetch_array($userPorActividad9);

$sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '24'";
$userPorActividad10 = mysqli_query($con, $sql);
//var_dump($userPorActividad10);
$actividadAtenciones10 = mysqli_fetch_array($userPorActividad10);

$sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '25'";
$userPorActividad11 = mysqli_query($con, $sql);
//var_dump($userPorActividad11);
$actividadAtenciones11 = mysqli_fetch_array($userPorActividad11);

$sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '33'";
$userPorActividad12 = mysqli_query($con, $sql);
//var_dump($userPorActividad12);
$actividadAtenciones12 = mysqli_fetch_array($userPorActividad12);

$sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '35'";
$userPorActividad13 = mysqli_query($con, $sql);
//var_dump($userPorActividad13);
$actividadAtenciones13 = mysqli_fetch_array($userPorActividad13);

$sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '37'";
$userPorActividad14 = mysqli_query($con, $sql);
//var_dump($userPorActividad14);
$actividadAtenciones14 = mysqli_fetch_array($userPorActividad14);

$sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '38'";
$userPorActividad15 = mysqli_query($con, $sql);
//var_dump($userPorActividad15);
$actividadAtenciones15 = mysqli_fetch_array($userPorActividad15);

$sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '39'";
$userPorActividad16 = mysqli_query($con, $sql);
//var_dump($userPorActividad16);
$actividadAtenciones16 = mysqli_fetch_array($userPorActividad16);

$sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '40'";
$userPorActividad17 = mysqli_query($con, $sql);
//var_dump($userPorActividad17);
$actividadAtenciones17 = mysqli_fetch_array($userPorActividad17);

$sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '41'";
$userPorActividad18 = mysqli_query($con, $sql);
//var_dump($userPorActividad18);
$actividadAtenciones18 = mysqli_fetch_array($userPorActividad18);

$sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '43'";
$userPorActividad19 = mysqli_query($con, $sql);
//var_dump($userPorActividad19);
$actividadAtenciones19 = mysqli_fetch_array($userPorActividad19);

$sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '44'";
$userPorActividad20 = mysqli_query($con, $sql);
//var_dump($userPorActividad20);
$actividadAtenciones20 = mysqli_fetch_array($userPorActividad20);

$sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '47'";
$userPorActividad21 = mysqli_query($con, $sql);
//var_dump($userPorActividad21);
$actividadAtenciones21 = mysqli_fetch_array($userPorActividad21);

$sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '49'";
$userPorActividad22 = mysqli_query($con, $sql);
//var_dump($userPorActividad22);
$actividadAtenciones22 = mysqli_fetch_array($userPorActividad22);

$sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '52'";
$userPorActividad23 = mysqli_query($con, $sql);
//var_dump($userPorActividad23);
$actividadAtenciones23 = mysqli_fetch_array($userPorActividad23);

$sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '58'";
$userPorActividad24 = mysqli_query($con, $sql);
//var_dump($userPorActividad24);
$actividadAtenciones24 = mysqli_fetch_array($userPorActividad24);

$sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '59'";
$userPorActividad25 = mysqli_query($con, $sql);
//var_dump($userPorActividad25);
$actividadAtenciones25 = mysqli_fetch_array($userPorActividad25);

$sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '60'";
$userPorActividad26 = mysqli_query($con, $sql);
//var_dump($userPorActividad26);
$actividadAtenciones26 = mysqli_fetch_array($userPorActividad26);

$sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '70'";
$userPorActividad27 = mysqli_query($con, $sql);
//var_dump($userPorActividad27);
$actividadAtenciones27 = mysqli_fetch_array($userPorActividad27);

$sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '72'";
$userPorActividad28 = mysqli_query($con, $sql);
//var_dump($userPorActividad28);
$actividadAtenciones28 = mysqli_fetch_array($userPorActividad28);

$sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '74'";
$userPorActividad29 = mysqli_query($con, $sql);
//var_dump($userPorActividad29);
$actividadAtenciones29 = mysqli_fetch_array($userPorActividad29);

$sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '75'";
$userPorActividad30 = mysqli_query($con, $sql);
//var_dump($userPorActividad30);
$actividadAtenciones30 = mysqli_fetch_array($userPorActividad30);

$sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '77'";
$userPorActividad31 = mysqli_query($con, $sql);
//var_dump($userPorActividad31);
$actividadAtenciones31 = mysqli_fetch_array($userPorActividad31);

$sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '78'";
$userPorActividad32 = mysqli_query($con, $sql);
//var_dump($userPorActividad32);
$actividadAtenciones32 = mysqli_fetch_array($userPorActividad32);

$sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '83'";
$userPorActividad33 = mysqli_query($con, $sql);
//var_dump($userPorActividad33);
$actividadAtenciones33 = mysqli_fetch_array($userPorActividad33);

$sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '84'";
$userPorActividad34 = mysqli_query($con, $sql);
//var_dump($userPorActividad34);
$actividadAtenciones34 = mysqli_fetch_array($userPorActividad34);

$sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '86'";
$userPorActividad35 = mysqli_query($con, $sql);
//var_dump($userPorActividad35);
$actividadAtenciones35 = mysqli_fetch_array($userPorActividad35);

$sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '89'";
$userPorActividad36 = mysqli_query($con, $sql);
//var_dump($userPorActividad36);
$actividadAtenciones36 = mysqli_fetch_array($userPorActividad36);

$sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '90'";
$userPorActividad37 = mysqli_query($con, $sql);
//var_dump($userPorActividad37);
$actividadAtenciones37 = mysqli_fetch_array($userPorActividad37);

$sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '91'";
$userPorActividad38 = mysqli_query($con, $sql);
//var_dump($userPorActividad38);
$actividadAtenciones38 = mysqli_fetch_array($userPorActividad38);

$sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '92'";
$userPorActividad39 = mysqli_query($con, $sql);
//var_dump($userPorActividad39);
$actividadAtenciones39 = mysqli_fetch_array($userPorActividad39);

$sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '94'";
$userPorActividad40 = mysqli_query($con, $sql);
//var_dump($userPorActividad40);
$actividadAtenciones40 = mysqli_fetch_array($userPorActividad40);

$sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '96'";
$userPorActividad41 = mysqli_query($con, $sql);
//var_dump($userPorActividad41);
$actividadAtenciones41 = mysqli_fetch_array($userPorActividad41);

$sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '98'";
$userPorActividad42 = mysqli_query($con, $sql);
//var_dump($userPorActividad42);
$actividadAtenciones42 = mysqli_fetch_array($userPorActividad42);

$sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '100'";
$userPorActividad43 = mysqli_query($con, $sql);
//var_dump($userPorActividad43);
$actividadAtenciones43 = mysqli_fetch_array($userPorActividad43);

$sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '102'";
$userPorActividad44 = mysqli_query($con, $sql);
//var_dump($userPorActividad44);
$actividadAtenciones44 = mysqli_fetch_array($userPorActividad44);

$sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '103'";
$userPorActividad45 = mysqli_query($con, $sql);
//var_dump($userPorActividad45);
$actividadAtenciones45 = mysqli_fetch_array($userPorActividad45);

$sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '107'";
$userPorActividad46 = mysqli_query($con, $sql);
//var_dump($userPorActividad46);
$actividadAtenciones46 = mysqli_fetch_array($userPorActividad46);

$sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109'";
$userPorActividad47 = mysqli_query($con, $sql);
//var_dump($userPorActividad47);
$actividadAtenciones47 = mysqli_fetch_array($userPorActividad47);

$sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '110'";
$userPorActividad48 = mysqli_query($con, $sql);
//var_dump($userPorActividad48);
$actividadAtenciones48 = mysqli_fetch_array($userPorActividad48);

$sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '112'";
$userPorActividad49 = mysqli_query($con, $sql);
//var_dump($userPorActividad49);
$actividadAtenciones49 = mysqli_fetch_array($userPorActividad49);

$sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '113'";
$userPorActividad50 = mysqli_query($con, $sql);
//var_dump($userPorActividad50);
$actividadAtenciones50 = mysqli_fetch_array($userPorActividad50);

$sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '115'";
$userPorActividad51 = mysqli_query($con, $sql);
//var_dump($userPorActividad51);
$actividadAtenciones51 = mysqli_fetch_array($userPorActividad51);

$sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '120'";
$userPorActividad52 = mysqli_query($con, $sql);
//var_dump($userPorActividad52);
$actividadAtenciones52 = mysqli_fetch_array($userPorActividad52);

$sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '123'";
$userPorActividad53 = mysqli_query($con, $sql);
//var_dump($userPorActividad53);
$actividadAtenciones53 = mysqli_fetch_array($userPorActividad53);

$sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '124'";
$userPorActividad54 = mysqli_query($con, $sql);
//var_dump($userPorActividad54);
$actividadAtenciones54 = mysqli_fetch_array($userPorActividad54);

$sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '125'";
$userPorActividad55 = mysqli_query($con, $sql);
//var_dump($userPorActividad55);
$actividadAtenciones55 = mysqli_fetch_array($userPorActividad55);

$sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '126'";
$userPorActividad56 = mysqli_query($con, $sql);
//var_dump($userPorActividad56);
$actividadAtenciones56 = mysqli_fetch_array($userPorActividad56);

$sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '128'";
$userPorActividad57 = mysqli_query($con, $sql);
//var_dump($userPorActividad57);
$actividadAtenciones57 = mysqli_fetch_array($userPorActividad57);

$sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '129'";
$userPorActividad58 = mysqli_query($con, $sql);
//var_dump($userPorActividad58);
$actividadAtenciones58 = mysqli_fetch_array($userPorActividad58);

$sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '130'";
$userPorActividad59 = mysqli_query($con, $sql);
//var_dump($userPorActividad59);
$actividadAtenciones59 = mysqli_fetch_array($userPorActividad59);

$sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '132'";
$userPorActividad60 = mysqli_query($con, $sql);
//var_dump($userPorActividad60);
$actividadAtenciones60 = mysqli_fetch_array($userPorActividad60);

$sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '135'";
$userPorActividad61 = mysqli_query($con, $sql);
//var_dump($userPorActividad61);
$actividadAtenciones61 = mysqli_fetch_array($userPorActividad61);

$sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '138'";
$userPorActividad62 = mysqli_query($con, $sql);
//var_dump($userPorActividad62);
$actividadAtenciones62 = mysqli_fetch_array($userPorActividad62);

$sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '148'";
$userPorActividad63 = mysqli_query($con, $sql);
//var_dump($userPorActividad63);
$actividadAtenciones63 = mysqli_fetch_array($userPorActividad63);

$sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '153'";
$userPorActividad64 = mysqli_query($con, $sql);
//var_dump($userPorActividad64);
$actividadAtenciones64 = mysqli_fetch_array($userPorActividad64);

$sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '154'";
$userPorActividad65 = mysqli_query($con, $sql);
//var_dump($userPorActividad65);
$actividadAtenciones65 = mysqli_fetch_array($userPorActividad65);

$sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '156'";
$userPorActividad66 = mysqli_query($con, $sql);
//var_dump($userPorActividad66);
$actividadAtenciones66 = mysqli_fetch_array($userPorActividad66);

$sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '162'";
$userPorActividad67 = mysqli_query($con, $sql);
//var_dump($userPorActividad67);
$actividadAtenciones67 = mysqli_fetch_array($userPorActividad67);

$sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '163'";
$userPorActividad68 = mysqli_query($con, $sql);
//var_dump($userPorActividad68);
$actividadAtenciones68 = mysqli_fetch_array($userPorActividad68);

$sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '181'";
$userPorActividad69 = mysqli_query($con, $sql);
//var_dump($userPorActividad69);
$actividadAtenciones69 = mysqli_fetch_array($userPorActividad69);

$sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '182'";
$userPorActividad70 = mysqli_query($con, $sql);
//var_dump($userPorActividad70);
$actividadAtenciones70 = mysqli_fetch_array($userPorActividad70);

$sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '192'";
$userPorActividad71 = mysqli_query($con, $sql);
//var_dump($userPorActividad71);
$actividadAtenciones71 = mysqli_fetch_array($userPorActividad71);

$sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '193'";
$userPorActividad72 = mysqli_query($con, $sql);
//var_dump($userPorActividad72);
$actividadAtenciones72 = mysqli_fetch_array($userPorActividad72);

$sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '195'";
$userPorActividad73 = mysqli_query($con, $sql);
//var_dump($userPorActividad73);
$actividadAtenciones73 = mysqli_fetch_array($userPorActividad73);

$sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '196'";
$userPorActividad74 = mysqli_query($con, $sql);
//var_dump($userPorActividad74);
$actividadAtenciones74 = mysqli_fetch_array($userPorActividad74);

$sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '197'";
$userPorActividad75 = mysqli_query($con, $sql);
//var_dump($userPorActividad75);
$actividadAtenciones75 = mysqli_fetch_array($userPorActividad75);

$sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '198'";
$userPorActividad76 = mysqli_query($con, $sql);
//var_dump($userPorActividad76);
$actividadAtenciones76 = mysqli_fetch_array($userPorActividad76);

$sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '199'";
$userPorActividad77 = mysqli_query($con, $sql);
//var_dump($userPorActividad77);
$actividadAtenciones77 = mysqli_fetch_array($userPorActividad77);

$sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '200'";
$userPorActividad78 = mysqli_query($con, $sql);
//var_dump($userPorActividad78);
$actividadAtenciones78 = mysqli_fetch_array($userPorActividad78);

$sql="SELECT count(*) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '203'";
$userPorActividad79 = mysqli_query($con, $sql);
//var_dump($userPorActividad79);
$actividadAtenciones79 = mysqli_fetch_array($userPorActividad79);

   
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
  <!-- <div class="row">
    <div class="col-xl-6 col-sm-6 mb-3">
      <div class="card text-info bg-light o-hidden h-100">
        <div class="card-body">
          <div class="card-body-icon">
            <i class="fas fa-fw fa-list"></i>
          </div>
          <div class="mr-5"><b>Usuarios con beca por Actividad </b></div>
        </div>
        <a class="card-footer text-info clearfix small z-1" data-toggle="collapse" href="#collapseCiberescuelas">
          <span class="float-left">Ver detalle</span>
          <span class="float-right">
            <i class="fas fa-angle-right"></i>
          </span>
        </a>
        <div class="collapse" id="collapseCiberescuelas">
          <div class="card card-body">
            <table class="table table-striped ">
              <tbody class="bg-light">
              
                <tr>
                  <th scope="row">Danza</th>
                  <td><?=$actividad2['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Ballet</th>
                  <td><?=$actividad3['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Reciclaje</th>
                  <td><?=$actividad4['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Fotografía</th>
                  <td><?=$actividad5['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Fútbol</th>
                  <td><?=$actividad6['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Voleibol</th>
                  <td><?=$actividad7['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Acondicionamiento físico</th>
                  <td><?=$actividad8['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Ajedrez</th>
                  <td><?=$actividad9['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Club de Ciencias </th>
                  <td><?=$actividad10['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Robótica aplicada</th>
                  <td><?=$actividad11['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Sembrando autoestima</th>
                  <td><?=$actividad12['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Inteligencia emocional y habilidades para la vida</th>
                  <td><?=$actividad13['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Carpintería</th>
                  <td><?=$actividad14['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Plomería</th>
                  <td><?=$actividad15['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Herrería</th>
                  <td><?=$actividad16['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Electricidad</th>
                  <td><?=$actividad17['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Gastronomía, panadería y banquetes </th>
                  <td><?=$actividad18['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Joyería y accesorio </th>
                  <td><?=$actividad19['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Huertos Urbanos </th>
                  <td><?=$actividad20['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Diseño de Imagen y cosmetología </th>
                  <td><?=$actividad21['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Electrónica</th>
                  <td><?=$actividad22['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Diseño y textiles </th>
                  <td><?=$actividad23['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Emprendimiento</th>
                  <td><?=$actividad24['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Creación de micro-n </th>
                  <td><?=$actividad25['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Comercio digital</th>
                  <td><?=$actividad26['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Danza folklórica </th>
                  <td><?=$actividad27['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Teatro de calle</th>
                  <td><?=$actividad28['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Danza polinesia </th>
                  <td><?=$actividad29['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Teatro de máscaras</th>
                  <td><?=$actividad30['userPorActividad']?></td>
                </tr>
               
                <tr>
                  <th scope="row">Telar de cintura </th>
                  <td><?=$actividad31['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Cartonería</th>
                  <td><?=$actividad32['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Escritura creativa</th>
                  <td><?=$actividad33['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Pintura artística </th>
                  <td><?=$actividad34['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Cine</th>
                  <td><?=$actividad35['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Guitarra clásica </th>
                  <td><?=$actividad36['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Música Rap  </th>
                  <td><?=$actividad37['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Percusiones</th>
                  <td><?=$actividad38['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Iniciación a la música</th>
                  <td><?=$actividad39['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Zumba</th>
                  <td><?=$actividad40['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Yoga</th>
                  <td><?=$actividad41['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Boxeo</th>
                  <td><?=$actividad42['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Karate do </th>
                  <td><?=$actividad43['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Club de letras y expresión</th>
                  <td><?=$actividad44['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Talleres de cómputo</th>
                  <td><?=$actividad45['userPorActividad']?></td>
                </tr>
                 <tr>
                  <th scope="row">Primaria</th>
                  <td><?=$actividad46['userPorActividad']?></td>
                </tr> 
                <tr>
                  <th scope="row">BADI</th>
                  <td><?=$actividad47['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Prepa en línea SEP </th>
                  <td><?=$actividad48['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">COLBACH</th>
                  <td><?=$actividad49['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Prepa abierta</th>
                  <td><?=$actividad50['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">UnADM</th>
                  <td><?=$actividad51['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Asesorias bachillerato </th>
                  <td><?=$actividad52['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Dibujo y grabado </th>
                  <td><?=$actividad53['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Club de Braille</th>
                  <td><?=$actividad54['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Computación con tecnologías de asistencia</th>
                  <td><?=$actividad55['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Club de lengua de señas Mexicana </th>
                  <td><?=$actividad56['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Arte y creatividad </th>
                  <td><?=$actividad57['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Ritmos latinos </th>
                  <td><?=$actividad58['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Taekwondo</th>
                  <td><?=$actividad59['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Modelado con plastilina</th>
                  <td><?=$actividad60['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Fotografía digital </th>
                  <td><?=$actividad61['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Libro Club </th>
                  <td><?=$actividad62['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Medio ambiente</th>
                  <td><?=$actividad63['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Serigrafía</th>
                  <td><?=$actividad64['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Radio, Audio y Video </th>
                  <td><?=$actividad65['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Club de Inclusión y sensibilización sensorial </th>
                  <td><?=$actividad66['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Cursos para el aprendizaje de la lengua náhuatl </th>
                  <td><?=$actividad67['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Identidad y cultura de los pueblos indígenas </th>
                  <td><?=$actividad68['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Autosanarte</th>
                  <td><?=$actividad69['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Danzante mente </th>
                  <td><?=$actividad70['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Desnormalización de violencia de género </th>
                  <td><?=$actividad71['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Desnormalización de violencia  contra mujeres </th>
                  <td><?=$actividad72['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Desnormalización de violencia familiar </th>
                  <td><?=$actividad73['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Desnormalización de violencia entre pares </th>
                  <td><?=$actividad74['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Desnormalización de violencia hacia adultos m</th>
                  <td><?=$actividad75['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Desnormalización de violencia en la comunidad </th>
                  <td><?=$actividad76['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Desnormalización de violencia contra animales</th>
                  <td><?=$actividad77['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Desnormalización de acoso escolar</th>
                  <td><?=$actividad78['userPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">capoeira</th>
                  <td><?=$actividad79['userPorActividad']?></td>
                </tr>
              </tbody>
            </table>
         </div>
       </div>
       </div>
    </div>
  </div> -->
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
          <div class="mr-5"><b>Usuarios inscritos en Ciberescuelas</b></div>
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
  </div>
<!-- Usuarios inscritos por PILARES-->
   <!-- <div class="row">
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

  </div> -->

<!-- Usuarios por Actividades Cards-->
  <!--<div class="row">
    <div class="col-xl-6 col-sm-6 mb-3">
      <div class="card text-white bg-primary o-hidden h-100">
        <div class="card-body">
          <div class="card-body-icon">
            <i class="fas fa-fw fa-music"></i>
          </div>
          
          <div class="mr-5"><b>Usuarios inscritos en Cultura </b></div>
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
            
            <div class="mr-5"><b>Atenciones por Genero <span class="float-right"></span></b></div>
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
  <div class="row">
    <div class="col-xl-6 col-sm-6 mb-3">
      <div class="card text-info bg-light o-hidden h-100">
        <div class="card-body">
          <div class="card-body-icon">
            <i class="fas fa-fw fa-list"></i>
          </div>
          <div class="mr-5"><b>Atenciones de usuarios con beca por Actividad </b></div>
        </div>
        <a class="card-footer text-info clearfix small z-1" data-toggle="collapse" href="#collapseActividadesPorAtencion">
          <span class="float-left">Ver detalle</span>
          <span class="float-right">
            <i class="fas fa-angle-right"></i>
          </span>
        </a>
        <div class="collapse" id="collapseActividadesPorAtencion">
          <div class="card card-body">
            <table class="table table-striped ">
              <tbody class="bg-light">
              
                <tr>
                  <th scope="row">Danza</th>
                  <td><?=$actividadAtenciones2['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Ballet</th>
                  <td><?=$actividadAtenciones3['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Reciclaje</th>
                  <td><?=$actividadAtenciones4['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Fotografía</th>
                  <td><?=$actividadAtenciones5['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Fútbol</th>
                  <td><?=$actividadAtenciones6['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Voleibol</th>
                  <td><?=$actividadAtenciones7['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Acondicionamiento físico</th>
                  <td><?=$actividadAtenciones8['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Ajedrez</th>
                  <td><?=$actividadAtenciones9['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Club de Ciencias </th>
                  <td><?=$actividadAtenciones10['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Robótica aplicada</th>
                  <td><?=$actividadAtenciones11['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Sembrando autoestima</th>
                  <td><?=$actividadAtenciones12['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Inteligencia emocional y habilidades para la vida</th>
                  <td><?=$actividadAtenciones13['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Carpintería</th>
                  <td><?=$actividadAtenciones14['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Plomería</th>
                  <td><?=$actividadAtenciones15['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Herrería</th>
                  <td><?=$actividadAtenciones16['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Electricidad</th>
                  <td><?=$actividadAtenciones17['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Gastronomía, panadería y banquetes </th>
                  <td><?=$actividadAtenciones18['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Joyería y accesorio </th>
                  <td><?=$actividadAtenciones19['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Huertos Urbanos </th>
                  <td><?=$actividadAtenciones20['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Diseño de Imagen y cosmetología </th>
                  <td><?=$actividadAtenciones21['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Electrónica</th>
                  <td><?=$actividadAtenciones22['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Diseño y textiles </th>
                  <td><?=$actividadAtenciones23['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Emprendimiento</th>
                  <td><?=$actividadAtenciones24['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Creación de micro-n </th>
                  <td><?=$actividadAtenciones25['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Comercio digital</th>
                  <td><?=$actividadAtenciones26['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Danza folklórica </th>
                  <td><?=$actividadAtenciones27['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Teatro de calle</th>
                  <td><?=$actividadAtenciones28['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Danza polinesia </th>
                  <td><?=$actividadAtenciones29['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Teatro de máscaras</th>
                  <td><?=$actividadAtenciones30['atencionesPorActividad']?></td>
                </tr>
               
                <tr>
                  <th scope="row">Telar de cintura </th>
                  <td><?=$actividadAtenciones31['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Cartonería</th>
                  <td><?=$actividadAtenciones32['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Escritura creativa</th>
                  <td><?=$actividadAtenciones33['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Pintura artística </th>
                  <td><?=$actividadAtenciones34['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Cine</th>
                  <td><?=$actividadAtenciones35['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Guitarra clásica </th>
                  <td><?=$actividadAtenciones36['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Música Rap  </th>
                  <td><?=$actividadAtenciones37['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Percusiones</th>
                  <td><?=$actividadAtenciones38['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Iniciación a la música</th>
                  <td><?=$actividadAtenciones39['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Zumba</th>
                  <td><?=$actividadAtenciones40['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Yoga</th>
                  <td><?=$actividadAtenciones41['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Boxeo</th>
                  <td><?=$actividadAtenciones42['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Karate do </th>
                  <td><?=$actividadAtenciones43['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Club de letras y expresión</th>
                  <td><?=$actividadAtenciones44['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Talleres de cómputo</th>
                  <td><?=$actividadAtenciones45['atencionesPorActividad']?></td>
                </tr>
                <!-- <tr>
                  <th scope="row">Primaria</th>
                  <td><?=$actividadAtenciones46['atencionesPorActividad']?></td>
                </tr> -->
                <tr>
                  <th scope="row">BADI</th>
                  <td><?=$actividadAtenciones47['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Prepa en línea SEP </th>
                  <td><?=$actividadAtenciones48['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">COLBACH</th>
                  <td><?=$actividadAtenciones49['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Prepa abierta</th>
                  <td><?=$actividadAtenciones50['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">UnADM</th>
                  <td><?=$actividadAtenciones51['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Asesorias bachillerato </th>
                  <td><?=$actividadAtenciones52['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Dibujo y grabado </th>
                  <td><?=$actividadAtenciones53['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Club de Braille</th>
                  <td><?=$actividadAtenciones54['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Computación con tecnologías de asistencia</th>
                  <td><?=$actividadAtenciones55['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Club de lengua de señas Mexicana </th>
                  <td><?=$actividadAtenciones56['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Arte y creatividad </th>
                  <td><?=$actividadAtenciones57['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Ritmos latinos </th>
                  <td><?=$actividadAtenciones58['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Taekwondo</th>
                  <td><?=$actividadAtenciones59['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Modelado con plastilina</th>
                  <td><?=$actividadAtenciones60['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Fotografía digital </th>
                  <td><?=$actividadAtenciones61['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Libro Club </th>
                  <td><?=$actividadAtenciones62['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Medio ambiente</th>
                  <td><?=$actividadAtenciones63['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Serigrafía</th>
                  <td><?=$actividadAtenciones64['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Radio, Audio y Video </th>
                  <td><?=$actividadAtenciones65['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Club de Inclusión y sensibilización sensorial </th>
                  <td><?=$actividadAtenciones66['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Cursos para el aprendizaje de la lengua náhuatl </th>
                  <td><?=$actividadAtenciones67['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Identidad y cultura de los pueblos indígenas </th>
                  <td><?=$actividadAtenciones68['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Autosanarte</th>
                  <td><?=$actividadAtenciones69['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Danzante mente </th>
                  <td><?=$actividadAtenciones70['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Desnormalización de violencia de género </th>
                  <td><?=$actividadAtenciones71['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Desnormalización de violencia  contra mujeres </th>
                  <td><?=$actividadAtenciones72['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Desnormalización de violencia familiar </th>
                  <td><?=$actividadAtenciones73['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Desnormalización de violencia entre pares </th>
                  <td><?=$actividadAtenciones74['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Desnormalización de violencia hacia adultos m</th>
                  <td><?=$actividadAtenciones75['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Desnormalización de violencia en la comunidad </th>
                  <td><?=$actividadAtenciones76['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Desnormalización de violencia contra animales</th>
                  <td><?=$actividadAtenciones77['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Desnormalización de acoso escolar</th>
                  <td><?=$actividadAtenciones78['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">capoeira</th>
                  <td><?=$actividadAtenciones79['atencionesPorActividad']?></td>
                </tr>
              </tbody>
            </table>
         </div>
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