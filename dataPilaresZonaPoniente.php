
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
    $usuariosPorPilar1="SELECT COUNT(Usuario_idUsuarios) AS usuarioPorPilar FROM UsuariosPorPilar WHERE Pilares_Direccion_Colonias_Alcaldias_Zonas_idZonas = '1' AND Pilares_idPilares = '1'";
    $result1 = mysqli_query($con, $usuariosPorPilar1);

    $usuariosPorPilar2="SELECT COUNT(Usuario_idUsuarios) AS usuarioPorPilar FROM UsuariosPorPilar WHERE Pilares_Direccion_Colonias_Alcaldias_Zonas_idZonas = '1' AND Pilares_idPilares = '2'";
    $result2 = mysqli_query($con, $usuariosPorPilar2);

    $usuariosPorPilar3="SELECT COUNT(Usuario_idUsuarios) AS usuarioPorPilar FROM UsuariosPorPilar WHERE Pilares_Direccion_Colonias_Alcaldias_Zonas_idZonas = '1' AND Pilares_idPilares = '3'";
    $result3 = mysqli_query($con, $usuariosPorPilar3);

    $usuariosPorPilar7="SELECT COUNT(Usuario_idUsuarios) AS usuarioPorPilar FROM UsuariosPorPilar WHERE Pilares_Direccion_Colonias_Alcaldias_Zonas_idZonas = '1' AND Pilares_idPilares = '7'";
    $result7 = mysqli_query($con, $usuariosPorPilar7);

    $usuariosPorPilar21="SELECT COUNT(Usuario_idUsuarios) AS usuarioPorPilar FROM UsuariosPorPilar WHERE Pilares_Direccion_Colonias_Alcaldias_Zonas_idZonas = '1' AND Pilares_idPilares = '21'";
    $result21 = mysqli_query($con, $usuariosPorPilar21);

    $dataUsuariosPilaresPoniente = array();
    foreach ($result1 as $row) {
      $dataUsuariosPilaresPoniente[] = $row;
    }

    foreach ($result2 as $row) {
      array_push($dataUsuariosPilaresPoniente, $row);
    }

    foreach ($result3 as $row) {
      array_push($dataUsuariosPilaresPoniente, $row);
    }
    foreach ($result7 as $row) {
      array_push($dataUsuariosPilaresPoniente, $row);
    }
    foreach ($result21 as $row) {
      array_push($dataUsuariosPilaresPoniente, $row);
    }

    $result1->close();
    $result2->close();
    $result3->close();
    $result7->close();
    $result21->close();

    //close connection
    $con->close();

    //now print the data
    //var_dump($dataUsuariosPorPilar);die;
    print json_encode($dataUsuariosPilaresPoniente);
    ?>
