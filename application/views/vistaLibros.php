<?php
defined('BASEPATH') OR exit ('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Examen (Egoi Perez)</title>
</head>

<body>

<?php
//recibir tabla

echo '<center><table border="2">';
  echo '<tr>
        <td>Título</td><td>Número de ejemplares</td>
        </tr>';
  for ($i=0;$i<count($ordenada);$i++){

    echo '<tr>';
    //el link nos llevará a otra vista en la que podremos ver el ISBN de dicho libro
      echo '<td><a href="ControladorExamen/mostrarISBN/'.$ordenada[$i]->isbn.'">'.$ordenada[$i]->titulo.'</a></td>'.
           '<td>'.$ordenada[$i]->num_ejemplares.'</td>';

    echo '</tr>';
  }

echo '</table></center>';

?>
</body>
</html>
