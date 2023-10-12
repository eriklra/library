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
  <div id="main">
  <h1>Actualizar Usuario:</h1>
                <p>
                <?PHP
                include("conexion.php");
                $link = Conectarse();
                $id = $_GET['id_usuario'];
                $usuario = mysqli_query($link, "select nombre from usuario where id_usuario='$id'");
                $usuario1 = mysqli_query($link, "select correo from usuario where id_usuario='$id'");
                $usuario2 = mysqli_query($link, "select contrasena from usuario where id_usuario='$id'");
                $row = mysqli_fetch_array($usuario);
                $row1 = mysqli_fetch_array($usuario1);
                $row2 = mysqli_fetch_array($usuario2);
                $nom = $row['nombre'];
                $correo = $row1['correo'];
                $contrasena = $row2['contrasena']
                ?>
                <form action="actualizarUsu" method="post">
                    <p>
                        <label for="nombre">Nombre:</label>
                        <?PHP
                        echo "<input type='hidden' name='id' value='$id'>";
                        echo"<input type='text' name='nombre' value ='$nom' size='30' required />"; 
                        ?>
                        <label for="nombre">Correo:</label>
                        <?PHP
                        echo "<input type='hidden' name='id' value='$id'>";
                        echo"<input type='text' name='correo' value ='$correo' size='30' required />"; 
                        ?>
                        <label for="nombre">Contraseña:</label>
                        <?PHP
                        echo "<input type='hidden' name='id' value='$id'>";
                        echo"<input type='text' name='contrasena' value ='$contrasena' size='30' required />"; 
                        ?>
                        <br> <br>
                        <input class="button" type="submit" name="enviar" value="Actualizar">
                    </p>
                </form>
                </p>
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