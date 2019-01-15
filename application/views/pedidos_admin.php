<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <title>Historial de pedidos</title>
        <link rel="stylesheet" href="../../../../configuracion/css/estilos_tienda.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script>
            $(function(){
                $(".accordion").accordion({
                    collapsible: true
                });
                $("#atras").click(function(){
                    window.location.href="../../../../../../index.php/Tienda_admin_controller";
                });
                $(".cerrar").click(function(){
                    window.location.href="../../../../../../index.php/Tienda_login_controller/cerrarSesion";
                });
            });
        </script>
        </head>
        <body style="background:#BF8255;">
            <main>
                <i class="fa fa-arrow-circle-o-left" id="atras"></i>
            </main>
            <aside>
                Rol: <?php if (isset($_SESSION['rol'])){
                                echo $_SESSION['rol'];
                           } ?><br>
                Sesión actual: <?php if (isset($_SESSION['usuario'])){
                                echo $_SESSION['usuario'];
                           } ?><br>
                <button class="cerrar">Salir</button>
            </aside>
            <div class="accordion">
                <?php
                    $i=1;
                    if (count($pedidos)>0){
                        foreach($pedidos as $fila){
                            echo '<h3>Pedido '.$i++.'</h3>
                                    <div>
                                    <aside class="left">
                                        <section>ID Pedido <i class="fa fa-inbox"></i></section>
                                        <section>ID Compra <i class="fa fa-money"></i></section>
                                        <section>ID Usuario <i class="fa fa-user-o"></i></section>
                                        <section>Fecha del pedido <i class="fa fa-calendar"></i></section>
                                        <section>Hora del pedido <i class="fa fa-clock-o"></i></section>
                                        <section>Facturado <i class="fa fa-file-text-o"></i></section>
                                    </aside>
                                    <aside class="right">
                                        <section>'.$fila->id_pedido.'</section>
                                        <section>'.$fila->id_compra.'</section>
                                        <section>'.$fila->id_usuario.'</section>
                                        <section>'.$fila->fecha_pedido.'</section>
                                        <section>'.$fila->hora_pedido.'</section>
                                        <section>'.$fila->facturado.'</section>
                                    </aside>
                                    </div>';
                        }
                    }else{
                        echo '<h3>Pedidos vacio</h3>
                        <div>
                            <p>En este momento no tienes pedidos</p>
                        </div>';
                    }
                    ?>
                </div>
            </body>
</html>