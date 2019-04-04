
<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

$q = intval($_GET['q']);


$con = mysqli_connect('localhost', 'pilaresDevSergio', '%C2MB10cl1m2t1c0%', 'pilaresDB');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con, "pilaresDB");
mysqli_query($con, "SET NAMES 'utf8mb4'");
$sql="SELECT * FROM Colonias WHERE Alcaldias_idAlcaldiasZonas = '".$q."' ORDER BY nombre";
$result = mysqli_query($con, $sql);

while ($row = mysqli_fetch_array($result)) {
    echo "<option value=" . $row['idColonia'] . ">" . $row['nombre'] . "</option>";
}

mysqli_close($con);
?>
</body>
</html>
