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
<h1>Ejercicio 13</h1>
<p>Convertir segundos a HH:MM:SS</p>
  <?php

    echo form_open('ControladorSegundos/recibirSegundos');
    echo form_label('Segundos: ', 'segundos');
    echo form_input('segundos').'<br>';
    echo form_submit('btnSubmit', 'Enviar');
    echo form_close();

//comprobamos si hay algún resultado que mostrar
    if (isset($recibido)){

      echo $recibido[0];
      echo $recibido[1];

    }

?>

</body>
</html>
