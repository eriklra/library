<?php
include("conexion.php");
$link = Conectarse();
$id = $_GET['id_usuario'];  
mysqli_query($link, "delete from usuario where id_usuario = '$id'");
mysqli_query($link, "delete from prestamos where id_usuario = '$id'");
header("Location: usuarios_a.php");
?>