<?php session_start(); 

$nombre=$_REQUEST['nombre']; 
$sinopsis=$_REQUEST['sinopsis'];
$paginas=$_REQUEST['paginas']; 
$autor=$_REQUEST['autor'];
$genero=$_REQUEST['genero']; 
$imagen=$_FILES['imagen']['name'];
$id=$_REQUEST['id1']; 

$dest="libros/";
$nom = $_FILES['imagen']['tmp_name'];
copy($nom, $dest.$imagen);

$link =  mysqli_connect("localhost", "root", "");
mysqli_select_db($link,"libreria");
$result=mysqli_query($link,"INSERT INTO libro (estatus, nombre, sinopsis, paginas, imagen, autor, propietario, genero)
VALUES('Disponible', '$nombre', '$sinopsis', '$paginas', '$imagen', '$autor', '$id', '$genero' )");

header("Location: libros_usuario_u.php");
?> 