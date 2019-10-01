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
    $totalesIntervalo1 = mysqli_fetch_array($intervaloTotales1);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS asistenciasPorIntervalo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND B1.edadUsuario = '16'";
    $intervaloTotales2 = mysqli_query($con, $sql);
    //var_dump($intervaloTotales2);
    $totalesIntervalo2 = mysqli_fetch_array($intervaloTotales2);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS asistenciasPorIntervalo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND B1.edadUsuario = '17'";
    $intervaloTotales3 = mysqli_query($con, $sql);
    //var_dump($intervaloTotales3);
    $totalesIntervalo3 = mysqli_fetch_array($intervaloTotales3);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS asistenciasPorIntervalo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND B1.edadUsuario = '18'";
    $intervaloTotales4 = mysqli_query($con, $sql);
    //var_dump($intervaloTotales4);
    $totalesIntervalo4 = mysqli_fetch_array($intervaloTotales4);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS asistenciasPorIntervalo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND B1.edadUsuario = '19'";
    $intervaloTotales5 = mysqli_query($con, $sql);
    //var_dump($intervaloTotales5);
    $totalesIntervalo5 = mysqli_fetch_array($intervaloTotales5);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS asistenciasPorIntervalo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND B1.edadUsuario = '20'"; 
    $intervaloTotales6 = mysqli_query($con, $sql);
    //var_dump($intervaloTotales6);
    $totalesIntervalo6 = mysqli_fetch_array($intervaloTotales6);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS asistenciasPorIntervalo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND B1.edadUsuario = '21'";
    $intervaloTotales7 = mysqli_query($con, $sql);
    //var_dump($intervaloTotales7);
    $totalesIntervalo7 = mysqli_fetch_array($intervaloTotales7);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS asistenciasPorIntervalo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND B1.edadUsuario = '22'";
    $intervaloTotales8 = mysqli_query($con, $sql);
    //var_dump($intervaloTotales8);
    $totalesIntervalo8 = mysqli_fetch_array($intervaloTotales8);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS asistenciasPorIntervalo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND B1.edadUsuario = '23'";
    $intervaloTotales9 = mysqli_query($con, $sql);
    //var_dump($intervaloTotales9);
    $totalesIntervalo9 = mysqli_fetch_array($intervaloTotales9);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS asistenciasPorIntervalo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND B1.edadUsuario = '24'";
    $intervaloTotales10 = mysqli_query($con, $sql);
    //var_dump($intervaloTotales10);
    $totalesIntervalo10 = mysqli_fetch_array($intervaloTotales10);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS asistenciasPorIntervalo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND B1.edadUsuario = '25'"; 
    $intervaloTotales11 = mysqli_query($con, $sql);
    //var_dump($intervaloTotales11);
    $totalesIntervalo11 = mysqli_fetch_array($intervaloTotales11);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS asistenciasPorIntervalo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND B1.edadUsuario = '26'";
    $intervaloTotales12 = mysqli_query($con, $sql);
    //var_dump($intervaloTotales12);
    $totalesIntervalo12 = mysqli_fetch_array($intervaloTotales12);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS asistenciasPorIntervalo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND B1.edadUsuario = '27'";
    $intervaloTotales13 = mysqli_query($con, $sql);
    //var_dump($intervaloTotales13);
    $totalesIntervalo13 = mysqli_fetch_array($intervaloTotales13);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS asistenciasPorIntervalo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND B1.edadUsuario = '28'";
    $intervaloTotales14 = mysqli_query($con, $sql);
    //var_dump($intervaloTotales14);
    $totalesIntervalo14 = mysqli_fetch_array($intervaloTotales14);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS asistenciasPorIntervalo FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND B1.edadUsuario = '29'";
    $intervaloTotales15 = mysqli_query($con, $sql);
    //var_dump($intervaloTotales15);
    $totalesIntervalo15 = mysqli_fetch_array($intervaloTotales15);
