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

    $usuariosPorTipoAct1="SELECT COUNT(*) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_TiposActividades_idTiposActividades = '1'";
    $resultZona1 = mysqli_query($con, $usuariosPorTipoAct1);

    $usuariosPorTipoAct2="SELECT COUNT(*) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_TiposActividades_idTiposActividades = '2'";
    $resultZona2 = mysqli_query($con, $usuariosPorTipoAct2);

    $usuariosPorTipoAct3="SELECT COUNT(*) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_TiposActividades_idTiposActividades = '3'";
    $resultZona3 = mysqli_query($con, $usuariosPorTipoAct3);

    $usuariosPorTipoAct4="SELECT COUNT(*) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_TiposActividades_idTiposActividades = '4'";
    $resultZona4 = mysqli_query($con, $usuariosPorTipoAct4);

    $dataActividades = array();
    foreach ($resultZona1 as $row) {
      $dataActividades[] = $row;
    }
    foreach ($resultZona3 as $row) {
      array_push($dataActividades, $row);
    }
    foreach ($resultZona4 as $row) {
      array_push($dataActividades, $row);
    }
    foreach ($resultZona2 as $row) {
      array_push($dataActividades, $row);
    }

    $resultZona1->close();
    $resultZona3->close();
    $resultZona4->close();
    $resultZona2->close();

    //close connection
    $con->close();

    //now print the data

    print json_encode($dataActividades);

?>
