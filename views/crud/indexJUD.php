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
    /**
     * Usuarios por genero enAutonomia economica   
     */
    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorGeneroAutonomia FROM Usuario U1, ActividadesPorUsuario A1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%M%'";
    $autonomiaMujeres = mysqli_query($con, $sql);
    //var_dump($autonomiaMujeres);
    $mujeresAutonomia = mysqli_fetch_array($autonomiaMujeres);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorGeneroAutonomia FROM Usuario U1, ActividadesPorUsuario A1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%H%'";
    $autonomiaHombres = mysqli_query($con, $sql);
    //var_dump($autonomiaHombres);
    $hombresAutonomia = mysqli_fetch_array($autonomiaHombres);
     /**
     * Usuarios por genero en Ciberescuelas 
     */
    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorGeneroCiberescuela FROM Usuario U1, ActividadesPorUsuario A1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%M%'";
    $ciberescuelaMujeres = mysqli_query($con, $sql);
    //var_dump($ciberescuelaMujeres);
    $mujeresCiberescuela = mysqli_fetch_array($ciberescuelaMujeres);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorGeneroCiberescuela FROM Usuario U1, ActividadesPorUsuario A1 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%H%'";
    $ciberescuelaHombres = mysqli_query($con, $sql);
    //var_dump($ciberescuelaHombres);
    $hombresCiberescuela = mysqli_fetch_array($ciberescuelaHombres);
    /**
     * Usuarios inscritos por intervalo de edad 
     */
    $sql="SELECT count(*) AS userPorIntervalo FROM Usuario  WHERE fechaNacimiento BETWEEN '1900-01-01' AND '1958-12-31'";
    $intervaloTotales1 = mysqli_query($con, $sql);
    //var_dump($intervaloTotales1);
    $totalesIntervalo1 = mysqli_fetch_array($intervaloTotales1);

    $sql="SELECT count(*) AS userPorIntervalo FROM Usuario  WHERE fechaNacimiento BETWEEN '1958-12-31' AND '1973-12-31'";
    $intervaloTotales2 = mysqli_query($con, $sql);
    //var_dump($intervaloTotales2);
    $totalesIntervalo2 = mysqli_fetch_array($intervaloTotales2);

    $sql="SELECT count(*) AS userPorIntervalo FROM Usuario  WHERE fechaNacimiento BETWEEN '1973-12-31' AND '1988-12-31'";
    $intervaloTotales3 = mysqli_query($con, $sql);
    //var_dump($intervaloTotales3);
    $totalesIntervalo3 = mysqli_fetch_array($intervaloTotales3);

    $sql="SELECT count(*) AS userPorIntervalo FROM Usuario  WHERE fechaNacimiento BETWEEN '1988-12-31' AND '2003-12-31'";
    $intervaloTotales4 = mysqli_query($con, $sql);
    //var_dump($intervaloTotales4);
    $totalesIntervalo4 = mysqli_fetch_array($intervaloTotales4);

    $sql="SELECT count(*) AS userPorIntervalo FROM Usuario  WHERE fechaNacimiento BETWEEN '2003-12-31' AND '2016-12-31'";
    $intervaloTotales5 = mysqli_query($con, $sql);
    //var_dump($intervaloTotales5);
    $totalesIntervalo5 = mysqli_fetch_array($intervaloTotales5);
    /**
     * Usuarios inscritos por intervalo de edad mujeres
     */
    $sql="SELECT count(*) AS userPorIntervalo FROM Usuario  WHERE fechaNacimiento BETWEEN '1900-01-01' AND '1958-12-31' AND sexo LIKE '%M%'";
    $intervaloMujeres1 = mysqli_query($con, $sql);
    //var_dump($intervaloMujeres1);
    $mujeresIntervalo1 = mysqli_fetch_array($intervaloMujeres1);

    $sql="SELECT count(*) AS userPorIntervalo FROM Usuario  WHERE fechaNacimiento BETWEEN '1958-12-31' AND '1973-12-31' AND sexo LIKE '%M%'";
    $intervaloMujeres2 = mysqli_query($con, $sql);
    //var_dump($intervaloMujeres2);
    $mujeresIntervalo2 = mysqli_fetch_array($intervaloMujeres2);

    $sql="SELECT count(*) AS userPorIntervalo FROM Usuario  WHERE fechaNacimiento BETWEEN '1973-12-31' AND '1988-12-31' AND sexo LIKE '%M%'";
    $intervaloMujeres3 = mysqli_query($con, $sql);
    //var_dump($intervaloMujeres3);
    $mujeresIntervalo3 = mysqli_fetch_array($intervaloMujeres3);

    $sql="SELECT count(*) AS userPorIntervalo FROM Usuario  WHERE fechaNacimiento BETWEEN '1988-12-31' AND '2003-12-31' AND sexo LIKE '%M%'";
    $intervaloMujeres4 = mysqli_query($con, $sql);
    //var_dump($intervaloMujeres4);
    $mujeresIntervalo4 = mysqli_fetch_array($intervaloMujeres4);

    $sql="SELECT count(*) AS userPorIntervalo FROM Usuario  WHERE fechaNacimiento BETWEEN '2003-12-31' AND '2016-12-31' AND sexo LIKE '%M%'";
    $intervaloMujeres5 = mysqli_query($con, $sql);
    //var_dump($intervaloMujeres5);
    $mujeresIntervalo5 = mysqli_fetch_array($intervaloMujeres5);
    /**
     * Usuarios inscritos por intervalo de edad hombres
     */
    $sql="SELECT count(*) AS userPorIntervalo FROM Usuario  WHERE fechaNacimiento BETWEEN '1900-01-01' AND '1958-12-31' AND sexo LIKE '%H%'";
    $intervaloHombres1 = mysqli_query($con, $sql);
    //var_dump($intervaloHombres1);
    $hombresIntervalo1 = mysqli_fetch_array($intervaloHombres1);

    $sql="SELECT count(*) AS userPorIntervalo FROM Usuario  WHERE fechaNacimiento BETWEEN '1958-12-31' AND '1973-12-31' AND sexo LIKE '%H%'";
    $intervaloHombres2 = mysqli_query($con, $sql);
    //var_dump($intervaloHombres2);
    $hombresIntervalo2 = mysqli_fetch_array($intervaloHombres2);

    $sql="SELECT count(*) AS userPorIntervalo FROM Usuario  WHERE fechaNacimiento BETWEEN '1973-12-31' AND '1988-12-31' AND sexo LIKE '%H%'";
    $intervaloHombres3 = mysqli_query($con, $sql);
    //var_dump($intervaloHombres3);
    $hombresIntervalo3 = mysqli_fetch_array($intervaloHombres3);

    $sql="SELECT count(*) AS userPorIntervalo FROM Usuario  WHERE fechaNacimiento BETWEEN '1988-12-31' AND '2003-12-31' AND sexo LIKE '%H%'";
    $intervaloHombres4 = mysqli_query($con, $sql);
    //var_dump($intervaloHombres4);
    $hombresIntervalo4 = mysqli_fetch_array($intervaloHombres4);

    $sql="SELECT count(*) AS userPorIntervalo FROM Usuario  WHERE fechaNacimiento BETWEEN '2003-12-31' AND '2016-12-31' AND sexo LIKE '%H%'";
    $intervaloHombres5 = mysqli_query($con, $sql);
    //var_dump($intervaloHombres5);
    $hombresIntervalo5 = mysqli_fetch_array($intervaloHombres5);
    /**
     * Usuarios inscritos por intervalo de edad Autonomía economica
     * select count(*) from Usuario U1, ActividadesPorUsuario A1 where U1.idUsuarios = A1.Usuario_idUsuarios and A1.Actividades_TiposActividades_idTiposActividades =  '4' AND U1.fechaNacimiento between '1958-12-31' and '1973-12-31'
     */
    $sql="SELECT count(*) AS userPorIntervaloAutonomia FROM Usuario U1, ActividadesPorUsuario A1  WHERE U1.idUsuarios = A1.Usuario_idUsuarios and A1.Actividades_TiposActividades_idTiposActividades =  '3' AND U1.fechaNacimiento BETWEEN '1900-01-01' AND '1958-12-31'";
    $intervaloTotalesAutonomia1 = mysqli_query($con, $sql);
    //var_dump($intervaloTotalesAutonomia1);
    $totalesIntervaloAutonomia1 = mysqli_fetch_array($intervaloTotalesAutonomia1);

    $sql="SELECT count(*) AS userPorIntervaloAutonomia FROM Usuario U1, ActividadesPorUsuario A1  WHERE U1.idUsuarios = A1.Usuario_idUsuarios and A1.Actividades_TiposActividades_idTiposActividades =  '3' AND U1.fechaNacimiento  BETWEEN '1958-12-31' AND '1973-12-31'";
    $intervaloTotalesAutonomia2 = mysqli_query($con, $sql);
    //var_dump($intervaloTotalesAutonomia2);
    $totalesIntervaloAutonomia2 = mysqli_fetch_array($intervaloTotalesAutonomia2);

    $sql="SELECT count(*) AS userPorIntervaloAutonomia FROM Usuario U1, ActividadesPorUsuario A1  WHERE U1.idUsuarios = A1.Usuario_idUsuarios and A1.Actividades_TiposActividades_idTiposActividades =  '3' AND U1.fechaNacimiento  BETWEEN '1973-12-31' AND '1988-12-31'";
    $intervaloTotalesAutonomia3 = mysqli_query($con, $sql);
    //var_dump($intervaloTotalesAutonomia3);
    $totalesIntervaloAutonomia3 = mysqli_fetch_array($intervaloTotalesAutonomia3);

    $sql="SELECT count(*) AS userPorIntervaloAutonomia FROM Usuario U1, ActividadesPorUsuario A1  WHERE U1.idUsuarios = A1.Usuario_idUsuarios and A1.Actividades_TiposActividades_idTiposActividades =  '3' AND U1.fechaNacimiento  BETWEEN '1988-12-31' AND '2003-12-31'";
    $intervaloTotalesAutonomia4 = mysqli_query($con, $sql);
    //var_dump($intervaloTotalesAutonomia4);
    $totalesIntervaloAutonomia4 = mysqli_fetch_array($intervaloTotalesAutonomia4);

    $sql="SELECT count(*) AS userPorIntervaloAutonomia FROM Usuario U1, ActividadesPorUsuario A1  WHERE U1.idUsuarios = A1.Usuario_idUsuarios and A1.Actividades_TiposActividades_idTiposActividades =  '3' AND U1.fechaNacimiento  BETWEEN '2003-12-31' AND '2016-12-31'";
    $intervaloTotalesAutonomia5 = mysqli_query($con, $sql);
    //var_dump($intervaloTotalesAutonomia5);
    $totalesIntervaloAutonomia5 = mysqli_fetch_array($intervaloTotalesAutonomia5);
    /**
     * Usuarios inscritos por intervalo de edad Autonomía economica mujeres
     * select count(*) from Usuario U1, ActividadesPorUsuario A1 where U1.idUsuarios = A1.Usuario_idUsuarios and A1.Actividades_TiposActividades_idTiposActividades =  '4' AND U1.fechaNacimiento between '1958-12-31' and '1973-12-31'
     */
    $sql="SELECT count(*) AS userPorIntervaloAutonomia FROM Usuario U1, ActividadesPorUsuario A1  WHERE U1.idUsuarios = A1.Usuario_idUsuarios and A1.Actividades_TiposActividades_idTiposActividades =  '3' AND U1.fechaNacimiento BETWEEN '1900-01-01' AND '1958-12-31' AND U1.sexo LIKE '%M%'";
    $intervaloTotalesAutonomiaMujeres1 = mysqli_query($con, $sql);
    //var_dump($intervaloTotalesAutonomiaMujeres1);
    $totalesIntervaloAutonomiaMujeres1 = mysqli_fetch_array($intervaloTotalesAutonomiaMujeres1);

    $sql="SELECT count(*) AS userPorIntervaloAutonomia FROM Usuario U1, ActividadesPorUsuario A1  WHERE U1.idUsuarios = A1.Usuario_idUsuarios and A1.Actividades_TiposActividades_idTiposActividades =  '3' AND U1.fechaNacimiento  BETWEEN '1958-12-31' AND '1973-12-31' AND U1.sexo LIKE '%M%'";
    $intervaloTotalesAutonomiaMujeres2 = mysqli_query($con, $sql);
    //var_dump($intervaloTotalesAutonomiaMujeres2);
    $totalesIntervaloAutonomiaMujeres2 = mysqli_fetch_array($intervaloTotalesAutonomiaMujeres2);

    $sql="SELECT count(*) AS userPorIntervaloAutonomia FROM Usuario U1, ActividadesPorUsuario A1  WHERE U1.idUsuarios = A1.Usuario_idUsuarios and A1.Actividades_TiposActividades_idTiposActividades =  '3' AND U1.fechaNacimiento  BETWEEN '1973-12-31' AND '1988-12-31' AND U1.sexo LIKE '%M%'";
    $intervaloTotalesAutonomiaMujeres3 = mysqli_query($con, $sql);
    //var_dump($intervaloTotalesAutonomiaMujeres3);
    $totalesIntervaloAutonomiaMujeres3 = mysqli_fetch_array($intervaloTotalesAutonomiaMujeres3);

    $sql="SELECT count(*) AS userPorIntervaloAutonomia FROM Usuario U1, ActividadesPorUsuario A1  WHERE U1.idUsuarios = A1.Usuario_idUsuarios and A1.Actividades_TiposActividades_idTiposActividades =  '3' AND U1.fechaNacimiento  BETWEEN '1988-12-31' AND '2003-12-31' AND U1.sexo LIKE '%M%'";
    $intervaloTotalesAutonomiaMujeres4 = mysqli_query($con, $sql);
    //var_dump($intervaloTotalesAutonomiaMujeres4);
    $totalesIntervaloAutonomiaMujeres4 = mysqli_fetch_array($intervaloTotalesAutonomiaMujeres4);

    $sql="SELECT count(*) AS userPorIntervaloAutonomia FROM Usuario U1, ActividadesPorUsuario A1  WHERE U1.idUsuarios = A1.Usuario_idUsuarios and A1.Actividades_TiposActividades_idTiposActividades =  '3' AND U1.fechaNacimiento  BETWEEN '2003-12-31' AND '2016-12-31' AND U1.sexo LIKE '%M%'";
    $intervaloTotalesAutonomiaMujeres5 = mysqli_query($con, $sql);
    //var_dump($intervaloTotalesAutonomiaMujeres5);
    $totalesIntervaloAutonomiaMujeres5 = mysqli_fetch_array($intervaloTotalesAutonomiaMujeres5);
    /**
     * Usuarios inscritos por intervalo de edad Autonomía economica hombres
     * select count(*) from Usuario U1, ActividadesPorUsuario A1 where U1.idUsuarios = A1.Usuario_idUsuarios and A1.Actividades_TiposActividades_idTiposActividades =  '4' AND U1.fechaNacimiento between '1958-12-31' and '1973-12-31'
     */
    $sql="SELECT count(*) AS userPorIntervaloAutonomia FROM Usuario U1, ActividadesPorUsuario A1  WHERE U1.idUsuarios = A1.Usuario_idUsuarios and A1.Actividades_TiposActividades_idTiposActividades =  '3' AND U1.fechaNacimiento BETWEEN '1900-01-01' AND '1958-12-31' AND U1.sexo LIKE '%H%'";
    $intervaloTotalesAutonomiaHombres1 = mysqli_query($con, $sql);
    //var_dump($intervaloTotalesAutonomiaHombres1);
    $totalesIntervaloAutonomiaHombres1 = mysqli_fetch_array($intervaloTotalesAutonomiaHombres1);

    $sql="SELECT count(*) AS userPorIntervaloAutonomia FROM Usuario U1, ActividadesPorUsuario A1  WHERE U1.idUsuarios = A1.Usuario_idUsuarios and A1.Actividades_TiposActividades_idTiposActividades =  '3' AND U1.fechaNacimiento  BETWEEN '1958-12-31' AND '1973-12-31' AND U1.sexo LIKE '%H%'";
    $intervaloTotalesAutonomiaHombres2 = mysqli_query($con, $sql);
    //var_dump($intervaloTotalesAutonomiaHombres2);
    $totalesIntervaloAutonomiaHombres2 = mysqli_fetch_array($intervaloTotalesAutonomiaHombres2);

    $sql="SELECT count(*) AS userPorIntervaloAutonomia FROM Usuario U1, ActividadesPorUsuario A1  WHERE U1.idUsuarios = A1.Usuario_idUsuarios and A1.Actividades_TiposActividades_idTiposActividades =  '3' AND U1.fechaNacimiento  BETWEEN '1973-12-31' AND '1988-12-31' AND U1.sexo LIKE '%H%'";
    $intervaloTotalesAutonomiaHombres3 = mysqli_query($con, $sql);
    //var_dump($intervaloTotalesAutonomiaHombres3);
    $totalesIntervaloAutonomiaHombres3 = mysqli_fetch_array($intervaloTotalesAutonomiaHombres3);

    $sql="SELECT count(*) AS userPorIntervaloAutonomia FROM Usuario U1, ActividadesPorUsuario A1  WHERE U1.idUsuarios = A1.Usuario_idUsuarios and A1.Actividades_TiposActividades_idTiposActividades =  '3' AND U1.fechaNacimiento  BETWEEN '1988-12-31' AND '2003-12-31' AND U1.sexo LIKE '%H%'";
    $intervaloTotalesAutonomiaHombres4 = mysqli_query($con, $sql);
    //var_dump($intervaloTotalesAutonomiaHombres4);
    $totalesIntervaloAutonomiaHombres4 = mysqli_fetch_array($intervaloTotalesAutonomiaHombres4);

    $sql="SELECT count(*) AS userPorIntervaloAutonomia FROM Usuario U1, ActividadesPorUsuario A1  WHERE U1.idUsuarios = A1.Usuario_idUsuarios and A1.Actividades_TiposActividades_idTiposActividades =  '3' AND U1.fechaNacimiento  BETWEEN '2003-12-31' AND '2016-12-31' AND U1.sexo LIKE '%H%'";
    $intervaloTotalesAutonomiaHombres5 = mysqli_query($con, $sql);
    //var_dump($intervaloTotalesAutonomiaHombres5);
    $totalesIntervaloAutonomiaHombres5 = mysqli_fetch_array($intervaloTotalesAutonomiaHombres5);
    /**
     * Usuarios inscritos por intervalo de edad Ciberescuelas
     */
    $sql="SELECT count(*) AS userPorIntervaloCiberescuela FROM Usuario U1, ActividadesPorUsuario A1  WHERE U1.idUsuarios = A1.Usuario_idUsuarios and A1.Actividades_TiposActividades_idTiposActividades =  '4' AND U1.fechaNacimiento BETWEEN '1900-01-01' AND '1958-12-31'";
    $intervaloTotalesCiberescuela1 = mysqli_query($con, $sql);
    //var_dump($intervaloTotalesCiberescuela1);
    $totalesIntervaloCiberescuela1 = mysqli_fetch_array($intervaloTotalesCiberescuela1);

    $sql="SELECT count(*) AS userPorIntervaloCiberescuela FROM Usuario U1, ActividadesPorUsuario A1  WHERE U1.idUsuarios = A1.Usuario_idUsuarios and A1.Actividades_TiposActividades_idTiposActividades =  '4' AND U1.fechaNacimiento  BETWEEN '1958-12-31' AND '1973-12-31'";
    $intervaloTotalesCiberescuela2 = mysqli_query($con, $sql);
    //var_dump($intervaloTotalesCiberescuela2);
    $totalesIntervaloCiberescuela2 = mysqli_fetch_array($intervaloTotalesCiberescuela2);

    $sql="SELECT count(*) AS userPorIntervaloCiberescuela FROM Usuario U1, ActividadesPorUsuario A1  WHERE U1.idUsuarios = A1.Usuario_idUsuarios and A1.Actividades_TiposActividades_idTiposActividades =  '4' AND U1.fechaNacimiento  BETWEEN '1973-12-31' AND '1988-12-31'";
    $intervaloTotalesCiberescuela3 = mysqli_query($con, $sql);
    //var_dump($intervaloTotalesCiberescuela3);
    $totalesIntervaloCiberescuela3 = mysqli_fetch_array($intervaloTotalesCiberescuela3);

    $sql="SELECT count(*) AS userPorIntervaloCiberescuela FROM Usuario U1, ActividadesPorUsuario A1  WHERE U1.idUsuarios = A1.Usuario_idUsuarios and A1.Actividades_TiposActividades_idTiposActividades =  '4' AND U1.fechaNacimiento  BETWEEN '1988-12-31' AND '2003-12-31'";
    $intervaloTotalesCiberescuela4 = mysqli_query($con, $sql);
    //var_dump($intervaloTotalesCiberescuela4);
    $totalesIntervaloCiberescuela4 = mysqli_fetch_array($intervaloTotalesCiberescuela4);

    $sql="SELECT count(*) AS userPorIntervaloCiberescuela FROM Usuario U1, ActividadesPorUsuario A1  WHERE U1.idUsuarios = A1.Usuario_idUsuarios and A1.Actividades_TiposActividades_idTiposActividades =  '4' AND U1.fechaNacimiento  BETWEEN '2003-12-31' AND '2016-12-31'";
    $intervaloTotalesCiberescuela5 = mysqli_query($con, $sql);
    //var_dump($intervaloTotalesCiberescuela5);
    $totalesIntervaloCiberescuela5 = mysqli_fetch_array($intervaloTotalesCiberescuela5);
    /**
     * Usuarios inscritos por intervalo de edad Ciberescuelas mujeres
     */
    $sql="SELECT count(*) AS userPorIntervaloCiberescuela FROM Usuario U1, ActividadesPorUsuario A1  WHERE U1.idUsuarios = A1.Usuario_idUsuarios and A1.Actividades_TiposActividades_idTiposActividades =  '4' AND U1.fechaNacimiento BETWEEN '1900-01-01' AND '1958-12-31' AND U1.sexo LIKE '%M%'";
    $intervaloTotalesCiberescuelaMujeres1 = mysqli_query($con, $sql);
    //var_dump($intervaloTotalesCiberescuelaMujeres1);
    $totalesIntervaloCiberescuelaMujeres1 = mysqli_fetch_array($intervaloTotalesCiberescuelaMujeres1);

    $sql="SELECT count(*) AS userPorIntervaloCiberescuela FROM Usuario U1, ActividadesPorUsuario A1  WHERE U1.idUsuarios = A1.Usuario_idUsuarios and A1.Actividades_TiposActividades_idTiposActividades =  '4' AND U1.fechaNacimiento  BETWEEN '1958-12-31' AND '1973-12-31' AND U1.sexo LIKE '%M%'";
    $intervaloTotalesCiberescuelaMujeres2 = mysqli_query($con, $sql);
    //var_dump($intervaloTotalesCiberescuelaMujeres2);
    $totalesIntervaloCiberescuelaMujeres2 = mysqli_fetch_array($intervaloTotalesCiberescuelaMujeres2);

    $sql="SELECT count(*) AS userPorIntervaloCiberescuela FROM Usuario U1, ActividadesPorUsuario A1  WHERE U1.idUsuarios = A1.Usuario_idUsuarios and A1.Actividades_TiposActividades_idTiposActividades =  '4' AND U1.fechaNacimiento  BETWEEN '1973-12-31' AND '1988-12-31' AND U1.sexo LIKE '%M%'";
    $intervaloTotalesCiberescuelaMujeres3 = mysqli_query($con, $sql);
    //var_dump($intervaloTotalesCiberescuelaMujeres3);
    $totalesIntervaloCiberescuelaMujeres3 = mysqli_fetch_array($intervaloTotalesCiberescuelaMujeres3);

    $sql="SELECT count(*) AS userPorIntervaloCiberescuela FROM Usuario U1, ActividadesPorUsuario A1  WHERE U1.idUsuarios = A1.Usuario_idUsuarios and A1.Actividades_TiposActividades_idTiposActividades =  '4' AND U1.fechaNacimiento  BETWEEN '1988-12-31' AND '2003-12-31' AND U1.sexo LIKE '%M%'";
    $intervaloTotalesCiberescuelaMujeres4 = mysqli_query($con, $sql);
    //var_dump($intervaloTotalesCiberescuelaMujeres4);
    $totalesIntervaloCiberescuelaMujeres4 = mysqli_fetch_array($intervaloTotalesCiberescuelaMujeres4);

    $sql="SELECT count(*) AS userPorIntervaloCiberescuela FROM Usuario U1, ActividadesPorUsuario A1  WHERE U1.idUsuarios = A1.Usuario_idUsuarios and A1.Actividades_TiposActividades_idTiposActividades =  '4' AND U1.fechaNacimiento  BETWEEN '2003-12-31' AND '2016-12-31' AND U1.sexo LIKE '%M%'";
    $intervaloTotalesCiberescuelaMujeres5 = mysqli_query($con, $sql);
    //var_dump($intervaloTotalesCiberescuelaMujeres5);
    $totalesIntervaloCiberescuelaMujeres5 = mysqli_fetch_array($intervaloTotalesCiberescuelaMujeres5);
    /**
     * Usuarios inscritos por intervalo de edad Ciberescuelas hombres
     */
    $sql="SELECT count(*) AS userPorIntervaloCiberescuela FROM Usuario U1, ActividadesPorUsuario A1  WHERE U1.idUsuarios = A1.Usuario_idUsuarios and A1.Actividades_TiposActividades_idTiposActividades =  '4' AND U1.fechaNacimiento BETWEEN '1900-01-01' AND '1958-12-31' AND U1.sexo LIKE '%H%'";
    $intervaloTotalesCiberescuelaHombres1 = mysqli_query($con, $sql);
    //var_dump($intervaloTotalesCiberescuelaHombres1);
    $totalesIntervaloCiberescuelaHombres1 = mysqli_fetch_array($intervaloTotalesCiberescuelaHombres1);

    $sql="SELECT count(*) AS userPorIntervaloCiberescuela FROM Usuario U1, ActividadesPorUsuario A1  WHERE U1.idUsuarios = A1.Usuario_idUsuarios and A1.Actividades_TiposActividades_idTiposActividades =  '4' AND U1.fechaNacimiento  BETWEEN '1958-12-31' AND '1973-12-31' AND U1.sexo LIKE '%H%'";
    $intervaloTotalesCiberescuelaHombres2 = mysqli_query($con, $sql);
    //var_dump($intervaloTotalesCiberescuelaHombres2);
    $totalesIntervaloCiberescuelaHombres2 = mysqli_fetch_array($intervaloTotalesCiberescuelaHombres2);

    $sql="SELECT count(*) AS userPorIntervaloCiberescuela FROM Usuario U1, ActividadesPorUsuario A1  WHERE U1.idUsuarios = A1.Usuario_idUsuarios and A1.Actividades_TiposActividades_idTiposActividades =  '4' AND U1.fechaNacimiento  BETWEEN '1973-12-31' AND '1988-12-31' AND U1.sexo LIKE '%H%'";
    $intervaloTotalesCiberescuelaHombres3 = mysqli_query($con, $sql);
    //var_dump($intervaloTotalesCiberescuelaHombres3);
    $totalesIntervaloCiberescuelaHombres3 = mysqli_fetch_array($intervaloTotalesCiberescuelaHombres3);

    $sql="SELECT count(*) AS userPorIntervaloCiberescuela FROM Usuario U1, ActividadesPorUsuario A1  WHERE U1.idUsuarios = A1.Usuario_idUsuarios and A1.Actividades_TiposActividades_idTiposActividades =  '4' AND U1.fechaNacimiento  BETWEEN '1988-12-31' AND '2003-12-31' AND U1.sexo LIKE '%H%'";
    $intervaloTotalesCiberescuelaHombres4 = mysqli_query($con, $sql);
    //var_dump($intervaloTotalesCiberescuelaHombres4);
    $totalesIntervaloCiberescuelaHombres4 = mysqli_fetch_array($intervaloTotalesCiberescuelaHombres4);

    $sql="SELECT count(*) AS userPorIntervaloCiberescuela FROM Usuario U1, ActividadesPorUsuario A1  WHERE U1.idUsuarios = A1.Usuario_idUsuarios and A1.Actividades_TiposActividades_idTiposActividades =  '4' AND U1.fechaNacimiento  BETWEEN '2003-12-31' AND '2016-12-31' AND U1.sexo LIKE '%H%'";
    $intervaloTotalesCiberescuelaHombres5 = mysqli_query($con, $sql);
    //var_dump($intervaloTotalesCiberescuelaHombres5);
    $totalesIntervaloCiberescuelaHombres5 = mysqli_fetch_array($intervaloTotalesCiberescuelaHombres5);
    /**
     * uSUARIOS INSCRITOS POR gRUPO ÉTNICO
     */
    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%AKATEKOS%'";
    $totalesGrupoEtnico1 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnico1);
    $grupoEtnicoTotales1= mysqli_fetch_array($totalesGrupoEtnico1);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%AMUZGOS%'";
    $totalesGrupoEtnico2 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnico2);
    $grupoEtnicoTotales2= mysqli_fetch_array($totalesGrupoEtnico2);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%AWAKATEKOS%'";
    $totalesGrupoEtnico3 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnico3);
    $grupoEtnicoTotales3= mysqli_fetch_array($totalesGrupoEtnico3);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%AYAPANECOS%'";
    $totalesGrupoEtnico4 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnico4);
    $grupoEtnicoTotales4= mysqli_fetch_array($totalesGrupoEtnico4);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%CORAS%'";
    $totalesGrupoEtnico5 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnico5);
    $grupoEtnicoTotales5= mysqli_fetch_array($totalesGrupoEtnico5);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%CUCAPÁS%'";
    $totalesGrupoEtnico6 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnico6);
    $grupoEtnicoTotales6= mysqli_fetch_array($totalesGrupoEtnico6);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%CUICATECOS%'";
    $totalesGrupoEtnico7 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnico7);
    $grupoEtnicoTotales7= mysqli_fetch_array($totalesGrupoEtnico7);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%CHATINOS%'";
    $totalesGrupoEtnico8 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnico8);
    $grupoEtnicoTotales8= mysqli_fetch_array($totalesGrupoEtnico8);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%CHICHIMECAS%'";
    $totalesGrupoEtnico9 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnico9);
    $grupoEtnicoTotales9= mysqli_fetch_array($totalesGrupoEtnico9);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%CHINANTECO%'";
    $totalesGrupoEtnico10 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnico10);
    $grupoEtnicoTotales10= mysqli_fetch_array($totalesGrupoEtnico10);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%CHOLES%'";
    $totalesGrupoEtnico11 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnico11);
    $grupoEtnicoTotales11= mysqli_fetch_array($totalesGrupoEtnico11);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%CHOCHOLTECOS%'";
    $totalesGrupoEtnico12 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnico12);
    $grupoEtnicoTotales12= mysqli_fetch_array($totalesGrupoEtnico12);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%CHONTALES DE OAXACA%'";
    $totalesGrupoEtnico13 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnico13);
    $grupoEtnicoTotales13= mysqli_fetch_array($totalesGrupoEtnico13);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%CHONTALES DE TABASCO%'";
    $totalesGrupoEtnico14 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnico14);
    $grupoEtnicoTotales14= mysqli_fetch_array($totalesGrupoEtnico14);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%CHUJES%'";
    $totalesGrupoEtnico15 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnico15);
    $grupoEtnicoTotales15= mysqli_fetch_array($totalesGrupoEtnico15);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%GUARIJÍOS%'";
    $totalesGrupoEtnico16 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnico16);
    $grupoEtnicoTotales16= mysqli_fetch_array($totalesGrupoEtnico16);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%HUASTECO%'";
    $totalesGrupoEtnico17 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnico17);
    $grupoEtnicoTotales17= mysqli_fetch_array($totalesGrupoEtnico17);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%HUAVES%'";
    $totalesGrupoEtnico18 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnico18);
    $grupoEtnicoTotales18= mysqli_fetch_array($totalesGrupoEtnico18);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%HUICHOLES%'";
    $totalesGrupoEtnico19 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnico19);
    $grupoEtnicoTotales19= mysqli_fetch_array($totalesGrupoEtnico19);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%IXILES%'";
    $totalesGrupoEtnico20 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnico20);
    $grupoEtnicoTotales20= mysqli_fetch_array($totalesGrupoEtnico20);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%JAKALTEKOS%'";
    $totalesGrupoEtnico21 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnico21);
    $grupoEtnicoTotales21= mysqli_fetch_array($totalesGrupoEtnico21);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%KAQCHIKELES%'";
    $totalesGrupoEtnico22 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnico22);
    $grupoEtnicoTotales22= mysqli_fetch_array($totalesGrupoEtnico22);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%K`ICHES%'";
    $totalesGrupoEtnico23 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnico23);
    $grupoEtnicoTotales23= mysqli_fetch_array($totalesGrupoEtnico23);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%KU`AHLES%'";
    $totalesGrupoEtnico24 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnico24);
    $grupoEtnicoTotales24= mysqli_fetch_array($totalesGrupoEtnico24);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%KILIWAS%'";
    $totalesGrupoEtnico25 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnico25);
    $grupoEtnicoTotales25= mysqli_fetch_array($totalesGrupoEtnico25);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%KIKAPÚES%'";
    $totalesGrupoEtnico26 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnico26);
    $grupoEtnicoTotales26= mysqli_fetch_array($totalesGrupoEtnico26);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%KUMIAIS%'";
    $totalesGrupoEtnico27 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnico27);
    $grupoEtnicoTotales27= mysqli_fetch_array($totalesGrupoEtnico27);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%LACANDÓNES%'";
    $totalesGrupoEtnico28 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnico28);
    $grupoEtnicoTotales28= mysqli_fetch_array($totalesGrupoEtnico28);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%MAMES%'";
    $totalesGrupoEtnico29 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnico29);
    $grupoEtnicoTotales29= mysqli_fetch_array($totalesGrupoEtnico29);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%MATLATZINCAS%'";
    $totalesGrupoEtnico30 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnico30);
    $grupoEtnicoTotales30= mysqli_fetch_array($totalesGrupoEtnico30);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%MAYA%'";
    $totalesGrupoEtnico31 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnico31);
    $grupoEtnicoTotales31= mysqli_fetch_array($totalesGrupoEtnico31);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%MAYOS%'";
    $totalesGrupoEtnico32 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnico32);
    $grupoEtnicoTotales32= mysqli_fetch_array($totalesGrupoEtnico32);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%MAZAHUA%'";
    $totalesGrupoEtnico33 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnico33);
    $grupoEtnicoTotales33= mysqli_fetch_array($totalesGrupoEtnico33);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%MAZATECO%'";
    $totalesGrupoEtnico34 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnico34);
    $grupoEtnicoTotales34= mysqli_fetch_array($totalesGrupoEtnico34);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%MIXE%'";
    $totalesGrupoEtnico35 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnico35);
    $grupoEtnicoTotales35= mysqli_fetch_array($totalesGrupoEtnico35);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%MIXTECO%'";
    $totalesGrupoEtnico36 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnico36);
    $grupoEtnicoTotales36= mysqli_fetch_array($totalesGrupoEtnico36);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%NÁHU%'";
    $totalesGrupoEtnico37 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnico37);
    $grupoEtnicoTotales37= mysqli_fetch_array($totalesGrupoEtnico37);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%OLUTECOS%'";
    $totalesGrupoEtnico38 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnico38);
    $grupoEtnicoTotales38= mysqli_fetch_array($totalesGrupoEtnico38);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%OTOMÍ%'";
    $totalesGrupoEtnico39 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnico39);
    $grupoEtnicoTotales39= mysqli_fetch_array($totalesGrupoEtnico39);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%PAMES%'";
    $totalesGrupoEtnico40 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnico40);
    $grupoEtnicoTotales40= mysqli_fetch_array($totalesGrupoEtnico40);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%PAIPAIS%'";
    $totalesGrupoEtnico41 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnico41);
    $grupoEtnicoTotales41= mysqli_fetch_array($totalesGrupoEtnico41);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%PÁPAGOS%'";
    $totalesGrupoEtnico42 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnico42);
    $grupoEtnicoTotales42= mysqli_fetch_array($totalesGrupoEtnico42);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%PIMAS%'";
    $totalesGrupoEtnico43 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnico43);
    $grupoEtnicoTotales43= mysqli_fetch_array($totalesGrupoEtnico43);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%POPOLOCAS%'";
    $totalesGrupoEtnico44 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnico44);
    $grupoEtnicoTotales44= mysqli_fetch_array($totalesGrupoEtnico44);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%POPOLUCAS DE LA SIERRA%'";
    $totalesGrupoEtnico45 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnico45);
    $grupoEtnicoTotales45= mysqli_fetch_array($totalesGrupoEtnico45);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%Q`ANJOB`ALES%'";
    $totalesGrupoEtnico46 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnico46);
    $grupoEtnicoTotales46= mysqli_fetch_array($totalesGrupoEtnico46);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%Q`EQCHI`S%'";
    $totalesGrupoEtnico47 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnico47);
    $grupoEtnicoTotales47= mysqli_fetch_array($totalesGrupoEtnico47);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%QATO`K%'";
    $totalesGrupoEtnico48 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnico48);
    $grupoEtnicoTotales48= mysqli_fetch_array($totalesGrupoEtnico48);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%SAYULTECOS%'";
    $totalesGrupoEtnico49 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnico49);
    $grupoEtnicoTotales49= mysqli_fetch_array($totalesGrupoEtnico49);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%SERIS%'";
    $totalesGrupoEtnico50 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnico50);
    $grupoEtnicoTotales50= mysqli_fetch_array($totalesGrupoEtnico50);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%TACUATES%'";
    $totalesGrupoEtnico51 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnico51);
    $grupoEtnicoTotales51= mysqli_fetch_array($totalesGrupoEtnico51);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%TARAHUMARAS%'";
    $totalesGrupoEtnico52 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnico52);
    $grupoEtnicoTotales52= mysqli_fetch_array($totalesGrupoEtnico52);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%Purépecha%'";
    $totalesGrupoEtnico53 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnico53);
    $grupoEtnicoTotales53= mysqli_fetch_array($totalesGrupoEtnico53);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%TEKOS%'";
    $totalesGrupoEtnico54 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnico54);
    $grupoEtnicoTotales54= mysqli_fetch_array($totalesGrupoEtnico54);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%TEPEHUAS%'";
    $totalesGrupoEtnico55 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnico55);
    $grupoEtnicoTotales55= mysqli_fetch_array($totalesGrupoEtnico55);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%TEPEHUANOS DEL NORTE%'";
    $totalesGrupoEtnico56 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnico56);
    $grupoEtnicoTotales56= mysqli_fetch_array($totalesGrupoEtnico56);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%TEPEHUANOS DEL SUR%'";
    $totalesGrupoEtnico57 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnico57);
    $grupoEtnicoTotales57= mysqli_fetch_array($totalesGrupoEtnico57);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%TEXISTEPEQUEÑOS%'";
    $totalesGrupoEtnico58 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnico58);
    $grupoEtnicoTotales58= mysqli_fetch_array($totalesGrupoEtnico58);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%TLAHUICAS%'";
    $totalesGrupoEtnico59 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnico59);
    $grupoEtnicoTotales59= mysqli_fetch_array($totalesGrupoEtnico59);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%TLAPANECO%'";
    $totalesGrupoEtnico60 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnico60);
    $grupoEtnicoTotales60= mysqli_fetch_array($totalesGrupoEtnico60);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%TOJOLABALES%'";
    $totalesGrupoEtnico61 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnico61);
    $grupoEtnicoTotales61= mysqli_fetch_array($totalesGrupoEtnico61);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%TOTONAC%'";
    $totalesGrupoEtnico62 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnico62);
    $grupoEtnicoTotales62= mysqli_fetch_array($totalesGrupoEtnico62);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%TRIQUI%'";
    $totalesGrupoEtnico63 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnico63);
    $grupoEtnicoTotales63= mysqli_fetch_array($totalesGrupoEtnico63);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%TZELTAL%'";
    $totalesGrupoEtnico64 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnico64);
    $grupoEtnicoTotales64= mysqli_fetch_array($totalesGrupoEtnico64);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%TZOTZIL%'";
    $totalesGrupoEtnico65 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnico65);
    $grupoEtnicoTotales65= mysqli_fetch_array($totalesGrupoEtnico65);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%YAQUIS%'";
    $totalesGrupoEtnico66 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnico66);
    $grupoEtnicoTotales66= mysqli_fetch_array($totalesGrupoEtnico66);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%ZAPOTECO%'";
    $totalesGrupoEtnico67 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnico67);
    $grupoEtnicoTotales67= mysqli_fetch_array($totalesGrupoEtnico67);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%ZOQUES%'";
    $totalesGrupoEtnico68 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnico68);
    $grupoEtnicoTotales68= mysqli_fetch_array($totalesGrupoEtnico68);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%NINGUNO%'";
    $totalesGrupoEtnico69 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnico69);
    $grupoEtnicoTotales69= mysqli_fetch_array($totalesGrupoEtnico69);
     /**
     * uSUARIOS INSCRITOS POR gRUPO ÉTNICO Mujeres
     */
    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%AKATEKOS%' AND sexo LIKE '%M%'";
    $totalesGrupoEtnicoMujeres1 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoMujeres1);
    $grupoEtnicoMujeres1= mysqli_fetch_array($totalesGrupoEtnicoMujeres1);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%AMUZGOS%' AND sexo LIKE '%M%'";
    $totalesGrupoEtnicoMujeres2 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoMujeres2);
    $grupoEtnicoMujeres2= mysqli_fetch_array($totalesGrupoEtnicoMujeres2);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%AWAKATEKOS%' AND sexo LIKE '%M%'";
    $totalesGrupoEtnicoMujeres3 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoMujeres3);
    $grupoEtnicoMujeres3= mysqli_fetch_array($totalesGrupoEtnicoMujeres3);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%AYAPANECOS%' AND sexo LIKE '%M%'";
    $totalesGrupoEtnicoMujeres4 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoMujeres4);
    $grupoEtnicoMujeres4= mysqli_fetch_array($totalesGrupoEtnicoMujeres4);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%CORAS%' AND sexo LIKE '%M%'";
    $totalesGrupoEtnicoMujeres5 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoMujeres5);
    $grupoEtnicoMujeres5= mysqli_fetch_array($totalesGrupoEtnicoMujeres5);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%CUCAPÁS%' AND sexo LIKE '%M%'";
    $totalesGrupoEtnicoMujeres6 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoMujeres6);
    $grupoEtnicoMujeres6= mysqli_fetch_array($totalesGrupoEtnicoMujeres6);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%CUICATECOS%' AND sexo LIKE '%M%'";
    $totalesGrupoEtnicoMujeres7 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoMujeres7);
    $grupoEtnicoMujeres7= mysqli_fetch_array($totalesGrupoEtnicoMujeres7);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%CHATINOS%' AND sexo LIKE '%M%'";
    $totalesGrupoEtnicoMujeres8 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoMujeres8);
    $grupoEtnicoMujeres8= mysqli_fetch_array($totalesGrupoEtnicoMujeres8);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%CHICHIMECAS%' AND sexo LIKE '%M%'";
    $totalesGrupoEtnicoMujeres9 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoMujeres9);
    $grupoEtnicoMujeres9= mysqli_fetch_array($totalesGrupoEtnicoMujeres9);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%CHINANTECO%' AND sexo LIKE '%M%'";
    $totalesGrupoEtnicoMujeres10 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoMujeres10);
    $grupoEtnicoMujeres10= mysqli_fetch_array($totalesGrupoEtnicoMujeres10);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%CHOLES%' AND sexo LIKE '%M%'";
    $totalesGrupoEtnicoMujeres11 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoMujeres11);
    $grupoEtnicoMujeres11= mysqli_fetch_array($totalesGrupoEtnicoMujeres11);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%CHOCHOLTECOS%' AND sexo LIKE '%M%'";
    $totalesGrupoEtnicoMujeres12 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoMujeres12);
    $grupoEtnicoMujeres12= mysqli_fetch_array($totalesGrupoEtnicoMujeres12);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%CHONTALES DE OAXACA%' AND sexo LIKE '%M%'";
    $totalesGrupoEtnicoMujeres13 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoMujeres13);
    $grupoEtnicoMujeres13= mysqli_fetch_array($totalesGrupoEtnicoMujeres13);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%CHONTALES DE TABASCO%' AND sexo LIKE '%M%'";
    $totalesGrupoEtnicoMujeres14 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoMujeres14);
    $grupoEtnicoMujeres14= mysqli_fetch_array($totalesGrupoEtnicoMujeres14);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%CHUJES%' AND sexo LIKE '%M%'";
    $totalesGrupoEtnicoMujeres15 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoMujeres15);
    $grupoEtnicoMujeres15= mysqli_fetch_array($totalesGrupoEtnicoMujeres15);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%GUARIJÍOS%' AND sexo LIKE '%M%'";
    $totalesGrupoEtnicoMujeres16 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoMujeres16);
    $grupoEtnicoMujeres16= mysqli_fetch_array($totalesGrupoEtnicoMujeres16);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%HUASTECO%' AND sexo LIKE '%M%'";
    $totalesGrupoEtnicoMujeres17 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoMujeres17);
    $grupoEtnicoMujeres17= mysqli_fetch_array($totalesGrupoEtnicoMujeres17);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%HUAVES%' AND sexo LIKE '%M%'";
    $totalesGrupoEtnicoMujeres18 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoMujeres18);
    $grupoEtnicoMujeres18= mysqli_fetch_array($totalesGrupoEtnicoMujeres18);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%HUICHOLES%' AND sexo LIKE '%M%'";
    $totalesGrupoEtnicoMujeres19 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoMujeres19);
    $grupoEtnicoMujeres19= mysqli_fetch_array($totalesGrupoEtnicoMujeres19);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%IXILES%' AND sexo LIKE '%M%'";
    $totalesGrupoEtnicoMujeres20 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoMujeres20);
    $grupoEtnicoMujeres20= mysqli_fetch_array($totalesGrupoEtnicoMujeres20);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%JAKALTEKOS%' AND sexo LIKE '%M%'";
    $totalesGrupoEtnicoMujeres21 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoMujeres21);
    $grupoEtnicoMujeres21= mysqli_fetch_array($totalesGrupoEtnicoMujeres21);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%KAQCHIKELES%' AND sexo LIKE '%M%'";
    $totalesGrupoEtnicoMujeres22 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoMujeres22);
    $grupoEtnicoMujeres22= mysqli_fetch_array($totalesGrupoEtnicoMujeres22);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%K`ICHES%' AND sexo LIKE '%M%'";
    $totalesGrupoEtnicoMujeres23 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoMujeres23);
    $grupoEtnicoMujeres23= mysqli_fetch_array($totalesGrupoEtnicoMujeres23);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%KU`AHLES%' AND sexo LIKE '%M%'";
    $totalesGrupoEtnicoMujeres24 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoMujeres24);
    $grupoEtnicoMujeres24= mysqli_fetch_array($totalesGrupoEtnicoMujeres24);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%KILIWAS%' AND sexo LIKE '%M%'";
    $totalesGrupoEtnicoMujeres25 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoMujeres25);
    $grupoEtnicoMujeres25= mysqli_fetch_array($totalesGrupoEtnicoMujeres25);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%KIKAPÚES%' AND sexo LIKE '%M%'";
    $totalesGrupoEtnicoMujeres26 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoMujeres26);
    $grupoEtnicoMujeres26= mysqli_fetch_array($totalesGrupoEtnicoMujeres26);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%KUMIAIS%' AND sexo LIKE '%M%'";
    $totalesGrupoEtnicoMujeres27 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoMujeres27);
    $grupoEtnicoMujeres27= mysqli_fetch_array($totalesGrupoEtnicoMujeres27);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%LACANDÓNES%' AND sexo LIKE '%M%'";
    $totalesGrupoEtnicoMujeres28 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoMujeres28);
    $grupoEtnicoMujeres28= mysqli_fetch_array($totalesGrupoEtnicoMujeres28);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%MAMES%' AND sexo LIKE '%M%'";
    $totalesGrupoEtnicoMujeres29 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoMujeres29);
    $grupoEtnicoMujeres29= mysqli_fetch_array($totalesGrupoEtnicoMujeres29);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%MATLATZINCAS%' AND sexo LIKE '%M%'";
    $totalesGrupoEtnicoMujeres30 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoMujeres30);
    $grupoEtnicoMujeres30= mysqli_fetch_array($totalesGrupoEtnicoMujeres30);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%MAYA%' AND sexo LIKE '%M%'";
    $totalesGrupoEtnicoMujeres31 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoMujeres31);
    $grupoEtnicoMujeres31= mysqli_fetch_array($totalesGrupoEtnicoMujeres31);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%MAYOS%' AND sexo LIKE '%M%'";
    $totalesGrupoEtnicoMujeres32 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoMujeres32);
    $grupoEtnicoMujeres32= mysqli_fetch_array($totalesGrupoEtnicoMujeres32);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%MAZAHUA%' AND sexo LIKE '%M%'";
    $totalesGrupoEtnicoMujeres33 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoMujeres33);
    $grupoEtnicoMujeres33= mysqli_fetch_array($totalesGrupoEtnicoMujeres33);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%MAZATECO%' AND sexo LIKE '%M%'";
    $totalesGrupoEtnicoMujeres34 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoMujeres34);
    $grupoEtnicoMujeres34= mysqli_fetch_array($totalesGrupoEtnicoMujeres34);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%MIXE%' AND sexo LIKE '%M%'";
    $totalesGrupoEtnicoMujeres35 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoMujeres35);
    $grupoEtnicoMujeres35= mysqli_fetch_array($totalesGrupoEtnicoMujeres35);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%MIXTECO%' AND sexo LIKE '%M%'";
    $totalesGrupoEtnicoMujeres36 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoMujeres36);
    $grupoEtnicoMujeres36= mysqli_fetch_array($totalesGrupoEtnicoMujeres36);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%NÁHU%' AND sexo LIKE '%M%'";
    $totalesGrupoEtnicoMujeres37 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoMujeres37);
    $grupoEtnicoMujeres37= mysqli_fetch_array($totalesGrupoEtnicoMujeres37);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%OLUTECOS%' AND sexo LIKE '%M%'";
    $totalesGrupoEtnicoMujeres38 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoMujeres38);
    $grupoEtnicoMujeres38= mysqli_fetch_array($totalesGrupoEtnicoMujeres38);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%OTOMÍ%' AND sexo LIKE '%M%'";
    $totalesGrupoEtnicoMujeres39 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoMujeres39);
    $grupoEtnicoMujeres39= mysqli_fetch_array($totalesGrupoEtnicoMujeres39);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%PAMES%' AND sexo LIKE '%M%'";
    $totalesGrupoEtnicoMujeres40 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoMujeres40);
    $grupoEtnicoMujeres40= mysqli_fetch_array($totalesGrupoEtnicoMujeres40);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%PAIPAIS%' AND sexo LIKE '%M%'";
    $totalesGrupoEtnicoMujeres41 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoMujeres41);
    $grupoEtnicoMujeres41= mysqli_fetch_array($totalesGrupoEtnicoMujeres41);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%PÁPAGOS%' AND sexo LIKE '%M%'";
    $totalesGrupoEtnicoMujeres42 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoMujeres42);
    $grupoEtnicoMujeres42= mysqli_fetch_array($totalesGrupoEtnicoMujeres42);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%PIMAS%' AND sexo LIKE '%M%'";
    $totalesGrupoEtnicoMujeres43 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoMujeres43);
    $grupoEtnicoMujeres43= mysqli_fetch_array($totalesGrupoEtnicoMujeres43);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%POPOLOCAS%' AND sexo LIKE '%M%'";
    $totalesGrupoEtnicoMujeres44 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoMujeres44);
    $grupoEtnicoMujeres44= mysqli_fetch_array($totalesGrupoEtnicoMujeres44);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%POPOLUCAS DE LA SIERRA%' AND sexo LIKE '%M%'";
    $totalesGrupoEtnicoMujeres45 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoMujeres45);
    $grupoEtnicoMujeres45= mysqli_fetch_array($totalesGrupoEtnicoMujeres45);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%Q`ANJOB`ALES%' AND sexo LIKE '%M%'";
    $totalesGrupoEtnicoMujeres46 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoMujeres46);
    $grupoEtnicoMujeres46= mysqli_fetch_array($totalesGrupoEtnicoMujeres46);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%Q`EQCHI`S%' AND sexo LIKE '%M%'";
    $totalesGrupoEtnicoMujeres47 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoMujeres47);
    $grupoEtnicoMujeres47= mysqli_fetch_array($totalesGrupoEtnicoMujeres47);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%QATO`K%' AND sexo LIKE '%M%'";
    $totalesGrupoEtnicoMujeres48 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoMujeres48);
    $grupoEtnicoMujeres48= mysqli_fetch_array($totalesGrupoEtnicoMujeres48);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%SAYULTECOS%' AND sexo LIKE '%M%'";
    $totalesGrupoEtnicoMujeres49 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoMujeres49);
    $grupoEtnicoMujeres49= mysqli_fetch_array($totalesGrupoEtnicoMujeres49);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%SERIS%' AND sexo LIKE '%M%'";
    $totalesGrupoEtnicoMujeres50 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoMujeres50);
    $grupoEtnicoMujeres50= mysqli_fetch_array($totalesGrupoEtnicoMujeres50);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%TACUATES%' AND sexo LIKE '%M%'";
    $totalesGrupoEtnicoMujeres51 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoMujeres51);
    $grupoEtnicoMujeres51= mysqli_fetch_array($totalesGrupoEtnicoMujeres51);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%TARAHUMARAS%' AND sexo LIKE '%M%'";
    $totalesGrupoEtnicoMujeres52 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoMujeres52);
    $grupoEtnicoMujeres52= mysqli_fetch_array($totalesGrupoEtnicoMujeres52);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%Purépecha%' AND sexo LIKE '%M%'";
    $totalesGrupoEtnicoMujeres53 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoMujeres53);
    $grupoEtnicoMujeres53= mysqli_fetch_array($totalesGrupoEtnicoMujeres53);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%TEKOS%' AND sexo LIKE '%M%'";
    $totalesGrupoEtnicoMujeres54 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoMujeres54);
    $grupoEtnicoMujeres54= mysqli_fetch_array($totalesGrupoEtnicoMujeres54);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%TEPEHUAS%' AND sexo LIKE '%M%'";
    $totalesGrupoEtnicoMujeres55 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoMujeres55);
    $grupoEtnicoMujeres55= mysqli_fetch_array($totalesGrupoEtnicoMujeres55);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%TEPEHUANOS DEL NORTE%' AND sexo LIKE '%M%'";
    $totalesGrupoEtnicoMujeres56 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoMujeres56);
    $grupoEtnicoMujeres56= mysqli_fetch_array($totalesGrupoEtnicoMujeres56);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%TEPEHUANOS DEL SUR%' AND sexo LIKE '%M%'";
    $totalesGrupoEtnicoMujeres57 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoMujeres57);
    $grupoEtnicoMujeres57= mysqli_fetch_array($totalesGrupoEtnicoMujeres57);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%TEXISTEPEQUEÑOS%' AND sexo LIKE '%M%'";
    $totalesGrupoEtnicoMujeres58 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoMujeres58);
    $grupoEtnicoMujeres58= mysqli_fetch_array($totalesGrupoEtnicoMujeres58);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%TLAHUICAS%' AND sexo LIKE '%M%'";
    $totalesGrupoEtnicoMujeres59 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoMujeres59);
    $grupoEtnicoMujeres59= mysqli_fetch_array($totalesGrupoEtnicoMujeres59);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%TLAPANECO%' AND sexo LIKE '%M%'";
    $totalesGrupoEtnicoMujeres60 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoMujeres60);
    $grupoEtnicoMujeres60= mysqli_fetch_array($totalesGrupoEtnicoMujeres60);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%TOJOLABALES%' AND sexo LIKE '%M%'";
    $totalesGrupoEtnicoMujeres61 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoMujeres61);
    $grupoEtnicoMujeres61= mysqli_fetch_array($totalesGrupoEtnicoMujeres61);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%TOTONAC%' AND sexo LIKE '%M%'";
    $totalesGrupoEtnicoMujeres62 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoMujeres62);
    $grupoEtnicoMujeres62= mysqli_fetch_array($totalesGrupoEtnicoMujeres62);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%TRIQUI%' AND sexo LIKE '%M%'";
    $totalesGrupoEtnicoMujeres63 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoMujeres63);
    $grupoEtnicoMujeres63= mysqli_fetch_array($totalesGrupoEtnicoMujeres63);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%TZELTAL%' AND sexo LIKE '%M%'";
    $totalesGrupoEtnicoMujeres64 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoMujeres64);
    $grupoEtnicoMujeres64= mysqli_fetch_array($totalesGrupoEtnicoMujeres64);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%TZOTZIL%' AND sexo LIKE '%M%'";
    $totalesGrupoEtnicoMujeres65 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoMujeres65);
    $grupoEtnicoMujeres65= mysqli_fetch_array($totalesGrupoEtnicoMujeres65);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%YAQUIS%' AND sexo LIKE '%M%'";
    $totalesGrupoEtnicoMujeres66 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoMujeres66);
    $grupoEtnicoMujeres66= mysqli_fetch_array($totalesGrupoEtnicoMujeres66);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%ZAPOTECO%' AND sexo LIKE '%M%'";
    $totalesGrupoEtnicoMujeres67 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoMujeres67);
    $grupoEtnicoMujeres67= mysqli_fetch_array($totalesGrupoEtnicoMujeres67);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%ZOQUES%' AND sexo LIKE '%M%'";
    $totalesGrupoEtnicoMujeres68 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoMujeres68);
    $grupoEtnicoMujeres68= mysqli_fetch_array($totalesGrupoEtnicoMujeres68);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%NINGUNO%' AND sexo LIKE '%M%'";
    $totalesGrupoEtnicoMujeres69 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoMujeres69);
    $grupoEtnicoMujeres69= mysqli_fetch_array($totalesGrupoEtnicoMujeres69);
     /**
     * uSUARIOS INSCRITOS POR gRUPO ÉTNICO Hombres
     */
    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%AKATEKOS%' AND sexo LIKE '%H%'";
    $totalesGrupoEtnicoHombres1 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoHombres1);
    $grupoEtnicoHombres1= mysqli_fetch_array($totalesGrupoEtnicoHombres1);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%AMUZGOS%' AND sexo LIKE '%H%'";
    $totalesGrupoEtnicoHombres2 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoHombres2);
    $grupoEtnicoHombres2= mysqli_fetch_array($totalesGrupoEtnicoHombres2);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%AWAKATEKOS%' AND sexo LIKE '%H%'";
    $totalesGrupoEtnicoHombres3 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoHombres3);
    $grupoEtnicoHombres3= mysqli_fetch_array($totalesGrupoEtnicoHombres3);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%AYAPANECOS%' AND sexo LIKE '%H%'";
    $totalesGrupoEtnicoHombres4 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoHombres4);
    $grupoEtnicoHombres4= mysqli_fetch_array($totalesGrupoEtnicoHombres4);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%CORAS%' AND sexo LIKE '%H%'";
    $totalesGrupoEtnicoHombres5 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoHombres5);
    $grupoEtnicoHombres5= mysqli_fetch_array($totalesGrupoEtnicoHombres5);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%CUCAPÁS%' AND sexo LIKE '%H%'";
    $totalesGrupoEtnicoHombres6 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoHombres6);
    $grupoEtnicoHombres6= mysqli_fetch_array($totalesGrupoEtnicoHombres6);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%CUICATECOS%' AND sexo LIKE '%H%'";
    $totalesGrupoEtnicoHombres7 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoHombres7);
    $grupoEtnicoHombres7= mysqli_fetch_array($totalesGrupoEtnicoHombres7);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%CHATINOS%' AND sexo LIKE '%H%'";
    $totalesGrupoEtnicoHombres8 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoHombres8);
    $grupoEtnicoHombres8= mysqli_fetch_array($totalesGrupoEtnicoHombres8);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%CHICHIMECAS%' AND sexo LIKE '%H%'";
    $totalesGrupoEtnicoHombres9 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoHombres9);
    $grupoEtnicoHombres9= mysqli_fetch_array($totalesGrupoEtnicoHombres9);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%CHINANTECO%' AND sexo LIKE '%H%'";
    $totalesGrupoEtnicoHombres10 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoHombres10);
    $grupoEtnicoHombres10= mysqli_fetch_array($totalesGrupoEtnicoHombres10);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%CHOLES%' AND sexo LIKE '%H%'";
    $totalesGrupoEtnicoHombres11 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoHombres11);
    $grupoEtnicoHombres11= mysqli_fetch_array($totalesGrupoEtnicoHombres11);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%CHOCHOLTECOS%' AND sexo LIKE '%H%'";
    $totalesGrupoEtnicoHombres12 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoHombres12);
    $grupoEtnicoHombres12= mysqli_fetch_array($totalesGrupoEtnicoHombres12);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%CHONTALES DE OAXACA%' AND sexo LIKE '%H%'";
    $totalesGrupoEtnicoHombres13 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoHombres13);
    $grupoEtnicoHombres13= mysqli_fetch_array($totalesGrupoEtnicoHombres13);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%CHONTALES DE TABASCO%' AND sexo LIKE '%H%'";
    $totalesGrupoEtnicoHombres14 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoHombres14);
    $grupoEtnicoHombres14= mysqli_fetch_array($totalesGrupoEtnicoHombres14);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%CHUJES%' AND sexo LIKE '%H%'";
    $totalesGrupoEtnicoHombres15 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoHombres15);
    $grupoEtnicoHombres15= mysqli_fetch_array($totalesGrupoEtnicoHombres15);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%GUARIJÍOS%' AND sexo LIKE '%H%'";
    $totalesGrupoEtnicoHombres16 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoHombres16);
    $grupoEtnicoHombres16= mysqli_fetch_array($totalesGrupoEtnicoHombres16);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%HUASTECO%' AND sexo LIKE '%H%'";
    $totalesGrupoEtnicoHombres17 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoHombres17);
    $grupoEtnicoHombres17= mysqli_fetch_array($totalesGrupoEtnicoHombres17);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%HUAVES%' AND sexo LIKE '%H%'";
    $totalesGrupoEtnicoHombres18 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoHombres18);
    $grupoEtnicoHombres18= mysqli_fetch_array($totalesGrupoEtnicoHombres18);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%HUICHOLES%' AND sexo LIKE '%H%'";
    $totalesGrupoEtnicoHombres19 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoHombres19);
    $grupoEtnicoHombres19= mysqli_fetch_array($totalesGrupoEtnicoHombres19);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%IXILES%' AND sexo LIKE '%H%'";
    $totalesGrupoEtnicoHombres20 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoHombres20);
    $grupoEtnicoHombres20= mysqli_fetch_array($totalesGrupoEtnicoHombres20);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%JAKALTEKOS%' AND sexo LIKE '%H%'";
    $totalesGrupoEtnicoHombres21 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoHombres21);
    $grupoEtnicoHombres21= mysqli_fetch_array($totalesGrupoEtnicoHombres21);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%KAQCHIKELES%' AND sexo LIKE '%H%'";
    $totalesGrupoEtnicoHombres22 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoHombres22);
    $grupoEtnicoHombres22= mysqli_fetch_array($totalesGrupoEtnicoHombres22);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%K`ICHES%' AND sexo LIKE '%H%'";
    $totalesGrupoEtnicoHombres23 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoHombres23);
    $grupoEtnicoHombres23= mysqli_fetch_array($totalesGrupoEtnicoHombres23);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%KU`AHLES%' AND sexo LIKE '%H%'";
    $totalesGrupoEtnicoHombres24 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoHombres24);
    $grupoEtnicoHombres24= mysqli_fetch_array($totalesGrupoEtnicoHombres24);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%KILIWAS%' AND sexo LIKE '%H%'";
    $totalesGrupoEtnicoHombres25 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoHombres25);
    $grupoEtnicoHombres25= mysqli_fetch_array($totalesGrupoEtnicoHombres25);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%KIKAPÚES%' AND sexo LIKE '%H%'";
    $totalesGrupoEtnicoHombres26 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoHombres26);
    $grupoEtnicoHombres26= mysqli_fetch_array($totalesGrupoEtnicoHombres26);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%KUMIAIS%' AND sexo LIKE '%H%'";
    $totalesGrupoEtnicoHombres27 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoHombres27);
    $grupoEtnicoHombres27= mysqli_fetch_array($totalesGrupoEtnicoHombres27);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%LACANDÓNES%' AND sexo LIKE '%H%'";
    $totalesGrupoEtnicoHombres28 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoHombres28);
    $grupoEtnicoHombres28= mysqli_fetch_array($totalesGrupoEtnicoHombres28);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%MAMES%' AND sexo LIKE '%H%'";
    $totalesGrupoEtnicoHombres29 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoHombres29);
    $grupoEtnicoHombres29= mysqli_fetch_array($totalesGrupoEtnicoHombres29);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%MATLATZINCAS%' AND sexo LIKE '%H%'";
    $totalesGrupoEtnicoHombres30 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoHombres30);
    $grupoEtnicoHombres30= mysqli_fetch_array($totalesGrupoEtnicoHombres30);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%MAYA%' AND sexo LIKE '%H%'";
    $totalesGrupoEtnicoHombres31 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoHombres31);
    $grupoEtnicoHombres31= mysqli_fetch_array($totalesGrupoEtnicoHombres31);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%MAYOS%' AND sexo LIKE '%H%'";
    $totalesGrupoEtnicoHombres32 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoHombres32);
    $grupoEtnicoHombres32= mysqli_fetch_array($totalesGrupoEtnicoHombres32);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%MAZAHUA%' AND sexo LIKE '%H%'";
    $totalesGrupoEtnicoHombres33 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoHombres33);
    $grupoEtnicoHombres33= mysqli_fetch_array($totalesGrupoEtnicoHombres33);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%MAZATECO%' AND sexo LIKE '%H%'";
    $totalesGrupoEtnicoHombres34 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoHombres34);
    $grupoEtnicoHombres34= mysqli_fetch_array($totalesGrupoEtnicoHombres34);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%MIXE%' AND sexo LIKE '%H%'";
    $totalesGrupoEtnicoHombres35 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoHombres35);
    $grupoEtnicoHombres35= mysqli_fetch_array($totalesGrupoEtnicoHombres35);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%MIXTECO%' AND sexo LIKE '%H%'";
    $totalesGrupoEtnicoHombres36 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoHombres36);
    $grupoEtnicoHombres36= mysqli_fetch_array($totalesGrupoEtnicoHombres36);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%NÁHU%' AND sexo LIKE '%H%'";
    $totalesGrupoEtnicoHombres37 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoHombres37);
    $grupoEtnicoHombres37= mysqli_fetch_array($totalesGrupoEtnicoHombres37);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%OLUTECOS%' AND sexo LIKE '%H%'";
    $totalesGrupoEtnicoHombres38 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoHombres38);
    $grupoEtnicoHombres38= mysqli_fetch_array($totalesGrupoEtnicoHombres38);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%OTOMÍ%' AND sexo LIKE '%H%'";
    $totalesGrupoEtnicoHombres39 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoHombres39);
    $grupoEtnicoHombres39= mysqli_fetch_array($totalesGrupoEtnicoHombres39);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%PAMES%' AND sexo LIKE '%H%'";
    $totalesGrupoEtnicoHombres40 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoHombres40);
    $grupoEtnicoHombres40= mysqli_fetch_array($totalesGrupoEtnicoHombres40);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%PAIPAIS%' AND sexo LIKE '%H%'";
    $totalesGrupoEtnicoHombres41 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoHombres41);
    $grupoEtnicoHombres41= mysqli_fetch_array($totalesGrupoEtnicoHombres41);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%PÁPAGOS%' AND sexo LIKE '%H%'";
    $totalesGrupoEtnicoHombres42 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoHombres42);
    $grupoEtnicoHombres42= mysqli_fetch_array($totalesGrupoEtnicoHombres42);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%PIMAS%' AND sexo LIKE '%H%'";
    $totalesGrupoEtnicoHombres43 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoHombres43);
    $grupoEtnicoHombres43= mysqli_fetch_array($totalesGrupoEtnicoHombres43);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%POPOLOCAS%' AND sexo LIKE '%H%'";
    $totalesGrupoEtnicoHombres44 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoHombres44);
    $grupoEtnicoHombres44= mysqli_fetch_array($totalesGrupoEtnicoHombres44);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%POPOLUCAS DE LA SIERRA%' AND sexo LIKE '%H%'";
    $totalesGrupoEtnicoHombres45 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoHombres45);
    $grupoEtnicoHombres45= mysqli_fetch_array($totalesGrupoEtnicoHombres45);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%Q`ANJOB`ALES%' AND sexo LIKE '%H%'";
    $totalesGrupoEtnicoHombres46 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoHombres46);
    $grupoEtnicoHombres46= mysqli_fetch_array($totalesGrupoEtnicoHombres46);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%Q`EQCHI`S%' AND sexo LIKE '%H%'";
    $totalesGrupoEtnicoHombres47 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoHombres47);
    $grupoEtnicoHombres47= mysqli_fetch_array($totalesGrupoEtnicoHombres47);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%QATO`K%' AND sexo LIKE '%H%'";
    $totalesGrupoEtnicoHombres48 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoHombres48);
    $grupoEtnicoHombres48= mysqli_fetch_array($totalesGrupoEtnicoHombres48);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%SAYULTECOS%' AND sexo LIKE '%H%'";
    $totalesGrupoEtnicoHombres49 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoHombres49);
    $grupoEtnicoHombres49= mysqli_fetch_array($totalesGrupoEtnicoHombres49);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%SERIS%' AND sexo LIKE '%H%'";
    $totalesGrupoEtnicoHombres50 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoHombres50);
    $grupoEtnicoHombres50= mysqli_fetch_array($totalesGrupoEtnicoHombres50);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%TACUATES%' AND sexo LIKE '%H%'";
    $totalesGrupoEtnicoHombres51 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoHombres51);
    $grupoEtnicoHombres51= mysqli_fetch_array($totalesGrupoEtnicoHombres51);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%TARAHUMARAS%' AND sexo LIKE '%H%'";
    $totalesGrupoEtnicoHombres52 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoHombres52);
    $grupoEtnicoHombres52= mysqli_fetch_array($totalesGrupoEtnicoHombres52);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%Purépecha%' AND sexo LIKE '%H%'";
    $totalesGrupoEtnicoHombres53 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoHombres53);
    $grupoEtnicoHombres53= mysqli_fetch_array($totalesGrupoEtnicoHombres53);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%TEKOS%' AND sexo LIKE '%H%'";
    $totalesGrupoEtnicoHombres54 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoHombres54);
    $grupoEtnicoHombres54= mysqli_fetch_array($totalesGrupoEtnicoHombres54);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%TEPEHUAS%' AND sexo LIKE '%H%'";
    $totalesGrupoEtnicoHombres55 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoHombres55);
    $grupoEtnicoHombres55= mysqli_fetch_array($totalesGrupoEtnicoHombres55);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%TEPEHUANOS DEL NORTE%' AND sexo LIKE '%H%'";
    $totalesGrupoEtnicoHombres56 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoHombres56);
    $grupoEtnicoHombres56= mysqli_fetch_array($totalesGrupoEtnicoHombres56);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%TEPEHUANOS DEL SUR%' AND sexo LIKE '%H%'";
    $totalesGrupoEtnicoHombres57 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoHombres57);
    $grupoEtnicoHombres57= mysqli_fetch_array($totalesGrupoEtnicoHombres57);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%TEXISTEPEQUEÑOS%' AND sexo LIKE '%H%'";
    $totalesGrupoEtnicoHombres58 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoHombres58);
    $grupoEtnicoHombres58= mysqli_fetch_array($totalesGrupoEtnicoHombres58);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%TLAHUICAS%' AND sexo LIKE '%H%'";
    $totalesGrupoEtnicoHombres59 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoHombres59);
    $grupoEtnicoHombres59= mysqli_fetch_array($totalesGrupoEtnicoHombres59);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%TLAPANECO%' AND sexo LIKE '%H%'";
    $totalesGrupoEtnicoHombres60 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoHombres60);
    $grupoEtnicoHombres60= mysqli_fetch_array($totalesGrupoEtnicoHombres60);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%TOJOLABALES%' AND sexo LIKE '%H%'";
    $totalesGrupoEtnicoHombres61 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoHombres61);
    $grupoEtnicoHombres61= mysqli_fetch_array($totalesGrupoEtnicoHombres61);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%TOTONAC%' AND sexo LIKE '%H%'";
    $totalesGrupoEtnicoHombres62 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoHombres62);
    $grupoEtnicoHombres62= mysqli_fetch_array($totalesGrupoEtnicoHombres62);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%TRIQUI%' AND sexo LIKE '%H%'";
    $totalesGrupoEtnicoHombres63 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoHombres63);
    $grupoEtnicoHombres63= mysqli_fetch_array($totalesGrupoEtnicoHombres63);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%TZELTAL%' AND sexo LIKE '%H%'";
    $totalesGrupoEtnicoHombres64 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoHombres64);
    $grupoEtnicoHombres64= mysqli_fetch_array($totalesGrupoEtnicoHombres64);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%TZOTZIL%' AND sexo LIKE '%H%'";
    $totalesGrupoEtnicoHombres65 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoHombres65);
    $grupoEtnicoHombres65= mysqli_fetch_array($totalesGrupoEtnicoHombres65);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%YAQUIS%' AND sexo LIKE '%H%'";
    $totalesGrupoEtnicoHombres66 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoHombres66);
    $grupoEtnicoHombres66= mysqli_fetch_array($totalesGrupoEtnicoHombres66);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%ZAPOTECO%' AND sexo LIKE '%H%'";
    $totalesGrupoEtnicoHombres67 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoHombres67);
    $grupoEtnicoHombres67= mysqli_fetch_array($totalesGrupoEtnicoHombres67);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%ZOQUES%' AND sexo LIKE '%H%'";
    $totalesGrupoEtnicoHombres68 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoHombres68);
    $grupoEtnicoHombres68= mysqli_fetch_array($totalesGrupoEtnicoHombres68);

    $sql="SELECT count(*) AS userPorGrupoEtnico FROM Usuario WHERE grupoEtnico LIKE '%NINGUNO%' AND sexo LIKE '%H%'";
    $totalesGrupoEtnicoHombres69 = mysqli_query($con, $sql);
    //var_dump($totalesGrupoEtnicoHombres69);
    $grupoEtnicoHombres69= mysqli_fetch_array($totalesGrupoEtnicoHombres69);
    /**
     * Usuarios por Ocupación
    */
    $sql="SELECT count(*) AS userPorOcupacion FROM Usuario WHERE ocupacionActual = '1'";
    $ocupacionTotales1 = mysqli_query($con, $sql);
    //var_dump($ocupacionTotales1);
    $totalesOcupacion1= mysqli_fetch_array($ocupacionTotales1);

    $sql="SELECT count(*) AS userPorOcupacion FROM Usuario WHERE ocupacionActual = '21'";
    $ocupacionTotales2 = mysqli_query($con, $sql);
    //var_dump($ocupacionTotales2);
    $totalesOcupacion2= mysqli_fetch_array($ocupacionTotales2);

    $sql="SELECT count(*) AS userPorOcupacion FROM Usuario WHERE ocupacionActual = '22'";
    $ocupacionTotales3 = mysqli_query($con, $sql);
    //var_dump($ocupacionTotales3);
    $totalesOcupacion3= mysqli_fetch_array($ocupacionTotales3);

    $sql="SELECT count(*) AS userPorOcupacion FROM Usuario WHERE ocupacionActual = '15'";
    $ocupacionTotales4 = mysqli_query($con, $sql);
    //var_dump($ocupacionTotales4);
    $totalesOcupacion4= mysqli_fetch_array($ocupacionTotales4);

    $sql="SELECT count(*) AS userPorOcupacion FROM Usuario WHERE ocupacionActual = '24'";
    $ocupacionTotales5 = mysqli_query($con, $sql);
    //var_dump($ocupacionTotales5);
    $totalesOcupacion5= mysqli_fetch_array($ocupacionTotales5);

    $sql="SELECT count(*) AS userPorOcupacion FROM Usuario WHERE ocupacionActual = '23'";
    $ocupacionTotales6 = mysqli_query($con, $sql);
    //var_dump($ocupacionTotales6);
    $totalesOcupacion6= mysqli_fetch_array($ocupacionTotales6);

    $sql="SELECT count(*) AS userPorOcupacion FROM Usuario WHERE ocupacionActual = '7'";
    $ocupacionTotales7 = mysqli_query($con, $sql);
    //var_dump($ocupacionTotales7);
    $totalesOcupacion7= mysqli_fetch_array($ocupacionTotales7);

    $sql="SELECT count(*) AS userPorOcupacion FROM Usuario WHERE ocupacionActual = '19'";
    $ocupacionTotales8 = mysqli_query($con, $sql);
    //var_dump($ocupacionTotales8);
    $totalesOcupacion8= mysqli_fetch_array($ocupacionTotales8);

    $sql="SELECT count(*) AS userPorOcupacion FROM Usuario WHERE ocupacionActual = '14'";
    $ocupacionTotales9 = mysqli_query($con, $sql);
    //var_dump($ocupacionTotales9);
    $totalesOcupacion9= mysqli_fetch_array($ocupacionTotales9);

    $sql="SELECT count(*) AS userPorOcupacion FROM Usuario WHERE ocupacionActual = '6'";
    $ocupacionTotales10 = mysqli_query($con, $sql);
    //var_dump($ocupacionTotales10);
    $totalesOcupacion10= mysqli_fetch_array($ocupacionTotales10);

    $sql="SELECT count(*) AS userPorOcupacion FROM Usuario WHERE ocupacionActual = '20'";
    $ocupacionTotales11 = mysqli_query($con, $sql);
    //var_dump($ocupacionTotales11);
    $totalesOcupacion11= mysqli_fetch_array($ocupacionTotales11);
    /**
     * Usuarios por Ocupación Mujeres
    */
    $sql="SELECT count(*) AS userPorOcupacion FROM Usuario WHERE ocupacionActual = '1' AND sexo LIKE '%M%'";
    $ocupacionMujeres1 = mysqli_query($con, $sql);
    //var_dump($ocupacionMujeres1);
    $totalesOcupacionMujeres1= mysqli_fetch_array($ocupacionMujeres1);

    $sql="SELECT count(*) AS userPorOcupacion FROM Usuario WHERE ocupacionActual = '21' AND sexo LIKE '%M%'";
    $ocupacionMujeres2 = mysqli_query($con, $sql);
    //var_dump($ocupacionMujeres2);
    $totalesOcupacionMujeres2= mysqli_fetch_array($ocupacionMujeres2);

    $sql="SELECT count(*) AS userPorOcupacion FROM Usuario WHERE ocupacionActual = '22' AND sexo LIKE '%M%'";
    $ocupacionMujeres3 = mysqli_query($con, $sql);
    //var_dump($ocupacionMujeres3);
    $totalesOcupacionMujeres3= mysqli_fetch_array($ocupacionMujeres3);

    $sql="SELECT count(*) AS userPorOcupacion FROM Usuario WHERE ocupacionActual = '15' AND sexo LIKE '%M%'";
    $ocupacionMujeres4 = mysqli_query($con, $sql);
    //var_dump($ocupacionMujeres4);
    $totalesOcupacionMujeres4= mysqli_fetch_array($ocupacionMujeres4);

    $sql="SELECT count(*) AS userPorOcupacion FROM Usuario WHERE ocupacionActual = '24' AND sexo LIKE '%M%'";
    $ocupacionMujeres5 = mysqli_query($con, $sql);
    //var_dump($ocupacionMujeres5);
    $totalesOcupacionMujeres5= mysqli_fetch_array($ocupacionMujeres5);

    $sql="SELECT count(*) AS userPorOcupacion FROM Usuario WHERE ocupacionActual = '23' AND sexo LIKE '%M%'";
    $ocupacionMujeres6 = mysqli_query($con, $sql);
    //var_dump($ocupacionMujeres6);
    $totalesOcupacionMujeres6= mysqli_fetch_array($ocupacionMujeres6);

    $sql="SELECT count(*) AS userPorOcupacion FROM Usuario WHERE ocupacionActual = '7' AND sexo LIKE '%M%'";
    $ocupacionMujeres7 = mysqli_query($con, $sql);
    //var_dump($ocupacionMujeres7);
    $totalesOcupacionMujeres7= mysqli_fetch_array($ocupacionMujeres7);

    $sql="SELECT count(*) AS userPorOcupacion FROM Usuario WHERE ocupacionActual = '19' AND sexo LIKE '%M%'";
    $ocupacionMujeres8 = mysqli_query($con, $sql);
    //var_dump($ocupacionMujeres8);
    $totalesOcupacionMujeres8= mysqli_fetch_array($ocupacionMujeres8);

    $sql="SELECT count(*) AS userPorOcupacion FROM Usuario WHERE ocupacionActual = '14' AND sexo LIKE '%M%'";
    $ocupacionMujeres9 = mysqli_query($con, $sql);
    //var_dump($ocupacionMujeres9);
    $totalesOcupacionMujeres9= mysqli_fetch_array($ocupacionMujeres9);

    $sql="SELECT count(*) AS userPorOcupacion FROM Usuario WHERE ocupacionActual = '6' AND sexo LIKE '%M%'";
    $ocupacionMujeres10 = mysqli_query($con, $sql);
    //var_dump($ocupacionMujeres10);
    $totalesOcupacionMujeres10= mysqli_fetch_array($ocupacionMujeres10);

    $sql="SELECT count(*) AS userPorOcupacion FROM Usuario WHERE ocupacionActual = '20' AND sexo LIKE '%M%'";
    $ocupacionMujeres11 = mysqli_query($con, $sql);
    //var_dump($ocupacionMujeres11);
    $totalesOcupacionMujeres11= mysqli_fetch_array($ocupacionMujeres11);
    /**
     * Usuarios por Ocupación Hombres
    */
    $sql="SELECT count(*) AS userPorOcupacion FROM Usuario WHERE ocupacionActual = '1' AND sexo LIKE '%H%'";
    $ocupacionHombres1 = mysqli_query($con, $sql);
    //var_dump($ocupacionHombres1);
    $totalesOcupacionHombres1= mysqli_fetch_array($ocupacionHombres1);

    $sql="SELECT count(*) AS userPorOcupacion FROM Usuario WHERE ocupacionActual = '21' AND sexo LIKE '%H%'";
    $ocupacionHombres2 = mysqli_query($con, $sql);
    //var_dump($ocupacionHombres2);
    $totalesOcupacionHombres2= mysqli_fetch_array($ocupacionHombres2);

    $sql="SELECT count(*) AS userPorOcupacion FROM Usuario WHERE ocupacionActual = '22' AND sexo LIKE '%H%'";
    $ocupacionHombres3 = mysqli_query($con, $sql);
    //var_dump($ocupacionHombres3);
    $totalesOcupacionHombres3= mysqli_fetch_array($ocupacionHombres3);

    $sql="SELECT count(*) AS userPorOcupacion FROM Usuario WHERE ocupacionActual = '15' AND sexo LIKE '%H%'";
    $ocupacionHombres4 = mysqli_query($con, $sql);
    //var_dump($ocupacionHombres4);
    $totalesOcupacionHombres4= mysqli_fetch_array($ocupacionHombres4);

    $sql="SELECT count(*) AS userPorOcupacion FROM Usuario WHERE ocupacionActual = '24' AND sexo LIKE '%H%'";
    $ocupacionHombres5 = mysqli_query($con, $sql);
    //var_dump($ocupacionHombres5);
    $totalesOcupacionHombres5= mysqli_fetch_array($ocupacionHombres5);

    $sql="SELECT count(*) AS userPorOcupacion FROM Usuario WHERE ocupacionActual = '23' AND sexo LIKE '%H%'";
    $ocupacionHombres6 = mysqli_query($con, $sql);
    //var_dump($ocupacionHombres6);
    $totalesOcupacionHombres6= mysqli_fetch_array($ocupacionHombres6);

    $sql="SELECT count(*) AS userPorOcupacion FROM Usuario WHERE ocupacionActual = '7' AND sexo LIKE '%H%'";
    $ocupacionHombres7 = mysqli_query($con, $sql);
    //var_dump($ocupacionHombres7);
    $totalesOcupacionHombres7= mysqli_fetch_array($ocupacionHombres7);

    $sql="SELECT count(*) AS userPorOcupacion FROM Usuario WHERE ocupacionActual = '19' AND sexo LIKE '%H%'";
    $ocupacionHombres8 = mysqli_query($con, $sql);
    //var_dump($ocupacionHombres8);
    $totalesOcupacionHombres8= mysqli_fetch_array($ocupacionHombres8);

    $sql="SELECT count(*) AS userPorOcupacion FROM Usuario WHERE ocupacionActual = '14' AND sexo LIKE '%H%'";
    $ocupacionHombres9 = mysqli_query($con, $sql);
    //var_dump($ocupacionHombres9);
    $totalesOcupacionHombres9= mysqli_fetch_array($ocupacionHombres9);

    $sql="SELECT count(*) AS userPorOcupacion FROM Usuario WHERE ocupacionActual = '6' AND sexo LIKE '%H%'";
    $ocupacionHombres10 = mysqli_query($con, $sql);
    //var_dump($ocupacionHombres10);
    $totalesOcupacionHombres10= mysqli_fetch_array($ocupacionHombres10);

    $sql="SELECT count(*) AS userPorOcupacion FROM Usuario WHERE ocupacionActual = '20' AND sexo LIKE '%H%'";
    $ocupacionHombres11 = mysqli_query($con, $sql);
    //var_dump($ocupacionHombres11);
    $totalesOcupacionHombres11= mysqli_fetch_array($ocupacionHombres11);
/**
  * Usuarios totales por Grado de EStudios
*/
    $sql="SELECT count(*) AS userPorGradoEstudios FROM Usuario WHERE gradoEstudios = '22'";
    $totalesGradoEstudios1 = mysqli_query($con, $sql);
    //var_dump($totalesGradoEstudios1);
    $gradoEstudiosTotales1= mysqli_fetch_array($totalesGradoEstudios1);

    $sql="SELECT count(*) AS userPorGradoEstudios FROM Usuario WHERE gradoEstudios = '1'";
    $totalesGradoEstudios2 = mysqli_query($con, $sql);
    //var_dump($totalesGradoEstudios2);
    $gradoEstudiosTotales2= mysqli_fetch_array($totalesGradoEstudios2);

    $sql="SELECT count(*) AS userPorGradoEstudios FROM Usuario WHERE gradoEstudios = '2'";
    $totalesGradoEstudios3 = mysqli_query($con, $sql);
    //var_dump($totalesGradoEstudios3);
    $gradoEstudiosTotales3= mysqli_fetch_array($totalesGradoEstudios3);

    $sql="SELECT count(*) AS userPorGradoEstudios FROM Usuario WHERE gradoEstudios = '3'";
    $totalesGradoEstudios4 = mysqli_query($con, $sql);
    //var_dump($totalesGradoEstudios4);
    $gradoEstudiosTotales4= mysqli_fetch_array($totalesGradoEstudios4);

    $sql="SELECT count(*) AS userPorGradoEstudios FROM Usuario WHERE gradoEstudios = '4'";
    $totalesGradoEstudios5 = mysqli_query($con, $sql);
    //var_dump($totalesGradoEstudios5);
    $gradoEstudiosTotales5= mysqli_fetch_array($totalesGradoEstudios5);

    $sql="SELECT count(*) AS userPorGradoEstudios FROM Usuario WHERE gradoEstudios = '5'";
    $totalesGradoEstudios6 = mysqli_query($con, $sql);
    //var_dump($totalesGradoEstudios6);
    $gradoEstudiosTotales6= mysqli_fetch_array($totalesGradoEstudios6);

    $sql="SELECT count(*) AS userPorGradoEstudios FROM Usuario WHERE gradoEstudios = '6'";
    $totalesGradoEstudios7 = mysqli_query($con, $sql);
    //var_dump($totalesGradoEstudios7);
    $gradoEstudiosTotales7= mysqli_fetch_array($totalesGradoEstudios7);

    $sql="SELECT count(*) AS userPorGradoEstudios FROM Usuario WHERE gradoEstudios = '7'";
    $totalesGradoEstudios8 = mysqli_query($con, $sql);
    //var_dump($totalesGradoEstudios8);
    $gradoEstudiosTotales8= mysqli_fetch_array($totalesGradoEstudios8);

    $sql="SELECT count(*) AS userPorGradoEstudios FROM Usuario WHERE gradoEstudios = '23'";
    $totalesGradoEstudios9 = mysqli_query($con, $sql);
    //var_dump($totalesGradoEstudios9);
    $gradoEstudiosTotales9= mysqli_fetch_array($totalesGradoEstudios9);

    $sql="SELECT count(*) AS userPorGradoEstudios FROM Usuario WHERE gradoEstudios = '8'";
    $totalesGradoEstudios10 = mysqli_query($con, $sql);
    //var_dump($totalesGradoEstudios10);
    $gradoEstudiosTotales10= mysqli_fetch_array($totalesGradoEstudios10);

    $sql="SELECT count(*) AS userPorGradoEstudios FROM Usuario WHERE gradoEstudios = '9'";
    $totalesGradoEstudios11 = mysqli_query($con, $sql);
    //var_dump($totalesGradoEstudios11);
    $gradoEstudiosTotales11= mysqli_fetch_array($totalesGradoEstudios11);

    $sql="SELECT count(*) AS userPorGradoEstudios FROM Usuario WHERE gradoEstudios = '10'";
    $totalesGradoEstudios12 = mysqli_query($con, $sql);
    //var_dump($totalesGradoEstudios12);
    $gradoEstudiosTotales12= mysqli_fetch_array($totalesGradoEstudios12);

    $sql="SELECT count(*) AS userPorGradoEstudios FROM Usuario WHERE gradoEstudios = '24'";
    $totalesGradoEstudios13 = mysqli_query($con, $sql);
    //var_dump($totalesGradoEstudios13);
    $gradoEstudiosTotales13= mysqli_fetch_array($totalesGradoEstudios13);

    $sql="SELECT count(*) AS userPorGradoEstudios FROM Usuario WHERE gradoEstudios = '11'";
    $totalesGradoEstudios14 = mysqli_query($con, $sql);
    //var_dump($totalesGradoEstudios14);
    $gradoEstudiosTotales14= mysqli_fetch_array($totalesGradoEstudios14);

    $sql="SELECT count(*) AS userPorGradoEstudios FROM Usuario WHERE gradoEstudios = '12'";
    $totalesGradoEstudios15 = mysqli_query($con, $sql);
    //var_dump($totalesGradoEstudios15);
    $gradoEstudiosTotales15= mysqli_fetch_array($totalesGradoEstudios15);

    $sql="SELECT count(*) AS userPorGradoEstudios FROM Usuario WHERE gradoEstudios = '13'";
    $totalesGradoEstudios16 = mysqli_query($con, $sql);
    //var_dump($totalesGradoEstudios16);
    $gradoEstudiosTotales16= mysqli_fetch_array($totalesGradoEstudios16);

    $sql="SELECT count(*) AS userPorGradoEstudios FROM Usuario WHERE gradoEstudios = '14'";
    $totalesGradoEstudios17 = mysqli_query($con, $sql);
    //var_dump($totalesGradoEstudios17);
    $gradoEstudiosTotales17= mysqli_fetch_array($totalesGradoEstudios17);

    $sql="SELECT count(*) AS userPorGradoEstudios FROM Usuario WHERE gradoEstudios = '15'";
    $totalesGradoEstudios18 = mysqli_query($con, $sql);
    //var_dump($totalesGradoEstudios18);
    $gradoEstudiosTotales18= mysqli_fetch_array($totalesGradoEstudios18);

    $sql="SELECT count(*) AS userPorGradoEstudios FROM Usuario WHERE gradoEstudios = '16'";
    $totalesGradoEstudios19 = mysqli_query($con, $sql);
    //var_dump($totalesGradoEstudios19);
    $gradoEstudiosTotales19= mysqli_fetch_array($totalesGradoEstudios19);

    $sql="SELECT count(*) AS userPorGradoEstudios FROM Usuario WHERE gradoEstudios = '25'";
    $totalesGradoEstudios20 = mysqli_query($con, $sql);
    //var_dump($totalesGradoEstudios20);
    $gradoEstudiosTotales20= mysqli_fetch_array($totalesGradoEstudios20);

    $sql="SELECT count(*) AS userPorGradoEstudios FROM Usuario WHERE gradoEstudios = '21'";
    $totalesGradoEstudios21 = mysqli_query($con, $sql);
    //var_dump($totalesGradoEstudios21);
    $gradoEstudiosTotales21= mysqli_fetch_array($totalesGradoEstudios21);

    $sql="SELECT count(*) AS userPorGradoEstudios FROM Usuario WHERE gradoEstudios = '17'";
    $totalesGradoEstudios22 = mysqli_query($con, $sql);
    //var_dump($totalesGradoEstudios22);
    $gradoEstudiosTotales22= mysqli_fetch_array($totalesGradoEstudios22);

    $sql="SELECT count(*) AS userPorGradoEstudios FROM Usuario WHERE gradoEstudios = '18'";
    $totalesGradoEstudios23 = mysqli_query($con, $sql);
    //var_dump($totalesGradoEstudios23);
    $gradoEstudiosTotales23= mysqli_fetch_array($totalesGradoEstudios23);

    $sql="SELECT count(*) AS userPorGradoEstudios FROM Usuario WHERE gradoEstudios = '19'";
    $totalesGradoEstudios24 = mysqli_query($con, $sql);
    //var_dump($totalesGradoEstudios24);
    $gradoEstudiosTotales24= mysqli_fetch_array($totalesGradoEstudios24);

    $sql="SELECT count(*) AS userPorGradoEstudios FROM Usuario WHERE gradoEstudios = '20'";
    $totalesGradoEstudios25 = mysqli_query($con, $sql);
    //var_dump($totalesGradoEstudios25);
    $gradoEstudiosTotales25= mysqli_fetch_array($totalesGradoEstudios25);

    $sql="SELECT count(*) AS userPorGradoEstudios FROM Usuario WHERE gradoEstudios = '26'";
    $totalesGradoEstudios26 = mysqli_query($con, $sql);
    //var_dump($totalesGradoEstudios26);
    $gradoEstudiosTotales26= mysqli_fetch_array($totalesGradoEstudios26);
  /**
     * uSUARIOS INSCRITOS POR LENGUA INDIGENA
     */
    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '1'";
    $totalesLengua1 = mysqli_query($con, $sql);
    //var_dump($totalesLengua1);
    $lenguaTotales1= mysqli_fetch_array($totalesLengua1);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '2'";
    $totalesLengua2 = mysqli_query($con, $sql);
    //var_dump($totalesLengua2);
    $lenguaTotales2= mysqli_fetch_array($totalesLengua2);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '3'";
    $totalesLengua3 = mysqli_query($con, $sql);
    //var_dump($totalesLengua3);
    $lenguaTotales3= mysqli_fetch_array($totalesLengua3);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '4'";
    $totalesLengua4 = mysqli_query($con, $sql);
    //var_dump($totalesLengua4);
    $lenguaTotales4= mysqli_fetch_array($totalesLengua4);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '5'";
    $totalesLengua5 = mysqli_query($con, $sql);
    //var_dump($totalesLengua5);
    $lenguaTotales5= mysqli_fetch_array($totalesLengua5);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '6'";
    $totalesLengua6 = mysqli_query($con, $sql);
    //var_dump($totalesLengua6);
    $lenguaTotales6= mysqli_fetch_array($totalesLengua6);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '7'";
    $totalesLengua7 = mysqli_query($con, $sql);
    //var_dump($totalesLengua7);
    $lenguaTotales7= mysqli_fetch_array($totalesLengua7);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '8'";
    $totalesLengua8 = mysqli_query($con, $sql);
    //var_dump($totalesLengua8);
    $lenguaTotales8= mysqli_fetch_array($totalesLengua8);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '9'";
    $totalesLengua9 = mysqli_query($con, $sql);
    //var_dump($totalesLengua9);
    $lenguaTotales9= mysqli_fetch_array($totalesLengua9);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '10'";
    $totalesLengua10 = mysqli_query($con, $sql);
    //var_dump($totalesLengua10);
    $lenguaTotales10= mysqli_fetch_array($totalesLengua10);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '11'";
    $totalesLengua11 = mysqli_query($con, $sql);
    //var_dump($totalesLengua11);
    $lenguaTotales11= mysqli_fetch_array($totalesLengua11);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '12'";
    $totalesLengua12 = mysqli_query($con, $sql);
    //var_dump($totalesLengua12);
    $lenguaTotales12= mysqli_fetch_array($totalesLengua12);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '13'";
    $totalesLengua13 = mysqli_query($con, $sql);
    //var_dump($totalesLengua13);
    $lenguaTotales13= mysqli_fetch_array($totalesLengua13);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '14'";
    $totalesLengua14 = mysqli_query($con, $sql);
    //var_dump($totalesLengua14);
    $lenguaTotales14= mysqli_fetch_array($totalesLengua14);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '15'";
    $totalesLengua15 = mysqli_query($con, $sql);
    //var_dump($totalesLengua15);
    $lenguaTotales15= mysqli_fetch_array($totalesLengua15);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '16'";
    $totalesLengua16 = mysqli_query($con, $sql);
    //var_dump($totalesLengua16);
    $lenguaTotales16= mysqli_fetch_array($totalesLengua16);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '17'";
    $totalesLengua17 = mysqli_query($con, $sql);
    //var_dump($totalesLengua17);
    $lenguaTotales17= mysqli_fetch_array($totalesLengua17);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '18'";
    $totalesLengua18 = mysqli_query($con, $sql);
    //var_dump($totalesLengua18);
    $lenguaTotales18= mysqli_fetch_array($totalesLengua18);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '19'";
    $totalesLengua19 = mysqli_query($con, $sql);
    //var_dump($totalesLengua19);
    $lenguaTotales19= mysqli_fetch_array($totalesLengua19);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '20'";
    $totalesLengua20 = mysqli_query($con, $sql);
    //var_dump($totalesLengua20);
    $lenguaTotales20= mysqli_fetch_array($totalesLengua20);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '21'";
    $totalesLengua21 = mysqli_query($con, $sql);
    //var_dump($totalesLengua21);
    $lenguaTotales21= mysqli_fetch_array($totalesLengua21);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '22'";
    $totalesLengua22 = mysqli_query($con, $sql);
    //var_dump($totalesLengua22);
    $lenguaTotales22= mysqli_fetch_array($totalesLengua22);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '23'";
    $totalesLengua23 = mysqli_query($con, $sql);
    //var_dump($totalesLengua23);
    $lenguaTotales23= mysqli_fetch_array($totalesLengua23);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '24'";
    $totalesLengua24 = mysqli_query($con, $sql);
    //var_dump($totalesLengua24);
    $lenguaTotales24= mysqli_fetch_array($totalesLengua24);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '25'";
    $totalesLengua25 = mysqli_query($con, $sql);
    //var_dump($totalesLengua25);
    $lenguaTotales25= mysqli_fetch_array($totalesLengua25);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '26'";
    $totalesLengua26 = mysqli_query($con, $sql);
    //var_dump($totalesLengua26);
    $lenguaTotales26= mysqli_fetch_array($totalesLengua26);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '27'";
    $totalesLengua27 = mysqli_query($con, $sql);
    //var_dump($totalesLengua27);
    $lenguaTotales27= mysqli_fetch_array($totalesLengua27);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '28'";
    $totalesLengua28 = mysqli_query($con, $sql);
    //var_dump($totalesLengua28);
    $lenguaTotales28= mysqli_fetch_array($totalesLengua28);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '29'";
    $totalesLengua29 = mysqli_query($con, $sql);
    //var_dump($totalesLengua29);
    $lenguaTotales29= mysqli_fetch_array($totalesLengua29);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '30'";
    $totalesLengua30 = mysqli_query($con, $sql);
    //var_dump($totalesLengua30);
    $lenguaTotales30= mysqli_fetch_array($totalesLengua30);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '31'";
    $totalesLengua31 = mysqli_query($con, $sql);
    //var_dump($totalesLengua31);
    $lenguaTotales31= mysqli_fetch_array($totalesLengua31);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '32'";
    $totalesLengua32 = mysqli_query($con, $sql);
    //var_dump($totalesLengua32);
    $lenguaTotales32= mysqli_fetch_array($totalesLengua32);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '33'";
    $totalesLengua33 = mysqli_query($con, $sql);
    //var_dump($totalesLengua33);
    $lenguaTotales33= mysqli_fetch_array($totalesLengua33);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '34'";
    $totalesLengua34 = mysqli_query($con, $sql);
    //var_dump($totalesLengua34);
    $lenguaTotales34= mysqli_fetch_array($totalesLengua34);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '35'";
    $totalesLengua35 = mysqli_query($con, $sql);
    //var_dump($totalesLengua35);
    $lenguaTotales35= mysqli_fetch_array($totalesLengua35);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '36'";
    $totalesLengua36 = mysqli_query($con, $sql);
    //var_dump($totalesLengua36);
    $lenguaTotales36= mysqli_fetch_array($totalesLengua36);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '37'";
    $totalesLengua37 = mysqli_query($con, $sql);
    //var_dump($totalesLengua37);
    $lenguaTotales37= mysqli_fetch_array($totalesLengua37);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '38'";
    $totalesLengua38 = mysqli_query($con, $sql);
    //var_dump($totalesLengua38);
    $lenguaTotales38= mysqli_fetch_array($totalesLengua38);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '39'";
    $totalesLengua39 = mysqli_query($con, $sql);
    //var_dump($totalesLengua39);
    $lenguaTotales39= mysqli_fetch_array($totalesLengua39);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '40'";
    $totalesLengua40 = mysqli_query($con, $sql);
    //var_dump($totalesLengua40);
    $lenguaTotales40= mysqli_fetch_array($totalesLengua40);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '41'";
    $totalesLengua41 = mysqli_query($con, $sql);
    //var_dump($totalesLengua41);
    $lenguaTotales41= mysqli_fetch_array($totalesLengua41);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '42'";
    $totalesLengua42 = mysqli_query($con, $sql);
    //var_dump($totalesLengua42);
    $lenguaTotales42= mysqli_fetch_array($totalesLengua42);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '43'";
    $totalesLengua43 = mysqli_query($con, $sql);
    //var_dump($totalesLengua43);
    $lenguaTotales43= mysqli_fetch_array($totalesLengua43);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '44'";
    $totalesLengua44 = mysqli_query($con, $sql);
    //var_dump($totalesLengua44);
    $lenguaTotales44= mysqli_fetch_array($totalesLengua44);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '45'";
    $totalesLengua45 = mysqli_query($con, $sql);
    //var_dump($totalesLengua45);
    $lenguaTotales45= mysqli_fetch_array($totalesLengua45);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '46'";
    $totalesLengua46 = mysqli_query($con, $sql);
    //var_dump($totalesLengua46);
    $lenguaTotales46= mysqli_fetch_array($totalesLengua46);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '47'";
    $totalesLengua47 = mysqli_query($con, $sql);
    //var_dump($totalesLengua47);
    $lenguaTotales47= mysqli_fetch_array($totalesLengua47);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '48'";
    $totalesLengua48 = mysqli_query($con, $sql);
    //var_dump($totalesLengua48);
    $lenguaTotales48= mysqli_fetch_array($totalesLengua48);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '49'";
    $totalesLengua49 = mysqli_query($con, $sql);
    //var_dump($totalesLengua49);
    $lenguaTotales49= mysqli_fetch_array($totalesLengua49);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '50'";
    $totalesLengua50 = mysqli_query($con, $sql);
    //var_dump($totalesLengua50);
    $lenguaTotales50= mysqli_fetch_array($totalesLengua50);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '51'";
    $totalesLengua51 = mysqli_query($con, $sql);
    //var_dump($totalesLengua51);
    $lenguaTotales51= mysqli_fetch_array($totalesLengua51);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '52'";
    $totalesLengua52 = mysqli_query($con, $sql);
    //var_dump($totalesLengua52);
    $lenguaTotales52= mysqli_fetch_array($totalesLengua52);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '53'";
    $totalesLengua53 = mysqli_query($con, $sql);
    //var_dump($totalesLengua53);
    $lenguaTotales53= mysqli_fetch_array($totalesLengua53);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '54'";
    $totalesLengua54 = mysqli_query($con, $sql);
    //var_dump($totalesLengua54);
    $lenguaTotales54= mysqli_fetch_array($totalesLengua54);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '55'";
    $totalesLengua55 = mysqli_query($con, $sql);
    //var_dump($totalesLengua55);
    $lenguaTotales55= mysqli_fetch_array($totalesLengua55);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '56'";
    $totalesLengua56 = mysqli_query($con, $sql);
    //var_dump($totalesLengua56);
    $lenguaTotales56= mysqli_fetch_array($totalesLengua56);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '57'";
    $totalesLengua57 = mysqli_query($con, $sql);
    //var_dump($totalesLengua57);
    $lenguaTotales57= mysqli_fetch_array($totalesLengua57);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '58'";
    $totalesLengua58 = mysqli_query($con, $sql);
    //var_dump($totalesLengua58);
    $lenguaTotales58= mysqli_fetch_array($totalesLengua58);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '59'";
    $totalesLengua59 = mysqli_query($con, $sql);
    //var_dump($totalesLengua59);
    $lenguaTotales59= mysqli_fetch_array($totalesLengua59);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '60'";
    $totalesLengua60 = mysqli_query($con, $sql);
    //var_dump($totalesLengua60);
    $lenguaTotales60= mysqli_fetch_array($totalesLengua60);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '61'";
    $totalesLengua61 = mysqli_query($con, $sql);
    //var_dump($totalesLengua61);
    $lenguaTotales61= mysqli_fetch_array($totalesLengua61);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '62'";
    $totalesLengua62 = mysqli_query($con, $sql);
    //var_dump($totalesLengua62);
    $lenguaTotales62= mysqli_fetch_array($totalesLengua62);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '63'";
    $totalesLengua63 = mysqli_query($con, $sql);
    //var_dump($totalesLengua63);
    $lenguaTotales63= mysqli_fetch_array($totalesLengua63);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '64'";
    $totalesLengua64 = mysqli_query($con, $sql);
    //var_dump($totalesLengua64);
    $lenguaTotales64= mysqli_fetch_array($totalesLengua64);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '65'";
    $totalesLengua65 = mysqli_query($con, $sql);
    //var_dump($totalesLengua65);
    $lenguaTotales65= mysqli_fetch_array($totalesLengua65);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '66'";
    $totalesLengua66 = mysqli_query($con, $sql);
    //var_dump($totalesLengua66);
    $lenguaTotales66= mysqli_fetch_array($totalesLengua66);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '67'";
    $totalesLengua67 = mysqli_query($con, $sql);
    //var_dump($totalesLengua67);
    $lenguaTotales67= mysqli_fetch_array($totalesLengua67);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '68'";
    $totalesLengua68 = mysqli_query($con, $sql);
    //var_dump($totalesLengua68);
    $lenguaTotales68= mysqli_fetch_array($totalesLengua68);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '69'";
    $totalesLengua69 = mysqli_query($con, $sql);
    //var_dump($totalesLengua69);
    $lenguaTotales69= mysqli_fetch_array($totalesLengua69);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '70'";
    $totalesLengua70 = mysqli_query($con, $sql);
    //var_dump($totalesLengua70);
    $lenguaTotales70= mysqli_fetch_array($totalesLengua70);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '71'";
    $totalesLengua71 = mysqli_query($con, $sql);
    //var_dump($totalesLengua71);
    $lenguaTotales71= mysqli_fetch_array($totalesLengua71);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '0'";
    $totalesLengua0 = mysqli_query($con, $sql);
    //var_dump($totalesLengua0);
    $lenguaTotales0= mysqli_fetch_array($totalesLengua0);
/**
     * uSUARIOS INSCRITOS POR LENGUA INDIGENA Mujeres
     */
    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '1' AND sexo LIKE '%M%'";
    $totalesLenguaMujeres1 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaMujeres1);
    $lenguaTotalesMujeres1= mysqli_fetch_array($totalesLenguaMujeres1);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '2' AND sexo LIKE '%M%'";
    $totalesLenguaMujeres2 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaMujeres2);
    $lenguaTotalesMujeres2= mysqli_fetch_array($totalesLenguaMujeres2);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '3' AND sexo LIKE '%M%'";
    $totalesLenguaMujeres3 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaMujeres3);
    $lenguaTotalesMujeres3= mysqli_fetch_array($totalesLenguaMujeres3);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '4' AND sexo LIKE '%M%'";
    $totalesLenguaMujeres4 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaMujeres4);
    $lenguaTotalesMujeres4= mysqli_fetch_array($totalesLenguaMujeres4);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '5' AND sexo LIKE '%M%'";
    $totalesLenguaMujeres5 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaMujeres5);
    $lenguaTotalesMujeres5= mysqli_fetch_array($totalesLenguaMujeres5);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '6' AND sexo LIKE '%M%'";
    $totalesLenguaMujeres6 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaMujeres6);
    $lenguaTotalesMujeres6= mysqli_fetch_array($totalesLenguaMujeres6);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '7' AND sexo LIKE '%M%'";
    $totalesLenguaMujeres7 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaMujeres7);
    $lenguaTotalesMujeres7= mysqli_fetch_array($totalesLenguaMujeres7);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '8' AND sexo LIKE '%M%'";
    $totalesLenguaMujeres8 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaMujeres8);
    $lenguaTotalesMujeres8= mysqli_fetch_array($totalesLenguaMujeres8);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '9' AND sexo LIKE '%M%'";
    $totalesLenguaMujeres9 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaMujeres9);
    $lenguaTotalesMujeres9= mysqli_fetch_array($totalesLenguaMujeres9);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '10' AND sexo LIKE '%M%'";
    $totalesLenguaMujeres10 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaMujeres10);
    $lenguaTotalesMujeres10= mysqli_fetch_array($totalesLenguaMujeres10);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '11' AND sexo LIKE '%M%'";
    $totalesLenguaMujeres11 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaMujeres11);
    $lenguaTotalesMujeres11= mysqli_fetch_array($totalesLenguaMujeres11);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '12' AND sexo LIKE '%M%'";
    $totalesLenguaMujeres12 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaMujeres12);
    $lenguaTotalesMujeres12= mysqli_fetch_array($totalesLenguaMujeres12);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '13' AND sexo LIKE '%M%'";
    $totalesLenguaMujeres13 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaMujeres13);
    $lenguaTotalesMujeres13= mysqli_fetch_array($totalesLenguaMujeres13);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '14' AND sexo LIKE '%M%'";
    $totalesLenguaMujeres14 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaMujeres14);
    $lenguaTotalesMujeres14= mysqli_fetch_array($totalesLenguaMujeres14);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '15' AND sexo LIKE '%M%'";
    $totalesLenguaMujeres15 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaMujeres15);
    $lenguaTotalesMujeres15= mysqli_fetch_array($totalesLenguaMujeres15);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '16' AND sexo LIKE '%M%'";
    $totalesLenguaMujeres16 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaMujeres16);
    $lenguaTotalesMujeres16= mysqli_fetch_array($totalesLenguaMujeres16);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '17' AND sexo LIKE '%M%'";
    $totalesLenguaMujeres17 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaMujeres17);
    $lenguaTotalesMujeres17= mysqli_fetch_array($totalesLenguaMujeres17);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '18' AND sexo LIKE '%M%'";
    $totalesLenguaMujeres18 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaMujeres18);
    $lenguaTotalesMujeres18= mysqli_fetch_array($totalesLenguaMujeres18);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '19' AND sexo LIKE '%M%'";
    $totalesLenguaMujeres19 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaMujeres19);
    $lenguaTotalesMujeres19= mysqli_fetch_array($totalesLenguaMujeres19);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '20' AND sexo LIKE '%M%'";
    $totalesLenguaMujeres20 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaMujeres20);
    $lenguaTotalesMujeres20= mysqli_fetch_array($totalesLenguaMujeres20);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '21' AND sexo LIKE '%M%'";
    $totalesLenguaMujeres21 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaMujeres21);
    $lenguaTotalesMujeres21= mysqli_fetch_array($totalesLenguaMujeres21);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '22' AND sexo LIKE '%M%'";
    $totalesLenguaMujeres22 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaMujeres22);
    $lenguaTotalesMujeres22= mysqli_fetch_array($totalesLenguaMujeres22);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '23' AND sexo LIKE '%M%'";
    $totalesLenguaMujeres23 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaMujeres23);
    $lenguaTotalesMujeres23= mysqli_fetch_array($totalesLenguaMujeres23);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '24' AND sexo LIKE '%M%'";
    $totalesLenguaMujeres24 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaMujeres24);
    $lenguaTotalesMujeres24= mysqli_fetch_array($totalesLenguaMujeres24);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '25' AND sexo LIKE '%M%'";
    $totalesLenguaMujeres25 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaMujeres25);
    $lenguaTotalesMujeres25= mysqli_fetch_array($totalesLenguaMujeres25);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '26' AND sexo LIKE '%M%'";
    $totalesLenguaMujeres26 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaMujeres26);
    $lenguaTotalesMujeres26= mysqli_fetch_array($totalesLenguaMujeres26);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '27' AND sexo LIKE '%M%'";
    $totalesLenguaMujeres27 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaMujeres27);
    $lenguaTotalesMujeres27= mysqli_fetch_array($totalesLenguaMujeres27);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '28' AND sexo LIKE '%M%'";
    $totalesLenguaMujeres28 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaMujeres28);
    $lenguaTotalesMujeres28= mysqli_fetch_array($totalesLenguaMujeres28);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '29' AND sexo LIKE '%M%'";
    $totalesLenguaMujeres29 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaMujeres29);
    $lenguaTotalesMujeres29= mysqli_fetch_array($totalesLenguaMujeres29);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '30' AND sexo LIKE '%M%'";
    $totalesLenguaMujeres30 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaMujeres30);
    $lenguaTotalesMujeres30= mysqli_fetch_array($totalesLenguaMujeres30);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '31' AND sexo LIKE '%M%'";
    $totalesLenguaMujeres31 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaMujeres31);
    $lenguaTotalesMujeres31= mysqli_fetch_array($totalesLenguaMujeres31);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '32' AND sexo LIKE '%M%'";
    $totalesLenguaMujeres32 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaMujeres32);
    $lenguaTotalesMujeres32= mysqli_fetch_array($totalesLenguaMujeres32);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '33' AND sexo LIKE '%M%'";
    $totalesLenguaMujeres33 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaMujeres33);
    $lenguaTotalesMujeres33= mysqli_fetch_array($totalesLenguaMujeres33);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '34' AND sexo LIKE '%M%'";
    $totalesLenguaMujeres34 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaMujeres34);
    $lenguaTotalesMujeres34= mysqli_fetch_array($totalesLenguaMujeres34);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '35' AND sexo LIKE '%M%'";
    $totalesLenguaMujeres35 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaMujeres35);
    $lenguaTotalesMujeres35= mysqli_fetch_array($totalesLenguaMujeres35);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '36' AND sexo LIKE '%M%'";
    $totalesLenguaMujeres36 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaMujeres36);
    $lenguaTotalesMujeres36= mysqli_fetch_array($totalesLenguaMujeres36);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '37' AND sexo LIKE '%M%'";
    $totalesLenguaMujeres37 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaMujeres37);
    $lenguaTotalesMujeres37= mysqli_fetch_array($totalesLenguaMujeres37);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '38' AND sexo LIKE '%M%'";
    $totalesLenguaMujeres38 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaMujeres38);
    $lenguaTotalesMujeres38= mysqli_fetch_array($totalesLenguaMujeres38);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '39' AND sexo LIKE '%M%'";
    $totalesLenguaMujeres39 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaMujeres39);
    $lenguaTotalesMujeres39= mysqli_fetch_array($totalesLenguaMujeres39);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '40' AND sexo LIKE '%M%'";
    $totalesLenguaMujeres40 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaMujeres40);
    $lenguaTotalesMujeres40= mysqli_fetch_array($totalesLenguaMujeres40);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '41' AND sexo LIKE '%M%'";
    $totalesLenguaMujeres41 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaMujeres41);
    $lenguaTotalesMujeres41= mysqli_fetch_array($totalesLenguaMujeres41);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '42' AND sexo LIKE '%M%'";
    $totalesLenguaMujeres42 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaMujeres42);
    $lenguaTotalesMujeres42= mysqli_fetch_array($totalesLenguaMujeres42);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '43' AND sexo LIKE '%M%'";
    $totalesLenguaMujeres43 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaMujeres43);
    $lenguaTotalesMujeres43= mysqli_fetch_array($totalesLenguaMujeres43);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '44' AND sexo LIKE '%M%'";
    $totalesLenguaMujeres44 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaMujeres44);
    $lenguaTotalesMujeres44= mysqli_fetch_array($totalesLenguaMujeres44);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '45' AND sexo LIKE '%M%'";
    $totalesLenguaMujeres45 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaMujeres45);
    $lenguaTotalesMujeres45= mysqli_fetch_array($totalesLenguaMujeres45);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '46' AND sexo LIKE '%M%'";
    $totalesLenguaMujeres46 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaMujeres46);
    $lenguaTotalesMujeres46= mysqli_fetch_array($totalesLenguaMujeres46);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '47' AND sexo LIKE '%M%'";
    $totalesLenguaMujeres47 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaMujeres47);
    $lenguaTotalesMujeres47= mysqli_fetch_array($totalesLenguaMujeres47);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '48' AND sexo LIKE '%M%'";
    $totalesLenguaMujeres48 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaMujeres48);
    $lenguaTotalesMujeres48= mysqli_fetch_array($totalesLenguaMujeres48);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '49' AND sexo LIKE '%M%'";
    $totalesLenguaMujeres49 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaMujeres49);
    $lenguaTotalesMujeres49= mysqli_fetch_array($totalesLenguaMujeres49);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '50' AND sexo LIKE '%M%'";
    $totalesLenguaMujeres50 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaMujeres50);
    $lenguaTotalesMujeres50= mysqli_fetch_array($totalesLenguaMujeres50);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '51' AND sexo LIKE '%M%'";
    $totalesLenguaMujeres51 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaMujeres51);
    $lenguaTotalesMujeres51= mysqli_fetch_array($totalesLenguaMujeres51);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '52' AND sexo LIKE '%M%'";
    $totalesLenguaMujeres52 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaMujeres52);
    $lenguaTotalesMujeres52= mysqli_fetch_array($totalesLenguaMujeres52);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '53' AND sexo LIKE '%M%'";
    $totalesLenguaMujeres53 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaMujeres53);
    $lenguaTotalesMujeres53= mysqli_fetch_array($totalesLenguaMujeres53);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '54' AND sexo LIKE '%M%'";
    $totalesLenguaMujeres54 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaMujeres54);
    $lenguaTotalesMujeres54= mysqli_fetch_array($totalesLenguaMujeres54);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '55' AND sexo LIKE '%M%'";
    $totalesLenguaMujeres55 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaMujeres55);
    $lenguaTotalesMujeres55= mysqli_fetch_array($totalesLenguaMujeres55);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '56' AND sexo LIKE '%M%'";
    $totalesLenguaMujeres56 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaMujeres56);
    $lenguaTotalesMujeres56= mysqli_fetch_array($totalesLenguaMujeres56);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '57' AND sexo LIKE '%M%'";
    $totalesLenguaMujeres57 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaMujeres57);
    $lenguaTotalesMujeres57= mysqli_fetch_array($totalesLenguaMujeres57);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '58' AND sexo LIKE '%M%'";
    $totalesLenguaMujeres58 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaMujeres58);
    $lenguaTotalesMujeres58= mysqli_fetch_array($totalesLenguaMujeres58);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '59' AND sexo LIKE '%M%'";
    $totalesLenguaMujeres59 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaMujeres59);
    $lenguaTotalesMujeres59= mysqli_fetch_array($totalesLenguaMujeres59);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '60' AND sexo LIKE '%M%'";
    $totalesLenguaMujeres60 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaMujeres60);
    $lenguaTotalesMujeres60= mysqli_fetch_array($totalesLenguaMujeres60);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '61' AND sexo LIKE '%M%'";
    $totalesLenguaMujeres61 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaMujeres61);
    $lenguaTotalesMujeres61= mysqli_fetch_array($totalesLenguaMujeres61);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '62' AND sexo LIKE '%M%'";
    $totalesLenguaMujeres62 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaMujeres62);
    $lenguaTotalesMujeres62= mysqli_fetch_array($totalesLenguaMujeres62);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '63' AND sexo LIKE '%M%'";
    $totalesLenguaMujeres63 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaMujeres63);
    $lenguaTotalesMujeres63= mysqli_fetch_array($totalesLenguaMujeres63);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '64' AND sexo LIKE '%M%'";
    $totalesLenguaMujeres64 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaMujeres64);
    $lenguaTotalesMujeres64= mysqli_fetch_array($totalesLenguaMujeres64);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '65' AND sexo LIKE '%M%'";
    $totalesLenguaMujeres65 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaMujeres65);
    $lenguaTotalesMujeres65= mysqli_fetch_array($totalesLenguaMujeres65);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '66' AND sexo LIKE '%M%'";
    $totalesLenguaMujeres66 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaMujeres66);
    $lenguaTotalesMujeres66= mysqli_fetch_array($totalesLenguaMujeres66);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '67' AND sexo LIKE '%M%'";
    $totalesLenguaMujeres67 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaMujeres67);
    $lenguaTotalesMujeres67= mysqli_fetch_array($totalesLenguaMujeres67);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '68' AND sexo LIKE '%M%'";
    $totalesLenguaMujeres68 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaMujeres68);
    $lenguaTotalesMujeres68= mysqli_fetch_array($totalesLenguaMujeres68);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '69' AND sexo LIKE '%M%'";
    $totalesLenguaMujeres69 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaMujeres69);
    $lenguaTotalesMujeres69= mysqli_fetch_array($totalesLenguaMujeres69);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '70' AND sexo LIKE '%M%'";
    $totalesLenguaMujeres70 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaMujeres70);
    $lenguaTotalesMujeres70= mysqli_fetch_array($totalesLenguaMujeres70);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '71' AND sexo LIKE '%M%'";
    $totalesLenguaMujeres71 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaMujeres71);
    $lenguaTotalesMujeres71= mysqli_fetch_array($totalesLenguaMujeres71);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '0' AND sexo LIKE '%H%'";
    $totalesLenguaMujeres0 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaMujeres0);
    $lenguaTotalesMujeres0= mysqli_fetch_array($totalesLenguaMujeres0);
/**
     * uSUARIOS INSCRITOS POR LENGUA INDIGENA Hombres
     */
    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '1' AND sexo LIKE '%H%'";
    $totalesLenguaHombres1 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaHombres1);
    $lenguaTotalesHombres1= mysqli_fetch_array($totalesLenguaHombres1);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '2' AND sexo LIKE '%H%'";
    $totalesLenguaHombres2 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaHombres2);
    $lenguaTotalesHombres2= mysqli_fetch_array($totalesLenguaHombres2);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '3' AND sexo LIKE '%H%'";
    $totalesLenguaHombres3 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaHombres3);
    $lenguaTotalesHombres3= mysqli_fetch_array($totalesLenguaHombres3);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '4' AND sexo LIKE '%H%'";
    $totalesLenguaHombres4 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaHombres4);
    $lenguaTotalesHombres4= mysqli_fetch_array($totalesLenguaHombres4);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '5' AND sexo LIKE '%H%'";
    $totalesLenguaHombres5 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaHombres5);
    $lenguaTotalesHombres5= mysqli_fetch_array($totalesLenguaHombres5);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '6' AND sexo LIKE '%H%'";
    $totalesLenguaHombres6 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaHombres6);
    $lenguaTotalesHombres6= mysqli_fetch_array($totalesLenguaHombres6);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '7' AND sexo LIKE '%H%'";
    $totalesLenguaHombres7 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaHombres7);
    $lenguaTotalesHombres7= mysqli_fetch_array($totalesLenguaHombres7);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '8' AND sexo LIKE '%H%'";
    $totalesLenguaHombres8 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaHombres8);
    $lenguaTotalesHombres8= mysqli_fetch_array($totalesLenguaHombres8);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '9' AND sexo LIKE '%H%'";
    $totalesLenguaHombres9 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaHombres9);
    $lenguaTotalesHombres9= mysqli_fetch_array($totalesLenguaHombres9);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '10' AND sexo LIKE '%H%'";
    $totalesLenguaHombres10 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaHombres10);
    $lenguaTotalesHombres10= mysqli_fetch_array($totalesLenguaHombres10);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '11' AND sexo LIKE '%H%'";
    $totalesLenguaHombres11 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaHombres11);
    $lenguaTotalesHombres11= mysqli_fetch_array($totalesLenguaHombres11);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '12' AND sexo LIKE '%H%'";
    $totalesLenguaHombres12 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaHombres12);
    $lenguaTotalesHombres12= mysqli_fetch_array($totalesLenguaHombres12);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '13' AND sexo LIKE '%H%'";
    $totalesLenguaHombres13 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaHombres13);
    $lenguaTotalesHombres13= mysqli_fetch_array($totalesLenguaHombres13);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '14' AND sexo LIKE '%H%'";
    $totalesLenguaHombres14 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaHombres14);
    $lenguaTotalesHombres14= mysqli_fetch_array($totalesLenguaHombres14);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '15' AND sexo LIKE '%H%'";
    $totalesLenguaHombres15 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaHombres15);
    $lenguaTotalesHombres15= mysqli_fetch_array($totalesLenguaHombres15);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '16' AND sexo LIKE '%H%'";
    $totalesLenguaHombres16 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaHombres16);
    $lenguaTotalesHombres16= mysqli_fetch_array($totalesLenguaHombres16);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '17' AND sexo LIKE '%H%'";
    $totalesLenguaHombres17 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaHombres17);
    $lenguaTotalesHombres17= mysqli_fetch_array($totalesLenguaHombres17);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '18' AND sexo LIKE '%H%'";
    $totalesLenguaHombres18 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaHombres18);
    $lenguaTotalesHombres18= mysqli_fetch_array($totalesLenguaHombres18);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '19' AND sexo LIKE '%H%'";
    $totalesLenguaHombres19 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaHombres19);
    $lenguaTotalesHombres19= mysqli_fetch_array($totalesLenguaHombres19);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '20' AND sexo LIKE '%H%'";
    $totalesLenguaHombres20 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaHombres20);
    $lenguaTotalesHombres20= mysqli_fetch_array($totalesLenguaHombres20);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '21' AND sexo LIKE '%H%'";
    $totalesLenguaHombres21 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaHombres21);
    $lenguaTotalesHombres21= mysqli_fetch_array($totalesLenguaHombres21);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '22' AND sexo LIKE '%H%'";
    $totalesLenguaHombres22 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaHombres22);
    $lenguaTotalesHombres22= mysqli_fetch_array($totalesLenguaHombres22);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '23' AND sexo LIKE '%H%'";
    $totalesLenguaHombres23 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaHombres23);
    $lenguaTotalesHombres23= mysqli_fetch_array($totalesLenguaHombres23);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '24' AND sexo LIKE '%H%'";
    $totalesLenguaHombres24 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaHombres24);
    $lenguaTotalesHombres24= mysqli_fetch_array($totalesLenguaHombres24);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '25' AND sexo LIKE '%H%'";
    $totalesLenguaHombres25 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaHombres25);
    $lenguaTotalesHombres25= mysqli_fetch_array($totalesLenguaHombres25);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '26' AND sexo LIKE '%H%'";
    $totalesLenguaHombres26 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaHombres26);
    $lenguaTotalesHombres26= mysqli_fetch_array($totalesLenguaHombres26);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '27' AND sexo LIKE '%H%'";
    $totalesLenguaHombres27 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaHombres27);
    $lenguaTotalesHombres27= mysqli_fetch_array($totalesLenguaHombres27);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '28' AND sexo LIKE '%H%'";
    $totalesLenguaHombres28 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaHombres28);
    $lenguaTotalesHombres28= mysqli_fetch_array($totalesLenguaHombres28);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '29' AND sexo LIKE '%H%'";
    $totalesLenguaHombres29 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaHombres29);
    $lenguaTotalesHombres29= mysqli_fetch_array($totalesLenguaHombres29);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '30' AND sexo LIKE '%H%'";
    $totalesLenguaHombres30 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaHombres30);
    $lenguaTotalesHombres30= mysqli_fetch_array($totalesLenguaHombres30);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '31' AND sexo LIKE '%H%'";
    $totalesLenguaHombres31 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaHombres31);
    $lenguaTotalesHombres31= mysqli_fetch_array($totalesLenguaHombres31);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '32' AND sexo LIKE '%H%'";
    $totalesLenguaHombres32 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaHombres32);
    $lenguaTotalesHombres32= mysqli_fetch_array($totalesLenguaHombres32);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '33' AND sexo LIKE '%H%'";
    $totalesLenguaHombres33 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaHombres33);
    $lenguaTotalesHombres33= mysqli_fetch_array($totalesLenguaHombres33);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '34' AND sexo LIKE '%H%'";
    $totalesLenguaHombres34 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaHombres34);
    $lenguaTotalesHombres34= mysqli_fetch_array($totalesLenguaHombres34);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '35' AND sexo LIKE '%H%'";
    $totalesLenguaHombres35 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaHombres35);
    $lenguaTotalesHombres35= mysqli_fetch_array($totalesLenguaHombres35);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '36' AND sexo LIKE '%H%'";
    $totalesLenguaHombres36 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaHombres36);
    $lenguaTotalesHombres36= mysqli_fetch_array($totalesLenguaHombres36);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '37' AND sexo LIKE '%H%'";
    $totalesLenguaHombres37 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaHombres37);
    $lenguaTotalesHombres37= mysqli_fetch_array($totalesLenguaHombres37);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '38' AND sexo LIKE '%H%'";
    $totalesLenguaHombres38 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaHombres38);
    $lenguaTotalesHombres38= mysqli_fetch_array($totalesLenguaHombres38);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '39' AND sexo LIKE '%H%'";
    $totalesLenguaHombres39 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaHombres39);
    $lenguaTotalesHombres39= mysqli_fetch_array($totalesLenguaHombres39);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '40' AND sexo LIKE '%H%'";
    $totalesLenguaHombres40 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaHombres40);
    $lenguaTotalesHombres40= mysqli_fetch_array($totalesLenguaHombres40);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '41' AND sexo LIKE '%H%'";
    $totalesLenguaHombres41 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaHombres41);
    $lenguaTotalesHombres41= mysqli_fetch_array($totalesLenguaHombres41);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '42' AND sexo LIKE '%H%'";
    $totalesLenguaHombres42 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaHombres42);
    $lenguaTotalesHombres42= mysqli_fetch_array($totalesLenguaHombres42);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '43' AND sexo LIKE '%H%'";
    $totalesLenguaHombres43 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaHombres43);
    $lenguaTotalesHombres43= mysqli_fetch_array($totalesLenguaHombres43);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '44' AND sexo LIKE '%H%'";
    $totalesLenguaHombres44 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaHombres44);
    $lenguaTotalesHombres44= mysqli_fetch_array($totalesLenguaHombres44);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '45' AND sexo LIKE '%H%'";
    $totalesLenguaHombres45 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaHombres45);
    $lenguaTotalesHombres45= mysqli_fetch_array($totalesLenguaHombres45);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '46' AND sexo LIKE '%H%'";
    $totalesLenguaHombres46 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaHombres46);
    $lenguaTotalesHombres46= mysqli_fetch_array($totalesLenguaHombres46);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '47' AND sexo LIKE '%H%'";
    $totalesLenguaHombres47 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaHombres47);
    $lenguaTotalesHombres47= mysqli_fetch_array($totalesLenguaHombres47);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '48' AND sexo LIKE '%H%'";
    $totalesLenguaHombres48 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaHombres48);
    $lenguaTotalesHombres48= mysqli_fetch_array($totalesLenguaHombres48);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '49' AND sexo LIKE '%H%'";
    $totalesLenguaHombres49 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaHombres49);
    $lenguaTotalesHombres49= mysqli_fetch_array($totalesLenguaHombres49);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '50' AND sexo LIKE '%H%'";
    $totalesLenguaHombres50 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaHombres50);
    $lenguaTotalesHombres50= mysqli_fetch_array($totalesLenguaHombres50);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '51' AND sexo LIKE '%H%'";
    $totalesLenguaHombres51 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaHombres51);
    $lenguaTotalesHombres51= mysqli_fetch_array($totalesLenguaHombres51);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '52' AND sexo LIKE '%H%'";
    $totalesLenguaHombres52 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaHombres52);
    $lenguaTotalesHombres52= mysqli_fetch_array($totalesLenguaHombres52);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '53' AND sexo LIKE '%H%'";
    $totalesLenguaHombres53 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaHombres53);
    $lenguaTotalesHombres53= mysqli_fetch_array($totalesLenguaHombres53);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '54' AND sexo LIKE '%H%'";
    $totalesLenguaHombres54 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaHombres54);
    $lenguaTotalesHombres54= mysqli_fetch_array($totalesLenguaHombres54);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '55' AND sexo LIKE '%H%'";
    $totalesLenguaHombres55 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaHombres55);
    $lenguaTotalesHombres55= mysqli_fetch_array($totalesLenguaHombres55);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '56' AND sexo LIKE '%H%'";
    $totalesLenguaHombres56 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaHombres56);
    $lenguaTotalesHombres56= mysqli_fetch_array($totalesLenguaHombres56);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '57' AND sexo LIKE '%H%'";
    $totalesLenguaHombres57 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaHombres57);
    $lenguaTotalesHombres57= mysqli_fetch_array($totalesLenguaHombres57);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '58' AND sexo LIKE '%H%'";
    $totalesLenguaHombres58 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaHombres58);
    $lenguaTotalesHombres58= mysqli_fetch_array($totalesLenguaHombres58);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '59' AND sexo LIKE '%H%'";
    $totalesLenguaHombres59 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaHombres59);
    $lenguaTotalesHombres59= mysqli_fetch_array($totalesLenguaHombres59);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '60' AND sexo LIKE '%H%'";
    $totalesLenguaHombres60 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaHombres60);
    $lenguaTotalesHombres60= mysqli_fetch_array($totalesLenguaHombres60);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '61' AND sexo LIKE '%H%'";
    $totalesLenguaHombres61 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaHombres61);
    $lenguaTotalesHombres61= mysqli_fetch_array($totalesLenguaHombres61);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '62' AND sexo LIKE '%H%'";
    $totalesLenguaHombres62 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaHombres62);
    $lenguaTotalesHombres62= mysqli_fetch_array($totalesLenguaHombres62);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '63' AND sexo LIKE '%H%'";
    $totalesLenguaHombres63 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaHombres63);
    $lenguaTotalesHombres63= mysqli_fetch_array($totalesLenguaHombres63);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '64' AND sexo LIKE '%H%'";
    $totalesLenguaHombres64 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaHombres64);
    $lenguaTotalesHombres64= mysqli_fetch_array($totalesLenguaHombres64);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '65' AND sexo LIKE '%H%'";
    $totalesLenguaHombres65 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaHombres65);
    $lenguaTotalesHombres65= mysqli_fetch_array($totalesLenguaHombres65);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '66' AND sexo LIKE '%H%'";
    $totalesLenguaHombres66 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaHombres66);
    $lenguaTotalesHombres66= mysqli_fetch_array($totalesLenguaHombres66);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '67' AND sexo LIKE '%H%'";
    $totalesLenguaHombres67 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaHombres67);
    $lenguaTotalesHombres67= mysqli_fetch_array($totalesLenguaHombres67);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '68' AND sexo LIKE '%H%'";
    $totalesLenguaHombres68 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaHombres68);
    $lenguaTotalesHombres68= mysqli_fetch_array($totalesLenguaHombres68);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '69' AND sexo LIKE '%H%'";
    $totalesLenguaHombres69 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaHombres69);
    $lenguaTotalesHombres69= mysqli_fetch_array($totalesLenguaHombres69);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '70' AND sexo LIKE '%H%'";
    $totalesLenguaHombres70 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaHombres70);
    $lenguaTotalesHombres70= mysqli_fetch_array($totalesLenguaHombres70);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '71' AND sexo LIKE '%H%'";
    $totalesLenguaHombres71 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaHombres71);
    $lenguaTotalesHombres71= mysqli_fetch_array($totalesLenguaHombres71);

    $sql="SELECT count(*) AS userPorLengua FROM Usuario WHERE lenguaIndigena = '0' AND sexo LIKE '%H%'";
    $totalesLenguaHombres0 = mysqli_query($con, $sql);
    //var_dump($totalesLenguaHombres0);
    $lenguaTotalesHombres0= mysqli_fetch_array($totalesLenguaHombres0);
     /**
     * uSUARIOS INSCRITOS POR pueblos originarios
     */
    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '1'";
    $totalesPueblo1 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo1);
    $puebloTotales1= mysqli_fetch_array($totalesPueblo1);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '2'";
    $totalesPueblo2 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo2);
    $totalesPueblo2= mysqli_fetch_array($totalesPueblo2);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '3'";
    $totalesPueblo3 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo3);
    $totalesPueblo3= mysqli_fetch_array($totalesPueblo3);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '4'";
    $totalesPueblo4 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo4);
    $totalesPueblo4= mysqli_fetch_array($totalesPueblo4);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '5'";
    $totalesPueblo5 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo5);
    $totalesPueblo5= mysqli_fetch_array($totalesPueblo5);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '6'";
    $totalesPueblo6 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo6);
    $totalesPueblo6= mysqli_fetch_array($totalesPueblo6);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '7'";
    $totalesPueblo7 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo7);
    $totalesPueblo7= mysqli_fetch_array($totalesPueblo7);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '8'";
    $totalesPueblo8 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo8);
    $totalesPueblo8= mysqli_fetch_array($totalesPueblo8);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '9'";
    $totalesPueblo9 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo9);
    $totalesPueblo9= mysqli_fetch_array($totalesPueblo9);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '10'";
    $totalesPueblo10 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo10);
    $totalesPueblo10= mysqli_fetch_array($totalesPueblo10);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '11'";
    $totalesPueblo11 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo11);
    $totalesPueblo11= mysqli_fetch_array($totalesPueblo11);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '12'";
    $totalesPueblo12 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo12);
    $totalesPueblo12= mysqli_fetch_array($totalesPueblo12);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '13'";
    $totalesPueblo13 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo13);
    $totalesPueblo13= mysqli_fetch_array($totalesPueblo13);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '14'";
    $totalesPueblo14 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo14);
    $totalesPueblo14= mysqli_fetch_array($totalesPueblo14);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '15'";
    $totalesPueblo15 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo15);
    $totalesPueblo15= mysqli_fetch_array($totalesPueblo15);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '16'";
    $totalesPueblo16 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo16);
    $totalesPueblo16= mysqli_fetch_array($totalesPueblo16);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '17'";
    $totalesPueblo17 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo17);
    $totalesPueblo17= mysqli_fetch_array($totalesPueblo17);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '18'";
    $totalesPueblo18 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo18);
    $totalesPueblo18= mysqli_fetch_array($totalesPueblo18);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '19'";
    $totalesPueblo19 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo19);
    $totalesPueblo19= mysqli_fetch_array($totalesPueblo19);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '20'";
    $totalesPueblo20 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo20);
    $totalesPueblo20= mysqli_fetch_array($totalesPueblo20);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '21'";
    $totalesPueblo21 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo21);
    $totalesPueblo21= mysqli_fetch_array($totalesPueblo21);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '22'";
    $totalesPueblo22 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo22);
    $totalesPueblo22= mysqli_fetch_array($totalesPueblo22);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '23'";
    $totalesPueblo23 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo23);
    $totalesPueblo23= mysqli_fetch_array($totalesPueblo23);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '24'";
    $totalesPueblo24 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo24);
    $totalesPueblo24= mysqli_fetch_array($totalesPueblo24);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '25'";
    $totalesPueblo25 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo25);
    $totalesPueblo25= mysqli_fetch_array($totalesPueblo25);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '26'";
    $totalesPueblo26 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo26);
    $totalesPueblo26= mysqli_fetch_array($totalesPueblo26);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '27'";
    $totalesPueblo27 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo27);
    $totalesPueblo27= mysqli_fetch_array($totalesPueblo27);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '28'";
    $totalesPueblo28 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo28);
    $totalesPueblo28= mysqli_fetch_array($totalesPueblo28);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '29'";
    $totalesPueblo29 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo29);
    $totalesPueblo29= mysqli_fetch_array($totalesPueblo29);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '30'";
    $totalesPueblo30 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo30);
    $totalesPueblo30= mysqli_fetch_array($totalesPueblo30);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '31'";
    $totalesPueblo31 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo31);
    $totalesPueblo31= mysqli_fetch_array($totalesPueblo31);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '32'";
    $totalesPueblo32 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo32);
    $totalesPueblo32= mysqli_fetch_array($totalesPueblo32);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '33'";
    $totalesPueblo33 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo33);
    $totalesPueblo33= mysqli_fetch_array($totalesPueblo33);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '34'";
    $totalesPueblo34 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo34);
    $totalesPueblo34= mysqli_fetch_array($totalesPueblo34);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '35'";
    $totalesPueblo35 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo35);
    $totalesPueblo35= mysqli_fetch_array($totalesPueblo35);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '36'";
    $totalesPueblo36 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo36);
    $totalesPueblo36= mysqli_fetch_array($totalesPueblo36);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '37'";
    $totalesPueblo37 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo37);
    $totalesPueblo37= mysqli_fetch_array($totalesPueblo37);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '38'";
    $totalesPueblo38 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo38);
    $totalesPueblo38= mysqli_fetch_array($totalesPueblo38);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '39'";
    $totalesPueblo39 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo39);
    $totalesPueblo39= mysqli_fetch_array($totalesPueblo39);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '40'";
    $totalesPueblo40 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo40);
    $totalesPueblo40= mysqli_fetch_array($totalesPueblo40);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '41'";
    $totalesPueblo41 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo41);
    $totalesPueblo41= mysqli_fetch_array($totalesPueblo41);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '42'";
    $totalesPueblo42 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo42);
    $totalesPueblo42= mysqli_fetch_array($totalesPueblo42);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '43'";
    $totalesPueblo43 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo43);
    $totalesPueblo43= mysqli_fetch_array($totalesPueblo43);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '44'";
    $totalesPueblo44 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo44);
    $totalesPueblo44= mysqli_fetch_array($totalesPueblo44);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '45'";
    $totalesPueblo45 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo45);
    $totalesPueblo45= mysqli_fetch_array($totalesPueblo45);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '46'";
    $totalesPueblo46 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo46);
    $totalesPueblo46= mysqli_fetch_array($totalesPueblo46);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '47'";
    $totalesPueblo47 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo47);
    $totalesPueblo47= mysqli_fetch_array($totalesPueblo47);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '48'";
    $totalesPueblo48 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo48);
    $totalesPueblo48= mysqli_fetch_array($totalesPueblo48);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '49'";
    $totalesPueblo49 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo49);
    $totalesPueblo49= mysqli_fetch_array($totalesPueblo49);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '50'";
    $totalesPueblo50 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo50);
    $totalesPueblo50= mysqli_fetch_array($totalesPueblo50);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '51'";
    $totalesPueblo51 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo51);
    $totalesPueblo51= mysqli_fetch_array($totalesPueblo51);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '52'";
    $totalesPueblo52 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo52);
    $totalesPueblo52= mysqli_fetch_array($totalesPueblo52);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '53'";
    $totalesPueblo53 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo53);
    $totalesPueblo53= mysqli_fetch_array($totalesPueblo53);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '54'";
    $totalesPueblo54 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo54);
    $totalesPueblo54= mysqli_fetch_array($totalesPueblo54);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '55'";
    $totalesPueblo55 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo55);
    $totalesPueblo55= mysqli_fetch_array($totalesPueblo55);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '56'";
    $totalesPueblo56 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo56);
    $totalesPueblo56= mysqli_fetch_array($totalesPueblo56);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '57'";
    $totalesPueblo57 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo57);
    $totalesPueblo57= mysqli_fetch_array($totalesPueblo57);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '58'";
    $totalesPueblo58 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo58);
    $totalesPueblo58= mysqli_fetch_array($totalesPueblo58);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '59'";
    $totalesPueblo59 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo59);
    $totalesPueblo59= mysqli_fetch_array($totalesPueblo59);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '60'";
    $totalesPueblo60 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo60);
    $totalesPueblo60= mysqli_fetch_array($totalesPueblo60);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '61'";
    $totalesPueblo61 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo61);
    $totalesPueblo61= mysqli_fetch_array($totalesPueblo61);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '62'";
    $totalesPueblo62 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo62);
    $totalesPueblo62= mysqli_fetch_array($totalesPueblo62);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '63'";
    $totalesPueblo63 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo63);
    $totalesPueblo63= mysqli_fetch_array($totalesPueblo63);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '64'";
    $totalesPueblo64 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo64);
    $totalesPueblo64= mysqli_fetch_array($totalesPueblo64);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '65'";
    $totalesPueblo65 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo65);
    $totalesPueblo65= mysqli_fetch_array($totalesPueblo65);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '66'";
    $totalesPueblo66 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo66);
    $totalesPueblo66= mysqli_fetch_array($totalesPueblo66);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '67'";
    $totalesPueblo67 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo67);
    $totalesPueblo67= mysqli_fetch_array($totalesPueblo67);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '68'";
    $totalesPueblo68 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo68);
    $totalesPueblo68= mysqli_fetch_array($totalesPueblo68);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '69'";
    $totalesPueblo69 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo69);
    $totalesPueblo69= mysqli_fetch_array($totalesPueblo69);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '70'";
    $totalesPueblo70 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo70);
    $totalesPueblo70= mysqli_fetch_array($totalesPueblo70);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '71'";
    $totalesPueblo71 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo71);
    $totalesPueblo71= mysqli_fetch_array($totalesPueblo71);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '52'";
    $totalesPueblo72 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo72);
    $totalesPueblo72= mysqli_fetch_array($totalesPueblo72);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '53'";
    $totalesPueblo73 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo73);
    $totalesPueblo73= mysqli_fetch_array($totalesPueblo73);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '54'";
    $totalesPueblo74 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo74);
    $totalesPueblo74= mysqli_fetch_array($totalesPueblo74);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '55'";
    $totalesPueblo75 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo75);
    $totalesPueblo75= mysqli_fetch_array($totalesPueblo75);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '56'";
    $totalesPueblo76 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo76);
    $totalesPueblo76= mysqli_fetch_array($totalesPueblo76);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '57'";
    $totalesPueblo77 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo77);
    $totalesPueblo77= mysqli_fetch_array($totalesPueblo77);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '58'";
    $totalesPueblo78 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo78);
    $totalesPueblo78= mysqli_fetch_array($totalesPueblo78);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '59'";
    $totalesPueblo79 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo79);
    $totalesPueblo79= mysqli_fetch_array($totalesPueblo79);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '60'";
    $totalesPueblo80 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo80);
    $totalesPueblo80= mysqli_fetch_array($totalesPueblo80);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '61'";
    $totalesPueblo81 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo81);
    $totalesPueblo81= mysqli_fetch_array($totalesPueblo81);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '62'";
    $totalesPueblo82 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo82);
    $totalesPueblo82= mysqli_fetch_array($totalesPueblo82);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '63'";
    $totalesPueblo83 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo83);
    $totalesPueblo83= mysqli_fetch_array($totalesPueblo83);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '64'";
    $totalesPueblo84 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo84);
    $totalesPueblo84= mysqli_fetch_array($totalesPueblo84);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '65'";
    $totalesPueblo85 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo85);
    $totalesPueblo85= mysqli_fetch_array($totalesPueblo85);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '66'";
    $totalesPueblo86 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo86);
    $totalesPueblo86= mysqli_fetch_array($totalesPueblo86);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '67'";
    $totalesPueblo87 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo87);
    $totalesPueblo87= mysqli_fetch_array($totalesPueblo87);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '68'";
    $totalesPueblo88 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo88);
    $totalesPueblo88= mysqli_fetch_array($totalesPueblo88);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '69'";
    $totalesPueblo89 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo89);
    $totalesPueblo89= mysqli_fetch_array($totalesPueblo89);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '70'";
    $totalesPueblo90 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo90);
    $totalesPueblo90= mysqli_fetch_array($totalesPueblo90);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '61'";
    $totalesPueblo91 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo91);
    $totalesPueblo91= mysqli_fetch_array($totalesPueblo91);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '62'";
    $totalesPueblo92 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo92);
    $totalesPueblo92= mysqli_fetch_array($totalesPueblo92);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '63'";
    $totalesPueblo93 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo93);
    $totalesPueblo93= mysqli_fetch_array($totalesPueblo93);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '64'";
    $totalesPueblo94 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo94);
    $totalesPueblo94= mysqli_fetch_array($totalesPueblo94);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '65'";
    $totalesPueblo95 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo95);
    $totalesPueblo95= mysqli_fetch_array($totalesPueblo95);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '66'";
    $totalesPueblo96 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo96);
    $totalesPueblo96= mysqli_fetch_array($totalesPueblo96);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '67'";
    $totalesPueblo97 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo97);
    $totalesPueblo97= mysqli_fetch_array($totalesPueblo97);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '68'";
    $totalesPueblo98 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo98);
    $totalesPueblo98= mysqli_fetch_array($totalesPueblo98);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '69'";
    $totalesPueblo99 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo99);
    $totalesPueblo99= mysqli_fetch_array($totalesPueblo99);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '70'";
    $totalesPueblo100 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo100);
    $totalesPueblo100= mysqli_fetch_array($totalesPueblo100);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '61'";
    $totalesPueblo101 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo101);
    $totalesPueblo81= mysqli_fetch_array($totalesPueblo101);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '62'";
    $totalesPueblo102 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo102);
    $totalesPueblo102= mysqli_fetch_array($totalesPueblo102);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '63'";
    $totalesPueblo103 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo103);
    $totalesPueblo103= mysqli_fetch_array($totalesPueblo103);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '64'";
    $totalesPueblo104 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo104);
    $totalesPueblo104= mysqli_fetch_array($totalesPueblo104);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '65'";
    $totalesPueblo105 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo105);
    $totalesPueblo105= mysqli_fetch_array($totalesPueblo105);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '66'";
    $totalesPueblo106 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo106);
    $totalesPueblo106= mysqli_fetch_array($totalesPueblo106);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '67'";
    $totalesPueblo107 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo107);
    $totalesPueblo107= mysqli_fetch_array($totalesPueblo107);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '68'";
    $totalesPueblo108 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo108);
    $totalesPueblo108= mysqli_fetch_array($totalesPueblo108);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '69'";
    $totalesPueblo109 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo109);
    $totalesPueblo109= mysqli_fetch_array($totalesPueblo109);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '70'";
    $totalesPueblo110 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo110);
    $totalesPueblo110= mysqli_fetch_array($totalesPueblo110);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '61'";
    $totalesPueblo111 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo111);
    $totalesPueblo111= mysqli_fetch_array($totalesPueblo111);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '62'";
    $totalesPueblo112 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo112);
    $totalesPueblo112= mysqli_fetch_array($totalesPueblo112);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '63'";
    $totalesPueblo113 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo113);
    $totalesPueblo113= mysqli_fetch_array($totalesPueblo113);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '64'";
    $totalesPueblo114 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo114);
    $totalesPueblo114= mysqli_fetch_array($totalesPueblo114);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '65'";
    $totalesPueblo115 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo115);
    $totalesPueblo115= mysqli_fetch_array($totalesPueblo115);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '66'";
    $totalesPueblo116 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo116);
    $totalesPueblo116= mysqli_fetch_array($totalesPueblo116);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '67'";
    $totalesPueblo117 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo117);
    $totalesPueblo117= mysqli_fetch_array($totalesPueblo117);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '68'";
    $totalesPueblo118 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo118);
    $totalesPueblo118= mysqli_fetch_array($totalesPueblo118);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '69'";
    $totalesPueblo119 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo119);
    $totalesPueblo119= mysqli_fetch_array($totalesPueblo119);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '69'";
    $totalesPueblo120 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo120);
    $totalesPueblo120= mysqli_fetch_array($totalesPueblo120);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '61'";
    $totalesPueblo121 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo121);
    $totalesPueblo121= mysqli_fetch_array($totalesPueblo121);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '62'";
    $totalesPueblo122 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo122);
    $totalesPueblo122= mysqli_fetch_array($totalesPueblo122);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '63'";
    $totalesPueblo123 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo123);
    $totalesPueblo123= mysqli_fetch_array($totalesPueblo123);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '64'";
    $totalesPueblo124 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo124);
    $totalesPueblo124= mysqli_fetch_array($totalesPueblo124);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '65'";
    $totalesPueblo125 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo125);
    $totalesPueblo125= mysqli_fetch_array($totalesPueblo125);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '66'";
    $totalesPueblo126 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo126);
    $totalesPueblo126= mysqli_fetch_array($totalesPueblo126);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '67'";
    $totalesPueblo127 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo127);
    $totalesPueblo127= mysqli_fetch_array($totalesPueblo127);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '64'";
    $totalesPueblo130 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo130);
    $totalesPueblo130= mysqli_fetch_array($totalesPueblo130);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '65'";
    $totalesPueblo131 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo131);
    $totalesPueblo131= mysqli_fetch_array($totalesPueblo131);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '66'";
    $totalesPueblo132 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo132);
    $totalesPueblo132= mysqli_fetch_array($totalesPueblo132);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '67'";
    $totalesPueblo133 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo133);
    $totalesPueblo133= mysqli_fetch_array($totalesPueblo133);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '66'";
    $totalesPueblo134 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo134);
    $totalesPueblo134= mysqli_fetch_array($totalesPueblo134);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '67'";
    $totalesPueblo135 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo135);
    $totalesPueblo135= mysqli_fetch_array($totalesPueblo135);

    $sql="SELECT count(*) AS userPorPueblo FROM Usuario WHERE puebloOriginarioCDMX = '0'";
    $totalesPueblo0 = mysqli_query($con, $sql);
    //var_dump($totalesPueblo0);
    $totalesPueblo0= mysqli_fetch_array($totalesPueblo0);
    /**
  * Usuarios totales por Grado de EStudios Mujeres
*/
    $sql="SELECT count(*) AS userPorGradoEstudios FROM Usuario WHERE gradoEstudios = '22' AND sexo LIKE '%M%'";
    $totalesGradoEstudiosMujeres1 = mysqli_query($con, $sql);
    //var_dump($totalesGradoEstudiosMujeres1);
    $gradoEstudiosTotalesMujeres1= mysqli_fetch_array($totalesGradoEstudiosMujeres1);

    $sql="SELECT count(*) AS userPorGradoEstudios FROM Usuario WHERE gradoEstudios = '1' AND sexo LIKE '%M%'";
    $totalesGradoEstudiosMujeres2 = mysqli_query($con, $sql);
    //var_dump($totalesGradoEstudiosMujeres2);
    $gradoEstudiosTotalesMujeres2= mysqli_fetch_array($totalesGradoEstudiosMujeres2);

    $sql="SELECT count(*) AS userPorGradoEstudios FROM Usuario WHERE gradoEstudios = '2' AND sexo LIKE '%M%'";
    $totalesGradoEstudiosMujeres3 = mysqli_query($con, $sql);
    //var_dump($totalesGradoEstudiosMujeres3);
    $gradoEstudiosTotalesMujeres3= mysqli_fetch_array($totalesGradoEstudiosMujeres3);

    $sql="SELECT count(*) AS userPorGradoEstudios FROM Usuario WHERE gradoEstudios = '3' AND sexo LIKE '%M%'";
    $totalesGradoEstudiosMujeres4 = mysqli_query($con, $sql);
    //var_dump($totalesGradoEstudiosMujeres4);
    $gradoEstudiosTotalesMujeres4= mysqli_fetch_array($totalesGradoEstudiosMujeres4);

    $sql="SELECT count(*) AS userPorGradoEstudios FROM Usuario WHERE gradoEstudios = '4' AND sexo LIKE '%M%'";
    $totalesGradoEstudiosMujeres5 = mysqli_query($con, $sql);
    //var_dump($totalesGradoEstudiosMujeres5);
    $gradoEstudiosTotalesMujeres5= mysqli_fetch_array($totalesGradoEstudiosMujeres5);

    $sql="SELECT count(*) AS userPorGradoEstudios FROM Usuario WHERE gradoEstudios = '5' AND sexo LIKE '%M%'";
    $totalesGradoEstudiosMujeres6 = mysqli_query($con, $sql);
    //var_dump($totalesGradoEstudiosMujeres6);
    $gradoEstudiosTotalesMujeres6= mysqli_fetch_array($totalesGradoEstudiosMujeres6);

    $sql="SELECT count(*) AS userPorGradoEstudios FROM Usuario WHERE gradoEstudios = '6' AND sexo LIKE '%M%'";
    $totalesGradoEstudiosMujeres7 = mysqli_query($con, $sql);
    //var_dump($totalesGradoEstudiosMujeres7);
    $gradoEstudiosTotalesMujeres7= mysqli_fetch_array($totalesGradoEstudiosMujeres7);

    $sql="SELECT count(*) AS userPorGradoEstudios FROM Usuario WHERE gradoEstudios = '7' AND sexo LIKE '%M%'";
    $totalesGradoEstudiosMujeres8 = mysqli_query($con, $sql);
    //var_dump($totalesGradoEstudiosMujeres8);
    $gradoEstudiosTotalesMujeres8= mysqli_fetch_array($totalesGradoEstudiosMujeres8);

    $sql="SELECT count(*) AS userPorGradoEstudios FROM Usuario WHERE gradoEstudios = '23' AND sexo LIKE '%M%'";
    $totalesGradoEstudiosMujeres9 = mysqli_query($con, $sql);
    //var_dump($totalesGradoEstudiosMujeres9);
    $gradoEstudiosTotalesMujeres9= mysqli_fetch_array($totalesGradoEstudiosMujeres9);

    $sql="SELECT count(*) AS userPorGradoEstudios FROM Usuario WHERE gradoEstudios = '8' AND sexo LIKE '%M%'";
    $totalesGradoEstudiosMujeres10 = mysqli_query($con, $sql);
    //var_dump($totalesGradoEstudiosMujeres10);
    $gradoEstudiosTotalesMujeres10= mysqli_fetch_array($totalesGradoEstudiosMujeres10);

    $sql="SELECT count(*) AS userPorGradoEstudios FROM Usuario WHERE gradoEstudios = '9' AND sexo LIKE '%M%'";
    $totalesGradoEstudiosMujeres11 = mysqli_query($con, $sql);
    //var_dump($totalesGradoEstudiosMujeres11);
    $gradoEstudiosTotalesMujeres11= mysqli_fetch_array($totalesGradoEstudiosMujeres11);

    $sql="SELECT count(*) AS userPorGradoEstudios FROM Usuario WHERE gradoEstudios = '10' AND sexo LIKE '%M%'";
    $totalesGradoEstudiosMujeres12 = mysqli_query($con, $sql);
    //var_dump($totalesGradoEstudiosMujeres12);
    $gradoEstudiosTotalesMujeres12= mysqli_fetch_array($totalesGradoEstudiosMujeres12);

    $sql="SELECT count(*) AS userPorGradoEstudios FROM Usuario WHERE gradoEstudios = '24' AND sexo LIKE '%M%'";
    $totalesGradoEstudiosMujeres13 = mysqli_query($con, $sql);
    //var_dump($totalesGradoEstudiosMujeres13);
    $gradoEstudiosTotalesMujeres13= mysqli_fetch_array($totalesGradoEstudiosMujeres13);

    $sql="SELECT count(*) AS userPorGradoEstudios FROM Usuario WHERE gradoEstudios = '11' AND sexo LIKE '%M%'";
    $totalesGradoEstudiosMujeres14 = mysqli_query($con, $sql);
    //var_dump($totalesGradoEstudiosMujeres14);
    $gradoEstudiosTotalesMujeres14= mysqli_fetch_array($totalesGradoEstudiosMujeres14);

    $sql="SELECT count(*) AS userPorGradoEstudios FROM Usuario WHERE gradoEstudios = '12' AND sexo LIKE '%M%'";
    $totalesGradoEstudiosMujeres15 = mysqli_query($con, $sql);
    //var_dump($totalesGradoEstudiosMujeres15);
    $gradoEstudiosTotalesMujeres15= mysqli_fetch_array($totalesGradoEstudiosMujeres15);

    $sql="SELECT count(*) AS userPorGradoEstudios FROM Usuario WHERE gradoEstudios = '13' AND sexo LIKE '%M%'";
    $totalesGradoEstudiosMujeres16 = mysqli_query($con, $sql);
    //var_dump($totalesGradoEstudiosMujeres16);
    $gradoEstudiosTotalesMujeres16= mysqli_fetch_array($totalesGradoEstudiosMujeres16);

    $sql="SELECT count(*) AS userPorGradoEstudios FROM Usuario WHERE gradoEstudios = '14' AND sexo LIKE '%M%'";
    $totalesGradoEstudiosMujeres17 = mysqli_query($con, $sql);
    //var_dump($totalesGradoEstudiosMujeres17);
    $gradoEstudiosTotalesMujeres17= mysqli_fetch_array($totalesGradoEstudiosMujeres17);

    $sql="SELECT count(*) AS userPorGradoEstudios FROM Usuario WHERE gradoEstudios = '15' AND sexo LIKE '%M%'";
    $totalesGradoEstudiosMujeres18 = mysqli_query($con, $sql);
    //var_dump($totalesGradoEstudiosMujeres18);
    $gradoEstudiosTotalesMujeres18= mysqli_fetch_array($totalesGradoEstudiosMujeres18);

    $sql="SELECT count(*) AS userPorGradoEstudios FROM Usuario WHERE gradoEstudios = '16' AND sexo LIKE '%M%'";
    $totalesGradoEstudiosMujeres19 = mysqli_query($con, $sql);
    //var_dump($totalesGradoEstudiosMujeres19);
    $gradoEstudiosTotalesMujeres19= mysqli_fetch_array($totalesGradoEstudiosMujeres19);

    $sql="SELECT count(*) AS userPorGradoEstudios FROM Usuario WHERE gradoEstudios = '25' AND sexo LIKE '%M%'";
    $totalesGradoEstudiosMujeres20 = mysqli_query($con, $sql);
    //var_dump($totalesGradoEstudiosMujeres20);
    $gradoEstudiosTotalesMujeres20= mysqli_fetch_array($totalesGradoEstudiosMujeres20);

    $sql="SELECT count(*) AS userPorGradoEstudios FROM Usuario WHERE gradoEstudios = '21' AND sexo LIKE '%M%'";
    $totalesGradoEstudiosMujeres21 = mysqli_query($con, $sql);
    //var_dump($totalesGradoEstudiosMujeres21);
    $gradoEstudiosTotalesMujeres21= mysqli_fetch_array($totalesGradoEstudiosMujeres21);

    $sql="SELECT count(*) AS userPorGradoEstudios FROM Usuario WHERE gradoEstudios = '17' AND sexo LIKE '%M%'";
    $totalesGradoEstudiosMujeres22 = mysqli_query($con, $sql);
    //var_dump($totalesGradoEstudiosMujeres22);
    $gradoEstudiosTotalesMujeres22= mysqli_fetch_array($totalesGradoEstudiosMujeres22);

    $sql="SELECT count(*) AS userPorGradoEstudios FROM Usuario WHERE gradoEstudios = '18' AND sexo LIKE '%M%'";
    $totalesGradoEstudiosMujeres23 = mysqli_query($con, $sql);
    //var_dump($totalesGradoEstudiosMujeres23);
    $gradoEstudiosTotalesMujeres23= mysqli_fetch_array($totalesGradoEstudiosMujeres23);

    $sql="SELECT count(*) AS userPorGradoEstudios FROM Usuario WHERE gradoEstudios = '19' AND sexo LIKE '%M%'";
    $totalesGradoEstudiosMujeres24 = mysqli_query($con, $sql);
    //var_dump($totalesGradoEstudiosMujeres24);
    $gradoEstudiosTotalesMujeres24= mysqli_fetch_array($totalesGradoEstudiosMujeres24);

    $sql="SELECT count(*) AS userPorGradoEstudios FROM Usuario WHERE gradoEstudios = '20' AND sexo LIKE '%M%'";
    $totalesGradoEstudiosMujeres25 = mysqli_query($con, $sql);
    //var_dump($totalesGradoEstudiosMujeres25);
    $gradoEstudiosTotalesMujeres25= mysqli_fetch_array($totalesGradoEstudiosMujeres25);

    $sql="SELECT count(*) AS userPorGradoEstudios FROM Usuario WHERE gradoEstudios = '26' AND sexo LIKE '%M%'";
    $totalesGradoEstudiosMujeres26 = mysqli_query($con, $sql);
    //var_dump($totalesGradoEstudiosMujeres26);
    $gradoEstudiosTotalesMujeres26= mysqli_fetch_array($totalesGradoEstudiosMujeres26);
    /**
  * Usuarios totales por Grado de EStudios Hombres
*/
    $sql="SELECT count(*) AS userPorGradoEstudios FROM Usuario WHERE gradoEstudios = '22' AND sexo LIKE '%H%'";
    $totalesGradoEstudiosHombres1 = mysqli_query($con, $sql);
    //var_dump($totalesGradoEstudiosHombres1);
    $gradoEstudiosTotalesHombres1= mysqli_fetch_array($totalesGradoEstudiosHombres1);

    $sql="SELECT count(*) AS userPorGradoEstudios FROM Usuario WHERE gradoEstudios = '1' AND sexo LIKE '%H%'";
    $totalesGradoEstudiosHombres2 = mysqli_query($con, $sql);
    //var_dump($totalesGradoEstudiosHombres2);
    $gradoEstudiosTotalesHombres2= mysqli_fetch_array($totalesGradoEstudiosHombres2);

    $sql="SELECT count(*) AS userPorGradoEstudios FROM Usuario WHERE gradoEstudios = '2' AND sexo LIKE '%H%'";
    $totalesGradoEstudiosHombres3 = mysqli_query($con, $sql);
    //var_dump($totalesGradoEstudiosHombres3);
    $gradoEstudiosTotalesHombres3= mysqli_fetch_array($totalesGradoEstudiosHombres3);

    $sql="SELECT count(*) AS userPorGradoEstudios FROM Usuario WHERE gradoEstudios = '3' AND sexo LIKE '%H%'";
    $totalesGradoEstudiosHombres4 = mysqli_query($con, $sql);
    //var_dump($totalesGradoEstudiosHombres4);
    $gradoEstudiosTotalesHombres4= mysqli_fetch_array($totalesGradoEstudiosHombres4);

    $sql="SELECT count(*) AS userPorGradoEstudios FROM Usuario WHERE gradoEstudios = '4' AND sexo LIKE '%H%'";
    $totalesGradoEstudiosHombres5 = mysqli_query($con, $sql);
    //var_dump($totalesGradoEstudiosHombres5);
    $gradoEstudiosTotalesHombres5= mysqli_fetch_array($totalesGradoEstudiosHombres5);

    $sql="SELECT count(*) AS userPorGradoEstudios FROM Usuario WHERE gradoEstudios = '5' AND sexo LIKE '%H%'";
    $totalesGradoEstudiosHombres6 = mysqli_query($con, $sql);
    //var_dump($totalesGradoEstudiosHombres6);
    $gradoEstudiosTotalesHombres6= mysqli_fetch_array($totalesGradoEstudiosHombres6);

    $sql="SELECT count(*) AS userPorGradoEstudios FROM Usuario WHERE gradoEstudios = '6' AND sexo LIKE '%H%'";
    $totalesGradoEstudiosHombres7 = mysqli_query($con, $sql);
    //var_dump($totalesGradoEstudiosHombres7);
    $gradoEstudiosTotalesHombres7= mysqli_fetch_array($totalesGradoEstudiosHombres7);

    $sql="SELECT count(*) AS userPorGradoEstudios FROM Usuario WHERE gradoEstudios = '7' AND sexo LIKE '%H%'";
    $totalesGradoEstudiosHombres8 = mysqli_query($con, $sql);
    //var_dump($totalesGradoEstudiosHombres8);
    $gradoEstudiosTotalesHombres8= mysqli_fetch_array($totalesGradoEstudiosHombres8);

    $sql="SELECT count(*) AS userPorGradoEstudios FROM Usuario WHERE gradoEstudios = '23' AND sexo LIKE '%H%'";
    $totalesGradoEstudiosHombres9 = mysqli_query($con, $sql);
    //var_dump($totalesGradoEstudiosHombres9);
    $gradoEstudiosTotalesHombres9= mysqli_fetch_array($totalesGradoEstudiosHombres9);

    $sql="SELECT count(*) AS userPorGradoEstudios FROM Usuario WHERE gradoEstudios = '8' AND sexo LIKE '%H%'";
    $totalesGradoEstudiosHombres10 = mysqli_query($con, $sql);
    //var_dump($totalesGradoEstudiosHombres10);
    $gradoEstudiosTotalesHombres10= mysqli_fetch_array($totalesGradoEstudiosHombres10);

    $sql="SELECT count(*) AS userPorGradoEstudios FROM Usuario WHERE gradoEstudios = '9' AND sexo LIKE '%H%'";
    $totalesGradoEstudiosHombres11 = mysqli_query($con, $sql);
    //var_dump($totalesGradoEstudiosHombres11);
    $gradoEstudiosTotalesHombres11= mysqli_fetch_array($totalesGradoEstudiosHombres11);

    $sql="SELECT count(*) AS userPorGradoEstudios FROM Usuario WHERE gradoEstudios = '10' AND sexo LIKE '%H%'";
    $totalesGradoEstudiosHombres12 = mysqli_query($con, $sql);
    //var_dump($totalesGradoEstudiosHombres12);
    $gradoEstudiosTotalesHombres12= mysqli_fetch_array($totalesGradoEstudiosHombres12);

    $sql="SELECT count(*) AS userPorGradoEstudios FROM Usuario WHERE gradoEstudios = '24' AND sexo LIKE '%H%'";
    $totalesGradoEstudiosHombres13 = mysqli_query($con, $sql);
    //var_dump($totalesGradoEstudiosHombres13);
    $gradoEstudiosTotalesHombres13= mysqli_fetch_array($totalesGradoEstudiosHombres13);

    $sql="SELECT count(*) AS userPorGradoEstudios FROM Usuario WHERE gradoEstudios = '11' AND sexo LIKE '%H%'";
    $totalesGradoEstudiosHombres14 = mysqli_query($con, $sql);
    //var_dump($totalesGradoEstudiosHombres14);
    $gradoEstudiosTotalesHombres14= mysqli_fetch_array($totalesGradoEstudiosHombres14);

    $sql="SELECT count(*) AS userPorGradoEstudios FROM Usuario WHERE gradoEstudios = '12' AND sexo LIKE '%H%'";
    $totalesGradoEstudiosHombres15 = mysqli_query($con, $sql);
    //var_dump($totalesGradoEstudiosHombres15);
    $gradoEstudiosTotalesHombres15= mysqli_fetch_array($totalesGradoEstudiosHombres15);

    $sql="SELECT count(*) AS userPorGradoEstudios FROM Usuario WHERE gradoEstudios = '13' AND sexo LIKE '%H%'";
    $totalesGradoEstudiosHombres16 = mysqli_query($con, $sql);
    //var_dump($totalesGradoEstudiosHombres16);
    $gradoEstudiosTotalesHombres16= mysqli_fetch_array($totalesGradoEstudiosHombres16);

    $sql="SELECT count(*) AS userPorGradoEstudios FROM Usuario WHERE gradoEstudios = '14' AND sexo LIKE '%H%'";
    $totalesGradoEstudiosHombres17 = mysqli_query($con, $sql);
    //var_dump($totalesGradoEstudiosHombres17);
    $gradoEstudiosTotalesHombres17= mysqli_fetch_array($totalesGradoEstudiosHombres17);

    $sql="SELECT count(*) AS userPorGradoEstudios FROM Usuario WHERE gradoEstudios = '15' AND sexo LIKE '%H%'";
    $totalesGradoEstudiosHombres18 = mysqli_query($con, $sql);
    //var_dump($totalesGradoEstudiosHombres18);
    $gradoEstudiosTotalesHombres18= mysqli_fetch_array($totalesGradoEstudiosHombres18);

    $sql="SELECT count(*) AS userPorGradoEstudios FROM Usuario WHERE gradoEstudios = '16' AND sexo LIKE '%H%'";
    $totalesGradoEstudiosHombres19 = mysqli_query($con, $sql);
    //var_dump($totalesGradoEstudiosHombres19);
    $gradoEstudiosTotalesHombres19= mysqli_fetch_array($totalesGradoEstudiosHombres19);

    $sql="SELECT count(*) AS userPorGradoEstudios FROM Usuario WHERE gradoEstudios = '25' AND sexo LIKE '%H%'";
    $totalesGradoEstudiosHombres20 = mysqli_query($con, $sql);
    //var_dump($totalesGradoEstudiosHombres20);
    $gradoEstudiosTotalesHombres20= mysqli_fetch_array($totalesGradoEstudiosHombres20);

    $sql="SELECT count(*) AS userPorGradoEstudios FROM Usuario WHERE gradoEstudios = '21' AND sexo LIKE '%H%'";
    $totalesGradoEstudiosHombres21 = mysqli_query($con, $sql);
    //var_dump($totalesGradoEstudiosHombres21);
    $gradoEstudiosTotalesHombres21= mysqli_fetch_array($totalesGradoEstudiosHombres21);

    $sql="SELECT count(*) AS userPorGradoEstudios FROM Usuario WHERE gradoEstudios = '17' AND sexo LIKE '%H%'";
    $totalesGradoEstudiosHombres22 = mysqli_query($con, $sql);
    //var_dump($totalesGradoEstudiosHombres22);
    $gradoEstudiosTotalesHombres22= mysqli_fetch_array($totalesGradoEstudiosHombres22);

    $sql="SELECT count(*) AS userPorGradoEstudios FROM Usuario WHERE gradoEstudios = '18' AND sexo LIKE '%H%'";
    $totalesGradoEstudiosHombres23 = mysqli_query($con, $sql);
    //var_dump($totalesGradoEstudiosHombres23);
    $gradoEstudiosTotalesHombres23= mysqli_fetch_array($totalesGradoEstudiosHombres23);

    $sql="SELECT count(*) AS userPorGradoEstudios FROM Usuario WHERE gradoEstudios = '19' AND sexo LIKE '%H%'";
    $totalesGradoEstudiosHombres24 = mysqli_query($con, $sql);
    //var_dump($totalesGradoEstudiosHombres24);
    $gradoEstudiosTotalesHombres24= mysqli_fetch_array($totalesGradoEstudiosHombres24);

    $sql="SELECT count(*) AS userPorGradoEstudios FROM Usuario WHERE gradoEstudios = '20' AND sexo LIKE '%H%'";
    $totalesGradoEstudiosHombres25 = mysqli_query($con, $sql);
    //var_dump($totalesGradoEstudiosHombres25);
    $gradoEstudiosTotalesHombres25= mysqli_fetch_array($totalesGradoEstudiosHombres25);

    $sql="SELECT count(*) AS userPorGradoEstudios FROM Usuario WHERE gradoEstudios = '26' AND sexo LIKE '%H%'";
    $totalesGradoEstudiosHombres26 = mysqli_query($con, $sql);
    //var_dump($totalesGradoEstudiosHombres26);
    $gradoEstudiosTotalesHombres26= mysqli_fetch_array($totalesGradoEstudiosHombres26);
/**
 * Usuarios totales por PILARES   select count(*) from Usuario U1, UsuariosPorPilar U2 where U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%m%' AND U2.Pilares_idPilares = '45';
 */
    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U2.Pilares_idPilares = '1'";
    $totalesPilares1 = mysqli_query($con, $sql);
    //var_dump($totalesPilares1);
    $pilaresTotales1= mysqli_fetch_array($totalesPilares1);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U2.Pilares_idPilares = '2'";
    $totalesPilares2 = mysqli_query($con, $sql);
    //var_dump($totalesPilares2);
    $pilaresTotales2= mysqli_fetch_array($totalesPilares2);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U2.Pilares_idPilares = '3'";
    $totalesPilares3 = mysqli_query($con, $sql);
    //var_dump($totalesPilares3);
    $pilaresTotales3= mysqli_fetch_array($totalesPilares3);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U2.Pilares_idPilares = '4'";
    $totalesPilares4 = mysqli_query($con, $sql);
    //var_dump($totalesPilares4);
    $pilaresTotales4= mysqli_fetch_array($totalesPilares4);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U2.Pilares_idPilares = '5'";
    $totalesPilares5 = mysqli_query($con, $sql);
    //var_dump($totalesPilares5);
    $pilaresTotales5= mysqli_fetch_array($totalesPilares5);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U2.Pilares_idPilares = '6'";
    $totalesPilares6 = mysqli_query($con, $sql);
    //var_dump($totalesPilares6);
    $pilaresTotales6= mysqli_fetch_array($totalesPilares6);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U2.Pilares_idPilares = '7'";
    $totalesPilares7 = mysqli_query($con, $sql);
    //var_dump($totalesPilares7);
    $pilaresTotales7= mysqli_fetch_array($totalesPilares7);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U2.Pilares_idPilares = '8'";
    $totalesPilares8 = mysqli_query($con, $sql);
    //var_dump($totalesPilares8);
    $pilaresTotales8= mysqli_fetch_array($totalesPilares8);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U2.Pilares_idPilares = '9'";
    $totalesPilares9 = mysqli_query($con, $sql);
    //var_dump($totalesPilares9);
    $pilaresTotales9= mysqli_fetch_array($totalesPilares9);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U2.Pilares_idPilares = '10'";
    $totalesPilares10 = mysqli_query($con, $sql);
    //var_dump($totalesPilares10);
    $pilaresTotales10= mysqli_fetch_array($totalesPilares10);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U2.Pilares_idPilares = '11'";
    $totalesPilares11 = mysqli_query($con, $sql);
    //var_dump($totalesPilares11);
    $pilaresTotales11= mysqli_fetch_array($totalesPilares11);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U2.Pilares_idPilares = '12'";
    $totalesPilares12 = mysqli_query($con, $sql);
    //var_dump($totalesPilares12);
    $pilaresTotales12= mysqli_fetch_array($totalesPilares12);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U2.Pilares_idPilares = '13'";
    $totalesPilares13 = mysqli_query($con, $sql);
    //var_dump($totalesPilares13);
    $pilaresTotales13= mysqli_fetch_array($totalesPilares13);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U2.Pilares_idPilares = '14'";
    $totalesPilares14 = mysqli_query($con, $sql);
    //var_dump($totalesPilares14);
    $pilaresTotales14= mysqli_fetch_array($totalesPilares14);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U2.Pilares_idPilares = '15'";
    $totalesPilares15 = mysqli_query($con, $sql);
    //var_dump($totalesPilares15);
    $pilaresTotales15= mysqli_fetch_array($totalesPilares15);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U2.Pilares_idPilares = '16'";
    $totalesPilares16 = mysqli_query($con, $sql);
    //var_dump($totalesPilares16);
    $pilaresTotales16= mysqli_fetch_array($totalesPilares16);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U2.Pilares_idPilares = '17'";
    $totalesPilares17 = mysqli_query($con, $sql);
    //var_dump($totalesPilares17);
    $pilaresTotales17= mysqli_fetch_array($totalesPilares17);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U2.Pilares_idPilares = '18'";
    $totalesPilares18 = mysqli_query($con, $sql);
    //var_dump($totalesPilares18);
    $pilaresTotales18= mysqli_fetch_array($totalesPilares18);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U2.Pilares_idPilares = '19'";
    $totalesPilares19 = mysqli_query($con, $sql);
    //var_dump($totalesPilares19);
    $pilaresTotales19= mysqli_fetch_array($totalesPilares19);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U2.Pilares_idPilares = '20'";
    $totalesPilares20 = mysqli_query($con, $sql);
    //var_dump($totalesPilares20);
    $pilaresTotales20= mysqli_fetch_array($totalesPilares20);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U2.Pilares_idPilares = '21'";
    $totalesPilares47 = mysqli_query($con, $sql);
    //var_dump($totalesPilares21);
    $pilaresTotales47= mysqli_fetch_array($totalesPilares47);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U2.Pilares_idPilares = '22'";
    $totalesPilares21 = mysqli_query($con, $sql);
    //var_dump($totalesPilares21);
    $pilaresTotales21= mysqli_fetch_array($totalesPilares21);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U2.Pilares_idPilares = '23'";
    $totalesPilares22 = mysqli_query($con, $sql);
    //var_dump($totalesPilares22);
    $pilaresTotales22= mysqli_fetch_array($totalesPilares22);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U2.Pilares_idPilares = '24'";
    $totalesPilares23 = mysqli_query($con, $sql);
    //var_dump($totalesPilares23);
    $pilaresTotales23= mysqli_fetch_array($totalesPilares23);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U2.Pilares_idPilares = '26'";
    $totalesPilares24 = mysqli_query($con, $sql);
    //var_dump($totalesPilares24);
    $pilaresTotales24= mysqli_fetch_array($totalesPilares24);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U2.Pilares_idPilares = '27'";
    $totalesPilares25 = mysqli_query($con, $sql);
    //var_dump($totalesPilares25);
    $pilaresTotales25= mysqli_fetch_array($totalesPilares25);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U2.Pilares_idPilares = '31'";
    $totalesPilares26 = mysqli_query($con, $sql);
    //var_dump($totalesPilares26);
    $pilaresTotales26= mysqli_fetch_array($totalesPilares26);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U2.Pilares_idPilares = '32'";
    $totalesPilares27 = mysqli_query($con, $sql);
    //var_dump($totalesPilares27);
    $pilaresTotales27= mysqli_fetch_array($totalesPilares27);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U2.Pilares_idPilares = '33'";
    $totalesPilares28 = mysqli_query($con, $sql);
    //var_dump($totalesPilares28);
    $pilaresTotales28= mysqli_fetch_array($totalesPilares28);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U2.Pilares_idPilares = '34'";
    $totalesPilares29 = mysqli_query($con, $sql);
    //var_dump($totalesPilares29);
    $pilaresTotales29= mysqli_fetch_array($totalesPilares29);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U2.Pilares_idPilares = '35'";
    $totalesPilares30 = mysqli_query($con, $sql);
    //var_dump($totalesPilares30);
    $pilaresTotales30= mysqli_fetch_array($totalesPilares30);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U2.Pilares_idPilares = '36'";
    $totalesPilares31 = mysqli_query($con, $sql);
    //var_dump($totalesPilares31);
    $pilaresTotales31= mysqli_fetch_array($totalesPilares31);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U2.Pilares_idPilares = '37'";
    $totalesPilares32 = mysqli_query($con, $sql);
    //var_dump($totalesPilares32);
    $pilaresTotales32= mysqli_fetch_array($totalesPilares32);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U2.Pilares_idPilares = '38'";
    $totalesPilares33 = mysqli_query($con, $sql);
    //var_dump($totalesPilares33);
    $pilaresTotales33= mysqli_fetch_array($totalesPilares33);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U2.Pilares_idPilares = '39'";
    $totalesPilares34 = mysqli_query($con, $sql);
    //var_dump($totalesPilares34);
    $pilaresTotales34= mysqli_fetch_array($totalesPilares34);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U2.Pilares_idPilares = '40'";
    $totalesPilares35 = mysqli_query($con, $sql);
    //var_dump($totalesPilares35);
    $pilaresTotales35= mysqli_fetch_array($totalesPilares35);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U2.Pilares_idPilares = '41'";
    $totalesPilares36 = mysqli_query($con, $sql);
    //var_dump($totalesPilares36);
    $pilaresTotales36= mysqli_fetch_array($totalesPilares36);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U2.Pilares_idPilares = '42'";
    $totalesPilares37 = mysqli_query($con, $sql);
    //var_dump($totalesPilares37);
    $pilaresTotales37= mysqli_fetch_array($totalesPilares37);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U2.Pilares_idPilares = '43'";
    $totalesPilares38 = mysqli_query($con, $sql);
    //var_dump($totalesPilares38);
    $pilaresTotales38= mysqli_fetch_array($totalesPilares38);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U2.Pilares_idPilares = '44'";
    $totalesPilares39 = mysqli_query($con, $sql);
    //var_dump($totalesPilares39);
    $pilaresTotales39= mysqli_fetch_array($totalesPilares39);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U2.Pilares_idPilares = '45'";
    $totalesPilares40 = mysqli_query($con, $sql);
    //var_dump($totalesPilares40);
    $pilaresTotales40= mysqli_fetch_array($totalesPilares40);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U2.Pilares_idPilares = '46'";
    $totalesPilares41 = mysqli_query($con, $sql);
    //var_dump($totalesPilares41);
    $pilaresTotales41= mysqli_fetch_array($totalesPilares41);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U2.Pilares_idPilares = '47'";
    $totalesPilares42 = mysqli_query($con, $sql);
    //var_dump($totalesPilares42);
    $pilaresTotales42= mysqli_fetch_array($totalesPilares42);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U2.Pilares_idPilares = '48'";
    $totalesPilares43 = mysqli_query($con, $sql);
    //var_dump($totalesPilares43);
    $pilaresTotales43= mysqli_fetch_array($totalesPilares43);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U2.Pilares_idPilares = '49'";
    $totalesPilares44 = mysqli_query($con, $sql);
    //var_dump($totalesPilares44);
    $pilaresTotales44= mysqli_fetch_array($totalesPilares44);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U2.Pilares_idPilares = '50'";
    $totalesPilares45 = mysqli_query($con, $sql);
    //var_dump($totalesPilares45);
    $pilaresTotales45= mysqli_fetch_array($totalesPilares45);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U2.Pilares_idPilares = '51'";
    $totalesPilares46 = mysqli_query($con, $sql);
    //var_dump($totalesPilares46);
    $pilaresTotales46= mysqli_fetch_array($totalesPilares46);
/**
 * Usuarios totales por PILARES Mujeres  select count(*) from Usuario U1, UsuariosPorPilar U2 where U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%m%' AND U2.Pilares_idPilares = '45';
 */
    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '1'";
    $totalesPilaresMujeres1 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresMujeres1);
    $pilaresTotalesMujeres1= mysqli_fetch_array($totalesPilaresMujeres1);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '2'";
    $totalesPilaresMujeres2 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresMujeres2);
    $pilaresTotalesMujeres2= mysqli_fetch_array($totalesPilaresMujeres2);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '3'";
    $totalesPilaresMujeres3 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresMujeres3);
    $pilaresTotalesMujeres3= mysqli_fetch_array($totalesPilaresMujeres3);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '4'";
    $totalesPilaresMujeres4 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresMujeres4);
    $pilaresTotalesMujeres4= mysqli_fetch_array($totalesPilaresMujeres4);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '5'";
    $totalesPilaresMujeres5 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresMujeres5);
    $pilaresTotalesMujeres5= mysqli_fetch_array($totalesPilaresMujeres5);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '6'";
    $totalesPilaresMujeres6 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresMujeres6);
    $pilaresTotalesMujeres6= mysqli_fetch_array($totalesPilaresMujeres6);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '7'";
    $totalesPilaresMujeres7 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresMujeres7);
    $pilaresTotalesMujeres7= mysqli_fetch_array($totalesPilaresMujeres7);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '8'";
    $totalesPilaresMujeres8 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresMujeres8);
    $pilaresTotalesMujeres8= mysqli_fetch_array($totalesPilaresMujeres8);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '9'";
    $totalesPilaresMujeres9 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresMujeres9);
    $pilaresTotalesMujeres9= mysqli_fetch_array($totalesPilaresMujeres9);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '10'";
    $totalesPilaresMujeres10 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresMujeres10);
    $pilaresTotalesMujeres10= mysqli_fetch_array($totalesPilaresMujeres10);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '11'";
    $totalesPilaresMujeres11 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresMujeres11);
    $pilaresTotalesMujeres11= mysqli_fetch_array($totalesPilaresMujeres11);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '12'";
    $totalesPilaresMujeres12 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresMujeres12);
    $pilaresTotalesMujeres12= mysqli_fetch_array($totalesPilaresMujeres12);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '13'";
    $totalesPilaresMujeres13 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresMujeres13);
    $pilaresTotalesMujeres13= mysqli_fetch_array($totalesPilaresMujeres13);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '14'";
    $totalesPilaresMujeres14 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresMujeres14);
    $pilaresTotalesMujeres14= mysqli_fetch_array($totalesPilaresMujeres14);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '15'";
    $totalesPilaresMujeres15 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresMujeres15);
    $pilaresTotalesMujeres15= mysqli_fetch_array($totalesPilaresMujeres15);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '16'";
    $totalesPilaresMujeres16 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresMujeres16);
    $pilaresTotalesMujeres16= mysqli_fetch_array($totalesPilaresMujeres16);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '17'";
    $totalesPilaresMujeres17 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresMujeres17);
    $pilaresTotalesMujeres17= mysqli_fetch_array($totalesPilaresMujeres17);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '18'";
    $totalesPilaresMujeres18 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresMujeres18);
    $pilaresTotalesMujeres18= mysqli_fetch_array($totalesPilaresMujeres18);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '19'";
    $totalesPilaresMujeres19 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresMujeres19);
    $pilaresTotalesMujeres19= mysqli_fetch_array($totalesPilaresMujeres19);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '20'";
    $totalesPilaresMujeres20 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresMujeres20);
    $pilaresTotalesMujeres20= mysqli_fetch_array($totalesPilaresMujeres20);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '21'";
    $totalesPilaresMujeres47 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresMujeres47);
    $pilaresTotalesMujeres47= mysqli_fetch_array($totalesPilaresMujeres47);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '22'";
    $totalesPilaresMujeres21 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresMujeres21);
    $pilaresTotalesMujeres21= mysqli_fetch_array($totalesPilaresMujeres21);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '23'";
    $totalesPilaresMujeres22 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresMujeres22);
    $pilaresTotalesMujeres22= mysqli_fetch_array($totalesPilaresMujeres22);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '24'";
    $totalesPilaresMujeres23 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresMujeres23);
    $pilaresTotalesMujeres23= mysqli_fetch_array($totalesPilaresMujeres23);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '26'";
    $totalesPilaresMujeres24 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresMujeres24);
    $pilaresTotalesMujeres24= mysqli_fetch_array($totalesPilaresMujeres24);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '27'";
    $totalesPilaresMujeres25 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresMujeres25);
    $pilaresTotalesMujeres25= mysqli_fetch_array($totalesPilaresMujeres25);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '31'";
    $totalesPilaresMujeres26 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresMujeres26);
    $pilaresTotalesMujeres26= mysqli_fetch_array($totalesPilaresMujeres26);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '32'";
    $totalesPilaresMujeres27 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresMujeres27);
    $pilaresTotalesMujeres27= mysqli_fetch_array($totalesPilaresMujeres27);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '33'";
    $totalesPilaresMujeres28 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresMujeres28);
    $pilaresTotalesMujeres28= mysqli_fetch_array($totalesPilaresMujeres28);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '34'";
    $totalesPilaresMujeres29 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresMujeres29);
    $pilaresTotalesMujeres29= mysqli_fetch_array($totalesPilaresMujeres29);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '35'";
    $totalesPilaresMujeres30 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresMujeres30);
    $pilaresTotalesMujeres30= mysqli_fetch_array($totalesPilaresMujeres30);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '36'";
    $totalesPilaresMujeres31 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresMujeres31);
    $pilaresTotalesMujeres31= mysqli_fetch_array($totalesPilaresMujeres31);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '37'";
    $totalesPilaresMujeres32 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresMujeres32);
    $pilaresTotalesMujeres32= mysqli_fetch_array($totalesPilaresMujeres32);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '38'";
    $totalesPilaresMujeres33 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresMujeres33);
    $pilaresTotalesMujeres33= mysqli_fetch_array($totalesPilaresMujeres33);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '39'";
    $totalesPilaresMujeres34 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresMujeres34);
    $pilaresTotalesMujeres34= mysqli_fetch_array($totalesPilaresMujeres34);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '40'";
    $totalesPilaresMujeres35 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresMujeres35);
    $pilaresTotalesMujeres35= mysqli_fetch_array($totalesPilaresMujeres35);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '41'";
    $totalesPilaresMujeres36 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresMujeres36);
    $pilaresTotalesMujeres36= mysqli_fetch_array($totalesPilaresMujeres36);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '42'";
    $totalesPilaresMujeres37 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresMujeres37);
    $pilaresTotalesMujeres37= mysqli_fetch_array($totalesPilaresMujeres37);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '43'";
    $totalesPilaresMujeres38 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresMujeres38);
    $pilaresTotalesMujeres38= mysqli_fetch_array($totalesPilaresMujeres38);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '44'";
    $totalesPilaresMujeres39 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresMujeres39);
    $pilaresTotalesMujeres39= mysqli_fetch_array($totalesPilaresMujeres39);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '45'";
    $totalesPilaresMujeres40 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresMujeres40);
    $pilaresTotalesMujeres40= mysqli_fetch_array($totalesPilaresMujeres40);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '46'";
    $totalesPilaresMujeres41 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresMujeres41);
    $pilaresTotalesMujeres41= mysqli_fetch_array($totalesPilaresMujeres41);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '47'";
    $totalesPilaresMujeres42 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresMujeres42);
    $pilaresTotalesMujeres42= mysqli_fetch_array($totalesPilaresMujeres42);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '48'";
    $totalesPilaresMujeres43 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresMujeres43);
    $pilaresTotalesMujeres43= mysqli_fetch_array($totalesPilaresMujeres43);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '49'";
    $totalesPilaresMujeres44 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresMujeres44);
    $pilaresTotalesMujeres44= mysqli_fetch_array($totalesPilaresMujeres44);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '50'";
    $totalesPilaresMujeres45 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresMujeres45);
    $pilaresTotalesMujeres45= mysqli_fetch_array($totalesPilaresMujeres45);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '51'";
    $totalesPilaresMujeres46 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresMujeres46);
    $pilaresTotalesMujeres46= mysqli_fetch_array($totalesPilaresMujeres46); 
 /**
 * Usuarios totales por PILARES Hombres  select count(*) from Usuario U1, UsuariosPorPilar U2 where U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%m%' AND U2.Pilares_idPilares = '45';
 */
    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '1'";
    $totalesPilaresHombres1 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresHombres1);
    $pilaresTotalesHombres1= mysqli_fetch_array($totalesPilaresHombres1);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '2'";
    $totalesPilaresHombres2 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresHombres2);
    $pilaresTotalesHombres2= mysqli_fetch_array($totalesPilaresHombres2);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '3'";
    $totalesPilaresHombres3 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresHombres3);
    $pilaresTotalesHombres3= mysqli_fetch_array($totalesPilaresHombres3);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '4'";
    $totalesPilaresHombres4 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresHombres4);
    $pilaresTotalesHombres4= mysqli_fetch_array($totalesPilaresHombres4);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '5'";
    $totalesPilaresHombres5 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresHombres5);
    $pilaresTotalesHombres5= mysqli_fetch_array($totalesPilaresHombres5);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '6'";
    $totalesPilaresHombres6 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresHombres6);
    $pilaresTotalesHombres6= mysqli_fetch_array($totalesPilaresHombres6);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '7'";
    $totalesPilaresHombres7 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresHombres7);
    $pilaresTotalesHombres7= mysqli_fetch_array($totalesPilaresHombres7);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '8'";
    $totalesPilaresHombres8 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresHombres8);
    $pilaresTotalesHombres8= mysqli_fetch_array($totalesPilaresHombres8);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '9'";
    $totalesPilaresHombres9 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresHombres9);
    $pilaresTotalesHombres9= mysqli_fetch_array($totalesPilaresHombres9);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '10'";
    $totalesPilaresHombres10 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresHombres10);
    $pilaresTotalesHombres10= mysqli_fetch_array($totalesPilaresHombres10);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '11'";
    $totalesPilaresHombres11 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresHombres11);
    $pilaresTotalesHombres11= mysqli_fetch_array($totalesPilaresHombres11);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '12'";
    $totalesPilaresHombres12 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresHombres12);
    $pilaresTotalesHombres12= mysqli_fetch_array($totalesPilaresHombres12);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '13'";
    $totalesPilaresHombres13 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresHombres13);
    $pilaresTotalesHombres13= mysqli_fetch_array($totalesPilaresHombres13);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '14'";
    $totalesPilaresHombres14 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresHombres14);
    $pilaresTotalesHombres14= mysqli_fetch_array($totalesPilaresHombres14);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '15'";
    $totalesPilaresHombres15 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresHombres15);
    $pilaresTotalesHombres15= mysqli_fetch_array($totalesPilaresHombres15);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '16'";
    $totalesPilaresHombres16 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresHombres16);
    $pilaresTotalesHombres16= mysqli_fetch_array($totalesPilaresHombres16);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '17'";
    $totalesPilaresHombres17 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresHombres17);
    $pilaresTotalesHombres17= mysqli_fetch_array($totalesPilaresHombres17);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '18'";
    $totalesPilaresHombres18 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresHombres18);
    $pilaresTotalesHombres18= mysqli_fetch_array($totalesPilaresHombres18);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '19'";
    $totalesPilaresHombres19 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresHombres19);
    $pilaresTotalesHombres19= mysqli_fetch_array($totalesPilaresHombres19);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '20'";
    $totalesPilaresHombres20 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresHombres20);
    $pilaresTotalesHombres20= mysqli_fetch_array($totalesPilaresHombres20);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '21'";
    $totalesPilaresHombres47 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresHombres47);
    $pilaresTotalesHombres47= mysqli_fetch_array($totalesPilaresHombres47);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '22'";
    $totalesPilaresHombres21 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresHombres21);
    $pilaresTotalesHombres21= mysqli_fetch_array($totalesPilaresHombres21);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '23'";
    $totalesPilaresHombres22 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresHombres22);
    $pilaresTotalesHombres22= mysqli_fetch_array($totalesPilaresHombres22);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '24'";
    $totalesPilaresHombres23 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresHombres23);
    $pilaresTotalesHombres23= mysqli_fetch_array($totalesPilaresHombres23);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '26'";
    $totalesPilaresHombres24 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresHombres24);
    $pilaresTotalesHombres24= mysqli_fetch_array($totalesPilaresHombres24);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '27'";
    $totalesPilaresHombres25 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresHombres25);
    $pilaresTotalesHombres25= mysqli_fetch_array($totalesPilaresHombres25);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '31'";
    $totalesPilaresHombres26 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresHombres26);
    $pilaresTotalesHombres26= mysqli_fetch_array($totalesPilaresHombres26);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '32'";
    $totalesPilaresHombres27 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresHombres27);
    $pilaresTotalesHombres27= mysqli_fetch_array($totalesPilaresHombres27);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '33'";
    $totalesPilaresHombres28 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresHombres28);
    $pilaresTotalesHombres28= mysqli_fetch_array($totalesPilaresHombres28);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '34'";
    $totalesPilaresHombres29 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresHombres29);
    $pilaresTotalesHombres29= mysqli_fetch_array($totalesPilaresHombres29);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '35'";
    $totalesPilaresHombres30 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresHombres30);
    $pilaresTotalesHombres30= mysqli_fetch_array($totalesPilaresHombres30);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '36'";
    $totalesPilaresHombres31 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresHombres31);
    $pilaresTotalesHombres31= mysqli_fetch_array($totalesPilaresHombres31);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '37'";
    $totalesPilaresHombres32 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresHombres32);
    $pilaresTotalesHombres32= mysqli_fetch_array($totalesPilaresHombres32);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '38'";
    $totalesPilaresHombres33 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresHombres33);
    $pilaresTotalesHombres33= mysqli_fetch_array($totalesPilaresHombres33);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '39'";
    $totalesPilaresHombres34 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresHombres34);
    $pilaresTotalesHombres34= mysqli_fetch_array($totalesPilaresHombres34);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '40'";
    $totalesPilaresHombres35 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresHombres35);
    $pilaresTotalesHombres35= mysqli_fetch_array($totalesPilaresHombres35);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '41'";
    $totalesPilaresHombres36 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresHombres36);
    $pilaresTotalesHombres36= mysqli_fetch_array($totalesPilaresHombres36);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '42'";
    $totalesPilaresHombres37 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresHombres37);
    $pilaresTotalesHombres37= mysqli_fetch_array($totalesPilaresHombres37);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '43'";
    $totalesPilaresHombres38 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresHombres38);
    $pilaresTotalesHombres38= mysqli_fetch_array($totalesPilaresHombres38);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '44'";
    $totalesPilaresHombres39 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresHombres39);
    $pilaresTotalesHombres39= mysqli_fetch_array($totalesPilaresHombres39);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '45'";
    $totalesPilaresHombres40 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresHombres40);
    $pilaresTotalesHombres40= mysqli_fetch_array($totalesPilaresHombres40);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '46'";
    $totalesPilaresHombres41 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresHombres41);
    $pilaresTotalesHombres41= mysqli_fetch_array($totalesPilaresHombres41);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '47'";
    $totalesPilaresHombres42 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresHombres42);
    $pilaresTotalesHombres42= mysqli_fetch_array($totalesPilaresHombres42);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '48'";
    $totalesPilaresHombres43 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresHombres43);
    $pilaresTotalesHombres43= mysqli_fetch_array($totalesPilaresHombres43);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '49'";
    $totalesPilaresHombres44 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresHombres44);
    $pilaresTotalesHombres44= mysqli_fetch_array($totalesPilaresHombres44);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '50'";
    $totalesPilaresHombres45 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresHombres45);
    $pilaresTotalesHombres45= mysqli_fetch_array($totalesPilaresHombres45);

    $sql="SELECT count(*) AS userPorPilares FROM Usuario U1, UsuariosPorPilar U2 WHERE U1.idusuarios = U2.Usuario_idusuarios AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '51'";
    $totalesPilaresHombres46 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresHombres46);
    $pilaresTotalesHombres46= mysqli_fetch_array($totalesPilaresHombres46);   
  /**
 * Usuarios totales por PILARES Autnomia Economica   select count(DISTINCT U1.idUsuarios) from Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 where U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U2.Pilares_idPilares = '1';
 */
    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U2.Pilares_idPilares = '1'";
    $totalesPilaresAutnomia1 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomia1);
    $pilaresTotalesAutnomia1= mysqli_fetch_array($totalesPilaresAutnomia1);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U2.Pilares_idPilares = '2'";
    $totalesPilaresAutnomia2 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomia2);
    $pilaresTotalesAutnomia2= mysqli_fetch_array($totalesPilaresAutnomia2);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U2.Pilares_idPilares = '3'";
    $totalesPilaresAutnomia3 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomia3);
    $pilaresTotalesAutnomia3= mysqli_fetch_array($totalesPilaresAutnomia3);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U2.Pilares_idPilares = '4'";
    $totalesPilaresAutnomia4 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomia4);
    $pilaresTotalesAutnomia4= mysqli_fetch_array($totalesPilaresAutnomia4);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U2.Pilares_idPilares = '5'";
    $totalesPilaresAutnomia5 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomia5);
    $pilaresTotalesAutnomia5= mysqli_fetch_array($totalesPilaresAutnomia5);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U2.Pilares_idPilares = '6'";
    $totalesPilaresAutnomia6 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomia6);
    $pilaresTotalesAutnomia6= mysqli_fetch_array($totalesPilaresAutnomia6);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U2.Pilares_idPilares = '7'";
    $totalesPilaresAutnomia7 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomia7);
    $pilaresTotalesAutnomia7= mysqli_fetch_array($totalesPilaresAutnomia7);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U2.Pilares_idPilares = '8'";
    $totalesPilaresAutnomia8 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomia8);
    $pilaresTotalesAutnomia8= mysqli_fetch_array($totalesPilaresAutnomia8);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U2.Pilares_idPilares = '9'";
    $totalesPilaresAutnomia9 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomia9);
    $pilaresTotalesAutnomia9= mysqli_fetch_array($totalesPilaresAutnomia9);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U2.Pilares_idPilares = '10'";
    $totalesPilaresAutnomia10 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomia10);
    $pilaresTotalesAutnomia10= mysqli_fetch_array($totalesPilaresAutnomia10);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U2.Pilares_idPilares = '11'";
    $totalesPilaresAutnomia11 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomia11);
    $pilaresTotalesAutnomia11= mysqli_fetch_array($totalesPilaresAutnomia11);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U2.Pilares_idPilares = '12'";
    $totalesPilaresAutnomia12 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomia12);
    $pilaresTotalesAutnomia12= mysqli_fetch_array($totalesPilaresAutnomia12);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U2.Pilares_idPilares = '13'";
    $totalesPilaresAutnomia13 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomia13);
    $pilaresTotalesAutnomia13= mysqli_fetch_array($totalesPilaresAutnomia13);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U2.Pilares_idPilares = '14'";
    $totalesPilaresAutnomia14 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomia14);
    $pilaresTotalesAutnomia14= mysqli_fetch_array($totalesPilaresAutnomia14);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U2.Pilares_idPilares = '15'";
    $totalesPilaresAutnomia15 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomia15);
    $pilaresTotalesAutnomia15= mysqli_fetch_array($totalesPilaresAutnomia15);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U2.Pilares_idPilares = '16'";
    $totalesPilaresAutnomia16 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomia16);
    $pilaresTotalesAutnomia16= mysqli_fetch_array($totalesPilaresAutnomia16);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U2.Pilares_idPilares = '17'";
    $totalesPilaresAutnomia17 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomia17);
    $pilaresTotalesAutnomia17= mysqli_fetch_array($totalesPilaresAutnomia17);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U2.Pilares_idPilares = '18'";
    $totalesPilaresAutnomia18 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomia18);
    $pilaresTotalesAutnomia18= mysqli_fetch_array($totalesPilaresAutnomia18);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U2.Pilares_idPilares = '19'";
    $totalesPilaresAutnomia19 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomia19);
    $pilaresTotalesAutnomia19= mysqli_fetch_array($totalesPilaresAutnomia19);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U2.Pilares_idPilares = '20'";
    $totalesPilaresAutnomia20 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomia20);
    $pilaresTotalesAutnomia20= mysqli_fetch_array($totalesPilaresAutnomia20);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U2.Pilares_idPilares = '21'";
    $totalesPilaresAutnomia47 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomia47);
    $pilaresTotalesAutnomia47= mysqli_fetch_array($totalesPilaresAutnomia47);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U2.Pilares_idPilares = '22'";
    $totalesPilaresAutnomia21 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomia21);
    $pilaresTotalesAutnomia21= mysqli_fetch_array($totalesPilaresAutnomia21);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U2.Pilares_idPilares = '23'";
    $totalesPilaresAutnomia22 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomia22);
    $pilaresTotalesAutnomia22= mysqli_fetch_array($totalesPilaresAutnomia22);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U2.Pilares_idPilares = '24'";
    $totalesPilaresAutnomia23 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomia23);
    $pilaresTotalesAutnomia23= mysqli_fetch_array($totalesPilaresAutnomia23);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U2.Pilares_idPilares = '26'";
    $totalesPilaresAutnomia24 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomia24);
    $pilaresTotalesAutnomia24= mysqli_fetch_array($totalesPilaresAutnomia24);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U2.Pilares_idPilares = '27'";
    $totalesPilaresAutnomia25 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomia25);
    $pilaresTotalesAutnomia25= mysqli_fetch_array($totalesPilaresAutnomia25);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U2.Pilares_idPilares = '31'";
    $totalesPilaresAutnomia26 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomia26);
    $pilaresTotalesAutnomia26= mysqli_fetch_array($totalesPilaresAutnomia26);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U2.Pilares_idPilares = '32'";
    $totalesPilaresAutnomia27 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomia27);
    $pilaresTotalesAutnomia27= mysqli_fetch_array($totalesPilaresAutnomia27);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U2.Pilares_idPilares = '33'";
    $totalesPilaresAutnomia28 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomia28);
    $pilaresTotalesAutnomia28= mysqli_fetch_array($totalesPilaresAutnomia28);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U2.Pilares_idPilares = '34'";
    $totalesPilaresAutnomia29 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomia29);
    $pilaresTotalesAutnomia29= mysqli_fetch_array($totalesPilaresAutnomia29);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U2.Pilares_idPilares = '35'";
    $totalesPilaresAutnomia30 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomia30);
    $pilaresTotalesAutnomia30= mysqli_fetch_array($totalesPilaresAutnomia30);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U2.Pilares_idPilares = '36'";
    $totalesPilaresAutnomia31 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomia31);
    $pilaresTotalesAutnomia31= mysqli_fetch_array($totalesPilaresAutnomia31);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U2.Pilares_idPilares = '37'";
    $totalesPilaresAutnomia32 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomia32);
    $pilaresTotalesAutnomia32= mysqli_fetch_array($totalesPilaresAutnomia32);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U2.Pilares_idPilares = '38'";
    $totalesPilaresAutnomia33 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomia33);
    $pilaresTotalesAutnomia33= mysqli_fetch_array($totalesPilaresAutnomia33);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U2.Pilares_idPilares = '39'";
    $totalesPilaresAutnomia34 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomia34);
    $pilaresTotalesAutnomia34= mysqli_fetch_array($totalesPilaresAutnomia34);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U2.Pilares_idPilares = '40'";
    $totalesPilaresAutnomia35 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomia35);
    $pilaresTotalesAutnomia35= mysqli_fetch_array($totalesPilaresAutnomia35);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U2.Pilares_idPilares = '41'";
    $totalesPilaresAutnomia36 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomia36);
    $pilaresTotalesAutnomia36= mysqli_fetch_array($totalesPilaresAutnomia36);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U2.Pilares_idPilares = '42'";
    $totalesPilaresAutnomia37 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomia37);
    $pilaresTotalesAutnomia37= mysqli_fetch_array($totalesPilaresAutnomia37);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U2.Pilares_idPilares = '43'";
    $totalesPilaresAutnomia38 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomia38);
    $pilaresTotalesAutnomia38= mysqli_fetch_array($totalesPilaresAutnomia38);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U2.Pilares_idPilares = '44'";
    $totalesPilaresAutnomia39 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomia39);
    $pilaresTotalesAutnomia39= mysqli_fetch_array($totalesPilaresAutnomia39);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U2.Pilares_idPilares = '45'";
    $totalesPilaresAutnomia40 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomia40);
    $pilaresTotalesAutnomia40= mysqli_fetch_array($totalesPilaresAutnomia40);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U2.Pilares_idPilares = '46'";
    $totalesPilaresAutnomia41 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomia41);
    $pilaresTotalesAutnomia41= mysqli_fetch_array($totalesPilaresAutnomia41);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U2.Pilares_idPilares = '47'";
    $totalesPilaresAutnomia42 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomia42);
    $pilaresTotalesAutnomia42= mysqli_fetch_array($totalesPilaresAutnomia42);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U2.Pilares_idPilares = '48'";
    $totalesPilaresAutnomia43 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomia43);
    $pilaresTotalesAutnomia43= mysqli_fetch_array($totalesPilaresAutnomia43);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U2.Pilares_idPilares = '49'";
    $totalesPilaresAutnomia44 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomia44);
    $pilaresTotalesAutnomia44= mysqli_fetch_array($totalesPilaresAutnomia44);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U2.Pilares_idPilares = '50'";
    $totalesPilaresAutnomia45 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomia45);
    $pilaresTotalesAutnomia45= mysqli_fetch_array($totalesPilaresAutnomia45);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U2.Pilares_idPilares = '51'";
    $totalesPilaresAutnomia46 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomia46);
    $pilaresTotalesAutnomia46= mysqli_fetch_array($totalesPilaresAutnomia46);  
 /**
 * Usuarios totales por PILARES Autnomia Economica Mujeres  select count(DISTINCT U1.idUsuarios) from Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 where U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U2.Pilares_idPilares = '1';
 */
    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '1'";
    $totalesPilaresAutnomiaMujeres1 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaMujeres1);
    $pilaresTotalesAutnomiaMujeres1= mysqli_fetch_array($totalesPilaresAutnomiaMujeres1);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '2'";
    $totalesPilaresAutnomiaMujeres2 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaMujeres2);
    $pilaresTotalesAutnomiaMujeres2= mysqli_fetch_array($totalesPilaresAutnomiaMujeres2);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '3'";
    $totalesPilaresAutnomiaMujeres3 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaMujeres3);
    $pilaresTotalesAutnomiaMujeres3= mysqli_fetch_array($totalesPilaresAutnomiaMujeres3);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '4'";
    $totalesPilaresAutnomiaMujeres4 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaMujeres4);
    $pilaresTotalesAutnomiaMujeres4= mysqli_fetch_array($totalesPilaresAutnomiaMujeres4);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '5'";
    $totalesPilaresAutnomiaMujeres5 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaMujeres5);
    $pilaresTotalesAutnomiaMujeres5= mysqli_fetch_array($totalesPilaresAutnomiaMujeres5);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '6'";
    $totalesPilaresAutnomiaMujeres6 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaMujeres6);
    $pilaresTotalesAutnomiaMujeres6= mysqli_fetch_array($totalesPilaresAutnomiaMujeres6);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '7'";
    $totalesPilaresAutnomiaMujeres7 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaMujeres7);
    $pilaresTotalesAutnomiaMujeres7= mysqli_fetch_array($totalesPilaresAutnomiaMujeres7);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '8'";
    $totalesPilaresAutnomiaMujeres8 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaMujeres8);
    $pilaresTotalesAutnomiaMujeres8= mysqli_fetch_array($totalesPilaresAutnomiaMujeres8);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '9'";
    $totalesPilaresAutnomiaMujeres9 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaMujeres9);
    $pilaresTotalesAutnomiaMujeres9= mysqli_fetch_array($totalesPilaresAutnomiaMujeres9);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '10'";
    $totalesPilaresAutnomiaMujeres10 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaMujeres10);
    $pilaresTotalesAutnomiaMujeres10= mysqli_fetch_array($totalesPilaresAutnomiaMujeres10);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '11'";
    $totalesPilaresAutnomiaMujeres11 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaMujeres11);
    $pilaresTotalesAutnomiaMujeres11= mysqli_fetch_array($totalesPilaresAutnomiaMujeres11);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '12'";
    $totalesPilaresAutnomiaMujeres12 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaMujeres12);
    $pilaresTotalesAutnomiaMujeres12= mysqli_fetch_array($totalesPilaresAutnomiaMujeres12);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '13'";
    $totalesPilaresAutnomiaMujeres13 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaMujeres13);
    $pilaresTotalesAutnomiaMujeres13= mysqli_fetch_array($totalesPilaresAutnomiaMujeres13);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '14'";
    $totalesPilaresAutnomiaMujeres14 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaMujeres14);
    $pilaresTotalesAutnomiaMujeres14= mysqli_fetch_array($totalesPilaresAutnomiaMujeres14);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '15'";
    $totalesPilaresAutnomiaMujeres15 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaMujeres15);
    $pilaresTotalesAutnomiaMujeres15= mysqli_fetch_array($totalesPilaresAutnomiaMujeres15);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '16'";
    $totalesPilaresAutnomiaMujeres16 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaMujeres16);
    $pilaresTotalesAutnomiaMujeres16= mysqli_fetch_array($totalesPilaresAutnomiaMujeres16);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '17'";
    $totalesPilaresAutnomiaMujeres17 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaMujeres17);
    $pilaresTotalesAutnomiaMujeres17= mysqli_fetch_array($totalesPilaresAutnomiaMujeres17);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '18'";
    $totalesPilaresAutnomiaMujeres18 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaMujeres18);
    $pilaresTotalesAutnomiaMujeres18= mysqli_fetch_array($totalesPilaresAutnomiaMujeres18);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '19'";
    $totalesPilaresAutnomiaMujeres19 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaMujeres19);
    $pilaresTotalesAutnomiaMujeres19= mysqli_fetch_array($totalesPilaresAutnomiaMujeres19);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '20'";
    $totalesPilaresAutnomiaMujeres20 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaMujeres20);
    $pilaresTotalesAutnomiaMujeres20= mysqli_fetch_array($totalesPilaresAutnomiaMujeres20);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '21'";
    $totalesPilaresAutnomiaMujeres47 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaMujeres47);
    $pilaresTotalesAutnomiaMujeres47= mysqli_fetch_array($totalesPilaresAutnomiaMujeres47);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '22'";
    $totalesPilaresAutnomiaMujeres21 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaMujeres21);
    $pilaresTotalesAutnomiaMujeres21= mysqli_fetch_array($totalesPilaresAutnomiaMujeres21);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '23'";
    $totalesPilaresAutnomiaMujeres22 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaMujeres22);
    $pilaresTotalesAutnomiaMujeres22= mysqli_fetch_array($totalesPilaresAutnomiaMujeres22);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '24'";
    $totalesPilaresAutnomiaMujeres23 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaMujeres23);
    $pilaresTotalesAutnomiaMujeres23= mysqli_fetch_array($totalesPilaresAutnomiaMujeres23);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '26'";
    $totalesPilaresAutnomiaMujeres24 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaMujeres24);
    $pilaresTotalesAutnomiaMujeres24= mysqli_fetch_array($totalesPilaresAutnomiaMujeres24);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '27'";
    $totalesPilaresAutnomiaMujeres25 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaMujeres25);
    $pilaresTotalesAutnomiaMujeres25= mysqli_fetch_array($totalesPilaresAutnomiaMujeres25);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '31'";
    $totalesPilaresAutnomiaMujeres26 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaMujeres26);
    $pilaresTotalesAutnomiaMujeres26= mysqli_fetch_array($totalesPilaresAutnomiaMujeres26);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '32'";
    $totalesPilaresAutnomiaMujeres27 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaMujeres27);
    $pilaresTotalesAutnomiaMujeres27= mysqli_fetch_array($totalesPilaresAutnomiaMujeres27);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '33'";
    $totalesPilaresAutnomiaMujeres28 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaMujeres28);
    $pilaresTotalesAutnomiaMujeres28= mysqli_fetch_array($totalesPilaresAutnomiaMujeres28);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '34'";
    $totalesPilaresAutnomiaMujeres29 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaMujeres29);
    $pilaresTotalesAutnomiaMujeres29= mysqli_fetch_array($totalesPilaresAutnomiaMujeres29);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '35'";
    $totalesPilaresAutnomiaMujeres30 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaMujeres30);
    $pilaresTotalesAutnomiaMujeres30= mysqli_fetch_array($totalesPilaresAutnomiaMujeres30);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '36'";
    $totalesPilaresAutnomiaMujeres31 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaMujeres31);
    $pilaresTotalesAutnomiaMujeres31= mysqli_fetch_array($totalesPilaresAutnomiaMujeres31);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '37'";
    $totalesPilaresAutnomiaMujeres32 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaMujeres32);
    $pilaresTotalesAutnomiaMujeres32= mysqli_fetch_array($totalesPilaresAutnomiaMujeres32);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '38'";
    $totalesPilaresAutnomiaMujeres33 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaMujeres33);
    $pilaresTotalesAutnomiaMujeres33= mysqli_fetch_array($totalesPilaresAutnomiaMujeres33);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '39'";
    $totalesPilaresAutnomiaMujeres34 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaMujeres34);
    $pilaresTotalesAutnomiaMujeres34= mysqli_fetch_array($totalesPilaresAutnomiaMujeres34);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '40'";
    $totalesPilaresAutnomiaMujeres35 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaMujeres35);
    $pilaresTotalesAutnomiaMujeres35= mysqli_fetch_array($totalesPilaresAutnomiaMujeres35);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '41'";
    $totalesPilaresAutnomiaMujeres36 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaMujeres36);
    $pilaresTotalesAutnomiaMujeres36= mysqli_fetch_array($totalesPilaresAutnomiaMujeres36);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '42'";
    $totalesPilaresAutnomiaMujeres37 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaMujeres37);
    $pilaresTotalesAutnomiaMujeres37= mysqli_fetch_array($totalesPilaresAutnomiaMujeres37);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '43'";
    $totalesPilaresAutnomiaMujeres38 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaMujeres38);
    $pilaresTotalesAutnomiaMujeres38= mysqli_fetch_array($totalesPilaresAutnomiaMujeres38);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '44'";
    $totalesPilaresAutnomiaMujeres39 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaMujeres39);
    $pilaresTotalesAutnomiaMujeres39= mysqli_fetch_array($totalesPilaresAutnomiaMujeres39);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '45'";
    $totalesPilaresAutnomiaMujeres40 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaMujeres40);
    $pilaresTotalesAutnomiaMujeres40= mysqli_fetch_array($totalesPilaresAutnomiaMujeres40);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '46'";
    $totalesPilaresAutnomiaMujeres41 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaMujeres41);
    $pilaresTotalesAutnomiaMujeres41= mysqli_fetch_array($totalesPilaresAutnomiaMujeres41);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '47'";
    $totalesPilaresAutnomiaMujeres42 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaMujeres42);
    $pilaresTotalesAutnomiaMujeres42= mysqli_fetch_array($totalesPilaresAutnomiaMujeres42);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '48'";
    $totalesPilaresAutnomiaMujeres43 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaMujeres43);
    $pilaresTotalesAutnomiaMujeres43= mysqli_fetch_array($totalesPilaresAutnomiaMujeres43);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '49'";
    $totalesPilaresAutnomiaMujeres44 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaMujeres44);
    $pilaresTotalesAutnomiaMujeres44= mysqli_fetch_array($totalesPilaresAutnomiaMujeres44);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '50'";
    $totalesPilaresAutnomiaMujeres45 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaMujeres45);
    $pilaresTotalesAutnomiaMujeres45= mysqli_fetch_array($totalesPilaresAutnomiaMujeres45);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '51'";
    $totalesPilaresAutnomiaMujeres46 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaMujeres46);
    $pilaresTotalesAutnomiaMujeres46= mysqli_fetch_array($totalesPilaresAutnomiaMujeres46);  
/**
 * Usuarios totales por PILARES Autnomia Economica Hombres  select count(DISTINCT U1.idUsuarios) from Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 where U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U2.Pilares_idPilares = '1';
 */
    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '1'";
    $totalesPilaresAutnomiaHombres1 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaHombres1);
    $pilaresTotalesAutnomiaHombres1= mysqli_fetch_array($totalesPilaresAutnomiaHombres1);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '2'";
    $totalesPilaresAutnomiaHombres2 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaHombres2);
    $pilaresTotalesAutnomiaHombres2= mysqli_fetch_array($totalesPilaresAutnomiaHombres2);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '3'";
    $totalesPilaresAutnomiaHombres3 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaHombres3);
    $pilaresTotalesAutnomiaHombres3= mysqli_fetch_array($totalesPilaresAutnomiaHombres3);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '4'";
    $totalesPilaresAutnomiaHombres4 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaHombres4);
    $pilaresTotalesAutnomiaHombres4= mysqli_fetch_array($totalesPilaresAutnomiaHombres4);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '5'";
    $totalesPilaresAutnomiaHombres5 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaHombres5);
    $pilaresTotalesAutnomiaHombres5= mysqli_fetch_array($totalesPilaresAutnomiaHombres5);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '6'";
    $totalesPilaresAutnomiaHombres6 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaHombres6);
    $pilaresTotalesAutnomiaHombres6= mysqli_fetch_array($totalesPilaresAutnomiaHombres6);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '7'";
    $totalesPilaresAutnomiaHombres7 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaHombres7);
    $pilaresTotalesAutnomiaHombres7= mysqli_fetch_array($totalesPilaresAutnomiaHombres7);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '8'";
    $totalesPilaresAutnomiaHombres8 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaHombres8);
    $pilaresTotalesAutnomiaHombres8= mysqli_fetch_array($totalesPilaresAutnomiaHombres8);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '9'";
    $totalesPilaresAutnomiaHombres9 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaHombres9);
    $pilaresTotalesAutnomiaHombres9= mysqli_fetch_array($totalesPilaresAutnomiaHombres9);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '10'";
    $totalesPilaresAutnomiaHombres10 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaHombres10);
    $pilaresTotalesAutnomiaHombres10= mysqli_fetch_array($totalesPilaresAutnomiaHombres10);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '11'";
    $totalesPilaresAutnomiaHombres11 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaHombres11);
    $pilaresTotalesAutnomiaHombres11= mysqli_fetch_array($totalesPilaresAutnomiaHombres11);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '12'";
    $totalesPilaresAutnomiaHombres12 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaHombres12);
    $pilaresTotalesAutnomiaHombres12= mysqli_fetch_array($totalesPilaresAutnomiaHombres12);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '13'";
    $totalesPilaresAutnomiaHombres13 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaHombres13);
    $pilaresTotalesAutnomiaHombres13= mysqli_fetch_array($totalesPilaresAutnomiaHombres13);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '14'";
    $totalesPilaresAutnomiaHombres14 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaHombres14);
    $pilaresTotalesAutnomiaHombres14= mysqli_fetch_array($totalesPilaresAutnomiaHombres14);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '15'";
    $totalesPilaresAutnomiaHombres15 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaHombres15);
    $pilaresTotalesAutnomiaHombres15= mysqli_fetch_array($totalesPilaresAutnomiaHombres15);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '16'";
    $totalesPilaresAutnomiaHombres16 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaHombres16);
    $pilaresTotalesAutnomiaHombres16= mysqli_fetch_array($totalesPilaresAutnomiaHombres16);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '17'";
    $totalesPilaresAutnomiaHombres17 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaHombres17);
    $pilaresTotalesAutnomiaHombres17= mysqli_fetch_array($totalesPilaresAutnomiaHombres17);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '18'";
    $totalesPilaresAutnomiaHombres18 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaHombres18);
    $pilaresTotalesAutnomiaHombres18= mysqli_fetch_array($totalesPilaresAutnomiaHombres18);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '19'";
    $totalesPilaresAutnomiaHombres19 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaHombres19);
    $pilaresTotalesAutnomiaHombres19= mysqli_fetch_array($totalesPilaresAutnomiaHombres19);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '20'";
    $totalesPilaresAutnomiaHombres20 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaHombres20);
    $pilaresTotalesAutnomiaHombres20= mysqli_fetch_array($totalesPilaresAutnomiaHombres20);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '21'";
    $totalesPilaresAutnomiaHombres47 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaHombres47);
    $pilaresTotalesAutnomiaHombres47= mysqli_fetch_array($totalesPilaresAutnomiaHombres47);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '22'";
    $totalesPilaresAutnomiaHombres21 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaHombres21);
    $pilaresTotalesAutnomiaHombres21= mysqli_fetch_array($totalesPilaresAutnomiaHombres21);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '23'";
    $totalesPilaresAutnomiaHombres22 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaHombres22);
    $pilaresTotalesAutnomiaHombres22= mysqli_fetch_array($totalesPilaresAutnomiaHombres22);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '24'";
    $totalesPilaresAutnomiaHombres23 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaHombres23);
    $pilaresTotalesAutnomiaHombres23= mysqli_fetch_array($totalesPilaresAutnomiaHombres23);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '26'";
    $totalesPilaresAutnomiaHombres24 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaHombres24);
    $pilaresTotalesAutnomiaHombres24= mysqli_fetch_array($totalesPilaresAutnomiaHombres24);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '27'";
    $totalesPilaresAutnomiaHombres25 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaHombres25);
    $pilaresTotalesAutnomiaHombres25= mysqli_fetch_array($totalesPilaresAutnomiaHombres25);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '31'";
    $totalesPilaresAutnomiaHombres26 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaHombres26);
    $pilaresTotalesAutnomiaHombres26= mysqli_fetch_array($totalesPilaresAutnomiaHombres26);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '32'";
    $totalesPilaresAutnomiaHombres27 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaHombres27);
    $pilaresTotalesAutnomiaHombres27= mysqli_fetch_array($totalesPilaresAutnomiaHombres27);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '33'";
    $totalesPilaresAutnomiaHombres28 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaHombres28);
    $pilaresTotalesAutnomiaHombres28= mysqli_fetch_array($totalesPilaresAutnomiaHombres28);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '34'";
    $totalesPilaresAutnomiaHombres29 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaHombres29);
    $pilaresTotalesAutnomiaHombres29= mysqli_fetch_array($totalesPilaresAutnomiaHombres29);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '35'";
    $totalesPilaresAutnomiaHombres30 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaHombres30);
    $pilaresTotalesAutnomiaHombres30= mysqli_fetch_array($totalesPilaresAutnomiaHombres30);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '36'";
    $totalesPilaresAutnomiaHombres31 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaHombres31);
    $pilaresTotalesAutnomiaHombres31= mysqli_fetch_array($totalesPilaresAutnomiaHombres31);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '37'";
    $totalesPilaresAutnomiaHombres32 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaHombres32);
    $pilaresTotalesAutnomiaHombres32= mysqli_fetch_array($totalesPilaresAutnomiaHombres32);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '38'";
    $totalesPilaresAutnomiaHombres33 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaHombres33);
    $pilaresTotalesAutnomiaHombres33= mysqli_fetch_array($totalesPilaresAutnomiaHombres33);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '39'";
    $totalesPilaresAutnomiaHombres34 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaHombres34);
    $pilaresTotalesAutnomiaHombres34= mysqli_fetch_array($totalesPilaresAutnomiaHombres34);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '40'";
    $totalesPilaresAutnomiaHombres35 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaHombres35);
    $pilaresTotalesAutnomiaHombres35= mysqli_fetch_array($totalesPilaresAutnomiaHombres35);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '41'";
    $totalesPilaresAutnomiaHombres36 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaHombres36);
    $pilaresTotalesAutnomiaHombres36= mysqli_fetch_array($totalesPilaresAutnomiaHombres36);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '42'";
    $totalesPilaresAutnomiaHombres37 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaHombres37);
    $pilaresTotalesAutnomiaHombres37= mysqli_fetch_array($totalesPilaresAutnomiaHombres37);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '43'";
    $totalesPilaresAutnomiaHombres38 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaHombres38);
    $pilaresTotalesAutnomiaHombres38= mysqli_fetch_array($totalesPilaresAutnomiaHombres38);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '44'";
    $totalesPilaresAutnomiaHombres39 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaHombres39);
    $pilaresTotalesAutnomiaHombres39= mysqli_fetch_array($totalesPilaresAutnomiaHombres39);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '45'";
    $totalesPilaresAutnomiaHombres40 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaHombres40);
    $pilaresTotalesAutnomiaHombres40= mysqli_fetch_array($totalesPilaresAutnomiaHombres40);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '46'";
    $totalesPilaresAutnomiaHombres41 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaHombres41);
    $pilaresTotalesAutnomiaHombres41= mysqli_fetch_array($totalesPilaresAutnomiaHombres41);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '47'";
    $totalesPilaresAutnomiaHombres42 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaHombres42);
    $pilaresTotalesAutnomiaHombres42= mysqli_fetch_array($totalesPilaresAutnomiaHombres42);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '48'";
    $totalesPilaresAutnomiaHombres43 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaHombres43);
    $pilaresTotalesAutnomiaHombres43= mysqli_fetch_array($totalesPilaresAutnomiaHombres43);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '49'";
    $totalesPilaresAutnomiaHombres44 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaHombres44);
    $pilaresTotalesAutnomiaHombres44= mysqli_fetch_array($totalesPilaresAutnomiaHombres44);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '50'";
    $totalesPilaresAutnomiaHombres45 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaHombres45);
    $pilaresTotalesAutnomiaHombres45= mysqli_fetch_array($totalesPilaresAutnomiaHombres45);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresAutonomia FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '51'";
    $totalesPilaresAutnomiaHombres46 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresAutnomiaHombres46);
    $pilaresTotalesAutnomiaHombres46= mysqli_fetch_array($totalesPilaresAutnomiaHombres46);  
/**
 * Usuarios totales por PILARES ACiberescuelas  select count(DISTINCT U1.idUsuarios) from Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 where U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3' AND U2.Pilares_idPilares = '1';
 */
    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U2.Pilares_idPilares = '1'";
    $totalesPilaresCiberescuela1 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescuela1);
    $pilaresTotalesCiberescuelas1= mysqli_fetch_array($totalesPilaresCiberescuela1);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U2.Pilares_idPilares = '2'";
    $totalesPilaresCiberescuela2 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescuela2);
    $pilaresTotalesCiberescuelas2= mysqli_fetch_array($totalesPilaresCiberescuela2);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U2.Pilares_idPilares = '3'";
    $totalesPilaresCiberescuela3 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescuela3);
    $pilaresTotalesCiberescuelas3= mysqli_fetch_array($totalesPilaresCiberescuela3);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U2.Pilares_idPilares = '4'";
    $totalesPilaresCiberescuela4 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescuela4);
    $pilaresTotalesCiberescuelas4= mysqli_fetch_array($totalesPilaresCiberescuela4);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U2.Pilares_idPilares = '5'";
    $totalesPilaresCiberescuela5 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescuela5);
    $pilaresTotalesCiberescuelas5= mysqli_fetch_array($totalesPilaresCiberescuela5);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U2.Pilares_idPilares = '6'";
    $totalesPilaresCiberescuela6 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescuela6);
    $pilaresTotalesCiberescuelas6= mysqli_fetch_array($totalesPilaresCiberescuela6);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U2.Pilares_idPilares = '7'";
    $totalesPilaresCiberescuela7 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescuela7);
    $pilaresTotalesCiberescuelas7= mysqli_fetch_array($totalesPilaresCiberescuela7);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U2.Pilares_idPilares = '8'";
    $totalesPilaresCiberescuela8 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescuela8);
    $pilaresTotalesCiberescuelas8= mysqli_fetch_array($totalesPilaresCiberescuela8);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U2.Pilares_idPilares = '9'";
    $totalesPilaresCiberescuela9 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescuela9);
    $pilaresTotalesCiberescuelas9= mysqli_fetch_array($totalesPilaresCiberescuela9);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U2.Pilares_idPilares = '10'";
    $totalesPilaresCiberescuela10 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescuela10);
    $pilaresTotalesCiberescuelas10= mysqli_fetch_array($totalesPilaresCiberescuela10);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U2.Pilares_idPilares = '11'";
    $totalesPilaresCiberescuela11 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescuela11);
    $pilaresTotalesCiberescuelas11= mysqli_fetch_array($totalesPilaresCiberescuela11);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U2.Pilares_idPilares = '12'";
    $totalesPilaresCiberescuela12 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescuela12);
    $pilaresTotalesCiberescuelas12= mysqli_fetch_array($totalesPilaresCiberescuela12);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U2.Pilares_idPilares = '13'";
    $totalesPilaresCiberescuela13 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescuela13);
    $pilaresTotalesCiberescuelas13= mysqli_fetch_array($totalesPilaresCiberescuela13);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U2.Pilares_idPilares = '14'";
    $totalesPilaresCiberescuela14 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescuela14);
    $pilaresTotalesCiberescuelas14= mysqli_fetch_array($totalesPilaresCiberescuela14);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U2.Pilares_idPilares = '15'";
    $totalesPilaresCiberescuela15 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescuela15);
    $pilaresTotalesCiberescuelas15= mysqli_fetch_array($totalesPilaresCiberescuela15);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U2.Pilares_idPilares = '16'";
    $totalesPilaresCiberescuela16 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescuela16);
    $pilaresTotalesCiberescuelas16= mysqli_fetch_array($totalesPilaresCiberescuela16);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U2.Pilares_idPilares = '17'";
    $totalesPilaresCiberescuela17 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescuela17);
    $pilaresTotalesCiberescuelas17= mysqli_fetch_array($totalesPilaresCiberescuela17);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U2.Pilares_idPilares = '18'";
    $totalesPilaresCiberescuela18 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescuela18);
    $pilaresTotalesCiberescuelas18= mysqli_fetch_array($totalesPilaresCiberescuela18);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U2.Pilares_idPilares = '19'";
    $totalesPilaresCiberescuela19 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescuela19);
    $pilaresTotalesCiberescuelas19= mysqli_fetch_array($totalesPilaresCiberescuela19);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U2.Pilares_idPilares = '20'";
    $totalesPilaresCiberescuela20 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescuela20);
    $pilaresTotalesCiberescuelas20= mysqli_fetch_array($totalesPilaresCiberescuela20);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U2.Pilares_idPilares = '21'";
    $totalesPilaresCiberescuela47 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescuela47);
    $pilaresTotalesCiberescuelas47= mysqli_fetch_array($totalesPilaresCiberescuela47);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U2.Pilares_idPilares = '22'";
    $totalesPilaresCiberescuela21 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescuela21);
    $pilaresTotalesCiberescuelas21= mysqli_fetch_array($totalesPilaresCiberescuela21);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U2.Pilares_idPilares = '23'";
    $totalesPilaresCiberescuela22 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescuela22);
    $pilaresTotalesCiberescuelas22= mysqli_fetch_array($totalesPilaresCiberescuela22);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U2.Pilares_idPilares = '24'";
    $totalesPilaresCiberescuela23 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescuela23);
    $pilaresTotalesCiberescuelas23= mysqli_fetch_array($totalesPilaresCiberescuela23);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U2.Pilares_idPilares = '26'";
    $totalesPilaresCiberescuela24 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescuela24);
    $pilaresTotalesCiberescuelas24= mysqli_fetch_array($totalesPilaresCiberescuela24);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U2.Pilares_idPilares = '27'";
    $totalesPilaresCiberescuela25 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescuela25);
    $pilaresTotalesCiberescuelas25= mysqli_fetch_array($totalesPilaresCiberescuela25);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U2.Pilares_idPilares = '31'";
    $totalesPilaresCiberescuela26 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescuela26);
    $pilaresTotalesCiberescuelas26= mysqli_fetch_array($totalesPilaresCiberescuela26);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U2.Pilares_idPilares = '32'";
    $totalesPilaresCiberescuela27 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescuela27);
    $pilaresTotalesCiberescuelas27= mysqli_fetch_array($totalesPilaresCiberescuela27);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U2.Pilares_idPilares = '33'";
    $totalesPilaresCiberescuela28 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescuela28);
    $pilaresTotalesCiberescuelas28= mysqli_fetch_array($totalesPilaresCiberescuela28);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U2.Pilares_idPilares = '34'";
    $totalesPilaresCiberescuela29 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescuela29);
    $pilaresTotalesCiberescuelas29= mysqli_fetch_array($totalesPilaresCiberescuela29);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U2.Pilares_idPilares = '35'";
    $totalesPilaresCiberescuela30 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescuela30);
    $pilaresTotalesCiberescuelas30= mysqli_fetch_array($totalesPilaresCiberescuela30);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U2.Pilares_idPilares = '36'";
    $totalesPilaresCiberescuela31 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescuela31);
    $pilaresTotalesCiberescuelas31= mysqli_fetch_array($totalesPilaresCiberescuela31);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U2.Pilares_idPilares = '37'";
    $totalesPilaresCiberescuela32 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescuela32);
    $pilaresTotalesCiberescuelas32= mysqli_fetch_array($totalesPilaresCiberescuela32);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U2.Pilares_idPilares = '38'";
    $totalesPilaresCiberescuela33 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescuela33);
    $pilaresTotalesCiberescuelas33= mysqli_fetch_array($totalesPilaresCiberescuela33);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U2.Pilares_idPilares = '39'";
    $totalesPilaresCiberescuela34 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescuela34);
    $pilaresTotalesCiberescuelas34= mysqli_fetch_array($totalesPilaresCiberescuela34);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U2.Pilares_idPilares = '40'";
    $totalesPilaresCiberescuela35 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescuela35);
    $pilaresTotalesCiberescuelas35= mysqli_fetch_array($totalesPilaresCiberescuela35);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U2.Pilares_idPilares = '41'";
    $totalesPilaresCiberescuela36 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescuela36);
    $pilaresTotalesCiberescuelas36= mysqli_fetch_array($totalesPilaresCiberescuela36);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U2.Pilares_idPilares = '42'";
    $totalesPilaresCiberescuela37 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescuela37);
    $pilaresTotalesCiberescuelas37= mysqli_fetch_array($totalesPilaresCiberescuela37);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U2.Pilares_idPilares = '43'";
    $totalesPilaresCiberescuela38 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescuela38);
    $pilaresTotalesCiberescuelas38= mysqli_fetch_array($totalesPilaresCiberescuela38);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U2.Pilares_idPilares = '44'";
    $totalesPilaresCiberescuela39 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescuela39);
    $pilaresTotalesCiberescuelas39= mysqli_fetch_array($totalesPilaresCiberescuela39);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U2.Pilares_idPilares = '45'";
    $totalesPilaresCiberescuela40 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescuela40);
    $pilaresTotalesCiberescuelas40= mysqli_fetch_array($totalesPilaresCiberescuela40);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U2.Pilares_idPilares = '46'";
    $totalesPilaresCiberescuela41 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescuela41);
    $pilaresTotalesCiberescuelas41= mysqli_fetch_array($totalesPilaresCiberescuela41);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U2.Pilares_idPilares = '47'";
    $totalesPilaresCiberescuela42 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescuela42);
    $pilaresTotalesCiberescuelas42= mysqli_fetch_array($totalesPilaresCiberescuela42);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U2.Pilares_idPilares = '48'";
    $totalesPilaresCiberescuela43 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescuela43);
    $pilaresTotalesCiberescuelas43= mysqli_fetch_array($totalesPilaresCiberescuela43);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U2.Pilares_idPilares = '49'";
    $totalesPilaresCiberescuela44 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescuela44);
    $pilaresTotalesCiberescuelas44= mysqli_fetch_array($totalesPilaresCiberescuela44);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U2.Pilares_idPilares = '50'";
    $totalesPilaresCiberescuela45 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescuela45);
    $pilaresTotalesCiberescuelas45= mysqli_fetch_array($totalesPilaresCiberescuela45);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U2.Pilares_idPilares = '51'";
    $totalesPilaresCiberescuela46 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescuela46);
    $pilaresTotalesCiberescuelas46= mysqli_fetch_array($totalesPilaresCiberescuela46); 
/**
 * Usuarios totales por PILARES Ciberescuelas Mujeres 
 */
    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '1'";
    $totalesPilaresCiberescelasMujeres1 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasMujeres1);
    $pilaresTotalesCiberescelasMujeres1= mysqli_fetch_array($totalesPilaresCiberescelasMujeres1);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '2'";
    $totalesPilaresCiberescelasMujeres2 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasMujeres2);
    $pilaresTotalesCiberescelasMujeres2= mysqli_fetch_array($totalesPilaresCiberescelasMujeres2);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '3'";
    $totalesPilaresCiberescelasMujeres3 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasMujeres3);
    $pilaresTotalesCiberescelasMujeres3= mysqli_fetch_array($totalesPilaresCiberescelasMujeres3);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '4'";
    $totalesPilaresCiberescelasMujeres4 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasMujeres4);
    $pilaresTotalesCiberescelasMujeres4= mysqli_fetch_array($totalesPilaresCiberescelasMujeres4);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '5'";
    $totalesPilaresCiberescelasMujeres5 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasMujeres5);
    $pilaresTotalesCiberescelasMujeres5= mysqli_fetch_array($totalesPilaresCiberescelasMujeres5);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '6'";
    $totalesPilaresCiberescelasMujeres6 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasMujeres6);
    $pilaresTotalesCiberescelasMujeres6= mysqli_fetch_array($totalesPilaresCiberescelasMujeres6);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '7'";
    $totalesPilaresCiberescelasMujeres7 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasMujeres7);
    $pilaresTotalesCiberescelasMujeres7= mysqli_fetch_array($totalesPilaresCiberescelasMujeres7);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '8'";
    $totalesPilaresCiberescelasMujeres8 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasMujeres8);
    $pilaresTotalesCiberescelasMujeres8= mysqli_fetch_array($totalesPilaresCiberescelasMujeres8);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '9'";
    $totalesPilaresCiberescelasMujeres9 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasMujeres9);
    $pilaresTotalesCiberescelasMujeres9= mysqli_fetch_array($totalesPilaresCiberescelasMujeres9);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '10'";
    $totalesPilaresCiberescelasMujeres10 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasMujeres10);
    $pilaresTotalesCiberescelasMujeres10= mysqli_fetch_array($totalesPilaresCiberescelasMujeres10);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '11'";
    $totalesPilaresCiberescelasMujeres11 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasMujeres11);
    $pilaresTotalesCiberescelasMujeres11= mysqli_fetch_array($totalesPilaresCiberescelasMujeres11);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '12'";
    $totalesPilaresCiberescelasMujeres12 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasMujeres12);
    $pilaresTotalesCiberescelasMujeres12= mysqli_fetch_array($totalesPilaresCiberescelasMujeres12);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '13'";
    $totalesPilaresCiberescelasMujeres13 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasMujeres13);
    $pilaresTotalesCiberescelasMujeres13= mysqli_fetch_array($totalesPilaresCiberescelasMujeres13);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '14'";
    $totalesPilaresCiberescelasMujeres14 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasMujeres14);
    $pilaresTotalesCiberescelasMujeres14= mysqli_fetch_array($totalesPilaresCiberescelasMujeres14);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '15'";
    $totalesPilaresCiberescelasMujeres15 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasMujeres15);
    $pilaresTotalesCiberescelasMujeres15= mysqli_fetch_array($totalesPilaresCiberescelasMujeres15);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '16'";
    $totalesPilaresCiberescelasMujeres16 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasMujeres16);
    $pilaresTotalesCiberescelasMujeres16= mysqli_fetch_array($totalesPilaresCiberescelasMujeres16);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '17'";
    $totalesPilaresCiberescelasMujeres17 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasMujeres17);
    $pilaresTotalesCiberescelasMujeres17= mysqli_fetch_array($totalesPilaresCiberescelasMujeres17);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '18'";
    $totalesPilaresCiberescelasMujeres18 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasMujeres18);
    $pilaresTotalesCiberescelasMujeres18= mysqli_fetch_array($totalesPilaresCiberescelasMujeres18);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '19'";
    $totalesPilaresCiberescelasMujeres19 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasMujeres19);
    $pilaresTotalesCiberescelasMujeres19= mysqli_fetch_array($totalesPilaresCiberescelasMujeres19);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '20'";
    $totalesPilaresCiberescelasMujeres20 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasMujeres20);
    $pilaresTotalesCiberescelasMujeres20= mysqli_fetch_array($totalesPilaresCiberescelasMujeres20);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '21'";
    $totalesPilaresCiberescelasMujeres47 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasMujeres47);
    $pilaresTotalesCiberescelasMujeres47= mysqli_fetch_array($totalesPilaresCiberescelasMujeres47);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '22'";
    $totalesPilaresCiberescelasMujeres21 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasMujeres21);
    $pilaresTotalesCiberescelasMujeres21= mysqli_fetch_array($totalesPilaresCiberescelasMujeres21);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '23'";
    $totalesPilaresCiberescelasMujeres22 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasMujeres22);
    $pilaresTotalesCiberescelasMujeres22= mysqli_fetch_array($totalesPilaresCiberescelasMujeres22);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '24'";
    $totalesPilaresCiberescelasMujeres23 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasMujeres23);
    $pilaresTotalesCiberescelasMujeres23= mysqli_fetch_array($totalesPilaresCiberescelasMujeres23);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '26'";
    $totalesPilaresCiberescelasMujeres24 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasMujeres24);
    $pilaresTotalesCiberescelasMujeres24= mysqli_fetch_array($totalesPilaresCiberescelasMujeres24);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '27'";
    $totalesPilaresCiberescelasMujeres25 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasMujeres25);
    $pilaresTotalesCiberescelasMujeres25= mysqli_fetch_array($totalesPilaresCiberescelasMujeres25);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '31'";
    $totalesPilaresCiberescelasMujeres26 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasMujeres26);
    $pilaresTotalesCiberescelasMujeres26= mysqli_fetch_array($totalesPilaresCiberescelasMujeres26);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '32'";
    $totalesPilaresCiberescelasMujeres27 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasMujeres27);
    $pilaresTotalesCiberescelasMujeres27= mysqli_fetch_array($totalesPilaresCiberescelasMujeres27);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '33'";
    $totalesPilaresCiberescelasMujeres28 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasMujeres28);
    $pilaresTotalesCiberescelasMujeres28= mysqli_fetch_array($totalesPilaresCiberescelasMujeres28);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '34'";
    $totalesPilaresCiberescelasMujeres29 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasMujeres29);
    $pilaresTotalesCiberescelasMujeres29= mysqli_fetch_array($totalesPilaresCiberescelasMujeres29);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '35'";
    $totalesPilaresCiberescelasMujeres30 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasMujeres30);
    $pilaresTotalesCiberescelasMujeres30= mysqli_fetch_array($totalesPilaresCiberescelasMujeres30);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '36'";
    $totalesPilaresCiberescelasMujeres31 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasMujeres31);
    $pilaresTotalesCiberescelasMujeres31= mysqli_fetch_array($totalesPilaresCiberescelasMujeres31);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '37'";
    $totalesPilaresCiberescelasMujeres32 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasMujeres32);
    $pilaresTotalesCiberescelasMujeres32= mysqli_fetch_array($totalesPilaresCiberescelasMujeres32);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '38'";
    $totalesPilaresCiberescelasMujeres33 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasMujeres33);
    $pilaresTotalesCiberescelasMujeres33= mysqli_fetch_array($totalesPilaresCiberescelasMujeres33);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '39'";
    $totalesPilaresCiberescelasMujeres34 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasMujeres34);
    $pilaresTotalesCiberescelasMujeres34= mysqli_fetch_array($totalesPilaresCiberescelasMujeres34);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '40'";
    $totalesPilaresCiberescelasMujeres35 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasMujeres35);
    $pilaresTotalesCiberescelasMujeres35= mysqli_fetch_array($totalesPilaresCiberescelasMujeres35);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '41'";
    $totalesPilaresCiberescelasMujeres36 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasMujeres36);
    $pilaresTotalesCiberescelasMujeres36= mysqli_fetch_array($totalesPilaresCiberescelasMujeres36);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '42'";
    $totalesPilaresCiberescelasMujeres37 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasMujeres37);
    $pilaresTotalesCiberescelasMujeres37= mysqli_fetch_array($totalesPilaresCiberescelasMujeres37);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '43'";
    $totalesPilaresCiberescelasMujeres38 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasMujeres38);
    $pilaresTotalesCiberescelasMujeres38= mysqli_fetch_array($totalesPilaresCiberescelasMujeres38);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '44'";
    $totalesPilaresCiberescelasMujeres39 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasMujeres39);
    $pilaresTotalesCiberescelasMujeres39= mysqli_fetch_array($totalesPilaresCiberescelasMujeres39);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '45'";
    $totalesPilaresCiberescelasMujeres40 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasMujeres40);
    $pilaresTotalesCiberescelasMujeres40= mysqli_fetch_array($totalesPilaresCiberescelasMujeres40);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '46'";
    $totalesPilaresCiberescelasMujeres41 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasMujeres41);
    $pilaresTotalesCiberescelasMujeres41= mysqli_fetch_array($totalesPilaresCiberescelasMujeres41);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '47'";
    $totalesPilaresCiberescelasMujeres42 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasMujeres42);
    $pilaresTotalesCiberescelasMujeres42= mysqli_fetch_array($totalesPilaresCiberescelasMujeres42);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '48'";
    $totalesPilaresCiberescelasMujeres43 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasMujeres43);
    $pilaresTotalesCiberescelasMujeres43= mysqli_fetch_array($totalesPilaresCiberescelasMujeres43);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '49'";
    $totalesPilaresCiberescelasMujeres44 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasMujeres44);
    $pilaresTotalesCiberescelasMujeres44= mysqli_fetch_array($totalesPilaresCiberescelasMujeres44);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '50'";
    $totalesPilaresCiberescelasMujeres45 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasMujeres45);
    $pilaresTotalesCiberescelasMujeres45= mysqli_fetch_array($totalesPilaresCiberescelasMujeres45);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%M%' AND U2.Pilares_idPilares = '51'";
    $totalesPilaresCiberescelasMujeres46 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasMujeres46);
    $pilaresTotalesCiberescelasMujeres46= mysqli_fetch_array($totalesPilaresCiberescelasMujeres46);  
/**
 * Usuarios totales por PILARES Ciberescuelas Hombres 
 */
    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '1'";
    $totalesPilaresCiberescelasHombres1 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasHombres1);
    $pilaresTotalesCiberescelasHombres1= mysqli_fetch_array($totalesPilaresCiberescelasHombres1);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '2'";
    $totalesPilaresCiberescelasHombres2 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasHombres2);
    $pilaresTotalesCiberescelasHombres2= mysqli_fetch_array($totalesPilaresCiberescelasHombres2);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '3'";
    $totalesPilaresCiberescelasHombres3 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasHombres3);
    $pilaresTotalesCiberescelasHombres3= mysqli_fetch_array($totalesPilaresCiberescelasHombres3);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '4'";
    $totalesPilaresCiberescelasHombres4 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasHombres4);
    $pilaresTotalesCiberescelasHombres4= mysqli_fetch_array($totalesPilaresCiberescelasHombres4);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '5'";
    $totalesPilaresCiberescelasHombres5 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasHombres5);
    $pilaresTotalesCiberescelasHombres5= mysqli_fetch_array($totalesPilaresCiberescelasHombres5);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '6'";
    $totalesPilaresCiberescelasHombres6 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasHombres6);
    $pilaresTotalesCiberescelasHombres6= mysqli_fetch_array($totalesPilaresCiberescelasHombres6);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '7'";
    $totalesPilaresCiberescelasHombres7 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasHombres7);
    $pilaresTotalesCiberescelasHombres7= mysqli_fetch_array($totalesPilaresCiberescelasHombres7);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '8'";
    $totalesPilaresCiberescelasHombres8 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasHombres8);
    $pilaresTotalesCiberescelasHombres8= mysqli_fetch_array($totalesPilaresCiberescelasHombres8);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '9'";
    $totalesPilaresCiberescelasHombres9 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasHombres9);
    $pilaresTotalesCiberescelasHombres9= mysqli_fetch_array($totalesPilaresCiberescelasHombres9);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '10'";
    $totalesPilaresCiberescelasHombres10 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasHombres10);
    $pilaresTotalesCiberescelasHombres10= mysqli_fetch_array($totalesPilaresCiberescelasHombres10);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '11'";
    $totalesPilaresCiberescelasHombres11 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasHombres11);
    $pilaresTotalesCiberescelasHombres11= mysqli_fetch_array($totalesPilaresCiberescelasHombres11);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '12'";
    $totalesPilaresCiberescelasHombres12 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasHombres12);
    $pilaresTotalesCiberescelasHombres12= mysqli_fetch_array($totalesPilaresCiberescelasHombres12);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '13'";
    $totalesPilaresCiberescelasHombres13 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasHombres13);
    $pilaresTotalesCiberescelasHombres13= mysqli_fetch_array($totalesPilaresCiberescelasHombres13);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '14'";
    $totalesPilaresCiberescelasHombres14 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasHombres14);
    $pilaresTotalesCiberescelasHombres14= mysqli_fetch_array($totalesPilaresCiberescelasHombres14);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '15'";
    $totalesPilaresCiberescelasHombres15 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasHombres15);
    $pilaresTotalesCiberescelasHombres15= mysqli_fetch_array($totalesPilaresCiberescelasHombres15);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '16'";
    $totalesPilaresCiberescelasHombres16 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasHombres16);
    $pilaresTotalesCiberescelasHombres16= mysqli_fetch_array($totalesPilaresCiberescelasHombres16);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '17'";
    $totalesPilaresCiberescelasHombres17 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasHombres17);
    $pilaresTotalesCiberescelasHombres17= mysqli_fetch_array($totalesPilaresCiberescelasHombres17);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '18'";
    $totalesPilaresCiberescelasHombres18 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasHombres18);
    $pilaresTotalesCiberescelasHombres18= mysqli_fetch_array($totalesPilaresCiberescelasHombres18);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '19'";
    $totalesPilaresCiberescelasHombres19 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasHombres19);
    $pilaresTotalesCiberescelasHombres19= mysqli_fetch_array($totalesPilaresCiberescelasHombres19);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '20'";
    $totalesPilaresCiberescelasHombres20 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasHombres20);
    $pilaresTotalesCiberescelasHombres20= mysqli_fetch_array($totalesPilaresCiberescelasHombres20);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '21'";
    $totalesPilaresCiberescelasHombres47 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasHombres47);
    $pilaresTotalesCiberescelasHombres47= mysqli_fetch_array($totalesPilaresCiberescelasHombres47);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '22'";
    $totalesPilaresCiberescelasHombres21 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasHombres21);
    $pilaresTotalesCiberescelasHombres21= mysqli_fetch_array($totalesPilaresCiberescelasHombres21);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '23'";
    $totalesPilaresCiberescelasHombres22 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasHombres22);
    $pilaresTotalesCiberescelasHombres22= mysqli_fetch_array($totalesPilaresCiberescelasHombres22);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '24'";
    $totalesPilaresCiberescelasHombres23 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasHombres23);
    $pilaresTotalesCiberescelasHombres23= mysqli_fetch_array($totalesPilaresCiberescelasHombres23);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '26'";
    $totalesPilaresCiberescelasHombres24 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasHombres24);
    $pilaresTotalesCiberescelasHombres24= mysqli_fetch_array($totalesPilaresCiberescelasHombres24);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '27'";
    $totalesPilaresCiberescelasHombres25 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasHombres25);
    $pilaresTotalesCiberescelasHombres25= mysqli_fetch_array($totalesPilaresCiberescelasHombres25);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '31'";
    $totalesPilaresCiberescelasHombres26 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasHombres26);
    $pilaresTotalesCiberescelasHombres26= mysqli_fetch_array($totalesPilaresCiberescelasHombres26);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '32'";
    $totalesPilaresCiberescelasHombres27 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasHombres27);
    $pilaresTotalesCiberescelasHombres27= mysqli_fetch_array($totalesPilaresCiberescelasHombres27);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '33'";
    $totalesPilaresCiberescelasHombres28 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasHombres28);
    $pilaresTotalesCiberescelasHombres28= mysqli_fetch_array($totalesPilaresCiberescelasHombres28);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '34'";
    $totalesPilaresCiberescelasHombres29 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasHombres29);
    $pilaresTotalesCiberescelasHombres29= mysqli_fetch_array($totalesPilaresCiberescelasHombres29);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '35'";
    $totalesPilaresCiberescelasHombres30 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasHombres30);
    $pilaresTotalesCiberescelasHombres30= mysqli_fetch_array($totalesPilaresCiberescelasHombres30);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '36'";
    $totalesPilaresCiberescelasHombres31 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasHombres31);
    $pilaresTotalesCiberescelasHombres31= mysqli_fetch_array($totalesPilaresCiberescelasHombres31);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '37'";
    $totalesPilaresCiberescelasHombres32 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasHombres32);
    $pilaresTotalesCiberescelasHombres32= mysqli_fetch_array($totalesPilaresCiberescelasHombres32);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '38'";
    $totalesPilaresCiberescelasHombres33 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasHombres33);
    $pilaresTotalesCiberescelasHombres33= mysqli_fetch_array($totalesPilaresCiberescelasHombres33);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '39'";
    $totalesPilaresCiberescelasHombres34 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasHombres34);
    $pilaresTotalesCiberescelasHombres34= mysqli_fetch_array($totalesPilaresCiberescelasHombres34);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '40'";
    $totalesPilaresCiberescelasHombres35 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasHombres35);
    $pilaresTotalesCiberescelasHombres35= mysqli_fetch_array($totalesPilaresCiberescelasHombres35);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '41'";
    $totalesPilaresCiberescelasHombres36 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasHombres36);
    $pilaresTotalesCiberescelasHombres36= mysqli_fetch_array($totalesPilaresCiberescelasHombres36);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '42'";
    $totalesPilaresCiberescelasHombres37 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasHombres37);
    $pilaresTotalesCiberescelasHombres37= mysqli_fetch_array($totalesPilaresCiberescelasHombres37);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '43'";
    $totalesPilaresCiberescelasHombres38 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasHombres38);
    $pilaresTotalesCiberescelasHombres38= mysqli_fetch_array($totalesPilaresCiberescelasHombres38);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '44'";
    $totalesPilaresCiberescelasHombres39 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasHombres39);
    $pilaresTotalesCiberescelasHombres39= mysqli_fetch_array($totalesPilaresCiberescelasHombres39);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '45'";
    $totalesPilaresCiberescelasHombres40 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasHombres40);
    $pilaresTotalesCiberescelasHombres40= mysqli_fetch_array($totalesPilaresCiberescelasHombres40);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '46'";
    $totalesPilaresCiberescelasHombres41 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasHombres41);
    $pilaresTotalesCiberescelasHombres41= mysqli_fetch_array($totalesPilaresCiberescelasHombres41);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '47'";
    $totalesPilaresCiberescelasHombres42 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasHombres42);
    $pilaresTotalesCiberescelasHombres42= mysqli_fetch_array($totalesPilaresCiberescelasHombres42);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '48'";
    $totalesPilaresCiberescelasHombres43 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasHombres43);
    $pilaresTotalesCiberescelasHombres43= mysqli_fetch_array($totalesPilaresCiberescelasHombres43);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '49'";
    $totalesPilaresCiberescelasHombres44 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasHombres44);
    $pilaresTotalesCiberescelasHombres44= mysqli_fetch_array($totalesPilaresCiberescelasHombres44);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '50'";
    $totalesPilaresCiberescelasHombres45 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasHombres45);
    $pilaresTotalesCiberescelasHombres45= mysqli_fetch_array($totalesPilaresCiberescelasHombres45);

    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorPilaresCiberescuelas FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4' AND U1.sexo LIKE '%H%' AND U2.Pilares_idPilares = '51'";
    $totalesPilaresCiberescelasHombres46 = mysqli_query($con, $sql);
    //var_dump($totalesPilaresCiberescelasHombres46);
    $pilaresTotalesCiberescelasHombres46= mysqli_fetch_array($totalesPilaresCiberescelasHombres46);                      
    /**
    * Totales por tipo de actividad
    * SELECT COUNT(*) AS userPorActividad FROM ActividadesPorUsuario A1, UsuariosPorPilar U1 WHERE A1.Usuario_idUsuarios = U1.Usuario_idUsuarios and A1.Actividades_TiposActividades_idTiposActividades = '1' and U1.Pilares_idPilares = '$lcpPilarId'";
    */
    // $sql="SELECT COUNT(*) AS userPorActividad FROM ActividadesPorUsuario A1, UsuariosPorPilar U1 WHERE A1.Usuario_idUsuarios = U1.Usuario_idUsuarios and A1.Actividades_TiposActividades_idTiposActividades = '1' and U1.Pilares_idPilares = '$idPilarLCP'";
    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorActividad FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '1'";
    $totalesCultura = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $culturaTotales = mysqli_fetch_array($totalesCultura);

    // // $sql="SELECT COUNT(*) AS userPorActividad FROM ActividadesPorUsuario A1, UsuariosPorPilar U1 WHERE A1.Usuario_idUsuarios = U1.Usuario_idUsuarios and A1.Actividades_TiposActividades_idTiposActividades = '4' and U1.Pilares_idPilares = '$idPilarLCP'";
    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorActividad FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '4'";
    $totalesCiberEscuelas = mysqli_query($con, $sql);
    // //var_dump($totalesCultura);
    $ciberEscuelaTotales = mysqli_fetch_array($totalesCiberEscuelas);

    // $sql="SELECT COUNT(*) AS userPorActividad FROM ActividadesPorUsuario A1, UsuariosPorPilar U1 WHERE A1.Usuario_idUsuarios = U1.Usuario_idUsuarios and A1.Actividades_TiposActividades_idTiposActividades = '2' and U1.Pilares_idPilares = '$idPilarLCP'";
    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorActividad FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '2'";
    $totalesDeporte = mysqli_query($con, $sql);
    // //var_dump($totalesCultura);
    $deporteTotales = mysqli_fetch_array($totalesDeporte);

    // $sql="SELECT COUNT(*) AS userPorActividad FROM ActividadesPorUsuario A1, UsuariosPorPilar U1 WHERE A1.Usuario_idUsuarios = U1.Usuario_idUsuarios and A1.Actividades_TiposActividades_idTiposActividades = '3' and U1.Pilares_idPilares = '$idPilarLCP'";
    $sql="SELECT count(DISTINCT U1.idUsuarios) AS userPorActividad FROM Usuario U1, ActividadesPorUsuario A1, UsuariosPorPilar U2 WHERE U1.idUsuarios = A1.Usuario_idUsuarios AND A1.Usuario_idusuarios = U2.Usuario_idusuarios AND A1.Actividades_TiposActividades_idTiposActividades = '3'";
    $totalesAutonomia = mysqli_query($con, $sql);
    // //var_dump($totalesCultura);
    $autonomiaTotales = mysqli_fetch_array($totalesAutonomia);
    /**
    * FIN - Totales por tipo de actividad
    */
    /**
    * Totales por tactividad Cultura
    */
    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '1'";
    $totalesTeatro = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $teatro = mysqli_fetch_array($totalesTeatro);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '2'";
    $totalesDanza = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $danza = mysqli_fetch_array($totalesDanza);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '4'";
    $totalesPerformance = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $performance = mysqli_fetch_array($totalesPerformance);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '5'";
    $totalesMusica = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $musica = mysqli_fetch_array($totalesMusica);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '8'";
    $totalesArtesPlas = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $artesPlas = mysqli_fetch_array($totalesArtesPlas);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '9'";
    $totalesFoto = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $fotografia = mysqli_fetch_array($totalesFoto);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '10'";
    $totalesVideoDoc = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $videoDoc = mysqli_fetch_array($totalesVideoDoc);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '11'";
    $totalesStopMotion = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $stopMotion = mysqli_fetch_array($totalesStopMotion);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '12'";
    $totalesArteBiolo = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $arteBiolo = mysqli_fetch_array($totalesArteBiolo);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '15'";
    $totalesLibroClub = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $libroClub = mysqli_fetch_array($totalesLibroClub);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '16'";
    $totalesCineTranshu = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $CineTranshu = mysqli_fetch_array($totalesCineTranshu);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '22'";
    $totalesDifuCienti = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $difuCienti = mysqli_fetch_array($totalesDifuCienti);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '67'";
    $totalesBaileSocial = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $baileSocial = mysqli_fetch_array($totalesBaileSocial);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '68'";
    $totalesDanzaNiños = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $danzaNiños = mysqli_fetch_array($totalesDanzaNiños);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '69'";
    $totalesDanzaAdultos = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $danzaAdultos = mysqli_fetch_array($totalesDanzaAdultos);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '70'";
    $totalesFolklorica = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $folklorica = mysqli_fetch_array($totalesFolklorica);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '71'";
    $totalesActuacion = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $actuacion = mysqli_fetch_array($totalesActuacion);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '72'";
    $totalesTeatroCalle = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $teatroCalle = mysqli_fetch_array($totalesTeatroCalle);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '73'";
    $totalesDanzaContemporanea = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $contemporanea = mysqli_fetch_array($totalesDanzaContemporanea);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '74'";
    $totalesPolinesia = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $polinesia = mysqli_fetch_array($totalesPolinesia);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '75'";
    $totalesTeatroMascaras = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $mascaras = mysqli_fetch_array($totalesTeatroMascaras);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '76'";
    $totalesExpresio = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $expresion = mysqli_fetch_array($totalesExpresio);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '77'";
    $totalesTelar = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $telar = mysqli_fetch_array($totalesTelar);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '78'";
    $totalesCArtoneria = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $cartoneria = mysqli_fetch_array($totalesCArtoneria);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '79'";
    $totalesBordado = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $bordado = mysqli_fetch_array($totalesBordado);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '80'";
    $totalesConstruccion = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $construccion = mysqli_fetch_array($totalesConstruccion);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '81'";
    $totalesDiseñoJuguetes = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $diseñoJuguetes = mysqli_fetch_array($totalesDiseñoJuguetes);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '82'";
    $totalesReciclajeAmb = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $reciclajeAmb = mysqli_fetch_array($totalesReciclajeAmb);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '83'";
    $totalesEscritura = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $escritura = mysqli_fetch_array($totalesEscritura);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '84'";
    $totalesPinturaArt = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $pinturaArt = mysqli_fetch_array($totalesPinturaArt);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '85'";
    $totalesAudioVisual = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $audioVisual = mysqli_fetch_array($totalesAudioVisual);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '86'";
    $totalesCine = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $cine = mysqli_fetch_array($totalesCine);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '87'";
    $totalesAnimacionNiños = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $animacionNiños = mysqli_fetch_array($totalesAnimacionNiños);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '88'";
    $totalesVideoComunitario = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $videoComunitario = mysqli_fetch_array($totalesVideoComunitario);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '89'";
    $totalesGuitarra = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $guitarra = mysqli_fetch_array($totalesGuitarra);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '90'";
    $totalesRap = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $rap = mysqli_fetch_array($totalesRap);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '91'";
    $totalesPercusiones = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $percusiones = mysqli_fetch_array($totalesPercusiones);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '92'";
    $totalesIniciacion = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $iniciacion = mysqli_fetch_array($totalesIniciacion);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '93'";
    $totalesSonHuasteco = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $sonHuasteco = mysqli_fetch_array($totalesSonHuasteco);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '123'";
    $totalesGrabado = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $grabado = mysqli_fetch_array($totalesGrabado);
    /**
    * FIN -Totales por tactividad Cultura
    */
    /**
    * Totales por tactividad Deporte
    */
    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '17'";
    $totalesFutbol = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $futbol = mysqli_fetch_array($totalesFutbol);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '18'";
    $totalesBasquet = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $basquet = mysqli_fetch_array($totalesBasquet);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '19'";
    $totaleVoley = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $voley = mysqli_fetch_array($totaleVoley);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '20'";
    $totalesAcondicionamiento = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $acondicionamiento = mysqli_fetch_array($totalesAcondicionamiento);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '94'";
    $totalesZumba = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $zumba = mysqli_fetch_array($totalesZumba);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '95'";
    $totalesTae = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $tae = mysqli_fetch_array($totalesTae);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '96'";
    $totalesYoga = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $yoga = mysqli_fetch_array($totalesYoga);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '97'";
    $totalesTai = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $taiChi = mysqli_fetch_array($totalesTai);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '98'";
    $totalesBoxeo = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $boxeo = mysqli_fetch_array($totalesBoxeo);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '99'";
    $totalesAtletismo = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $atletismo = mysqli_fetch_array($totalesAtletismo);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '100'";
    $totalesKarate = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $karate = mysqli_fetch_array($totalesKarate);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '101'";
    $totalesKung = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $kung = mysqli_fetch_array($totalesKung);
    /**
    * FIN - Totales por tactividad Deporte
    */
    /**
    * Totales por actividad Ciberescuelas
    */
    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '21'";
    $totalesAjedrez = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $ajedrez = mysqli_fetch_array($totalesAjedrez);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '24'";
    $totalesClubCiencia = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $clubCiencia = mysqli_fetch_array($totalesClubCiencia);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '25'";
    $totalesRoboticaApli = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $robo = mysqli_fetch_array($totalesRoboticaApli);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '28'";
    $totalesClubCodigo = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $clubCodigo = mysqli_fetch_array($totalesClubCodigo);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '29'";
    $totalesAmor = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $amor = mysqli_fetch_array($totalesAmor);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '30'";
    $totalesPrevenAdic = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $prevenAdic = mysqli_fetch_array($totalesPrevenAdic);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '31'";
    $totalesHabilidades = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $habilidades = mysqli_fetch_array($totalesHabilidades);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '32'";
    $totalesProyecto = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $proyecto = mysqli_fetch_array($totalesProyecto);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '33'";
    $totalesAutoestima = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $autoestima = mysqli_fetch_array($totalesAutoestima);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '34'";
    $totalesTanato = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $tanato = mysqli_fetch_array($totalesTanato);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '35'";
    $totalesInteliEmo = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $inteliEmo = mysqli_fetch_array($totalesInteliEmo);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '36'";
    $totalesArteEmo = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $arteEmo = mysqli_fetch_array($totalesArteEmo);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '102'";
    $totalesREdaccion = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $redaccion = mysqli_fetch_array($totalesREdaccion);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '103'";
    $totalesTalleComp = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $talleresCom = mysqli_fetch_array($totalesTalleComp);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '104'";
    $totalesEmoMagic = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $emoMagic = mysqli_fetch_array($totalesEmoMagic);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '105'";
    $totalesPintEmo = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $pintEmo = mysqli_fetch_array($totalesPintEmo);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '106'";
    $totalesAlfabet = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $alfabet = mysqli_fetch_array($totalesAlfabet);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '107'";
    $totalesPrimaRIA = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $primaria = mysqli_fetch_array($totalesPrimaRIA);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '108'";
    $totalesSec = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $secundaria = mysqli_fetch_array($totalesSec);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '109'";
    $totalesBadi = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $badi = mysqli_fetch_array($totalesBadi);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '110'";
    $totalesPrepaSep = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $prepaSep = mysqli_fetch_array($totalesPrepaSep);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '114'";
    $totalesBunam= mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $bunam = mysqli_fetch_array($totalesBunam);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '115'";
    $totalesUnadm = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $unadm = mysqli_fetch_array($totalesUnadm);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '116'";
    $totalesLicLinea = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $liclinea = mysqli_fetch_array($totalesLicLinea);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '117'";
    $totalesLicCdmx = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $licCdmx = mysqli_fetch_array($totalesLicCdmx);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '118'";
    $totalesAsePrim = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $asePrimaria = mysqli_fetch_array($totalesAsePrim);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '119'";
    $totalesAseSec = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $aseSecundaria = mysqli_fetch_array($totalesAseSec);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '120'";
    $totalesAsePrepa = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $asePrep = mysqli_fetch_array($totalesAsePrepa);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '121'";
    $totalesAseLic = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $aseLic= mysqli_fetch_array($totalesAseLic);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '122'";
    $totalesBaileCuero= mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $baileCuerpo= mysqli_fetch_array($totalesBaileCuero);
    /**
    * FIN - Totales por tactividad  Ciberescuelas
    */
    /**
    * Totales por actividad Autonomía
    */
    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '6'";
    $totalesEnucadernacion = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $encuadernacion = mysqli_fetch_array($totalesEnucadernacion);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '7'";
    $totalesReciclaje = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $reciclaje = mysqli_fetch_array($totalesReciclaje);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '13'";
    $totalesHuerto = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $huerto = mysqli_fetch_array($totalesHuerto);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '14'";
    $totalesCeramica = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $ceramica = mysqli_fetch_array($totalesCeramica);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '23'";
    $totalesProgramacion = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $programacion = mysqli_fetch_array($totalesProgramacion);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '27'";
    $totalesEdicionDiseño = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $edicionDiseño = mysqli_fetch_array($totalesEdicionDiseño);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '37'";
    $totalesCarpinteria = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $carpinteria = mysqli_fetch_array($totalesCarpinteria);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '38'";
    $totalesPlomeria = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $plomeria = mysqli_fetch_array($totalesPlomeria);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '33'";
    $totalesAutoestima = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $autoestima = mysqli_fetch_array($totalesAutoestima);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '39'";
    $totalesHerreria = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $herreria = mysqli_fetch_array($totalesHerreria);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '40'";
    $totalesElectricidad = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $electricidad= mysqli_fetch_array($totalesElectricidad);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '41'";
    $totalesGastronomia = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $gastronomia = mysqli_fetch_array($totalesGastronomia);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '42'";
    $totalesPanaderia = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $panaderia = mysqli_fetch_array($totalesPanaderia);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '43'";
    $totalesJoyeria= mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $joyeria = mysqli_fetch_array($totalesJoyeria);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '44'";
    $totalesAgricultura = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $agricultura = mysqli_fetch_array($totalesAgricultura);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '45'";
    $totalesBicimaquinas = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $bicimaquinas = mysqli_fetch_array($totalesBicimaquinas);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '46'";
    $totalesEstilismo = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $estilismo = mysqli_fetch_array($totalesEstilismo);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '47'";
    $totalesDiseñoImagen = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $diseñoImagen = mysqli_fetch_array($totalesDiseñoImagen);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '48'";
    $totalesCodMujeres = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $codMujeres = mysqli_fetch_array($totalesCodMujeres);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '49'";
    $totalesElectronica = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $electronica = mysqli_fetch_array($totalesElectronica);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '50'";
    $totalesCosechaAgua = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $cosechaAgua = mysqli_fetch_array($totalesCosechaAgua);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '51'";
    $totalesInstalacion = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $instalacion = mysqli_fetch_array($totalesInstalacion);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '52'";
    $totalesTExtiles = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $textileDiseño = mysqli_fetch_array($totalesTExtiles);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '53'";
    $totalesBanquetes = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $banquetes = mysqli_fetch_array($totalesBanquetes);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '54'";
    $totalesFotoProducto = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $fotoProducto = mysqli_fetch_array($totalesFotoProducto);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '55'";
    $totalesLogos = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $logos = mysqli_fetch_array($totalesLogos);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '56'";
    $totalesCalidad = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $calidad = mysqli_fetch_array($totalesCalidad);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '57'";
    $totalesCooperativas = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $cooperativas = mysqli_fetch_array($totalesCooperativas);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '58'";
    $totalesEmprende= mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $emprende= mysqli_fetch_array($totalesEmprende);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '59'";
    $totalesMicroN= mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $microN= mysqli_fetch_array($totalesMicroN);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '60'";
    $totalesComercioDigital = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $comercioDigital = mysqli_fetch_array($totalesComercioDigital);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '61'";
    $totalesEstrategias = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $estrategias = mysqli_fetch_array($totalesEstrategias);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '62'";
    $totalesComercioJusto = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $comercioJusto = mysqli_fetch_array($totalesComercioJusto);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '63'";
    $totalesHospedaje = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $hospedaje = mysqli_fetch_array($totalesHospedaje);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '64'";
    $totalesElectronicaDigital = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $electroDigital = mysqli_fetch_array($totalesElectronicaDigital);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '65'";
    $totalesDistribucion= mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $distribucion= mysqli_fetch_array($totalesDistribucion);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '66'";
    $totalesDesarrollo= mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $desarrollo= mysqli_fetch_array($totalesDesarrollo);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '124'";
    $totalesElectronicaBraile = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $braile = mysqli_fetch_array($totalesElectronicaBraile);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '125'";
    $totalesComputacionAsistida= mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $computacionAsistida= mysqli_fetch_array($totalesComputacionAsistida);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '126'";
    $totalesSeñas= mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $señas= mysqli_fetch_array($totalesSeñas);

    
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
              <li><b>Información general</b></li>
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
                  
                  <div class="mr-5"><b>Usuarios totales porintervalo de edad Autonomia economica hombres<span class="float-right"></span></b></div>
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
            <div class="card text-info bg-light o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                  <i class="fab fa-think-peaks"></i>
                  </div>
                  
                  <div class="mr-5"><b>Usuarios totales por Lengua Indigena <span class="float-right"></span></b></div>
                </div>
                <a class="card-footer text-info clearfix small z-1" data-toggle="collapse" href="#collapsePorLengua">
                  <span class="float-left">Ver detalle</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
                <div class="collapse" id="collapsePorLengua">
                  <div class="card card-body">
                    <table class="table table-striped ">
                      <tbody class="bg-light">
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
            <div class="card text-info bg-light o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                  <i class="fas fa-transgender-alt"></i>
                  </div>
                  
                  <div class="mr-5"><b>Usuarios totales por Lengua indigena mujeres<span class="float-right"></span></b></div>
                </div>
                <a class="card-footer text-info clearfix small z-1" data-toggle="collapse" href="#collapsePorGrupoetMujeres1">
                  <span class="float-left">Ver detalle</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
                <div class="collapse" id="collapsePorGrupoetMujeres1">
                  <div class="card card-body">
                    <table class="table table-striped ">
                      <tbody class="bg-light">
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
            <div class="card text-info bg-light o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                  <i class="fas fa-transgender-alt"></i>
                  </div>
                  
                  <div class="mr-5"><b>Usuarios totales por Lengua indigena hombres<span class="float-right"></span></b></div>
                </div>
                <a class="card-footer text-info clearfix small z-1" data-toggle="collapse" href="#collapsePorGrupoetHombres1">
                  <span class="float-left">Ver detalle</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
                <div class="collapse" id="collapsePorGrupoetHombres1">
                  <div class="card card-body">
                    <table class="table table-striped ">
                      <tbody class="bg-light">
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

        <!-- Usuarios totales por Lengua propia -->
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
                          <td><?=$lenguaTotales1['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">CHIMALISTAC</th>
                          <td><?=$lenguaTotales2['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN BARTOLO AMEYALCO</th>
                          <td><?=$lenguaTotales3['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA FÉ DE VASCO DE QUIROGA</th>
                          <td><?=$lenguaTotales4['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA LUCÍA XANTEPEC</th>
                          <td><?=$lenguaTotales5['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA MARÍA NONOALCO</th>
                          <td><?=$lenguaTotales6['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA ROSA XOCHIAC</th>
                          <td><?=$lenguaTotales7['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">TETELPAN</th>
                          <td><?=$lenguaTotales8['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">TIZAPAN</th>
                          <td><?=$lenguaTotales9['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">TLACOPAC</th>
                          <td><?=$lenguaTotales10['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">COLTONGO</th>
                          <td><?=$lenguaTotales11['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN ANDRES DE LAS SALINAS</th>
                          <td><?=$lenguaTotales12['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN ANDRÉS TETLANMAN</th>
                          <td><?=$lenguaTotales13['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN BARTOLO CAHUALTONGO</th>
                          <td><?=$lenguaTotales14['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN FRANCISCO TETECALA</th>
                          <td><?=$lenguaTotales15['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN JUAN TLILHUACA</th>
                          <td><?=$lenguaTotales16['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN LUCAS ATENCO</th>
                          <td><?=$lenguaTotales17['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN MARTIN XOCHINÁHUAC</th>
                          <td><?=$lenguaTotales18['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN MATEO XALTELOLCO</th>
                          <td><?=$lenguaTotales19['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN MIGUEL AMANTLA</th>
                          <td><?=$lenguaTotales20['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN PEDRO DE LAS SALINAS CALHUACATZINGO</th>
                          <td><?=$lenguaTotales21['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN PEDRO XALPA</th>
                          <td><?=$lenguaTotales22['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN SALVADOR NEXTENGO</th>
                          <td><?=$lenguaTotales23['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN SALVADOR XOCHIMANCA</th>
                          <td><?=$lenguaTotales24['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN SEBASTIÁN ATENCO</th>
                          <td><?=$lenguaTotales25['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN SIMÓN POCHTLAN</th>
                          <td><?=$lenguaTotales26['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA APOLONIA TEZCOLCO</th>
                          <td><?=$lenguaTotales27['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA BÁRBARA TETLANMAN, YOPICO</th>
                          <td><?=$lenguaTotales28['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA CATARINA ATZACUALCO</th>
                          <td><?=$lenguaTotales29['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA LUCIA TOMATLAN</th>
                          <td><?=$lenguaTotales30['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA MARÍA MALINALCO</th>
                          <td><?=$lenguaTotales31['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTIAGO AHUIZOTLA</th>
                          <td><?=$lenguaTotales32['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTO DOMINGO HUEXOTITLÁN</th>
                          <td><?=$lenguaTotales33['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTO TOMÁS TLAMATZINGO</th>
                          <td><?=$lenguaTotales34['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">ACTIPAN</th>
                          <td><?=$lenguaTotales35['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">LA PIEDAD</th>
                          <td><?=$lenguaTotales36['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">MIXCOAC</th>
                          <td><?=$lenguaTotales37['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN JUAN MALINALTONGO</th>
                          <td><?=$lenguaTotales38['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN SEBASTIÁN XOCO</th>
                          <td><?=$lenguaTotales39['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN SIMÓN TICUMAC</th>
                          <td><?=$lenguaTotales40['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA CRUZ ATOYAC</th>
                          <td><?=$lenguaTotales41['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA CRUZ TLACOQUEMECATL</th>
                          <td><?=$lenguaTotales42['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA MARÍA NATIVITAS TEPETLALTZINCO</th>
                          <td><?=$lenguaTotales43['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">CHURUBUSCO</th>
                          <td><?=$lenguaTotales44['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">COPILCO</th>
                          <td><?=$lenguaTotales45['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">LA CANDELARIA</th>
                          <td><?=$lenguaTotales46['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">LOS REYES HUEYTILAC</th>
                          <td><?=$lenguaTotales47['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">PUEBLO DE SAN FRANCISCO CULHUACÁN</th>
                          <td><?=$lenguaTotales48['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN PABLO TEPETLAPA</th>
                          <td><?=$lenguaTotales49['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA ÚRSULA COAPA</th>
                          <td><?=$lenguaTotales50['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">CONTADERO</th>
                          <td><?=$lenguaTotales51['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN LORENZO ACOPILCO</th>
                          <td><?=$lenguaTotales52['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN MATEO TLALTENANGO</th>
                          <td><?=$lenguaTotales53['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN PABLO CHIMALPA</th>
                          <td><?=$lenguaTotales54['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN PEDRO CUAJIMALPA</th>
                          <td><?=$lenguaTotales55['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN SIMÓN TOLNAHUAC</th>
                          <td><?=$lenguaTotales56['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">TLATELOLCO</th>
                          <td><?=$lenguaTotales57['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">CALPULTITLAN</th>
                          <td><?=$lenguaTotales58['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">CUAUHTEPEC</th>
                          <td><?=$lenguaTotales59['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">MAGDALENA DE LAS SALINAS</th>
                          <td><?=$lenguaTotales60['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN BARTOLO ATEPEHUACAN</th>
                          <td><?=$lenguaTotales61['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN PEDRO ZACATENCO</th>
                          <td><?=$lenguaTotales62['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA ISABEL TOLA</th>
                          <td><?=$lenguaTotales63['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTIAGO ATEPETLAC</th>
                          <td><?=$lenguaTotales64['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTIAGO ATZACOALCO</th>
                          <td><?=$lenguaTotales65['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA ANITA ZACATLALMANCO </th>
                          <td><?=$lenguaTotales66['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">ACULCO</th>
                          <td><?=$lenguaTotales67['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">CULHUACAN</th>
                          <td><?=$lenguaTotales68['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">LA MAGDALENA ATLAZOLPA</th>
                          <td><?=$lenguaTotales69['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">LOS REYES CULHUACAN</th>
                          <td><?=$lenguaTotales70['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">MEXICALTZINGO</th>
                          <td><?=$lenguaTotales71['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN ANDRÉS TETEPILCO</th>
                          <td><?=$lenguaTotales72['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN ANDRÉS TOMATLAN</th>
                          <td><?=$lenguaTotales73['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN JUANICO NEXTIPAC</th>
                          <td><?=$lenguaTotales74['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN LORENZO TEZONCO</th>
                          <td><?=$lenguaTotales75['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA CRUZ MEYEHUALCO</th>
                          <td><?=$lenguaTotales76['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA MARÍA AZTAHUACAN</th>
                          <td><?=$lenguaTotales77['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA MARÍA TOMATLAN</th>
                          <td><?=$lenguaTotales78['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA MARTHA ACATITLA</th>
                          <td><?=$lenguaTotales79['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">MAGDALENA CONTRERAS ATLICTIC</th>
                          <td><?=$lenguaTotales80['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN BERNABÉ OCOTEPEC</th>
                          <td><?=$lenguaTotales81['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN JERÓNIMO ACULCO-LIDICE</th>
                          <td><?=$lenguaTotales82['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN NICOLÁS TOTOLAPAN</th>
                          <td><?=$lenguaTotales83['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">POPOTLA</th>
                          <td><?=$lenguaTotales84['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN DIEGO OCOYOACAC</th>
                          <td><?=$lenguaTotales85['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN LORENZO TLALTENANGO</th>
                          <td><?=$lenguaTotales86['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">TACUBA</th>
                          <td><?=$lenguaTotales87['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">TACUBAYA</th>
                          <td><?=$lenguaTotales88['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN AGUSTÍN OHTENCO</th>
                          <td><?=$lenguaTotales89['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN ANTONIO TECOMITL</th>
                          <td><?=$lenguaTotales90['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN BARTOLOMÉ XICOMULCO</th>
                          <td><?=$lenguaTotales91['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN FRANCISCO TECOXPA</th>
                          <td><?=$lenguaTotales92['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN JERÓNIMO MIACATLAN</th>
                          <td><?=$lenguaTotales93['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN JUAN TEPENAHUAC</th>
                          <td><?=$lenguaTotales94['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN LORENZO TLACOYUCAN</th>
                          <td><?=$lenguaTotales95['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN PABLO OZTOTEPEC</th>
                          <td><?=$lenguaTotales96['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN PEDRO ATOCPAN</th>
                          <td><?=$lenguaTotales97['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN SALVADOR CUAUHTENCO</th>
                          <td><?=$lenguaTotales98['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA ANA TLACOTENCO</th>
                          <td><?=$lenguaTotales99['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN ANDRÉS MIXQUIC</th>
                          <td><?=$lenguaTotales100['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN FRANCISCO TLALTENCO</th>
                          <td><?=$lenguaTotales101['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN JUAN IXTAYOPAN</th>
                          <td><?=$lenguaTotales102['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN NICOLÁS TETELCO</th>
                          <td><?=$lenguaTotales103['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN PEDRO TLAHUAC</th>
                          <td><?=$lenguaTotales104['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA CATARINA YECAHUIZOTL</th>
                          <td><?=$lenguaTotales105['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTIAGO ZAPOTITLÁN</th>
                          <td><?=$lenguaTotales106['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">CHIMALCOYOC (LA ASUNCIÓN)</th>
                          <td><?=$lenguaTotales107['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">MAGDALENA PETLACALCO</th>
                          <td><?=$lenguaTotales108['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">PARRES EL GUARDA</th>
                          <td><?=$lenguaTotales109['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN ANDRÉS TOTOLTEPEC</th>
                          <td><?=$lenguaTotales110['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN LORENZO HUIPULCO</th>
                          <td><?=$lenguaTotales111['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN MIGUEL AJUSCO</th>
                          <td><?=$lenguaTotales112['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN MIGUEL TOPILEJO</th>
                          <td><?=$lenguaTotales113['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN MIGUEL XICALCO</th>
                          <td><?=$lenguaTotales114['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN PEDRO MÁRTIR</th>
                          <td><?=$lenguaTotales115['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA URSULA XITLA</th>
                          <td><?=$lenguaTotales116['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTO TOMÁS AJUSCO</th>
                          <td><?=$lenguaTotales117['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">EL PEÑÓN DE LOS BAÑOS</th>
                          <td><?=$lenguaTotales118['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">MAGDALENA MIXHIUCA</th>
                          <td><?=$lenguaTotales119['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN ANDRÉS AHUAYUCAN</th>
                          <td><?=$lenguaTotales120['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN FRANCISCO TLALNEPANTLA</th>
                          <td><?=$lenguaTotales121['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN GREGORIO ATLAPULCO</th>
                          <td><?=$lenguaTotales122['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN LORENZO ATEMOAYA</th>
                          <td><?=$lenguaTotales123['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN LUCAS XOCHIMANCA</th>
                          <td><?=$lenguaTotales124['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN LUIS TLAXIALTEMALCO</th>
                          <td><?=$lenguaTotales125['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN MATEO XALPA</th>
                          <td><?=$lenguaTotales126['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA CECILIA TEPETLAPA</th>
                          <td><?=$lenguaTotales127['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA CRUZ ACALPIXCA</th>
                          <td><?=$lenguaTotales130['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA CRUZ XOCHITEPEC</th>
                          <td><?=$lenguaTotales131['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA MARÍA NATIVITAS</th>
                          <td><?=$lenguaTotales132['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA MARÍA TEPEPAN</th>
                          <td><?=$lenguaTotales133['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTIAGO TEPALCATLALPAN</th>
                          <td><?=$lenguaTotales134['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTIAGO TULYEHUALCO</th>
                          <td><?=$lenguaTotales135['userPorPueblo']?></td>
                        </tr>
                        <tr>
                          <th scope="row">NINGUNO</th>
                          <td><?=$lenguaTotales0['userPorPueblo']?></td>
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
                  
                  <div class="mr-5"><b>Usuarios totales por Lengua indigena mujeres<span class="float-right"></span></b></div>
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
                          <td><?=$lenguaTotales1['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">CHIMALISTAC</th>
                          <td><?=$lenguaTotales2['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN BARTOLO AMEYALCO</th>
                          <td><?=$lenguaTotales3['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA FÉ DE VASCO DE QUIROGA</th>
                          <td><?=$lenguaTotales4['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA LUCÍA XANTEPEC</th>
                          <td><?=$lenguaTotales5['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA MARÍA NONOALCO</th>
                          <td><?=$lenguaTotales6['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA ROSA XOCHIAC</th>
                          <td><?=$lenguaTotales7['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">TETELPAN</th>
                          <td><?=$lenguaTotales8['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">TIZAPAN</th>
                          <td><?=$lenguaTotales9['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">TLACOPAC</th>
                          <td><?=$lenguaTotales10['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">COLTONGO</th>
                          <td><?=$lenguaTotales11['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN ANDRES DE LAS SALINAS</th>
                          <td><?=$lenguaTotales12['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN ANDRÉS TETLANMAN</th>
                          <td><?=$lenguaTotales13['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN BARTOLO CAHUALTONGO</th>
                          <td><?=$lenguaTotales14['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN FRANCISCO TETECALA</th>
                          <td><?=$lenguaTotales15['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN JUAN TLILHUACA</th>
                          <td><?=$lenguaTotales16['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN LUCAS ATENCO</th>
                          <td><?=$lenguaTotales17['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN MARTIN XOCHINÁHUAC</th>
                          <td><?=$lenguaTotales18['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN MATEO XALTELOLCO</th>
                          <td><?=$lenguaTotales19['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN MIGUEL AMANTLA</th>
                          <td><?=$lenguaTotales20['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN PEDRO DE LAS SALINAS CALHUACATZINGO</th>
                          <td><?=$lenguaTotales21['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN PEDRO XALPA</th>
                          <td><?=$lenguaTotales22['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN SALVADOR NEXTENGO</th>
                          <td><?=$lenguaTotales23['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN SALVADOR XOCHIMANCA</th>
                          <td><?=$lenguaTotales24['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN SEBASTIÁN ATENCO</th>
                          <td><?=$lenguaTotales25['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN SIMÓN POCHTLAN</th>
                          <td><?=$lenguaTotales26['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA APOLONIA TEZCOLCO</th>
                          <td><?=$lenguaTotales27['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA BÁRBARA TETLANMAN, YOPICO</th>
                          <td><?=$lenguaTotales28['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA CATARINA ATZACUALCO</th>
                          <td><?=$lenguaTotales29['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA LUCIA TOMATLAN</th>
                          <td><?=$lenguaTotales30['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA MARÍA MALINALCO</th>
                          <td><?=$lenguaTotales31['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTIAGO AHUIZOTLA</th>
                          <td><?=$lenguaTotales32['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTO DOMINGO HUEXOTITLÁN</th>
                          <td><?=$lenguaTotales33['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTO TOMÁS TLAMATZINGO</th>
                          <td><?=$lenguaTotales34['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">ACTIPAN</th>
                          <td><?=$lenguaTotales35['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">LA PIEDAD</th>
                          <td><?=$lenguaTotales36['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">MIXCOAC</th>
                          <td><?=$lenguaTotales37['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN JUAN MALINALTONGO</th>
                          <td><?=$lenguaTotales38['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN SEBASTIÁN XOCO</th>
                          <td><?=$lenguaTotales39['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN SIMÓN TICUMAC</th>
                          <td><?=$lenguaTotales40['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA CRUZ ATOYAC</th>
                          <td><?=$lenguaTotales41['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA CRUZ TLACOQUEMECATL</th>
                          <td><?=$lenguaTotales42['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA MARÍA NATIVITAS TEPETLALTZINCO</th>
                          <td><?=$lenguaTotales43['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">CHURUBUSCO</th>
                          <td><?=$lenguaTotales44['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">COPILCO</th>
                          <td><?=$lenguaTotales45['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">LA CANDELARIA</th>
                          <td><?=$lenguaTotales46['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">LOS REYES HUEYTILAC</th>
                          <td><?=$lenguaTotales47['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">PUEBLO DE SAN FRANCISCO CULHUACÁN</th>
                          <td><?=$lenguaTotales48['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN PABLO TEPETLAPA</th>
                          <td><?=$lenguaTotales49['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA ÚRSULA COAPA</th>
                          <td><?=$lenguaTotales50['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">CONTADERO</th>
                          <td><?=$lenguaTotales51['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN LORENZO ACOPILCO</th>
                          <td><?=$lenguaTotales52['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN MATEO TLALTENANGO</th>
                          <td><?=$lenguaTotales53['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN PABLO CHIMALPA</th>
                          <td><?=$lenguaTotales54['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN PEDRO CUAJIMALPA</th>
                          <td><?=$lenguaTotales55['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN SIMÓN TOLNAHUAC</th>
                          <td><?=$lenguaTotales56['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">TLATELOLCO</th>
                          <td><?=$lenguaTotales57['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">CALPULTITLAN</th>
                          <td><?=$lenguaTotales58['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">CUAUHTEPEC</th>
                          <td><?=$lenguaTotales59['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">MAGDALENA DE LAS SALINAS</th>
                          <td><?=$lenguaTotales60['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN BARTOLO ATEPEHUACAN</th>
                          <td><?=$lenguaTotales61['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN PEDRO ZACATENCO</th>
                          <td><?=$lenguaTotales62['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA ISABEL TOLA</th>
                          <td><?=$lenguaTotales63['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTIAGO ATEPETLAC</th>
                          <td><?=$lenguaTotales64['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTIAGO ATZACOALCO</th>
                          <td><?=$lenguaTotales65['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA ANITA ZACATLALMANCO </th>
                          <td><?=$lenguaTotales66['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">ACULCO</th>
                          <td><?=$lenguaTotales67['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">CULHUACAN</th>
                          <td><?=$lenguaTotales68['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">LA MAGDALENA ATLAZOLPA</th>
                          <td><?=$lenguaTotales69['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">LOS REYES CULHUACAN</th>
                          <td><?=$lenguaTotales70['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">MEXICALTZINGO</th>
                          <td><?=$lenguaTotales71['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN ANDRÉS TETEPILCO</th>
                          <td><?=$lenguaTotales72['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN ANDRÉS TOMATLAN</th>
                          <td><?=$lenguaTotales73['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN JUANICO NEXTIPAC</th>
                          <td><?=$lenguaTotales74['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN LORENZO TEZONCO</th>
                          <td><?=$lenguaTotales75['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA CRUZ MEYEHUALCO</th>
                          <td><?=$lenguaTotales76['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA MARÍA AZTAHUACAN</th>
                          <td><?=$lenguaTotales77['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA MARÍA TOMATLAN</th>
                          <td><?=$lenguaTotales78['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA MARTHA ACATITLA</th>
                          <td><?=$lenguaTotales79['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">MAGDALENA CONTRERAS ATLICTIC</th>
                          <td><?=$lenguaTotales80['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN BERNABÉ OCOTEPEC</th>
                          <td><?=$lenguaTotales81['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN JERÓNIMO ACULCO-LIDICE</th>
                          <td><?=$lenguaTotales82['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN NICOLÁS TOTOLAPAN</th>
                          <td><?=$lenguaTotales83['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">POPOTLA</th>
                          <td><?=$lenguaTotales84['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN DIEGO OCOYOACAC</th>
                          <td><?=$lenguaTotales85['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN LORENZO TLALTENANGO</th>
                          <td><?=$lenguaTotales86['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">TACUBA</th>
                          <td><?=$lenguaTotales87['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">TACUBAYA</th>
                          <td><?=$lenguaTotales88['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN AGUSTÍN OHTENCO</th>
                          <td><?=$lenguaTotales89['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN ANTONIO TECOMITL</th>
                          <td><?=$lenguaTotales90['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN BARTOLOMÉ XICOMULCO</th>
                          <td><?=$lenguaTotales91['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN FRANCISCO TECOXPA</th>
                          <td><?=$lenguaTotales92['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN JERÓNIMO MIACATLAN</th>
                          <td><?=$lenguaTotales93['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN JUAN TEPENAHUAC</th>
                          <td><?=$lenguaTotales94['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN LORENZO TLACOYUCAN</th>
                          <td><?=$lenguaTotales95['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN PABLO OZTOTEPEC</th>
                          <td><?=$lenguaTotales96['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN PEDRO ATOCPAN</th>
                          <td><?=$lenguaTotales97['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN SALVADOR CUAUHTENCO</th>
                          <td><?=$lenguaTotales98['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA ANA TLACOTENCO</th>
                          <td><?=$lenguaTotales99['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN ANDRÉS MIXQUIC</th>
                          <td><?=$lenguaTotales100['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN FRANCISCO TLALTENCO</th>
                          <td><?=$lenguaTotales101['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN JUAN IXTAYOPAN</th>
                          <td><?=$lenguaTotales102['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN NICOLÁS TETELCO</th>
                          <td><?=$lenguaTotales103['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN PEDRO TLAHUAC</th>
                          <td><?=$lenguaTotales104['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA CATARINA YECAHUIZOTL</th>
                          <td><?=$lenguaTotales105['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTIAGO ZAPOTITLÁN</th>
                          <td><?=$lenguaTotales106['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">CHIMALCOYOC (LA ASUNCIÓN)</th>
                          <td><?=$lenguaTotales107['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">MAGDALENA PETLACALCO</th>
                          <td><?=$lenguaTotales108['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">PARRES EL GUARDA</th>
                          <td><?=$lenguaTotales109['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN ANDRÉS TOTOLTEPEC</th>
                          <td><?=$lenguaTotales110['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN LORENZO HUIPULCO</th>
                          <td><?=$lenguaTotales111['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN MIGUEL AJUSCO</th>
                          <td><?=$lenguaTotales112['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN MIGUEL TOPILEJO</th>
                          <td><?=$lenguaTotales113['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN MIGUEL XICALCO</th>
                          <td><?=$lenguaTotales114['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN PEDRO MÁRTIR</th>
                          <td><?=$lenguaTotales115['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA URSULA XITLA</th>
                          <td><?=$lenguaTotales116['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTO TOMÁS AJUSCO</th>
                          <td><?=$lenguaTotales117['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">EL PEÑÓN DE LOS BAÑOS</th>
                          <td><?=$lenguaTotales118['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">MAGDALENA MIXHIUCA</th>
                          <td><?=$lenguaTotales119['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN ANDRÉS AHUAYUCAN</th>
                          <td><?=$lenguaTotales120['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN FRANCISCO TLALNEPANTLA</th>
                          <td><?=$lenguaTotales121['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN GREGORIO ATLAPULCO</th>
                          <td><?=$lenguaTotales122['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN LORENZO ATEMOAYA</th>
                          <td><?=$lenguaTotales123['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN LUCAS XOCHIMANCA</th>
                          <td><?=$lenguaTotales124['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN LUIS TLAXIALTEMALCO</th>
                          <td><?=$lenguaTotales125['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN MATEO XALPA</th>
                          <td><?=$lenguaTotales126['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA CECILIA TEPETLAPA</th>
                          <td><?=$lenguaTotales127['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA CRUZ ACALPIXCA</th>
                          <td><?=$lenguaTotales130['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA CRUZ XOCHITEPEC</th>
                          <td><?=$lenguaTotales131['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA MARÍA NATIVITAS</th>
                          <td><?=$lenguaTotales132['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA MARÍA TEPEPAN</th>
                          <td><?=$lenguaTotales133['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTIAGO TEPALCATLALPAN</th>
                          <td><?=$lenguaTotales134['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTIAGO TULYEHUALCO</th>
                          <td><?=$lenguaTotales135['userPorLengua']?></td>
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
            <div class="card text-info bg-light o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                  <i class="fas fa-transgender-alt"></i>
                  </div>
                  
                  <div class="mr-5"><b>Usuarios totales por Lengua indigena hombres<span class="float-right"></span></b></div>
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
                          <td><?=$totalesPueblo1['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">CHIMALISTAC</th>
                          <td><?=$totalesPueblo2['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN BARTOLO AMEYALCO</th>
                          <td><?=$totalesPueblo3['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA FÉ DE VASCO DE QUIROGA</th>
                          <td><?=$totalesPueblo4['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA LUCÍA XANTEPEC</th>
                          <td><?=$totalesPueblo5['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA MARÍA NONOALCO</th>
                          <td><?=$totalesPueblo6['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA ROSA XOCHIAC</th>
                          <td><?=$totalesPueblo7['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">TETELPAN</th>
                          <td><?=$totalesPueblo8['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">TIZAPAN</th>
                          <td><?=$totalesPueblo9['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">TLACOPAC</th>
                          <td><?=$totalesPueblo10['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">COLTONGO</th>
                          <td><?=$totalesPueblo11['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN ANDRES DE LAS SALINAS</th>
                          <td><?=$totalesPueblo12['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN ANDRÉS TETLANMAN</th>
                          <td><?=$totalesPueblo13['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN BARTOLO CAHUALTONGO</th>
                          <td><?=$totalesPueblo14['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN FRANCISCO TETECALA</th>
                          <td><?=$totalesPueblo15['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN JUAN TLILHUACA</th>
                          <td><?=$totalesPueblo16['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN LUCAS ATENCO</th>
                          <td><?=$totalesPueblo17['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN MARTIN XOCHINÁHUAC</th>
                          <td><?=$totalesPueblo18['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN MATEO XALTELOLCO</th>
                          <td><?=$totalesPueblo19['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN MIGUEL AMANTLA</th>
                          <td><?=$totalesPueblo20['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN PEDRO DE LAS SALINAS CALHUACATZINGO</th>
                          <td><?=$totalesPueblo21['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN PEDRO XALPA</th>
                          <td><?=$totalesPueblo22['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN SALVADOR NEXTENGO</th>
                          <td><?=$totalesPueblo23['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN SALVADOR XOCHIMANCA</th>
                          <td><?=$totalesPueblo24['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN SEBASTIÁN ATENCO</th>
                          <td><?=$totalesPueblo25['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN SIMÓN POCHTLAN</th>
                          <td><?=$totalesPueblo26['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA APOLONIA TEZCOLCO</th>
                          <td><?=$totalesPueblo27['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA BÁRBARA TETLANMAN, YOPICO</th>
                          <td><?=$totalesPueblo28['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA CATARINA ATZACUALCO</th>
                          <td><?=$totalesPueblo29['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA LUCIA TOMATLAN</th>
                          <td><?=$totalesPueblo30['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA MARÍA MALINALCO</th>
                          <td><?=$totalesPueblo31['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTIAGO AHUIZOTLA</th>
                          <td><?=$totalesPueblo32['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTO DOMINGO HUEXOTITLÁN</th>
                          <td><?=$totalesPueblo33['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTO TOMÁS TLAMATZINGO</th>
                          <td><?=$totalesPueblo34['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">ACTIPAN</th>
                          <td><?=$totalesPueblo35['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">LA PIEDAD</th>
                          <td><?=$totalesPueblo36['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">MIXCOAC</th>
                          <td><?=$totalesPueblo37['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN JUAN MALINALTONGO</th>
                          <td><?=$totalesPueblo38['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN SEBASTIÁN XOCO</th>
                          <td><?=$totalesPueblo39['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN SIMÓN TICUMAC</th>
                          <td><?=$totalesPueblo40['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA CRUZ ATOYAC</th>
                          <td><?=$totalesPueblo41['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA CRUZ TLACOQUEMECATL</th>
                          <td><?=$totalesPueblo42['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA MARÍA NATIVITAS TEPETLALTZINCO</th>
                          <td><?=$totalesPueblo43['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">CHURUBUSCO</th>
                          <td><?=$totalesPueblo44['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">COPILCO</th>
                          <td><?=$totalesPueblo45['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">LA CANDELARIA</th>
                          <td><?=$totalesPueblo46['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">LOS REYES HUEYTILAC</th>
                          <td><?=$totalesPueblo47['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">PUEBLO DE SAN FRANCISCO CULHUACÁN</th>
                          <td><?=$totalesPueblo48['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN PABLO TEPETLAPA</th>
                          <td><?=$totalesPueblo49['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA ÚRSULA COAPA</th>
                          <td><?=$totalesPueblo50['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">CONTADERO</th>
                          <td><?=$totalesPueblo51['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN LORENZO ACOPILCO</th>
                          <td><?=$totalesPueblo52['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN MATEO TLALTENANGO</th>
                          <td><?=$totalesPueblo53['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN PABLO CHIMALPA</th>
                          <td><?=$totalesPueblo54['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN PEDRO CUAJIMALPA</th>
                          <td><?=$totalesPueblo55['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN SIMÓN TOLNAHUAC</th>
                          <td><?=$totalesPueblo56['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">TLATELOLCO</th>
                          <td><?=$totalesPueblo57['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">CALPULTITLAN</th>
                          <td><?=$totalesPueblo58['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">CUAUHTEPEC</th>
                          <td><?=$totalesPueblo59['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">MAGDALENA DE LAS SALINAS</th>
                          <td><?=$totalesPueblo60['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN BARTOLO ATEPEHUACAN</th>
                          <td><?=$totalesPueblo61['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN PEDRO ZACATENCO</th>
                          <td><?=$totalesPueblo62['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA ISABEL TOLA</th>
                          <td><?=$totalesPueblo63['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTIAGO ATEPETLAC</th>
                          <td><?=$totalesPueblo64['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTIAGO ATZACOALCO</th>
                          <td><?=$totalesPueblo65['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA ANITA ZACATLALMANCO </th>
                          <td><?=$totalesPueblo66['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">ACULCO</th>
                          <td><?=$totalesPueblo67['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">CULHUACAN</th>
                          <td><?=$totalesPueblo68['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">LA MAGDALENA ATLAZOLPA</th>
                          <td><?=$totalesPueblo69['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">LOS REYES CULHUACAN</th>
                          <td><?=$totalesPueblo70['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">MEXICALTZINGO</th>
                          <td><?=$totalesPueblo71['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN ANDRÉS TETEPILCO</th>
                          <td><?=$totalesPueblo72['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN ANDRÉS TOMATLAN</th>
                          <td><?=$totalesPueblo73['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN JUANICO NEXTIPAC</th>
                          <td><?=$totalesPueblo74['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN LORENZO TEZONCO</th>
                          <td><?=$totalesPueblo75['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA CRUZ MEYEHUALCO</th>
                          <td><?=$totalesPueblo76['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA MARÍA AZTAHUACAN</th>
                          <td><?=$totalesPueblo77['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA MARÍA TOMATLAN</th>
                          <td><?=$totalesPueblo78['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA MARTHA ACATITLA</th>
                          <td><?=$totalesPueblo79['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">MAGDALENA CONTRERAS ATLICTIC</th>
                          <td><?=$totalesPueblo80['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN BERNABÉ OCOTEPEC</th>
                          <td><?=$totalesPueblo81['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN JERÓNIMO ACULCO-LIDICE</th>
                          <td><?=$totalesPueblo82['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN NICOLÁS TOTOLAPAN</th>
                          <td><?=$totalesPueblo83['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">POPOTLA</th>
                          <td><?=$totalesPueblo84['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN DIEGO OCOYOACAC</th>
                          <td><?=$totalesPueblo85['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN LORENZO TLALTENANGO</th>
                          <td><?=$totalesPueblo86['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">TACUBA</th>
                          <td><?=$totalesPueblo87['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">TACUBAYA</th>
                          <td><?=$totalesPueblo88['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN AGUSTÍN OHTENCO</th>
                          <td><?=$totalesPueblo89['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN ANTONIO TECOMITL</th>
                          <td><?=$totalesPueblo90['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN BARTOLOMÉ XICOMULCO</th>
                          <td><?=$totalesPueblo91['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN FRANCISCO TECOXPA</th>
                          <td><?=$totalesPueblo92['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN JERÓNIMO MIACATLAN</th>
                          <td><?=$totalesPueblo93['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN JUAN TEPENAHUAC</th>
                          <td><?=$totalesPueblo94['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN LORENZO TLACOYUCAN</th>
                          <td><?=$totalesPueblo95['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN PABLO OZTOTEPEC</th>
                          <td><?=$totalesPueblo96['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN PEDRO ATOCPAN</th>
                          <td><?=$totalesPueblo97['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN SALVADOR CUAUHTENCO</th>
                          <td><?=$totalesPueblo98['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA ANA TLACOTENCO</th>
                          <td><?=$totalesPueblo99['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN ANDRÉS MIXQUIC</th>
                          <td><?=$totalesPueblo100['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN FRANCISCO TLALTENCO</th>
                          <td><?=$totalesPueblo101['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN JUAN IXTAYOPAN</th>
                          <td><?=$totalesPueblo102['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN NICOLÁS TETELCO</th>
                          <td><?=$totalesPueblo103['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN PEDRO TLAHUAC</th>
                          <td><?=$totalesPueblo104['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA CATARINA YECAHUIZOTL</th>
                          <td><?=$totalesPueblo105['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTIAGO ZAPOTITLÁN</th>
                          <td><?=$totalesPueblo106['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">CHIMALCOYOC (LA ASUNCIÓN)</th>
                          <td><?=$totalesPueblo107['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">MAGDALENA PETLACALCO</th>
                          <td><?=$totalesPueblo108['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">PARRES EL GUARDA</th>
                          <td><?=$totalesPueblo109['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN ANDRÉS TOTOLTEPEC</th>
                          <td><?=$totalesPueblo110['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN LORENZO HUIPULCO</th>
                          <td><?=$totalesPueblo111['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN MIGUEL AJUSCO</th>
                          <td><?=$totalesPueblo112['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN MIGUEL TOPILEJO</th>
                          <td><?=$totalesPueblo113['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN MIGUEL XICALCO</th>
                          <td><?=$totalesPueblo114['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN PEDRO MÁRTIR</th>
                          <td><?=$totalesPueblo115['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA URSULA XITLA</th>
                          <td><?=$totalesPueblo116['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTO TOMÁS AJUSCO</th>
                          <td><?=$totalesPueblo117['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">EL PEÑÓN DE LOS BAÑOS</th>
                          <td><?=$totalesPueblo118['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">MAGDALENA MIXHIUCA</th>
                          <td><?=$totalesPueblo119['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN ANDRÉS AHUAYUCAN</th>
                          <td><?=$totalesPueblo120['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN FRANCISCO TLALNEPANTLA</th>
                          <td><?=$totalesPueblo121['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN GREGORIO ATLAPULCO</th>
                          <td><?=$totalesPueblo122['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN LORENZO ATEMOAYA</th>
                          <td><?=$totalesPueblo123['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN LUCAS XOCHIMANCA</th>
                          <td><?=$totalesPueblo124['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN LUIS TLAXIALTEMALCO</th>
                          <td><?=$totalesPueblo125['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SAN MATEO XALPA</th>
                          <td><?=$totalesPueblo126['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA CECILIA TEPETLAPA</th>
                          <td><?=$totalesPueblo127['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA CRUZ ACALPIXCA</th>
                          <td><?=$totalesPueblo130['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA CRUZ XOCHITEPEC</th>
                          <td><?=$totalesPueblo131['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA MARÍA NATIVITAS</th>
                          <td><?=$totalesPueblo132['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTA MARÍA TEPEPAN</th>
                          <td><?=$totalesPueblo133['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTIAGO TEPALCATLALPAN</th>
                          <td><?=$totalesPueblo134['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">SANTIAGO TULYEHUALCO</th>
                          <td><?=$totalesPueblo135['userPorLengua']?></td>
                        </tr>
                        <tr>
                          <th scope="row">NINGUNO</th>
                          <td><?=$totalesPueblo0['userPorLengua']?></td>
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
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
          </div>
        </div>
        <!-- Icon Cards-->
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-music"></i>
                </div>
                
                <div class="mr-5"><b>Cultura <span class="float-right"><?=$culturaTotales['userPorActividad']?></span></b></div>
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
                        <th scope="row">Usuarios totales</th>
                        <td><b><?=$culturaTotales['userPorActividad']?></b></td>
                      </tr>
                      <tr>
                        <th scope="row">Teatro</th>
                        <td><?=$teatro['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Danza</th>
                        <td><?=$danza['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Perfonmance</th>
                        <td><?=$performance['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Música</th>
                        <td><?=$musica['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Artes plásticas</th>
                        <td><?=$artesPlas['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Fotografía</th>
                        <td><?=$fotografia['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Video documental</th>
                        <td><?=$videoDoc['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Stop motion</th>
                        <td><?=$stopMotion['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Arte y biología</th>
                        <td><?=$arteBiolo['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Libroclub</th>
                        <td><?=$libroClub['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Cineclub y trashuma</th>
                        <td><?=$CineTranshu['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Difusión Científica</th>
                        <td><?=$difuCienti['userPorActividad']?></td>
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
                  <i class="fas fa-fw fa-list"></i>
                </div>
                <div class="mr-5"><b>Ciberescuelas <span class="float-right"><?=$ciberEscuelaTotales['userPorActividad']?></span></b></div>
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
                        <th scope="row">Usuarios totales</th>
                        <td><b><?=$ciberEscuelaTotales['userPorActividad']?></b></td>
                      </tr>
                      <tr>
                        <th scope="row">Ajedrez</th>
                        <td><?=$ajedrez['userPorActividad']?></td>
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
                        <th scope="row">Club de Codigo</th>
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
                        <th scope="row">Autoestima</th>
                        <td><?=$autoestima['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Tanatología o manej</th>
                        <td><?=$tanato['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Inteligencia emocio</th>
                        <td><?=$inteliEmo['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Arte y Emociones</th>
                        <td><?=$arteEmo['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Redacción y comprensión de lectura</th>
                        <td><?=$redaccion['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Talleres de cómputo</th>
                        <td><?=$talleresCom['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Emociones mágicas</th>
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
                        <th scope="row">B@UNAM</th>
                        <td><?=$bunam['userPorActividad']?></td>
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
                  <i class="fas fa-fw fa-running"></i>
                </div>
                <div class="mr-5"><b>Deporte <span class="float-right"><?=$deporteTotales['userPorActividad']?></span></b></div>
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
                        <th scope="row">Usuarios totales</th>
                        <td><b><?=$deporteTotales['userPorActividad']?></b></td>
                      </tr>
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
                  <i class="fas fa-fw fa-hand-holding-usd"></i>
                </div>
                <div class="mr-5"><b>Autonomía Económica <span class="float-right"><?=$autonomiaTotales['userPorActividad']?></span></b></div>
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
                        <th scope="row">Usuarios totales</th>
                        <td><strong><?=$autonomiaTotales['userPorActividad']?></strong></td>
                      </tr>
                      <tr>
                        <th scope="row">Encuadernación</th>
                        <td><?=$encuadernacion['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Reciclaje</th>
                        <td><?=$reciclaje['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Taller de huerto</th>
                        <td><?=$huerto['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Cerámica</th>
                        <td><?=$ceramica['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Programación y Apli</th>
                        <td><?=$programacion['userPorActividad']?></td>
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
                        <th scope="row">Herrería y Aluminer</th>
                        <td><?=$herreria['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Electricidad y dispositivos fotovoltaicos</th>
                        <td><?=$electricidad['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Gastronomía, panadería y catering</th>
                        <td><?=$gastronomia['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Panadería</th>
                        <td><?=$panaderia['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Joyería y accesorio </th>
                        <td><?=$joyeria['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Agricultura urbana</th>
                        <td><?=$agricultura['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Bicimaquinas</th>
                        <td><?=$bicimaquinas['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Estilismo</th>
                        <td><?=$estilismo['userPorActividad']?></td>
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
                        <th scope="row">Cosecha de agua de</th>
                        <td><?=$cosechaAgua['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Instalación y repar</th>
                        <td><?=$instalacion['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Textiles y diseño</th>
                        <td><?=$textileDiseño['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Banquetes</th>
                        <td><?=$banquetes['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Fotografia de produ</th>
                        <td><?=$fotoProducto['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Logos e identidad d</th>
                        <td><?=$logos['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Calidad en el servi</th>
                        <td><?=$calidad['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Creación de coopera</th>
                        <td><?=$cooperativas['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Emprendedurismo</th>
                        <td><?=$emprende['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Creación de micro-n</th>
                        <td><?=$microN['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Comercio digital</th>
                        <td><?=$comercioDigital['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Estrategias de vent</th>
                        <td><?=$estrategias['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Comercio justo</th>
                        <td><?=$comercioJusto['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Hospedaje</th>
                        <td><?=$hospedaje['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Electrónica digital</th>
                        <td><?=$electroDigital['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Distribución</th>
                        <td><?=$distribucion['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Desarrollo web</th>
                        <td><?=$desarrollo['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Braile</th>
                        <td><?=$braile['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Computación asistida</th>
                        <td><?=$computacionAsistida['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Introducción al lenguaje de señas</th>
                        <td><?=$señas['userPorActividad']?></td>
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