/**
 * Usuarios con beca porActividad
 */
    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '2'";
    $userPorActividad2 = mysqli_query($con, $sql);
    //var_dump($userPorActividad2);
    $actividad2 = mysqli_fetch_array($userPorActividad2);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '3'";
    $userPorActividad3 = mysqli_query($con, $sql);
    //var_dump($userPorActividad3);
    $actividad3 = mysqli_fetch_array($userPorActividad3);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '7'";
    $userPorActividad4 = mysqli_query($con, $sql);
    //var_dump($userPorActividad4);
    $actividad4 = mysqli_fetch_array($userPorActividad4);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '9'";
    $userPorActividad5 = mysqli_query($con, $sql);
    //var_dump($userPorActividad5);
    $actividad5 = mysqli_fetch_array($userPorActividad5);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '17'";
    $userPorActividad6 = mysqli_query($con, $sql);
    //var_dump($userPorActividad6);
    $actividad6 = mysqli_fetch_array($userPorActividad6);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '19'";
    $userPorActividad7 = mysqli_query($con, $sql);
    //var_dump($userPorActividad7);
    $actividad7 = mysqli_fetch_array($userPorActividad7);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '20'";
    $userPorActividad8 = mysqli_query($con, $sql);
    //var_dump($userPorActividad8);
    $actividad8 = mysqli_fetch_array($userPorActividad8);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '21'";
    $userPorActividad9 = mysqli_query($con, $sql);
    //var_dump($userPorActividad9);
    $actividad9 = mysqli_fetch_array($userPorActividad9);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '24'";
    $userPorActividad10 = mysqli_query($con, $sql);
    //var_dump($userPorActividad10);
    $actividad10 = mysqli_fetch_array($userPorActividad10);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '25'";
    $userPorActividad11 = mysqli_query($con, $sql);
    //var_dump($userPorActividad11);
    $actividad11 = mysqli_fetch_array($userPorActividad11);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '33'";
    $userPorActividad12 = mysqli_query($con, $sql);
    //var_dump($userPorActividad12);
    $actividad12 = mysqli_fetch_array($userPorActividad12);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '35'";
    $userPorActividad13 = mysqli_query($con, $sql);
    //var_dump($userPorActividad13);
    $actividad13 = mysqli_fetch_array($userPorActividad13);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '37'";
    $userPorActividad14 = mysqli_query($con, $sql);
    //var_dump($userPorActividad14);
    $actividad14 = mysqli_fetch_array($userPorActividad14);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '38'";
    $userPorActividad15 = mysqli_query($con, $sql);
    //var_dump($userPorActividad15);
    $actividad15 = mysqli_fetch_array($userPorActividad15);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '39'";
    $userPorActividad16 = mysqli_query($con, $sql);
    //var_dump($userPorActividad16);
    $actividad16 = mysqli_fetch_array($userPorActividad16);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '40'";
    $userPorActividad17 = mysqli_query($con, $sql);
    //var_dump($userPorActividad17);
    $actividad17 = mysqli_fetch_array($userPorActividad17);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '41'";
    $userPorActividad18 = mysqli_query($con, $sql);
    //var_dump($userPorActividad18);
    $actividad18 = mysqli_fetch_array($userPorActividad18);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '43'";
    $userPorActividad19 = mysqli_query($con, $sql);
    //var_dump($userPorActividad19);
    $actividad19 = mysqli_fetch_array($userPorActividad19);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '44'";
    $userPorActividad20 = mysqli_query($con, $sql);
    //var_dump($userPorActividad20);
    $actividad20 = mysqli_fetch_array($userPorActividad20);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '47'";
    $userPorActividad21 = mysqli_query($con, $sql);
    //var_dump($userPorActividad21);
    $actividad21 = mysqli_fetch_array($userPorActividad21);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '49'";
    $userPorActividad22 = mysqli_query($con, $sql);
    //var_dump($userPorActividad22);
    $actividad22 = mysqli_fetch_array($userPorActividad22);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '52'";
    $userPorActividad23 = mysqli_query($con, $sql);
    //var_dump($userPorActividad23);
    $actividad23 = mysqli_fetch_array($userPorActividad23);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '58'";
    $userPorActividad24 = mysqli_query($con, $sql);
    //var_dump($userPorActividad24);
    $actividad24 = mysqli_fetch_array($userPorActividad24);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '59'";
    $userPorActividad25 = mysqli_query($con, $sql);
    //var_dump($userPorActividad25);
    $actividad25 = mysqli_fetch_array($userPorActividad25);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '60'";
    $userPorActividad26 = mysqli_query($con, $sql);
    //var_dump($userPorActividad26);
    $actividad26 = mysqli_fetch_array($userPorActividad26);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '70'";
    $userPorActividad27 = mysqli_query($con, $sql);
    //var_dump($userPorActividad27);
    $actividad27 = mysqli_fetch_array($userPorActividad27);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '72'";
    $userPorActividad28 = mysqli_query($con, $sql);
    //var_dump($userPorActividad28);
    $actividad28 = mysqli_fetch_array($userPorActividad28);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '74'";
    $userPorActividad29 = mysqli_query($con, $sql);
    //var_dump($userPorActividad29);
    $actividad29 = mysqli_fetch_array($userPorActividad29);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '75'";
    $userPorActividad30 = mysqli_query($con, $sql);
    //var_dump($userPorActividad30);
    $actividad30 = mysqli_fetch_array($userPorActividad30);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '77'";
    $userPorActividad31 = mysqli_query($con, $sql);
    //var_dump($userPorActividad31);
    $actividad31 = mysqli_fetch_array($userPorActividad31);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '78'";
    $userPorActividad32 = mysqli_query($con, $sql);
    //var_dump($userPorActividad32);
    $actividad32 = mysqli_fetch_array($userPorActividad32);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '83'";
    $userPorActividad33 = mysqli_query($con, $sql);
    //var_dump($userPorActividad33);
    $actividad33 = mysqli_fetch_array($userPorActividad33);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '84'";
    $userPorActividad34 = mysqli_query($con, $sql);
    //var_dump($userPorActividad34);
    $actividad34 = mysqli_fetch_array($userPorActividad34);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '86'";
    $userPorActividad35 = mysqli_query($con, $sql);
    //var_dump($userPorActividad35);
    $actividad35 = mysqli_fetch_array($userPorActividad35);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '89'";
    $userPorActividad36 = mysqli_query($con, $sql);
    //var_dump($userPorActividad36);
    $actividad36 = mysqli_fetch_array($userPorActividad36);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '90'";
    $userPorActividad37 = mysqli_query($con, $sql);
    //var_dump($userPorActividad37);
    $actividad37 = mysqli_fetch_array($userPorActividad37);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '91'";
    $userPorActividad38 = mysqli_query($con, $sql);
    //var_dump($userPorActividad38);
    $actividad38 = mysqli_fetch_array($userPorActividad38);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '92'";
    $userPorActividad39 = mysqli_query($con, $sql);
    //var_dump($userPorActividad39);
    $actividad39 = mysqli_fetch_array($userPorActividad39);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '94'";
    $userPorActividad40 = mysqli_query($con, $sql);
    //var_dump($userPorActividad40);
    $actividad40 = mysqli_fetch_array($userPorActividad40);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '96'";
    $userPorActividad41 = mysqli_query($con, $sql);
    //var_dump($userPorActividad41);
    $actividad41 = mysqli_fetch_array($userPorActividad41);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '98'";
    $userPorActividad42 = mysqli_query($con, $sql);
    //var_dump($userPorActividad42);
    $actividad42 = mysqli_fetch_array($userPorActividad42);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '100'";
    $userPorActividad43 = mysqli_query($con, $sql);
    //var_dump($userPorActividad43);
    $actividad43 = mysqli_fetch_array($userPorActividad43);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '102'";
    $userPorActividad44 = mysqli_query($con, $sql);
    //var_dump($userPorActividad44);
    $actividad44 = mysqli_fetch_array($userPorActividad44);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '103'";
    $userPorActividad45 = mysqli_query($con, $sql);
    //var_dump($userPorActividad45);
    $actividad45 = mysqli_fetch_array($userPorActividad45);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '107'";
    $userPorActividad46 = mysqli_query($con, $sql);
    //var_dump($userPorActividad46);
    $actividad46 = mysqli_fetch_array($userPorActividad46);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109'";
    $userPorActividad47 = mysqli_query($con, $sql);
    //var_dump($userPorActividad47);
    $actividad47 = mysqli_fetch_array($userPorActividad47);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '110'";
    $userPorActividad48 = mysqli_query($con, $sql);
    //var_dump($userPorActividad48);
    $actividad48 = mysqli_fetch_array($userPorActividad48);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '112'";
    $userPorActividad49 = mysqli_query($con, $sql);
    //var_dump($userPorActividad49);
    $actividad49 = mysqli_fetch_array($userPorActividad49);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '113'";
    $userPorActividad50 = mysqli_query($con, $sql);
    //var_dump($userPorActividad50);
    $actividad50 = mysqli_fetch_array($userPorActividad50);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '115'";
    $userPorActividad51 = mysqli_query($con, $sql);
    //var_dump($userPorActividad51);
    $actividad51 = mysqli_fetch_array($userPorActividad51);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '120'";
    $userPorActividad52 = mysqli_query($con, $sql);
    //var_dump($userPorActividad52);
    $actividad52 = mysqli_fetch_array($userPorActividad52);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '123'";
    $userPorActividad53 = mysqli_query($con, $sql);
    //var_dump($userPorActividad53);
    $actividad53 = mysqli_fetch_array($userPorActividad53);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '124'";
    $userPorActividad54 = mysqli_query($con, $sql);
    //var_dump($userPorActividad54);
    $actividad54 = mysqli_fetch_array($userPorActividad54);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '125'";
    $userPorActividad55 = mysqli_query($con, $sql);
    //var_dump($userPorActividad55);
    $actividad55 = mysqli_fetch_array($userPorActividad55);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '126'";
    $userPorActividad56 = mysqli_query($con, $sql);
    //var_dump($userPorActividad56);
    $actividad56 = mysqli_fetch_array($userPorActividad56);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '128'";
    $userPorActividad57 = mysqli_query($con, $sql);
    //var_dump($userPorActividad57);
    $actividad57 = mysqli_fetch_array($userPorActividad57);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '129'";
    $userPorActividad58 = mysqli_query($con, $sql);
    //var_dump($userPorActividad58);
    $actividad58 = mysqli_fetch_array($userPorActividad58);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '130'";
    $userPorActividad59 = mysqli_query($con, $sql);
    //var_dump($userPorActividad59);
    $actividad59 = mysqli_fetch_array($userPorActividad59);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '132'";
    $userPorActividad60 = mysqli_query($con, $sql);
    //var_dump($userPorActividad60);
    $actividad60 = mysqli_fetch_array($userPorActividad60);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '135'";
    $userPorActividad61 = mysqli_query($con, $sql);
    //var_dump($userPorActividad61);
    $actividad61 = mysqli_fetch_array($userPorActividad61);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '138'";
    $userPorActividad62 = mysqli_query($con, $sql);
    //var_dump($userPorActividad62);
    $actividad62 = mysqli_fetch_array($userPorActividad62);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '148'";
    $userPorActividad63 = mysqli_query($con, $sql);
    //var_dump($userPorActividad63);
    $actividad63 = mysqli_fetch_array($userPorActividad63);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '153'";
    $userPorActividad64 = mysqli_query($con, $sql);
    //var_dump($userPorActividad64);
    $actividad64 = mysqli_fetch_array($userPorActividad64);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '154'";
    $userPorActividad65 = mysqli_query($con, $sql);
    //var_dump($userPorActividad65);
    $actividad65 = mysqli_fetch_array($userPorActividad65);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '156'";
    $userPorActividad66 = mysqli_query($con, $sql);
    //var_dump($userPorActividad66);
    $actividad66 = mysqli_fetch_array($userPorActividad66);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '162'";
    $userPorActividad67 = mysqli_query($con, $sql);
    //var_dump($userPorActividad67);
    $actividad67 = mysqli_fetch_array($userPorActividad67);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '163'";
    $userPorActividad68 = mysqli_query($con, $sql);
    //var_dump($userPorActividad68);
    $actividad68 = mysqli_fetch_array($userPorActividad68);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '181'";
    $userPorActividad69 = mysqli_query($con, $sql);
    //var_dump($userPorActividad69);
    $actividad69 = mysqli_fetch_array($userPorActividad69);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '182'";
    $userPorActividad70 = mysqli_query($con, $sql);
    //var_dump($userPorActividad70);
    $actividad70 = mysqli_fetch_array($userPorActividad70);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '192'";
    $userPorActividad71 = mysqli_query($con, $sql);
    //var_dump($userPorActividad71);
    $actividad71 = mysqli_fetch_array($userPorActividad71);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '193'";
    $userPorActividad72 = mysqli_query($con, $sql);
    //var_dump($userPorActividad72);
    $actividad72 = mysqli_fetch_array($userPorActividad72);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '195'";
    $userPorActividad73 = mysqli_query($con, $sql);
    //var_dump($userPorActividad73);
    $actividad73 = mysqli_fetch_array($userPorActividad73);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '196'";
    $userPorActividad74 = mysqli_query($con, $sql);
    //var_dump($userPorActividad74);
    $actividad74 = mysqli_fetch_array($userPorActividad74);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '197'";
    $userPorActividad75 = mysqli_query($con, $sql);
    //var_dump($userPorActividad75);
    $actividad75 = mysqli_fetch_array($userPorActividad75);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '198'";
    $userPorActividad76 = mysqli_query($con, $sql);
    //var_dump($userPorActividad76);
    $actividad76 = mysqli_fetch_array($userPorActividad76);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '199'";
    $userPorActividad77 = mysqli_query($con, $sql);
    //var_dump($userPorActividad77);
    $actividad77 = mysqli_fetch_array($userPorActividad77);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '200'";
    $userPorActividad78 = mysqli_query($con, $sql);
    //var_dump($userPorActividad78);
    $actividad78 = mysqli_fetch_array($userPorActividad78);

    $sql="SELECT count(DISTINCT B1.idUsuario) AS userPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '203'";
    $userPorActividad79 = mysqli_query($con, $sql);
    //var_dump($userPorActividad79);
    $actividad79 = mysqli_fetch_array($userPorActividad79);

    
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
* Usuarios con beca porActividad
*/
$sql="SELECT count(DISTINCT B1.idUsuario) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '2'";
$userPorActividad2 = mysqli_query($con, $sql);
//var_dump($userPorActividad2);
$actividad2 = mysqli_fetch_array($userPorActividad2);

