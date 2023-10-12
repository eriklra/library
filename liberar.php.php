<?php session_start(); 
$id=$_REQUEST['id1']; 

$link = mysqli_connect("localhost", "root", "");
        mysqli_select_db($link, "libreria");
        mysqli_query($link,"UPDATE libro SET estatus = 0 WHERE id_libro = '$id'");
      header("Location: libros_usuario_u") ; 
        
 echo "$id";
?> 