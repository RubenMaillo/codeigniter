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



<form action="ControladorDniGet/recibirDatos" method="get">
Dni (sin letra) : <input type="text" name="dni" placeholder="Introduce el dni (sin letra)" class="input_box">
Letra: <input type="text" name="letra" placeholder="Introduce la letra del dni" class="input_box">
Nombre: <input type="text" name="nombre" placeholder="Introduce el nombre" class="input_box">
Sueldo: <input type="text" name="sueldo" placeholder="Introduce el sueldo" class="input_box">
<input type="submit" value="Submit" class="submit">
</form>



</body>
</html>
