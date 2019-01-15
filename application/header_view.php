<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <title>Menú cliente</title>
        <link rel="stylesheet" href="../../../../configuracion/css/estilos_tienda.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
    </head>
    <body>
        <header>
            <button onclick="verOpciones()">Opciones</button>
            <section class="desplegable">
               <article>Notificaciones</article>
               <hr>
               <article>Historial de pedidos</article>  
            </section>
            <aside>
                Rol: <br>
                Sesión actual: <br>
                <button>Salir</button>
            </aside>
            <h1>Menú principal</h1>
        </header>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>
            var objeto;
            var producto;
            $(document).ready(function(){
                $( function() {
                    for (i=0;i<6;i++){
                        $(".arrastrar"+i).draggable();
                    }
                } );
                $( function() {
                    $( ".carrito" ).droppable({
                        drop: function( event, ui ) {
                            $(objeto).html("El objeto "+ producto +" se ha añadido al carro");
                        }
                    });
                } );
            });
            function prueba(array){
                console.log(array);
            }
            function verOpciones(){
                if ($(".desplegable").css("display")=="none"){
                    $(".desplegable").css("display", "block");
                }else{
                    $(".desplegable").css("display", "none");
                }
            }
        </script>
    </body>
</html>