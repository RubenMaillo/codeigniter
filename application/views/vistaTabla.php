

  <?php
  defined('BASEPATH') OR exit ('No direct script access allowed');
  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Formulario de Registro</title>
  </head>

  <body>
  <h1>Ejercicio 12</h1>
  <p>Crear tabla de 10x10</p>
    <?php

    //creamos una tabla con valor=1 que irá aumentando cada vez que creamos una celda, así hasta que tengamos una tabla de 10x10
    $valor=1;
      echo '<table border="1px">';
      for ($i=0; $i<10;$i++){
        echo '<tr>';
        for ($j=0; $j<10;$j++){

          echo '<td>'.$valor.'</td>';
          $valor++;
        }
      echo '</tr>';

      }
      echo '</table>';

  ?>

  </body>
  </html>