$sql="SELECT count(DISTINCT B1.idUsuario) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '3'";
$userPorActividad3 = mysqli_query($con, $sql);
//var_dump($userPorActividad3);
$actividad3 = mysqli_fetch_array($userPorActividad3);

$sql="SELECT count(DISTINCT B1.idUsuario) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '7'";
$userPorActividad4 = mysqli_query($con, $sql);
//var_dump($userPorActividad4);
$actividad4 = mysqli_fetch_array($userPorActividad4);

$sql="SELECT count(DISTINCT B1.idUsuario) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '9'";
$userPorActividad5 = mysqli_query($con, $sql);
//var_dump($userPorActividad5);
$actividad5 = mysqli_fetch_array($userPorActividad5);

$sql="SELECT count(DISTINCT B1.idUsuario) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '17'";
$userPorActividad6 = mysqli_query($con, $sql);
//var_dump($userPorActividad6);
$actividad6 = mysqli_fetch_array($userPorActividad6);

$sql="SELECT count(DISTINCT B1.idUsuario) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '19'";
$userPorActividad7 = mysqli_query($con, $sql);
//var_dump($userPorActividad7);
$actividad7 = mysqli_fetch_array($userPorActividad7);

$sql="SELECT count(DISTINCT B1.idUsuario) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '20'";
$userPorActividad8 = mysqli_query($con, $sql);
//var_dump($userPorActividad8);
$actividad8 = mysqli_fetch_array($userPorActividad8);

