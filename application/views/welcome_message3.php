<?php
defined('BASEPATH') OR exit ('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Ejercicio 3</title>

</head>
<body>

  <div id="container">
    <p>
      <?php
      //tenemos un valor mínimo (1) y un valor máximo (50), vamos a obtener los pares que se comprenden entre estos dos números
      for ($minimo;$minimo<$maximo;$minimo++){
        //para ello comprobamos que el resto de dividir el número mínimo actual entre 2 sea 0
        if (($minimo%2)==0){

          echo $minimo.'<br>';

        }

      }

      ?>
    </p>
  </div>
</body>
</html>
