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

  <h1>Ejercicio 11</h1>
  <p>Mostrar los primeros 50 números de la sucesión de Fibonacci</p>

  <?php

  //si el array tiene datos, lo mostramos 
    if (isset($recibido)){

      for ($i=0;$i<count($recibido);$i++){

        echo $recibido[$i];

      }

    }



?>

</body>
</html>
