<?php
defined('BASEPATH') OR exit ('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" type="text/css" href="../../../../configuracion/css/estilos2.css">
  <meta charset="utf-8">
  <title>Behobia (Egoi Perez)</title>
</head>
<body>
<div id="d1">

  <header>
    <p id="head">Behobia V2</p>
  </header>

</div>

<?php
$jsondata= file_get_contents("configuracion/JSON/corredores.json");
$json= json_decode($jsondata, true);

$corredores=$json['Corredores'];
$corredor=$corredores['Corredor'];
$num_dorsal;

  foreach ($corredor as $datos){

    $num_dorsal=$datos['num_dorsal']+1;

  }

 ?>
<div id="d2">

  <h2>Nuevo corredor con Número de dorsal: <?= $num_dorsal ?></h2>
  <aside id="migaPan">
    <p><a href="../../../../index.php/ControladorBehobiaV2">Home</a>
    --- Nuevo Corredor</p>
  </aside>

  <div id="nuevoCorredor">
      <?php

      if(!isset($ruta1)){

        echo form_open_multipart('ControladorBehobiaV2/enviarImagen');
        echo form_upload('archivo').'<br>';
        echo form_submit('btnSubmit', 'Guardar imagen');
        echo form_close();

      }else{

        if ($ruta1==""){

          echo '<script>alert("Es necesario seleccionar una imagen");</script>';
          echo form_open_multipart('ControladorBehobiaV2/prueba');
          echo form_upload('archivo').'<br>';
          echo form_submit('btnSubmit', 'Guardar imagen');
          echo form_close();

        }else{

          echo form_open("ControladorBehobiaV2/introducirCorredor/".$num_dorsal."/".$ruta1);
          echo form_label('Nombre: ', 'nombre');
          echo form_input('nombre').'<br>';
          echo form_label('Apellidos: ', 'apellidos');
          echo form_input('apellidos').'<br>';
          echo form_label('Procedencia: ', 'procedencia');
          echo form_input('procedencia').'<br>';
          echo form_label('Tiempo: ', 'tempo');
          //tendremos un select con 2 opciones, una de ellas nos permite introducir abandonado en un campo, la otra en cambio nos habilitará un campo para introducir los segundos
          echo '<select id="opcionTiempos" name="tiempo2" onChange="comprobar()">
                  <option value="Tiempo">Tiempo en segundos</option>
                  <option value="Abandona">Abandona</option>
                </select>
                <input id="opt" type="text" name="tiempo">
                <input id="opt2" type="text" name="tiempo2" hidden>';
          echo '<script>

          function comprobar(){

            if (document.getElementById("opcionTiempos").selectedIndex==0){

              document.getElementById("opt").disabled=false;
              document.getElementById("opt").value="";
              document.getElementById("opt2").value="";

            }else{

              document.getElementById("opt").disabled=true;
              document.getElementById("opt").value="ABANDONA";
              document.getElementById("opt2").value="ABANDONA";

            }

          }

            </script>';

          /*echo form_label('Tiempo: ', 'tiempo');
          echo form_input('tiempo').'<br>';*/
          echo '<br>'.form_label('Imagen seleccionada: ').form_label($ruta1).'<br>';
          echo '<img width=130px height=90px src="../../../configuracion/imagenes/'.$ruta1.'"/><br>';
          echo form_submit('btnSubmit', 'Introducir');
          echo form_close();

        }
        }

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
