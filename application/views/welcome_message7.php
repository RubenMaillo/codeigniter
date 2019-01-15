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

      $sustituta='egoi';
      $cadena=str_replace($palabra, $sustituta, $cadena);

        echo $cadena;

      ?>
    </p>
  </div>
</body>
</html>
