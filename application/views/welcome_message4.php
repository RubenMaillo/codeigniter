<?php
defined('BASEPATH') OR exit ('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Ejercicio 4</title>

</head>
<body>

  <div id="container">
    <p>
      <?php

      //obtenemos la cadena1 y la convertimos de minúsculas a mayúsculas mediante el método (strtoupper)
       $cadena1=strtoupper($cadena1);
       //obtenemos la cadena2 y la convertimos de mayúsculas a minúsculas mediante el método (strtolower)
       $cadena2=strtolower($cadena2);
       //obtenemos la cadena3 y convertimos la primera letra en mayúsculas mediante el método (ucfirst)
       $cadena3=ucfirst($cadena3);
       //obtenemos la cadena4 y sustituimos los espacios en blanco por cadenas vacías mediante el método (str_replace)
       $cadena4=str_replace(' ','', $cadena4);

       //mostramos las soluciones
       echo '1.- '.$cadena1.'<br>';
       echo '2.- '.$cadena2.'<br>';
       echo '3.- '.$cadena3.'<br>';
       echo '4.- '.$cadena4.'<br>';

      ?>
    </p>
  </div>
</body>
</html>
