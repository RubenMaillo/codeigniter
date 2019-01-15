<?php
defined('BASEPATH') OR exit ('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" type="text/css" href="../../../configuracion/css/estilos2.css">
  <meta charset="utf-8">
  <title>Behobia (Egoi Perez)</title>
</head>
<body>
<div id="d1">

  <header>
    <p id="head">Behobia V2</p>
  </header>

</div>

<div id="d2">

  <h2>Datos del corredor con Número de dorsal: <?= $arr['num_dorsal'] ?></h2>
  <aside id="migaPan">
    <p><a href="../../../../index.php/ControladorBehobiaV2">Home</a>
    --- Información</p>
  </aside>
  <div id="nuevoCorredor">
      <?php

        if ($arr['tiempo']!="ABANDONA"){

          $minutos1=0;
          $horas1=0;

          while ($arr['tiempo']>=60){

                $arr['tiempo']-=60;
                $minutos1++;

          }

          while ($minutos1>=60){

              $minutos1-=60;
              $horas1++;

            }

           $resultados=$horas1.':'.$minutos1.':'.$arr['tiempo'];

            echo '<table id="tablaDatos" border="2">';
              echo '<tr id="camposCorr">';
                echo '<td>Num. Dorsal</td>';
                echo '<td>Nombre</td>';
                echo '<td>Apellidos</td>';
                echo '<td>Procedencia</td>';
                echo '<td>Tiempo</td>';
                echo '<td>Imagen</td>';
              echo '</tr>';

              echo '<tr id="verde">';
                echo '<td>'.$arr['num_dorsal'].'</td>';
                echo '<td>'.$arr['nombre'].'</td>';
                echo '<td>'.$arr['apellidos'].'</td>';
                echo '<td>'.$arr['procedencia'].'</td>';
                echo '<td>'.$resultados.'</td><br>';
                echo '<td><img width=90px height=90px src="../../../../configuracion/imagenes/'.$arr['imagen'].'"/></td><br>';
              echo '</tr>';
            echo '</table><br><br><br><br>';

        }else{

            echo '<table id="tablaDatos" border="2">';
              echo '<tr id="camposCorr">';
                echo '<td>Num. Dorsal</td>';
                echo '<td>Nombre</td>';
                echo '<td>Apellidos</td>';
                echo '<td>Procedencia</td>';
                echo '<td>Tiempo</td>';
                echo '<td>Imagen</td>';
              echo '</tr>';

              echo '<tr id="rojo">';
                echo '<td>'.$arr['num_dorsal'].'</td>';
                echo '<td>'.$arr['nombre'].'</td>';
                echo '<td>'.$arr['apellidos'].'</td>';
                echo '<td>'.$arr['procedencia'].'</td>';
                echo '<td>'.$arr['tiempo'].'</td><br>';
                echo '<td><img width=90px height=90px src="../../../../configuracion/imagenes/'.$arr['imagen'].'"/></td><br>';
              echo '</tr>';
            echo '</table><br><br><br><br>';

        }

      ?>
</div>
</div>
<div id="d3">
  <footer>
    <p id="footText">Página creada por Egoi Perez con CodeIgniter 2018-<?= $fecha?></p>
  </footer>
</div>

</body>
</html>
