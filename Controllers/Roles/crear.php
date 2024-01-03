<?php
include("../../Modelo/dbconfig.php");


$codigo = $_POST['txtcod'];
$nombres = $_POST['txtrol'];

$sqlac = "INSERT INTO roles (codrol, nombre_rol, estado_rol) VALUES ('$codigo','$nombres','A' );";
$resac = getConexion()->query($sqlac);

echo "<script>  location.href='../../Views/roles.php';</script>";
session_start();
$_SESSION['msj3'] = "Usuario activado correctamente";
