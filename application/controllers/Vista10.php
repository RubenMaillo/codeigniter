<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to Zarautz</title>
</head>
<body>

<div id="container">
	<h1>Ejercicio 10</h1>

	<div id="body">
		<?php
		echo form_open('Ejercicio10/recibirdatos');
			$product = array(
				'name' =>'producto',
				'placeholder' => 'Escribe el nombre de producto');
		?>

		<h1>Formulario</h1>

		<?php
			echo form_label('Producto: ', 'producto');
			echo form_input('producto');
			echo "<br>";
		?>
		<?php echo form_submit('Enviar','Enviar');
		?>
		<?php echo form_close();?>
<?php
		if(isset($milista)){
		echo $milista;	
		}
		
		?>
	</div>

</div>

</body>
</html>