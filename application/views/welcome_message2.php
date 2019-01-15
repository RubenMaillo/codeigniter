<?php
defined('BASEPATH') OR exit ('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Ejercicio 2</title>

</head>
<body>

  <div id="container">
    <p>
      <?php
      //creamos un indice para recorrer la cadena caracter a caracter
      $indice=0;
      //tenemos un boolean verificar para saber si el caracter que buscamos se encuentra en la cadena
      $verificar=false;

      //mientras que el indice sea menor que la longitud de la cadena comprobamos los caracteres
      while ($indice<strlen($cadena)){
        //si el caracter actual es igual a cualquiera entre (' ', '.' y '-') entonces entrará en el if y marcará el boolean como true
        if (($cadena[$indice]==$blanco)||($cadena[$indice]==$punto)||($cadena[$indice]==$guion)){

          echo 'Se ha encontrado';
          $verificar=true;
          break;

        }

        $indice++;

      }
      //si no ha entrado en el if anterior, significa que ha comprobado todos los caracteres de la cadena y no ha encontrado los que buscaba
      if (!$verificar){

        echo 'No se ha encontrado';

      }

 ?>
    </p>
  </div>
</body>
</html>
