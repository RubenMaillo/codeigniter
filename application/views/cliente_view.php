<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <title>Menú cliente</title>
        <link rel="stylesheet" href="../../../../configuracion/css/estilos_tienda.css">
    </head>
    <body>
        <header>
            <button>Opciones</button>
            <aside>
                Rol: <br>
                Sesión actual: <br>
                <button>Salir</button>
            </aside>
            <h1>Menú principal</h1>
        </header>
        <section class="informacion">
            
            <article class="productos">
                <h1>Productos<?php echo $datos[1]->nombre_producto;?></h1>
                <?php
                    $numPaginas=count($datos)/6;
                    $ultima=count($datos)%6;
                    $i=1;
                    foreach ($datos as $fila){ 
                        if ($i<7){?>
                            <section class="producto<?php echo $i++; ?>"><?php echo $fila->nombre_producto; ?></section>
                        <?php 
                        }else{
                            break;
                        }
                    } 
                ?>
            </article>
            <article class="carrito">
                <h1>Carrito</h1>
                
            </article>
            <p class="paginas">
            <?php
            if ($numPaginas%1==0){
                for ($j=0;$j<$numPaginas;$j++){
                    echo '<button>'.($j+1).'</button>';
                }
            }else{
                for ($j=0;$j<($numPaginas+1);$j++){
                    echo '<button>'.($j+1).'</button>';
                }
            }
            ?>
            </p> 
        </section>

    </body>
</html>