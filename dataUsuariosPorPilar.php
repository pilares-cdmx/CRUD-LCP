
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

// select count(Usuario_idUsuarios) from UsuariosPorPilar where Pilares_idPilares = '2';
        $usuariosPorPilar1="SELECT COUNT(Usuario_idUsuarios) AS usuarioPorPilar FROM UsuariosPorPilar WHERE Pilares_idPilares = '1'";
        $result1 = mysqli_query($con, $usuariosPorPilar1);

        $usuariosPorPilar2="SELECT COUNT(Usuario_idUsuarios) AS usuarioPorPilar FROM UsuariosPorPilar WHERE Pilares_idPilares = '2'";
        $result2 = mysqli_query($con, $usuariosPorPilar2);

        $usuariosPorPilar3="SELECT COUNT(Usuario_idUsuarios) AS usuarioPorPilar FROM UsuariosPorPilar WHERE Pilares_idPilares = '3'";
        $result3 = mysqli_query($con, $usuariosPorPilar3);
        $usuariosPorPilar4="SELECT COUNT(Usuario_idUsuarios) AS usuarioPorPilar FROM UsuariosPorPilar WHERE Pilares_idPilares = '4'";
        $result4 = mysqli_query($con, $usuariosPorPilar4);
        $usuariosPorPilar5="SELECT COUNT(Usuario_idUsuarios) AS usuarioPorPilar FROM UsuariosPorPilar WHERE Pilares_idPilares = '5'";
        $result5 = mysqli_query($con, $usuariosPorPilar5);
        $usuariosPorPilar6="SELECT COUNT(Usuario_idUsuarios) AS usuarioPorPilar FROM UsuariosPorPilar WHERE Pilares_idPilares = '6'";
        $result6 = mysqli_query($con, $usuariosPorPilar6);
        $usuariosPorPilar7="SELECT COUNT(Usuario_idUsuarios) AS usuarioPorPilar FROM UsuariosPorPilar WHERE Pilares_idPilares = '7'";
        $result7 = mysqli_query($con, $usuariosPorPilar7);
        $usuariosPorPilar8="SELECT COUNT(Usuario_idUsuarios) AS usuarioPorPilar FROM UsuariosPorPilar WHERE Pilares_idPilares = '8'";
        $result8 = mysqli_query($con, $usuariosPorPilar8);
        $usuariosPorPilar9="SELECT COUNT(Usuario_idUsuarios) AS usuarioPorPilar FROM UsuariosPorPilar WHERE Pilares_idPilares = '9'";
        $result9 = mysqli_query($con, $usuariosPorPilar9);
        $usuariosPorPilar10="SELECT COUNT(Usuario_idUsuarios) AS usuarioPorPilar FROM UsuariosPorPilar WHERE Pilares_idPilares = '10'";
        $result10 = mysqli_query($con, $usuariosPorPilar10);

        $usuariosPorPilar11="SELECT COUNT(Usuario_idUsuarios) AS usuarioPorPilar FROM UsuariosPorPilar WHERE Pilares_idPilares = '11'";
        $result11 = mysqli_query($con, $usuariosPorPilar11);
        $usuariosPorPilar12="SELECT COUNT(Usuario_idUsuarios) AS usuarioPorPilar FROM UsuariosPorPilar WHERE Pilares_idPilares = '12'";
        $result12 = mysqli_query($con, $usuariosPorPilar12);
        $usuariosPorPilar13="SELECT COUNT(Usuario_idUsuarios) AS usuarioPorPilar FROM UsuariosPorPilar WHERE Pilares_idPilares = '13'";
        $result13 = mysqli_query($con, $usuariosPorPilar13);
        $usuariosPorPilar14="SELECT COUNT(Usuario_idUsuarios) AS usuarioPorPilar FROM UsuariosPorPilar WHERE Pilares_idPilares = '14'";
        $result14 = mysqli_query($con, $usuariosPorPilar14);
        $usuariosPorPilar15="SELECT COUNT(Usuario_idUsuarios) AS usuarioPorPilar FROM UsuariosPorPilar WHERE Pilares_idPilares = '15'";
        $result15 = mysqli_query($con, $usuariosPorPilar15);

        $usuariosPorPilar16="SELECT COUNT(Usuario_idUsuarios) AS usuarioPorPilar FROM UsuariosPorPilar WHERE Pilares_idPilares = '16'";
        $result16 = mysqli_query($con, $usuariosPorPilar16);
        $usuariosPorPilar17="SELECT COUNT(Usuario_idUsuarios) AS usuarioPorPilar FROM UsuariosPorPilar WHERE Pilares_idPilares = '17'";
        $result17 = mysqli_query($con, $usuariosPorPilar17);
        $usuariosPorPilar18="SELECT COUNT(Usuario_idUsuarios) AS usuarioPorPilar FROM UsuariosPorPilar WHERE Pilares_idPilares = '18'";
        $result18 = mysqli_query($con, $usuariosPorPilar18);
        $usuariosPorPilar19="SELECT COUNT(Usuario_idUsuarios) AS usuarioPorPilar FROM UsuariosPorPilar WHERE Pilares_idPilares = '19'";
        $result19 = mysqli_query($con, $usuariosPorPilar19);
        $usuariosPorPilar20="SELECT COUNT(Usuario_idUsuarios) AS usuarioPorPilar FROM UsuariosPorPilar WHERE Pilares_idPilares = '20'";
        $result20 = mysqli_query($con, $usuariosPorPilar20);

        $usuariosPorPilar21="SELECT COUNT(Usuario_idUsuarios) AS usuarioPorPilar FROM UsuariosPorPilar WHERE Pilares_idPilares = '21'";
        $result21 = mysqli_query($con, $usuariosPorPilar21);
        $usuariosPorPilar22="SELECT COUNT(Usuario_idUsuarios) AS usuarioPorPilar FROM UsuariosPorPilar WHERE Pilares_idPilares = '22'";
        $result22 = mysqli_query($con, $usuariosPorPilar22);
        $usuariosPorPilar23="SELECT COUNT(Usuario_idUsuarios) AS usuarioPorPilar FROM UsuariosPorPilar WHERE Pilares_idPilares = '23'";
        $result23 = mysqli_query($con, $usuariosPorPilar23);
        $usuariosPorPilar24="SELECT COUNT(Usuario_idUsuarios) AS usuarioPorPilar FROM UsuariosPorPilar WHERE Pilares_idPilares = '24'";
        $result24 = mysqli_query($con, $usuariosPorPilar24);

        $usuariosPorPilar26="SELECT COUNT(Usuario_idUsuarios) AS usuarioPorPilar FROM UsuariosPorPilar WHERE Pilares_idPilares = '26'";
        $result26 = mysqli_query($con, $usuariosPorPilar26);
        $usuariosPorPilar27="SELECT COUNT(Usuario_idUsuarios) AS usuarioPorPilar FROM UsuariosPorPilar WHERE Pilares_idPilares = '27'";
        $result27 = mysqli_query($con, $usuariosPorPilar27);

        $dataUsuariosPorPilar = array();
        foreach ($result1 as $row) {
          $dataUsuariosPorPilar[] = $row;
        }

        foreach ($result2 as $row) {
          array_push($dataUsuariosPorPilar, $row);
        }

        foreach ($result3 as $row) {
          array_push($dataUsuariosPorPilar, $row);
        }
        foreach ($result4 as $row) {
          array_push($dataUsuariosPorPilar, $row);
        }
        foreach ($result5 as $row) {
          array_push($dataUsuariosPorPilar, $row);
        }
        foreach ($result6 as $row) {
          array_push($dataUsuariosPorPilar, $row);
        }
        foreach ($result7 as $row) {
          array_push($dataUsuariosPorPilar, $row);
        }
        foreach ($result8 as $row) {
          array_push($dataUsuariosPorPilar, $row);
        }
        foreach ($result9 as $row) {
          array_push($dataUsuariosPorPilar, $row);
        }
        foreach ($result10 as $row) {
          array_push($dataUsuariosPorPilar, $row);
        }

        foreach ($result11 as $row) {
          array_push($dataUsuariosPorPilar, $row);
        }
        foreach ($result12 as $row) {
          array_push($dataUsuariosPorPilar, $row);
        }
        foreach ($result13 as $row) {
          array_push($dataUsuariosPorPilar, $row);
        }
        foreach ($result14 as $row) {
          array_push($dataUsuariosPorPilar, $row);
        }
        foreach ($result15 as $row) {
          array_push($dataUsuariosPorPilar, $row);
        }
        foreach ($result16 as $row) {
          array_push($dataUsuariosPorPilar, $row);
        }
        foreach ($result17 as $row) {
          array_push($dataUsuariosPorPilar, $row);
        }
        foreach ($result18 as $row) {
          array_push($dataUsuariosPorPilar, $row);
        }
        foreach ($result19 as $row) {
          array_push($dataUsuariosPorPilar, $row);
        }
        foreach ($result20 as $row) {
          array_push($dataUsuariosPorPilar, $row);
        }

        foreach ($result21 as $row) {
          array_push($dataUsuariosPorPilar, $row);
        }
        foreach ($result22 as $row) {
          array_push($dataUsuariosPorPilar, $row);
        }
        foreach ($result23 as $row) {
          array_push($dataUsuariosPorPilar, $row);
        }
        foreach ($result24 as $row) {
          array_push($dataUsuariosPorPilar, $row);
        }
        foreach ($result26 as $row) {
          array_push($dataUsuariosPorPilar, $row);
        }
        foreach ($result27 as $row) {
          array_push($dataUsuariosPorPilar, $row);
        }
        $result1->close();

        $result2->close();

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
        $result18->close();
        $result19->close();
        $result20->close();

        $result21->close();
        $result22->close();
        $result23->close();
        $result24->close();
        $result26->close();
        $result27->close();
        //close connection
        $con->close();

        //now print the data
        //var_dump($dataUsuariosPorPilar);die;
        print json_encode($dataUsuariosPorPilar);

?>
