<?php
defined('BASEPATH') OR exit ('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" type="text/css" href="../../../configuracion/css/estilos2.css">
  <meta charset="utf-8">
  <title>Behobia (Egoi Perez)</title>
</head>
<body>
<div id="d1">
  <header>
    <p id="head">Behobia</p>
  </header>
</div>

<?php
$corredores= simplexml_load_file("configuracion/xml/corredores.xml");
$num_dorsal;
//recorremos el xml para obtener el último ID que existe y le sumamos 1 para obtener el siguiente que se puede introducir
  foreach ($corredores as $corredor){

    $num_dorsal=($corredor->num_dorsal)+1;

  }

 ?>
<div id="d2">
  <h2>Nuevo corredor con Número de dorsal: <?= $num_dorsal ?></h2>
  <div id="nuevoCorredor">
      <?php


        echo form_open("ControladorBehobia/introducirCorredor/".$num_dorsal);
        echo form_label('Nombre: ', 'nombre');
        echo form_input('nombre').'<br>';
        echo form_label('Apellidos: ', 'apellidos');
        echo form_input('apellidos').'<br>';
        echo form_label('Procedencia: ', 'procedencia');
        echo form_input('procedencia').'<br>';
        echo form_label('Tiempo: ', 'tiempo');
        echo form_input('tiempo').'<br>';
        echo form_submit('btnSubmit', 'Introducir');
        echo form_close();


  ?>
</div>
</div>
<div id="d3">
<footer>
  <p id="footText">Página creada por Egoi Perez con CodeIgniter 2018-<?= $fecha?></p>
</footer>
</div>

</body>
</html>