$sql="SELECT count(DISTINCT B1.idUsuario) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '21'";
$userPorActividad9 = mysqli_query($con, $sql);
//var_dump($userPorActividad9);
$actividad9 = mysqli_fetch_array($userPorActividad9);

$sql="SELECT count(DISTINCT B1.idUsuario) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '24'";
$userPorActividad10 = mysqli_query($con, $sql);
//var_dump($userPorActividad10);
$actividad10 = mysqli_fetch_array($userPorActividad10);

$sql="SELECT count(DISTINCT B1.idUsuario) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '25'";
$userPorActividad11 = mysqli_query($con, $sql);
//var_dump($userPorActividad11);
$actividad11 = mysqli_fetch_array($userPorActividad11);

$sql="SELECT count(DISTINCT B1.idUsuario) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '33'";
$userPorActividad12 = mysqli_query($con, $sql);
//var_dump($userPorActividad12);
$actividad12 = mysqli_fetch_array($userPorActividad12);

$sql="SELECT count(DISTINCT B1.idUsuario) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '35'";
$userPorActividad13 = mysqli_query($con, $sql);
//var_dump($userPorActividad13);
$actividad13 = mysqli_fetch_array($userPorActividad13);

$sql="SELECT count(DISTINCT B1.idUsuario) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '37'";
$userPorActividad14 = mysqli_query($con, $sql);
//var_dump($userPorActividad14);
$actividad14 = mysqli_fetch_array($userPorActividad14);

$sql="SELECT count(DISTINCT B1.idUsuario) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '38'";
$userPorActividad15 = mysqli_query($con, $sql);
//var_dump($userPorActividad15);
$actividad15 = mysqli_fetch_array($userPorActividad15);

$sql="SELECT count(DISTINCT B1.idUsuario) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '39'";
$userPorActividad16 = mysqli_query($con, $sql);
//var_dump($userPorActividad16);
$actividad16 = mysqli_fetch_array($userPorActividad16);

$sql="SELECT count(DISTINCT B1.idUsuario) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '40'";
$userPorActividad17 = mysqli_query($con, $sql);
//var_dump($userPorActividad17);
$actividad17 = mysqli_fetch_array($userPorActividad17);

$sql="SELECT count(DISTINCT B1.idUsuario) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '41'";
$userPorActividad18 = mysqli_query($con, $sql);
//var_dump($userPorActividad18);
$actividad18 = mysqli_fetch_array($userPorActividad18);

$sql="SELECT count(DISTINCT B1.idUsuario) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '43'";
$userPorActividad19 = mysqli_query($con, $sql);
//var_dump($userPorActividad19);
$actividad19 = mysqli_fetch_array($userPorActividad19);

