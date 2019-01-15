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

  <?php


    echo form_open('ControladorDniPost/recibirDatos');
    echo form_label('DNI (sin letra): ', 'dni');
    echo form_input('dni').'<br>';
    echo form_label('Letra: ', 'letra');
    echo form_input('letra').'<br>';
    echo form_label('Nombre: ', 'nombre');
    echo form_input('nombre').'<br>';
    echo form_label('Sueldo: ', 'sueldo');
    echo form_input('sueldo').'<br>';
    echo form_submit('btnSubmit', 'Enviar');
    echo form_close();

?>

</body>
</html>
