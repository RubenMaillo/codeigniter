<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <title>Menú cliente</title>
        <link rel="stylesheet" href="../../../../configuracion/css/estilos_tienda.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet"> 
        <link rel="stylesheet" href="/resources/demos/style.css">
    </head>
    <body style="overflow-y:hidden;">
        <header>
            <button onclick="verOpciones()">Opciones</button>
            <section class="desplegable">
               <article class="art">Notificaciones
                <section class="desplegable2">
                    Aquí se mostrara una lista con las notificaciones
                </section>
               </article>
               <hr>
               <article onclick="mostrarPedidos()">Historial de pedidos</article>  
            </section>
            <aside>
                Rol: <?php if (isset($_SESSION['rol'])){
                                echo $_SESSION['rol'];
                           } ?><br>
               <a href="<?=base_url("index.php/Tienda_controller/verMisDatos/".$_SESSION['usuario']."")?>">Sesión actual: <?php if (isset($_SESSION['usuario'])){
                                echo $_SESSION['usuario'];
                           } ?><br></a>
                <button class="cerrar">Salir</button>
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
            $(".cerrar").click(function(){
                window.location.href="../../../../../../index.php/Tienda_login_controller/cerrarSesion";
            });
            $(".desplegable2").hide();
            $(document).ready(function(){
                $(".art").click(function(){
                    if ($(".desplegable2").is(":hidden")){
                        $(".desplegable2").show();
                    }else{
                        $(".desplegable2").hide();
                    }
                });
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
                        $("#contenido").append("<tr class='objetos' id="+j+"><td>"+(j)+".- <a class='links' href=''>"+valor+"</a></td> <td id='cantidad"+j+"'>1</td><td><i onclick='aumentar("+j+", "+precio+")' class='fa fa-plus-circle'></i> <i onclick='disminuir("+j+", "+precio+")' class='fa fa-minus'></i></td><td id='precio"+(j++)+"'>"+precio+"</td> <td><i onclick='eliminar("+llave+", \""+valor+"\")' class='fa fa-trash'></i></td></tr>");
                    
                    }else{
                        $("#arrastrar"+valor).remove();
                    }
                }
                $( function() {
                    $(".mover").draggable({ scroll: false, revert: 'invalid' });
                    $( "#carrito" ).droppable({ accept: '.mover' ,
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
                           $("#contenido").append("<tr class='objetos' id="+num+"><td>"+(j)+".- <a class='links' href=''>"+producto+"</a></td> <td id='cantidad"+(j)+"'>1</td></td><td><i onclick='aumentar("+j+", "+precio+")' class='fa fa-plus-circle'></i> <i onclick='disminuir("+j+", "+precio+")' class='fa fa-minus'></i></td><td id='precio"+j+"'>"+precio+"</td> <td><i onclick='eliminar("+num+", \""+producto+"\")' class='fa fa-trash'></i></td></tr>");                          
                           
                           window.location.href="../../../../../../index.php/Tienda_controller/anadir_Carro/"+producto;
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
            function mostrarPedidos(){
                window.location.href="../../../../../../index.php/Tienda_controller/verPedido";
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
            function eliminar(numero, nombre){
                localStorage.removeItem("indice"+numero);
                localStorage.removeItem(numero);
                window.location.href="../../../../../../../index.php/Tienda_controller/eliminarObj/"+nombre;
            }
        </script>
    