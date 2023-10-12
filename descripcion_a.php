<?php
  session_start();

  if (isset($_SESSION['k_username'])) {
      $correo = $_SESSION['k_username'];
      $id_usuario = $_SESSION["ID"];
  } else {
      header("Location: sesion_i.php");
      exit;
  }

  $id_libro = $_GET['id'];
  $link = mysqli_connect("localhost", "root", "");
  mysqli_select_db($link, "libreria");
  $result = mysqli_query($link, "select * from libro where id_libro = $id_libro");
  $row = mysqli_fetch_assoc($result);

  $nombre = $row['nombre'];
  $genero = $row['genero'];
  $estatus = $row['estatus'];
  $sinopsis = $row['sinopsis'];
  $paginas = $row['paginas'];
  $imagen = $row['imagen'];
  $autor = $row['autor'];
  $propietario = $row['propietario'];

  $usuario = mysqli_query($link, "select nombre from usuario where id_usuario = $propietario");
  $row = mysqli_fetch_assoc($usuario);
  $nombrePropietario = $row['nombre'];

  $usuario2 = mysqli_query($link, "select libros_solicitados from usuario where id_usuario = $id_usuario");
  $row = mysqli_fetch_assoc($usuario2);
  $pedidos = $row['libros_solicitados'];

  setlocale(LC_TIME, 'es_MX');
  $fechaActual = date('Y-m-d');

  echo "$fechaActual";
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
<!--

TemplateMo 569 Edu Meeting

https://templatemo.com/tm-569-edu-meeting

-->
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
                          <li><a href="libros_a.php" class="active">Libros</a></li>
                          <li><a href="usuarios_a.php">Usuarios</a></li>
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
  
  <section class="contact-us" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-md-4 right-info">
          <!-- Contenedor de la imagen -->
          <?php echo "<img src='libros/$imagen.' class='img-fluid'  style='max-width: 400px; max-height: 650px;' alt='Imagen'>"; ?>
        </div>
          <div class="col-md-8" id="contact">
          <!-- Contenedor de la información -->
            <div class="col-lg-12 d-flex justify-content-end">
              
              <?php echo "<a href='modificarLibro.php?id=$id_libro' class='btn btn-secondary' style='margin-right: 10px; border-radius: 30px; padding: 12px 25px; text-transform: uppercase; font-size: 13px;'>Modificar</a>";?>

              <?php echo "<a onclick=\"return confirmSubmit()\" href='eliminarLibro.php?id=$id_libro' class='btn btn-primary' style='margin-left: 10px; background-color: #a12c2f; border-radius: 30px; border-color: #a12c2f; padding: 12px 25px; text-transform: uppercase; font-size: 13px;'>Eliminar</a>";?>

            </div>  
            <h2><?php echo "$nombre" ?></h2>
                  

            <ul>
              <li class="mb-2">
                <h6 >Status</h6>
                <?php 
                  if ($estatus == 0) {
                    echo "<p class='text-success'> Disponible </p>";
                  }else if($estatus == 1){
                    echo "<p class='text-warning'> Ocupado </p>";
                  } else {
                    echo "<p class='text-danger'> Eliminado </p>";
                  }
                ?>
              </li>
              <li class="mb-2">
                <h6 >Genero</h6>
                <p><?php echo "$genero" ?></p>
              </li>
              <li class="mb-2">
                <h6 >No. Paginas</h6>
                <p><?php echo "$paginas" ?></p>
              </li>
              <li class="mb-2">
                <h6 >Autor</h6>
                <p><?php echo "$autor" ?></p>
              </li>
              <li class="mb-2">
                <h6 >Sinopsis</h6>
                <p style="text-align: justify;"><?php echo "$sinopsis" ?></p>
              </li>
              <li class="mb-2">
                <h6 >Propietario</h6>
                <p><?php echo "$nombrePropietario" ?></p>
              </li>
            </ul>
            <br>
            <?php 
              if ($estatus == 0 && $pedidos < 3) {
                echo "<form action='prestamo_a.php' method='post'>
                        <input type='hidden' name='libro' value=$id_libro>
                        <input type='hidden' name='nombre' value='$nombre'>
                        <input type='hidden' name='propietario' value='$nombrePropietario'>
                        <button type='submit' class='btn btn-primary btn-lg bg-success'>Préstamo</button>
                      </form>";
              } else {

                if ($pedidos >= 3) {
                  echo "<button class='btn btn-primary btn-lg'  disabled> Límite de préstamos alcanzado (3) </button>";
                } else {
                  echo "<button class='btn btn-primary btn-lg'  disabled> No disponible </button>";
                }
                
              }
              
            ?>
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
<script LANGUAGE="JavaScript">
  function confirmSubmit(){
    var eli=confirm("Esta seguro de eliminar este registro?");
    if (eli) return true ;
    else return false ;
  }
</script>
</html>