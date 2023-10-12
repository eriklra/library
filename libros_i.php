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
                          <li><a href="index_i.php">Inicio</a></li>
                          <li><a href="libros_i.php" class="active">Libros</a></li>
                          <li><a href="registro_i.php">Registrarse</a></li>
                          <li><a href="sesion_i.php">Iniciar Sesion</a></li> 
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
  <section class="section main-banner" style="height: 400px;" id="top" data-section="section1">
      <video autoplay muted loop id="bg-video">
          <source src="assets/images/video_fondo.mp4" type="video/mp4" />
      </video>

      <div class="video-overlay header-text">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="caption">
              <h2>Lista de Libros</h2>
              <p>Aquí podrás encontrar la lista de los libros que están registrados en esta plataforma.</p>
          </div>
              </div>
            </div>
          </div>
      </div>
  </section>
  <!-- ***** Main Banner Area End ***** -->

  <br>
  <div id="main">
    <div id="rightbar">
              <div class="container">
                <form class="row g-3" action="libros_i.php" method="post">
                  <div class="col-12">
                    <label for="titulo" class="form-label">Buscar por título</label>
                    <input type="text" class="form-control" name="titulo" placeholder="Ingrese el título">
                  </div>
                  <div class="col-md-6">
                    <label for="genero" class="form-label">Género literario</label>
                    <select class="form-select" name="genero">
                      <option value="" selected disabled hidden>Seleccionar género</option>
                      <option value="Aventura">Aventura</option>
                      <option value="Romance">Romance</option>
                      <option value="Policiaca">Policiaca</option>
                      <option value="Ciencia Ficcion">Ciencia Ficcion</option>
                      <option value="Poesia">Poesía</option>
                      <option value="Misterio">Misterio</option>
                      <!-- Agrega más opciones de género según tus necesidades -->
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label for="disponibilidad" class="form-label">Disponibilidad</label>
                    <select class="form-select" name="disponibilidad">
                      <option value="" selected disabled hidden>Seleccionar disponibilidad</option>
                      <option value=0>Disponible</option>
                      <option value=1>No disponible</option>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                  </div>
                </form>
              </div>
                <hr>
                <br>
                <p>
                    <?PHP
                    if (isset($_REQUEST['titulo'])) {
                      $titulo = $_REQUEST['titulo'];
                    }

                    if (isset($_REQUEST['genero'])) {
                      $genero = $_REQUEST['genero'];
                    }

                    if (isset($_REQUEST['disponibilidad'])) {
                      $disponibilidad = $_REQUEST['disponibilidad'];
                    }
                    

                    $link = mysqli_connect("localhost", "root", "");
                    mysqli_select_db($link, "libreria");
                    $query = "select * from libro WHERE estatus != 2";

                    if (!empty($titulo)) {
                      $query .= " AND nombre LIKE '%$titulo%'";
                    }
                    
                    if (!empty($genero)) {
                        $query .= " AND genero = '$genero'";
                    }
                    
                    if (!empty($disponibilidad) || (isset($_REQUEST['disponibilidad']) && $disponibilidad == 0)) {
                        $query .= " AND estatus = '$disponibilidad'";
                    }

                    $result = mysqli_query($link, $query);
                    echo "<div class='container'>";
                    echo "<div class='table-responsive'>";
                    echo "<table border='1' class='table'>";
                    echo "<thead class='thead-light'><tr><th scope='col'> ID </th><th scope='col'> PORTADA </th><th scope='col'> NOMBRE </th><th scope='col'> ESTADO </th><th scope='col'> AUTOR </th><th scope='col'> GENERO </th></tr></thead>";

                    while ($row = mysqli_fetch_array($result)) {
                        $id = $row['id_libro'];
                        $imagen = $row['imagen'];
                        $nombre = $row['nombre'];
                        $estatus = $row['estatus'];
                        $autor = $row['autor'];
                        $genero = $row['genero'];
                        
                        echo "<tr class='table-row table-hover' data-id='$id'>";
                        echo "<td>$id</td>";
                        echo "<td><img src='libros/$imagen' class='img-fluid' style='max-width: 70px; max-height: 80px;'</td>";
                        echo "<td>$nombre</td>";

                        if ($estatus == 0) {
                          echo "<td class='text-success'> Disponible </td>";
                        }else{
                          echo "<td class='text-warning'> Ocupado </td>";
                        }

                        echo "<td>$autor</td>";
                        echo "<td>$genero</td></tr>";

                    }
                    echo "</table>";
                    echo "</div>";
                    echo "</div>";
                    mysqli_close($link);
                    ?>
                </p>
                <div>
            </div>
  </div>

  <section class="our-courses" id="courses">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading">
            <h2>Libros Populares</h2>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="owl-courses-item owl-carousel">
            <div class="item">
              <img src="libros/libro3.jpg" alt="Course One">
              <div class="down-content">
                <h4>Juego de Tronos</h4>
                <div class="info">
                  <div class="row">
                    <div class="col-8">
                      <ul>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <img src="libros/libro6.jpg" alt="Course Two">
              <div class="down-content">
                <h4>Orgullo y Prejuicio</h4>
                <div class="info">
                  <div class="row">
                    <div class="col-8">
                      <ul>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <img src="libros/libro7.jpg" alt="">
              <div class="down-content">
                <h4>Bajo la misma estrella</h4>
                <div class="info">
                  <div class="row">
                    <div class="col-8">
                      <ul>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <img src="libros/libro8.jpg" alt="">
              <div class="down-content">
                <h4>El cuaderno de Noah</h4>
                <div class="info">
                  <div class="row">
                    <div class="col-8">
                      <ul>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <img src="libros/libro9.jpg" alt="">
              <div class="down-content">
                <h4>Uno siempre cambia al amor de su vida</h4>
                <div class="info">
                  <div class="row">
                    <div class="col-8">
                      <ul>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <img src="libros/libro10.jpg" alt="">
              <div class="down-content">
                <h4>Perdona si te llamo amor</h4>
                <div class="info">
                  <div class="row">
                    <div class="col-8">
                      <ul>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <img src="libros/libro13.jpg" alt="">
              <div class="down-content">
                <h4>Nunca</h4>
                <div class="info">
                  <div class="row">
                    <div class="col-8">
                      <ul>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
  </section>

  
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
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const tableRows = document.querySelectorAll('.table-row');
    tableRows.forEach(row => {
      row.addEventListener('mouseover', function() {
        this.style.cursor = 'pointer';
      });
      row.addEventListener('mouseout', function() {
        this.style.cursor = 'default';
      });
      row.addEventListener('click', function() {
        const id = this.getAttribute('data-id');
        window.location.href = 'descripcion_u.php?id=' + id;
      });
    });
  });
</script>
</html>