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
    $dia7="SELECT COUNT(fechaDeRegistro) AS fecha FROM Usuario WHERE fechaDeRegistro LIKE '%2019-04-07%'";
    $result7 = mysqli_query($con, $dia7);

    $dia8="SELECT COUNT(fechaDeRegistro) AS fecha FROM Usuario WHERE fechaDeRegistro LIKE '%2019-04-%08'";
    $result8 = mysqli_query($con, $dia8);

    $dia9="SELECT COUNT(fechaDeRegistro) AS fecha FROM Usuario WHERE fechaDeRegistro LIKE '%2019-04-09%'";
    $result9 = mysqli_query($con, $dia9);

    $dia10="SELECT COUNT(fechaDeRegistro) AS fecha FROM Usuario WHERE fechaDeRegistro LIKE '%2019-04-10%'";
    $result10 = mysqli_query($con, $dia10);

    $dia11="SELECT COUNT(fechaDeRegistro) AS fecha FROM Usuario WHERE fechaDeRegistro LIKE '%2019-04-11%'";
    $result11 = mysqli_query($con, $dia11);

    $dia12="SELECT COUNT(fechaDeRegistro) AS fecha FROM Usuario WHERE fechaDeRegistro LIKE '%2019-04-12%'";
    $result12 = mysqli_query($con, $dia12);

    $dia13="SELECT COUNT(fechaDeRegistro) AS fecha FROM Usuario WHERE fechaDeRegistro LIKE '%2019-04-13%'";
    $result13 = mysqli_query($con, $dia13);

    $dia14="SELECT COUNT(fechaDeRegistro) AS fecha FROM Usuario WHERE fechaDeRegistro LIKE '%2019-04-14%'";
    $result14 = mysqli_query($con, $dia14);

    $dia15="SELECT COUNT(fechaDeRegistro) AS fecha FROM Usuario WHERE fechaDeRegistro LIKE '%2019-04-15%'";
    $result15 = mysqli_query($con, $dia15);

    $data = array();
    foreach ($result7 as $row) {
      $data[] = $row;
    }
    foreach ($result8 as $row) {
      array_push($data, $row);
    }
    foreach ($result9 as $row) {
      array_push($data, $row);
    }
    foreach ($result10 as $row) {
      array_push($data, $row);
    }
    foreach ($result11 as $row) {
      array_push($data, $row);
    }
    foreach ($result12 as $row) {
      array_push($data, $row);
    }
    foreach ($result13 as $row) {
      array_push($data, $row);
    }
    foreach ($result14 as $row) {
      array_push($data, $row);
    }
    foreach ($result15 as $row) {
      array_push($data, $row);
    }



    //free memory associated with result
    $result7->close();
    $result8->close();
    $result9->close();
    $result10->close();
    $result11->close();
    $result12->close();
    $result13->close();
    $result14->close();
    $result15->close();

    //close connection
    $con->close();

    //now print the data
    print json_encode($data);

?>
