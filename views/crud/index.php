<?php require 'views/layout/headerCRUD.php'; ?>
<?php
    $con = mysqli_connect('localhost', 'pilaresDevSergio', '%C2MB10cl1m2t1c0%', 'pilaresDB');
        if (!$con) {
            die('Could not connect: ' . mysqli_error($con));
        }

    mysqli_select_db($con, "pilaresDB");
    mysqli_query($con, "SET NAMES 'utf8mb4'");

    /**
    * Totales por tipo de actividad
    */
    $sql="SELECT COUNT(*) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_TiposActividades_idTiposActividades = '1'";
    $totalesCultura = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $culturaTotales = mysqli_fetch_array($totalesCultura);

    $sql="SELECT COUNT(*) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_TiposActividades_idTiposActividades = '4'";
    $totalesCiberEscuelas = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $ciberEscuelaTotales = mysqli_fetch_array($totalesCiberEscuelas);

    $sql="SELECT COUNT(*) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_TiposActividades_idTiposActividades = '2'";
    $totalesDeporte = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $deporteTotales = mysqli_fetch_array($totalesDeporte);

    $sql="SELECT COUNT(*) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_TiposActividades_idTiposActividades = '3'";
    $totalesAutonomia = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $autonomiaTotales = mysqli_fetch_array($totalesAutonomia);
    /**
    * FIN - Totales por tipo de actividad
    */
    /**
    * Totales por tactividad Cultura
    */
    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '1'";
    $totalesTeatro = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $teatro = mysqli_fetch_array($totalesTeatro);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '2'";
    $totalesDanza = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $danza = mysqli_fetch_array($totalesDanza);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '4'";
    $totalesPerformance = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $performance = mysqli_fetch_array($totalesPerformance);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '5'";
    $totalesMusica = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $musica = mysqli_fetch_array($totalesMusica);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '8'";
    $totalesArtesPlas = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $artesPlas = mysqli_fetch_array($totalesArtesPlas);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '9'";
    $totalesFoto = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $fotografia = mysqli_fetch_array($totalesFoto);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '10'";
    $totalesVideoDoc = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $videoDoc = mysqli_fetch_array($totalesVideoDoc);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '11'";
    $totalesStopMotion = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $stopMotion = mysqli_fetch_array($totalesStopMotion);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '12'";
    $totalesArteBiolo = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $arteBiolo = mysqli_fetch_array($totalesArteBiolo);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '15'";
    $totalesLibroClub = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $libroClub = mysqli_fetch_array($totalesLibroClub);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '16'";
    $totalesCineTranshu = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $CineTranshu = mysqli_fetch_array($totalesCineTranshu);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '22'";
    $totalesDifuCienti = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $difuCienti = mysqli_fetch_array($totalesDifuCienti);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '67'";
    $totalesBaileSocial = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $baileSocial = mysqli_fetch_array($totalesBaileSocial);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '68'";
    $totalesDanzaNiños = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $danzaNiños = mysqli_fetch_array($totalesDanzaNiños);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '69'";
    $totalesDanzaAdultos = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $danzaAdultos = mysqli_fetch_array($totalesDanzaAdultos);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '70'";
    $totalesFolklorica = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $folklorica = mysqli_fetch_array($totalesFolklorica);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '71'";
    $totalesActuacion = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $actuacion = mysqli_fetch_array($totalesActuacion);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '72'";
    $totalesTeatroCalle = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $teatroCalle = mysqli_fetch_array($totalesTeatroCalle);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '73'";
    $totalesDanzaContemporanea = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $contemporanea = mysqli_fetch_array($totalesDanzaContemporanea);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '74'";
    $totalesPolinesia = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $polinesia = mysqli_fetch_array($totalesPolinesia);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '75'";
    $totalesTeatroMascaras = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $mascaras = mysqli_fetch_array($totalesTeatroMascaras);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '76'";
    $totalesExpresio = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $expresion = mysqli_fetch_array($totalesExpresio);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '77'";
    $totalesTelar = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $telar = mysqli_fetch_array($totalesTelar);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '78'";
    $totalesCArtoneria = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $cartoneria = mysqli_fetch_array($totalesCArtoneria);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '79'";
    $totalesBordado = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $bordado = mysqli_fetch_array($totalesBordado);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '80'";
    $totalesConstruccion = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $construccion = mysqli_fetch_array($totalesConstruccion);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '81'";
    $totalesDiseñoJuguetes = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $diseñoJuguetes = mysqli_fetch_array($totalesDiseñoJuguetes);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '82'";
    $totalesReciclajeAmb = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $reciclajeAmb = mysqli_fetch_array($totalesReciclajeAmb);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '83'";
    $totalesEscritura = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $escritura = mysqli_fetch_array($totalesEscritura);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '84'";
    $totalesPinturaArt = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $pinturaArt = mysqli_fetch_array($totalesPinturaArt);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '85'";
    $totalesAudioVisual = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $audioVisual = mysqli_fetch_array($totalesAudioVisual);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '86'";
    $totalesCine = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $cine = mysqli_fetch_array($totalesCine);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '87'";
    $totalesAnimacionNiños = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $animacionNiños = mysqli_fetch_array($totalesAnimacionNiños);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '88'";
    $totalesVideoComunitario = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $videoComunitario = mysqli_fetch_array($totalesVideoComunitario);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '89'";
    $totalesGuitarra = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $guitarra = mysqli_fetch_array($totalesGuitarra);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '90'";
    $totalesRap = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $rap = mysqli_fetch_array($totalesRap);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '91'";
    $totalesPercusiones = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $percusiones = mysqli_fetch_array($totalesPercusiones);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '92'";
    $totalesIniciacion = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $iniciacion = mysqli_fetch_array($totalesIniciacion);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '93'";
    $totalesSonHuasteco = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $sonHuasteco = mysqli_fetch_array($totalesSonHuasteco);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '123'";
    $totalesGrabado = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $grabado = mysqli_fetch_array($totalesGrabado);
    /**
    * FIN -Totales por tactividad Cultura
    */
    /**
    * Totales por tactividad Deporte
    */
    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '17'";
    $totalesFutbol = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $futbol = mysqli_fetch_array($totalesFutbol);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '18'";
    $totalesBasquet = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $basquet = mysqli_fetch_array($totalesBasquet);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '19'";
    $totaleVoley = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $voley = mysqli_fetch_array($totaleVoley);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '20'";
    $totalesAcondicionamiento = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $acondicionamiento = mysqli_fetch_array($totalesAcondicionamiento);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '94'";
    $totalesZumba = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $zumba = mysqli_fetch_array($totalesZumba);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '95'";
    $totalesTae = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $tae = mysqli_fetch_array($totalesTae);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '96'";
    $totalesYoga = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $yoga = mysqli_fetch_array($totalesYoga);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '97'";
    $totalesTai = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $taiChi = mysqli_fetch_array($totalesTai);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '98'";
    $totalesBoxeo = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $boxeo = mysqli_fetch_array($totalesBoxeo);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '99'";
    $totalesAtletismo = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $atletismo = mysqli_fetch_array($totalesAtletismo);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '100'";
    $totalesKarate = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $karate = mysqli_fetch_array($totalesKarate);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '101'";
    $totalesKung = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $kung = mysqli_fetch_array($totalesKung);
    /**
    * FIN - Totales por tactividad Deporte
    */
    /**
    * Totales por actividad Ciberescuelas
    */
    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '21'";
    $totalesAjedrez = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $ajedrez = mysqli_fetch_array($totalesAjedrez);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '24'";
    $totalesClubCiencia = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $clubCiencia = mysqli_fetch_array($totalesClubCiencia);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '25'";
    $totalesRoboticaApli = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $robo = mysqli_fetch_array($totalesRoboticaApli);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '28'";
    $totalesClubCodigo = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $clubCodigo = mysqli_fetch_array($totalesClubCodigo);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '29'";
    $totalesAmor = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $amor = mysqli_fetch_array($totalesAmor);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '30'";
    $totalesPrevenAdic = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $prevenAdic = mysqli_fetch_array($totalesPrevenAdic);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '31'";
    $totalesHabilidades = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $habilidades = mysqli_fetch_array($totalesHabilidades);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '32'";
    $totalesProyecto = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $proyecto = mysqli_fetch_array($totalesProyecto);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '33'";
    $totalesAutoestima = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $autoestima = mysqli_fetch_array($totalesAutoestima);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '34'";
    $totalesTanato = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $tanato = mysqli_fetch_array($totalesTanato);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '35'";
    $totalesInteliEmo = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $inteliEmo = mysqli_fetch_array($totalesInteliEmo);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '36'";
    $totalesArteEmo = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $arteEmo = mysqli_fetch_array($totalesArteEmo);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '102'";
    $totalesREdaccion = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $redaccion = mysqli_fetch_array($totalesREdaccion);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '103'";
    $totalesTalleComp = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $talleresCom = mysqli_fetch_array($totalesTalleComp);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '104'";
    $totalesEmoMagic = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $emoMagic = mysqli_fetch_array($totalesEmoMagic);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '105'";
    $totalesPintEmo = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $pintEmo = mysqli_fetch_array($totalesPintEmo);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '106'";
    $totalesAlfabet = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $alfabet = mysqli_fetch_array($totalesAlfabet);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '107'";
    $totalesPrimaRIA = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $primaria = mysqli_fetch_array($totalesPrimaRIA);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '108'";
    $totalesSec = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $secundaria = mysqli_fetch_array($totalesSec);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '109'";
    $totalesBadi = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $badi = mysqli_fetch_array($totalesBadi);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '110'";
    $totalesPrepaSep = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $prepaSep = mysqli_fetch_array($totalesPrepaSep);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '114'";
    $totalesBunam= mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $bunam = mysqli_fetch_array($totalesBunam);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '115'";
    $totalesUnadm = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $unadm = mysqli_fetch_array($totalesUnadm);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '116'";
    $totalesLicLinea = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $liclinea = mysqli_fetch_array($totalesLicLinea);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '117'";
    $totalesLicCdmx = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $licCdmx = mysqli_fetch_array($totalesLicCdmx);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '118'";
    $totalesAsePrim = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $asePrimaria = mysqli_fetch_array($totalesAsePrim);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '119'";
    $totalesAseSec = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $aseSecundaria = mysqli_fetch_array($totalesAseSec);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '120'";
    $totalesAsePrepa = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $asePrep = mysqli_fetch_array($totalesAsePrepa);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '121'";
    $totalesAseLic = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $aseLic= mysqli_fetch_array($totalesAseLic);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '122'";
    $totalesBaileCuero= mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $baileCuerpo= mysqli_fetch_array($totalesBaileCuero);
    /**
    * FIN - Totales por tactividad  Ciberescuelas
    */
    /**
    * Totales por actividad Autonomía
    */
    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '6'";
    $totalesEnucadernacion = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $encuadernacion = mysqli_fetch_array($totalesEnucadernacion);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '7'";
    $totalesReciclaje = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $reciclaje = mysqli_fetch_array($totalesReciclaje);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '13'";
    $totalesHuerto = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $huerto = mysqli_fetch_array($totalesHuerto);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '14'";
    $totalesCeramica = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $ceramica = mysqli_fetch_array($totalesCeramica);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '23'";
    $totalesProgramacion = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $programacion = mysqli_fetch_array($totalesProgramacion);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '27'";
    $totalesEdicionDiseño = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $edicionDiseño = mysqli_fetch_array($totalesEdicionDiseño);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '37'";
    $totalesCarpinteria = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $carpinteria = mysqli_fetch_array($totalesCarpinteria);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '38'";
    $totalesPlomeria = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $plomeria = mysqli_fetch_array($totalesPlomeria);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '33'";
    $totalesAutoestima = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $autoestima = mysqli_fetch_array($totalesAutoestima);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '39'";
    $totalesHerreria = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $herreria = mysqli_fetch_array($totalesHerreria);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '40'";
    $totalesElectricidad = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $electricidad= mysqli_fetch_array($totalesElectricidad);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '41'";
    $totalesGastronomia = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $gastronomia = mysqli_fetch_array($totalesGastronomia);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '42'";
    $totalesPanaderia = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $panaderia = mysqli_fetch_array($totalesPanaderia);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '43'";
    $totalesJoyeria= mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $joyeria = mysqli_fetch_array($totalesJoyeria);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '44'";
    $totalesAgricultura = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $agricultura = mysqli_fetch_array($totalesAgricultura);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '45'";
    $totalesBicimaquinas = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $bicimaquinas = mysqli_fetch_array($totalesBicimaquinas);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '46'";
    $totalesEstilismo = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $estilismo = mysqli_fetch_array($totalesEstilismo);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '47'";
    $totalesDiseñoImagen = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $diseñoImagen = mysqli_fetch_array($totalesDiseñoImagen);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '48'";
    $totalesCodMujeres = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $codMujeres = mysqli_fetch_array($totalesCodMujeres);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '49'";
    $totalesElectronica = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $electronica = mysqli_fetch_array($totalesElectronica);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '50'";
    $totalesCosechaAgua = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $cosechaAgua = mysqli_fetch_array($totalesCosechaAgua);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '51'";
    $totalesInstalacion = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $instalacion = mysqli_fetch_array($totalesInstalacion);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '52'";
    $totalesTExtiles = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $textileDiseño = mysqli_fetch_array($totalesTExtiles);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '53'";
    $totalesBanquetes = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $banquetes = mysqli_fetch_array($totalesBanquetes);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '54'";
    $totalesFotoProducto = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $fotoProducto = mysqli_fetch_array($totalesFotoProducto);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '55'";
    $totalesLogos = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $logos = mysqli_fetch_array($totalesLogos);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '56'";
    $totalesCalidad = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $calidad = mysqli_fetch_array($totalesCalidad);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '57'";
    $totalesCooperativas = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $cooperativas = mysqli_fetch_array($totalesCooperativas);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '58'";
    $totalesEmprende= mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $emprende= mysqli_fetch_array($totalesEmprende);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '59'";
    $totalesMicroN= mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $microN= mysqli_fetch_array($totalesMicroN);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '60'";
    $totalesComercioDigital = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $comercioDigital = mysqli_fetch_array($totalesComercioDigital);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '61'";
    $totalesEstrategias = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $estrategias = mysqli_fetch_array($totalesEstrategias);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '62'";
    $totalesComercioJusto = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $comercioJusto = mysqli_fetch_array($totalesComercioJusto);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '63'";
    $totalesHospedaje = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $hospedaje = mysqli_fetch_array($totalesHospedaje);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '64'";
    $totalesElectronicaDigital = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $electroDigital = mysqli_fetch_array($totalesElectronicaDigital);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '65'";
    $totalesDistribucion= mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $distribucion= mysqli_fetch_array($totalesDistribucion);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '66'";
    $totalesDesarrollo= mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $desarrollo= mysqli_fetch_array($totalesDesarrollo);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '124'";
    $totalesElectronicaBraile = mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $braile = mysqli_fetch_array($totalesElectronicaBraile);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '125'";
    $totalesComputacionAsistida= mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $computacionAsistida= mysqli_fetch_array($totalesComputacionAsistida);

    $sql="SELECT COUNT(Usuario_idUsuarios) AS userPorActividad FROM ActividadesPorUsuario WHERE Actividades_idActividades = '126'";
    $totalesSeñas= mysqli_query($con, $sql);
    //var_dump($totalesCultura);
    $señas= mysqli_fetch_array($totalesSeñas);

    if (isset($_SESSION['pilarAsignado'])) {
        $nombrePilar = $_SESSION['pilarAsignado'];
        $separador = "-";
    }
 ?>
    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
        <!--
          <li class="breadcrumb-item active">Vista General</li>
        -->
        <?php if(isset($_SESSION['identity'])): ?>
          <div class="breadcrumb-item active">
            <li><?= $_SESSION['identity']->nombre?> <?=$_SESSION['identity']->apellidoPaterno?> <?=$_SESSION['identity']->apellidoMaterno?></li>
          </div>

        <?php endif; ?>
        <?php if(isset($_SESSION['pilarAsignado'])): ?>

             <li><?=$separador?><b><?=$nombrePilar?></b></li>

        <?php endif;?>
        </ol>

        <!-- Icon Cards-->
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-music"></i>
                </div>
                <div class="mr-5"><b>Cultura <span class="float-right"><?=$culturaTotales['userPorActividad']?></span></b></div>
              </div>
              <a class="card-footer text-white clearfix small z-1" data-toggle="collapse" href="#collapseCultura">
                <span class="float-left">Ver detalle</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
              <div class="collapse" id="collapseCultura">
                <div class="card card-body">
                  <table class="table table-striped ">
                    <tbody class="bg-primary">
                      <tr>
                        <th scope="row">Usuarios totales</th>
                        <td><b><?=$culturaTotales['userPorActividad']?></b></td>
                      </tr>
                      <tr>
                        <th scope="row">Teatro</th>
                        <td><?=$teatro['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Danza</th>
                        <td><?=$danza['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Perfonmance</th>
                        <td><?=$performance['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Música</th>
                        <td><?=$musica['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Artes plásticas</th>
                        <td><?=$artesPlas['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Fotografía</th>
                        <td><?=$fotografia['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Video documental</th>
                        <td><?=$videoDoc['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Stop motion</th>
                        <td><?=$stopMotion['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Arte y biología</th>
                        <td><?=$arteBiolo['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Libroclub</th>
                        <td><?=$libroClub['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Cineclub y trashuma</th>
                        <td><?=$CineTranshu['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Difusión Científica</th>
                        <td><?=$difuCienti['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Baile Social</th>
                        <td><?=$baileSocial['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Danza para niños</th>
                        <td><?=$danzaNiños['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Danza para adultos</th>
                        <td><?=$danzaAdultos['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Danza folklórica</th>
                        <td><?=$folklorica['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Actuación</th>
                        <td><?=$actuacion['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Teatro de calle</th>
                        <td><?=$teatroCalle['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Danza contemporánea</th>
                        <td><?=$contemporanea['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Danza polinesia</th>
                        <td><?=$polinesia['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Teatro de máscaras</th>
                        <td><?=$mascaras['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Expresión corporal y teatro</th>
                        <td><?=$expresion['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Telar de cintura</th>
                        <td><?=$telar['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Cartonería</th>
                        <td><?=$cartoneria['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Bordado para la vida</th>
                        <td><?=$bordado['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Construcción artesanal de instrumentos</th>
                        <td><?=$construccion['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Diseño de juguetes de madera y materiales de</th>
                        <td><?=$diseñoJuguetes['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Reciclaje y medio ambiente</th>
                        <td><?=$reciclajeAmb['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Escritura creativa</th>
                        <td><?=$escritura['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Pintura artística</th>
                        <td><?=$pinturaArt['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Medios Audiovisuales </th>
                        <td><?=$audioVisual['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Cine</th>
                        <td><?=$cine['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Animación para niños</th>
                        <td><?=$animacionNiños['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Vídeo comunitario</th>
                        <td><?=$videoComunitario['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Guitarra clásica</th>
                        <td><?=$guitarra['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Música Rap</th>
                        <td><?=$rap['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Percusiones</th>
                        <td><?=$percusiones['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Iniciación a la música</th>
                        <td><?=$iniciacion['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Son Huasteco</th>
                        <td><?=$sonHuasteco['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Dibujo y grabado</th>
                        <td><?=$grabado['userPorActividad']?></td>
                      </tr>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-list"></i>
                </div>
                <div class="mr-5"><b>Ciberescuelas <span class="float-right"><?=$ciberEscuelaTotales['userPorActividad']?></span></b></div>
              </div>
              <a class="card-footer text-white clearfix small z-1" data-toggle="collapse" href="#collapseCiberescuelas">
                <span class="float-left">Ver detalle</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
              <div class="collapse" id="collapseCiberescuelas">
                <div class="card card-body">
                  <table class="table table-striped ">
                    <tbody class="bg-warning">
                      <tr>
                        <th scope="row">Usuarios totales</th>
                        <td><b><?=$ciberEscuelaTotales['userPorActividad']?></b></td>
                      </tr>
                      <tr>
                        <th scope="row">Ajedrez</th>
                        <td><?=$ajedrez['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Club de Ciencias</th>
                        <td><?=$clubCiencia['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Robótica aplicada</th>
                        <td><?=$robo['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Club de Codigo</th>
                        <td><?=$clubCodigo['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Amor y sexualidad</th>
                        <td><?=$amor['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Prevención de adicc</th>
                        <td><?=$prevenAdic['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Habilidades para la</th>
                        <td><?=$habilidades['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Proyecto de vida</th>
                        <td><?=$proyecto['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Autoestima</th>
                        <td><?=$autoestima['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Tanatología o manej</th>
                        <td><?=$tanato['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Inteligencia emocio</th>
                        <td><?=$inteliEmo['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Arte y Emociones</th>
                        <td><?=$arteEmo['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Redacción y comprensión de lectura</th>
                        <td><?=$redaccion['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Talleres de cómputo</th>
                        <td><?=$talleresCom['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Emociones mágicas</th>
                        <td><?=$emoMagic['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Pintando emociones</th>
                        <td><?=$pintEmo['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Alfabetización</th>
                        <td><?=$alfabet['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Primaria</th>
                        <td><?=$primaria['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Secundaria</th>
                        <td><?=$secundaria['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">BADI</th>
                        <td><?=$badi['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Prepa en línea SEP</th>
                        <td><?=$prepaSep['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">B@UNAM</th>
                        <td><?=$bunam['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">UnADM</th>
                        <td><?=$unadm['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Licenciatura en linea</th>
                        <td><?=$liclinea['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Licenciaturas CDMX</th>
                        <td><?=$licCdmx['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Asesorias primaria</th>
                        <td><?=$asePrimaria['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Asesorias secundaria</th>
                        <td><?=$aseSecundaria['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Asesorias bachillerato</th>
                        <td><?=$asePrep['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Asesorias licenciatura</th>
                        <td><?=$aseLic['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Baile, cuerpo y emociones</th>
                        <td><?=$baileCuerpo['userPorActividad']?></td>
                      </tr>
                    </tbody>
                  </table>
               </div>
             </div>
             </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-running"></i>
                </div>
                <div class="mr-5"><b>Deporte <span class="float-right"><?=$deporteTotales['userPorActividad']?></span></b></div>
              </div>
              <a class="card-footer text-white clearfix small z-1" data-toggle="collapse" href="#collapseDeporte">
                <span class="float-left">Ver detalle</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
              <div class="collapse" id="collapseDeporte">
                <div class="card card-body">
                  <table class="table table-striped ">
                    <tbody class="bg-success">
                      <tr>
                        <th scope="row">Usuarios totales</th>
                        <td><b><?=$deporteTotales['userPorActividad']?></b></td>
                      </tr>
                      <tr>
                        <th scope="row">Fútbol</th>
                        <td><?=$futbol['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Basquetbol</th>
                        <td><?=$basquet['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Voleibol</th>
                        <td><?=$voley['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Acondicionamiento físico</th>
                        <td><?=$acondicionamiento['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Zumba</th>
                        <td><?=$zumba['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Tae bo</th>
                        <td><?=$tae['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Yoga</th>
                        <td><?=$yoga['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Tai chi</th>
                        <td><?=$taiChi['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Boxeo</th>
                        <td><?=$boxeo['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Atletismo</th>
                        <td><?=$atletismo['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Karate do</th>
                        <td><?=$karate['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Kung fu</th>
                        <td><?=$kung['userPorActividad']?></td>
                      </tr>
                    </tbody>
                  </table>
               </div>
             </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-hand-holding-usd"></i>
                </div>
                <div class="mr-5"><b>Autonomía Económica <span class="float-right"><?=$autonomiaTotales['userPorActividad']?></span></b></div>
              </div>
              <a class="card-footer text-white clearfix small z-1" data-toggle="collapse" href="#collapseAutonomia">
                <span class="float-left">Ver detalle</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
              <div class="collapse" id="collapseAutonomia">
                <div class="card card-body">
                  <table class="table table-striped ">
                    <tbody class="bg-danger">
                      <tr>
                        <th scope="row">Usuarios totales</th>
                        <td><strong><?=$autonomiaTotales['userPorActividad']?></strong></td>
                      </tr>
                      <tr>
                        <th scope="row">Encuadernación</th>
                        <td><?=$encuadernacion['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Reciclaje</th>
                        <td><?=$reciclaje['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Taller de huerto</th>
                        <td><?=$huerto['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Cerámica</th>
                        <td><?=$ceramica['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Programación y Apli</th>
                        <td><?=$programacion['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Edición y Diseño </th>
                        <td><?=$edicionDiseño['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Carpintería</th>
                        <td><?=$carpinteria['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Plomería</th>
                        <td><?=$plomeria['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Herrería y Aluminer</th>
                        <td><?=$herreria['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Electricidad y dispositivos fotovoltaicos</th>
                        <td><?=$electricidad['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Gastronomía, panadería y catering</th>
                        <td><?=$gastronomia['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Panadería</th>
                        <td><?=$panaderia['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Joyería y accesorio </th>
                        <td><?=$joyeria['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Agricultura urbana</th>
                        <td><?=$agricultura['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Bicimaquinas</th>
                        <td><?=$bicimaquinas['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Estilismo</th>
                        <td><?=$estilismo['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Diseño de imagen y Cosmetología orgánica</th>
                        <td><?=$diseñoImagen['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Codigo para mujeres</th>
                        <td><?=$codMujeres['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Electrónica y robótica</th>
                        <td><?=$electronica['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Cosecha de agua de</th>
                        <td><?=$cosechaAgua['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Instalación y repar</th>
                        <td><?=$instalacion['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Textiles y diseño</th>
                        <td><?=$textileDiseño['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Banquetes</th>
                        <td><?=$banquetes['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Fotografia de produ</th>
                        <td><?=$fotoProducto['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Logos e identidad d</th>
                        <td><?=$logos['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Calidad en el servi</th>
                        <td><?=$calidad['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Creación de coopera</th>
                        <td><?=$cooperativas['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Emprendedurismo</th>
                        <td><?=$emprende['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Creación de micro-n</th>
                        <td><?=$microN['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Comercio digital</th>
                        <td><?=$comercioDigital['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Estrategias de vent</th>
                        <td><?=$estrategias['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Comercio justo</th>
                        <td><?=$comercioJusto['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Hospedaje</th>
                        <td><?=$hospedaje['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Electrónica digital</th>
                        <td><?=$electroDigital['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Distribución</th>
                        <td><?=$distribucion['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Desarrollo web</th>
                        <td><?=$desarrollo['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Braile</th>
                        <td><?=$braile['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Computación asistida</th>
                        <td><?=$computacionAsistida['userPorActividad']?></td>
                      </tr>
                      <tr>
                        <th scope="row">Introducción al lenguaje de señas</th>
                        <td><?=$señas['userPorActividad']?></td>
                      </tr>
                      </tbody>
                  </table>
               </div>
             </div>
            </div>
          </div>
        </div>

        <!-- Area Chart Example-->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-chart-area"></i>
          Gráfica general de usuarios registrados por día</div>
          <div class="card-body">
            <canvas id="myAreaChart" width="100%" height="30"></canvas>
          </div>
          <div class="card-footer small text-muted">Actualizada Ayer a las 11:59 PM</div>
        </div>

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
    <?php require 'views/layout/footerCRUD.php'; ?>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">¿Estas seguro de querer salir?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Selesciona salir si estas seguro de cerrar tu sesión.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a class="btn btn-primary" href="<?php echo constant('URL')?>Crud/index">Salir</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo constant('URL')?>public/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo constant('URL')?>public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo constant('URL')?>public/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="<?php echo constant('URL')?>public/vendor/chart.js/Chart.min.js"></script>
  <script src="<?php echo constant('URL')?>public/vendor/datatables/jquery.dataTables.js"></script>
  <script src="<?php echo constant('URL')?>public/vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo constant('URL')?>public/js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="<?php echo constant('URL')?>public/js/demo/datatables-demo.js"></script>
  <script src="<?php echo constant('URL')?>public/js/demo/chart-area-demo.js"></script>

</body>

</html>
