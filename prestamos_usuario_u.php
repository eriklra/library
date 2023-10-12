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
<?php session_start();
if(!isset($_SESSION["k_username"])) header("Location:index_i.php");
if($_SESSION["tipo"] != 1) header("Location:index_a.php");
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
                          <li><a href="index_u.php">Inicio</a></li>
                          <li><a href="libros_u.php">Libros</a></li>
						  <li class="has-sub">
                              <a href="javascript:void(0)" class="active">Perfil</a>
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
              <h2>Mis Préstamos</h2>
          </div>
              </div>
            </div>
          </div>
      </div>
  </section>
  <!-- ***** Main Banner Area End ***** -->

  <div id="main">
  <div id="rightbar">
            </div>
            <br>
            <br>
                <p>
                    <?PHP
                    $link1 =  mysqli_connect("localhost", "root", "");
                    mysqli_select_db($link1,"libreria");
                    $correo = $_SESSION["k_username"];
                    $result1=mysqli_query($link1,"SELECT * FROM usuario WHERE correo='$correo'");
                
                    while($resultado1 = mysqli_fetch_array($result1)){
                      $id1=$resultado1['id_usuario'];
                      }
                    mysqli_close($link1);	

                    $link2 =  mysqli_connect("localhost", "root", "");
                    mysqli_select_db($link2,"libreria");
                    $result2=mysqli_query($link2,"SELECT * FROM prestamos");
                
                     echo "<div class='container'>";
                     echo "<div class='table-responsive'>";
                     echo "<table border='1' class='table'>";
                     echo "<thead class='thead-light'><tr><th scope='col'> ID </th><th scope='col'> PORTADA </th><th scope='col'> NOMBRE </th><th scope='col'> FECHA DE ENTREGA </th><th scope='col'> FECHA DE REGRESO </th><th scope='col'> GENERO </th></tr></thead>";

                     while($resultado2 = mysqli_fetch_array($result2)){
                      $id2=$resultado2['id_usuario'];
                      $id3=$resultado2['id_libro'];
                      $fecha1=$resultado2['fecha_entrega'];
                      $fecha2=$resultado2['fecha_regreso'];


                      $link = mysqli_connect("localhost", "root", "");
                      mysqli_select_db($link, "libreria");
                      $result = mysqli_query($link, "select * from libro");
                     while ($row = mysqli_fetch_array($result)) {
                         $id = $row['id_libro'];
                         $imagen = $row['imagen'];
                         $nombre = $row['nombre'];
                         $estatus = $row['estatus'];
                         $autor = $row['autor'];
                         $genero = $row['genero'];
                         $propietario = $row['propietario'];
                         if($id3 == $id){
                          
                          if($id1 == $propietario){
                         echo "<tr class='table-row table-hover' data-id='$id'>";
                         echo "<td>$id</td>";
                         echo "<td><img src='libros/$imagen' class='img-fluid' style='max-width: 70px; max-height: 80px;'</td>";
                         echo "<td>$nombre</td>";
                         echo "<td>$fecha1</td>";
                         echo "<td>$fecha2</td>";
                         echo "<td>$genero</td></tr>";}
                          }
 
                     }
                    }
                     echo "</table>";
                     echo "</div>";
                     echo "</div>";
                    
                     mysqli_close($link);
                     mysqli_close($link2);
                    ?>
                </p>
                <div>

            </div>
  </div>
  <br>
  <br>
 <section class="contact-us" id="contact">
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