<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>Librería</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-edu-meeting.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/lightbox.css">
<!--

TemplateMo 569 Edu Meeting

https://templatemo.com/tm-569-edu-meeting

-->
<script LANGUAGE="JavaScript">
        function confirmSubmit() {
            var eli = confirm("Esta seguro de eliminar a este usuario?");
            if (eli) return true;
            else return false;
        }
    </script>
  </head>

<body>
<?php session_start();
if(!isset($_SESSION["k_username"])) header("Location:index_i.php");
if($_SESSION["tipo"] != 0) header("Location:index_u.php");
 ?>
  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
      <div class="container">
          <div class="row">
              <div class="col-12">
                <nav class="main-nav">
                      <!-- ***** Logo Start ***** -->
                      <a href="index.html" class="logo">
                          Librería
                      </a>
                      <!-- ***** Logo End ***** -->
                      <!-- ***** Menu Start ***** -->
              <ul class="nav">
                          <li><a href="index_a.php">Inicio</a></li>
                          <li><a href="libros_a.php">Libros</a></li>
                          <li><a href="usuarios_a.php" class="active">Usuarios</a></li>
						  <li class="has-sub">
                              <a href="javascript:void(0)">Prestamos</a>
                              <ul class="sub-menu">
                                  <li><a href="historial_prestamos_a">Historial</a></li>
                                  <li><a href="prestamos_activos_a">Activos</a></li>
                              </ul>
                          </li>
						  <li><a href="grafica_a.php">Grafica</a></li> 
						  <li><a href="informacion_admin_a.php">Perfil</a></li> 
                          <li><a href="salir.php">Cerrar Sesion</a></li> 
                      </ul>        
                      <a class='menu-trigger'>
                          <span>Menu</span>                    </a>
                    <!-- ***** Menu End ***** -->
                  </nav>
              </div>
          </div>
      </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <!-- ***** Main Banner Area Start ***** -->
  <section class="section main-banner" id="top" data-section="section1">
      <video autoplay muted loop id="bg-video">
          <source src="assets/images/video_fondo.mp4" type="video/mp4" />
      </video>

      <div class="video-overlay header-text">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="caption">
              <h2>Lista de usuarios</h2>
          </div>
              </div>
            </div>
          </div>
      </div>
  </section>
  <!-- ***** Main Banner Area End ***** -->
  <br>
  <br>
  <div id="main">
    <div id="rightbar">
              <div class="container">
                <form class="row g-3" action="usuarios_a.php" method="post">
                  <div class="col-md-6">
                    <label for="nombre" class="form-label">Buscar por nombre</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Ingrese el nombre del usuario">
                  </div>
                  <div class="col-md-6">
                    <label for="correo" class="form-label">Buscar por correo</label>
                    <input type="text" class="form-control" name="correo" placeholder="Ingrese el correo del usuario">
                  </div>
                  <div class="col-sm-3">
                    <label for="tipo" class="form-label">tipo</label>
                    <select class="form-select" name="tipo">
                      <option value="" selected disabled hidden>Seleccionar tipo</option>
                      <option value=0>Administrador</option>
                      <option value=1>usuario</option>
                      <option value=2>Eliminado</option>
                    </select>
                  </div>
                  <div class="col-sm-3">
                    <label for="librosSolicitados" class="form-label">libros solicitados</label>
                    <select class="form-control" name="librosSolicitados">
                      <option value="">...</option>
                      <?php
                      for ($i = 0; $i <= 3; $i++) {
                        echo "<option value='$i'>$i</option>";
                      }
                      ?>
                    </select>
                  </div>
                  <div class="col-sm-3">
                    <label for="librosPropios" class="form-label">libros propios</label>
                    <select class="form-control" name="librosPropios">
                      <option value="">...</option>
                      <?php
                      for ($i = 0; $i <= 10; $i++) {
                        echo "<option value='$i'>$i</option>";
                      }
                      ?>
                    </select>
                  </div>
                  <div class="col-sm-3">
                    <label for="id" class="form-label">ID usuario</label>
                    <input type="number" class="form-control" min="0" name="id" placeholder="Ingrese el id">
                  </div>
                  <div class="col-md-3">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                  </div>
                </form>
              </div>
                <hr>
                <br>

                  <?PHP
                    if (isset($_REQUEST['nombre'])) {
                      $nombreU = $_REQUEST['nombre'];
                    }

                    if (isset($_REQUEST['correo'])) {
                      $correoU = $_REQUEST['correo'];
                    }

                    if (isset($_REQUEST['tipo'])) {
                      $tipoU = $_REQUEST['tipo'];
                    }

                    if (isset($_REQUEST['librosPropios'])) {
                      $propios = $_REQUEST['librosPropios'];
                    }

                    if (isset($_REQUEST['librosSolicitados'])) {
                      $solicitados = $_REQUEST['librosSolicitados'];
                    }

                    if (isset($_REQUEST['id'])) {
                      $idU = $_REQUEST['id'];
                    }

                    $link = mysqli_connect("localhost", "root", "");
                    mysqli_select_db($link, "libreria");
                    $query = "select * from usuario WHERE 1";

                    if (!empty($nombreU)) {
                      $query .= " AND nombre LIKE '%$nombreU%'";
                    }

                    if (!empty($correoU)) {
                      $query .= " AND correo LIKE '%$nombreU%'";
                    }
                    
                    if (!empty($tipoU) || (isset($_REQUEST['tipo']) && $tipoU == 0)) {
                        $query .= " AND tipo = '$tipoU'";
                    }
                    
                    if (!empty($propios) || (isset($_REQUEST['librosPropios']) && $propios == 0)) {
                        $query .= " AND libros_propios = '$propios'";
                    }

                    if (!empty($solicitados) || (isset($_REQUEST['librosSolicitados']) && $solicitados == 0)) {
                      $query .= " AND libros_solicitados = '$solicitados'";
                    }

                    if (!empty($idU)) {
                      $query .= " AND id_usuario = $idU";
                    }



                    $result = mysqli_query($link, $query);

                    echo "<div class='container'>";
                    echo "<div class='table-responsive'>";
                    echo "<table border='2' class='table'>";
                    echo "<thead class='thead-light'><tr>";
                    echo "<th scope='col'> ID </th>";
                    echo "<th scope='col'> Tipo </th>";
                    echo "<th scope='col'> Nombre </th>";
                    echo "<th scope='col'> Correo </th>";
                    echo "<th scope='col'> Password </th>";
                    echo "<th scope='col'> Libros solicitados </th>";
                    echo "<th scope='col'> Libros propios </th>";
                    echo "<th scope='col'> Eliminar </th>";
                    echo "<th scope='col'> Actualizar </th>";
                    echo "</tr></thead>";

                    while ($row = mysqli_fetch_array($result)) {
                        $id = $row['id_usuario'];
                        $tipo = $row['tipo'];
                        $nombre = $row['nombre'];
                        $correo = $row['correo'];
                        $contrasena = $row['contrasena'];
                        $lsolicitados = $row['libros_solicitados'];
                        $lpropios= $row['libros_propios'];
                        
                        echo "<tr class='table-row table-hover' data-id='$id'>";
                        echo "<td>$id</td>";

                        if ($tipo == 0) {
                          echo "<td class='text-primary'> Administrador </td>";
                        }else if($tipo == 1){
                          echo "<td class='text-dark'> Usuario </td>";
                        } else {
                          echo "<td class='text-danger'> Eliminado </td>";
                        }

                        echo "<td>$nombre</td>";
                        echo "<td>$correo</td>";
                        echo "<td>$contrasena</td>";
                        echo "<td>$lsolicitados</td>";
                        echo "<td>$lpropios</td>";
                        echo "<td><a onclick=\"return confirmSubmit()\"href=\"eliminarUsuario.php?id_usuario=$id\"><img src='libros/eliminar.png' width='50' height='50' border='0'class='no-border'></a></td>";
                        echo "<td><a href=\"actualizarUsuario.php?id_usuario=$id\"><img src='libros/actualizar.png' width='50' height='50' border='0'class='no-border'></a></td>";

                    }
                    echo "</table>";
                    echo "</div>";
                    echo "</div>";
                    mysqli_close($link);
                  ?>
            </div>
                  
  </div>


  <section class="contact-us" id="contact">
    <div class="container">
    </div>
    <div class="footer">
      <p>Para dudas y aclaraciones contáctese a cualquiera de los siguientes números de telefono: 
          <br>4211067637, 2223810929, 2225805115 <br> o a los correos: <br><a href="https://templatemo.com" target="_parent" title="free css templates">jose.alcantar@alumno.buap.mx, denisse.herreram@alumno.buap.mx, erik.lara@alumno.buap.mx</a></p>
    </div>
  </section>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/isotope.min.js"></script>
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/lightbox.js"></script>
    <script src="assets/js/tabs.js"></script>
    <script src="assets/js/video.js"></script>
    <script src="assets/js/slick-slider.js"></script>
    <script src="assets/js/custom.js"></script>
    <script>
        //according to loftblog tut
        $('.nav li:first').addClass('active');

        var showSection = function showSection(section, isAnimate) {
          var
          direction = section.replace(/#/, ''),
          reqSection = $('.section').filter('[data-section="' + direction + '"]'),
          reqSectionPos = reqSection.offset().top - 0;

          if (isAnimate) {
            $('body, html').animate({
              scrollTop: reqSectionPos },
            800);
          } else {
            $('body, html').scrollTop(reqSectionPos);
          }

        };

        var checkSection = function checkSection() {
          $('.section').each(function () {
            var
            $this = $(this),
            topEdge = $this.offset().top - 80,
            bottomEdge = topEdge + $this.height(),
            wScroll = $(window).scrollTop();
            if (topEdge < wScroll && bottomEdge > wScroll) {
              var
              currentId = $this.data('section'),
              reqLink = $('a').filter('[href*=\\#' + currentId + ']');
              reqLink.closest('li').addClass('active').
              siblings().removeClass('active');
            }
          });
        };

        $('.main-menu, .responsive-menu, .scroll-to-section').on('click', 'a', function (e) {
          e.preventDefault();
          showSection($(this).attr('href'), true);
        });

        $(window).scroll(function () {
          checkSection();
        });
    </script>
</body>

</body>
</html>