$sql="SELECT count(DISTINCT B1.idUsuario) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '44'";
$userPorActividad20 = mysqli_query($con, $sql);
//var_dump($userPorActividad20);
$actividad20 = mysqli_fetch_array($userPorActividad20);

$sql="SELECT count(DISTINCT B1.idUsuario) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '47'";
$userPorActividad21 = mysqli_query($con, $sql);
//var_dump($userPorActividad21);
$actividad21 = mysqli_fetch_array($userPorActividad21);

$sql="SELECT count(DISTINCT B1.idUsuario) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '49'";
$userPorActividad22 = mysqli_query($con, $sql);
//var_dump($userPorActividad22);
$actividad22 = mysqli_fetch_array($userPorActividad22);

$sql="SELECT count(DISTINCT B1.idUsuario) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '52'";
$userPorActividad23 = mysqli_query($con, $sql);
//var_dump($userPorActividad23);
$actividad23 = mysqli_fetch_array($userPorActividad23);

$sql="SELECT count(DISTINCT B1.idUsuario) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '58'";
$userPorActividad24 = mysqli_query($con, $sql);
//var_dump($userPorActividad24);
$actividad24 = mysqli_fetch_array($userPorActividad24);

$sql="SELECT count(DISTINCT B1.idUsuario) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '59'";
$userPorActividad25 = mysqli_query($con, $sql);
//var_dump($userPorActividad25);
$actividad25 = mysqli_fetch_array($userPorActividad25);

$sql="SELECT count(DISTINCT B1.idUsuario) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '60'";
$userPorActividad26 = mysqli_query($con, $sql);
//var_dump($userPorActividad26);
$actividad26 = mysqli_fetch_array($userPorActividad26);

$sql="SELECT count(DISTINCT B1.idUsuario) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '70'";
$userPorActividad27 = mysqli_query($con, $sql);
//var_dump($userPorActividad27);
$actividad27 = mysqli_fetch_array($userPorActividad27);

$sql="SELECT count(DISTINCT B1.idUsuario) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '72'";
$userPorActividad28 = mysqli_query($con, $sql);
//var_dump($userPorActividad28);
$actividad28 = mysqli_fetch_array($userPorActividad28);

$sql="SELECT count(DISTINCT B1.idUsuario) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '74'";
$userPorActividad29 = mysqli_query($con, $sql);
//var_dump($userPorActividad29);
$actividad29 = mysqli_fetch_array($userPorActividad29);

$sql="SELECT count(DISTINCT B1.idUsuario) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '75'";
$userPorActividad30 = mysqli_query($con, $sql);
//var_dump($userPorActividad30);
$actividad30 = mysqli_fetch_array($userPorActividad30);

$sql="SELECT count(DISTINCT B1.idUsuario) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '77'";
$userPorActividad31 = mysqli_query($con, $sql);
//var_dump($userPorActividad31);
$actividad31 = mysqli_fetch_array($userPorActividad31);

$sql="SELECT count(DISTINCT B1.idUsuario) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '78'";
$userPorActividad32 = mysqli_query($con, $sql);
//var_dump($userPorActividad32);
$actividad32 = mysqli_fetch_array($userPorActividad32);

$sql="SELECT count(DISTINCT B1.idUsuario) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '83'";
$userPorActividad33 = mysqli_query($con, $sql);
//var_dump($userPorActividad33);
$actividad33 = mysqli_fetch_array($userPorActividad33);

$sql="SELECT count(DISTINCT B1.idUsuario) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '84'";
$userPorActividad34 = mysqli_query($con, $sql);
//var_dump($userPorActividad34);
$actividad34 = mysqli_fetch_array($userPorActividad34);

$sql="SELECT count(DISTINCT B1.idUsuario) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '86'";
$userPorActividad35 = mysqli_query($con, $sql);
//var_dump($userPorActividad35);
$actividad35 = mysqli_fetch_array($userPorActividad35);

$sql="SELECT count(DISTINCT B1.idUsuario) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '89'";
$userPorActividad36 = mysqli_query($con, $sql);
//var_dump($userPorActividad36);
$actividad36 = mysqli_fetch_array($userPorActividad36);

$sql="SELECT count(DISTINCT B1.idUsuario) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '90'";
$userPorActividad37 = mysqli_query($con, $sql);
//var_dump($userPorActividad37);
$actividad37 = mysqli_fetch_array($userPorActividad37);

$sql="SELECT count(DISTINCT B1.idUsuario) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '91'";
$userPorActividad38 = mysqli_query($con, $sql);
//var_dump($userPorActividad38);
$actividad38 = mysqli_fetch_array($userPorActividad38);

$sql="SELECT count(DISTINCT B1.idUsuario) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '92'";
$userPorActividad39 = mysqli_query($con, $sql);
//var_dump($userPorActividad39);
$actividad39 = mysqli_fetch_array($userPorActividad39);

$sql="SELECT count(DISTINCT B1.idUsuario) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '94'";
$userPorActividad40 = mysqli_query($con, $sql);
//var_dump($userPorActividad40);
$actividad40 = mysqli_fetch_array($userPorActividad40);

$sql="SELECT count(DISTINCT B1.idUsuario) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '96'";
$userPorActividad41 = mysqli_query($con, $sql);
//var_dump($userPorActividad41);
$actividad41 = mysqli_fetch_array($userPorActividad41);

$sql="SELECT count(DISTINCT B1.idUsuario) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '98'";
$userPorActividad42 = mysqli_query($con, $sql);
//var_dump($userPorActividad42);
$actividad42 = mysqli_fetch_array($userPorActividad42);

