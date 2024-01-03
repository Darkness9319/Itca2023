<?php
include("../../Modelo/dbconfig.php");

$fechaAnf = date("Y-m-d", time() - 18000);
$rol = $_POST['cmbrol'];
// echo $rol;

$arrayrol = explode("-", $rol);

$codrol = $arrayrol[0];
$nomrol = $arrayrol[1];

// echo $codrol;

$sql = "SELECT * FROM empleados where estado_empleado = 'A'";
$res = getConexion()->query($sql);




foreach ($res as $row) :

    $nombrecompleto = $row['nombres_empleado'];





    $sql2 = "SELECT * FROM ccostos where estado_costo = 'A'";
    $res2 = getConexion()->query($sql2);




    foreach ($res2 as $row2) :

        $nombreC = $row2['nombre_costo'];


        $sqlac = "INSERT INTO horasxprocentaje(codrol, rol, empleado, centro_costo, fecha) VALUES ('$codrol','$nomrol', '$nombrecompleto','$nombreC','$fechaAnf')";
        $resac = getConexion()->query($sqlac);

    endforeach;



endforeach;




echo "<script>  location.href='../../Views/ingresos.php';</script>";
session_start();
$_SESSION['msj'] = "Usuario activado correctamente";
