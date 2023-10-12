<?php
    session_start();
    $correo = $_SESSION['k_username'];
    $id_usuario = $_SESSION["ID"];

    $id_libro = $_REQUEST['libro'];
    $nombre = $_REQUEST['nombre'];
    $genero = $_REQUEST['genero'];
    $estatus = $_REQUEST['estatus'];
    $sinopsis = $_REQUEST['sinopsis'];
    $paginas = $_REQUEST['paginas'];
    $imagen = $_FILES['imagen']['name'];
    $autor = $_REQUEST['autor'];

    

    

    $link = mysqli_connect("localhost", "root", "");
    mysqli_select_db($link, "libreria");

    $result = mysqli_query($link, "SELECT estatus, imagen FROM libro WHERE id_libro = $id_libro");
    $row = mysqli_fetch_assoc($result);
    $estadoBD = $row['estatus'];
    $imagenBD = $row['imagen'];

    if (!empty($imagen)) {
        $dest = "libros/";
        $nom = $_FILES['imagen']['tmp_name'];
        copy($nom,$dest.$im);
    } else {
        $imagen = $imagenBD;
    }

    mysqli_query($link, "UPDATE libro SET nombre = '$nombre', genero = '$genero', estatus = $estatus, sinopsis = '$sinopsis', paginas = $paginas, imagen = '$imagen', autor = '$autor' WHERE id_libro = $id_libro");

    if ($estatus != $estatusBD){

        if ($estatus == 0) {

            $actualizacion = mysqli_query($link, "SELECT id_usuario FROM prestamos WHERE id_libro = $id_libro AND estatus = 0");
            $row = mysqli_fetch_assoc($actualizacion);
            $id_usuarioPrestamo = $row['id_usuario'];

            mysqli_query($link, "UPDATE usuario SET libros_solicitados = libros_solicitados - 1 WHERE id_usuario = $id_usuarioPrestamo");
            mysqli_query($link, "UPDATE prestamos SET estatus = 1 WHERE id_libro = $id_libro AND estatus = 0");

        }
        
    }

    mysqli_close($link);

    header("Location: descripcion_a.php?id=$id_libro");
?>