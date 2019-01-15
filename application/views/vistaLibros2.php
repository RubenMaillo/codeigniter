<?php
$temas=array('', 'Acción', 'Fantasía', 'Drama');
 ?>
<div id="d2">
  <div id="miga">
    <h2><a href="../ControladorBiblioteca">Home</a>
    --- Libros</h2>
  </div>
  <div id="filtros">
    <h3 id="h2">Filtros</h3>
    <?php

        echo form_open("ControladorBiblioteca/filtrarLibros");
        echo form_label('Título: ', 'titulo');
        echo form_input('titulo');
        echo form_label('Autor: ', 'autor');
        echo form_input('autor');
        echo form_label('Temática: ', 'tematica');
        echo form_dropdown('tematica', $temas);
        echo form_submit('btnSubmit', 'Filtrar');
        echo form_close();

       ?>
    </p>
  </div>
<?php

    $libros= simplexml_load_file("configuracion/xml/libros.xml");

      echo '<div id="tablaLibros">
          <table id="tabla">
          <tr>
          <td>······································</td><td>······································</td>
          </tr>';

          foreach ($libros as $libro){

            echo '<tr>';
            echo '<td> ID: </td><td>'.$libro->id_libro.'</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td> ISBN: </td><td>'.$libro->isbn.'</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td> Título: </td><td>'.$libro->titulo.'</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td> Autor: </td><td>'.$libro->autor.'</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td> Tema: </td><td>'.$libro->tema.'</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td> Editorial: </td><td>'.$libro->editorial.'</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td> Fecha de edición: </td><td>'.$libro->f_edicion.'</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td> Número de ejemplares: </td><td>'.$libro->num_ejemplares.'</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td>······································</td><td>······································</td>';
            echo '</tr>';

          }

          echo '</table>
        </div>';

        if ((isset($titulo1) && $titulo1!="")||(isset($autor1) && $autor1!="")||(isset($tematica1) && $tematica1!="")){

          if ($titulo1!=""){

            echo '<div id="tablaLibros">';
            echo '<table id="tabla">';
            echo '<tr>';
            echo '<td>······································</td><td>······································</td>';
            echo '</tr>';

              foreach ($libros as $libro){

                if ($titulo1==$libro->titulo){

                  echo '<tr>';
                  echo '<td> ID: </td><td>'.$libro->id_libro.'</td>';
                  echo '</tr>';
                  echo '<tr>';
                  echo '<td> ISBN: </td><td>'.$libro->isbn.'</td>';
                  echo '</tr>';
                  echo '<tr>';
                  echo '<td> Título: </td><td>'.$libro->titulo.'</td>';
                  echo '</tr>';
                  echo '<tr>';
                  echo '<td> Autor: </td><td>'.$libro->autor.'</td>';
                  echo '</tr>';
                  echo '<tr>';
                  echo '<td> Tema: </td><td>'.$libro->tema.'</td>';
                  echo '</tr>';
                  echo '<tr>';
                  echo '<td> Editorial: </td><td>'.$libro->editorial.'</td>';
                  echo '</tr>';
                  echo '<tr>';
                  echo '<td> Fecha de edición: </td><td>'.$libro->f_edicion.'</td>';
                  echo '</tr>';
                  echo '<tr>';
                  echo '<td> Número de ejemplares: </td><td>'.$libro->num_ejemplares.'</td>';
                  echo '</tr>';
                  echo '<tr>';
                  echo '<td>······································</td><td>······································</td>';
                  echo '</tr>';

                }

              }

              echo '</table>
            </div>';

          }

          if ($autor1!=""){

            echo '<div id="tablaLibros">';
            echo '<table id="tabla">';
            echo '<tr>';
            echo '<td>······································</td><td>······································</td>';
            echo '</tr>';

            foreach ($libros as $libro){

              if ($autor1==$libro->autor){

                echo '<tr>';
                echo '<td> ID: </td><td>'.$libro->id_libro.'</td>';
                echo '</tr>';
                echo '<tr>';
                echo '<td> ISBN: </td><td>'.$libro->isbn.'</td>';
                echo '</tr>';
                echo '<tr>';
                echo '<td> Título: </td><td>'.$libro->titulo.'</td>';
                echo '</tr>';
                echo '<tr>';
                echo '<td> Autor: </td><td>'.$libro->autor.'</td>';
                echo '</tr>';
                echo '<tr>';
                echo '<td> Tema: </td><td>'.$libro->tema.'</td>';
                echo '</tr>';
                echo '<tr>';
                echo '<td> Editorial: </td><td>'.$libro->editorial.'</td>';
                echo '</tr>';
                echo '<tr>';
                echo '<td> Fecha de edición: </td><td>'.$libro->f_edicion.'</td>';
                echo '</tr>';
                echo '<tr>';
                echo '<td> Número de ejemplares: </td><td>'.$libro->num_ejemplares.'</td>';
                echo '</tr>';
                echo '<tr>';
                echo '<td>······································</td><td>······································</td>';
                echo '</tr>';

              }

            }

            echo '</table>
          </div>';

        }

      if ($temas[$tematica1]!=""){

        echo '/'.$temas[$tematica1].'/';
        echo '<div id="tablaLibros">';
        echo '<table id="tabla">';
        echo '<tr>';
        echo '<td>······································</td><td>······································</td>';
        echo '</tr>';

        foreach ($libros as $libro){

          if ($temas[$tematica1]==$libro->tema){

            echo '<tr>';
            echo '<td> ID: </td><td>'.$libro->id_libro.'</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td> ISBN: </td><td>'.$libro->isbn.'</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td> Título: </td><td>'.$libro->titulo.'</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td> Autor: </td><td>'.$libro->autor.'</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td> Tema: </td><td>'.$libro->tema.'</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td> Editorial: </td><td>'.$libro->editorial.'</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td> Fecha de edición: </td><td>'.$libro->f_edicion.'</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td> Número de ejemplares: </td><td>'.$libro->num_ejemplares.'</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td>······································</td><td>······································</td>';
            echo '</tr>';

          }

        }

          echo '</table>
          </div>';
      }

  }

 ?>
  </div>
</div>
