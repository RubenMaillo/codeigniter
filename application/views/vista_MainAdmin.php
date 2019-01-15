<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet"> 
    <link rel="stylesheet" href="/resources/demos/style.css">
    <link rel="stylesheet" href="../../../../configuracion/css/estilos_admin.css">
    <title>Menú Admin</title>
</head>
<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(document).ready(function(){
            $(".desplegable").css("display", "none");
        });
        $(function(){
            $(".cerrar").click(function(){
                window.location.href="../../../../index.php/Tienda_login_controller/cerrarSesion";
            });
        });
    </script>
    <header>
            <button onclick="verOpciones()">Opciones</button>
            <section class="desplegable">
               <article class="art">Notificaciones
                <section class="desplegable2">
                    Aquí se mostrara una lista con las notificaciones
                </section>
               </article>
               <hr>
               <article onclick="verPedidos()">Historial de pedidos</article>
               <hr>
               <article onclick="verCuentas()">Administrar cuentas</article>  
            </section>
            <aside>
                Rol: <?php if (isset($_SESSION['rol'])){
                                echo $_SESSION['rol'];
                           } ?><br>
                Sesión actual: <?php if (isset($_SESSION['usuario'])){
                                echo $_SESSION['usuario'];
                           } ?><br>
                <button class="cerrar">Salir</button>
            </aside>
            <h1>Menú principal</h1>
    </header>
    <article class="productos">
        <h1>Productos</h1>
        <?php
            if ($pagina==1){

                echo '<a href="../../../../../../index.php/Tienda_admin_controller/nuevoProducto"><section id="añadirNuevo">Añadir nuevo producto
                        <p <i class="fa fa-plus"></i></p>
                        </section></a>';

                for ($i=0;$i<count($datos);$i++){
                    if($i<6){
                            echo '<a href="../../../../../index.php/Tienda_admin_controller/verProducto/'.$datos[$i]->nombre_producto.'"><section id="producto'.($i+1).'">'.$datos[$i]->nombre_producto.'
                            <p onmouseenter=""  id="arrastrar'.$datos[$i]->id_producto.'"><i class="fa fa-cog"></i></a></p>
                            </section></a><a href="../../../../../index.php/Tienda_admin_controller/eliminarProducto/'.$datos[$i]->nombre_producto.'"><i class="fa fa-trash"></i></a>';
                    }
                }
                }else{
                    for ($i=0;$i<count($datos);$i++){
                        if($i<6){
                            if ($i+6*($pagina-1)<count($datos)){
                                echo '<a href="../../../../../index.php/Tienda_admin_controller/verProducto/'.$datos[$i+6*($pagina-1)]->nombre_producto.'"><section id="producto'.($i+1).'">'.$datos[$i+6*($pagina-1)]->nombre_producto.' 
                                    <p onmouseenter ="" id="arrastrar'.$datos[$i+6*($pagina-1)]->id_producto.'"><i class="fa fa-cog"></i></a></p>
                                    </section></a><a href="../../../../../index.php/Tienda_admin_controller/eliminarProducto/'.$datos[$i+6*($pagina-1)]->nombre_producto.'"><i class="fa fa-trash"></i></a>';
                            }else{
                                break;
                            }
                        }
                    }
                }
        
        ?>
    </article>
            
            <p class="paginas">
            <?php
                $numPaginas=count($datos)/6;
                $ultima=count($datos)%6;
                if ($numPaginas%1==0){
                    for ($j=0;$j<$numPaginas;$j++){
                        echo '<button onclick="CambiarPagina('.($j+1).')">'.($j+1).'</button>';
                    }
                }else{
                    for ($j=0;$j<($numPaginas+1);$j++){
                        echo '<button onclick="CambiarPagina('.($j+1).')">'.($j+1).'</button>';
                    }
                }
                ?>
            </p>

            <script>
                function CambiarPagina(pagina){
                    window.location.href="../../../../../index.php/Tienda_admin_controller/CambiarPagina/"+pagina;
                }
                function verOpciones(){
                    if ($(".desplegable").css("display")=="none"){
                        $(".desplegable").css("display", "block");
                    }else{
                        $(".desplegable").css("display", "none");
                    }
                }
                function verCuentas(){
                    window.location.href="../../../../../../index.php/Tienda_admin_controller/verCuentas";
                }
                function verPedidos(){
                    window.location.href="../../../../../../index.php/Tienda_admin_controller/verPedidos";
                }
            </script>

</body>
</html>