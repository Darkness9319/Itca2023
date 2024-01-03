<?php
include("../../Modelo/dbconfig.php");


$id = $_GET['idemp'];

$sqlac = "UPDATE empleados set estado_empleado = 'A' where id_empleado = '$id'";
$resac = getConexion()->query($sqlac);

echo "<script>  location.href='../../Views/empleados.php';</script>";
session_start();
$_SESSION['msj'] = "Usuario activado correctamente";
