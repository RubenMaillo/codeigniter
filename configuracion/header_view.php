<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <title>Menú cliente</title>
        <link rel="stylesheet" href="../../../../configuracion/css/estilos_tienda.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
    </head>
    <body>
        <header>
            <button onclick="verOpciones()">Opciones</button>
            <section class="desplegable">
               <article>Notificaciones
               <hr>
                <section class="desplegable2">
                    pepe
                </section>
               </article>
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
            var num;
            var j=1;
            var precio;
            $(document).ready(function(){
                
                //boton eliminar, notificaciones, historial de pedidos
                
                for (i=0;i<localStorage.length;i++){
                    llave=localStorage.key(i);
                    valor=localStorage.getItem(llave);
                    if(llave.substring(0,6)!="indice"){
                        <?php 
                        $precios=$this->Tienda_model->verPrecios();
                        foreach ($precios as $precio){ ?> 
                            if (valor=="<?php echo $precio->nombre_producto; ?>"){

                                var precio = <?php echo $precio->precio; ?>;
                                
                            }<?php
                        }
                        ?>
                        $("#contenido").append("<tr id="+j+"><td>"+(j)+".- "+valor+"</td> <td id='cantidad"+j+"'>1</td><td><i onclick='aumentar("+j+", "+precio+")' class='fa fa-plus-circle'></i> <i onclick='disminuir("+j+", "+precio+")' class='fa fa-minus'></i></td><td id='precio"+(j++)+"'>"+precio+"</td> <td><i onclick='eliminar("+llave+")' class='fa fa-trash'></i></td></tr>");
                    
                    }else{
                        $("#arrastrar"+valor).remove();
                    }
                }
                $( function() {
                    var maximo = <?php echo count($datos); ?>;
                    for (i=0;i<maximo;i++){
                        $("#arrastrar"+i).draggable();
                    }
                } );
                $( function() {
                    $( "#carrito" ).droppable({
                        drop: function( event, ui ) {
                           $("#arrastrar"+num).remove();
                           <?php 
                            $precios=$this->Tienda_model->verPrecios();
                            foreach ($precios as $precio){ ?> 
                                if (producto=="<?php echo $precio->nombre_producto; ?>"){

                                    precio = <?php echo $precio->precio; ?>;
                                    
                                }<?php
                            }
                        ?>
                           $("#contenido").append("<tr id="+num+"><td>"+(j)+".- "+producto+"</td> <td id='cantidad"+(j)+"'>1</td></td><td><i onclick='aumentar("+j+", "+precio+")' class='fa fa-plus-circle'></i> <i onclick='disminuir("+j+", "+precio+")' class='fa fa-minus'></i></td><td id='precio"+j+"'>"+precio+"</td> <td><i onclick='eliminar("+num+")' class='fa fa-trash'></i></td></tr>");
                           localStorage.setItem(num, producto);
                           localStorage.setItem("indice"+num, num);
                           j++;
                        }
                    });
                });
            });
            function prueba(i, numero){
                num=numero;
                objeto="producto"+(i+1);
                producto=document.getElementById(objeto).innerText;
            }
            function verOpciones(){
                if ($(".desplegable").css("display")=="none"){
                    $(".desplegable").css("display", "block");
                }else{
                    $(".desplegable").css("display", "none");
                }
            }
            function aumentar(numero, precio){
                ++document.getElementById("cantidad"+numero).innerText;
                document.getElementById("precio"+numero).innerHTML=parseInt(document.getElementById("precio"+numero).innerText)+precio;
            }
            function disminuir(numero, precio){
                if (document.getElementById("cantidad"+numero).innerText>1){
                    --document.getElementById("cantidad"+numero).innerText;
                    document.getElementById("precio"+numero).innerHTML-=precio;
                }
            }
            function eliminar(numero){
                localStorage.removeItem("indice"+numero);
                localStorage.removeItem(numero);
                window.location.href="../../../index.php/Tienda_controller";
            }
        </script>
    </body>
</html>