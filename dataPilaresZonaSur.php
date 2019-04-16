
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
    $usuariosPorPilar22="SELECT COUNT(Usuario_idUsuarios) AS usuarioPorPilar FROM UsuariosPorPilar WHERE Pilares_Direccion_Colonias_Alcaldias_Zonas_idZonas = '5' AND Pilares_idPilares = '22'";
    $result22 = mysqli_query($con, $usuariosPorPilar22);

    $usuariosPorPilar23="SELECT COUNT(Usuario_idUsuarios) AS usuarioPorPilar FROM UsuariosPorPilar WHERE Pilares_Direccion_Colonias_Alcaldias_Zonas_idZonas = '5' AND Pilares_idPilares = '23'";
    $result23 = mysqli_query($con, $usuariosPorPilar23);

    $usuariosPorPilar24="SELECT COUNT(Usuario_idUsuarios) AS usuarioPorPilar FROM UsuariosPorPilar WHERE Pilares_Direccion_Colonias_Alcaldias_Zonas_idZonas = '5' AND Pilares_idPilares = '24'";
    $result24 = mysqli_query($con, $usuariosPorPilar24);

    $usuariosPorPilar26="SELECT COUNT(Usuario_idUsuarios) AS usuarioPorPilar FROM UsuariosPorPilar WHERE Pilares_Direccion_Colonias_Alcaldias_Zonas_idZonas = '5' AND Pilares_idPilares = '26'";
    $result26 = mysqli_query($con, $usuariosPorPilar26);

    $usuariosPorPilar27="SELECT COUNT(Usuario_idUsuarios) AS usuarioPorPilar FROM UsuariosPorPilar WHERE Pilares_Direccion_Colonias_Alcaldias_Zonas_idZonas = '5' AND Pilares_idPilares = '27'";
    $result27 = mysqli_query($con, $usuariosPorPilar27);

    $dataUsuariosPilaresSur = array();
    foreach ($result22 as $row) {
      $dataUsuariosPilaresSur[] = $row;
    }

    foreach ($result23 as $row) {
      array_push($dataUsuariosPilaresSur, $row);
    }

    foreach ($result24 as $row) {
      array_push($dataUsuariosPilaresSur, $row);
    }

    foreach ($result26 as $row) {
      array_push($dataUsuariosPilaresSur, $row);
    }

    foreach ($result27 as $row) {
      array_push($dataUsuariosPilaresSur, $row);
    }

    $result22->close();
    $result23->close();
    $result24->close();
    $result26->close();
    $result27->close();



    //close connection
    $con->close();

    //now print the data
    //var_dump($dataUsuariosPorPilar);die;
    print json_encode($dataUsuariosPilaresSur);
    ?>
