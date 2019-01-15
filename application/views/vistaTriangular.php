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

  <h1>Ejercicio 15</h1>
  <p>Introduce número de filas que tendrá la tabla triangular</p>

  <?php

    echo form_open('ControladorTriangular/recibirNumero');
    echo form_label('Número de filas: ', 'numero');
    echo form_input('numero').'<br>';
    echo form_submit('btnSubmit', 'Enviar');
    echo form_close();

?>

</body>
</html>
