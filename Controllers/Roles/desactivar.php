<?php
include("../../Modelo/dbconfig.php");


$id = $_GET['idemp'];

$sqlac = "UPDATE roles set estado_rol = 'I' where id_rol = '$id'";
$resac = getConexion()->query($sqlac);

echo "<script>  location.href='../../Views/roles.php';</script>";
session_start();
$_SESSION['msj2'] = "Usuario activado correctamente";
