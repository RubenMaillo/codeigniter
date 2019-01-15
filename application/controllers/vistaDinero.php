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

  <h1>Ejercicio 14</h1>
  <p>Convertir dinero introducido a la menor combinación posible de billetes y monedas</p>

  <?php

    echo form_open('ControladorDinero/recibirDinero');
    echo form_label('Dinero: ', 'dinero');
    echo form_input('dinero').'<br>';
    echo form_submit('btnSubmit', 'Enviar');
    echo form_close();

//si se han recibido datos, entonces se muestran en pantalla
    if (isset($recibido)){

      //recorrer resultados para mostrar lo utilizado
      echo '<h2>Para obtener el dinero introducido: '.$dinero1. ' € es necesario: </h2>';
      for ($i=0; $i<count($recibido); $i++){

        echo $recibido[$i].'<br>';

      }

    }

?>

</body>
</html>
