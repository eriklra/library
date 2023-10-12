<?PHP
include("conexion.php");
$link = Conectarse();
$id = $_REQUEST['id'];
$nom = $_REQUEST['nombre'];
$correo = $_REQUEST['correo'];
$contrasena = $_REQUEST['contrasena'];

mysqli_query($link, "update usuario set nombre ='$nom' where id_usuario = '$id'");
mysqli_query($link, "update usuario set correo ='$correo' where id_usuario = '$id'");
mysqli_query($link, "update usuario set contrasena ='$contrasena' where id_usuario = '$id'");
header("Location: usuarios_a.php");
?>