<?php
include("../../Modelo/dbconfig.php");


$id = $_GET['idemp'];

$sqlac = "UPDATE ccostos set estado_costo = 'I' where id_costo = '$id'";
$resac = getConexion()->query($sqlac);

echo "<script>  location.href='../../Views/costos.php';</script>";
session_start();
$_SESSION['msj2'] = "Usuario activado correctamente";
