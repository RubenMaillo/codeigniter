<div id="d2">
  <div id="miga">
    <h2><a href="../../ControladorBiblioteca">Home</a>
    --- <a href="../../ControladorBiblioteca/mostrarSocios">Socios</a>
    --- Datos del socio con ID
      <?php

        echo $informacion1.'<br>';
        $datos=array();
        $socios= simplexml_load_file("configuracion/xml/socios.xml");

        foreach ($socios as $socio){

          //pasar al array de datos los datos filtrados por el ID que se ha introducido previamente
          if ($informacion1==$socio->id_socio){

            $datos[0]=$socio->nombre_apellidos;
            $datos[1]=$socio->dni;
            $datos[2]=$socio->domicilio;
            $datos[3]=$socio->telefono;
            $datos[4]=$socio->fecha_alta;
            $datos[5]=$socio->fecha_baja;

          }

        }

        echo '<div id="camposSocio">';
        echo form_label('Nombre completo: ', 'nombre');
        echo form_input(array('name'=>'nombre', 'readonly'=>'true'), $datos[0]).'<br>';
        echo form_label('DNI: ', 'dni');
        echo form_input(array('name'=>'dni', 'readonly'=>'true'), $datos[1]).'<br>';
        echo form_label('Domicilio: ', 'domicilio');
        echo form_input(array('name'=>'domicilio', 'readonly'=>'true'), $datos[2]).'<br>';
        echo form_label('Telefono: ', 'telefono');
        echo form_input(array('name'=>'telefono', 'readonly'=>'true'), $datos[3]).'<br>';
        echo form_label('Fecha de alta: ', 'fecha_alta');
        echo form_input(array('name'=>'fecha_alta', 'readonly'=>'true'), $datos[4]).'<br>';
        echo form_label('Fecha de baja: ', 'fecha_baja');
        echo form_input(array('name'=>'fecha_baja', 'readonly'=>'true'), $datos[5]).'<br>';
        echo '</div>';

        ?>
    </h2>
  </div>
</div>
