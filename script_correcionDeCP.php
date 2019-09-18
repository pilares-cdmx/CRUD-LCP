
<?php 
$con = mysqli_connect('localhost', 'francisco', 'tu_contrasena', 'pilaresDB');
    // $con = mysqli_connect('localhost', 'root', '', 'pilaresDB');
        if (!$con) {
            die('Could not connect: ' . mysqli_error($con));
        }

    mysqli_select_db($con, "pilaresDB");
    mysqli_query($con, "SET NAMES 'utf8mb4'");


    $sql="SELECT C2.codigo 
          FROM Becas_produccion B1, Usuario U1, UsuariosPorPilar U2, Pilares P1, Direccion D1, CodigosPostales C2 
          WHERE B1.idusuario = U1.idUsuarios 
          AND U2.Usuario_idUsuarios = B1.idUsuario 
          AND P1.idpilares = U2.Pilares_idPilares 
          AND B1.folioBecaPilares LIKE 'BBP-%' 
          AND D1.idDireccion = U1.Direccion_idDireccion 
          AND C2.idCodigoPostal = D1.Colonias_CodigosPostales_idCodigoPostal";
    $totalesCPBecas = mysqli_query($con, $sql);
    //var_dump($totalesCPBecas);
    $cpSucio = mysqli_fetch_array($totalesCPBecas);

    for ($i=0; $i < strlen ($cpSucio) ; $i++) { 
        echo($cpSucio[$i]);
    }

?>