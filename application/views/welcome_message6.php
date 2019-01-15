<?php
defined('BASEPATH') OR exit ('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Ejercicio 6</title>

</head>
<body>

  <div id="container">
    <p>
      <?php
      //guardamos la cadena obtenida en una auxiliar por lo que pueda pasar
      $auxiliar=$cadena;
      //creamos un array para ir metiendo las subcadenas obtenidas
      $subcadenas=array();
      //calculamos el número de blancos que hay en la oración introducida
      $maximoB=count(explode(' ', $cadena));

        //mediante este for obtenemos la primera palabra de la oración y la introducimos en el array, una vez introducida se saca de la oración
        for ($indice=0; $indice<($maximoB-1);$indice++){
          //este if comprueba que siga habiendo blancos en la frase
        if ((strpos($cadena, ' '))!=-1){

          $subcadenas[$indice]=substr($cadena, 0, strpos($cadena, ' '));
          $cadena=substr($cadena, ((strpos($cadena, ' '))+1), strlen($cadena));
          //mostramos los resultados
          echo 'Cadena extraída '.($indice+1).'.- '.$subcadenas[$indice].'<br>';

        }
      }
        //al quedar una sola palabra en la oración, simplemente se añade al siguiente hueco que haya libre en el array
         $subcadenas[$indice]=$cadena;
         echo 'Cadena extraída '.($indice+1).'.- '.$subcadenas[$indice].'<br>';




      ?>
    </p>
  </div>
</body>
</html>
