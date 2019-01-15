<div id="d2">
  <div id="miga">
    <h2><a href="../ControladorBiblioteca">Home</a>
    --- Socios</h2>
  </div>
  <div id="filtros">
    <h3 id="h2">Filtros</h3>
      <?php

        echo form_open('ControladorBiblioteca/filtrarSocios');
        echo form_label('DNI: ', 'dni');
        echo form_input('dni');
        echo form_label('Nombre: ', 'nombre');
        echo form_input('nombre');
        echo form_submit('btnSubmit', 'Filtrar');
        echo form_close();
        echo '<div id="nuevoSocio">';

        echo form_open('ControladorBiblioteca/nuevoSocio');
        echo form_submit('btnSubmit2', 'Nuevo socio');
        echo form_close();
        echo '</div>';

        ?>

  </div>
  <h3 id="h3">Socios activos: </h3>
  <h3 id="h4">Socios baja: </h3>

<?php

  //el div lo muestra en principio con todos los datos
  $socios= simplexml_load_file("configuracion/xml/socios.xml");
  $cadenaN="";
  $cadenaS="";

  foreach ($socios as $socio){

    if ($socio->fecha_baja!="No"){

      $informacion=$socio->id_socio;

      $cadenaN.='<p> <a href="../../../index.php/ControladorBiblioteca/mostrarDatosSocio/'.$informacion.'">ID Socio: '. $socio->id_socio.'</a><br>
      Nombre completo: '. $socio->nombre_apellidos.'<br>
      Dni: '. $socio->dni.'<br>
      </p>';

    }else{

      $informacion=$socio->id_socio;

      $cadenaS.='<p> <a href="../../../index.php/ControladorBiblioteca/mostrarDatosSocio/'.$informacion.'">ID Socio: '. $socio->id_socio.'</a><br>
      Nombre completo: '. $socio->nombre_apellidos.'<br>
      Dni: '. $socio->dni.'<br>
      </p>';

    }

  }

  if ($cadenaN!=""){

    echo '<div id="baja">'.$cadenaN.'</div>';

  }
  if ($cadenaS!=""){

    echo '<div id="activo">'.$cadenaS.'</div>';

  }

  $cadenaN="";
  $cadenaS="";

  //si se hace click en el boton filtra y existen datos introducidos se vuelve a cargar la vista con los datos filtrados
  if ((isset($dni1) && $dni1!="")||(isset($nombre1) && $nombre1!="")){

  $socios= simplexml_load_file("configuracion/xml/socios.xml");

  //div de activos
  foreach ($socios as $socio){
    //si el socio está activo
    if ($socio->fecha_baja!="No"){

      if ($dni1==$socio->dni || $nombre1==$socio->nombre_apellidos){

        $informacion=$socio->id_socio;
        //introducir los datos recibidos en el div llamado activo

        $cadenaN.='<p> <a href="../../../index.php/ControladorBiblioteca/mostrarDatosSocio/'.$informacion.'">ID Socio: '. $socio->id_socio.'</a><br>
        Nombre completo: '. $socio->nombre_apellidos.'<br>
        Dni: '. $socio->dni.'<br>
        </p>';

        echo '<div id="activo">';
        echo '<p>No se han encontrado resultados</p>';
        echo '</div>';

      }else{

        echo '<div id="baja">';
        echo '<p>No se han encontrado resultados</p>';
        echo '</div>';

      }

    }else{

      if ($dni1==$socio->dni || $nombre1==$socio->nombre_apellidos){

        $informacion=$socio->id_socio;
        //introducir los datos recibidos en el div llamado activo

        $cadenaS.='<p> <a href="../../../index.php/ControladorBiblioteca/mostrarDatosSocio/'.$informacion.'">ID Socio: '. $socio->id_socio.'</a><br>
        Nombre completo: '. $socio->nombre_apellidos.'<br>
        Dni: '. $socio->dni.'<br>
        </p>';

      }else{

        echo '<div id="activo">';
        echo '<p>No se han encontrado resultados</p>';
        echo '</div>';

      }

    }

    if ($cadenaN!=""){

      echo '<div id="baja">'.$cadenaN.'</div>';

    }

    if ($cadenaS!=""){

      echo '<div id="activo">'.$cadenaS.'</div>';

    }

  }

}

?>

</div>
