<?php
  session_start();
  setlocale(LC_TIME, 'es_MX');

  $id_usuario = $_SESSION['ID'];
  $correoUsuario = $_SESSION['k_username'];

  $id_libro = $_REQUEST['libro'];
  $nombreLibro = $_REQUEST['nombre'];
  $propietario = $_REQUEST['propietario'];
  $fecha_entrega = $_REQUEST['entrega'];
  $fecha_regreso = $_REQUEST['regreso'];

  $fechaInsertar = "27/05/2023";

  $entregaMySQL = date('Y-m-d', strtotime(str_replace('/', '-', $fecha_entrega)));
  $regresoMySQL = date('Y-m-d', strtotime(str_replace('/', '-', $fecha_regreso)));

  echo "$entregaMySQL";
  echo "$regresoMySQL";

  $link = mysqli_connect("localhost", "root", "");
  mysqli_select_db($link, "libreria");

  mysqli_query($link,"INSERT INTO prestamos (fecha_entrega, id_libro, id_usuario, fecha_regreso, estatus) VALUES ('$entregaMySQL', $id_libro, $id_usuario, '$regresoMySQL', 0)");
  mysqli_query($link,"UPDATE libro SET estatus = 1 WHERE id_libro = '$id_libro'");
  mysqli_query($link,"UPDATE usuario SET libros_solicitados = libros_solicitados + 1 WHERE id_usuario = '$id_usuario'");
  mysqli_close($link); 
  

?>
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<!--

TemplateMo 569 Edu Meeting

https://templatemo.com/tm-569-edu-meeting

-->
  </head>

<body>


  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
      <div class="container">
          <div class="row">
              <div class="col-12">
                <nav class="main-nav">
                      <!-- ***** Logo Start ***** -->
                      <a href="index_u.html" class="logo">
                          Librería
                      </a>
                      <!-- ***** Logo End ***** -->
                      <!-- ***** Menu Start ***** -->
                      <ul class="nav">
                          <li><a href="index_u.php">Inicio</a></li>
                          <li><a href="libros_u.php" class="active">Libros</a></li>
						              <li class="has-sub">
                              <a href="javascript:void(0)">Perfil</a>
                              <ul class="sub-menu">
                                  <li><a href="informacion_usuario_u.php">Mi Informacion</a></li>
                                  <li><a href="libros_usuario_u.php">Mis Libros</a></li>
								                  <li><a href="prestamos_usuario_u">Mis Prestamos</a></li>
                                  <li><a href="devoluciones_usuario_u">Mis Devoluciones</a></li>
                              </ul>
                          </li>
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
  <br>
  <section class="contact-us" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 align-self-center">
          <div class="row">
            <div class="col-lg-12">
              <form id="contact" action="prestamoRealizado_u.php" method="post">
                <div class="row">
                  <div class="col-lg-12">
                    <h2>Préstamo realizado</h2>
                    <div class="rounded-circle bg-success text-center" style="width: 100px; height: 100px; margin: 0 auto;">
                      <i class="fas fa-check text-white" style="font-size: 50px; line-height: 100px;"></i>
                    </div>
                    <div class="text-center mt-4">
                      <p> <?php echo "$nombreLibro";?> </p>
                      <p><strong>Entrega:</strong> <?php echo "$fecha_entrega";?> </p>
                      <p><strong>Regreso:</strong> <?php echo "$fecha_regreso";?> </p>
                    </div>
                    <div class="text-center mt-4">
                    <a href="libros_u.php" class="btn btn-primary bg-success">Aceptar</a>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
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
        function redirigir() {
          window.location.href = "libros_u.php";
        }
    </script>
</body>
</html>