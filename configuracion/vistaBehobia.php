<?php
defined('BASEPATH') OR exit ('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" type="text/css" href="../../../configuracion/css/estilos.css">
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

    echo '<table id="tablaCorredores">';
    echo '<tr>';
      echo '<td>Nombre</td>';
      echo '<td>Apellidos</td>';
      echo '<td>Procedencia</td>';
      echo '<td>Tiempo</td>';
    echo '</tr>';

    for ($i=0;$i<count($arrayOrden);$i++){

      echo '<tr>';
        echo '<td>'.$arrayOrden[$i]->nombre.'</td>';
        echo '<td>'.$arrayOrden[$i]->apellidos.'</td>';
        echo '<td>'.$arrayOrden[$i]->procedencia.'</td>';
        echo '<td>'.$arrayOrden[$i]->tiempo.'</td><br>';
      echo '</tr>';

    }
    echo '</table><br>';

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
