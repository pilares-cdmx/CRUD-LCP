
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
    $usuariosPorPilar4="SELECT COUNT(Usuario_idUsuarios) AS usuarioPorPilar FROM UsuariosPorPilar WHERE Pilares_Direccion_Colonias_Alcaldias_Zonas_idZonas = '2' AND Pilares_idPilares = '4'";
    $result4 = mysqli_query($con, $usuariosPorPilar4);

    $usuariosPorPilar11="SELECT COUNT(Usuario_idUsuarios) AS usuarioPorPilar FROM UsuariosPorPilar WHERE Pilares_Direccion_Colonias_Alcaldias_Zonas_idZonas = '2' AND Pilares_idPilares = '11'";
    $result11 = mysqli_query($con, $usuariosPorPilar11);

    $usuariosPorPilar12="SELECT COUNT(Usuario_idUsuarios) AS usuarioPorPilar FROM UsuariosPorPilar WHERE Pilares_Direccion_Colonias_Alcaldias_Zonas_idZonas = '2' AND Pilares_idPilares = '12'";
    $result12 = mysqli_query($con, $usuariosPorPilar12);

    $usuariosPorPilar13="SELECT COUNT(Usuario_idUsuarios) AS usuarioPorPilar FROM UsuariosPorPilar WHERE Pilares_Direccion_Colonias_Alcaldias_Zonas_idZonas = '2' AND Pilares_idPilares = '13'";
    $result13 = mysqli_query($con, $usuariosPorPilar13);


    $dataUsuariosPilaresNorte = array();
    foreach ($result4 as $row) {
      $dataUsuariosPilaresNorte[] = $row;
    }

    foreach ($result11 as $row) {
      array_push($dataUsuariosPilaresNorte, $row);
    }

    foreach ($result12 as $row) {
      array_push($dataUsuariosPilaresNorte, $row);
    }
    foreach ($result13 as $row) {
      array_push($dataUsuariosPilaresNorte, $row);
    }

    $result4->close();
    $result11->close();
    $result12->close();
    $result13->close();


    //close connection
    $con->close();

    //now print the data
    //var_dump($dataUsuariosPorPilar);die;
    print json_encode($dataUsuariosPilaresNorte);
    ?>