$sql="SELECT count(DISTINCT B1.idUsuario) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '100'";
$userPorActividad43 = mysqli_query($con, $sql);
//var_dump($userPorActividad43);
$actividad43 = mysqli_fetch_array($userPorActividad43);

$sql="SELECT count(DISTINCT B1.idUsuario) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '102'";
$userPorActividad44 = mysqli_query($con, $sql);
//var_dump($userPorActividad44);
$actividad44 = mysqli_fetch_array($userPorActividad44);

$sql="SELECT count(DISTINCT B1.idUsuario) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '103'";
$userPorActividad45 = mysqli_query($con, $sql);
//var_dump($userPorActividad45);
$actividad45 = mysqli_fetch_array($userPorActividad45);

$sql="SELECT count(DISTINCT B1.idUsuario) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '107'";
$userPorActividad46 = mysqli_query($con, $sql);
//var_dump($userPorActividad46);
$actividad46 = mysqli_fetch_array($userPorActividad46);

$sql="SELECT count(DISTINCT B1.idUsuario) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '109'";
$userPorActividad47 = mysqli_query($con, $sql);
//var_dump($userPorActividad47);
$actividad47 = mysqli_fetch_array($userPorActividad47);

$sql="SELECT count(DISTINCT B1.idUsuario) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '110'";
$userPorActividad48 = mysqli_query($con, $sql);
//var_dump($userPorActividad48);
$actividad48 = mysqli_fetch_array($userPorActividad48);

$sql="SELECT count(DISTINCT B1.idUsuario) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '112'";
$userPorActividad49 = mysqli_query($con, $sql);
//var_dump($userPorActividad49);
$actividad49 = mysqli_fetch_array($userPorActividad49);

$sql="SELECT count(DISTINCT B1.idUsuario) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '113'";
$userPorActividad50 = mysqli_query($con, $sql);
//var_dump($userPorActividad50);
$actividad50 = mysqli_fetch_array($userPorActividad50);

$sql="SELECT count(DISTINCT B1.idUsuario) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '115'";
$userPorActividad51 = mysqli_query($con, $sql);
//var_dump($userPorActividad51);
$actividad51 = mysqli_fetch_array($userPorActividad51);

$sql="SELECT count(DISTINCT B1.idUsuario) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '120'";
$userPorActividad52 = mysqli_query($con, $sql);
//var_dump($userPorActividad52);
$actividad52 = mysqli_fetch_array($userPorActividad52);

$sql="SELECT count(DISTINCT B1.idUsuario) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '123'";
$userPorActividad53 = mysqli_query($con, $sql);
//var_dump($userPorActividad53);
$actividad53 = mysqli_fetch_array($userPorActividad53);

$sql="SELECT count(DISTINCT B1.idUsuario) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '124'";
$userPorActividad54 = mysqli_query($con, $sql);
//var_dump($userPorActividad54);
$actividad54 = mysqli_fetch_array($userPorActividad54);

$sql="SELECT count(DISTINCT B1.idUsuario) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '125'";
$userPorActividad55 = mysqli_query($con, $sql);
//var_dump($userPorActividad55);
$actividad55 = mysqli_fetch_array($userPorActividad55);

$sql="SELECT count(DISTINCT B1.idUsuario) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '126'";
$userPorActividad56 = mysqli_query($con, $sql);
//var_dump($userPorActividad56);
$actividad56 = mysqli_fetch_array($userPorActividad56);

$sql="SELECT count(DISTINCT B1.idUsuario) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '128'";
$userPorActividad57 = mysqli_query($con, $sql);
//var_dump($userPorActividad57);
$actividad57 = mysqli_fetch_array($userPorActividad57);

$sql="SELECT count(DISTINCT B1.idUsuario) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '129'";
$userPorActividad58 = mysqli_query($con, $sql);
//var_dump($userPorActividad58);
$actividad58 = mysqli_fetch_array($userPorActividad58);

$sql="SELECT count(DISTINCT B1.idUsuario) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '130'";
$userPorActividad59 = mysqli_query($con, $sql);
//var_dump($userPorActividad59);
$actividad59 = mysqli_fetch_array($userPorActividad59);

$sql="SELECT count(DISTINCT B1.idUsuario) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '132'";
$userPorActividad60 = mysqli_query($con, $sql);
//var_dump($userPorActividad60);
$actividad60 = mysqli_fetch_array($userPorActividad60);

$sql="SELECT count(DISTINCT B1.idUsuario) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '135'";
$userPorActividad61 = mysqli_query($con, $sql);
//var_dump($userPorActividad61);
$actividad61 = mysqli_fetch_array($userPorActividad61);

$sql="SELECT count(DISTINCT B1.idUsuario) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '138'";
$userPorActividad62 = mysqli_query($con, $sql);
//var_dump($userPorActividad62);
$actividad62 = mysqli_fetch_array($userPorActividad62);

$sql="SELECT count(DISTINCT B1.idUsuario) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '148'";
$userPorActividad63 = mysqli_query($con, $sql);
//var_dump($userPorActividad63);
$actividad63 = mysqli_fetch_array($userPorActividad63);

$sql="SELECT count(DISTINCT B1.idUsuario) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '153'";
$userPorActividad64 = mysqli_query($con, $sql);
//var_dump($userPorActividad64);
$actividad64 = mysqli_fetch_array($userPorActividad64);

$sql="SELECT count(DISTINCT B1.idUsuario) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '154'";
$userPorActividad65 = mysqli_query($con, $sql);
//var_dump($userPorActividad65);
$actividad65 = mysqli_fetch_array($userPorActividad65);

$sql="SELECT count(DISTINCT B1.idUsuario) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '156'";
$userPorActividad66 = mysqli_query($con, $sql);
//var_dump($userPorActividad66);
$actividad66 = mysqli_fetch_array($userPorActividad66);

