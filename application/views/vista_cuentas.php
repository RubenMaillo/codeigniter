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
    <title>Document</title>
</head>
<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(function(){
            $("#atras").click(function(){
                window.location.href="../../../../index.php/Tienda_admin_controller";
            });
            $("button").button();
        });
        function activarCuenta(id_usuario){
            window.location.href="../../../../index.php/Tienda_admin_controller/activarCuenta/"+id_usuario;
        }
    </script>
    <main>
        <i class="fa fa-arrow-circle-o-left" id="atras"></i>
    </main>
    <?php
    echo '<center><table>
            <tr>
                <td>ID Usuario</td><td>Nombre Usuario</td><td>Contraseña</td><td>Tipo de usuario</td><td>Estado</td><td>Fecha de activación</td><td>Fecha de baja</td><td>Email</td>
            </tr>';
        foreach($datos as $fila){
            echo '<tr><td>'.$fila->id_usuario.'</td><td>'.$fila->nombre_usuario.'</td><td>'.$fila->contrasena.'</td><td>'.$fila->tipo_usuario.'</td>';
            if ($fila->estado!='Desactivada'){
                echo '<td>'.$fila->estado.'</td>';
            }else{
                echo '<td><button onclick="activarCuenta('.$fila->id_usuario.')">Activar</button></td>';
            }
            echo '<td>'.$fila->fecha_act.'</td><td>'.$fila->fecha_baja.'</td><td>'.$fila->email.'</td></tr>';
        }
    echo '</table></center>';
    ?>
</body>
</html>