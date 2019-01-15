<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <title>Modificar bebidas</title>
    </head>
    <body>
        <h2>Modificar bebida</h2>
        <form action="" method="POST">
        <table border=1>
             <tr>
                <td>Nombre de la bebida</td>
                <td>Ml</td>
                <td>Cafeína (gr)</td>
                <td>Azúcar (gr)</td>
             </tr>
             <tr>
            <?php foreach ($mod as $fila){ ?>
                <td><input type="bebida" name="bebida" value="<?=$fila->bebida?>"/></td>
                <td><input type="ml" name="ml" value="<?=$fila->ml?>"/></td>
                <td><input type="cafeina" name="cafeina" value="<?=$fila->cafeina?>"/></td>
                <td><input type="azucar" name="azucar" value="<?=$fila->azucar?>"/></td>
                <td><input onclick="return confirm('¿Quieres modificar la bebida?');" type="submit" name="submit" value="Modificar"/></td>
            <?php } ?>
            </tr>
            </table>
        </form>
        <a href="../">Volver</a>
    </body>
</html>
