<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../../../configuracion/css/estilos_tienda.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet"> 
    <title>Mis datos</title>
</head>
<body style="background:#9b9b9b;">
   
    <main>
        <i class="fa fa-arrow-circle-o-left" id="atras"></i>
    </main>
    <section class="misDatos">
        <?php
        foreach($datos as $fila){
            if  ($this->encryption->decrypt($fila->contrasena)!=""){
                $fila->contrasena=$this->encryption->decrypt($fila->contrasena);
            }
            echo 'Nombre usuario: '.$fila->nombre_usuario.'<br>';
            echo 'Contraseña: '.$fila->contrasena.'<br>';
            echo 'Tipo de usuario: '.$fila->tipo_usuario.'<br>';
            echo 'Estado: '.$fila->estado.'<br>';
            echo 'Email: '.$fila->email;
        }
        ?>
    </section>
    <script>
        $("#atras").click(function(){
            window.location.href="../../../../../../index.php/Tienda_controller";
        });
    </script>
</body>
</html>