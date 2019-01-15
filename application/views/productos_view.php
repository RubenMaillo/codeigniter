
        <section class="informacion">
        <p id="filtro4">Filtrado por: <select id="filtro" onchange="cambio()">
            <option value="vacio"></option>
            <option value="nombre">Nombre</option>
            <option value="categoria">Categoría</option>
            <option value="precio">Precio</option>
            <option value="año_fabricacion">Año fabricación</option>
            <option value="estado">Estado</option>
        </select>

        <select id="filtro2" onchange="filtrar()">
        </select>
    
        </p>
            <article class="productos">
                <h1>Productos</h1>
                <?php
                if (count($datos)!=0){
                    if ($pagina==1){
                    for ($i=0;$i<count($datos);$i++){
                        if($i<6){
                                echo '<a href="../../../index.php/Tienda_controller/verProducto/'.$datos[$i]->nombre_producto.'/'.$i.'"><section id="producto'.($i+1).'"><img src="../../../../../../../configuracion/imagenes/imagenesTienda/'.$datos[$i]->imagen.'" width=75 height=75/>'.$datos[$i]->nombre_producto.'
                                <p onmouseenter="prueba('.$i.', '.$datos[$i]->id_producto.')" class="mover" id="arrastrar'.$datos[$i]->id_producto.'"><i class="fa fa-shopping-cart"></i></a></p>
                                </section></a>';
                        }
                    }
                    }else{
                        for ($i=0;$i<count($datos);$i++){
                            if($i<6){
                                if ($i+6*($pagina-1)<count($datos)){
                                    echo '<a href="../../../index.php/Tienda_controller/verProducto/'.$datos[$i+6*($pagina-1)]->nombre_producto.'/'.($i+6*($pagina-1)).'"><section id="producto'.($i+1).'"><img src="../../../../../../../configuracion/imagenes/imagenesTienda/'.$datos[$i+6*($pagina-1)]->imagen.'" width=75 height=75/>'.$datos[$i+6*($pagina-1)]->nombre_producto.' 
                                        <p onmouseenter ="prueba('.$i.','.$datos[$i+6*($pagina-1)]->id_producto.')" class="mover" id="arrastrar'.$datos[$i+6*($pagina-1)]->id_producto.'"><i class="fa fa-shopping-cart"></i></a></p>
                                        </section></a>';
                                }else{
                                    break;
                                }
                            }
                        }
                    }
                }else{
                    echo "<h4>No existen productos que cumplan el filtro de ".$_SESSION['filtro']."</h4>";
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
                <script>
                    $("#filtro2").hide();
                    var filtro="<?php echo $_SESSION['filtro']; ?>";

                    if (filtro=="ascendente" || filtro=="descendente"){
                        document.getElementById("filtro").selectedIndex=1;
                        $("#filtro2").find('option').remove();
                        $("#filtro2").append(new Option("", "vacio"));
                        $("#filtro2").append(new Option("Ascendente", "ascendente"));
                        $("#filtro2").append(new Option("Descendente", "descendente"));
                        filtro=="ascendente" ? document.getElementById("filtro2").selectedIndex=1 : document.getElementById("filtro2").selectedIndex=2;
                        $("#filtro2").show();
                    }
                    if (filtro=="sofas" || filtro=="mesas" || filtro=="auxiliares" || filtro=="descanso"){
                        document.getElementById("filtro").selectedIndex=2;
                        $("#filtro2").find('option').remove();
                        $("#filtro2").append(new Option("", "vacio"));
                        $("#filtro2").append(new Option("Sofás y sillones", "primera"));
                        $("#filtro2").append(new Option("Mesas", "segunda"));
                        $("#filtro2").append(new Option("Auxiliares", "tercera"));
                        $("#filtro2").append(new Option("Descanso", "cuarta"));
                        switch (filtro){

                            case "sofas":

                                document.getElementById("filtro2").selectedIndex=1;
                                break;

                            case "mesas":

                                document.getElementById("filtro2").selectedIndex=2;
                                break;

                            case "auxiliares":

                                document.getElementById("filtro2").selectedIndex=3;
                                break;

                            case "descanso":

                                document.getElementById("filtro2").selectedIndex=4;
                                break;
                            
                        }
                        $("#filtro2").show();
                    }
                    if (filtro=="baratos" || filtro=="caros"){
                        document.getElementById("filtro").selectedIndex=3;
                        $("#filtro2").find('option').remove();
                        $("#filtro2").append(new Option("", "vacio"));
                        $("#filtro2").append(new Option("Más baratos primero", "baratos"));
                        $("#filtro2").append(new Option("Más caros primero", "caros"));
                        filtro=="baratos" ? document.getElementById("filtro2").selectedIndex=1 : document.getElementById("filtro2").selectedIndex=2;
                        $("#filtro2").show();
                    }
                    if (filtro=="nuevos" || filtro=="antiguos"){
                        document.getElementById("filtro").selectedIndex=4;
                        $("#filtro2").find('option').remove();
                        $("#filtro2").append(new Option("", "vacio"));
                        $("#filtro2").append(new Option("Nuevos primero", "nuevos"));
                        $("#filtro2").append(new Option("Antiguos primero", "antiguos"));
                        filtro=="nuevos" ? document.getElementById("filtro2").selectedIndex=1 : document.getElementById("filtro2").selectedIndex=2;
                        $("#filtro2").show();
                    }
                    if (filtro=="nuevo" || filtro=="buen" || filtro=="segunda" || filtro=="restaurar"){
                        document.getElementById("filtro").selectedIndex=5;
                        $("#filtro2").find('option').remove();
                        $("#filtro2").append(new Option("", "vacio"));
                        $("#filtro2").append(new Option("Nuevo", "nuevo"));
                        $("#filtro2").append(new Option("En buen estado", "bueno"));
                        $("#filtro2").append(new Option("Segunda mano", "segunda"));
                        $("#filtro2").append(new Option("Para restauración", "restaurar"));
                        switch (filtro){

                            case "nuevo":

                                document.getElementById("filtro2").selectedIndex=1;
                                break;

                            case "buen":

                                document.getElementById("filtro2").selectedIndex=2;
                                break;

                            case "segunda":

                                document.getElementById("filtro2").selectedIndex=3;
                                break;

                            case "restaurar":

                                document.getElementById("filtro2").selectedIndex=4;
                                break;
                            
                        }
                        $("#filtro2").show();
                    }
                    function CambiarPagina(pagina){
                        window.location.href="../../../../../../../index.php/Tienda_controller/cambiarPagina/"+pagina;
                    }
                    function cambio(){
                        var x=document.getElementById("filtro").selectedIndex;
                        var y=document.getElementById("filtro").options;
                        switch (y[x].text){

                            case "":

                                window.location.href="../../../../../../index.php/Tienda_controller";
                                break;
                            
                            case "Nombre":

                                $("#filtro2").find('option').remove();
                                $("#filtro2").append(new Option("", "vacio"));
                                $("#filtro2").append(new Option("Ascendente", "ascendente"));
                                $("#filtro2").append(new Option("Descendente", "descendente"));
                                $("#filtro2").show();
                                break;

                            case "Categoría":

                                $("#filtro2").find('option').remove();
                                $("#filtro2").append(new Option("", "vacio"));
                                $("#filtro2").append(new Option("Sofás y sillones", "primera"));
                                $("#filtro2").append(new Option("Mesas", "segunda"));
                                $("#filtro2").append(new Option("Auxiliares", "tercera"));
                                $("#filtro2").append(new Option("Descanso", "cuarta"));
                                $("#filtro2").show();
                                break;

                            case "Precio":

                                $("#filtro2").find('option').remove();
                                $("#filtro2").append(new Option("", "vacio"));
                                $("#filtro2").append(new Option("Más baratos primero", "baratos"));
                                $("#filtro2").append(new Option("Más caros primero", "caros"));
                                $("#filtro2").show();
                                break;

                            case "Año fabricación":

                                $("#filtro2").find('option').remove();
                                $("#filtro2").append(new Option("", "vacio"));
                                $("#filtro2").append(new Option("Nuevos primero", "nuevos"));
                                $("#filtro2").append(new Option("Antiguos primero", "antiguos"));
                                $("#filtro2").show();
                                break;
                            
                            case "Estado":

                                $("#filtro2").find('option').remove();
                                $("#filtro2").append(new Option("", "vacio"));
                                $("#filtro2").append(new Option("Nuevo", "nuevo"));
                                $("#filtro2").append(new Option("En buen estado", "bueno"));
                                $("#filtro2").append(new Option("Segunda mano", "segunda"));
                                $("#filtro2").append(new Option("Para restauración", "restaurar"));
                                $("#filtro2").show();
                                break;

                        }
                    }
                    function filtrar(){
                        var x=document.getElementById("filtro2").selectedIndex;
                        var y=document.getElementById("filtro2").options;
                        if (y[x].text!=""){
                            window.location.href="../../../../../../index.php/Tienda_controller/filtrar/"+y[x].text;  
                        }else{
                            window.location.href="../../../../../../index.php/Tienda_controller/filtrar/blanco";
                        }
                    }
                </script>
            </p> 
