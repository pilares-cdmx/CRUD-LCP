
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
    $usuariosPorPilar8="SELECT COUNT(Usuario_idUsuarios) AS usuarioPorPilar FROM UsuariosPorPilar WHERE Pilares_Direccion_Colonias_Alcaldias_Zonas_idZonas = '6' AND Pilares_idPilares = '8'";
    $result8 = mysqli_query($con, $usuariosPorPilar8);

    $usuariosPorPilar9="SELECT COUNT(Usuario_idUsuarios) AS usuarioPorPilar FROM UsuariosPorPilar WHERE Pilares_Direccion_Colonias_Alcaldias_Zonas_idZonas = '6' AND Pilares_idPilares = '9'";
    $result9 = mysqli_query($con, $usuariosPorPilar9);

    $usuariosPorPilar10="SELECT COUNT(Usuario_idUsuarios) AS usuarioPorPilar FROM UsuariosPorPilar WHERE Pilares_Direccion_Colonias_Alcaldias_Zonas_idZonas = '6' AND Pilares_idPilares = '10'";
    $result10 = mysqli_query($con, $usuariosPorPilar10);

    $usuariosPorPilar14="SELECT COUNT(Usuario_idUsuarios) AS usuarioPorPilar FROM UsuariosPorPilar WHERE Pilares_Direccion_Colonias_Alcaldias_Zonas_idZonas = '6' AND Pilares_idPilares = '14'";
    $result14 = mysqli_query($con, $usuariosPorPilar14);

    $usuariosPorPilar15="SELECT COUNT(Usuario_idUsuarios) AS usuarioPorPilar FROM UsuariosPorPilar WHERE Pilares_Direccion_Colonias_Alcaldias_Zonas_idZonas = '6' AND Pilares_idPilares = '15'";
    $result15 = mysqli_query($con, $usuariosPorPilar15);

    $dataUsuariosPilaresCentroOriente = array();
    foreach ($result8 as $row) {
      $dataUsuariosPilaresCentroOriente[] = $row;
    }

    foreach ($result9 as $row) {
      array_push($dataUsuariosPilaresCentroOriente, $row);
    }

    foreach ($result10 as $row) {
      array_push($dataUsuariosPilaresCentroOriente, $row);
    }

    foreach ($result14 as $row) {
      array_push($dataUsuariosPilaresCentroOriente, $row);
    }

    foreach ($result15 as $row) {
      array_push($dataUsuariosPilaresCentroOriente, $row);
    }

    $result8->close();
    $result9->close();
    $result10->close();
    $result14->close();
    $result15->close();




    //close connection
    $con->close();

    //now print the data
    //var_dump($dataUsuariosPorPilar);die;
    print json_encode($dataUsuariosPilaresCentroOriente);
    ?>
