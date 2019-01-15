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
    <p id="head">Behobia</p>
  </header>
</div>
<div id="d2">
  <h1>Corredores</h1>
  <?php

echo '<table id="tablaCorredores" border="5">';
    echo '<tr id="camposCorr">';
      echo '<td>Nombre</td>';
      echo '<td>Apellidos</td>';
      echo '<td>Procedencia</td>';
      echo '<td>Tiempo</td>';
    echo '</tr>';

    for ($i=0;$i<count($arrayOrden);$i++){

      if ($arrayOrden[$i]->tiempo!='ABANDONA'){

        $minutos1=0;
        $horas1=0;

        while ($arrayOrden[$i]->tiempo>=60){

            $arrayOrden[$i]->tiempo-=60;
            $minutos1++;

          }

          while ($minutos1>=60){

              $minutos1-=60;
              $horas1++;

            }

             $resultados=$horas1.':'.$minutos1.':'.$arrayOrden[$i]->tiempo;

        echo '<tr id="verde">';
          echo '<td>'.$arrayOrden[$i]->nombre.'</td>';
          echo '<td>'.$arrayOrden[$i]->apellidos.'</td>';
          echo '<td>'.$arrayOrden[$i]->procedencia.'</td>';
          echo '<td>'.$resultados.'</td><br>';
        echo '</tr>';

    }else{

      echo '<tr id="rojo">';
        echo '<td>'.$arrayOrden[$i]->nombre.'</td>';
        echo '<td>'.$arrayOrden[$i]->apellidos.'</td>';
        echo '<td>'.$arrayOrden[$i]->procedencia.'</td>';
        echo '<td>'.$arrayOrden[$i]->tiempo.'</td><br>';
      echo '</tr>';

    }

    }
    echo '</table><br><br><br><br>';

    echo '<div id="nuevoCorr">';
      echo form_open("ControladorBehobia/nuevoCorredor");
      echo form_submit('btnSubmit', 'Nuevo corredor');
      echo form_close();
    echo '</div>';


    ?>
</div>
<div id="d3">
<footer>
  <p id="footText">Página creada por Egoi Perez con CodeIgniter 2018-<?= $fecha?></p>
</footer>
</div>

</body>
</html>
