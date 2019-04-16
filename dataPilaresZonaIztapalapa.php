
<?php

ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

    //$q = intval($_GET['q']);

    header('Content-Type: application/json');
    $con = mysqli_connect('localhost', 'pilaresDevSergio', '%C2MB10cl1m2t1c0%', 'pilaresDB');
        if (!$con) {
            die('Could not connect: ' . mysqli_error($con));
        }

    mysqli_select_db($con, "pilaresDB");
    mysqli_query($con, "SET NAMES 'utf8mb4'");
//select count(Usuario_idUsuarios) from UsuariosPorPilar where Pilares_Direccion_Colonias_Alcaldias_Zonas_idZonas = '1' and Pilares_idPilares = '1';
    $usuariosPorPilar16="SELECT COUNT(Usuario_idUsuarios) AS usuarioPorPilar FROM UsuariosPorPilar WHERE Pilares_Direccion_Colonias_Alcaldias_Zonas_idZonas = '3' AND Pilares_idPilares = '16'";
    $result16 = mysqli_query($con, $usuariosPorPilar16);

    $usuariosPorPilar17="SELECT COUNT(Usuario_idUsuarios) AS usuarioPorPilar FROM UsuariosPorPilar WHERE Pilares_Direccion_Colonias_Alcaldias_Zonas_idZonas = '3' AND Pilares_idPilares = '17'";
    $result17 = mysqli_query($con, $usuariosPorPilar17);

    $usuariosPorPilar18="SELECT COUNT(Usuario_idUsuarios) AS usuarioPorPilar FROM UsuariosPorPilar WHERE Pilares_Direccion_Colonias_Alcaldias_Zonas_idZonas = '3' AND Pilares_idPilares = '18'";
    $result18 = mysqli_query($con, $usuariosPorPilar18);

    $usuariosPorPilar19="SELECT COUNT(Usuario_idUsuarios) AS usuarioPorPilar FROM UsuariosPorPilar WHERE Pilares_Direccion_Colonias_Alcaldias_Zonas_idZonas = '3' AND Pilares_idPilares = '19'";
    $result19 = mysqli_query($con, $usuariosPorPilar19);


    $dataUsuariosPilaresIztapalapa = array();
    foreach ($result16 as $row) {
      $dataUsuariosPilaresIztapalapa[] = $row;
    }

    foreach ($result17 as $row) {
      array_push($dataUsuariosPilaresIztapalapa, $row);
    }

    foreach ($result18 as $row) {
      array_push($dataUsuariosPilaresIztapalapa, $row);
    }
    foreach ($result19 as $row) {
      array_push($dataUsuariosPilaresIztapalapa, $row);
    }

    $result16->close();
    $result17->close();
    $result18->close();
    $result19->close();


    //close connection
    $con->close();

    //now print the data
    //var_dump($dataUsuariosPorPilar);die;
    print json_encode($dataUsuariosPilaresIztapalapa);
    ?>
