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

    $sql="SELECT count(DISTINCT A1.Usuario_idUsuarios) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A2.Actividades_idActividades = '109'";
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
    $sql="SELECT count(DISTINCT A1.Usuario_idUsuarios) AS userPorModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '10'";
    $totalesBadiModulo1 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $badiModulo1 = mysqli_fetch_array($totalesBadiModulo1);

        $sql="SELECT count(DISTINCT A1.Usuario_idUsuarios) AS userPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '10' AND A2.ActividadesSubModulo_idSubModulo = '145'";
        $totalesBadiSubModulo1 = mysqli_query($con, $sql);
        //var_dump($totalesCultura);
        $badiSubModulo1 = mysqli_fetch_array($totalesBadiSubModulo1);

        $sql="SELECT count(DISTINCT A1.Usuario_idUsuarios) AS userPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '10' AND A2.ActividadesSubModulo_idSubModulo = '146'";
        $totalesBadiSubModulo2 = mysqli_query($con, $sql);
        //var_dump($totalesCultura);
        $badiSubModulo2 = mysqli_fetch_array($totalesBadiSubModulo2);

        $sql="SELECT count(DISTINCT A1.Usuario_idUsuarios) AS userPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '10' AND A2.ActividadesSubModulo_idSubModulo = '147'";
        $totalesBadiSubModulo3 = mysqli_query($con, $sql);
        //var_dump($totalesCultura);
        $badiSubModulo3 = mysqli_fetch_array($totalesBadiSubModulo3);

        $sql="SELECT count(DISTINCT A1.Usuario_idUsuarios) AS userPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '10' AND A2.ActividadesSubModulo_idSubModulo = '148'";
        $totalesBadiSubModulo4 = mysqli_query($con, $sql);
        //var_dump($totalesCultura);
        $badiSubModulo4 = mysqli_fetch_array($totalesBadiSubModulo4);

        $sql="SELECT count(DISTINCT A1.Usuario_idUsuarios) AS userPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '10' AND A2.ActividadesSubModulo_idSubModulo = '149'";
        $totalesBadiSubModulo5 = mysqli_query($con, $sql);
        //var_dump($totalesCultura);
        $badiSubModulo5 = mysqli_fetch_array($totalesBadiSubModulo5);

        $sql="SELECT count(DISTINCT A1.Usuario_idUsuarios) AS userPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '10' AND A2.ActividadesSubModulo_idSubModulo = '150'";
        $totalesBadiSubModulo6 = mysqli_query($con, $sql);
        //var_dump($totalesCultura);
        $badiSubModulo6 = mysqli_fetch_array($totalesBadiSubModulo6);

        $sql="SELECT count(DISTINCT A1.Usuario_idUsuarios) AS userPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '10' AND A2.ActividadesSubModulo_idSubModulo = '151'";
        $totalesBadiSubModulo7 = mysqli_query($con, $sql);
        //var_dump($totalesCultura);
        $badiSubModulo7 = mysqli_fetch_array($totalesBadiSubModulo7);
    
    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '11'";
    $totalesBadiModulo2 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $badiModulo2 = mysqli_fetch_array($totalesBadiModulo2);

        $sql="SELECT count(DISTINCT A1.Usuario_idUsuarios) AS userPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '11' AND A2.ActividadesSubModulo_idSubModulo = '152'";
        $totalesBadi2SubModulo1 = mysqli_query($con, $sql);
        //var_dump($totalesCultura);
        $badiSubModulo1 = mysqli_fetch_array($totalesBadi2SubModulo1);

        $sql="SELECT count(DISTINCT A1.Usuario_idUsuarios) AS userPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '11' AND A2.ActividadesSubModulo_idSubModulo = '153'";
        $totalesBadi2SubModulo2 = mysqli_query($con, $sql);
        //var_dump($totalesCultura);
        $badiSubModulo2 = mysqli_fetch_array($totalesBadi2SubModulo2);

        $sql="SELECT count(DISTINCT A1.Usuario_idUsuarios) AS userPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '11' AND A2.ActividadesSubModulo_idSubModulo = '154'";
        $totalesBadi2SubModulo3 = mysqli_query($con, $sql);
        //var_dump($totalesCultura);
        $badiSubModulo3 = mysqli_fetch_array($totalesBadi2SubModulo3);

        $sql="SELECT count(DISTINCT A1.Usuario_idUsuarios) AS userPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '11' AND A2.ActividadesSubModulo_idSubModulo = '155'";
        $totalesBadi2SubModulo4 = mysqli_query($con, $sql);
        //var_dump($totalesCultura);
        $badiSubModulo4 = mysqli_fetch_array($totalesBadi2SubModulo4);

        $sql="SELECT count(DISTINCT A1.Usuario_idUsuarios) AS userPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '11' AND A2.ActividadesSubModulo_idSubModulo = '156'";
        $totalesBadi2SubModulo5 = mysqli_query($con, $sql);
        //var_dump($totalesCultura);
        $badiSubModulo5 = mysqli_fetch_array($totalesBadi2SubModulo5);

        $sql="SELECT count(DISTINCT A1.Usuario_idUsuarios) AS userPorSubModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '11' AND A2.ActividadesSubModulo_idSubModulo = '157'";
        $totalesBadi2SubModulo6 = mysqli_query($con, $sql);
        //var_dump($totalesCultura);
        $badiSubModulo6 = mysqli_fetch_array($totalesBadi2SubModulo6);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '12'";
    $totalesBadiModulo3 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $badiModulo3 = mysqli_fetch_array($totalesBadiModulo3);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '13'";
    $totalesBadiModulo4 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $badiModulo4 = mysqli_fetch_array($totalesBadiModulo4);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorModulo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109' AND A2.ActividadesModulo_idModulo = '14'";
    $totalesBadiModulo5 = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $badiModulo5 = mysqli_fetch_array($totalesBadiModulo5);
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
                      <td>Semestre 3</td>
                      <td><?=$badiModulo3['userPorModulo'] ?></td>
                      <td></td>  
                </tr>
                <tr>
                  <th scope="row"></th>    
                      <td>Semestre 4</td>
                      <td><?=$badiModulo4['userPorModulo'] ?></td>
                      <td></td>  
                </tr>
                <tr>
                  <th scope="row"></th>    
                      <td>Asignaturas Optativas</td>
                      <td><?=$badiModulo5['userPorModulo'] ?></td>
                      <td></td>  
                </tr>
                <!-- <tr>
                  <th scope="row">Edición y Diseño</th>
                  <td><?=$edicionYdiseno['userPorActividad']?></td>
                </tr> -->
                <tr>
                  <th scope="row">Prepa en línea SEP</th>
                  <td></td>
                  <td></td>
                </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Propedéutico</td>
                          <td><?=$edicionYdiseno['userPorActividad'] ?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Tecnología de la información y comunicación</td>
                          <td><?=$edicionYdiseno['userPorActividad'] ?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>De la información al conocimiento</td>
                          <td><?=$edicionYdiseno['userPorActividad'] ?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>El lenguaje en la relación del hombre con el mundo</td>
                          <td><?=$edicionYdiseno['userPorActividad'] ?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>De la información al conocimiento</td>
                          <td><?=$edicionYdiseno['userPorActividad'] ?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>El lenguaje en la relación del hombre con el mundo</td>
                          <td><?=$edicionYdiseno['userPorActividad'] ?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Textos y visiones del mundo</td>
                          <td><?=$edicionYdiseno['userPorActividad'] ?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Argumentación</td>
                          <td><?=$edicionYdiseno['userPorActividad'] ?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Mi mundo en otra lengua</td>
                          <td><?=$edicionYdiseno['userPorActividad'] ?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Mi vida en otras lenguas</td>
                          <td><?=$edicionYdiseno['userPorActividad'] ?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Ser social y sociedad</td>
                          <td><?=$edicionYdiseno['userPorActividad'] ?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Sociedad mexicana contemporáneo</td>
                          <td><?=$edicionYdiseno['userPorActividad'] ?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Representación simbólicas y algoritmos</td>
                          <td><?=$edicionYdiseno['userPorActividad'] ?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Matemáticas y representaciones del sistema natural</td>
                          <td><?=$edicionYdiseno['userPorActividad'] ?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Variación en procesos sociales</td>
                          <td><?=$edicionYdiseno['userPorActividad'] ?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Universo natural</td>
                          <td><?=$edicionYdiseno['userPorActividad'] ?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Hacia un desarrollo sustentable</td>
                          <td><?=$edicionYdiseno['userPorActividad'] ?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Evolución y sus repercusiones sociales</td>
                          <td><?=$edicionYdiseno['userPorActividad'] ?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Estadística en fenómenos naturales y procesos sociales</td>
                          <td><?=$edicionYdiseno['userPorActividad'] ?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Cálculo en fenómenos naturales y procesos sociales</td>
                          <td><?=$edicionYdiseno['userPorActividad'] ?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Dinámica en la naturaleza: el movimiento</td>
                          <td><?=$edicionYdiseno['userPorActividad'] ?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Optimización en sistemas naturales y sociales</td>
                          <td><?=$edicionYdiseno['userPorActividad'] ?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Impacto de la ciencia y la tecnología</td>
                          <td><?=$edicionYdiseno['userPorActividad'] ?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Tecnologías emergentes en la resolución de problemas</td>
                          <td><?=$edicionYdiseno['userPorActividad'] ?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Tecnologías emergentes para la administración y gestión</td>
                          <td><?=$edicionYdiseno['userPorActividad'] ?></td>
                    </tr>
                <tr>
                  <th scope="row">COLBACH (EXACER)</th>
                  <td></td>
                  <td></td>
                </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Asesorías. Áreas de conocimiento</td>
                          <td><?=$edicionYdiseno['userPorActividad'] ?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Asesorías. Capacitación para el trabajo</td>
                          <td><?=$edicionYdiseno['userPorActividad'] ?></td>
                    </tr>
                 <tr>
                  <th scope="row">Preparatoria abierta (SEP)</th>
                  <td></td>
                  <td></td>
                </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Nivel 1. Bases</td>
                          <td><?=$edicionYdiseno['userPorActividad'] ?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Nivel 2. Instrumentos</td>
                          <td><?=$edicionYdiseno['userPorActividad'] ?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Nivel 3. Métodos y contextos</td>
                          <td><?=$edicionYdiseno['userPorActividad'] ?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Nivel 4. Relacionesy cambios</td>
                          <td><?=$edicionYdiseno['userPorActividad'] ?></td>
                    </tr>
                    <tr>
                      <th scope="row"></th>    
                          <td>Nivel 5. Efectos y propuestas</td>
                          <td><?=$edicionYdiseno['userPorActividad'] ?></td>
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