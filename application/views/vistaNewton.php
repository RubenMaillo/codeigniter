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

<h1>Ejercicio 9:</h1>

<p>Calculo de la raíz cuadrada de un número positivo por el método de Newton</p><br>

    <form action="ControladorNewton/metodoNewton" method="get">
      Número : <br><input type="text" name="num" placeholder="Introduce un número" class="input_box">
    <br><input type="submit" value="Calcular" class="submit">
    </form>





</body>
</html>
