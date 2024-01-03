<?php
include("../../Modelo/dbconfig.php");


$nombres = $_POST['txtnombre'];

$sqlac = "INSERT INTO ccostos (nombre_costo, estado_costo) VALUES ('$nombres','A' );";
$resac = getConexion()->query($sqlac);

echo "<script>  location.href='../../Views/costos.php';</script>";
session_start();
$_SESSION['msj3'] = "Usuario activado correctamente";
