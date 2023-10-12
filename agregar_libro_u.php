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
  </head>

<body>

<?php
session_start();
include('main/header.php');
?>
<script src="js/load_captcha.js"></script>
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
                          <li><a href="index_u.php" >Inicio</a></li>
                          <li><a href="libros_u.php">Libros</a></li>
						  <li class="has-sub">
                              <a href="javascript:void(0)"  class="active">Perfil</a>
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
  <?PHP
		
		$link =  mysqli_connect("localhost", "root", "");
		mysqli_select_db($link,"libreria");
		$correo = $_SESSION["k_username"];
		$result=mysqli_query($link,"SELECT * FROM usuario WHERE correo='$correo'");

    while($resultado = mysqli_fetch_array($result)){
      $nom=$resultado['nombre'];
		  $contr=$resultado['contrasena'];
      $id=$resultado['id_usuario'];
		  }
		mysqli_close($link);	
?>

  <section class="contact-us" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 align-self-center">
          <div class="row">
            <div class="col-lg-12">
            <?PHP
                $link =  mysqli_connect("localhost", "root", "");
                mysqli_select_db($link,"libreria");
                $correo = $_SESSION["k_username"];
                $result=mysqli_query($link,"SELECT id_usuario FROM usuario WHERE correo='$correo'");

                while($resultado = mysqli_fetch_array($result)){
                  $idu=$resultado['id_usuario'];
                  }
                mysqli_close($link);	
            ?>

              <form id="contact" action="agregar_libro.php" method="post" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-lg-12">
                    <h2>Corrige tus datos</h2>
                  </div>
                  <div class="col-lg-4">
                    <fieldset>
                    <input name="nombre" type="text" id="nombre"  placeholder=" Nombre del libro..." required="">
                  </fieldset>
                  </div>

                  <div class="col-lg-4">
                    <fieldset>
                    <input name="sinopsis" type="text" id="sinopsis"  placeholder="Sinopsis..." required="">
                  </fieldset>
                  </div>

                  <div class="col-lg-4">
                    <fieldset>
                    <input name="paginas" type="text" id="paginas"  placeholder="Número de páginas..." required="">
                  </fieldset>
                  </div>

                  <div class="col-lg-4">
                    <fieldset>
                    <input name="autor" type="text" id="autor"  placeholder="Autor..." required="">
                  </fieldset>
                  </div>

                  <div class="col-lg-4">
                    <fieldset>
                    <select class="form-select" name="genero">
                      <option value="" selected disabled hidden>Seleccionar género</option>
                      <option value="Aventura">Aventura</option>
                      <option value="Romance">Romance</option>
                      <option value="policiaca">Policiaca</option>
                      <option value="Ciencia Ficción">Aventura</option>
                      <option value="Poesía">Romance</option>
                      <option value="Misterio">Policiaca</option>
                      <!-- Agrega más opciones de género según tus necesidades -->
                    </select>
                  </fieldset>
                  </div>

                  <div class="col-lg-4">
                    <fieldset>Imagen del libro: 
                    <input name="imagen" type="file" id="imagen" required="">
                  </fieldset>
                  </div>

                  <?php echo " <input type='hidden' name='id1' value='$idu'>"; ?>

                  <div class="col-lg-12">
                    <fieldset>
                      <button type="submit" id="form-submit" class="button">Agregar Libro</button>
                    </fieldset>
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
    </script>
</body>

</body>
</html>