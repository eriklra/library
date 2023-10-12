<?php session_start(); 
$nombre=$_REQUEST['name']; 
$email=$_REQUEST['email'];  
$password=$_REQUEST['password']; 
$cod=$_POST['securityCode']; 
$band = 0;
$captch = $_SESSION['captcha'];

	if($captch != $cod){
		header("Location: registro_error_captcha_i.php");
	}else{
		echo "$email";
		 $link =  mysqli_connect("localhost", "root", "");
		mysqli_select_db($link,"libreria");
		$result=mysqli_query($link,"select correo from usuario");
		$_SESSION["tipo"] = 0;
		
		
		while($resultado = mysqli_fetch_assoc($result)){
				if($resultado['correo'] == $email)
				$band = 1;
		}
		
		if($band == 1)
		header("Location: registro_error_correo_i.php") ;
		 else{
			$_SESSION["k_username"] = $email;
		   mysqli_query($link,"INSERT INTO usuario(tipo, nombre, correo, contrasena, libros_solicitados, libros_propios) VALUES( '1', '$nombre', '$email', '$password', '0', '0')");
		   header("Location: index_u.php");
   }
		
	}
?> 