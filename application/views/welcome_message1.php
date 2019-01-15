<?php
defined('BASEPATH') OR exit ('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Ejercicio 1</title>

</head>
<body>

  <div id="container">
    <p>
      <?php
      //Tomamos 2 números y comprobamos si la suma es positiva o no
      if (($num1+$num2)>=0){

       echo 'Es positivo';

      }else{

       echo 'Es negativo';

      }

 ?>
    </p>
  </div>
</body>
</html>
