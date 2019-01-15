<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../../../configuracion/css/estilos_admin.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet"> 
    <link rel="stylesheet" href="/resources/demos/style.css">
    <title>Añadir nuevo producto</title>
</head>
<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    
    <div class="general">
        <h1>Añadir producto</h1>
        <section class="informacion">
            <article id="labels">
                <label>Categoría</label><br>
                <label>Nombre del producto</label><br>
                <label>Precio</label><br>
                <label>Stock inicial</label><br>
                <label>Estado</label><br>
                <label>Año de fabricación</label><br>
                <label>Descripción</label><br>
            </article>
            <article id="inputs">
            <section class="informacion">
                <select id="categoria">
                    <option value="vacio"></option>
                    <option value="Sofás y sillones">Sofás y sillones</option>
                    <option value="Mesas">Mesas</option>
                    <option value="Auxiliares">Auxiliares</option>
                    <option value="Descanso">Descanso</option>
                </select><br>
                <input type="text" placeholder="Ingresa el nombre del producto" size="35" id="nombre"><br>
                <input type="number" placeholder="Introduce el precio del producto" id="precio"><br>
                <input type="number" placeholder="El stock inicial del producto" id="stock"><br>
                <select id="estado">
                    <option value="vacio"></option>
                    <option value="Nuevo">Nuevo</option>
                    <option value="En buen estado">En buen estado</option>
                    <option value="Segunda mano">Segunda mano</option>
                    <option value="Para restauración">Para restauración</option>
                </select><br>
                <input type="number" placeholder="Ingresa el año de fabricación del producto" size="35" id="ano"><br>
                <textarea rows="5" cols="30" id="desc"></textarea>
            </article>
        </section>
        <section class="opciones"><br>
            <button id="cancelar">Cancelar</button>
            <button id="anadir">Modificar</button>
        </section>
    </div>
    <script>
        var categoria2="<?php echo $datoss[0];?>";
        var estado2="<?php echo $datoss[4];?>";
        var nombre2="<?php echo $datoss[1];?>";
        if (categoria2=="Sofas y sillones"){
            categoria2="Sofás y sillones";
        }
        var precio2="<?php echo $datoss[2];?>";
        var stock2="<?php echo $datoss[3];?>";
        var ano2="<?php echo $datoss[5];?>";
        var desc2="<?php echo $datoss[6];?>";
     
        $("button").button();
        $(function(){
            $("#nombre").prop('disabled', true);
            $("#nombre").val(nombre2);
            $("#precio").val(precio2);
            $("#stock").val(stock2);
            $("#ano").val(ano2);
            $("#desc").val(desc2);
            $("#categoria").find("option[value='" + categoria2 + "']").attr("selected", true);
            $("#estado").find("option[value='" + estado2 + "']").attr("selected", true);
            $("#cancelar").click(function(){
                window.location.href="../../../../../../../index.php/Tienda_admin_controller";
            });
            $("#anadir").click(function(){
                if ($("#categoria :selected").text()!="" && $("#nombre").val()!="" && $("#precio").val()!="" && $("#stock").val()!="" && $("#estado :selected").text()!="" && $("#ano").val()!="" && $("#desc").val()!=""){
                    window.location.href="../../../../../index.php/Tienda_admin_controller/modificar_Producto/"+$("#categoria :selected").text()+"/"+$("#nombre").val()+"/"+$("#precio").val()+"/"+$("#stock").val()+"/"+$("#estado :selected").text()+"/"+$("#ano").val()+"/"+$("#desc").val();
                }else{
                    alert("Todos los campos son necesarios");
                }
            });
        });
    </script>
</body>
</html>