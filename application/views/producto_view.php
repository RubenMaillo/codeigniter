    <section class="producto">
        <?php
            $productoB=urldecode($producto);
            $arrayDatos=array();
            $i=0;
            foreach ($datos as $fila){
                if ($fila->nombre_producto==$productoB){
                    $arrayDatos[$i]=$fila->categoria;
                    $arrayDatos[$i++]=$fila->nombre_producto;
                    $arrayDatos[$i++]=$fila->precio;
                    $arrayDatos[$i++]=$fila->stock;
                    $arrayDatos[$i++]=$fila->estado_producto;
                    $arrayDatos[$i++]=$fila->año_fabricacion;
                    $arrayDatos[$i++]=$fila->descripcion;
                    break;
                }
            }
            for ($i=0; $i<count($arrayDatos);$i++){
                echo $arrayDatos[$i].'<br>';
            }

        ?>
    </section>
    <br><br>
    <center>
        <section class="opciones">
                <button onclick="volver()">Atrás</button>
        </section>
    <script>
        bool=false;
        //arreglar, en vez de hacer referencia con el ID, hacerlo con el nombre.
        $(document).ready(function(){
            for (i=0;i<localStorage.length;i++){
                    llave=localStorage.key(i);
                    valor=localStorage.getItem(llave);
                    if (valor=="<?php echo ($fila->nombre_producto); ?>"){
                        bool=true;
                        break;
                    }
            }
            bool ? $(".opciones").append("<button onclick='eliminar("+llave+")'>Eliminar del carro<i class='fa fa-trash'></i></button>") : $(".opciones").append("<button onclick='añadir()'>Añadir al carro <i class='fa fa-shopping-cart'></i></button>");
        });
        function volver(){
            window.location.href="../../../../../../index.php/Tienda_controller";
        }
        function añadir(){
            numero=<?php echo $fila->id_producto; ?>;
            nombre="<?php echo $fila->nombre_producto;?>";
            localStorage.setItem("indice"+numero, numero);
            localStorage.setItem(numero, nombre);
            window.location.href="../../../../../../index.php/Tienda_controller/anadir_Carro/"+nombre;
        }
    </script>
    </center>
</body>
</html>