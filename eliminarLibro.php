<?php
    $id_libro = $_GET['id'];

    $link = mysqli_connect("localhost", "root", "");
    mysqli_select_db($link, "libreria");

    $result = mysqli_query($link, "SELECT estatus FROM libro WHERE id_libro = $id_libro");
    $rowResult = mysqli_fetch_assoc($result);
    $estatus = $rowResult['estatus'];

    if ($estatus != 2) {
        mysqli_query($link, "UPDATE libro SET estatus = 2 where id_libro = $id_libro");

        $actualizacion = mysqli_query($link, "SELECT propietario FROM libro WHERE id_libro = $id_libro"); //busca el usuario del prestamo
        $row = mysqli_fetch_assoc($actualizacion);
        $propietario = $row['propietario'];
        mysqli_query($link, "UPDATE usuario SET libros_propios = libros_propios - 1 WHERE id_usuario = $propietario");

        $actualizacion2 = mysqli_query($link, "SELECT id_usuario FROM prestamos WHERE id_libro = $id_libro AND estatus = 0"); //busca el usuario del prestamo
        $row2 = mysqli_fetch_assoc($actualizacion2);
        $id_usuario = $row2['id_usuario'];
        mysqli_query($link, "UPDATE usuario SET libros_solicitados = libros_solicitados - 1 WHERE id_usuario = $id_usuario"); //quita el libro de su contador de libros pedidos

        mysqli_query($link, "UPDATE prestamos SET estatus = 1 WHERE id_libro = $id_libro AND estatus = 0"); //"elimina" el prestamo
    }

    

    mysqli_close($link);

    header("location: descripcion_a.php?id=$id_libro");
?>