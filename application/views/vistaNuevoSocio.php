<?php
$socios= simplexml_load_file("configuracion/xml/socios.xml");
$nuevo_id;
//recorremos el xml para obtener el último ID que existe y le sumamos 1 para obtener el siguiente que se puede introducir
  foreach ($socios as $socio){

    $nuevo_id=($socio->id_socio)+1;

  }

 ?>

<div id="d2">
  <div id="miga">
    <h2><a href="../../../index.php/ControladorBiblioteca">Home</a>
    --- <a href="../../../index.php/ControladorBiblioteca/mostrarSocios">Socios</a>
    --- Datos del socio con ID
      <?php

        echo $nuevo_id;
        $fechaActual=date("j/m/Y");

        echo '<div id="camposSocio">';
        echo form_open("ControladorBiblioteca/introducirSocio/".$nuevo_id);
        echo form_label('Nombre completo: ', 'nombre');
        echo form_input('nombre').'<br>';
        echo form_label('DNI: ', 'dni');
        echo form_input('dni').'<br>';
        echo form_label('Domicilio: ', 'domicilio');
        echo form_input('domicilio').'<br>';
        echo form_label('Telefono: ', 'telefono');
        echo form_input('telefono').'<br>';
        echo form_label('Fecha de alta: ', 'fecha_alta');
        echo form_input(array('name'=>'fecha_alta', 'readonly'=>'true'), $fechaActual).'<br>';
        echo form_submit('btnSubmit', 'Introducir');
        echo form_close();
        echo '</div>';

        echo form_open("ControladorBiblioteca/mostrarSocios");
        echo form_close();

      ?>
    </h2>
  </div>
</div>