$sql="SELECT count(DISTINCT B1.idUsuario) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '162'";
$userPorActividad67 = mysqli_query($con, $sql);
//var_dump($userPorActividad67);
$actividad67 = mysqli_fetch_array($userPorActividad67);

$sql="SELECT count(DISTINCT B1.idUsuario) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '163'";
$userPorActividad68 = mysqli_query($con, $sql);
//var_dump($userPorActividad68);
$actividad68 = mysqli_fetch_array($userPorActividad68);

$sql="SELECT count(DISTINCT B1.idUsuario) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '181'";
$userPorActividad69 = mysqli_query($con, $sql);
//var_dump($userPorActividad69);
$actividad69 = mysqli_fetch_array($userPorActividad69);

$sql="SELECT count(DISTINCT B1.idUsuario) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '182'";
$userPorActividad70 = mysqli_query($con, $sql);
//var_dump($userPorActividad70);
$actividad70 = mysqli_fetch_array($userPorActividad70);

$sql="SELECT count(DISTINCT B1.idUsuario) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '192'";
$userPorActividad71 = mysqli_query($con, $sql);
//var_dump($userPorActividad71);
$actividad71 = mysqli_fetch_array($userPorActividad71);

$sql="SELECT count(DISTINCT B1.idUsuario) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '193'";
$userPorActividad72 = mysqli_query($con, $sql);
//var_dump($userPorActividad72);
$actividad72 = mysqli_fetch_array($userPorActividad72);

$sql="SELECT count(DISTINCT B1.idUsuario) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '195'";
$userPorActividad73 = mysqli_query($con, $sql);
//var_dump($userPorActividad73);
$actividad73 = mysqli_fetch_array($userPorActividad73);

$sql="SELECT count(DISTINCT B1.idUsuario) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '196'";
$userPorActividad74 = mysqli_query($con, $sql);
//var_dump($userPorActividad74);
$actividad74 = mysqli_fetch_array($userPorActividad74);

$sql="SELECT count(DISTINCT B1.idUsuario) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '197'";
$userPorActividad75 = mysqli_query($con, $sql);
//var_dump($userPorActividad75);
$actividad75 = mysqli_fetch_array($userPorActividad75);

$sql="SELECT count(DISTINCT B1.idUsuario) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '198'";
$userPorActividad76 = mysqli_query($con, $sql);
//var_dump($userPorActividad76);
$actividad76 = mysqli_fetch_array($userPorActividad76);

$sql="SELECT count(DISTINCT B1.idUsuario) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '199'";
$userPorActividad77 = mysqli_query($con, $sql);
//var_dump($userPorActividad77);
$actividad77 = mysqli_fetch_array($userPorActividad77);

$sql="SELECT count(DISTINCT B1.idUsuario) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '200'";
$userPorActividad78 = mysqli_query($con, $sql);
//var_dump($userPorActividad78);
$actividad78 = mysqli_fetch_array($userPorActividad78);

