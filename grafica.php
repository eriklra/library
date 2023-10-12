<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bar Chart</title>
    <script src="js/chart.js"></script>
</head>
<body>

    <canvas id="BarChart" style="max-width:600px;max-height:600px"></canvas>
    <?php

            $aventura = 0;
            $policiaca = 0;
            $romance = 0;
            $cienciaFiccion = 0;
            $poesia = 0;
            $misterio = 0;

            $link = mysqli_connect("localhost", "root", "");
            mysqli_select_db($link, "libreria");
            $result = mysqli_query($link, "select genero from libro");
            while ($row = mysqli_fetch_array($result)) {
              switch ($row['genero']) {
                case 'Aventura':
                    $aventura += 1;
                    break;
                case 'Romance':
                    $romance += 1;
                    break;
                case 'Policiaca':
                    $policiaca += 1;
                    break;
                case 'Ciencia Ficcion':
                    $cienciaFiccion += 1;
                    break;
                case 'Poesia':
                    $poesia += 1;
                    break;
                case 'Misterio':
                    $misterio += 1;
                    break;
            }
            }
    ?>

    <script>
        const ctx = document.getElementById('BarChart');

        const nameLabels =
        [
            "<?php echo 'Aventura'; ?>",
            "<?php echo 'Romance'; ?>",
            "<?php echo 'Policiaca'; ?>",
            "<?php echo 'Ciencia Ficcion'; ?>",
            "<?php echo 'Misterio'; ?>",
            "<?php echo 'Poesia'; ?>",
        ];
        $a = 1;
        const valuesData =
        [
           

            <?php echo $aventura; ?>,
            <?php echo $romance; ?>,
            <?php echo $policiaca; ?>,
            <?php echo $cienciaFiccion; ?>,
            <?php echo $misterio; ?>,
            <?php echo $poesia; ?>
        ];
        

        const data =
        {
            labels: nameLabels,
            datasets:
            [{
                label: 'Cantidad',
                data: valuesData,
                backgroundColor:        //  Color de las barras
                [
                    'rgba(255, 99, 132, 0.2)',  //  Puede ser representado con el modelo de color RGB, HSL y HEX
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(201, 203, 207, 0.2)'
                ],
                borderColor:            //  Color de los bordes
                [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(153, 102, 255)',
                    'rgb(201, 203, 207)'
                ],
                borderSkipped: 'bottom',    //  bottom, left, top, right    Por donde omitir el borde
                borderWidth: 2,             //  Ancho de los bordes (px)
                borderRadius: 5,           //  Radio de los bordes (px)
                barPercentage: 0.7,        //  Hacer mas ancho las barras   (0-1)
                hoverBackgroundColor:       //  Cambiar el color de las barras cuando pase el cursor
                [
                    '#ff5555',
                    '#ffb86c',
                    '#f1fa8c',
                    '#50fa7b',
                    '#8be9fd',
                    '#bd93f9',
                    '#ff79c6'
                ],
                hoverBorderColor: 'rgb(40, 42, 54)',    //  Color de los bordes
                hoverBorderWidth: 4,                    //  Grosor de los bordes (px)
                hoverBorderRadius: 20                   //  Radio de los bordes (px)    Un valor mas alto los bordes seran mas curvos
            }]
        };

        const config =
        {
            type: 'bar',        //  Tipo de grafica
            data: data,
            options:
            {
                indexAxis: 'x',     //  Barras horizonaltes = 'y'; barras verticas = 'x'
                scales:
                {
                    y:
                    {
                        beginAtZero: true
                    }
                }
            },
        };

        new Chart(ctx, config);
    </script>
    <center>
    <div class="main-button-red">
                  <a href="grafica_a.php">V o l v e r</a>
    </div>
    </center>
    

    <style type = "text/css" media = "screen">
      .main-button-red a {
  font-size: 13px;
  color: #fff;
  background-color: #a12c2f;
  padding: 12px 30px;
  display: inline-block;
  border-radius: 22px;
  font-weight: 500;
  text-transform: uppercase;
  transition: all .3s;
}
    </style>
</body>
</html>