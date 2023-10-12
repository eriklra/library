<?php session_start(); 

$email=$_REQUEST['email']; 
$password=$_REQUEST['password'];
$nombre=$_REQUEST['nombre'];
$newpass=$_REQUEST['newpassword'];
$id=$_REQUEST['id1'];

$link =  mysqli_connect("localhost", "root", "");
mysqli_select_db($link,"libreria");
$result=mysqli_query($link,"SELECT * FROM usuario WHERE id_usuario='$id'");

while($row = mysqli_fetch_array($result)){
        if($row["contrasena"] == $password) {
         mysqli_query($link, "UPDATE usuario SET nombre='$nombre', correo='$email', contrasena='$newpass' Where id_usuario='$id'");
         $_SESSION["k_username"] = $email;
         header("Location: informacion_admin_a") ;
           } else 
           header("Location: actualizar_datos_a") ;
      } 
      mysqli_close($link);
?> 