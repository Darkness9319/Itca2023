
<?php
include("../Modelo/dbconfig.php");


$idrol = $_GET['idrol'];



$sql12 = "DELETE FROM horasxprocentaje WHERE codrol = '$idrol'";
$res12 = getConexion()->query($sql12);

// echo $sql12;



// echo "<script>  location.href='../../Views/cargarhoras.php'</script>";
echo "<script>  location.href='ingresos.php';</script>";
session_start();
$_SESSION['msjel'] = "Usuario activado correctamente";


?>

