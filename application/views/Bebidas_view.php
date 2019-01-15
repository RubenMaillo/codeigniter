<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>CRUD con CodeIgniter</title>
    </head>
    <body>
        
        <center><h2>Crud con CodeIgniter</h2>
        <?php
		
        //Si existen las sesiones flasdata que se muestren
            if($this->session->flashdata('correcto'))
                echo $this->session->flashdata('correcto');
             
            if($this->session->flashdata('incorrecto'))
                echo $this->session->flashdata('incorrecto');
			
        ?>
<table border="1" cellpadding=10 style="text-align:center;">
    <tr>
        <td colspan="8"><h2>BEBIDAS</h2></td>
    </tr>
    <tr>
        <td colspan="4">Nombre---</td>
        <td colspan="2"><input type="text" id="filtro" name="filtro" onchange="filtrar()"/></td>
        <td colspan="2"><a href="<?=base_url("index.php/Bebidas_controller")?>">Reset</a></td>
    </tr>
    <tr>
	    <form action="<?=base_url("index.php/Bebidas_controller/add")?>" method="post">
            <td colspan="4">Introduce una nueva bebida</td>
            <td colspan="4">
                <input type="submit" name="submit" value="Añadir" />
            </td>
        </form>
    </tr>
    <tr>
        <td colspan="2">Opciones</td>
        <td><a href="<?=base_url("index.php/Bebidas_controller/ordenar_ID")?>">ID</a></td>
        <td><a href="<?=base_url("index.php/Bebidas_controller/ordenar_nombre")?>">Nombre bebida</a></td>
        <td><a href="<?=base_url("index.php/Bebidas_controller/ordenar_ml")?>">Ml</a></td>
        <td><a href="<?=base_url("index.php/Bebidas_controller/ordenar_cafeina")?>">Cafeína</a></td>
        <td><a href="<?=base_url("index.php/Bebidas_controller/ordenar_azucar")?>">Azúcar</a></td>
    </tr>
    
<?php
for($i=0;$i<count($array1);$i++){
    if (isset($dato1)){
        if ($dato1==$array1[$i]->bebida){
            $id=$array1[$i]->ID;
        ?>
        <tr>
         <td>
             <a href="<?=base_url("index.php/Bebidas_controller/mod/$id")?>">Modificar</a>
         </td>
         <td>
                <a onclick="return confirm('¿Quieres eliminar la bebida?');" href="<?=base_url("index.php/Bebidas_controller/eliminar/$id")?>">Eliminar</a>
            </td>
            <td>
                <?=$array1[$i]->ID;?>
            </td>
            <td>
                <?=$array1[$i]->bebida;?>
            </td>
            <td>
                <?=$array1[$i]->ml;?>
            </td>
            <td>
                <?php 
                 $tazas=$array1[$i]->cafeina/64;
                 while ($tazas>=1){
                    ?><img src="../../../configuracion/imagenes/cafe.jpg"/><?php
                    $tazas--;
                 }
                 while ($tazas>=0.50){
                    ?><img src="../../../configuracion/imagenes/cafe_medio.jpg"/><?php
                    $tazas-=0.50;
                 }
                 while ($tazas>=0.25){
                    ?><img src="../../../configuracion/imagenes/cafe_cuarto.jpg"/><?php
                    $tazas-=0.25;
                 }
                ?>
            </td>
            <td>
                <?php 
                 $terrones=$array1[$i]->azucar/4;
                 while ($terrones>=1){
                    ?><img src="../../../configuracion/imagenes/azucar.jpg"/><?php
                    $terrones--;
                 }
                 while ($terrones>=0.50){
                    ?><img src="../../../configuracion/imagenes/azucar_medio.jpg"/><?php
                    $terrones-=0.50;
                 }
                 while ($terrones>=0.25){
                    ?><img src="../../../configuracion/imagenes/azucar_cuarto.jpg"/><?php
                    $terrones-=0.25;
                 }
                ?>
            </td>
        </tr>
        <?php
            }
    }else{
        $id=$array1[$i]->ID;
            ?>
            <tr>
            <td>
                <a href="<?=base_url("index.php/Bebidas_controller/mod/$id")?>">Modificar</a>
            </td>
            <td>
                <a onclick="return confirm('¿Quieres eliminar la bebida?');" href="<?=base_url("index.php/Bebidas_controller/eliminar/$id")?>">Eliminar</a>
            </td>
            <td>
                <?=$array1[$i]->ID;?>
            </td>
            <td>
                <?=$array1[$i]->bebida;?>
            </td>
            <td>
                <?=$array1[$i]->ml;?>
            </td>
            <td>
                <?php 
                 $tazas=$array1[$i]->cafeina/64;
                 while ($tazas>=1){
                    ?><img src="../../configuracion/imagenes/cafe.jpg"/><?php
                    $tazas--;
                 }
                 while ($tazas>=0.50){
                    ?><img src="../../configuracion/imagenes/cafe_medio.jpg"/><?php
                    $tazas-=0.50;
                 }
                 while ($tazas>=0.25){
                    ?><img src="../../configuracion/imagenes/cafe_cuarto.jpg"/><?php
                    $tazas-=0.25;
                 }
                ?>
            </td>
            <td>
                <?php 
                 $terrones=$array1[$i]->azucar/4;
                 while ($terrones>=1){
                    ?><img src="../../configuracion/imagenes/azucar.jpg"/><?php
                    $terrones--;
                 }
                 while ($terrones>=0.50){
                    ?><img src="../../configuracion/imagenes/azucar_medio.jpg"/><?php
                    $terrones-=0.50;
                 }
                 while ($terrones>=0.25){
                    ?><img src="../../configuracion/imagenes/azucar_cuarto.jpg"/><?php
                    $terrones-=0.25;
                 }
                ?>
            </td>
        </tr>
        <?php
    }
}
?>
</table>
        <script>
            
            function filtrar(){
                if (sessionStorage.getItem("iFiltrados")==null){
                    sessionStorage.setItem("iFiltrados", 0);
                }else{
                    sessionStorage.setItem("iFiltrados", (sessionStorage.getItem("iFiltrados")+1)); 
                }
                var textoFiltrado = document.getElementById("filtro").value;
                if (sessionStorage.getItem("iFiltrados")>0){
                    //if isset(id) vuelve 1 si no 2 para que funcione el filtro siempre
                    window.location.href = "../../Bebidas_controller/filtro/"+textoFiltrado;
                }else{
                    if(textoFiltrado!=''){
                        <?php if (isset($id)){ ?>
                            window.location.href = "/index.php/Bebidas_controller/filtro/"+textoFiltrado;
                        <?php }else{ ?>
                            window.location.href = "filtro/"+textoFiltrado;
                       <?php } ?>
                    }
                }
           }
        </script>
         </center>
    </body>
</html>
