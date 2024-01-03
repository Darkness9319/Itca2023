<?php
include("../../Modelo/dbconfig.php");


$nombres = $_POST['txtnombre'];

$sqlac = "INSERT INTO empleados (nombres_empleado, estado_empleado) VALUES ('$nombres','A' );";
$resac = getConexion()->query($sqlac);

echo "<script>  location.href='../../Views/empleados.php';</script>";
session_start();
$_SESSION['msj3'] = "Usuario activado correctamente";
