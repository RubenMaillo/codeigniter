<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <title>Añadir bebidas</title>
    </head>
    <body>
        <h2>Añadir usuario</h2>
        <form action="" method="POST">
            <table border=1>
             <tr>
                <td>Nombre de la bebida</td>
                <td>Ml</td>
                <td>Cafeína (gr)</td>
                <td>Azúcar (gr)</td>
             </tr>
             <tr>
                <td><input type="bebida" name="bebida"/></td>
                <td><input type="ml" name="ml"/></td>
                <td><input type="cafeina" name="cafeina"/></td>
                <td><input type="azucar" name="azucar"/></td>
                <td><input type="submit" name="submitw" value="Añadir bebida"/></td>
             </tr>

            </table>
        </form>
        <a href="<?=base_url("index.php/Bebidas_controller")?>">Volver</a>
    </body>
</html>
