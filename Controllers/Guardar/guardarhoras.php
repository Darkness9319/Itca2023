
<?php
include("../../Modelo/dbconfig.php");

$rol = $_POST['roluni'];
$empleado = $_POST['empleadouni'];
$cadena = $_POST['cadena'];

$h1 = $_POST['horasad'];
$h2 = $_POST['horasca'];
$h3 = $_POST['horasco'];
$h4 = $_POST['horasdi'];
$h5 = $_POST['horased'];
$h6 = $_POST['horasin'];
$h7 = $_POST['horaspo'];
$h8 = $_POST['horassa'];
$h9 = $_POST['horassm'];
$h10 = $_POST['horasub'];
$h11 = $_POST['horasun'];
$h12 = $_POST['horasvi'];


$p1 = $_POST['porcentajead'];
$p2 = $_POST['porcentajeca'];
$p3 = $_POST['porcentajeco'];
$p4 = $_POST['porcentajedi'];
$p5 = $_POST['porcentajeed'];
$p6 = $_POST['porcentajein'];
$p7 = $_POST['porcentajepo'];
$p8 = $_POST['porcentajesa'];
$p9 = $_POST['porcentajesm'];
$p10 = $_POST['porcentajeub'];
$p11 = $_POST['porcentajeun'];
$p12 = $_POST['porcentajevi'];



$sql1 = "UPDATE horasxprocentaje SET hora='$h1',porcentaje='$p1', estado = 'LISTO' WHERE codrol = '$rol' and centro_costo = 'Administrativo' and empleado = '$empleado';";
$res1 = getConexion()->query($sql1);

$sql2 = "UPDATE horasxprocentaje SET hora='$h2',porcentaje='$p2' , estado = 'LISTO' WHERE codrol = '$rol' and centro_costo = 'CALIDAD' and empleado = '$empleado';";
$res2 = getConexion()->query($sql2);

$sql3 = "UPDATE horasxprocentaje SET hora='$h3',porcentaje='$p3' , estado = 'LISTO' WHERE codrol = '$rol' and centro_costo = 'COSESE' and empleado = '$empleado';";
$res3 = getConexion()->query($sql3);

$sql4 = "UPDATE horasxprocentaje SET hora='$h4',porcentaje='$p4' , estado = 'LISTO' WHERE codrol = '$rol' and centro_costo = 'DISTANCIA' and empleado = '$empleado';";
$res4 = getConexion()->query($sql4);

$sql5 = "UPDATE horasxprocentaje SET hora='$h5',porcentaje='$p5' , estado = 'LISTO' WHERE codrol = '$rol' and centro_costo = 'EDUCACION' and empleado = '$empleado';";
$res5 = getConexion()->query($sql5);

$sql6 = "UPDATE horasxprocentaje SET hora='$h6',porcentaje='$p6' , estado = 'LISTO' WHERE codrol = '$rol' and centro_costo = 'INVESTIGACION' and empleado = '$empleado';";
$res6 = getConexion()->query($sql6);

$sql7 = "UPDATE horasxprocentaje SET hora='$h7',porcentaje='$p7' , estado = 'LISTO' WHERE codrol = '$rol' and centro_costo = 'POSGRADOS' and empleado = '$empleado';";
$res7 = getConexion()->query($sql7);

$sql8 = "UPDATE horasxprocentaje SET hora='$h8',porcentaje='$p8' , estado = 'LISTO' WHERE codrol = '$rol' and centro_costo = 'SALUD' and empleado = '$empleado';";
$res8 = getConexion()->query($sql8);

$sql9 = "UPDATE horasxprocentaje SET hora='$h9',porcentaje='$p9' , estado = 'LISTO' WHERE codrol = '$rol' and centro_costo = 'SEDE MANTA' and empleado = '$empleado';";
$res9 = getConexion()->query($sql9);

$sql10 = "UPDATE horasxprocentaje SET hora='$h10',porcentaje='$p10' , estado = 'LISTO' WHERE codrol = '$rol' and centro_costo = 'UBI' and empleado = '$empleado';";
$res10 = getConexion()->query($sql10);

$sql11 = "UPDATE horasxprocentaje SET hora='$h11',porcentaje='$p11' , estado = 'LISTO' WHERE codrol = '$rol' and centro_costo = 'UNACEM' and empleado = '$empleado';";
$res11 = getConexion()->query($sql11);

$sql12 = "UPDATE horasxprocentaje SET hora='$h12',porcentaje='$p12' , estado = 'LISTO' WHERE codrol = '$rol' and centro_costo = 'VINCULACION' and empleado = '$empleado';";
$res12 = getConexion()->query($sql12);





// echo "<script>  location.href='../../Views/cargarhoras.php'</script>";
echo "<script>  location.href='../../Views/cargarhoras.php?idrol=$rol';</script>";
session_start();
$_SESSION['msj'] = "Usuario activado correctamente";





?>



