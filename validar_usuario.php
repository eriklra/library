<?php session_start(); 

$email=$_REQUEST['email']; 
$password=$_REQUEST['password'];

$link =  mysqli_connect("localhost", "root", "");
mysqli_select_db($link,"libreria");
$result=mysqli_query($link,"select contrasena, correo, id_usuario, tipo from usuario WHERE correo='$email'");

   if($row = mysqli_fetch_array($result))
      {
        if($row["contrasena"] == $password) {
            $_SESSION["k_username"] = $row['correo'];   
            $_SESSION["ID"] = $row['id_usuario'];
            $_SESSION["tipo"] = $row['tipo'];
            $ti=$row['tipo'] ;
            if($ti==0) header("Location: index_a.php");
            else header("Location: index_u.php") ;     
           } else 
           header("Location: sesion_error_pass_i") ;
      } else 
      header("Location: sesion_error_correo_i") ; 
        
 
?> 