$sql="SELECT count(DISTINCT B1.idUsuario) AS atencionesPorActividad FROM Asistencias A1, Usuario U1, AsistenciasPorActividad A2, Becas_produccion B1, Actividades A3 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND U1.idUsuarios = A2.Asistencias_Usuario_idUsuarios AND A1.idAsistencias = A2.Asistencias_idAsistencias AND B1.idUsuario = U1.idUsuarios AND A3.idActividades = A2.Actividades_idActividades AND A2.Actividades_idActividades = '203'";
$userPorActividad79 = mysqli_query($con, $sql);
//var_dump($userPorActividad79);
$actividad79 = mysqli_fetch_array($userPorActividad79);

   
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

    <!-- <div class="col-xl-3 col-sm-6 mb-3">
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
                    <td><?=$mujeresAtenciones['atencionesPorGenero']?></td>
                  </tr>
                  <tr>
                    <th scope="row">Hombres</th>
                    <td><?=$mujeresAtenciones['atencionesPorGenero']?></td>
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
    </div> -->
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
                    <td><?=$totalesIntervalo1['asistenciasPorIntervalo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">16 años</th>
                    <td><?=$totalesIntervalo2['asistenciasPorIntervalo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">17 años</th>
                    <td><?=$totalesIntervalo3['asistenciasPorIntervalo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">18 años</th>
                    <td><?=$totalesIntervalo4['asistenciasPorIntervalo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">19 años</th>
                    <td><?=$totalesIntervalo5['asistenciasPorIntervalo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">20 años</th>
                    <td><?=$totalesIntervalo6['asistenciasPorIntervalo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">21 años</th>
                    <td><?=$totalesIntervalo7['asistenciasPorIntervalo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">22 años</th>
                    <td><?=$totalesIntervalo8['asistenciasPorIntervalo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">23 años</th>
                    <td><?=$totalesIntervalo9['asistenciasPorIntervalo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">24 años</th>
                    <td><?=$totalesIntervalo10['asistenciasPorIntervalo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">25 años</th>
                    <td><?=$totalesIntervalo11['asistenciasPorIntervalo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">26 años</th>
                    <td><?=$totalesIntervalo12['asistenciasPorIntervalo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">27 años</th>
                    <td><?=$totalesIntervalo13['asistenciasPorIntervalo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">28 años</th>
                    <td><?=$totalesIntervalo14['asistenciasPorIntervalo']?></td>
                  </tr>
                  <tr>
                    <th scope="row">29 años</th>
                    <td><?=$totalesIntervalo15['asistenciasPorIntervalo']?></td>
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
  </div> -->

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

    <!-- <div class="col-xl-3 col-sm-6 mb-3">
      <div class="card text-info bg-light o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
            <i class="fas fa-transgender-alt"></i>
            </div>
            
            <div class="mr-5"><b>Atenciones Genero en Autonomía Económica  <span class="float-right"></span></b></div>
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
            
            <div class="mr-5"><b>Atenciones Genero en Ciberescuelas<span class="float-right"></span></b></div>
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
    </div> -->
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
                  <td><?=$actividad2['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Ballet</th>
                  <td><?=$actividad3['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Reciclaje</th>
                  <td><?=$actividad4['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Fotografía</th>
                  <td><?=$actividad5['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Fútbol</th>
                  <td><?=$actividad6['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Voleibol</th>
                  <td><?=$actividad7['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Acondicionamiento físico</th>
                  <td><?=$actividad8['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Ajedrez</th>
                  <td><?=$actividad9['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Club de Ciencias </th>
                  <td><?=$actividad10['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Robótica aplicada</th>
                  <td><?=$actividad11['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Sembrando autoestima</th>
                  <td><?=$actividad12['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Inteligencia emocional y habilidades para la vida</th>
                  <td><?=$actividad13['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Carpintería</th>
                  <td><?=$actividad14['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Plomería</th>
                  <td><?=$actividad15['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Herrería</th>
                  <td><?=$actividad16['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Electricidad</th>
                  <td><?=$actividad17['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Gastronomía, panadería y banquetes </th>
                  <td><?=$actividad18['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Joyería y accesorio </th>
                  <td><?=$actividad19['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Huertos Urbanos </th>
                  <td><?=$actividad20['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Diseño de Imagen y cosmetología </th>
                  <td><?=$actividad21['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Electrónica</th>
                  <td><?=$actividad22['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Diseño y textiles </th>
                  <td><?=$actividad23['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Emprendimiento</th>
                  <td><?=$actividad24['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Creación de micro-n </th>
                  <td><?=$actividad25['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Comercio digital</th>
                  <td><?=$actividad26['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Danza folklórica </th>
                  <td><?=$actividad27['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Teatro de calle</th>
                  <td><?=$actividad28['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Danza polinesia </th>
                  <td><?=$actividad29['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Teatro de máscaras</th>
                  <td><?=$actividad30['atencionesPorActividad']?></td>
                </tr>
               
                <tr>
                  <th scope="row">Telar de cintura </th>
                  <td><?=$actividad31['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Cartonería</th>
                  <td><?=$actividad32['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Escritura creativa</th>
                  <td><?=$actividad33['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Pintura artística </th>
                  <td><?=$actividad34['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Cine</th>
                  <td><?=$actividad35['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Guitarra clásica </th>
                  <td><?=$actividad36['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Música Rap  </th>
                  <td><?=$actividad37['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Percusiones</th>
                  <td><?=$actividad38['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Iniciación a la música</th>
                  <td><?=$actividad39['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Zumba</th>
                  <td><?=$actividad40['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Yoga</th>
                  <td><?=$actividad41['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Boxeo</th>
                  <td><?=$actividad42['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Karate do </th>
                  <td><?=$actividad43['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Club de letras y expresión</th>
                  <td><?=$actividad44['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Talleres de cómputo</th>
                  <td><?=$actividad45['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Primaria</th>
                  <td><?=$actividad46['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">BADI</th>
                  <td><?=$actividad47['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Prepa en línea SEP </th>
                  <td><?=$actividad48['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">COLBACH</th>
                  <td><?=$actividad49['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Prepa abierta</th>
                  <td><?=$actividad50['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">UnADM</th>
                  <td><?=$actividad51['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Asesorias bachillerato </th>
                  <td><?=$actividad52['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Dibujo y grabado </th>
                  <td><?=$actividad53['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Club de Braille</th>
                  <td><?=$actividad54['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Computación con tecnologías de asistencia</th>
                  <td><?=$actividad55['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Club de lengua de señas Mexicana </th>
                  <td><?=$actividad56['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Arte y creatividad </th>
                  <td><?=$actividad57['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Ritmos latinos </th>
                  <td><?=$actividad58['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Taekwondo</th>
                  <td><?=$actividad59['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Modelado con plastilina</th>
                  <td><?=$actividad60['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Fotografía digital </th>
                  <td><?=$actividad61['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Libro Club </th>
                  <td><?=$actividad62['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Medio ambiente</th>
                  <td><?=$actividad63['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Serigrafía</th>
                  <td><?=$actividad64['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Radio, Audio y Video </th>
                  <td><?=$actividad65['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Club de Inclusión y sensibilización sensorial </th>
                  <td><?=$actividad66['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Cursos para el aprendizaje de la lengua náhuatl </th>
                  <td><?=$actividad67['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Identidad y cultura de los pueblos indígenas </th>
                  <td><?=$actividad68['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Autosanarte</th>
                  <td><?=$actividad69['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Danzante mente </th>
                  <td><?=$actividad70['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Desnormalización de violencia de género </th>
                  <td><?=$actividad71['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Desnormalización de violencia  contra mujeres </th>
                  <td><?=$actividad72['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Desnormalización de violencia familiar </th>
                  <td><?=$actividad73['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Desnormalización de violencia entre pares </th>
                  <td><?=$actividad74['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Desnormalización de violencia hacia adultos m</th>
                  <td><?=$actividad75['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Desnormalización de violencia en la comunidad </th>
                  <td><?=$actividad76['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Desnormalización de violencia contra animales</th>
                  <td><?=$actividad77['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">Desnormalización de acoso escolar</th>
                  <td><?=$actividad78['atencionesPorActividad']?></td>
                </tr>
                <tr>
                  <th scope="row">capoeira</th>
                  <td><?=$actividad79['atencionesPorActividad']?></td>
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