<?php require 'views/layout/headerCRUD-jud.php'; ?>
<?php
  if (isset($_SESSION['pilarAsignado'])) {
    $nombrePilar = $_SESSION['pilarAsignado'];
    $separador = "-";
    $idPilarLCP = $_SESSION['identity']->Pilares_idPilares;
  }

    // $con = mysqli_connect('localhost', 'francisco', 'tu_contrasena', 'pilaresDB');
    $con = mysqli_connect('localhost', 'root', '', 'pilaresDB');
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
