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


        $usuariosPorZona1="SELECT COUNT(*) AS userPorZona FROM Usuario WHERE Direccion_Colonias_Alcaldias_Zonas_idZonas = '1'";
        $resultZona1 = mysqli_query($con, $usuariosPorZona1);

        $usuariosPorZona2="SELECT COUNT(*) AS userPorZona FROM Usuario WHERE Direccion_Colonias_Alcaldias_Zonas_idZonas = '2'";
        $resultZona2 = mysqli_query($con, $usuariosPorZona2);

        $usuariosPorZona3="SELECT COUNT(*) AS userPorZona FROM Usuario WHERE Direccion_Colonias_Alcaldias_Zonas_idZonas = '3'";
        $resultZona3 = mysqli_query($con, $usuariosPorZona3);

        $usuariosPorZona4="SELECT COUNT(*) AS userPorZona FROM Usuario WHERE Direccion_Colonias_Alcaldias_Zonas_idZonas = '4'";
        $resultZona4 = mysqli_query($con, $usuariosPorZona4);

        $usuariosPorZona5="SELECT COUNT(*) AS userPorZona FROM Usuario WHERE Direccion_Colonias_Alcaldias_Zonas_idZonas = '5'";
        $resultZona5 = mysqli_query($con, $usuariosPorZona5);

        $usuariosPorZona6="SELECT COUNT(*) AS userPorZona FROM Usuario WHERE Direccion_Colonias_Alcaldias_Zonas_idZonas = '6'";
        $resultZona6 = mysqli_query($con, $usuariosPorZona6);


        $dataZona = array();
        foreach ($resultZona1 as $row) {
          $dataZona[] = $row;
        }
        foreach ($resultZona2 as $row) {
          array_push($dataZona, $row);
        }
        foreach ($resultZona3 as $row) {
          array_push($dataZona, $row);
        }
        foreach ($resultZona4 as $row) {
          array_push($dataZona, $row);
        }
        foreach ($resultZona5 as $row) {
          array_push($dataZona, $row);
        }
        foreach ($resultZona6 as $row) {
          array_push($dataZona, $row);
        }
        $resultZona1->close();
        $resultZona2->close();
        $resultZona3->close();
        $resultZona4->close();
        $resultZona5->close();
        $resultZona6->close();
        //close connection
        $con->close();

        //now print the data

        print json_encode($dataZona);

?>
