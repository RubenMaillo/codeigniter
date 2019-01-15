<?php
defined('BASEPATH') OR exit ('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Ejercicio 5</title>

</head>
<body>

  <div id="container">
    <p>
      <?php

      //obtenemos la longitud de la cadena1
      $lon1=strlen($cadena1);
      //obtenemos la longitud de la cadena2
      $lon2=strlen($cadena2);

      //comprobamos si la longitud de la primera cadena es mayor, igual o menor a la de la segunda, en base a eso se muestran los valores (1, 0, -1) respectivamente
      if ($lon1>$lon2){

        echo '1';

      }

      if ($lon1==$lon2){

        echo '0';

      }

      if ($lon1<$lon2){

        echo '-1';

      }

      ?>
    </p>
  </div>
</body>
</html>
