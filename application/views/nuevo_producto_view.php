<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../../../configuracion/css/estilos_admin.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet"> 
    <link rel="stylesheet" href="/resources/demos/style.css">
    <title>Añadir nuevo producto</title>
</head>
<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    
    <div class="general">
        <h1>Añadir producto</h1>
        <section class="informacion">
            <article id="labels">
                <?php
                    echo form_open_multipart('Tienda_admin_controller/anadirNuevo_Producto');
                   
                    echo form_label('Categoría: ', 'categoria').'<br>';
                    echo form_label('Nombre del producto: ', 'nombre').'<br>';
                    echo form_label('Precio: ', 'precio').'<br>';
                    echo form_label('Stock inicial: ', 'stock').'<br>';
                    echo form_label('Estado: ', 'categoria').'<br>';
                    echo form_label('Año de fabricación: ', 'ano').'<br>';
                    echo form_label('Descripción: ', 'desc').'<br>';
                
                ?>

            </article>
            <article id="inputs">
            <section class="informacion">
                <?php
                $arrayCategorias=array('', 'Sofás y sillones', 'Mesas', 'Auxiliares', 'Descanso');
                    echo form_dropdown('categoria', $arrayCategorias).'<br>';
                    echo form_input('nombre').'<br>';
                    echo form_input('precio').'<br>';
                    echo form_input('stock').'<br>';
                $arrayEstados=array('', 'Nuevo', 'En buen estado', 'Segunda mano', 'Para restauración');
                    echo form_dropdown('estado', $arrayEstados).'<br>';
                    echo form_input('ano').'<br>';
                    echo form_textarea('desc').'<br>';
                    echo form_upload('archivo');
                    echo form_submit('btnSubmit', 'Introducir nuevo producto');
                    
                echo form_close();
                ?>
            </article>
        </section>
    </div>
</body>
</html>