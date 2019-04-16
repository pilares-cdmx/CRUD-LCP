
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
    $usuariosPorPilar5="SELECT COUNT(Usuario_idUsuarios) AS usuarioPorPilar FROM UsuariosPorPilar WHERE Pilares_Direccion_Colonias_Alcaldias_Zonas_idZonas = '4' AND Pilares_idPilares = '5'";
    $result5 = mysqli_query($con, $usuariosPorPilar5);

    $usuariosPorPilar6="SELECT COUNT(Usuario_idUsuarios) AS usuarioPorPilar FROM UsuariosPorPilar WHERE Pilares_Direccion_Colonias_Alcaldias_Zonas_idZonas = '4' AND Pilares_idPilares = '6'";
    $result6 = mysqli_query($con, $usuariosPorPilar6);

    $usuariosPorPilar20="SELECT COUNT(Usuario_idUsuarios) AS usuarioPorPilar FROM UsuariosPorPilar WHERE Pilares_Direccion_Colonias_Alcaldias_Zonas_idZonas = '4' AND Pilares_idPilares = '20'";
    $result20 = mysqli_query($con, $usuariosPorPilar20);

    $dataUsuariosPilaresIztapalapa = array();
    foreach ($result5 as $row) {
      $dataUsuariosPilaresSurPoniente[] = $row;
    }

    foreach ($result6 as $row) {
      array_push($dataUsuariosPilaresSurPoniente, $row);
    }

    foreach ($result20 as $row) {
      array_push($dataUsuariosPilaresSurPoniente, $row);
    }

    $result5->close();
    $result6->close();
    $result20->close();
    


    //close connection
    $con->close();

    //now print the data
    //var_dump($dataUsuariosPorPilar);die;
    print json_encode($dataUsuariosPilaresSurPoniente);
    ?>
