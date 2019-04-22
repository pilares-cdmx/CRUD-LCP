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

    $dia1="SELECT COUNT(fechaDeRegistro) AS fecha FROM Usuario WHERE fechaDeRegistro LIKE '%2019-04-01%'";
    $result1 = mysqli_query($con, $dia1);

    $dia2="SELECT COUNT(fechaDeRegistro) AS fecha FROM Usuario WHERE fechaDeRegistro LIKE '%2019-04-02%'";
    $result2 = mysqli_query($con, $dia2);

    $dia3="SELECT COUNT(fechaDeRegistro) AS fecha FROM Usuario WHERE fechaDeRegistro LIKE '%2019-04-03%'";
    $result3 = mysqli_query($con, $dia3);

    $dia4="SELECT COUNT(fechaDeRegistro) AS fecha FROM Usuario WHERE fechaDeRegistro LIKE '%2019-04-04%'";
    $result4 = mysqli_query($con, $dia4);

    $dia5="SELECT COUNT(fechaDeRegistro) AS fecha FROM Usuario WHERE fechaDeRegistro LIKE '%2019-04-05%'";
    $result5 = mysqli_query($con, $dia5);

    $dia6="SELECT COUNT(fechaDeRegistro) AS fecha FROM Usuario WHERE fechaDeRegistro LIKE '%2019-04-06%'";
    $result6 = mysqli_query($con, $dia6);

    $dia7="SELECT COUNT(fechaDeRegistro) AS fecha FROM Usuario WHERE fechaDeRegistro LIKE '%2019-04-07%'";
    $result7 = mysqli_query($con, $dia7);

    $dia8="SELECT COUNT(fechaDeRegistro) AS fecha FROM Usuario WHERE fechaDeRegistro LIKE '%2019-04-08%'";
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

    $dia16="SELECT COUNT(fechaDeRegistro) AS fecha FROM Usuario WHERE fechaDeRegistro LIKE '%2019-04-16%'";
    $result16 = mysqli_query($con, $dia16);

    $dia17="SELECT COUNT(fechaDeRegistro) AS fecha FROM Usuario WHERE fechaDeRegistro LIKE '%2019-04-17%'";
    $result17 = mysqli_query($con, $dia17);

    $dia18="SELECT COUNT(fechaDeRegistro) AS fecha FROM Usuario WHERE fechaDeRegistro LIKE '%2019-04-18%'";
    $result18 = mysqli_query($con, $dia18);

    $dia19="SELECT COUNT(fechaDeRegistro) AS fecha FROM Usuario WHERE fechaDeRegistro LIKE '%2019-04-19%'";
    $result19 = mysqli_query($con, $dia19);

    $dia20="SELECT COUNT(fechaDeRegistro) AS fecha FROM Usuario WHERE fechaDeRegistro LIKE '%2019-04-20%'";
    $result20 = mysqli_query($con, $dia20);

    $dia21="SELECT COUNT(fechaDeRegistro) AS fecha FROM Usuario WHERE fechaDeRegistro LIKE '%2019-04-21%'";
    $result21 = mysqli_query($con, $dia21);

    $dia22="SELECT COUNT(fechaDeRegistro) AS fecha FROM Usuario WHERE fechaDeRegistro LIKE '%2019-04-22%'";
    $result22 = mysqli_query($con, $dia22);

    $data = array();
    foreach ($result1 as $row) {
      $data[] = $row;
    }
    foreach ($result2 as $row) {
      array_push($data, $row);
    }
    foreach ($result3 as $row) {
      array_push($data, $row);
    }
    foreach ($result4 as $row) {
      array_push($data, $row);
    }
    foreach ($result5 as $row) {
      array_push($data, $row);
    }
    foreach ($result6 as $row) {
      array_push($data, $row);
    }
    foreach ($result7 as $row) {
      array_push($data, $row);
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
    foreach ($result16 as $row) {
      array_push($data, $row);
    }
    foreach ($result17 as $row) {
      array_push($data, $row);
    }
    foreach ($result18 as $row) {
      array_push($data, $row);
    }
    foreach ($result19 as $row) {
      array_push($data, $row);
    }
    foreach ($result20 as $row) {
      array_push($data, $row);
    }
    foreach ($result21 as $row) {
      array_push($data, $row);
    }
    foreach ($result22 as $row) {
      array_push($data, $row);
    }



    //free memory associated with result
    $result3->close();
    $result4->close();
    $result5->close();
    $result6->close();
    $result7->close();
    $result8->close();
    $result9->close();
    $result10->close();
    $result11->close();
    $result12->close();
    $result13->close();
    $result14->close();
    $result15->close();
    $result16->close();
    $result17->close();

    //close connection
    $con->close();

    //now print the data
    print json_encode($data);

?>
